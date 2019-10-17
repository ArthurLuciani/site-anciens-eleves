<?php

require "MySQL.php";
session_unset();
session_destroy();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["mail"]);
    $pass = test_input_pass($_POST["pass"]);

    $sql = "SELECT id, hash, nom, prenom FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $name, $surname);
    $stmt->fetch();
    if (isset($id)){
        if (password_verify($pass, $hash)) {
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
        $_SESSION["errID"] = $errID;
        header("Location: index.php?tab=connexion");
    } else {
        //header("Location: index.php?tab=students&id=".$_SESSION["user_id"]);
        header("Location: index.php?tab=students");
    }

}
