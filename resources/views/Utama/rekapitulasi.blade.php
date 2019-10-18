@extends('layouts.master')

@section('title','Rekapitulasi')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{url('utama/chart.css')}}">

@endsection


@section('nav')
@include('partials._nav')
@endsection

@section('main')
<div class="main m-chart">
	<div class="row" style="display: block;">
		<div class="col-3">
			<button type="button"  style="position: absolute; background-color: white;color: black;z-index: 2"   class="btn btn-rt btn-dark pilih">RT</button><button type="button" style="position:  absolute;left: 90px;z-index: 1" class="btn btn-rw btn-dark pilih">RW</button><br><br><br>
		</div>
	</div>
	<div class="chart-rt" style="text-align: center;">
       
       


      

  		<canvas id="canvas" width="900" height="400">
    No Love for HTML5 eh?
  		</canvas>
  		
	</div>
	<div class="chart-rw hilang" style="text-align: center;">
  		 <script> var myData2= [];var nama = [];</script>
      <?php foreach ($rt as $item): ?>
        <script>  
        myData.push(<?= $item->suara ?>);
        
        </script>


      <?php endforeach ?>
  		<canvas id="canvas2" width="900" height="400">
    No Love for HTML5 eh?
  		</canvas>
  		
	</div>


</div>




@endsection

@section('script')
 

 <script type="text/javascript" src="{{url('utama/rekapitulasi2.js')}}"></script>

<script>  var myColor = ["red","white","#f0c330","#3999d8","#35485d"];

var myData = [];
var myLabel = [];

@foreach($rt as $item)
myData.push({{$item->suara}});
var nama = '{{$item->getCalon->nama}}';
nama = nama.split(" ",1);
myLabel.push(nama);

@endforeach
function getTotal(){
  var myTotal = 0;
  for (var j = 0; j < myData.length; j++) {
    myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
  }
  return myTotal;
}

function plotData() {
  var canvas;
  var ctx;
  var lastend = 0;
  var myTotal = getTotal();
  var doc;
  canvas = document.getElementById("canvas");
  var x = (canvas.width)/2;
  var y = (canvas.height)/2;
  var r = 150;
  
  ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  for (var i = 0; i < myData.length; i++) {
    ctx.fillStyle = myColor[i];
    ctx.beginPath();
    ctx.moveTo(x,y);
    ctx.arc(x,y,r,lastend,lastend+(Math.PI*2*(myData[i]/myTotal)),false);
    ctx.lineTo(x,y);
    ctx.fill();
    
    // Now the pointers
    ctx.beginPath();
    var start = [];
    var end = [];
    var last = 0;
    var flip = 0;
    var textOffset = 0;
    var precentage = (myData[i]/myTotal)*100;
    start = getPoint(x,y,r-20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
    end = getPoint(x,y,r+20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
    if(start[0] <= x)
    {
      flip = -1;
      textOffset = -230;
    }
    else
    {
      flip = 1;
      textOffset = 10;
    }
    ctx.moveTo(start[0],start[1]);
    ctx.lineTo(end[0],end[1]);
    ctx.lineTo(end[0]+120*flip,end[1]);
    ctx.strokeStyle = "#bdc3c7";
    ctx.lineWidth   = 4;
    ctx.stroke();
    // The labels
    ctx.font="30px Arial";
    ctx.fillText(myLabel[i]+" "+precentage.toFixed(2)+"%",end[0]+textOffset,end[1]-4); 
    // Increment Loop
    lastend += Math.PI*2*(myData[i]/myTotal);
    
  }
}
// Find that magical point
function getPoint(c1,c2,radius,angle) {
  return [c1+Math.cos(angle)*radius,c2+Math.sin(angle)*radius];
}
// The drawing
plotData();</script>

<script>  
var myColor = ["red","white","#f0c330","#3999d8","#35485d"];
var myData = [];
var myLabel = [];
@foreach($rw as $item)
myData.push({{$item->suara}});

var nama = '{{$item->getCalon->nama}}';
nama = nama.split(" ",1);
myLabel.push(nama);
@endforeach


function getTotal(){
  var myTotal = 0;
  for (var j = 0; j < myData.length; j++) {
    myTotal += (typeof myData[j] == 'number') ? myData[j] : 0;
  }
  return myTotal;
}

function plotData() {
  var canvas;
  var ctx;
  var lastend = 0;
  var myTotal = getTotal();
  var doc;
  canvas = document.getElementById("canvas2");
  var x = (canvas.width)/2;
  var y = (canvas.height)/2;
  var r = 150;
  
  ctx = canvas.getContext("2d");
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  for (var i = 0; i < myData.length; i++) {
    ctx.fillStyle = myColor[i];
    ctx.beginPath();
    ctx.moveTo(x,y);
    ctx.arc(x,y,r,lastend,lastend+(Math.PI*2*(myData[i]/myTotal)),false);
    ctx.lineTo(x,y);
    ctx.fill();
    
    // Now the pointers
    ctx.beginPath();
    var start = [];
    var end = [];
    var last = 0;
    var flip = 0;
    var textOffset = 0;
    var precentage = (myData[i]/myTotal)*100;
    start = getPoint(x,y,r-20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
    end = getPoint(x,y,r+20,(lastend+(Math.PI*2*(myData[i]/myTotal))/2));
    if(start[0] <= x)
    {
      flip = -1;
      textOffset = -230;
    }
    else
    {
      flip = 1;
      textOffset = 10;
    }
    ctx.moveTo(start[0],start[1]);
    ctx.lineTo(end[0],end[1]);
    ctx.lineTo(end[0]+120*flip,end[1]);
    ctx.strokeStyle = "#bdc3c7";
    ctx.lineWidth   = 4;
    ctx.stroke();
    // The labels
    ctx.font="30px Arial";
    ctx.fillText(myLabel[i]+" "+precentage.toFixed(2)+"%",end[0]+textOffset,end[1]-4); 
    // Increment Loop
    lastend += Math.PI*2*(myData[i]/myTotal);
    
  }
}
// Find that magical point
function getPoint(c1,c2,radius,angle) {
  return [c1+Math.cos(angle)*radius,c2+Math.sin(angle)*radius];
}
// The drawing
plotData();</script>


@endsection