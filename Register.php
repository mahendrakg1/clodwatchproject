<?php

include 'dbconnect.php';
$name = $_POST["username"];
$pass = $_POST["pass"];
$acesskey = $_POST["acess"];
$secretkey = $_POST["secret"];
if (isset($_POST["username"]) && isset($_POST["pass"]) && $pass != "" && $name != "") {
    $sql = "select * from user_details";
    $sql = "INSERT INTO user_details values(null,'$name', '$pass','$acesskey',$secretkey)";
    if (mysqli_query($con, $sql)) {
        header("Location: login.php?msg= you has been registered successfully Please login");
    }
    else
        header("Location: registerdetail.php?msg= this email_id already registered  ");
}
else
    header("Location: registerdetail.php?msg= Enter complete detail ");
?>
