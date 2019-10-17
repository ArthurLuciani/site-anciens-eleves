
<div id = 'wrap_tableau'>



<span class='nav'>
    <form method="post" action="index.php?tab=students">
        <p>
            <h3>Année d'entrée à l'ENS  :<br /></h3> 
            <?php
            $annees = selectAnnees();
            foreach ($annees as $an ) {
                echo "<input type='checkbox' name= 'annees' id=$an /> <label for=$an>$an</label><br />";
            }
            ?>
            <h3> Département  :<br /></h3>
            <?php
            $Departements = array('Droit Economie et Gestion', 'Informatique', 'Mécatronique','Mathématique', 'Sciences du Sport et Education Phyique');
            foreach ($Departements as $Departement ) {
                echo "<input type='checkbox' name= 'Departement' id=$Departement /> <label for = $Departement> $Departement</label><br />";
            }
            ?>
        </p>
            <input type = "submit" value = "valider">
    </form>
</span>

<span class = 'tableau'>
    <table>
    <tr>
    <?php
    $champs = selectChamps();
    foreach ($champs as $champ ) {
        echo "<th> $champ </th>";
    }
    ?>
    </tr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $years = $_POST['annees'];
        $dept = $_POST['Departement'];
        $data = selectData($years,$dept); 
        $nb = count($data);
        foreach ($data as $key => $values){
            echo "<tr>";
            $identifiants = explode(',',$key);
            foreach ($identifiants as $id ) {
                echo "<td> $id </td>";
            }
            echo "<td>";
            foreach ($values as $annee => $parcours ) {
                echo "$annee : $parcours </br>";
            }
            echo "</tr>";
        }


    }
    
    // forme des data : ['Département Nom prenom' => [Année => parcours, Année => parcours],'Département Nom prenom' => [Année => parcours, Année => parcours]]

    ?>
    
    
    </table>

</span>
</div>


<?php
require "MySQL.php";


?>