@include('layouts/header')
<div class="">
@foreach($data as $key)
  <p>患者情報</p>
  <p>患者番号：</p>
  <p>{{$key->number}}</p>
  <p>名前：</p>
  <p>{{$key->name}}</p>
  <p>生年月日：</p>
  <p>{{$key->birth}}</p>
  <p>性別：</p>
  <p>{{$key->gender}}</p>
  @endforeach
</div>
<div class="">
  <p>PD</p>
  <p>右上：</p>
  <p>左上</p>
  <p>右下</p>
  <p>左下</p>
  <p>業務内容</p>
  <p>{{ $contents->contents }}</p>
  <p>ひとこと</p>
  <p>{{ $contents->memo }}</p>
</div>
{{-- @if($roletype_id <= ($item->roletype_id))
  <form action="/users/{{$item->id}}" method='post'>
       {{ csrf_field() }}
       {{ method_field('DELETE') }}
           <input type="submit" name="delete" value="削除" onClick="delete_alert(event);return false;">
  </form>
@endif --}}
<button onclick=location.href="/contents_edit/{{$contents->id}}">編　集</button>
<input type="submit" name="delete" value="削　除" onClick="delete_alert(event);return false;">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/alert.js') }}"></script>
@include('layouts/footer')
