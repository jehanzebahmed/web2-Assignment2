<?php 

require('../Includes/inc_db_config.php');

try{
    $pdo = new PDO(DBCONNSTRING, DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    if(isset($_GET['GalleryID'])){
        $sql = 'SELECT * FROM Galleries WHERE GalleryID= :id';
        $id = $_GET['GalleryID'];
        $result = $pdo -> prepare($sql); 
        $result -> bindValue(':id', $id);
        $result -> execute();
        $data = $result->fetchAll();
        echo json_encode($data);
       // $output = json_decode($string);
        // for($i= 0; $i < count($output); $i++){
        //     echo "<li>";
        //     echo $output[$i] -> GalleryName;
        //     echo "</li>";
        // }
        
    }
    else{
        $sql = 'SELECT * FROM Galleries';
        $result = $pdo->prepare($sql);
        $result->execute();
        $data = $result -> fetchAll();
        echo json_encode($data);
        
        // $output = json_decode($string);
        
        // for($i= 0; $i < count($output); $i++){
        //      echo "<li>";
        //     echo $output[$i] -> GalleryName ;
        //      echo "</li>";
        // }
       
       

       
}
}

catch (PDOException $e) {
    die( $e->getMessage() );
}


?>