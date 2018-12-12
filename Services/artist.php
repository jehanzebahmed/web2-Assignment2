<?php
Header('Content-Type:  application/JSON');

require('../Includes/inc_db_config.php');
    try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        if(isset($_GET['ArtistID'])){
            $sql = 'SELECT * FROM Artists WHERE ArtistID= :id';
            
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $_GET['ArtistID']);
            $result -> execute();
            $Artist= $result->fetchAll();  

            
            json_encode($Artist);
        }
        else { 
            $sql = 'SELECT * FROM Artists';
            $result =$pdo->query($sql);
             echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
          
        }
       
        $pdo = null;
    } 
  
    catch (PDOException $e) {
     die( $e->getMessage() );
    }

?>