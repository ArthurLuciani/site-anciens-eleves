<?php

$servername = "localhost";
$username = "ancien";
$password = "ttQcxSS6AqTmVhNQ";
$dbname = "ancien";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<body>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["pseudo"]);
    $email = trim($_POST["mail"]);
    $promo = test_input($_POST["promo"]);
    $pass = test_input($_POST["password"]);
    echo $email;
    $sql = "SELECT count(id) FROM Identifiants WHERE pseudo=? OR email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->bind_result($nb_row);
    $stmt->fetch();
    echo $nb_row . "<br>";
    if($nb_row >= 1){
        $errID = "pseudo ou email déjà utilisé";
        $stmt->close();
        // pseudo deja utilise
    } else {
        $stmt->close();
        $sql = "INSERT INTO Identifiants (pseudo, hash, email, promo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt->bind_param("sssi", $name, $hash, $email, $promo);
        if ($stmt->execute()==TRUE){
            $id = $stmt->insert_id;
            session_unset();
            session_destroy();
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;
        }
        $stmt->close();
    }
    echo "success $name $id $email";
}
echo "</body>";
function test_input($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    //$data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}