<?php

require_once('../../config/database.php');

$table='country_wise_gender';

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    // Use $country as needed
    // echo "Country Name: " . $country;
} else {
    echo "Country name not provided.";
}

$Male = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Male` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Male[] = array("label" => $year, "y" => $row["$year Male"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$Female = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Female` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Female[] = array("label" => $year, "y" => $row["$year Female"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
// foreach ($Male as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($Female as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($third as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($fourth as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }

?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Gender wise Visitors Distribution from :  <?php echo $country; ?>"
	},
	theme: "light2",
	animationEnabled: true,
	toolTip:{
		shared: true,
		reversed: true
	},
	axisY: {
        title: "Percentage People Visited",
        suffix: " %",
        minimum: 0,
        maximum: 100
    },
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
		{
			type: "stackedColumn",
			name: "Female",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Female, JSON_NUMERIC_CHECK); ?>
		},
		{
			type: "stackedColumn",
			name: "Male",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Male, JSON_NUMERIC_CHECK); ?>
		}
	]
});

// yValueFormatString: "##.##'%'",

chart.render();
 
function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 650px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html> 