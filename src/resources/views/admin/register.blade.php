@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register-container">
    <h1 class="register-title">新規登録</h1>
    <form action="/register" class="register-form" method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">名前</label>
            <input type="text" id="name" name="name" class="form-input" value="{{old('name')}}">
            @error('name')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{old('email')}}" class="form-input">
            @error('email')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">パスワード</label>
            <input type="password" id="password" name="password" value="{{old('password')}}" class="form-input">
            @error('password')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">パスワード確認</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input">
            @error('password_confirmation')
            <span class="error-message">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="submit-button">登録する</button>
    </form>

    <div class="login-link">
        <a href="/login" >ログインはこちら</a>
    </div>
</div>

@endsection