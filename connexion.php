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
    $email = test_input($_POST["mail"]);
    $pass = test_input($_POST["password"]);

    $sql = "SELECT id, hash, nom, prenom FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $errID = "";
    if ($stmt->num_rows==1) {
        $stmt->bind_result($id, $hash, $name, $surname);
        $stmt->fetch();
        if (password_verify($pass, $hash)) {
            session_unset();
            session_destroy();
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        } else {
            $errID = "Mail ou mot de passe invalide";
        }
    } else {
        $errID = "Mail ou mot de passe invalide";
    }
    $stmt->close();
    include("index.php");
}

function test_input($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}