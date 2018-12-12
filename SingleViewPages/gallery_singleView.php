<?php
require('../Includes/inc_db_config.php' );
include('../php/navBar.php');
session_start();
try{
    if(isset($_GET['GalleryID'])){
        $pdo = new PDO(DBCONNSTRING,DBUSER, DBPASS);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryAddress, GalleryCountry, GalleryWebsite, Latitude, Longitude FROM Galleries WHERE GalleryID = :id';
        $result = $pdo -> prepare($sql);
        $result ->bindValue(':id', $_GET['GalleryID']);
        $result -> execute();
       
        while ($row = $result->fetch()) {
            //  print_r($row);
            echo "<!DOCTYPE HTML>";
            echo "<html>";
            echo "<head lang = 'en'>";
            echo "<meta charset = 'utf-8'>";
            echo "<title> Single Page Gallery </title>";
             echo "<script type='text/javascript' src='/js/singleView.js'></script>";
             echo "<link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>";
            echo "<link rel='stylesheet' href='/CSS/gallery-single.css'>";
            echo "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD5ezDzGuoDJNau0KaBcTf2Hg0Flt9K7OQ&callback=popGMap' 
            async defer></script>";
            echo "</head>";
            echo "<body>";
            echo "<main class='container'>";
            
            echo "<div id= 'bigDiv'>";
            echo "<div class='box one'>";
            echo "<section>";
            echo "<label> </label>";
            echo "<h2 id='galleryName'>" .  $row['GalleryName'] . "</h2>";
            echo "<label>Native Name:</label>";
            echo "<span id='galleryNative'>" .  $row['GalleryNativeName'] . "</span>";         
            echo "<label>City:</label>";
            echo "<span id='galleryCity'>" .  $row['GalleryCity'] . "</span>";    
            echo "<label>Address:</label>";
            echo "<span id='galleryAddress'>" . $row['GalleryAddress']. "</span>";   
            echo "<label>Country:</label>";
            echo "<span id='galleryCountry'>" . $row['GalleryCountry'] . "</span>";            
            echo "<label>Home:</label>";
            echo "<span><a href= '" . $row['GalleryWebsite'] . "'>" . $row['GalleryWebsite'] . "</a></span>";
            echo "</section>";
              echo "<div><button id='closeButton' class ='button'> <a href='/index.php'>Close</a></button></div>";
            echo "</div>";
              
            echo "<div class = 'box two'>";
            echo "<div id= 'map'></div>";
            echo "</div>";
            echo "</div>";
            
            echo "<div class='box three'>";
            echo "<section>";
            echo "<table id='paintingDetail'>";
            echo "<thead>";
            echo "<tr id='tableRow'>";
            echo "<th></th>";
            echo "<th>Artist</th>";
            echo "<th>Title</th>";
            echo "<th>Year</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody id=tBody></tbody>";
            echo "</table>";
            echo "</section>";
            echo "</div> ";
          
            echo "</main>";///
            echo "<script>getPaintings(" . $_GET['GalleryID'] . ",1); </script>";
            echo "<script> popGMap(" . $row['Latitude']. "," . $row['Longitude'] . "); </script>";
            echo "</body>";
     
        }
        
            
    }
        
}

catch(PDOException $e){
    die( $e->getMessage() );
}


?>