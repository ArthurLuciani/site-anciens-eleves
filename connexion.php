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
    $pass = test_input_pass($_POST["password"]);

    $sql = "SELECT id, hash, nom, prenom FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $name, $surname);
    $stmt->fetch();
    session_unset();
    session_destroy();
    if (isset($id)){
        if (password_verify($pass, $hash)) {
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        } else {
            $errID = "Mot de passe invalide";
        }
    } else {
        $errID = "Mail non-enregistré $email";
    }
    $stmt->close();
    if (isset($errID)){
        header("Location: index.php?tab=connexion&err='$errID'");
    } else {
        //header("Location: index.php?tab=students&id=".$_SESSION["user_id"]);
        header("Location: index.php?tab=students");
    }

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