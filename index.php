<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Parcours des anciens</title>
    <link rel="icon" href="images/logo.png">
    <meta name="generator" content="Geany 1.32" />
    <link rel="stylesheet" href="style.css">
    <script src="functions.js"></script>
</head>
<body>

<?php
include 'header.php'
?>

<div class="content_tabs">
    <div class="content_tab" id="content_tab_home" style="display: block">
        <img src="images/ENS-Rennes-105_carroussel.jpg">
        <h2>Bienvenue sur le site des anciens élèves de l'ENS Rennes.</h2>
        <p>
            Ce site a pour but de réunir d'anciens élèves et de garder contact
            avec l'école. (Blabla au choix)
        </p>
    </div>
    <div class="content_tab" id="content_tab_students">
        <div>
            coucou
        </div>
        <?php

        ?>
    </div>
    <div class="content_tab" id="content_tab_connexion">
        <div class="content_tab2" id="content_tab2_Session">
            <div id ="formulaire">
                <span style = "text-align:center" >
                    <form method="post" action= "connexion.php" id = "sign_in" style="display:inline-block">
                        <div class ="form">
                            <h3> Pseudo :</h3>
                            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" size="20" maxlength="10" required > <br>

                            <h3> Password :</h3>
                            <input type="password" name="pass" id="pass" required >
                        </div>
                        <p class = form>
                            <input type="submit" value="Connexion" id = "button_co">
                        </p>
                    </form>
                </span>
                <span style = "text-align:center" >
                    <form method="post" action= "subscribe.php" style="display:inline-block">
                        <div class ="form">
                            <h3> Pseudo :</h3>
                            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" size="20" maxlength="10" required> <br>
                            <h3> Password :</h3>
                            <input type="password" name="pass" id="pass" required title='6 cractères au minimum'>
                        </div>
                        <p class = form>
                            <input type="submit" value="Inscription" id = "button_co">
                        </p>

                    </form>
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
