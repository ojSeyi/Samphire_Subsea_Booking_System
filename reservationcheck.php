<?php
$reservationDay = $_POST['rsvDate'];
$reservationDay = date("Y-m-d",strtotime($reservationDay));
$type = $_POST['facility'];
$noDays = $_POST['daycount'];

if ($noDays > 1){
    $LastReservationDay = date("Y-m-d",strtotime($LastReservationDay)) + $noDays;
    echo "$reservationDay  $LastReservationDay";
}