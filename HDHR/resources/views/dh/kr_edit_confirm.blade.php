@include('layouts/header')
<h1>編集確認画面</h1>
    <form action="" method="post">
      @csrf
      <input type="hidden" name="number" value="{{$number}}">
      <input type="hidden" name="name" value="{{$name}}">
      <input type="hidden" name="kana" value="{{$kana}}">
      <input type="hidden" name="birth" value="{{$birth}}">
      <input type="hidden" name="gender" value="{{$gender}}">

      <p class="form-label-2">患者番号：{!! nl2br(htmlspecialchars($number)) !!}</p>
      <p class="form-label-2">名前：{!! htmlspecialchars($name) !!}</p>
      <p class="form-label-2">フリガナ：{!! htmlspecialchars($kana) !!}</p>
      <p class="form-label-2">生年月日：{!! htmlspecialchars($birth) !!}</p>
      @if($gender === '1')
      <p class="form-label-2">性別：女</p>
      @else
      <p class="form-label-2">性別：男</p>
      @endif

    <div class="btn-contents2">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="戻　る">
      <button type="submit" name="action" class="btn_confirm" value="submit">送信</button>
    </div>

  </form>
</div>
</body>
@include('layouts/footer')
