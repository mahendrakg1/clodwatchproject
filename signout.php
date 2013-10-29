<?php
session_start();
session_destroy();
header("Location: login.php?msg= Thank You for visiting  cloudwatch site ");
?>
