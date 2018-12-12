<?php
require('../Includes/inc_db_config.php');
session_start();
    try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM Artists WHERE ArtistID= :id';
            
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $_GET['ArtistID']);
            $result -> execute();
            $Artist= $result->fetch();  
       
       
       $ArtistName =  checkNull($Artist['FirstName']) ." ". checkNull($Artist['LastName']); 
       $yearofBirth =  checkNull($Artist['YearOfBirth']);
       $artistDetail = checkNull($Artist['Details']);
        $pdo = null;
    } 
  
    catch (PDOException $e) {
     die( $e->getMessage() );
    }
    function checkNull($string){
        if($string != null){
        return $string;
        }
        else return '';
    }
include('../php/navBar.php');
echo "


<html>
    <head>
        <script type='text/javascript' src='/js/singleView.js'></script>
        <link rel='stylesheet' href='/CSS/finalCSS.css' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
    </head>
    <body>
    
    <main class='container'>  
        
        <div class='box two'>
        <section id='secone'>
            <h2 id='htwo'>$ArtistName</h2>
            <section>
                <img id='artistimg' src='/images/artists/square/".$_GET['ArtistID'].".jpg'></img>
                </section>
                <section>
                <label>$ArtistName</label>
                <label>$yearofBirth</label>
                <p>$artistDetail</p>
                </section>
            </section>
           
            <div><button id='closeButton' class ='button'> <a href='/index.php'>Close</a></button></div>
        </div>
        
        <div class='box three'>
        <section id='paintingList'>
            <table id='paintings'>
                <thead>
                    <tr id='rowHead'>
                        <th></th>
                        <th id ='artistSort' class='sort'>Artist</th>
                        <th id ='titleSort' class='sort'>Title</th>
                        <th id ='yearSort' class='sort'>Year</th>
                    </tr>
                </thead>
                <tbody id=tBody></tbody>
            </table>
            </section>
        </div>
      </main>

    </body>
    <script>getPaintings(".$_GET['ArtistID'].", 2); </script>
</html>";

?>