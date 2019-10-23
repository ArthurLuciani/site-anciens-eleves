<?php

require "MySQL.php"; //connexion au serveur MySQL
session_unset();
session_destroy();
session_start(); //on reset la session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // on récupère les donnèes du formulaire et on les aseptise (sanitize)
    $email = test_input($_POST["mail"]);
    $pass = test_input_pass($_POST["pass"]);

    // on sélectionne id, hash, nom et prénom pour l'adresse mail spécifié
    $sql = "SELECT id, hash, nom, prenom FROM Identifiants WHERE email=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash, $name, $surname);
    $stmt->fetch();
    if (isset($id)){ //si l'adresse mail est enregistrée dans la BDD
        if (password_verify($pass, $hash)) {//si le mot de passe et vérifié
            //on set la session avec l'id de l'utilisateur et son "prénom nom"
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        } else {
            $errID = "Mot de passe invalide";
        }
    } else {
        $errID = "Mail non-enregistré $email";
    }
    $stmt->close();
    if (isset($errID)){// si erreur
        $_SESSION["errID"] = $errID;
        header("Location: index.php?tab=connexion");
    } else {
        //header("Location: index.php?tab=students&id=".$_SESSION["user_id"]);
        header("Location: index.php?tab=students");
    }

}
