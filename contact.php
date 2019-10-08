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
    if (($size_file + $size_folder)<100000){
        $fichier = fopen("stockage/remarques.txt",'a+');
        fputs($fichier, $_POST['ameliorer']. PHP_EOL);
    } 
}
    ?>