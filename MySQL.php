<?php
$servername = "localhost";
$username = "ancien";
$password = "ttQcxSS6AqTmVhNQ";
$dbname = "ancien";

//$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function test_input_pass($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    //$data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}