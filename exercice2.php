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
    <form action="exercice2.php" method="POST">
      <fieldset>
        <legend>Exercice 2</legend>
        <p>Choisissez une langue pour afficher les mois de l'annee: </p>
        <p><select name="choix">
              <option>Francais
              <option>Anglais  
          </select></p>
        <p><input type="submit" value="VALIDER" class="valider" /></p>
      </fieldset>
	  </form>
  </body>
</html>
<?php 
  if (isset($_POST['choix'])) {
    $choix=$_POST['choix'];
    $tabMois['Francais']=array("Janvier", "Fevrier",'Mars','Avril','Mai','Juin','juillet','Aout','Septembre','Octobre','Novembre','Decembre');
    $tabMois['Anglais']=array('January', 'February','March','April','May','June','july','August','September','October','November','December');
    ?>
    <div><?php
      if ($choix=='Francais') {
        echo "Les Mois de l'année en Français sont: ";
        ?>
            <?php
                tableauMois($tabMois['Francais']);
            ?>
        <?php
      }
      else{
        echo "Les Mois de l'année en Anglais sont: ";
        ?>
            <?php
                tableauMois($tabMois['Anglais']);
            ?>
        <?php
      }  
    ?><br></div>
    <?php
  }
  function tableauMois($tabMois){
    ?>
    <table>
    <?php
    for ($i=0; $i <count($tabMois) ; $i+=3) {
        ?>
        <tr>
        <?php
        for ($j=$i; $j <$i+3 ; $j++) {
            ?>
            <td><?php echo $j+1;?></td>
            <td><?php echo $tabMois[$j];?></td>
        <?php         
        }
        ?>
        </tr>
        <?php 
    }
    ?>
    </table>
    <?php
  }
?>