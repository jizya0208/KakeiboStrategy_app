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
        @foreach($expenses as $record)
        <tr>
            <td>{{ $record->date }}</td>
            <td><a href="/record/{{ $record->id }}">{{ $record->expense_category_id }}</a></td>
            <td>{{ $record->amount  }}</td>
            <td>{{ $record->expense_type_id }}</td>
            <td><button type="button" class="btn btn-primary" onclick="location.href='/record/edit/{{ $record->id }}'">編集</button></td>
            <form method="POST" action="{{ route('records/delete', $record->id) }}" onSubmit="return checkDelete()">
            @csrf
            <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
            </form>
        </tr>
        @endforeach

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