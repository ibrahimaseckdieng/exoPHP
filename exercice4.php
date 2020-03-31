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
    <form action="exercice4.php" method="POST">
      <fieldset>
        <legend>Exercice 4</legend>
        <p><textarea type="text" cols="53" rows="4" placeholder="Donnez vos phrases" name="valeur"></textarea></p>
        <p><input type="submit" value="VALIDER" class="valider" /></p>
      </fieldset>
	</form>
  </body>
</html>
<?php 
  if (isset($_POST['valeur'])) {
    $valeur=$_POST['valeur'];
    
    ?>
    <div><?php
        $tabPhrase=determinerPhrases($valeur);
        $tableauMots[]=array();
        for ($i=0; $i <count($tabPhrase) ; $i++) { 
            $tab=determinerMots($tabPhrase[$i]);
            array_push($tableauMots, $tab);   
        }
        for ($i=1; $i<count($tableauMots) ; $i++) {
            afficherMotsTableau($tableauMots[$i]);
            echo ".";
        }
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
  function determinerPhrases($tableauDeChaine){
    $compteur=0;
    $tailleTab=strlen($tableauDeChaine);
    $tableauDesPhrases=array();
    while ($compteur<$tailleTab) {
        $i=0;
        while ($compteur<$tailleTab && $tableauDeChaine[$compteur]=='.') {
            $compteur++;
        }
        $phrase="";
        while ($compteur<$tailleTab && $tableauDeChaine[$compteur]!='.') {
            $phrase[$i]=$tableauDeChaine[$compteur];
            $compteur++;
            $i++;
        }
        if ($phrase!="") {
            array_push($tableauDesPhrases, $phrase);    
        }       
    }
    return $tableauDesPhrases;
  }
  function determinerMots($tableauDeChaine){
    $compteur=0;
    $tailleTab=count($tableauDeChaine);
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
        for($i=0;$i<count($tableauMots);$i++) {
            foreach ($tableauMots[$i] as $valeur) {
                $valeur[0]=strtoupper($valeur[0]);
                echo $valeur;
            }
            if ($i!=count($tableauMots)-1) {
                echo nl2br(" ");
            }
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