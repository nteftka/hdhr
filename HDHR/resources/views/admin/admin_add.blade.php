@include('layouts/admin_header')
<section id="staff">
  <h1>スタッフ登録</h1>
  <form action="/admin_add_confirm" method="post">
    @csrf
    @method('PATCH')
    <div class="">
      <div class="label">ID：</div>
      <div class="input-box">
        <input class="number" name="number" placeholder="0123456789" value="{{ old('number')}}">
        @if ($errors->has('number'))
              <p class="error-message">{{ $errors->first('number') }}</p>
              @endif
      </div>

      <div class="label">名前：</div>
      <div class="input-box">
        <input class="name" name="name" placeholder="山田　太郎" value="{{ old('name')}}">
        @if ($errors->has('name'))
              <p class="error-message">{{ $errors->first('name') }}</p>
              @endif
      </div>

      <div class="label">パスワード：</div>
      <div class="input-box">
        <input class="password" name="password" placeholder="abcd1234" value="{{ old('password')}}">
        @if ($errors->has('password'))
              <p class="error-message">{{ $errors->first('password') }}</p>
              @endif
      </div>

      <li class="form-item">
     <p class="form-item-title">登録日１</p>
     <select name="birthday_year">
       <option value="">-</option>
       {{ MyFunction::yearSelect() }}
     </select>
     年
     <select name="birthday_year">
       <option value="">-</option>
       {{ MyFunction::monthSelect() }}
     </select>
     月
     <select name="birthday_year">
       <option value="">-</option>
       {{ MyFunction::daySelect() }}
     </select>
     日
  </li>

      <div class="label">登録日：</div>
      <select id="year" name="year">
        <option value="">---</option>
        <?php $years = array_reverse(range(today()->year - 100, today()->year)); ?>
        @foreach($years as $year)
          <option
              value="{{ $year }}"
              {{ old('year') == $year ? 'selected' : '' }}
          >{{ $year }}</option>
        @endforeach
      </select>
      <label for="year">年</label>

      <select id="month" name="month">
        <option value="">---</option>
        @foreach(range(1, 12) as $month)
          <option
              value="{{ $month }}"
              {{ old('month') == $month ? 'selected' : '' }}
          >{{ $month }}</option>
        @endforeach
      </select>
      <label for="month">月</label>

      <select id="day" name="day" data-old-value="{{ old('day') }}"></select>
      <label for="day">日</label>
      <input type="date" class="created_at" name="created_at" value="{{ old('created_at')}}">
      <input type="date" class="created_at" value="{{ old('created_at')}}">
      <div class="btn-contents">
        <button>登　録</button>
      </div>
    </div>

  </form>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/date.js') }}"></script>
@include('layouts/footer')
