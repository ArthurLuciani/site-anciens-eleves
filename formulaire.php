
<div id ="formulaires">
    <form class="wrap_form" method="post" action= "connexion.php" id = "sign_in" style="display:inline-block">
        <div class ="form">
            <h3> E-mail :
                <input type="email" name="mail" id="mail" placeholder="prenom.nom@ens-rennes.fr" size="44" maxlength="50" required /> <br />
            </h3>
            
        </div>  
        <div class ="form">
            <h3> Password :
                <input type="password" name="pass" id="pass" required size="40" />
            </h3>
        </div> 
        <div class = form>
            <input type="submit" value="Connexion" id = "button_co" />
        </div>
    </form>	
    <form class="wrap_form" method="post" action= "subscribe.php" style="display:inline-block">
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
                <input type="password" name="pass" id="pass" size="40" required title='6 cractères au minimum' />
            </h3>
        </div> 
        <div class ="form">
            <h3> E-mail :
                <input type="email" name="mail" id="mail" placeholder="prenom.nom@ens-rennes.fr" size="44" maxlength="50" required /> <br />
            </h3>
        </div>  
        <div class ="form">
            <h3>Promo :
                <input type="number" name="promo" id="promo" placeholder="2016" maxlength="10" min="1980" defalut="1990" required /> <br />
            </h3>
        </div>  
        <div class = form>
            <input type="submit" value="Inscription" id = "button_co" />
        </div>
    </form>	
</div>