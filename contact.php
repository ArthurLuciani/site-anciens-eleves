<!-- entrée de type texte pour laisser un commentaire visible uniquement par le gérant du site -->
<div>
    <form method="post" action="index.php">
        <fieldset>
            <p>
                <label for="ameliorer"> Avez vous des remarques, des questions à nous faire parvenir ?</label><br />
                <textarea name="ameliorer" id="ameliorer" maxlength="300" rows="6" cols="50" required ></textarea>
            </p>
            <input type="submit" value="Envoyer" />
        </fieldset>
	</form>
</div>
<?php 
/// fonction générale pour mesurer la taille d'un dossier et de ses sous dossiers 
function sizeFolder($Rep)
{
    $Racine=opendir($Rep);
    $Taille=0;
    while($Dossier = readdir($Racine))
    {
        if($Dossier != '..' And $Dossier !='.')
        {
            if(is_dir($Rep.'/'.$Dossier)) {
                $Taille += sizeFolder($Rep.'/'.$Dossier); //Ajoute la taille du sous dossier
            }  
            else{
                $Taille += filesize($Rep.'/'.$Dossier); 
                    //Ajoute la taille du fichier
            } 
        }
    }
    closedir($Racine);
    return $Taille;
}
if ( isset($_POST['ameliorer']))
{
    $size_file = strlen($_POST['ameliorer']); 
    $size_folder = sizeFolder("stockage");
    // vérification de la taille après ajout pour raison de sécurité
    if (($size_file + $size_folder)<100000){
        $fichier = fopen("stockage/remarques.txt",'a+');
        $message = $_POST['ameliorer'];
        fputs($fichier, $message.PHP_EOL);
    } 
}
?>