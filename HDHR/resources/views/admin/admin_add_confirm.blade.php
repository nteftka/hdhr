@include('layouts/admin_header')
<div class="admin_confirm">
  <form action="/admin_top" method="post">
    @csrf
    <input type="hidden" name="number" value="{{$number}}">
    <input type="hidden" name="name" value="{{$name}}">
    <input type="hidden" name="date" value="{{$year}}">
    <input type="hidden" name="date" value="{{$month}}">
    <input type="hidden" name="date" value="{{$day}}">
    <input type="hidden" name="created_at" value="{{$created_at}}">


    <div class="form-item">
      <p class="form-label-2">ID：</p>
      <div class="">{!! htmlspecialchars($number) !!}</div>
      <iput name="number" value="" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">名前：</p>
      <div class="">{!! htmlspecialchars($name) !!}</div>
      <iput name="name" value="" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">登録日：</p>
      <div class="">{{ $year }}年{{$month}}月{{$day}}日</div>
      <iput name="date" value="" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">登録日：</p>
      <div class="">{!! htmlspecialchars($created_at) !!}</div>
      <iput name="date" value="" type="hidden">
    </div>

    <div class="button2">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="戻　る">
      <button type="submit" name="action" class="btn-confirm" value="submit">登　録</button>
    </div>
  </form>
</div>
@include('layouts/footer')
