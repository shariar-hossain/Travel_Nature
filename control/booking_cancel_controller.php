<?php
session_start();
include "../control/db_conn.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $booking_id = $_POST["bookingId"];
    $sql="DELETE FROM `booking` WHERE id = $booking_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../view/user_booked_packages.php");
        exit();
      } else {
        header("Location: ../view/user_booked_packages.php?error=something went wrong");
        exit();
    }

}

?>