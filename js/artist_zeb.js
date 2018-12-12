window.addEventListener('load', ()=>{

var artistList;   
    fetch("/Services/artist.php")
    .then(response => {return response.json();})
    .then(data => {
        artistList = data; //populates the variable with the data
        popArtist();
    })
    .catch(E => console.log("Error: " + E));

//populates the artist section of the home page
function popArtist() {
    artistList.sort(compareArtist); //sorts artist name by last name 
    var aNames = document.querySelector('#artistsList');
    
    // Goes through the Artists List
    artistList.forEach( a => {
        //create two different div, the first for img and the second for li
        var div1 = document.createElement('div');
        div1.setAttribute('id', 'firstDiv');
        var div2 = document.createElement('div');
        div2.setAttribute('id', 'secondDiv');
        
        //Create anchor tag <a> with a link associated to single Painting View. 
        var anchor = document.createElement('a');
        anchor.setAttribute("href", "/SingleViewPages/artist_singleView.php?ArtistID="+a.ArtistID);//passes the ArtistID 
        
        //creates the img
        var imgSrc = a.ArtistID; 
        var pPic = document.createElement('img');
        pPic.setAttribute('src' , "../images/artists/square/"+ imgSrc + ".jpg"); 
        pPic.setAttribute('width', 350);
        pPic.setAttribute('height', 350);
        
        //append img into div1
        div1.appendChild(pPic);
        aNames.appendChild(div1); //append div1 into ul
        
        //Creates the li 
        //var li = document.createElement("li");
        //li.appendChild(document.createTextNode(a.FirstName+ " " + a.LastName));//
        var text = document.createTextNode(a.FirstName+ " " + a.LastName );
        var li = document.createElement("li");
        
        //Adds the li to Anchor tag 
        li.appendChild(text);
        anchor.appendChild(li); 
        div2.appendChild(anchor);
        //Adds anchor to the ul
        aNames.appendChild(div2);
  
    });
}

//sort the artist section by last name
function compareArtist(x,y){
    if(x.LastName < y.LastName){return -1;}
    else if (x.LastName > y.LastName){return 1;}
    }  
});