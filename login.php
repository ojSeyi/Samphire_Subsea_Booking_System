<?php
    session_start();

    include ("db_connection.php");

if(empty($_POST['username']) || empty($_POST['password'])) {
    echo "Enter Username and Password";
}else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = "SELECT * FROM customer_login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $login) or die("Invalid Query".mysqli_error());

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_row($result);
        $userloginid = $row['log_id'];
        $getuserfullname = mysqli_query($db, "SELECT firstname, lastname FROM customers WHERE log_id = $userloginid");
        $userfullname = mysqli_fetch_row($userfirstname);
        $userfirstname = $userfullname['firstname'];
        $_SESSION['firstname'] = $userfirstname;
        header('Location: index1.php');
    } else {
        header('Location: index2.php');
    }
}