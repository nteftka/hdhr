@include('layouts/admin_header')
  <h1>スタッフ一覧</h1>
  <div class="staff-info">
  @if(!empty($data) && $data->count())
  @foreach($data as $key => $value)
  <div class="profile">
    <div class="id">
      <a href="/admin_edit/{{ $value->id }}">{{ $value->number }}</a>
    </div>
    <p>{{ $value->name }}</p>
    <p>{{ $value->updated_at->format('Y年m月d日') }}</p>
    <a href="/admin_edit/{{ $value->id }}">編集</a>
    <form action="/admin_delete/{{$value->id}}" method="post">
      @csrf
      <input type="submit" name="delete" value="削除" class="btn-dell" onClick="delete_dh_alert(event);return false;">
    </form>
  </div>
  @endforeach
  @endif
</div>
<div class="page">{!! $data->links() !!}</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
  @include('layouts/footer')
