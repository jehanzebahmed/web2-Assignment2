<?php 
$status = 'Login';
session_start();
if(isset($_SESSION['status'])){
    $status = 'Log out';
}

?>  
<!DOCTYPE html>
<html>
    <head lang = 'en'>
        <meta charset = 'utf-8'>
        <link rel='stylesheet' href='/CSS/navbar.css' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
    </head>
    <body>
        <nav id = 'navBar'>
            <li><img id='websiteImg' src='../images/icons/websiteIcon.jpg'></li>
            <li><a href= '../php/favorites.php'> <img id='favouritesIcon' src='../images/icons/favoritesIcon.jpg'> Favorites</a></li>
            <li>
                <a href= '../php/login.php' > <img id='loginIcon' src='../images/icons/loginIcon.jpg'> <?php echo $status;?> </a>
            </li> 
            <li><a href = '../about.html' > <img id='aboutIcon' src='../images/icons/aboutIcon.jpg'> About </a> </li>
            <li><a href = '../index.php' > <img id='homeIcon' src='../images/icons/homeIcon.jpg'> Home </a> </li>
        </nav> 
     </body>
     </html>
     
   