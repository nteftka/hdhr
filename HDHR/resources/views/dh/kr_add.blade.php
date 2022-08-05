@include('layouts/header')
<h1>患者登録</h1>
<div class="kr_add">
<form action="kr_add_confirm" method="post">
  @csrf
  @method('PATCH')
    <div class="input-box">患者番号：</div>
    <div class="input-box">
      <input class="number" name="number" placeholder="0123456789" value="{{ old('number')}}">
      @if ($errors->has('number'))
      <p class="error-message">{{ $errors->first('number') }}</p>
      @endif
    </div>

    <div class="input-box">名前：</div>
    <div class="input-box">
      <input class="name" name="name" placeholder="山田太郎" value="{{ old('name')}}">
      @if ($errors->has('name'))
      <p class="error-message">{{ $errors->first('name') }}</p>
      @endif
    </div>

    <div class="input-box">フリガナ</div>
    <div class="input-box">
      <input class="kana" name="kana" placeholder="ヤマダタロウ" value="{{ old('kana')}}">
      @if ($errors->has('kana'))
      <p class="error-message">{{ $errors->first('kana') }}</p>
      @endif
    </div>

    <div class="input-box">性別：</div>
    <div class="input-box">
      {{Form::select('gender', ['0' => '男', '1' => '女'])}}
    </div>

    <div class="input-box">生年月日：</div>
    <div class="input-box">
      <input class="birth" type="date" name="birth" value="{{ old('birth')}}">
      @if ($errors->has('birth'))
      <p class="error-message">{{ $errors->first('birth') }}</p>
      @endif
    </div>


      <div class="btn-contents">
        <button>確　認</button>
      </div>
    </form>
    </div>
@include('layouts/footer')
