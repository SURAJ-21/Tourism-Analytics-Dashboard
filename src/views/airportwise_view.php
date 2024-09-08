<?php

require_once('../../config/database.php');

$table='country_wise_airport';

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    // Use $country as needed
    // echo "Country Name: " . $country;
} else {
    echo "Country name not provided.";
}

$first = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Delhi` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $first[] = array("label" => $year, "y" => $row["$year Delhi"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$second = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Mumbai` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $second[] = array("label" => $year, "y" => $row["$year Mumbai"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$third = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Chennai` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $third[] = array("label" => $year, "y" => $row["$year Chennai"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$fourth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Calicut` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $fourth[] = array("label" => $year, "y" => $row["$year Calicut"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$fifth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Benguluru` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $fifth[] = array("label" => $year, "y" => $row["$year Benguluru"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$sixth= array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Kolkata` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $sixth[] = array("label" => $year, "y" => $row["$year Kolkata"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$seventh = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Hyderabad` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $seventh[] = array("label" => $year, "y" => $row["$year Hyderabad"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$eighth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year Cochin` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $eighth[] = array("label" => $year, "y" => $row["$year Cochin"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// foreach ($first as $dataPoint) {
//     echo "Year: " . $dataPoint['label'] . ", Value: " . $dataPoint['y'] . "<br>";
// }
// foreach ($second as $dataPoint) {
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
		text: "Airport Wise Visitors Distribution from :  <?php echo $country; ?>"
	},
	theme: "light20",
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
			name: "Delhi",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($first, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Mumbai",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($third, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Chennai",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($second, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "Calicut",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($fourth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "Benguluru",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($fifth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "kolkata",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($sixth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "Hyderabad",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($seventh, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "Cochin",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($eighth, JSON_NUMERIC_CHECK); ?>
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
<div id="chartContainer" style="height: 650px; width: 100%;margin: 0 auto"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html> 