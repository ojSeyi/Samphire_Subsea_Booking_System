<!DOCTYPE html>
<html lang="en">
<?php include ("db_connection.php"); ?>
<?php
if(is_null($_SESSION['facili']) && ($_SESSION['start'])){
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
        echo "<script src='http://code.jquery.com/jquery-1.8.0.min.js'></script>
        <script src='js/global.js'></script></script>";
        //booking check start
        ?>
        <div id="screen">
            <p>Your reservetion details are as follows: </p>
            <label><?php echo "Start date:  " . $_SESSION['start'] ?></label><br><br>
            <?php
                $facilities = array();
                $facilities[0] = $_SESSION['facili'];
                if(!is_null($_SESSION['end'])){
                    echo "<label> End date:  " . $_SESSION['end'] . "</label><br><br>";
                }

                if(count($facilities) > 1){
                    echo "<div id='facili'></div>";
                }else{
                    echo "<label> Facility to be reserved:  " . $_SESSION['facili']."</label><br><br>";
                }


            ?>
            <form>
                <select name="facilityarray" size="1" required>
                    <?php
                    $getfacilities = "SELECT * FROM samphire_facilities";
                    $result = mysqli_query($db, $getfacilities);
                    while ($row = mysqli_fetch_array($result))
                        echo "<option>". $row['f_name'] . "</option>";
                    ?>
                </select><br><br>
                <input type='submit' value='Add Facility'>
            </form>

        </div>";


        function generateRandomString($length = 6) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $randomtable = generateRandomString();





    </div>
</main>

</body>
</html>