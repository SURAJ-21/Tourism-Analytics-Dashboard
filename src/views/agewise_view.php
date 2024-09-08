<?php

require_once('../../config/database.php');

$table='country_wise_age_group';

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    // Use $country as needed
    // echo "Country Name: " . $country;
} else {
    echo "Country name not provided.";
}

$first = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 0-14` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $first[] = array("label" => $year, "y" => $row["$year 0-14"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$second = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 15-24` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $second[] = array("label" => $year, "y" => $row["$year 15-24"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$third = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 25-34` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $third[] = array("label" => $year, "y" => $row["$year 25-34"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$fourth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 35-44` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $fourth[] = array("label" => $year, "y" => $row["$year 35-44"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$fifth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 45-54` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $fifth[] = array("label" => $year, "y" => $row["$year 45-54"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$sixth= array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 55-64` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $sixth[] = array("label" => $year, "y" => $row["$year 55-64"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

$seventh = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 65 AND ABOVE` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $seventh[] = array("label" => $year, "y" => $row["$year 65 AND ABOVE"]);
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
		text: "Agewise Visitors Distribution from :  <?php echo $country; ?>"
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
			name: "0-14 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($first, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "15-24 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($third, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "25-34 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($second, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "35-44 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($fourth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "45-54 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($fifth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: "55-64 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($sixth, JSON_NUMERIC_CHECK); ?>
		}
		,{
			type: "stackedColumn",
			name: ">=65 yr",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($seventh, JSON_NUMERIC_CHECK); ?>
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