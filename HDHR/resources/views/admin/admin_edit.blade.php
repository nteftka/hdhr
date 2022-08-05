@include('layouts/admin_header')
<h1>スタッフ情報編集</h1>
<form action="" method="post">
  @csrf
  @method('PATCH')
  <div class="box">
    <div class="label">ID：</div>
    <div class="input-box">
      <input class="number" name="number" value="{{ $user->number }}">
      @if ($errors->has('number'))
              <p class="error-message">{{ $errors->first('number') }}</p>
              @endif
    </div>

    <div class="label">名前：</div>
    <div class="input-box">
      <input class="name" name="name" value="{{ $user->name }}">
      @if ($errors->has('name'))
              <p class="error-message">{{ $errors->first('name') }}</p>
              @endif
    </div>

    <div class="row mb-3">
      <label for="created_at" class="col-md-4 col-form-label text-md-end">登録日</label>

      <div class="input-box">
        <input class="created_at" type="date"  name="created_at" value="{{ $user->created_at}}">
      </div>
    </div>
    <div class="btn-contents">
    <button onClick="history.back()" type="button" class="sendBtn">戻る</button>
  

    <button >変　更</button>
    </div>
</div>
</div>
</form>
@include('layouts/footer')
