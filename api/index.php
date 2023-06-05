<?php
$temp = $_REQUEST['temp'];
$device_id = $_REQUEST['device_id'];
$dbhost = 'localhost';
$dbuser = 'frar963_mohajer';
$dbpass = '8480411';
$db = 'frar963_mohajer';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
$sql = "
    INSERT INTO `temperature`( `themp`, `currnt_date`, `device_id`) 
    VALUES (
        '".$temp."',
        '".date('Y-m-d H:i:s')."',
        ".$device_id."
    )
";
$retval = $conn->query( $sql );

$array = array(
    'mesage' => 'Temperature Successfuly Added',
    'status' => 202
);

echo json_encode($array);