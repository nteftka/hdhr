@can('admin-higher')
@include('layouts/admin_header')
<div class="staff_list">
  <div  class="staff-register-btn">
    <button onclick="location.href='{{ route('register') }}'">スタッフ登録</button>
  </div>
  <div  class="staff-list-btn">
    <button onclick="location.href='/admin_user'">スタッフ一覧</button>
  </div>
  <div  class="main">
    <button onclick="location.href='/main'">DHページ</button>
  </div>
</div>
@include('layouts/footer')

@elsecan('user-higher')
@include('layouts/header')
<section id="dh-info">
  <div class="dh-info">
    <p>アカウント情報</p>
    <p>ID：{{ Auth::user()->number }}</p>
    <p>名前：{{ Auth::user()->name }}</p>
    <a href="/user_edit">アカウント編集</a>
  </div>
</section>
<section id="mainBtn">
  <div  class="top-creat">
    <button onclick="location.href='/search'">新規登録</button>
  </div>
  <div class="main">
    <button onclick="location.href='/main'">メインページ</button>
  </div>
</section>

@include('layouts/footer')

@endcan
