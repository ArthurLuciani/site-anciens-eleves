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
    session_start();
    include("header.php");

?>

<div class="content_tabs">
    <div class="content_tab" id="content_tab_home" style="display:block;" >
        <img src="images/ENS-Rennes-105_carroussel.jpg" id="carroussel" >
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
    </div>
</div>
<?php
    if(isset($_GET['tab'])){
        $tab = htmlspecialchars($_GET['tab']);
        if (in_array($tab,['students', 'contact','home','connexion'])) {
          ?>
            <script>
                console.log('hello')
                change_tab(<?php echo "'".$tab."'"; ?>);
            </script>
        <?php  
        } 
    }

include("footer.php")

?>

</body>
</html>
