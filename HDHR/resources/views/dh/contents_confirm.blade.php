@include('layouts/header')
<h1>編集内容確認</h1>
<section class="dh-info">
  <form action="" method="post">
    @csrf
    <input name="kr_id" value="{{$kr_id}}" type="hidden">
    <input name="id" value="{{$id}}" type="hidden">


      <p class="form-label-2">患者番号</p>
      <p>{{$number}}</p>
      <input name="id" value="{{$number}}" type="hidden">

    <div class="form-item">
      <p class="form-label-2">名前</p>
      <div class="contents">{{$name}}</div>
      <input name="name" value="{{$name}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">フリガナ</p>
      <div class="contents">{{$kana}}</div>
      <input name="kana" value="{{$kana}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">生年月日</p>
      <div class="contents">{{$birth}}</div>
      <input name="birth" value="{{$birth}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">性別</p>
      @if($gender === '1')
      <div class="contents">女</div>
      @elseif($gender === '0')
      <div class="contents">男</div>
      @endif
      <input name="gender" value="{{$gender}}" type="hidden">
    </div>
</section>
    <div class="form-item">
      <p class="form-label-2">診療日</p>
      <div class="contents">{{$date}}</div>
      <input name="date" value="{{$date}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">PD</p>
      <p class="form-label-2">右上</p>
      @if($rup_pd === "1")
      <div class="contents">1~2</div>
      @elseif($rup_pd === "2")
      <div class="contents">3~4</div>
      @elseif($rup_pd === "3")
      <div class="contents">5~6</div>
      @endif
      <input name="rup_pd" value="{{$rup_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">左上</p>
      @if($lup_pd === "1")
      <div class="contents">1~2</div>
      @elseif($lup_pd === "2")
      <div class="contents">3~4</div>
      @elseif($lup_pd === "3")
      <div class="contents">5~6</div>
      @endif
      <input name="lup_pd" value="{{$lup_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">右下</p>
      @if($run_pd === "1")
      <div class="contents">1~2</div>
      @elseif($run_pd === "2")
      <div class="contents">3~4</div>
      @elseif($run_pd === "3")
      <div class="contents">5~6</div>
      @endif
      <input name="run_pd" value="{{$run_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">左下</p>
      @if($lun_pd === "1")
      <div class="contents">1~2</div>
      @elseif($lun_pd === "2")
      <div class="contents">3~4</div>
      @elseif($lun_pd === "3")
      <div class="contents">5~6</div>
      @endif
      <input name="lun_pd" value="{{$lun_pd}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">診療内容</p>
      <div class="contents">{!! nl2br(htmlspecialchars($contents)) !!}</div>
      <input name="contents" value="{{$contents}}" type="hidden">
    </div>

    <div class="form-item">
      <p class="form-label-2">患者様へ</p>
      <div class="contents">{!! nl2br(htmlspecialchars($memo)) !!}</div>
      <input name="memo" value="{{$memo}}" type="hidden">
    </div>

    <div class="btn-contents">
      <input type="button" name="btn_confirm" onclick="history.back()" class="btn_confirm2" value="編　集">
      <button type="submit" name="action" class="btn-confirm" value="submit">登　録</button>
    </div>
  </form>
</div>
@include('layouts/footer')
