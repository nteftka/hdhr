@include('layouts/header')
<h1>患者番号検索</h1>
<div class="searchBox">
  <form action="{{route('search')}}" method="GET">
    <input type="text" placeholder="患者番号を入力" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検 索" class="searchBtn">
  </form>
</div>

<section id="dh-info">
<h2>患者一覧</h2>
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

  @forelse($posts as $post)
  <tr>
    <td><a href="/kr_info/{{$post->id}}">{{ $post->number }}</a></td>
    <td>{{ $post->name }}</td>
    @if($post->gender === 1)
    <td>女</td>
    @elseif($post->gender === 0)
    <td>男</td>
    @endif
    <td>{{ $post->birth->format('Y年m月d日') }}</td>
    <td><a href="/create/{{$post->id}}">業務登録</a></td>
  </tr>
  @empty
  <td>登録がありません</td>
</tr>
@endforelse
</table>
</section>
<div class="page">{{ $page->links() }}</div>
@include('layouts/footer')
