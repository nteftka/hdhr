@include('layouts/header')
<form action="" method="post">
  @csrf
  @method('PATCH')
<section class="input-box">

  <label for="number" >患者番号:</label>
    <div class="input-box">
  <input type="text" name="number" value="{{ $kr->number }}">
  @if ($errors->has('number'))
  <p class="error-message">{{ $errors->first('number') }}</p>
  @endif
</div>

<label for="name" >名前:</label>
<div class="input-box">
<input type="text" name="name" value="{{ $kr->name }}">
@if ($errors->has('name'))
<p class="error-message">{{ $errors->first('name') }}</p>
@endif
</div>


<label for="kana">フリガナ:</label>
    <div class="input-box">
<input type="text" name="kana" value="{{ $kr->kana }}">
@if ($errors->has('kana'))
<p class="error-message">{{ $errors->first('kana') }}</p>
@endif
</div>


<label for="birth">誕生日</label>
    <div class="input-box">
<input type="date" name="birth" value="{{ $kr->birth }}">
@if ($errors->has('birth'))
<p class="error-message">{{ $errors->first('birth') }}</p>
@endif
</div>


<label for="gender">性別:</label>
    <div class="input-box">
{{Form::select('gender', ['0' => '男', '1' => '女'], $kr->gender)}}
@if ($errors->has('gender'))
<p class="error-message">{{ $errors->first('gender') }}</p>
@endif
</div>


<div class="button">
<input type="hidden" name="id" value="$id">
<input type='submit' value="送信する">
</div>
</form>
</section>
@include('layouts/footer')
