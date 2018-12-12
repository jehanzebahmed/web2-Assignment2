<?php
Header('Content-Type:  application/JSON');

require('../Includes/inc_db_config.php');
    try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        if(isset($_GET['ArtistID'])){
            $sql = 'SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID Where Artists.ArtistID=  :id';
            
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $_GET['ArtistID']);
            $result -> execute();
            $Artist= $result->fetchAll();  
            echo json_encode($Artist);
        }
        else if(isset($_GET['GalleryID'])){
            $sql = 'SELECT * FROM Paintings 
            INNER JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID 
            INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
            WHERE Paintings.GalleryID = :id';
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $_GET['GalleryID']);
            $result -> execute();
            $Gallery= $result->fetchAll();  
            echo json_encode($Gallery);
        }
        
        else if(isset($_GET['GenreID'])){
            
            
            $sql = 'SELECT * FROM Paintings
                    INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID
                    INNER JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID
                    Where PaintingGenres.GenreID = :id';
            
            
            
            // 'SELECT * FROM PaintingGenres 
            // INNER JOIN Genres ON Genres.GenreID = PaintingGenres.GenreID
            // Where PaintingGenres.GenreID = :id';
            
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $_GET['GenreID']);
            $result -> execute();
            $Genre= $result->fetchAll();  
            echo json_encode($Genre);
        }
        
        else { 
            $sql = 'SELECT * FROM Paintings';
            $result =$pdo->query($sql);
             echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
          
        }
       
        $pdo = null;
    } 
  
    catch (PDOException $e) {
     die( $e->getMessage() );
    }

?>