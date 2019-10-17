<?php
session_start();
if (isset($_SESSION['errID'])){
    $errID = htmlspecialchars($_SESSION['errID']);
    echo "<div class='warning'> $errID </div>";
}

$feat_co = array(
    
    "E_mail" => ["email", "mail","prenom.nom@ens-rennes.fr", "44"],
    "Mot de passe" => ["password", "pass","******", "36"],
    "button" => ["submit", "Connexion","button_co"]);

$feat_sub = array(
    "Nom" => ["text", "nom","Ex : Legrand", "46"],
    "Prénom" => ["text", "prenom","Ex : Zozor", "42"],
    "Mot de passe" => ["password", "pass","******", "36"],
    "E_mail" => ["email", "mail","prenom.nom@ens-rennes.fr", "44"],
    "Promo" => ["number", "promo","2016", "1980"],
    "button" => ["submit", "Inscription","button_sub"]);
    
?>
<div id ="formulaires">
    <form class="wrap_form" method="post" action= "connexion.php"  >
        <?php
            foreach($feat_co as $key => $values){
                echo "<div class ='form'>";  
                    if ($key == "button"){
                        echo "<input type='$values[0]' name='$values[1]' id='$values[2]' />";
                    } else {
                        echo "<h3> $key : ";
                        echo "<input type='$values[0]' name='$values[1]' id='$values[1]' placeholder='$values[2]' size='$values[3]' required /> <br />";
                        echo "</h3>";
                    }
                echo "</div>"; 
            }
        ?>
    </form>	
    <form class="wrap_form" method="post" action= "inscription.php" >
        <?php
            foreach ($feat_sub as $key => $values){
                echo "<div class ='form'>";  
                    if ($key == "button"){
                        echo "<input type='$values[0]' name='$values[1]' id='$values[2]' />";
                    } else if ($key == "Promo")  {
                        echo "<h3> $key : ";
                        echo "<input type='$values[0]' name='$values[1]' id='$values[1]' placeholder='$values[2]' min='$values[3]' required /> <br />";
                        echo "</h3>";
                    } else {
                        echo "<h3> $key : ";
                        echo "<input type='$values[0]' name='$values[1]' id='$values[1]' placeholder='$values[2]' size='$values[3]' required /> <br />";
                        echo "</h3>";
                    }
                echo "</div>"; 
            }
        ?>
    </form>	

<!--<div id ="formulaires">
    <form class="wrap_form" method="post" action= "connexion.php" id = "sign_in" >
        <div class ="form">
            <h3> E-mail :
                <input type="email" name="mail" id="mail" placeholder="prenom.nom@ens-rennes.fr" size="44" required /> <br />
            </h3>
            
        </div>  
        <div class ="form">
            <h3> Mot de passe :
                <input type="password" name="pass" id="pass" required size="36" />
            </h3>
        </div> 
        <div class = form>
            <input type="submit" value="Connexion" id = "button_co" />
        </div>
    </form>	
    <form class="wrap_form" method="post" action= "inscription.php" >
        <div class ="form">
            <h3> Nom :
                <input type="text" name="nom" id="nom" placeholder="Ex : Legrand" size="46" maxlength="10" required /> <br />
            </h3>
        </div>  
        <div class ="form">
            <h3> Prénom :
                <input type="text" name="prenom" id="prenom" placeholder="Ex : Zozor" size="42" maxlength="10" required /> <br />
            </h3>
        </div> 
        <div class ="form">
            <h3> Mot de passe :
                <input type="password" name="pass" id="pass" size="36" required title='6 cractères au minimum' />
            </h3>
        </div> 
        <div class ="form">
            <h3> E-mail :
                <input type="email" name="mail" id="mail" placeholder="prenom.nom@ens-rennes.fr" size="44" maxlength="50" required /> <br />
            </h3>
        </div>  
        <div class ="form">
            <h3>Promo :
                <input type="number" name="promo" id="promo" placeholder="2016" maxlength="10" min="1980" default="1990" required /> <br />
            </h3>
        </div>  
        <div class = form>
            <input type="submit" value="Inscription" id = "button_sub" />
        </div>
    </form>
</div>-->
