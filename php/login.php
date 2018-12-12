<?php 
require('../Includes/inc_db_config.php');
require('../Includes/inc_functions.php');
include('../php/navBar.php');
//<?php include('../php/navBar.php'); // This is the Nav Bar
//starting session
session_start();

// Variables 
$email = '';
$pass = '';
$salt = '' ;
$errorStr= '';
$valid = true;

//checking for varibles 
if(isset($_POST['Email'])){
    $email = cleanText($_POST['Email']);
}
if(isset($_POST['pwd'])){
    $pass = cleanText($_POST['pwd']);
    if(strlen($pass)< 6){
       $errorStr ="Password is too short!";
       $valid = false;
    }
}
        
if(isset($_POST['Email']) && isset($_POST['pwd']) && $valid){
    

 try {
   
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT Salt FROM CustomerLogon WHERE UserName = :email';   
            $result = $pdo -> prepare($sql); 
            $result -> bindValue(':email',$email);
            $result -> execute();
            $data= $result->fetch();
            $salt = $data['Salt'];
            
            $uPass = md5($pass.$salt);
            try {
                $sql = 'SELECT Salt FROM CustomerLogon WHERE UserName = :email AND Pass = :pass';   
                    $result = $pdo -> prepare($sql); 
                    $result -> bindValue(':email',$email);
                    $result -> bindValue(':pass',$uPass);
                    $result -> execute();
                    $data2= $result->fetch();
                    if($data2 && isset($_POST['Email']) ){
                        $_SESSION['username'] = $email;
                        $_SESSION['status'] = 'Logged In';
                        header('location: ../index.php');
                    }else{
                        $errorStr = "No Match Found!";
                       //header('location: /php/login.php');
                    }
                   
                $pdo = null;
            } 
            catch (PDOException $e) {
             die( $e->getMessage() );
            }
        $pdo = null;
    } 
    catch (PDOException $e) {
     die( $e->getMessage() );
    }
    
}
echo "

<!--https://www.w3schools.com/howto/howto_css_login_form.asp-->
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Login / Logout</title>
    <link rel='stylesheet' href='../CSS/loginStyle.css' />
     <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
</head>
<body>
    
    <form action='/php/login.php' method='post' target='_self'>
        
        <fieldset id='first'>
                <h1 id='header'>Login</h1>
                <div id='loginInfo'>
                    
                    <input id='email' type='email' name='Email' value='' placeholder='Username or email' required/> <br>
                    
                    <input id='password' type='password' name='pwd' value='' placeholder='Password' required/> <br>
                    
                    <button id='login' type='submit'>Log in</button> <br> 
                    
                    <label id='remember'>
                    $error
                    </label>
            </div>
        </fieldset>
        
        <fieldset id='second'>
            <div id='signup'>
                <span>Don't have an account? <a href='signup.html'>Sign Up</a></span>
            </div>
        </fieldset>
    </form>
</body>
</html>";


?>


