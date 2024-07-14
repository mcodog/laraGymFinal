@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-light bg-dark border border-secondary">
                <div class="card-header">{{ __('Analytics') }}</div>

                <div class="card-body">
                <script>
					window.onload = function() {

					var dataPoints = [];

					var options =  {
						animationEnabled: true,
						theme: "light2",
						title: {
							text: "Daily Sales Data"
						},
						axisX: {
							valueFormatString: "MMM YYYY",
						},
						axisY: {
							title: "PHP",
							titleFontSize: 24
						},
						data: [{
							type: "spline", 
							yValueFormatString: "P#,###.##",
							dataPoints: dataPoints
						}]
					};

					function addData(data) {
						for (var i = 0; i < data.length; i++) {
							dataPoints.push({
								x: new Date(data[i].date),
								y: data[i].units
							});
						}
						$("#chartContainer").CanvasJSChart(options);

					}

					$.getJSON("http://127.0.0.1:8000/api/sales", addData);

					$.ajax({
							type: "GET",
							url: "/api/applicants",
							dataType: 'json',
							success: function (data) {
								console.log(data);
								$.each(data, function (key, value) {
									console.log(data)
									var options2 = {
						animationEnabled: true,
						title: {
							text: "Applicants to Program",                
							fontColor: "Peru"
						},	
						axisY: {
							tickThickness: 0,
							lineThickness: 0,
							valueFormatString: " ",
							includeZero: true,
							gridThickness: 0                    
						},
						axisX: {
							tickThickness: 0,
							lineThickness: 0,
							labelFontSize: 18,
							labelFontColor: "Peru"				
						},
						data: [{
							indexLabelFontSize: 26,
							toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
							indexLabelPlacement: "inside",
							indexLabelFontColor: "white",
							indexLabelFontWeight: 600,
							indexLabelFontFamily: "Verdana",
							color: "#62C9C3",
							type: "bar",
							dataPoints: data
						}]
					};

$("#chartContainer2").CanvasJSChart(options2);
            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

	$.ajax({
							type: "GET",
							url: "/api/members",
							dataType: 'json',
							success: function (data) {
								console.log(data);
								$.each(data, function (key, value) {
									console.log(data)
									var options3 = {
	title: {
		text: "Number of Members per Membership Class"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: data
	}]
};
$("#chartContainer3").CanvasJSChart(options3);
            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });




}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
<br>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<br>

<div id="chartContainer3" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
@endsection