<?php

require "MySQL.php";
session_unset();
session_destroy();
session_start(); //on reset la session
//echo "<body>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //on récupère les données du formulaire  en traitant les caractères génants
    $name = test_input($_POST["nom"]);
    $surname = test_input($_POST["prenom"]);
    $email = test_input($_POST["mail"]);
    $promo = test_input($_POST["promo"]);
    $pass = test_input_pass($_POST["pass"]);
    //echo $email;

    //on vérifie que l'adresse mail n'est pas déjà enregistré avec une requête préparée
    $sql = "SELECT count(id) FROM Identifiants WHERE email=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($nb_row);
    $stmt->fetch();
    //echo $nb_row . "<br>";
    if($nb_row != 0) {
        $errID = "email déjà utilisé";
        $stmt->close();
    } elseif (3>strlen($pass)) {
        $errID = "Mot de passe trop court : au moins 3 caractères requis";
        $stmt->close();
    } else {
        $stmt->close();
        //on insère dans la table Identifiants les identifiants
        $sql = "INSERT INTO Identifiants (nom, prenom, hash, email, promo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $hash = password_hash($pass, PASSWORD_BCRYPT); // hash et sale le mot de passe avec la méthode blowfish
        $stmt->bind_param("ssssi", $name, $surname, $hash, $email, $promo);
        if ($stmt->execute()==TRUE){ //si insertion réussie
            $id = $stmt->insert_id; //id auto-incrémenté de la dernière ligne ajoutée
            //on set la session avec l'id de l'utilisateur et son "prénom nom"
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $surname." ".$name;
        }
        $stmt->close();
    }
    //echo "success $name $id $email";
    if (isset($errID)){ //si erreur
        $_SESSION["errID"] = $errID;
        header("Location: index.php?tab=connexion");
    } else {
        header("Location: index.php?tab=students");
    }
}
//echo "</body>";
