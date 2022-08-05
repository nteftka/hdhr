@include('layouts/header')
<h1>業務内容編集</h1>
<form action="" method="post">
  @csrf
  @method('PATCH')
  @foreach($data as $kr)
  <section class="dh-info">
  <input type="hidden" class="id" name="kr_id" value="{{ $kr->id }}">
  <input type="hidden" class="id" name="id" value="{{ $contents->id }}">
  <div class="">
    <div class="label">患者番号：</div>

      <div class="">{{ $kr->number }}</div>
      <input type="hidden" class="number" name="number" value="{{ $kr->number }}">

    <div class="label">名前：</div>

      <div class="">{{ $kr->name }}</div>
      <input type="hidden" class="name" name="name" value="{{ $kr->name }}">


    <div class="label">フリガナ</div>

      <div class="">{{ $kr->kana }}</div>
      <input type="hidden" class="kana" name="kana" value="{{ $kr->kana }}">


    <div class="label">生年月日：</div>

      <div class="">{{ $kr->birth->format('Y年m月d日') }}</div>
      <input type="hidden" class="birth" name="birth" value="{{ $kr->birth }}">


    <div class="label">性別：</div>
    <div class="gender-check">
      @if($kr->gender === 1)
      <div class="">女</div>
      @elseif($kr->gender === 0)
      <div class="">男</div>
      @endif
      <input type="hidden" class="gender" name="gender" value="{{ $kr->gender }}">
    </div>
    @endforeach
</section>
<section id="input-box">
    <div class="label">診療日：</div>
    <div class="input-box">
      <input type="date" class="date" name="date" value="{{ $contents->date }}">
    </div>

    <div class="label">PD：</div>
    <div class="pdInfo">
      <p>右上</p>
      {{Form::select('rup_pd', ['1' => '1～2', '2' => '3～4', '3' => '5～6' ], $contents->rup_pd)}}
      <p>左上</p>
      {{Form::select('lup_pd', ['1' => '1～2', '2' => '3～4', '3' => '5～6' ], $contents->lup_pd)}}
      <p>右下</p>
      {{Form::select('run_pd', ['1' => '1～2', '2' => '3～4', '3' => '5～6' ], $contents->run_pd)}}
      <p>左下</p>
      {{Form::select('lun_pd', ['1' => '1～2', '2' => '3～4', '3' => '5～6' ], $contents->lun_pd)}}
    </div>
    <div class="label">業務内容：</div>
    <div class="input-box">
      <textarea class="contents" name="contents">{{$contents->contents }}</textarea>
      @if ($errors->has('contents'))
      <p class="error-message">{{ $errors->first('contents') }}</p>
      @endif
    </div>

    <div class="label">患者様へ：</div>
    <div class="input-box">
      <textarea class="memo" name="memo">{{ $contents->memo }}</textarea>
      @if ($errors->has('memo'))
      <p class="error-message">{{ $errors->first('memo') }}</p>
      @endif
    </div>

    <div class="btn-contents">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="戻　る">
      <input type="submit" value="確　認">
    </div>
  </div>
</section>
</form>

@include('layouts/footer')
