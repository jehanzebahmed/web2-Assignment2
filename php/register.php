<?php 
require('../Includes/inc_db_config.php');
require('../Includes/inc_functions.php');
// date('Y-m-d H:i:s');

// Variables 
$fName = '';
$lName = '';
$city = '';
$country = '';
$email = '';
$pass = '';
$salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 32);  //http://php.net/manual/en/function.rand.php



  
        
if(isset($_POST['FirstName'])){
    $fName = cleanText($_POST['FirstName']);
}
if(isset($_POST['LastName'])){
    $lName = cleanText($_POST['LastName']);
}
if(isset($_POST['City'])){
    $city = cleanText($_POST['City']);
}
if(isset($_POST['Country'])){
    $country = cleanText($_POST['Country']);
}
if(isset($_POST['Email'])){
    $email = cleanText($_POST['Email']);
}
if(isset($_POST['pwd'])){
    $pass = cleanText($_POST['pwd']);
    $pass = md5($pass . $salt);
    
}
//If all the required data exist- Insert all the info in Customers and CustomerLogon
if(isset($_POST['pwd']) && isset($_POST['Email']) && isset($_POST['Country']) && isset($_POST['City']) && isset($_POST['LastName']) && isset($_POST['FirstName'])) {
    try{
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = 'SELECT Email From Customers WHERE Email = :em';
        // $result = $pdo -> prepare($sql); 
        // $result -> bindValue(':em',$email);
        // $result -> execute();
        // print_r($result);
        
        // if($_POST['Email'] == NULL){

            $sql = "INSERT INTO Customers ( `FirstName`, `LastName`, `Address`, `City`, `Region`, `Country`, `Postal`, `Phone`, `Email`, `Privacy`)
            VALUES (:fName,:lName, NULL, :city , NULL, :country ,NULL,NULL, :email , NULL)";
    
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':fName' ,$fName);
            $result -> bindValue(':lName',$lName);
            $result -> bindValue(':city',$city);
            $result -> bindValue(':country',$country);
            $result -> bindValue(':email',$email);
    
            $result -> execute();
           
                try {
           
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $sql1 = "INSERT INTO `CustomerLogon` ( `UserName`, `Pass`, `Salt`, `State`, `DateJoined`, `DateLastModified`) 
                VALUES (:email , :pass , :salt, '1', :dJ, :dlm)";
                
                
        
                $result1 = $pdo -> prepare($sql1);
                $result1 -> bindValue(':email',$email);
                $result1 -> bindValue(':pass' ,$pass);
                $result1 -> bindValue(':salt',$salt);
                $result1 -> bindValue(':dJ',date('Y-m-d H:i:s'));
                $result1 -> bindValue(':dlm',date('Y-m-d H:i:s'));
                
        
                $result1 -> execute();
                header('location: /html/login.html');
               
              
                $pdo = null;
                } 
                catch (PDOException $e) {
                    die( $e->getMessage() );
                }
          
            $pdo = null;
        // } //end of IF
    }
    catch (PDOException $e) {
     die( $e->getMessage() ); //END OF BIG TRY
}



} //end of if statment 




?>