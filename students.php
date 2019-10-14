
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
        $data = selectData($years,$dept); // il faut mettre en paramètre le post année et département
        $nb = count($data);
        for($i=0; $i<$nb;$i++){
            echo "<tr>";
            foreach ($data[$i] as $eleve ) {
                echo "<td> $eleve </td>";
            }
            echo "</tr>";
        }


    }
    

    ?>
    
    
    </table>

</span>
</div>


<?php
function selectAnnees(){
    // select annee from Parcours
    return  array(2000,2001);
}
function selectChamps(){
    // select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where table_name='Parcours'; 
    return array('années','département','nom','prenom','Cursus');
}

function selectData(){

    return array([2015,'Mecatronique','Vincent','Nicolas',''],[2016,'Informatique','Palaude','Axel','Agreg Science ingénieur']);

    }

?>