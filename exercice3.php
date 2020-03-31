<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Exercices PHP sur les Tableaux SONATEL Academy</title>
  	<link href="style.css" rel="stylesheet">
  </head>
  <body>
    <?php
        include('menus.php');
    ?>    
    <form action="exercice3.php" method="POST">
      <fieldset>
        <legend>Exercice 3</legend>
        <p><input type="text" name="valeur" placeholder="Donnez vos Mots" required/></p>
        <p><input type="submit" value="VALIDER" class="valider" /></p>
      </fieldset>
	  </form>
  </body>
</html>
<?php 
  if (isset($_POST['valeur'])) {
    $valeur=$_POST['valeur'];
    $valeur=strtolower($valeur);
    $tableauMots=determinerMots($valeur);
    ?>
    <div><?php
        echo nl2br("\nLes Mots du tableau sont: \n");
        afficherMotsTableau($tableauMots);
        $tableauMotsAvecCaractere=motAvecUnCaractere($tableauMots);
        echo nl2br("Il y a ".count($tableauMotsAvecCaractere)." mots contenant la lettre M :\n");
        afficherMotsTableau($tableauMotsAvecCaractere);

    ?><br></div>
    <?php
    ?>
    <div><?php
    
    ?><br></div>
    <?php
    
    ?><br></div>
    <?php
    ?>
    <div><?php
      
      
    ?><br></div>
    <?php
    ?>
    <div><?php
      
    ?><br></div>
    <?php
  }
  function determinerMots($tableauDeChaine){
    $compteur=0;
    $tailleTab=strlen($tableauDeChaine);
    $tableauDesMots=array();
    while ($compteur<$tailleTab) {
        $i=0;
        while ($compteur<$tailleTab && $tableauDeChaine[$compteur]==' ') {
            $compteur++;
        }
        $mots="";
        while ($compteur<$tailleTab && $tableauDeChaine[$compteur]!=' ') {
            $mots[$i]=$tableauDeChaine[$compteur];
            $compteur++;
            $i++;
            
        }
        if ($mots!="") {
            array_push($tableauDesMots, $mots);    
        }       
    }
    return $tableauDesMots;
  }
  function afficherMotsTableau($tableauMots){
        foreach ($tableauMots as $value) {
            foreach ($value as $valeur) {
                echo $valeur;
            }
            echo nl2br("\n");
        }
  }
  function rechercheCaractere($mot, $carac){
    $compteur=0; 
    while ($compteur<count($mot) && $mot[$compteur]!=$carac) {
        $compteur++;    
    }
    if ($compteur>=count($mot)) {
        return false;
    }
    return true;
  }
  function motAvecUnCaractere($tableauMots){
    $tableauMotsAvecCaractere=array();
    foreach ($tableauMots as $value) {
        if (rechercheCaractere($value,'m')) {
            array_push($tableauMotsAvecCaractere,$value);
        }
    }
    return $tableauMotsAvecCaractere;
  }
?>