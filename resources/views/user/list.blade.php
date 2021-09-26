<!-- 
①route作成（削除ボタン）
②Controllerづくり
③削除機能づくり
 -->

@extends('layout')
@section('title', '収支')
@section('content')
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      @if (session('login_success'))
          <div class="alert alert-success">
              {{ session('login_success') }}
          </div>
      @endif
      <x-alert type="success" :session="session('login_success')"/>
      <ul>
          <li>名前: {{ Auth::user()->name }} </li>
          <li>メールアドレス: {{ Auth::user()->email }} </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger">ログアウト</button>
      </form>
      <h4>収支一覧</h4>

      @if (session('err_msg'))
          <p class="text-danger">
              {{ session('err_msg') }}
          </p>
      @endif
      <table class="table table-striped">
          <tr>
            <th>日付</th>
            <th>費目</th>
            <th>摘要</th>
            <th>支出</th>
            <th>収入</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
          @foreach($expenses as $expense)
          <tr>
            <td>{{ $expense->date }}</td>
            <td>{{ $expense_category[$expense->expense_category_id]->name }}</td> <!--REVIEW: 冗長-->
            <td>{{ $expense->summary }}</td>
            <td>{{ $expense->amount }}</td>
            <td></td>
            <td>
              <button type="button" class="btn btn-primary" onclick="location.href='/expense/edit/{{ $expense->id }}'">編集</button>
            </td>
            <form method="post" action="{{ route('expenseDelete', $expense->id) }}" onSubmit="return checkDelete()">
            @csrf
            <td><button type="submit" class="btn btn-danger" onclick=>削除</button></td>
            </form>
          </tr>
          @endforeach


          <a href="/record/create">新しく記録する</a>
      </table>

      <h4>月別収支</h4>
        <div>
          消費{{ $subtotal[0]->total_amount }}
        </div>
        <div>
          浪費{{ $subtotal[1]->total_amount }}
        </div>
        <div>
          投資{{ $subtotal[2]->total_amount }}
        </div>
    </div>
  </div>
  <script>
  function checkDelete(){
      if(window.confirm('削除してよろしいですか？')){
          return true;
      } else {
          return false;
      }
  }
  </script>
@endsection