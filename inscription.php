<?php

require "MySQL.php";
session_unset();
session_destroy();
session_start();
//echo "<body>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["nom"]);
    $surname = test_input($_POST["prenom"]);
    $email = test_input($_POST["mail"]);
    $promo = test_input($_POST["promo"]);
    $pass = test_input_pass($_POST["pass"]);
    //echo $email;
    $sql = "SELECT count(id) FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $surname, $email);
    $stmt->execute();
    $stmt->bind_result($nb_row);
    $stmt->fetch();
    //echo $nb_row . "<br>";
    if($nb_row >= 1) {
        $errID = "nom et prénom ou email déjà utilisé";
        $stmt->close();
        // pseudo deja utilise
    } elseif (3>strlen($pass)) {
        $errID = "Mot de passe trop court : au moins 3 caractères requis";
        $stmt->close();
    } else {
        $stmt->close();
        $sql = "INSERT INTO Identifiants (nom, prenom, hash, email, promo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $stmt->bind_param("ssssi", $name, $surname, $hash, $email, $promo);
        if ($stmt->execute()==TRUE){
            $id = $stmt->insert_id;
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        }
        $stmt->close();
    }
    //echo "success $name $id $email";
    if (isset($errID)){
        $_SESSION["errID"] = $errID;
        header("Location: index.php?tab=connexion");
    } else {
        header("Location: index.php?tab=students");
    }
}
//echo "</body>";
