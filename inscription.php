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
    $email = test_input($_POST["email"]);
    $promo = test_input($_POST["promo"]);
    $pass = test_input($_POST["password"]);

    $sql = "SELECT id FROM Identifiants WHERE pseudo=? ;";
    $req = $conn->prepare($sql);
    $req->bind("s", $name);
    $result = $req->execute(array($name));
    if(count($result)>=1){
        // pseudo deja utilise TODO
    } else {
        $sql = "INSERT INTO Identifiants (pseudo, hash, email, promo) VALUES (?, ?, ?, ?)";
        $req = $conn->prepare($sql);
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $req->bind("sssi", $name, $hash, $email, $promo);
        if ($req->execute()==TRUE){
            $id = $req->insert_id;
            session_unset();
            session_destroy();
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}