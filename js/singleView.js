
function popGMap(x , y) {
     map = new google.maps.Map(document.getElementById('map'), {
     center: {lat: parseFloat(x), lng: parseFloat(y)}, 
     mapTypeId: 'satellite', 
     zoom: 18
        });
        map.setTilt(45);
} 

closeButton(); //sets up close button
var paintList;   
 
function getPaintings(id , value){
    var url ='';
    if(value == "1"){
        url = "/Services/painting.php?GalleryID="+id;
    }else if(value == "2"){
        url = "/Services/painting.php?ArtistID="+id;
    }
    else if(value == "3"){
        url = "/Services/painting.php?GenreID="+id;
    }
fetch(url)
.then(response => {return response.json();})
.then(data => {
    paintList = data; 
    paintList.sort(compareArtist);
    popPaintings(paintList);
        
    //Adding Event Listeners to sort by Artist, Title or Year
    document.querySelector('#artistSort').addEventListener( 'click', ()=> {
                                                                    paintList.sort(compareArtist);
                                                                    popPaintings(paintList);
                                                                });
                                                                        
    document.querySelector('#titleSort').addEventListener( 'click',()=> {
                                                                    paintList.sort(compareTitle);
                                                                    popPaintings(paintList);
                                                                });
            
    document.querySelector('#yearSort').addEventListener('click', ()=> {
                                                                    paintList.sort(compareYear);
                                                                    popPaintings(paintList);
                                                                });
            
    })
.catch(E => console.log("Error: " + E));
}

//Populates the painting into the table
function popPaintings(pList) {
    var pTable = document.querySelector('#tBody');
    pTable.innerHTML = ''; //clears the table 
    
    pList.forEach( p => {
        var tr = document.createElement('tr');
        var imgSrc = p.ImageFileName; 
        var pPic = document.createElement('img');
        pPic.setAttribute('src' , "../images/paintings/square/"+ imgSrc + ".jpg"); 
        pPic.setAttribute('width', 100);
        pPic.setAttribute('height', 100);
            
        var pPainting =document.createElement('td');
        pPainting.appendChild(pPic);
      
        var pArtist =document.createElement('td');
        pArtist.appendChild(document.createTextNode(p.LastName));
            
        var pTitle = document.createElement('td');
        pTitle.appendChild(document.createTextNode(p.Title));
            
        var pYear = document.createElement('td');
        pYear.appendChild(document.createTextNode(p.YearOfWork));
        
        
        tr.appendChild(pPainting);
        tr.appendChild(pArtist);
        tr.appendChild(pTitle);
        tr.appendChild(pYear);
        pTable.appendChild(tr);
        
        tr.addEventListener('click', ()=> {
           //upon click the user is directed to single Painting view with PaintingID that is passed in
           window.location.href = '../SingleViewPages/painting_singleView.php?PaintingID='+ p.PaintingID ;
        })
       
    });
}

//compares the last name of artist and orders the list alphabetically 
function compareArtist(x,y){
    if(x.LastName < y.LastName){return -1;}
    else if (x.LastName > y.LastName){return 1;}
}  

//compares the title of the painting and orders alphabetically 
function compareTitle(x,y){
    if(x.Title < y.Title){return -1;}
    else if (x.Title > y.Title){return 1;}
}

//compares the years and orders them by ascending order 
function compareYear(x,y){
    if(x.YearOfWork < y.YearOfWork){return -1;}
    else if (x.YearOfWork > y.YearOfWork){return 1;}
}

//returns to the home page
function closeButton(){
    var cButton = document.querySelector('#closeButton');
    cButton.addEventListener( 'click',(e)=>{
        
      window.location.href = '../index.php';
    });
    
}