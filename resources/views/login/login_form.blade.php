@extends('layout')
@section('title', '家計簿レコード記録')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form class="form-signin" method="POST" action="{{
    route('login') }}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      @if (session('login_error'))
        <div class="alert alert-danger">
            {{ session('login_error') }}
        </div>
      @endif

      @if (session('logout'))
        <div class="alert alert-danger">
            {{ session('logout') }}
        </div>
      @endif
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
    </form>
  </div>
</div>

@endsection