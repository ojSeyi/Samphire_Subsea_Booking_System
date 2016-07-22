<!DOCTYPE html>
<html lang="en">
<?php include ("db_connection.php"); ?>
<?php session_start();

?>
<head>
    <meta charset="UTF-8">
    <title>Samphire-Subsea: Facility Reservation</title>
    <link rel="stylesheet" href="assets/stylesheet.css">
    <link rel="stylesheet" href="assets/unsemantic-grid-responsive-tablet.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta name="viewpoint"
          content="width=device-width,
          initial-scale=1,
          minimum-scale=1,
          maximum-scale=1"/>
</head>
<head>
    <meta charset="UTF-8">
    <title>Samphire Subsea Facilities Booking</title>
</head>
<body>
<header>
    <img src="assets/images/logo_2016.jpg" id="logo"/>
    <div id="form">
        <form method="post" action="login.php">
            <input type="text" name="username" id="usernamebox" placeholder="Username" required/>
            <input type="password" name="password" id="passwordbox" placeholder="Password" required/>
            <input type="submit" value="Login" name="login" id="loginb"/>
        </form>
    </div>
    <div id="pagetitle"><h4>Samphire-Subsea</h4><p>Facilities Booking System</p></div>
</header>
<main>
    <section id="bannerbox">
        <img src="assets/images/banner1.jpg" id="bannerimage"/>
    </section>

    <div id="syscon">

        <?php
        session_start();

        $startdate = date("d-m-Y",strtotime($_SESSION['startdate']));
        $enddate = $_POST['enddate'];
        $enddate = date("d-m-Y",strtotime($enddate));
        $facility = $_SESSION['facility'];

        if(isset($enddate)) {
            echo "<div id='reservationdetails'>
                <label>Facility: " . $facility . "</label><br><br><br>
                <label>Start Date: " . $startdate . "</label><br><br><br>
                <label>Reservation End Date: " . $enddate . "</label><br><br><br>
            </div>";
        }else{
            echo "<div id='reservationdetails'>
                <label>Facility: " . $facility . "</label><br><br><br>
                <label>Reservation Date: " . $startdate . "</label><br><br><br>
            </div>";
        }
        ?>

    </div>
</main>

</body>
</html>