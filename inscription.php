<?php

$servername = "localhost";
$username = "ancien";
$password = "ttQcxSS6AqTmVhNQ";
$dbname = "ancien";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "<body>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["nom"]);
    $surname = test_input($_POST["prenom"]);
    $email = test_input($_POST["mail"]);
    $promo = test_input($_POST["promo"]);
    $pass = test_input_pass($_POST["password"]);
    //echo $email;
    $sql = "SELECT count(id) FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $surname, $email);
    $stmt->execute();
    $stmt->bind_result($nb_row);
    $stmt->fetch();
    //echo $nb_row . "<br>";
    if($nb_row >= 1){
        $errID = "nom et prénom ou email déjà utilisé";
        $stmt->close();
        // pseudo deja utilise
    } else {
        $stmt->close();
        $sql = "INSERT INTO Identifiants (nom, prenom, hash, email, promo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt->bind_param("ssssi", $name, $surname, $hash, $email, $promo);
        if ($stmt->execute()==TRUE){
            $id = $stmt->insert_id;
            session_unset();
            session_destroy();
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        }
        $stmt->close();
    }
    //echo "success $name $id $email";
    if (isset($errID)){
        header("Location: index.php?tab=connexion&err='$errID'");
    } else {
        header("Location: index.php?tab=students");
    }
}
//echo "</body>";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function test_input_pass($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    //$data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}