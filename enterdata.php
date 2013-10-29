<?php
session_start();
require_once 'dbconnect.php';
$user_name1=$_SESSION['name'];
$qry="select * from user_details where user_name='" . $user_name1 . "'";
$result=mysqli_query($con,$qry);
while($row=  mysqli_fetch_array($result))
{
    
   $key=$row[3];
   $secret=$row[4];
}
$opts = array("Dimensions" => array());
$member = array(Name => "InstanceId",Value => "i-2a076142");
array_push($opts["Dimensions"], $member);
$namespace="AWS/EC2";
$end_time="now";

?>
