<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    <title>Help Dental Hygienists Records</title>
</head>
<body>
  <header id="header">
    <ul>
      <li><a href="{{ route('main') }}">Top</a></li>
      <li><a href="{{ route('search') }}">新規登録</a></li>
      <li><a href="{{ route('kr') }}">患者一覧</a></li>
      {{-- <li><a href="">ログアウト</a></li> --}}
      @if(Auth::user())
      <li><div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('ログアウト') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div></li>
      @endif
    </ul>
  </header>
