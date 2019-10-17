
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
function selectAnnees(){
    // select annee from Parcours
    global $conn;
    $sql = "SELECT `promo` FROM `Identifiants` GROUP BY `promo` ORDER BY `promo`;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($year);
    $return_array = array();
    while($stmt->fetch()) {
        array_push($return_array, $year);
    }
    $stmt->close();
    return  $return_array;
}
function selectChamps(){
    // select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where table_name='Parcours'; 
    return ['Département', 'Nom', 'Prenom', 'Année d\'entrée','Parcours'];
}

function selectData($years=null){
    // select annee from Parcours
    global $conn;
    if($years==null){
        $sql = "SELECT nom, prenom, promo, year, histoire FROM `Identifiants` NATURAL JOIN `Cursus` 
                ORDER BY id, nom, prenom, promo";
    } else {
        $sql = "SELECT nom, prenom, promo, year, histoire FROM `Identifiants` NATURAL JOIN `Cursus` 
                WHERE promo IN (";
        foreach($years as $year){
            $sql = $sql.$year.",";
        }
        rtrim($sql,',');
        $sql = $sql.");";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($nom, $prenom, $promo, $an, $cursus);
    $return_array = array();
    while($stmt->fetch()) {
        $key = "$nom, $prenom, $promo";
        $return_array[$key][$an] = $cursus;
    }
    $stmt->close();
    return  $return_array;

    //return array('Sciences du Sport et Education Phyique, D\'arc, Jeanne, 2014' => ['2017'=> 'n\'élève pas des moutons', '2018'=> 'repousse les anglais'],
    //'Mécatronique, CURIE, Marie, 2012' => ['2015'=> 'rejoint les troupes des féministes', '2020'=> 'prouve que le nuage s\'est arrété à la frontière']);

}

function getCursusByID($id) {
    global $conn;
    $sql = "SELECT id_h, year, histoire FROM `Cursus` WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($idh,$an, $cursus);
    $return_array = array();
    while($stmt->fetch()) {
        $return_array[$idh] = "$an : $cursus";
    }
    $stmt->close();
    return  $return_array;
}

function addCursusForID($id, $an, $cursus) {
    global $conn;
    $sql = "INSERT INTO Cursus (id, year, histoire) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $id, $an, $cursus);
    return  $stmt->execute();
}

function deleteCursusByIDh($idh) {
    global $conn;
    $sql = "DELETE FROM Cursus WHERE id_h=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idh);
    return  $stmt->execute();
}

?>