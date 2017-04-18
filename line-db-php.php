<!DOCTYPE html>
<html>
<head>
	<title> Graphs - Countries, GDP, Population </title>
	<style type="text/css">
	.chart-container{
		width: 80%;
		height: 480px;
		margin: 0 auto;
	}
	</style>
</head>
<body>

<div >

select x- axis : 
<SELECT id="x">
	
	<option value="Country">Country</option>

	<option value="GDP">GDP</option>

	<option value="Population">Population</option>
</SELECT>
</div>
<div >


select Y- axis : 
<SELECT id = "y">
	
	<option value="Country">Country</option>

	<option value="GDP">GDP</option>

	<option value="Population">Population</option>
</SELECT>
</div>

<input type="button" name=""  value="Submit" onclick="callMan()">

<div class="chart-container">
	<canvas id="lineChartCanvas"></canvas>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js" type="text/javascript" ></script>
<script type="text/javascript">
	
	function callMan(){
	$.ajax({
		url : "data.php",
		type: "GET",
		success : function (data) {
			console.log(data);
			

       getData(data);



		},
		error : function (data) {
			console.log(data);
		}
	});


}


function numericSort(a, b){
	return a - b;
}

function getData(data){
   	var x = [];
   	var y = [];
    var e = document.getElementById("x");
  	var data1 = e.options[e.selectedIndex].value;
   	var e1 = document.getElementById("y");
  	var data2 = e1.options[e1.selectedIndex].value;
  	var len = data.length;
  	//data.sort();
  	console.log(data);

  	if(data1 === "Country"){
  		for (var i = 0; i < len; i++) {
  			x.push(data[i].Country);
  		}

     }
     if(data1 === "GDP"){
       for (var i = 0; i < len; i++) {
  			x.push(data[i].GDP);
  		}
     }
     if(data1 === "Population"){ 
       for (var i = 0; i < len; i++) {
  			x.push(data[i].Population);
  		}
       }
    if(data2 === "Country"){
       for (var i = 0; i < len; i++) {
  			y.push(data[i].Country);
  		}
       }
     if(data2 === "GDP"){
		for (var i = 0; i < len; i++) {
  			y.push(data[i].GDP);
  		}       
       }
     if(data2 === "Population"){ 
       for (var i = 0; i < len; i++) {
  			y.push(data[i].Population);
  		}
       }
		if (data2 != "Country") {
	      chartMan(x, y);
		} else {
			horizontalGraph(x, y);
		}
}

function chartMan(x, y){
	 var ctx = document.getElementById("lineChartCanvas");
		var myChart = Chart.Line(ctx, {

		    data: {
		        labels:x ,
		         datasets: [
		        {
		            label: "Data",
		            fill: false,
		            lineTension: 0.1,
		            backgroundColor: "rgba(75,192,192,0.4)",
		            borderColor: "rgba(75,192,192,1)",
		            borderCapStyle: 'butt',
		            borderDash: [],
		            borderDashOffset: 0.0,
		            borderJoinStyle: 'miter',
		            pointBorderColor: "rgba(75,192,192,1)",
		            pointBackgroundColor: "#fff",
		            pointBorderWidth: 1,
		            pointHoverRadius: 5,
		            pointHoverBackgroundColor: "rgba(75,192,192,1)",
		            pointHoverBorderColor: "rgba(220,220,220,1)",
		            pointHoverBorderWidth: 2,
		            pointRadius: 1,
		            pointHitRadius: 10,
		            data:y ,
		            spanGaps: false,
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});

}

function horizontalGraph(x, y){
	 var ctx = document.getElementById("lineChartCanvas");
		var myChart = new Chart(ctx, {
			type: 'horizontalBar',
		    data: {
		        labels:y ,
		         datasets: [
		        {
		            label: "Data",
		            fill: false,
		            lineTension: 0.1,
		            backgroundColor: "rgba(75,192,192,0.4)",
		            borderColor: "rgba(75,192,192,1)",
		            borderDash: [],
		            borderDashOffset: 0.0,
		            borderJoinStyle: 'miter',
		            pointBorderColor: "rgba(75,192,192,1)",
		            pointBackgroundColor: "#fff",
		            pointBorderWidth: 1,
		            pointHoverRadius: 5,
		            pointHoverBackgroundColor: "rgba(75,192,192,1)",
		            pointHoverBorderColor: "rgba(220,220,220,1)",
		            pointHoverBorderWidth: 2,
		            pointRadius: 1,
		            pointHitRadius: 10,
		            data:x ,
		            spanGaps: false,
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});

}
</script>
</body>
</html>