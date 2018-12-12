<?php 
session_start();

$favList = $_SESSION['fav'];

?>
<html>
    <head>
        <script type='text/javascript' src='/js/favorites.js'></script>
        <link rel='stylesheet' href='/CSS/finalCSS.css' type='text/css' />
        <link href='https://fonts.googleapis.com/css?family=Lobster|Roboto' rel='stylesheet'>
    </head>
    <body>
    
    <main class='container'>  
        <div class='box one'>
        <section id='paintingList'>
            <table id='paintings'>
                <thead>
                    <tr id='rowHead'>
                        <th></th>
                        <th id ='artistSort' class='sort'>Artist</th>
                        <th id ='titleSort' class='sort'>Title</th>
                        <th id ='yearSort' class='sort'>Year</th>
                    </tr>
                </thead>
                <tbody id=tBody>
                <?php    
                    foreach($favList as $pic){
                    echo "
                     <tr>
                         <td><img src='/images/paintings/square/".$pic[0].".jpg'></img></td>
                         <td><a href='/SingleViewPages/artist_singleView.php?ArtistID=.".$pic[1]."'>".$pic[2]."</a></td>
                         <td><a href='/SingleViewPages/painting_singleView.php?PaintingID=.".$pic[3]."'>".$pic[4]."</a></td>
                         <td><".$pic[5]."</td>
                         <td><button id=removePic>Remove</button></td>
                     </tr>  ";
                    }
                ?>
                </tbody>
            </table>
            </section>
        </div>
      </main>

    </body>
  
</html>