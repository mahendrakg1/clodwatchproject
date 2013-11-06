<?php

require_once 'aws/aws-autoloader.php';
session_start();
require_once 'dbconnect.php';
$user_name1 = $_SESSION['name'];
$qry = "select * from user_details where user_name='" . $user_name1 . "'";
$result = mysqli_query($con, $qry);
while ($row = mysqli_fetch_array($result)) {

    $key = $row[3];
    $secret = $row[4];
}


$config = array();
$config['key'] = $key;
$config['secret'] = $secret;
$config['region'] = $_POST['region'];

try {
    $ec2Client = \Aws\Ec2\Ec2Client::factory($config);
    // print_r($ec2Client);


    $result = $ec2Client->DescribeInstances();
    $i = 0;
    $instancesid = array();
    $reservations = $result['Reservations'];


    foreach ($reservations as $reservation) {
        $instances = $reservation['Instances'];
        foreach ($instances as $instance) {
            if ($instance['State']['Name'] == 'running') {

                $instancesid[$i][0] = $instance['InstanceId'];
                foreach ($instance['Tags'] as $tag) {
                    if ($tag['Key'] == 'Name') {
                            $instanceid[$i][1] = $tag['Value'];
                        }

                }

                $i++;
            }
        }
    } 
    if ($i >= 1)
        echo json_encode($instancesid);
    else
        echo "no instances exist";
} catch (Exception $e) {
    echo 'incorrect key and secret key';
    return NULL;
}
?>