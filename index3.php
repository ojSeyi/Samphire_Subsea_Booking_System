<!DOCTYPE html>
<html lang="en">
<?php include ("db_connection.php"); ?>
<?php session_start();
if(is_null($_SESSION['login'])){
    header('Location: index.php');
};
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
        <div id="loginerror">Please enter a valid username and password</div>
        <form method="post" action="login.php">
            <input type="text" name="username" id="usernamebox" placeholder="Username" required/>
            <input type="password" name="password" id="passwordbox" placeholder="Password" required/>
            <input type="submit" value="Login" id="loginb"/>
        </form>
    </div>
    <div id="pagetitle"><h4>Samphire-Subsea</h4><p>Facilities Booking System</p></div>
</header>

<main>
    <section id="bannerbox">
        <img src="assets/images/banner1.jpg" id="bannerimage"/>
    </section>

    <div id="syscon">
        <div id="errormessage1">
            <p>Sorry, that failitity is not available on <?php $_SESSION['startdates'] ?></p>
        </div>

        <form id="search" method="post" action="logdatecheck2.php">
            <Label>Please select a facility</Label>
            <select name="facility" size="1" required>
                <?php
                $getfacilities = "SELECT name FROM samphire_facilities";
                $result = mysqli_query($db, $getfacilities);
                while ($row = mysqli_fetch_array($result))
                    echo "<option>". $row['name'] . "</option>";
                ?>
            </select><br><br>
            <label>Reservation Date : </label>
            <input id="startdate" name="startdate" type="date" value="2016-07-01"/><br><br>
            <label>If you would require the facility for more than one day tick this box</label><br>
            <input type="checkbox" id="enddate" name="enddate" value="yes"/><br><br><br>
            <input type="submit" value="submit"/><br><br>
        </form>

    </div>
</main>

</body>
</html>