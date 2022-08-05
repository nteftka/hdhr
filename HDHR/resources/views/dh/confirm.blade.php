@include('layouts/header')
<h1>投稿内容確認</h1>
<div class="create-confirm">
  <form action="/main" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <input type="hidden" name="number" value="{{$number}}">
    <input type="hidden" name="name" value="{{$name}}">
    <input type="hidden" name="kana" value="{{$kana}}">
    <input type="hidden" name="gender" value="{{$gender}}">
    <input type="hidden" name="birth" value="{{$birth}}">
    <input type="hidden" name="date" value="{{$date}}">
    <input type="hidden" name="rup_pd" value="{{$rup_pd}}">
    <input type="hidden" name="lup_pd" value="{{$lup_pd}}">
    <input type="hidden" name="run_pd" value="{{$run_pd}}">
    <input type="hidden" name="lun_pd" value="{{$lun_pd}}">
    <input type="hidden" name="contents" value="{{$contents}}">
    <input type="hidden" name="memo" value="{{$memo}}">

    <section class="dh-info">
    <div class="form-item">
      <p class="form-label-2">患者番号：</p>
      <div class="">{{$number}}</div>
      <iput name="number" value="{{$number}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">名前：</p>
      <div class="">{{$name}}</div>
      <iput name="name" value="{{$name}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">フリガナ：</p>
      <div class="">{{$kana}}</div>
      <iput name="kana" value="{{$kana}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">生年月日：</p>
      <div class="">{{$birth}}</div>
      <iput name="birth" value="{{$birth}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">性別：</p>
      @if($gender === '1')
      <div class="">女</div>
      @else
      <div class="">男</div>
      @endif
      <iput name="gender" value="{{$gender}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">診療日</p>
      <div class="">{{$date}}</div>
      <iput name="date" value="{{$date}}" type="hidden">
    </div>
  </section>

  <section class="confirm">
    <div class="form-item">
      <p class="form-label-2">PD</p>
      <p class="form-label-2">右上</p>
      @if($rup_pd === "1")
      <div class="">1~2</div>
      @elseif($rup_pd === "2")
      <div class="">3~4</div>
      @elseif($rup_pd === "3")
      <div class="">5~6</div>
      @endif
      <iput name="rup_pd" value="{{$rup_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">左上</p>
      @if($lup_pd === "1")
      <div class="">1~2</div>
      @elseif($lup_pd === "2")
      <div class="">3~4</div>
      @elseif($lup_pd === "3")
      <div class="">5~6</div>
      @endif
      <iput name="lup_pd" value="{{$lup_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">右下</p>
      @if($run_pd === "1")
      <div class="">1~2</div>
      @elseif($run_pd === "2")
      <div class="">3~4</div>
      @elseif($run_pd === "3")
      <div class="">5~6</div>
      @endif
      <iput name="run_pd" value="{{$run_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">左下</p>
      @if($lun_pd === "1")
      <div class="">1~2</div>
      @elseif($lun_pd === "2")
      <div class="">3~4</div>
      @elseif($lun_pd === "3")
      <div class="">5~6</div>
      @endif
      <iput name="lun_pd" value="{{$lun_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">診療内容</p>
      <div class="">{!! nl2br(htmlspecialchars($contents)) !!}</div>
      <iput name="contents" value="{{$contents}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">患者様へ</p>
      <div class="">{!! nl2br(htmlspecialchars($memo)) !!}</div>
      <iput name="memo" value="{{$memo}}" type="hidden">
    </div>

    <div class="btn-contents2">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="編　集">
      <button type="submit" name="action" class="btn-confirm" value="submit">登　録</button>
    </div>
  </form>
</section>
</div>
@include('layouts/footer')
