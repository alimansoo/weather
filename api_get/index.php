<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'frar963_mohajer';
$dbpass = '8480411';
$db = 'frar963_mohajer';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

$device_id = $_SESSION['id'];

$sql = "
    SELECT *
    FROM `devices_information`
    WHERE device_id = $device_id
    ORDER BY id DESC
    LIMIT 1
";
$retval = $conn->query( $sql );
$array = $retval->fetch_array(MYSQLI_ASSOC);
if (count($array) > 1) {
    echo json_encode($array);
}else{
    echo json_encode([
        'themp' => 'دستگاه داده ای را ثبت نکرده است!'
    ]);
}
