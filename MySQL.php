<?php
//connexion à la base de donnée
$servername = "localhost";
$username = "ancien";
$password = "ttQcxSS6AqTmVhNQ";
$dbname = "ancien";


$conn = @new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ancien";
    $conn = @new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

//---functions----------------------------------------------------------------------------------------------------------
function test_input_pass($data) {
    $data = trim($data);
    //$data = stripslashes($data);
    //$data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function selectAnnees(){
    // on récupère les différentes promos enregistrée dans un ordre croissant
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


function selectData($years=null){
    global $conn;
    if($years==null){// aucune année == toutes les années
        $sql = "SELECT nom, prenom, promo, year, histoire FROM `Identifiants` NATURAL JOIN `Cursus` ORDER BY id, year";
    } else {// on sélectionnes les années dans l'array years
        $sql = "SELECT nom, prenom, promo, year, histoire FROM `Identifiants` NATURAL JOIN `Cursus` WHERE promo IN (";
        $sql = $sql.implode(",", $years);
        $sql = $sql.") ORDER BY id, year;";
    }
    //log_print($sql);
    $stmt = $conn->prepare($sql);
    if(!$stmt->execute()){
        log_print("échec");
    }
    $stmt->bind_result($nom, $prenom, $promo, $an, $cursus);
    $return_array = array();
    while($stmt->fetch()) {// on récupère le résultat de la requête et on le met en forme dans un array
        $key = "$prenom, $nom, $promo";
        $return_array[$key][$an] = $cursus;
    }
    $stmt->close();
    return  $return_array;

    //return array('Sciences du Sport et Education Phyique, D\'arc, Jeanne, 2014' => ['2017'=> 'n\'élève pas des moutons', '2018'=> 'repousse les anglais'],
    //'Mécatronique, CURIE, Marie, 2012' => ['2015'=> 'rejoint les troupes des féministes', '2020'=> 'prouve que le nuage s\'est arrété à la frontière']);

}

function getCursusByID($id) {
    // récupère le cursus d'un utilisateur par son id
    global $conn;
    // id == id utilisateur, year == année du cursus, histoire == cursus
    // id_h == id du cursus
    $sql = "SELECT id_h, year, histoire FROM `Cursus` WHERE id=? ORDER BY year";
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
    // ajout d'un nouveau cursus pour l'utilisateur d'identifiant id
    global $conn;
    // id == id utilisateur, year == année du cursus, histoire == cursus
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


function log_print($str){
    //debug print function
    echo "<script> console.log('$str') </script>";
}
