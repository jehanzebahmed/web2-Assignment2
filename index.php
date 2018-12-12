<?php ?>

<!DOCTYPE HTML>
<html>
    <head lang = 'en'>
        <meta charset = 'utf-8'>
        <title> Home </title>
            <link rel="stylesheet" href="/CSS/new.css" type='text/css' />
            <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
    </head>
    <body>
         <nav id = 'navBar'>
            <li><img id='websiteImg' src='../images/icons/websiteIcon.jpg'></li>
            <li><a href= '../php/favorites.php'> <img id='favouritesIcon' src='../images/icons/favoritesIcon.jpg'> Favorites</a></li>
            <li>
                <a href= '../php/login.php' > <img id='loginIcon' src='../images/icons/loginIcon.jpg'> Login / Logout </a>
            </li> 
            <li><a href = '../about.html' > <img id='aboutIcon' src='../images/icons/aboutIcon.jpg'> About </a> </li>
            <li><a href = '../index.php' > <img id='homeIcon' src='../images/icons/homeIcon.jpg'> Home </a> </li>
        </nav> 
    <main class="container">
        <div class="box one">
            <section>
              <h2>Galleries</h2>
              <ul id="galleries"></ul>        
            </section>  	
        </div>
        
        <div class = 'box two'>
            <section>
                 <h2 id='artist'>Artists</h2>
                 <ul id='artistsList'></ul>   
            </section>
        </div>
        
        <div class = 'box three'>
            <section>
                <h2>Genre</h2>
                     <div id = 'genreList' >  </div>
            </section>
        </div>
    </main>
    <script src="../js/gallery.js"></script>
    <script src="../js/artist_zeb.js"></script>
    <script src="../js/genre.js"></script>
    </body>
</html>

