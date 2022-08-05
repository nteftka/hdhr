@include('layouts/admin_header')
<div class="box">
  <form action="" method="post">
    @csrf
    <input type="hidden" name="number" value="{{$number}}">
    <input type="hidden" name="name" value="{{$name}}">

    <div class="form-item">
      <p class="form-label-2">ID：</p>
      <div class="confirm">{!! htmlspecialchars($number) !!}</div>
      <iput name="number" value="" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">名前：</p>
      <div class="confirm">{!! htmlspecialchars($name) !!}</div>
      <iput name="name" value="" type="hidden">
    </div>

    <div class="btn-contents">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="戻　る">
      <button type="submit" name="action" class="btn-confirm" value="submit">登　録</button>
    </div>
  </form>
</div>
@include('layouts/footer')
