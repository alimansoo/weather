<?php
session_start();

$status = [];
$dbhost = 'localhost';
$dbuser = 'frar963_mohajer';
$dbpass = '8480411';
$db = 'frar963_mohajer';
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
$sql = "
  SELECT * FROM `devices` WHERE user_name = '".$_REQUEST['user-name']." AND password = '".$_REQUEST['password']."'
";
$retval = $conn->query( $sql );
$array = $retval->fetch_array(MYSQLI_ASSOC);
if (count($array) < 1) {
  $sql = "
    INSERT INTO `devices`(`user_name`,`password`) VALUES ('".$_REQUEST['user-name'].",".$_REQUEST['password']."')
  ";
  $retval = $conn->query( $sql );
  $sql = "
    SELECT LAST_INSERT_ID();
  ";
  $retval = $conn->query( $sql );
  $array = $retval->fetch_array(MYSQLI_ASSOC);
  $_SESSION['id'] = $array['LAST_INSERT_ID()'];
  $status = [
    'httpResponseCode' => 200
  ];
}else{
  $status = [
    'httpResponseCode' => 401
  ];
}
echo json_encode($status);
?>
