
<?php

require "MySQL.php";

    if (isset($_POST['id_sup'])){
        deleteCursusByIDh($_POST['id_sup']);
    }
    if (isset($_POST['year'])){
        addCursusForID($_SESSION['user_id'],$_POST['year'],$_POST['cursus']);
    }

    
?>


<div id = 'wrap_tableau'>
<span class='nav'>
    <form method="post" action="index.php?tab=students">
        <p>
            <h3>Année d'entrée à l'ENS  :<br /></h3> 
            <?php
            $annees = selectAnnees();
            foreach ($annees as $an ) {
                echo "<input type='checkbox' value= $an name= 'annees_$an' id=$an /> <label for=$an>$an</label><br />";
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
    $champs = ['Prénom','Nom','Promo','Cursus'];
    foreach ($champs as $champ ) {
        echo "<th> $champ </th>";
    }
    ?>
    </tr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $years = array();
        foreach ($_POST as $cle=>$value ) {
            echo "<script> console.log('$cle'+ ' = '+$value) </script>";
            $years = array_merge($years,array($_POST[$cle]));
        }
        //$test = print_r($years);
        //echo " <div> $test[0] </div>";

    } else {
        $years = null;
        $dept = null;
    }
        $data = selectData($years); 
        $nb = count($data);
        foreach ($data as $key => $values){
            echo "<tr>";
            $identifiants = explode(',',$key);
            foreach ($identifiants as $id ) {
                echo "<td> $id </td>";
            }
            echo "<td class ='parcours'>";
            foreach ($values as $annee => $parcours ) {
                echo "$annee : $parcours </br>";
            }
            echo "</tr>";
        }


    //} ?>
    </table>
    <?php
    if (isset($_SESSION["user_id"])){
        $cursus =getCursusByID($_SESSION["user_id"]);
        if($cursus != null) {
            echo "<table>";
            foreach ($cursus as $key => $parcours ) {
                echo "<tr>";
                echo "<td> $parcours </td>";
                ?>
                <td>
                <form action="index.php?tab=students" method="post">
                    <div>
                        <input type="hidden" name="id_sup" value="<?php echo $key; ?>" />
                        <input type="submit" value="Supprimer" />
                    </div>
                </form>
                </td>
                <?php
                echo "</tr>";
            }
            echo "</table>";
        }
        
    ?>
    <div class='ajout_cursus'>
        <form method="post" action="index.php?tab=students">
            <span> Année de début :
                <input type="number" name="year" id="year" placeholder="2016" maxlength="10" min="1950" required />
            </span>
            <span>
                cursus :
                <input type="text" name="cursus" id="cursus" size="100" maxlength="200" required />
            </span>
                <input type="submit" value="Envoyer" />
        </form>
    </div>
    <?php
    }
            
    ?>

</span>
</div>

