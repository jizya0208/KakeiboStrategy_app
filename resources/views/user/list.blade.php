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
      <h2>収支一覧</h2>

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
              <th>編集削除</th>
          </tr>


          <a href="/record/create">新しく記録する</a>
      </table>
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