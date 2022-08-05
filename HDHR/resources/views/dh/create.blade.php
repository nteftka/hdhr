@include('layouts/header')
<h1>業務内容登録</h1>
<form action="/confirm" method="post">
  @csrf
  @method('PATCH')
  <section class="dh-info">
    <input type="hidden" class="id" name="id" value="{{ $user->id }}">
      <div class="label">患者番号：</div>

        <div class="">{{ $user->number }}</div>
        <input type="hidden" class="number" name="number" value="{{ $user->number }}">



      <div class="label">名前：</div>

        <div class="">{{ $user->name }}</div>
        <input type="hidden" class="name" name="name" value="{{ $user->name }}">



      <div class="label">フリガナ</div>

        <div class="">{{ $user->kana }}</div>
        <input type="hidden" class="kana" name="kana" value="{{ $user->kana }}">



      <div class="label">生年月日：</div>

        <div class="">{{ $user->birth->format('Y年m月d日') }}</div>
        <input type="hidden" class="birth" name="birth" value="{{ $user->birth }}">



    <div class="label">性別：</div>
    <div class="gender-check">
      @if($user->gender === 1)
      <div class="">女</div>
      @else
      <div class="">男</div>
      @endif
      <input type="hidden" class="gender" name="gender" value="{{ $user->gender }}">

    </div>
  </section>

  <section id="input-box">
    <label>診療日：</label>
    <div class="input-box">
      <input class="date" type="date" name="date" value="{{ old('date')}}">
      @if ($errors->has('date'))
      <p class="error-message">{{ $errors->first('date') }}</p>
      @endif
    </div>

    <div class="label">PD：</div>
      <label>右上</label>
      <div class="pdInfo">
        <select class="form-control" id="category_id" name="rup_pd">
          @foreach($categories as $category)
          <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      <p>左上</p>
      <div class="pdInfo">
        <select class="form-control" id="category_id" name="lup_pd">
          @foreach($categories as $category)
          <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      <p>右下</p>
      <div class="pdInfo">
        <select class="form-control" id="category_id" name="run_pd">
          @foreach($categories as $category)
          <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
      <p>左下</p>
      <div class="pdInfo">
        <select class="form-control" id="category_id" name="lun_pd">
          @foreach($categories as $category)
          <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="label">業務内容：</div>
    <div class="input-box">
      <textarea class="contents" name="contents" value="{{ old('contents')}}"></textarea>
      @if ($errors->has('contents'))
      <p class="error-message">{{ $errors->first('contents') }}</p>
      @endif
    </div>

    <div class="label">患者様へ：</div>
    <div class="input-box">
      <textarea class="memo" name="memo" value="{{ old('memo')}}"></textarea>
      @if ($errors->has('memo'))
      <p class="error-message">{{ $errors->first('memo') }}</p>
      @endif
    </div>
      <div class="btn-contents">
        <button>確　認</button>
      </div>
    </div>
  </section>
  </form>
@include('layouts/footer')
