@include('layouts/header')
<section id="dh-info">
  <div class="dh-info">
    <p>アカウント情報</p>
    <p>ID：{{ Auth::user()->number }}</p>
    <p>名前：{{ Auth::user()->name }}</p>
    <a href="{{ url('/password/change')}}">パスワード変更</a>
    @if(Auth::user()->admin_flg === 'admin')
    <a href="/admin_top">管理者ページ</a>
    @endif
  </div>
  <h1>業務記録一覧</h1>
  <table>
    <tr>
      <th>診療日時</th>
      <th>患者番号</th>
      <th>名前</th>
      <th>性別</th>
      <th>生年月日</th>
    </tr>
    <tr>
    @foreach($contents as $content)
      <td>
        <a href="/contents_edit/{{$content->id}}">{{ $content->date->format('Y年m月d日') }}</a>
      </td>
      <td>
        <a href="/kr_info/{{$content->kr_id}}">{{ $content->number }}</a>
      </td>
      <td>
      {{ $content->name }}
      </td>
      <td>
        @if($content->gender === '0')
        男
        @else
        女
        @endif
      </td>
      <td>
      {{ $content->birth->format('Y年m月d日') }}
      </td>
      <td>
        <a href="/contents_edit/{{$content->id}}">編集</a>
      </td>
      <td>
        <form action="/contents_delete/{{$content->id}}" method="POST">
        @csrf
        <input type="submit" class="btn-dell" value="削除" onClick="contents_alert(event);return false;">
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  <div class="paging">
</section>
<div class="page">{{ $page->links() }}</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
@yield('btn-dell') <!--削除確認処理-->
@yield('js-validation') <!--入力チェック処理-->
@include('layouts/footer')
