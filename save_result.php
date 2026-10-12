<?php
require 'db.php';

// Read the JSON data sent from JavaScript
$data = json_decode(file_get_contents("php://input"));

if (isset($data->result)) {
    $result = $conn->real_escape_string($data->result);
    
    $sql = "INSERT INTO match_history (result) VALUES ('$result')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
$conn->close();
?>