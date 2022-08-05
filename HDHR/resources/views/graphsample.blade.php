<div class="no-print">
@include('layouts/header')
</div>

<section id="chart">
  <div class="no-print">
    <form>
      <input type="button" value="このページを印刷する" onclick="window.print();" />
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>

  <div class="chart">
    {{$kr->name}} 様
  </div>

<div class="chart">
 <canvas id="canvas" width="700"></canvas>
</div>

<script>
window.onload = function(){
const ctx = document.getElementById('canvas').getContext('2d');
const myChart = new Chart(ctx, {
  type: 'line',
  data: barChartData,
  options: complexChartOption
});
};
</script>
<script>
var barChartData ={
  labels:[
    <?php foreach($data as $key => $value): ?>
    ' {{$value->date->format('Y年m月d日')}}',
    <?php endforeach;?>
  ],
  datasets: [
    {
    label: '右上',
    data: [
      <?php foreach($data as $key => $value): ?>
      ' {{$value->rup_pd}}',
      <?php endforeach;?>
    ],
    borderColor : "#53BF9D",
    backgroundColor : "#53BF9D",
  },
  {
    label: '左上',
    data: [
      <?php foreach($data as $key => $value): ?>
      ' {{$value->lup_pd}}',
      <?php endforeach;?>
    ],
    borderColor : "#F94C66",
    backgroundColor : "#F94C66",
  },
  {
    label: '右下',
    data: [
      <?php foreach($data as $key => $value): ?>
      ' {{$value->run_pd}}',
      <?php endforeach;?>
    ],
    borderColor : "#BD4291",
    backgroundColor : "#BD4291",
  },
  {
    label: '左下',
    data: [
      <?php foreach($data as $key => $value): ?>
      ' {{$value->lun_pd}}',
      <?php endforeach;?>
    ],
    borderColor : "#FFC54D",
    backgroundColor : "#FFC54D",
  },
]
};
</script>

<script>
var complexChartOption = {
    responsive: true,
};
</script>
<section class="print">
  @foreach($data as $contents)
<table>
  <tr>
    <td>{{$contents->date->format('Y年m月d日')}}</td>
  </tr>
  <tr>
    <td>{{$contents->memo}}</td>
  </tr>
</table>
@endforeach
<div class="no-print">
  <button type="button" onClick="history.back()">戻る</button>
</div>
</section>
</section>
<div class="no-print">
@include('layouts/footer')
</div>
