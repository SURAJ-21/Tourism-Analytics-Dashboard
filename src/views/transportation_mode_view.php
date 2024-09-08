<?php

require_once('../../config/database.php');

$table='country_wise_visitors_ways';

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    // Use $country as needed
    // echo "Country Name: " . $country;
} else {
    echo "Country name not provided.";
}

$Air = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year AIR` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Air[] = array("label" => $year, "y" => $row["$year AIR"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$Sea = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year SEA` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Sea[] = array("label" => $year, "y" => $row["$year SEA"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$Rail = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year RAIL` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Rail[] = array("label" => $year, "y" => $row["$year RAIL"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$Land = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year LAND` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $Land[] = array("label" => $year, "y" => $row["$year LAND"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// foreach ($Air as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($Sea as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($Rail as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($Land as $dataPoint) {
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
		text: "Travelmeans Visitors Distribution :  <?php echo $country; ?>"
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
		// minimum: ,
        maximum: 100
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
		{
			type: "stackedColumn",
			name: "Air",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Air, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Rail",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Rail, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Sea",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Sea, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Land",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($Land, JSON_NUMERIC_CHECK); ?>
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