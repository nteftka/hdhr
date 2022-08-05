@include('layouts/header')

<h1>アカウント変更</h1>

<p>名前：{{ Auth::user()->name }}</p>
<form action="/main" method="post">
  @csrf
  @method('PATCH')
  <p>ID：{{ Auth::user()->number }}</p>


    <div class="label">名前：</div>
    <div class="input-box">
      <input class="name" name="name" value="{{ Auth::user()->name }}">
    </div>

    <div class="btn-contents">
      <button>変　更</button>
    </div>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
@include('layouts/footer')
