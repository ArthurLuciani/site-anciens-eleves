<?php

$servername = "localhost";
$username = "ancien";
$password = "ttQcxSS6AqTmVhNQ";
$dbname = "ancien";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["pseudo"]);
    $pass = test_input($_POST["password"]);

    $sql = "SELECT id, hash FROM Identifiants WHERE pseudo=? ;";
    $req = $conn->prepare($sql);
    $req->bind_param("s", $name);
    $result = $req->execute();
    $id = $result[0];
    $hash = $result[1];
    if (password_verify($pass, $hash)){
        session_start();
        $_SESSION["user_id"] = $id;
        $_SESSION["user_name"] = $name;
    }
}

function test_input($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}