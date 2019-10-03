<div id ="header" class="tabs">
        <img src="images/logo2.png" id="logo" onclick = "change_tab('home');"><!--
        --><span class="tab_1 tab" id="tab_home" onclick="change_tab('home');"> Accueil </span><!--
        --><span class="tab_0 tab" id="tab_students" onclick="change_tab('students');"> Anciens élèves </span><!--
        --><span class="tab_0 tab" id="tab_contact" onclick="change_tab('contact');"> Nous contacter </span><!--
        --><?php 
        if (isset($_SESSION['name'])){
            ?>
            <span class='tab_0 tab'>
            <?php
                echo htmlspecialchars($_SESSION['name']);
            ?>
            <br>
            <a href = 'deconnexion.php' id = "deconnexion"> Deconnexion </a>
            </span><!--
        --></div><?php 
        } else {
            ?>
            <span class='tab_0 tab' id='tab_connexion' onclick="change_tab('connexion');"> Connexion </span><!--
            --></div>
            <?php
        }
        ?>
</div>