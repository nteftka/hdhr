@include('layouts/header')
<h1>患者一覧ページ</h1>
<section id="dh-info">
  <div class="addA">
    <a href="{{ route('kr_add') }}">患者登録</a>
  </div>
<table>
  <tr>
    <th>患者番号</th>
    <th>名前</th>
    <th>性別</th>
    <th>生年月日</th>
  </tr>
  <tr>
  @foreach($kr as $key=>$content)
    <td>
      <a href="/kr_info/{{$content->id}}">{{ $content->number }}</a>
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
      <a href="/kr_edit/{{$content->id}}">編集</a>
    </td>
    <td>
      <form action="/kr_delete/{{$content->id}}" method="POST">
      @csrf
      <input type="submit" class="btn-dell" value="削除" onClick="contents_alert(event);return false;">
      </form>
    </td>
    <td><a href="/create/{{$content->id}}">業務登録</a></td>
  </tr>
  @endforeach
</table>
</section>
<div class="paging">
<div class="page">{{ $kr->links() }}</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
@include('layouts/footer')
