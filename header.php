<div id ="header" class="tabs">
        <!-- liste des onglets -->
        <img src="images/logo2.png" id="logo" onclick = "change_tab('home');"><!--
        --><span class="tab_1 tab" id="tab_home" onclick="change_tab('home');"> Accueil </span><!--
        --><span class="tab_0 tab" id="tab_students" onclick="change_tab('students');"> Anciens élèves </span><!--
        --><span class="tab_0 tab" id="tab_contact" onclick="change_tab('contact');"> Nous contacter </span><!--
        --><?php 

        // dernier onglet dans le cas où on est connecté (if) ou pas (else)
        if (isset($_SESSION["user_name"])){
            ?>
            <span class='tab_0 tab' id='menu'>
            <?php
                echo htmlspecialchars($_SESSION['user_name']);
            ?>
            <ul class ="sous">
            <li> <a onclick="change_tab('students');"> Editer parcours</a>  </li> 
            <li> <a href="deconnexion.php" id = "deconnexion"> Deconnexion</a>  </li> 
            </ul>
           <?php 
        } else {
            ?>
            <span class='tab_0 tab' id='tab_connexion' onclick="change_tab('connexion');"> Connexion </span><!--
            --></div>
            <?php
        }
        ?>
</div>
