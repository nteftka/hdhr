@include('layouts/header')
<body>
  <form action="/admin_top" method="post">
    @csrf
    @method('PATCH')
    <div class="">
      <div class="label">管理番号</div>
      <div class="input-box">
        <input class="number" name="number" placeholder="0123456789" value="{{ old('id')}}">
      </div>

      <div class="label">パスワード</div>
      <div class="input-box">
        <input class="password" name="password" placeholder="a123456" value="{{ old('password')}}">
      </div>

      <div class="btn_login">
        <button>ログイン</button>
      </div>
    </div>
  </form>
</body>
@include('layouts/footer')
