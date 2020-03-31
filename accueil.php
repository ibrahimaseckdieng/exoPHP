<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Exercice de PHP</title>
    <meta content="text/html; charset=utf-8" />
    <link href="style.css" rel="stylesheet">
  </head>
  <body>    
    <header>
        <h1>Exercices PHP SONATEL Academy</h1>
          <nav>
            <ul id="navigation">
              <li><a href="?page=exercice1">EXERCICE 1</a></li>
              <li><a href="?page=exercice2">EXERCICE 2</a></li>
              <li><a href="?page=exercice3">EXERCICE 3</a></li>
              <li><a href="?page=exercice4">EXERCICE 4</a></li>
              <li><a href="#">EXERCICE 5</a></li>
            </ul>
          </nav>  
    </header>
    <?php
        if(isset($_GET['page'])){
          include($_GET['page'].'.php');
        }
        else{
          include('exercice1.php');
        }
    ?>
  </body>
  <footer ></footer>
</html>