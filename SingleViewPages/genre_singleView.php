<?php
require('../php/navBar.php');
require('../Includes/inc_db_config.php');
include("../Includes/inc_functions.php");
session_start();
    try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM Genres WHERE GenreID= :id';
        
        
        
            $id = $_GET['GenreID'];
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $id);
            $result -> execute();
            $genre = $result->fetchAll();
            // print_r($genre);
       
       
       $genreName = $genre['0']["GenreName"];
    
       $genreDesc =  checkNull($genre['0']['Description']);
       $genreLink = checkNull($genre['0']['Link']);
        $pdo = null;
    } 
  
    catch (PDOException $e) {
     die( $e->getMessage() );
    }
    

echo "
<!DOCTYPE HTML>
<html>
    <head lang = 'en'>
        <meta charset = 'utf-8'>
        <title> Single Genre </title>
        <script type='text/javascript' src='/js/singleView.js'></script>
        <link rel='stylesheet' href='/CSS/genre-single.css' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
    </head>
    <body>
      <main class='container'>  
        
        
        <div class='box two'>
            <section>
                <h2>$genreName</h2>
                <img src='/images/genres/". $_GET['GenreID']. ".jpg'></img>
                    <h5> About $genreName: </h5>
                    <p>$genreDesc</p>
                    Link: <a href='$genreLink'>Wiki Link</a>
            </section>
            <div><button id='closeButton' class ='button'> <a href='/index.php'>Close</a></button></div>
        </div>

        <div class='box three'>
            <section>
                <table id='paintingDetail'>
                    <thead>
                        <tr id='tableHead'>
                            <th></th>
                            <th>Artist</th>
                            <th>Title</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody id=tBody></tbody>
                 </table>
            </section>
        </div> 
        
      </main>


 
    
     <script>getPaintings(".$_GET['GenreID'].",3); </script>
    </body>
   
</html>";







?>