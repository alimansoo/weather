<?php
const HOST = "localhost";
const USERNAME = "frar963_mohajer";
const PASSWORD = "8480411";
const DB = "frar963_mohajer";

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

$query = "SELECT id from devices WHERE user_name = '$userName' AND password = '$password'";

$result = $mysql->query($query);
if ($result->num_rows > 0){

    $row = $result->fetch_row();
    http_response_code(200);
    echo json_encode($row[0]);
    exit;
}
else {
    http_response_code(401);
    exit;
}

http_response_code(500);
