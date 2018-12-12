<?php
// This PHP file makes an img from the JPEG files and returns it based on the queryStrings 
// Types: 
// a = Artist
// p = Paintings 
// g = Genre

// Size:
// s = Square
// f = full size images 

// width

        //if(isset($_GET['file'])){
            
            // we need to tell browser that this is returning an image
            // header('Content-Type: image/jpeg');
           
            // //Here 's' stands square size images 
            // if($_GET['size'] == "s"){
            //     echo "size = s";
            //         //here a = Artist
            //         if($_GET['type'] == "a"){
            //          echo "art = a";
            //          $imgname = "images/artists/square/".$_GET['file'].".jpg";
            //          $img = imagecreatefromjpeg($imgname);
            //         }
                
                
            //     //here g = Genre
            //     if($_GET['type'] == "g"){
                
            //      $imgname = "images/genres/".$_GET['file'].".jpg";
            //      $img = imagecreatefromjpeg($imgname);
            //     }
                
            //     //here p = Painting
            //     if($_GET['type'] == "p"){
                
            //      $imgname = "images/paintings/square/".$_GET['file'].".jpg";
            //      $img = imagecreatefromjpeg($imgname);
            //     }
                
            // }
            // //Here f = Full Size Img
            // else if($_GET['size'] == "f"){
                
            //     //here a = Artist
            //     if($_GET['type'] == "a"){
                
            //      $imgname = "images/artists/full/".$_GET['file'].".jpg";
            //      $img = imagecreatefromjpeg($imgname);
            //     }
                
                
            //     //here g = Genre
            //     if($_GET['type'] == "a"){
                
            //      $imgname = "images/genres/".$_GET['file'].".jpg";
            //      $img = imagecreatefromjpeg($imgname);
            //     }
                
            //     //here p = Painting
            //     if($_GET['type'] == "p"){
                
            //      $imgname = "images/paintings/full/".$_GET['file'].".jpg";
            //      $img = imagecreatefromjpeg($imgname);
            //     }
                
            // }
            
            // //Setting the Width
            //         if(isset($_GET['width'])){
            //         $newimg = imagescale($img,$_GET['width'],$_GET['width']);
            //         }
            //         else {
            //             $newimg = imagescale($img,600,600);
            //         }
            
         
            // and return it
            // imagejpeg($newimg);
       // }
       
       
       
        
            // // we need to tell browser that this is returning an image
            // header('Content-Type: image/jpeg');
            // // create the image from a file
            // $imgname = "images/artists/square/1.jpg";
            // $img = imagecreatefromjpeg($imgname);
            
            // imagejpeg($img);
            
    // if(isset($_GET['file'])){
    // header('Content-Type: image/jpeg');
    // $imgname = "images/paintings/square/". $_GET['file'] . ".jpg";
    // $img = imagecreatefromjpeg($imgname);
    // if(isset($_GET['width'])){
    //     $newimg = imagescale($img,$_GET['width'],$_GET['width']);
    // }
    // else{
    //     $newimg = imagescale($img,600,600);
    // }

    // echo imagejpeg($newimg);
        

?>

