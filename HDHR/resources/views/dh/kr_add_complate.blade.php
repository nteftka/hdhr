@include('layouts/header')
<h1>登録内容確認</h1>
<div class="form-item">
  <p>患者番号</p>
  <p>{{$kr['number']}}</p>
</div>

<div class="form-item">
  <p>名前</p>
  <p>{{$kr['name']}}</p>
</div>

<div class="form-item">
  <p>フリガナ</p>
  <p>{{$kr['kana']}}</p>
</div>

<div class="form-item">
  <p>生年月日</p>
  <p>{{$kr['birth']->format('Y年m月d日')}}</p>
</div>

<div class="form-item">
  <p>性別</p>
    @if($kr['gender'] === '1')
    <p>女</p>
    @else
    <p>男</p>
    @endif
  </div>

<div class="form-item">
  <a href="create/{{$kr->id}}" class="contents_add">業務内容追加</a>
  <a href="main" class="back">トップへ戻る</a>
</div>
@include('layouts/footer')
