<html>
  <title>Exercices PHP SONATEL Academy</title>
  <head>
  </head>
  <style type="text/css">
    header{
      width: 100%;
      height: 150px;
      margin-top: 0%;
      text-align: center; 
      background-color: rgb(61, 205, 190);
    }
    body {
        background-color: #cac3bc
    }
    nav {
    display: inline-block;
    text-align: center;
    width: 100%;
  }
    nav ul ul {
        display: none;
    }
    nav ul li:hover > ul {
        display: block;
    }
    nav ul {
        background-color: #fff;
        margin-top: 10px;
        padding: 0 20px;  
        list-style: none;
        position: relative;
        display: inline-table;
    }
    nav ul li {
        float: left;
    }
    nav ul li:hover {
        border-bottom: 5px solid #f5aa65;
        color: #fff;
    }
    nav ul li a:hover {
        color: #000;
    }

    nav ul li a {
        display: block; 
        padding: 15px 15px;
        font-family: 'PT Sans', sans-serif;
        color: #000; 
        text-decoration: none;
    }
    nav ul ul {
        background-color:#fff;
        border-radius: 0px; 
        padding: 0;
        position: absolute;
        top: 100%;
        box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
    }
    nav ul ul li {
        float: none; 
        position: relative;
    }
    nav ul ul li a {
        padding: 15px 40px;
        color: #000;
    }
    nav ul ul:before {
        content: "";
        display: block;
        height: 20px;
        position: absolute;
        top: -20px;
        width: 100%;
    }
  </style>
  <body>    
    <header>
        <h1>Exercices PHP SONATEL Academy</h1>
        <nav>
          <ul id="navigation">
            <li><a href="exercice1.php">EXERCICE 1</a></li>
            <li><a href="exercice2.php">EXERCICE 2</a></li>
            <li><a href="exercice3.php">EXERCICE 3</a></li>
            <li><a href="exercice4.php">EXERCICE 4</a></li>
            <li><a href="#">EXERCICE 5</a> </li>
          </ul>
        </nav>
    </header>
       
  </body>
  <footer ></footer>
</html>