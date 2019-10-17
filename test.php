
<?php
function selectAnnees(){
    // select annee from Parcours
    return  array(2000,2001);
}

function selectData(){
    // forme des data : [Prénom, Nom, Année d'entrée' => [Année => parcours, Année => parcours],'Nom prenom' => [Année => parcours, Année => parcours]]
    return array(' Jeanne, D\'ARC,  2014' => ['2017'=> 'n\'élève pas des moutons', '2018'=> 'repousse les anglais'],
    ' Marie, CURIE,  2012' => ['2015'=> 'rejoint les troupes des féministes', '2020'=> 'prouve que le nuage s\'est arrété à la frontière car il n\'avait pas les papiers nécessaires']);

    }
function selectCursusByID(){

    return ['id_h1'=> '2017 : n\'élève pas des moutons', 'id_h2'=> '2018 repousse les anglais'];
}
?>