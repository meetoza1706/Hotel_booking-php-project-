<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Booking system</title>
        <link rel="stylesheet" href="main.css"> 
        <link rel="icon" href="favcon.png">
    </head>
    <body>
        <!-- navbar -->
        <?php
        include 'navbar.php';
        ?>

    <div class="heading"><h1 class="heading_text">Hotel Booking System</h1></div> 
    
    
    <form method="post" action="#">
    <div class="search_container">
        <div class="city"><select id="city" class="city_content" name="city" required placeholder="City">
            <option value="city">City</option>
            <option value="ahmedabad">Ahmedabad</option>
        </select></div>
        <div class="inn_date"><label for="check-in" class="check-in-label">Check-in: </label>
          <input type="date" id="check-in" name="check-in" class="check-in" required>
          </div> <!--check_inn date-->
        <div class="out_date"><label for="check-out" class="check-in-label">Check-out: </label>
          <input type="date" id="check-out" name="check-out" class="check-in" required></div><!--check_out Date-->
        <div class="person"><label for="person" class="person_label">persons:</label>
        <input type="number" name="person" placeholder="persons" class="person_number" min="0" max="30" required>
        </div> <!--adults and kids-->
        <button class="search-btn" type="submit">Search</button>
        </div>
    </div>
    </form>
    
    </body>
</html>

<!-- php code from here -->

<?php

$city = "";
$check_in = "";
$check_out = "";
$persons = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving values from the form
    $city = $_POST['city'];
    $check_in = $_POST['check-in'];
    $check_out = $_POST['check-out'];
    $persons = $_POST['person'];

    // Echoing the values
    echo "City: " . $city . "<br>";
    echo "Check-in Date: " . $check_in . "<br>";
    echo "Check-out Date: " . $check_out . "<br>";
    echo "Number of Persons: " . $persons . "<br>";

    // Convert check-in date to day, month, and year
    $check_in_day = date('d', strtotime($check_in));
    $check_in_month = date('m', strtotime($check_in));
    $check_in_year = date('Y', strtotime($check_in));

    // Echoing the day, month, and year
    echo "Check-in Day: " . $check_in_day . "<br>";
    echo "Check-in Month: " . $check_in_month . "<br>";
    echo "Check-in Year: " . $check_in_year . "<br>";

    $check_out_day = date('d', strtotime($check_out));
    $check_out_month = date('m', strtotime($check_out));
    $check_out_year = date('Y', strtotime($check_out));

    echo "Check-out Day: " . $check_out_day . "<br>";
    echo "Check-out Month: " . $check_out_month . "<br>";
    echo "Check-out Year: " . $check_out_year . "<br>";    

}

// Clear the variables after refreshing to avoid overwriting.
unset($city, $check_in, $check_out, $persons);

?>
