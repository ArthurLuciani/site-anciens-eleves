<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Parcours des anciens</title>
   <link rel="icon" href="images/logo.png">
    <meta name="generator" content="Geany 1.32" />
    <link rel="stylesheet" href="style.css">
    <script src="functions.js"></script>

<body>
<?php
    include("header.php");
?>

<div class="content_tabs">
    <div class="content_tab" id="content_tab_home" style="display: block">
        <img src="images/ENS-Rennes-105_carroussel.jpg" style = "width:100%">
        <h2>Bienvenue sur le site des anciens élèves de l'ENS Rennes.</h2>
        <p>
            Ce site a pour but de rassembler au même endroit l'ensemble des parcours réalisés
            par des anciens élèves de l'ENS. Ce site permettra à l'école de garder un suivis avec les 
            élèves et ainsi garder contact. Mais il permettra aussi aux anciens élèves de suivre le parcours
            des autres. Enfin les élèves actuels ou futures de l'ENS, pourront se baser sur ce site pour voir 
            l'étendu des choix possibles après les différentes formations de l'ENS. <br>
            Cher visiteur, vous pouvez ainsi aller dans l'onglet ancien élève pour avoir accès à la liste des élèves et des pparcours, 
            si vous êtes un ancien élève, vous pouvez vous connecter pour ajouter ou modifier votre parcours. N'hésitez pas à nous contacter en cas
            de questions, bug ou idées d'amélioration dont vous voulez nous faire part.
        </p>
    </div>
    <div class="content_tab" id="content_tab_students">
        <?php
            include("students.php");
        ?>
    </div>
    <div class = "content_tab" id="content_tab_contact">
        <?php
            include("contact.php");
        ?>
    </div>
    <div class="content_tab" id="content_tab_connexion">

        <?php
            include("formulaire.php");
        ?> 

        <div id ="formulaires">
            <form class="wrap_form" method="post" action= "connexion.php" id = "sign_in" style="display:inline-block">
                <div class ="form">
                    <h3>   E-mail :  
                        <input type="text" name="mail" id="mail" placeholder="Ex : Zozor" size="40" maxlength="10" required /> <br />
                    </h3>
                    
                </div>  
                <div class ="form">
                    <h3> Mot de passe :
                        <input type="password" name="pass" id="pass" required size="40" />
                    </h3>
                </div> 
                <div class = form>
                    <input type="submit" value="Connexion" id = "button_co" />
                </div>
            </form>	
            <form class="wrap_form" method="post" action= "inscription.php" style="display:inline-block">
                <div class ="form">
                    <h3>   Nom :
                        <input type="text" name="nom" id="nom" placeholder="Legrand" size="40" maxlength="10" required /> <br />
                    </h3>
                </div>  
                <div class ="form">
                    <h3>   Prenom :
                        <input type="text" name="prenom" id="prenom" placeholder="Ex : Zozor" size="40" maxlength="10" required /> <br />
                    </h3>
                </div>  
                <div class ="form">
                    <h3> Mot de passe :
                        <input type="password" name="pass" id="pass" size="40" required title='6 cractères au minimum' />
                    </h3>
                </div> 
                <div class ="form">
                    <h3>    E-mail :
                        <input type="mail" name="mail" id="mail" placeholder="prenom.nom@ens-rennes.fr" size="40" maxlength="50" required /> <br />
                    </h3>
                </div>  
                <div class ="form">
                    <h3>     Promo :
                        <input type="number" name="promo" id="promo" placeholder="2016" size="40" maxlength="10" min="1980" defalut="1990" required /> <br />
                    </h3>
                </div>  
                <div class = form>
                    <input type="submit" value="Inscription" id = "button_co" />
                </div>
            </form>	
        </div>

    </div>
</div>

</body>
</html>
