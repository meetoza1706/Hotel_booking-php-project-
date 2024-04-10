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

    <div class="search_container">
        <div class="city"><input type="text"></div>
        <div class="inn_date"></div> <!--check_inn date-->





        <div class="out_date">check-out</div><!--check_out Date-->
        <div class="person">person</div> <!--adults and kids-->
        <button class="search-btn">Search</button>
    </div>
        
    </body>
</html>