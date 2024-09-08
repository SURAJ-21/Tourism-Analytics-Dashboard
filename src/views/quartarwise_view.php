<?php

require_once('../../config/database.php');

$table='country_quater_wise_visitors';

if (isset($_GET['country'])) {
    $country = $_GET['country'];
    // Use $country as needed
    // echo "Country Name: " . $country;
} else {
    echo "Country name not provided.";
}

$first = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 1st  (Jan-March)` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $first[] = array("label" => $year, "y" => $row["$year 1st  (Jan-March)"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
$second = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 2nd  (Apr-June)` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $second[] = array("label" => $year, "y" => $row["$year 2nd  (Apr-June)"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$third = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 3rd  (July-Sep)` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $third[] = array("label" => $year, "y" => $row["$year 3rd  (July-Sep)"]);
    } else {
        echo "Error: " . mysqli_error($con);
    }
}$fourth = array();
for ($year = 2014; $year <= 2020; $year++) {

    $query = "SELECT `$year 4th  (Oct-Dec)` FROM `$table` WHERE `Country of Nationality` = '$country'";
    $result = mysqli_query($con, $query); 
    if ($result) {
        $row = mysqli_fetch_assoc($result);
     
        $fourth[] = array("label" => $year, "y" => $row["$year 4th  (Oct-Dec)"]);
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
		text: "Quartarwise visitors Distribution from :  <?php echo $country; ?>"
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
			name: "1st (Jan-March)",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($first, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "2nd (Apr-Jun)",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($third, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "3rd (Jul-Sept)",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($second, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn",
			name: "4th (Oct-Dec)",
			showInLegend: true,
			yValueFormatString: "##.##'%'",
			dataPoints: <?php echo json_encode($fourth, JSON_NUMERIC_CHECK); ?>
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