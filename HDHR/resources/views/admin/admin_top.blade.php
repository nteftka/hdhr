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
