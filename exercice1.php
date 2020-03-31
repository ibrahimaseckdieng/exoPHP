<?php
  set_time_limit(0);
  // Session active pendant une minute
  $inactive = 60; 
  ini_set('session.gc_maxlifetime', $inactive); // Met la session active pendant 60 seconde
  session_start();
  if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
      // last request was more than 2 hours ago
      session_unset();     // unset $_SESSION variable for this page
      session_destroy();   // destroy session data
  }
  $_SESSION['testing'] = time(); // Mise a jour de la session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Exercices PHP sur les Tableaux SONATEL Academy</title>
    <link href="style.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>   
    <?php
      include('menus.php');
    ?>
    <form action="exercice1.php" method="POST">
      <fieldset>
        <legend>Exercice 1</legend>
        <p><input type="num" name="valeur" placeholder="Donnez un nombre sup a 10.000" value="<?php if (isset($_POST['valeur'])) {
          echo $_POST['valeur'];}else{if(isset($_SESSION['valeur'])){echo $_SESSION['valeur'];}}?>" required/></p>
        <p><input type="submit" value="VALIDER" class="valider"/></p>
      </fieldset>
	  </form>
  </body>
</html>
<?php 
  if (isset($_POST['valeur']) && is_numeric($_POST['valeur']) && $_POST['valeur']>10) {
    session_destroy();
    session_start();
    $valeur=$_POST['valeur'];
    $_SESSION['valeur']=$valeur;
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    ?>
    <?php
      ?>
      <?php
      if(empty($_GET['page_inf'])){
        if (isset($_SESSION['page_inf'])) {
          $page_inf=$_SESSION['page_inf'];
        }
        else{
          $page_inf="1";
        }
      }
      else{
        $page_inf=$_GET['page_inf'];
      }
      if(empty($_GET['page_sup'])){
        if (isset($_SESSION['page_sup'])) {
          $page_sup=$_SESSION['page_sup'];
        }
        else{
          $page_sup="1";
        }
      }
      else{
        $page_sup=$_GET['page_sup'];
      }
      ?>
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//definit le nombre d'élément par page
    $count_inf = count($tabInfSup['inferieur']);
    $count_sup = count($tabInfSup['superieur']);
    $pages_inf = ceil($count_inf/$per_page);
    $pages_sup = ceil($count_sup/$per_page);
    $start_inf = ($page_inf - 1) * $per_page;
    $start_sup = ($page_sup - 1) * $per_page;
    ?>
    <?php
    ?>
    <div id="tabInf"><?php
      echo "Les Nombres Premiers Inferieurs a la moyenne ".moyenne($tabNombrePremier)." sont: ";
      paginationInf($tabInfSup['inferieur'],$start_inf,$per_page,$page_inf,$pages_inf);
    ?></div>
    <?php
    ?>
    <div id="tabSup"><?php
      echo "Les Nombres Premiers Superieurs a la moyenne ".moyenne($tabNombrePremier)." sont: ";
      paginationSup($tabInfSup['superieur'],$start_sup,$per_page,$page_sup,$pages_sup);
    ?></div>
    <?php
  }
  else{
    if (isset($_SESSION['valeur'])) {
    $valeur=$_SESSION['valeur'];
    $_SESSION['valeur']=$valeur;
    $tabNombrePremier=array();
    for ($compteur=1; $compteur <=$valeur; $compteur++) { 
      if (estNombrePremier($compteur)) {
        array_push($tabNombrePremier, $compteur);
      }
    }
    ?>
    <?php
      ?>
      <?php 
      if(empty($_GET['page_inf'])){
        if (isset($_SESSION['page_inf'])) {
          $page_inf=$_SESSION['page_inf'];
        }
        else{
          $page_inf="1";
        }
      }
      else{
        $page_inf=$_GET['page_inf'];
      }
      if(empty($_GET['page_sup'])){
        if (isset($_SESSION['page_sup'])) {
          $page_sup=$_SESSION['page_sup'];
        }
        else{
          $page_sup="1";
        }
      }
      else{
        $page_sup=$_GET['page_sup'];
      }
      ?>
    
    <?php
    $tabInfSup['inferieur']=array();
    $tabInfSup['superieur']=array();
    foreach ($tabNombrePremier as $value) {
      if($value<moyenne($tabNombrePremier)){
        array_push($tabInfSup['inferieur'], $value);
      }
      else{
        array_push($tabInfSup['superieur'], $value);
      }
    }
    $per_page =100;//definit le nombre d'élément par page
    $count_inf = count($tabInfSup['inferieur']);
    $count_sup = count($tabInfSup['superieur']);
    $pages_inf = ceil($count_inf/$per_page);
    $pages_sup = ceil($count_sup/$per_page);
    $start_inf = ($page_inf - 1) * $per_page;
    $start_sup = ($page_sup - 1) * $per_page;
    ?>
    <?php
    ?>
    <div id="tabInf"><?php
      echo "Les Nombres Premiers Inferieurs a la moyenne ".moyenne($tabNombrePremier)." sont: ";
      paginationInf($tabInfSup['inferieur'],$start_inf,$per_page,$page_inf,$pages_inf);
    ?></div>
    <?php
    ?>
    <div id="tabSup"><?php
      echo "Les Nombres Premiers Superieurs a la moyenne ".moyenne($tabNombrePremier)." sont: ";
      paginationSup($tabInfSup['superieur'],$start_sup,$per_page,$page_sup,$pages_sup);
    ?></div>
    <?php
    }
  }
  
  function estNombrePremier($val){
    if ($val==2 || $val==1) {
      return true;
    }
    else{
      $i=2;
      $valSur2=(int)($val/2);
      while ( $i<=$valSur2 && ($val%$i)!=0) {
        $i++;
      }
      if (($val%$i)==0) {
        return false;
      }
      else{
        return true;
      }
    } 
  
  }
  /**
   * Cette fonction permet de calculer la moyenne des nombres premiers
   */
  function moyenne($tab){
    $somme=0;
    foreach ($tab as $value) {
      $somme+=$value;
    }
    return $somme/count($tab);
  }
  /**
   * Cette fonction permet la pagination des nombres premiers superieurs a la moyenne
   */
  function paginationInf($tabNombrePremier,$start,$per_page,$page,$pages){
    ?>
    <table class="table table-dark">
      <tr><th colspan="10">Tableau Inferieur</th></tr>
      <?php
      $_SESSION['page_inf']=$page;
      for ($i=$start; $i < $per_page*intval($page); $i+=10) { 
        ?>
        <tr>
          <?php
          for ($j=$i; ($j < $i+10 and $j<count($tabNombrePremier)); $j++) { 
            ?>
            <td><?php echo $tabNombrePremier[$j];?></td>
            <?php
          }
          ?>
        </tr>
        <?php 
      }
      ?>
    </table>
    <div aria-label="Page navigation example">
      <ul class="pagination">
          <?php
          //Show page links
          for ($i = 1; $i <= $pages; $i++)
            {?>
            <li class="page-item" id="<?php echo $i;?>"><a class="page-link" href="?page_inf=<?php echo $page;?>&page_inf=<?php echo $i;?>"><?php echo $i;?></a></li>
            <?php           
            }
          ?>
      </ul>
    </div><br><br>
    <?php
  }
  /**
   * Cette fonction permet la pagination des nombres premiers superieurs a la moyenne
   */
  function paginationSup($tabNombrePremier,$start,$per_page,$page,$pages){
    ?>
    <table class="table table-dark">
      <tr><th colspan="10">Tableau Superieur</th></tr>
      <?php
      $_SESSION['page_sup']=$page;
      for ($i=$start; $i < $per_page*intval($page); $i+=10) { 
        ?>
        <tr>
          <?php
          for ($j=$i; ($j < $i+10 and $j<count($tabNombrePremier)); $j++) { 
            ?>
            <td><?php echo $tabNombrePremier[$j];?></td>
            <?php
          }
          ?>
        </tr>
        <?php 
      }
      ?>
    </table>
    <div aria-label="Page navigation example">
      <ul class="pagination">
          <?php
          //Show page links
          for ($i = 1; $i <= $pages; $i++)
            {?>
            <li class="page-item" id="<?php echo $i;?>"><a class="page-link" href="?page_sup=<?php echo $page;?>&page_sup=<?php echo $i;?>"><?php echo $i;?></a></li>
            <?php           
            }
          ?>
      </ul>
    </div>
    <?php
  }
?>