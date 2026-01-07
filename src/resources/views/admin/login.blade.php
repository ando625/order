@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">

@endsection

@section('content')
<div class="login-container">
    <h1 class="login-title">ログイン</h1>
    <form action="/login" method="post" class="login-form">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-input">
            @error('email')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" class="form-input">
            @error('password')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">ログインする</button>
    </form>
    <div class="register-link">
        <a href="/register">新規登録はこちら</a>
    </div>
</div>

@endsection