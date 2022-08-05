@include('layouts/header')
<h1>患者ページ</h1>
<section id="dh-info">
  <div class="addA">
    <a href="/graphsample/{{$kr->id}}">印刷</a>
  </div>
  <section class="dh-info">

    <p>患者番号</p>
    <p>{{$kr->number}}</p>
    <p>名前</p>
    <p>{{$kr->name}}</p>
    <p>性別</p>
    @if($kr->gender === 1)
    <p>女</p>
    @else
    <p>男</p>
    @endif
    <p>生年月日</p>
    <p>{{ $kr->birth->format('Y年m月d日') }}</p>
    <p>登録日</p>
    <p>{{ $kr->created_at->format('Y年m月d日') }}</p>
    <a href="/kr_edit/{{$kr->id}}">編集</a>
    <a href="/create/{{$kr->id}}">業務登録</a>
</section>
<section class="kr_info">
  <table>
    <tr>
      <th>診療日</th>
      <th>担当DH</th>
      <th>右上</th>
      <th>左上</th>
      <th>右下</th>
      <th>左下</th>
    </tr>

    @foreach($data as $content)
    <tr>
      <td>{{ $content->date->format('Y年m月d日') }}</td>
      <td>{{$content->dh_name}}</td>
      @if($content->rup_pd === 1)
      <td>1~2</td>
      @elseif($content->rup_pd === 2)
      <td>3~4</td>
      @elseif($content->rup_pd === 3)
      <td>5~6</td>
      @endif

      @if($content->lup_pd === 1)
      <td>1~2</td>
      @elseif($content->lup_pd === 2)
      <td>3~4</td>
      @elseif($content->lup_pd === 3)
      <td>5~6</td>
      @endif

      @if($content->run_pd === 1)
      <td>1~2</td>
      @elseif($content->run_pd === 2)
      <td>3~4</td>
      @elseif($content->run_pd === 3)
      <td>5~6</td>
      @endif

      @if($content->lun_pd === 1)
      <td>1~2</td>
      @elseif($content->lun_pd === 2)
      <td>3~4</td>
      @elseif($content->lun_pd === 3)
      <td>5~6</td>
      @endif
      <td>
        <a href="/contents_edit/{{$content->contents_id}}">編集</a>
      </td>
    @endforeach
  </table>
</section>
</section>

@include('layouts/footer')
