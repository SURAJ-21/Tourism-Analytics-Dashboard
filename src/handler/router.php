<style>
    .country-box {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        /* background-color:#ccc; */
        color:#000ccc;
        /* background-image: url('bck_img.jpg'); */
        background-image: url('../images/back_final1.jpg');
        background-size: cover;
        background-position: center;
    }

    .country-name {
        font-size: 38px;
        font-weight: bold;
        margin-bottom: 10px;
        color:green;
    }
    .country-head {
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 10px;
        color:#00008B;
        
    }
    .country-data {
        font-size: 20px;
        padding-left: 20px; /* Indent the data for better readability */
    }

    .row {
        display: flex;
        margin-bottom: 5px;
    }

    .row-header {
        width: 400px;
        font-weight: bold;
        color:brown;
    }

    .row-value {
        font-weight: bold;
        flex: 1;
    }
    .country-box a {
    text-decoration: none; /* Remove underline */
    color: inherit; /* Inherit color from parent */
    cursor: pointer; /* Change cursor to pointer on hover */
   }

</style>

<?php
require_once('..\..\config\database.php');

function generateConditions($yearArray, $paraArray) {
    $conditions = array();
    
    foreach ($yearArray as $yearValue) {
        foreach ($paraArray as $paraValue) {
            if (!empty($yearValue) && !empty($paraValue)) {
                $conditions[] = "`$yearValue $paraValue`";
            }
        }
    }
    // echo "<pre>";
    // print_r($conditions);
    // echo "</pre>";
    
    return $conditions;
}

$country = $_GET['countryt1'];
$year = $_GET['yeart2'];
$quartar = $_GET['quartart3'];
$airport = $_GET['airportt4'];
$gender = $_GET['gendert5'];
$means = $_GET['meanst6'];
$age = $_GET['aget7'];

// Now you can use the retrieved values as needed
// For example:.
// echo "Data Received :"."<br>";
// echo "Country: " . $country . "<br>";
// echo "Year: " . $year . "<br>";
// echo "Quartar: " . $quartar . "<br>";
// echo "Airport: " . $airport . "<br>";
// echo "Gender: " . $gender . "<br>";
// echo "Means of transport: " . $means . "<br>";
// echo "Age group: " . $age . "<br>";

function wrapWithQuotes($value) {
    return "'$value'";
}
// Split $year and $quartar into arrays
$countryArray = explode(":", $country);
array_pop($countryArray);
$quotedCountryArray = array_map('wrapWithQuotes', $countryArray);
$countryString = implode(',', $quotedCountryArray);
$countryString='('.$countryString.')';

$yearArray = explode(":", $year);




if(!empty($quartar)){
    $what="Quarter";
    $disp="Quarter wise";
    $Page = '..\views\quartarwise_view.php';
    $table='country_quater_wise_visitors';
    $quartarArray = explode(":", $quartar);//array_pop($quarterArray);
    $conditions = generateConditions($yearArray, $quartarArray);
}
elseif(!empty($airport)){
    $what="Airport";
    $disp="Airport wise";
    $Page = '..\views\airportwise_view.php';
    $table='country_wise_airport';
    $airportArray=explode(":", $airport);//array_pop($airportArray);
    $conditions = generateConditions($yearArray, $airportArray);
}
elseif(!empty($gender)){
    $what="Gender";
    $disp="Gender wise";
    $Page = '..\views\genderwise_view.php';
    $table='country_wise_gender';
    $genderArray=explode(":", $gender);//array_pop($genderArray);
    $conditions = generateConditions($yearArray, $genderArray);
}
elseif(!empty($means)){
    $what="Mode";
    $disp="Mode of Transportaion wise";
    $Page = '..\views\transportation_mode_view.php';
    $table='country_wise_visitors_ways';
    $meansArray=explode(":", $means);//array_pop($meansArray);
    $conditions = generateConditions($yearArray, $meansArray);
}
elseif(!empty($age)){
    $what="Age group";
    $disp="Age group wise";
    $Page = '..\views\agewise_view.php';
    $table='country_wise_age_group';
    $ageArray=explode(":", $age);//array_pop($ageArray);
    $conditions = generateConditions($yearArray, $ageArray);
}


// echo $countryString;

// Construct the SQL query dynamically with combinations of year and quartar
$query = "SELECT * FROM $table WHERE `Country of Nationality` IN $countryString AND (";


// Combine conditions with OR
$query .= implode(" OR ", $conditions) . ")";

// Execute the query
$result = mysqli_query($con, $query);


if ($result) {
    ?>
    <!-- // Fetch and display data
    // while ($row = mysqli_fetch_assoc($result)) {
    //     echo "<br>"."Country of Nationality : " . $row['Country of Nationality'] . "<br>";
    //     foreach ($conditions as $condition) {
    //         // Extract data based on column names from conditions
    //         $columnName = str_replace("`", "", $condition); // Remove backticks from column name
    //         echo $columnName . ": " . $row[$columnName] . "<br>";
    //     }
    //     // echo "<br>"; // Add a line break between rows
    // }
    // // Free result set
    // mysqli_free_result($result); -->
    <div class="country-head"><?php echo $disp." visitors distribution visited to INDIA "; ?></div>
    <div class="result-container">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="country-box">
        <a href="<?php echo $Page; ?>?country=<?php echo urlencode($row['Country of Nationality']); ?>">
        <div class="country-name"><?php echo "Country : ".$row['Country of Nationality']; ?></div>
        <div class="country-data">
            <?php foreach ($conditions as $condition) : ?>
                <?php
                // Extract data based on column names from conditions
                $columnName = str_replace("`", "", $condition); 
                list($yearvar, $whatvar) = explode(" ", $columnName,2);
                ?>
                <!-- <div class="row-header"><?php echo $columnName; ?>:</div> -->
                
                <div class="row">
                <div class="row-header"><?php echo "Year = ".$yearvar." || ".$what." = ".$whatvar."  :  "; ?></div>
                <div class="row-value"><?php echo $row[$columnName]."%"; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </a>
</div>

    <?php endwhile; ?>
</div>
<!-- </div> -->
<?php
} else {
    // Display error message
    echo "Error: " . mysqli_error($con);
}
// echo "Query :".$query;

// echo "<pre>";
// print_r($conditions);
// echo "</pre>";

  
?>
