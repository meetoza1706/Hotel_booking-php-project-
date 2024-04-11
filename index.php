<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Booking system</title>
        <link rel="stylesheet" href="main.css"> 
    </head>
    <body>
        <!-- navbar -->
        <?php
        include 'navbar.php';
        ?>

    <div class="heading"><h1 class="heading_text">Hotel Booking System</h1></div> 
    
    
    <form method="post" action="#">
    <div class="search_container">
        <div class="city"><select id="city" class="city_content" name="city" placeholder="City">
            <option value="City">City</option>
            <option value="Ahmedabad">Ahmedabad</option>
        </select></div>
        <div class="inn_date"><label for="check-in" class="check-in-label">Check-in: </label>
          <input type="date" id="check-in" name="check-in" class="check-in">
          </div> <!--check_inn date-->
        <div class="out_date"><label for="check-out" class="check-in-label">Check-out: </label>
          <input type="date" id="check-out" name="check-out" class="check-in"></div><!--check_out Date-->
        <div class="person"><label for="person" class="person_label">persons:</label><input type="number" name="person" placeholder="persons" class="person_number" min="0" max="30" ></div> <!--adults and kids-->
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
}


//clear the variables after refreshing to avoid overwriting.
unset($city, $check_in, $check_out, $persons);

?>
