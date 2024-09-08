<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP WEBSITE</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <style>
     *{ padding: 0; margin: 0; }

    body {
      background-image: url('../images/trav.jpg');
      background-size: cover;
      /* background-position: center; */
      font-family: Arial, sans-serif;
      /* color: #111; */
      color: black;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      /* border-radius: 10px; */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
      margin: 20px;
    }

    label {
      margin:5px;
      display: block;
      /* margin-bottom: 5px; */
    }

    select {
      width: 20%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      background-color: #fff;
    }

    input[type="text"] {
      width: 20%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      background-color: #fff;
    }

    input[type="submit"] {
      width: 40%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
</style>
</head>
<body>
  

<!-- <img class="h-auto max-w-full" src="bckgnd.jpg" alt="image description"> -->
<form action="router.php" >

    <label for="country"><h5 class="text-xl font-bold dark:text-white">Country of Nationality</h5></label>
      <select id="country" name="country">
        <option value="Nil">Select</option>
        <option value="Canada">Canada</option>
        <option value="United States Of America">United States Of America</option>
        <option value="Argentina">Argentina</option>
        <option value="Brazil">Brazil</option>
        <option value="Mexico">Mexico</option>
        <option value="Austria">Austria</option>
        <option value="Belgium">Belgium</option>
        <option value="Denmark">Denmark</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="Greece">Greece</option>
        <option value="Ireland">Ireland</option>
        <option value="Italy">Italy</option>
        <option value="Netherlands">Netherlands</option>
        <option value="Norway">Norway</option>
        <option value="Portugal">Portugal</option>
        <option value="Spain">Spain</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="United Kingdom">United Kingdom</option>
        <option value="Czech Rep.">Czech Rep.</option>
        <option value="Hungary">Hungary</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Poland">Poland</option>
        <option value="Russian Federation">Russian Federation</option>
        <option value="Ukraine">Ukraine</option>
        <option value="Egypt">Egypt</option>
        <option value="Kenya">Kenya</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Nigeria">Nigeria</option>
        <option value="South Africa">South Africa</option>
        <option value="Sudan">Sudan</option>
        <option value="Tanzania">Tanzania</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Iraq">Iraq</option>
        <option value="Israel">Israel</option>
        <option value="Oman">Oman</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Turkey">Turkey</option>
        <option value="United Arab Emirates">United Arab Emirates</option>
        <option value="Yemen">Yemen</option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Iran">Iran</option>
        <option value="Maldives">Maldives</option>
        <option value="Nepal">Nepal</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Philippines">Philippines</option>
        <option value="Singapore">Singapore</option>
        <option value="Thailand">Thailand</option>
        <option value="Vietnam">Vietnam</option>
        <option value="China">China</option>
        <option value="Japan">Japan</option>
        <option value="Korea (Republic Of)">Korea (Republic Of)</option>
        <option value="Republic Of China Taiwan">Republic Of China Taiwan</option>
        <option value="Australia">Australia</option>
        <option value="New Zealand">New Zealand</option>
      </select>
      <input type="text" id="selectedOption1" name="countryt1">

      <script>
      document.getElementById('country').addEventListener('change', function() {
        var selectedOption = document.getElementById('country').value;
        var textBox = document.getElementById('selectedOption1');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
      <br>
    
    
      <label for="year"><h5 class="text-xl font-bold dark:text-white">Year</h5></label>
      <select id="year" name="year">
        <option value="Nil">Select</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
      </select>
      <input type="text" id="selectedOption2" name="yeart2">

      <script>
      document.getElementById('year').addEventListener('change', function() {
        var selectedOption = document.getElementById('year').value;
        var textBox = document.getElementById('selectedOption2');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
        <br>
    
    <label for="quartar"><h5 class="text-xl font-bold dark:text-white">Quartar</h5></label>
      <select id="quartar" name="quartar">
        <option value="Nil">Select</option>
        <option value="1st  (Jan-March)">1(Jan-March)</option>
        <option value="2nd  (Apr-June)">2(Apr-June)</option>
        <option value="3rd  (July-Sep)">3(July-Sep)</option>
        <option value="4th  (Oct-Dec)">4(Oct-Dec)</option>
      </select>
      <input type="text" id="selectedOption3" name="quartart3">

      <script>
      document.getElementById('quartar').addEventListener('change', function() {
        var selectedOption = document.getElementById('quartar').value;
        var textBox = document.getElementById('selectedOption3');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
        <br>
    <label for="airport"><h5 class="text-xl font-bold dark:text-white">Airport</h5></label>
      <select id="airport" name="airport">
        <option value="Nil">Select</option>
        <option value="Delhi">Delhi</option>
        <option value="Mumbai">Mumbai</option>
        <option value="Chennai">Chennai</option>
        <option value="Calicut">Calicut</option>
        <option value="Benguluru">Bengaluru</option>
        <option value="Kolkata">Kolkata</option>
        <option value="Hyderabad">Hyderabad</option>
        <option value="Cochin">Cochin</option>
      </select>
      <input type="text" id="selectedOption4" name="airportt4">

      <script>
      document.getElementById('airport').addEventListener('change', function() {
        var selectedOption = document.getElementById('airport').value;
        var textBox = document.getElementById('selectedOption4');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
      <br>
    <label for="Gender"><h5 class="text-xl font-bold dark:text-white">Gender</h5></label>
      <select id="gender" name="gender">
        <option value="Nil">Select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      <input type="text" id="selectedOption5" name="gendert5">

      <script>
      document.getElementById('gender').addEventListener('change', function() {
        var selectedOption = document.getElementById('gender').value;
        var textBox = document.getElementById('selectedOption5');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
      <br>
    <label for="means of transport"><h5 class="text-xl font-bold dark:text-white">Modes</h5></label>
      <select id="means" name="means">
        <option value="Nil">Select</option>
        <option value="AIR">Air</option>
        <option value="SEA">Sea</option>
        <option value="RAIL">Rail</option>
        <option value="LAND">Land</option>
      </select>
      <input type="text" id="selectedOption6" name="meanst6" >

        <script>
        document.getElementById('means').addEventListener('change', function() {
          var selectedOption = document.getElementById('means').value;
          var textBox = document.getElementById('selectedOption6');
          textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
        });
        </script>
      <br>
  
  
    <label for="age"><h5 class="text-xl font-bold dark:text-white">Age Group</h5></label>
      <select id="age" name="age">
        <option value="Nil">Select</option>
        <option value="0-14">0-14</option>
        <option value="15-24">15-24</option>
        <option value="25-34">25-34</option>
        <option value="35-44">35-44</option>
        <option value="45-54">45-54</option>
        <option value="55-64">55-64</option>
        <option value="65 AND ABOVE">65+</option>
      </select>
      <input type="text" id="selectedOption7" name="aget7">

      <script>
      document.getElementById('age').addEventListener('change', function() {
        var selectedOption = document.getElementById('age').value;
        var textBox = document.getElementById('selectedOption7');
        textBox.value += selectedOption + ':'; // Append the selected option to the existing value with a space
      });
      </script>
      <br>
    

    
      
    <input type="submit" button type="button" value="Send" name="send" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"></button>
    <!-- <br><input type="submit" value="Send" name="send"> -->
</form>
  

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
