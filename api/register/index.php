<?php
const HOST = "5.144.130.58";
const USERNAME = "broifeel_name";
const PASSWORD = "AlIm@0@0";
const DB = "broifeel_hot";

$connectType = isset($_SERVER["CONTENT_TYPE"]);
if ($connectType == "application/json") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!isset($data['user-name']) or !isset($data['password'])){
    http_response_code(400); 
    exit;
    }
}
else{
    http_response_code(400); 
    exit;
}


$userName = $data['user-name'];
$password = $data['password'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysql = new mysqli();
$mysql->connect(HOST, USERNAME, PASSWORD);
$mysql->select_db(DB);

$query = "SELECT id from devices WHERE user_name = '$userName'";

$result = $mysql->query($query);
if ($result->num_rows > 0){
    http_response_code(409);
    exit;
}

$query = "INSERT INTO devices (user_name, password) VALUES(?, ?);";
$stm = $mysql->prepare($query);
$stm->bind_param("ss", $userName, $password);

if ($stm->execute()){
    $last_id = $mysql->insert_id;
    http_response_code(200);
    echo json_encode($last_id);
    exit;
}

http_response_code(500);
