<?php
require('../Includes/inc_db_config.php');
include("../Includes/inc_functions.php");
require('../php/navBar.php');
session_start();
    try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE PaintingID = :id';
        
        
        
            $id = $_GET['PaintingID'];
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $id);
            $result -> execute();
            $painting = $result->fetchAll();
           
     $pImageFileName = $painting[0]["ImageFileName"];
     $pTitle = $painting[0]["Title"];
     $pMuseumLink = $painting[0]["MuseumLink"];
     $pCopyrightText = $painting[0]["CopyrightText"];
     $pDescription = $painting[0]["Description"];
     $pExcerpt = $painting[0]["Excerpt"];
     $pYearOfWork = $painting[0]["YearOfWork"];
     $pWidth = $painting[0]["Width"];
     $pHeight = $painting[0]["Height"];
     $pMedium = $painting[0]["Medium"];
     $pCost = $painting[0]["Cost"];
     $pWikiLink = $painting[0]["WikiLink"];
     $pArtistID = $painting[0]["ArtistID"];
     $pArtistLName = $painting[0]["LastName"];

    $pJson = json_decode($painting[0]["JsonAnnotations"], true);
   
    $paintArray = array(); 
    $paintArray[] = $pImageFileName;
    $paintArray[] = $pArtistID;
    $paintArray[] = $pArtistLName;
    $paintArray[] = $_GET['PaintingID'];
    $paintArray[] = $pTitle;
    $paintArray[] = $pYearOfWork;
    
    // foreach($pJson['dominantColors'] as $key=> $value){
    //     echo "<p>" .  $value['name'] ."</p><div style='background-color:" . $value['web'] . ";width:100px;height:100px;'></div>";
        
       
        
        
    // }
    
 
    
        $pdo = null;
    } 
  
    catch (PDOException $e) {
     die( $e->getMessage() );
    }
    




    



echo "<!DOCTYPE html>";
echo "<html>";
    echo "<head lang= 'en'>";
    echo "<meta charset='utf-8'/>";     
    echo "<title> Single Painting </title>";
        echo "<link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>";
         echo "<link rel='stylesheet' href='/CSS/painting-single.css'>";
    
    echo "</head>";
    echo "<body>";
        
        echo "<div class = 'six'>";
        echo "<img src='/images/paintings/full/$pImageFileName.jpg' id='paintingImage'></img>";
            
        echo "<section>";
            echo "<h2 id='paintingT'>$pTitle </h2>";
            echo "<h3 id= 'name'></h3>";
             
            echo "<label> Year: </label>";
            echo "<h3 id='detail'>$pYearOfWork</h3> <br>"; 
            echo "<label>Medium: </label>";
            echo "<h3 id='medium'>$pMedium</h3>  <br> ";  
            echo "<label>Size: </label>";
            echo "<h3 id='size'>".$pHeight .'x'. $pWidth."</h3><br>";
            echo "<label>Cost: </label>";
            echo "<h3 id='cost'>" ."\$".$pCost."</h3> <br>";
            echo "<label>Copyright: </label>";
            echo "<h3 id='copy'>$pCopyrightText</h3> <br>";
            echo "<label> Links: </label><br>";
            echo "<a href='$pMuseumLink' id='museum'>Museum Link</a><br>";
            echo "<a href='$pWikiLink' id='wiki'>Wiki Link</a><br>";
           echo " <label> Description: </label>";
            echo "<h4 id='desc'>$pDescription</h4>";
            
            
            
        echo "</section>";
         echo "<div id= 'scheme'>";
            foreach($pJson['dominantColors'] as $key=> $value){
                echo "<div class = 'colors'>";
                 echo "<p>" .  $value['name'] ."</p>";
                 echo "<div style='background-color:" . $value['web'] . ";width:40px;height:40px;'></div>";
                 echo "</div>";
            }
            echo "</div>";
               
        echo "</div>";
        
        
    
   echo  "</body>";
echo "</html>";



?>