@include('layouts/admin_header')
  <h1>スタッフ登録</h1>
  <div class="container">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <label for="number" class="resister-label">ID：</label>
      <div class="input-box">
        <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" placeholder="0000" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
        @error('number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <label for="name" class="col-md-4 col-form-label text-md-end">名前：</label>
      <div class="input-box">
        <input id="name" type="text" placeholder="山田太郎" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス：</label>
      <div class="input-box">
      <input id="email" type="text" placeholder="sample@sample.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <label for="password" class="col-md-4 col-form-label text-md-end">パスワード：</label>
    <div class="input-box">
      <input id="password" type="password" placeholder="abcd1234" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">パスワード（確認のため再入力してください）</label>
    <div class="input-box">
      <input id="password-confirm" type="password" placeholder="abcd1234"　class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <label for="created_at" class="col-md-4 col-form-label text-md-end">登録日</label>
    <div class="input-box">
      <input id="created_at" type="date" class="form-control" name="created_at">
    </div>
    <div class="input-box offset-md-4">
      <button type="submit" class="btn btn-primary">登　録</button>
    </div>
  </form>
</div>
@extends('layouts.app')

@section('content')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/date.js') }}"></script>
@include('layouts/footer')
