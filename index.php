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
    include("header.php")
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
        <div>
            coucou
        </div>
    </div>
    <div class = "content_tab" id="content_tab_contact">
        Dans cette partie se trouvera un formulaire de contact pour laisser des commentaires visible par le propiétaire du site.
    </div>
    <div class="content_tab" id="content_tab_connexion">
        <div id ="formulaire">
            <span style = "text-align:center" >
                <form method="post" action= "connexion.php" id = "sign_in" style="display:inline-block">
                    <div class ="form">
                        <h3> Pseudo :</h3>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" size="20" maxlength="10" required /> <br />
                    </div>  
                    <div class ="form">
                        <h3> Password :</h3>
                        <input type="password" name="pass" id="pass" required  />
                    </div> 
                    <p class = form>
                        <input type="submit" value="Connexion" id = "button_co" />
                    </p>
                </form>	
            </span> 
            <span style = "text-align:center" >
                <form method="post" action= "../php/subscribe.php" style="display:inline-block">
                    <div class ="form">
                        <h3> Pseudo :</h3>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" size="20" maxlength="10" required /> <br />
                    </div>  
                    <div class ="form">
                        <h3> Password :</h3>
                        <input type="password" name="pass" id="pass" required title='6 cractères au minimum' />
                    </div> 
                    <p class = form>
                        <input type="submit" value="Inscription" id = "button_co" />
                    </p>
                    
                </form>	
            </span>  
        </div>
    </div>
    
</div>

</body>
</html>
