<?php 
require_once('../Includes/inc_db_config.php');


    try{
        $pdo = new PDO(DBCONNSTRING, DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        if(isset($_GET['GenreID'])){
            
            $sql = 'SELECT * FROM Genres WHERE GenreID= :id';
            $id = $_GET['GenreID'];
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':id', $id);
            $result -> execute();
            $data = $result->fetchAll();
            echo json_encode($data);
           
        }
        else{
            $sql = 'SELECT * FROM Genres';
            $result = $pdo -> query($sql); 
            $data = $result -> fetchAll();
            echo json_encode($data);
        }
    
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

?>