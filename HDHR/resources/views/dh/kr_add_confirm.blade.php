@include('layouts/header')
<h1>登録内容確認</h1>
<div class="create-confirm">
  <form action="kr_add_complate" method="post">
    @csrf
    <input type="hidden" name="number" value="{{$data['number']}}">
    <input type="hidden" name="name" value="{{$data['name']}}">
    <input type="hidden" name="kana" value="{{$data['kana']}}">
    <input type="hidden" name="gender" value="{{$data['gender']}}">
    <input type="hidden" name="birth" value="{{$data['birth']}}">

    <div class="form-item">
      <p>患者番号</p>
      <p>{{$data['number']}}</a>
      <iput name="number" value="{{$data['number']}}" type="hidden">
    </div>

    <div class="form-item">
      <p>名前</p>
      <p>{{$data['name']}}</p>
      <iput name="name" value="{{$data['name']}}" type="hidden">
    </div>

    <div class="form-item">
      <p>フリガナ</p>
      <p>{{$data['kana']}}</p>
      <iput name="kana" value="{{$data['kana']}}" type="hidden">
    </div>

    <div class="form-item">
      <p>生年月日</p>
      <p>{{$data['birth']}}</p>
      <iput name="birth" value="{{$data['birth']}}" type="hidden">
    </div>

    <div class="form-item">
      <p>性別</p>
        @if($data['gender'] === '1')
      <p>女</p>
        @elseif($data['gender'] === '0')
      <p>男</p>
        @endif
      <iput name="gender" value="{{$data['gender']}}" type="hidden">
    </div>

    <div class="btn-contents2">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="戻　る">
      <button type="submit" name="action" class="btn-confirm" value="submit">登　録</button>
    </div>
  </form>
  </form>
</div>
@include('layouts/footer')
