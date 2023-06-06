<?php
const HOST = "localhost";
const USERNAME = "frar963_mohajer";
const PASSWORD = "8480411";
const DB = "frar963_mohajer";

$connectType = isset($_SERVER["CONTENT_TYPE"]);
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data['temperature']) or !isset($data['humidity']) or !isset($data['id'])){
    http_response_code(400); 
    exit;
    }
}
else{
    http_response_code(400); 
    exit;
}



$temp = $data['temperature'];
$humidity = $data['humidity'];
$id = $data['id'];

$sql = "
    SELECT *
    FROM `devices`
    WHERE id = $id
";
$retval = $conn->query( $sql );
$array = $retval->fetch_array(MYSQLI_ASSOC);
if (count($array) < 1) {
    http_response_code(401);
    exit;
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysql = new mysqli();
$mysql->connect(HOST, USERNAME, PASSWORD);
$mysql->select_db(DB);


$query = "INSERT INTO devices_information (temperature, humidity, device_id) VALUES(?, ?, ?);";
$stm = $mysql->prepare($query);
$stm->bind_param("iii", $temp, $humidity, $id);

if ($stm->execute()){
    $last_id = $mysql->insert_id;
    http_response_code(200);
    echo json_encode($last_id);
    exit;
}
http_response_code(500);
