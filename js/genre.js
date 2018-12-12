window.addEventListener('load', ()=>{

var genreList;   
fetch("/Services/genres.php")
    .then(response => {return response.json();})
    .then(data => {
        genreList = data;
        popGenre(); 
        })
    .catch(E => console.log("Error: " + E));

//populates the genre section of the home page
function popGenre() {
    genreList.sort(compareName); //sorts the genre list alphabetically 
    var divPics = document.getElementById('genreList');
   
    genreList.forEach( a => { // Goes through the genre List
        var img = document.createElement('img');
        img.setAttribute('src', "../images/genres/" + a.GenreID + ".jpg"); 
        var anchor = document.createElement('a');
        anchor.setAttribute("href", "/SingleViewPages/genre_singleView.php?GenreID="+a.GenreID);//passes the GenreID ;
        img.setAttribute('width', 350);
        img.setAttribute('height', 350);
        var text = document.createTextNode(a.GenreName);
        divPics.appendChild(img);
        anchor.appendChild(text);
        divPics.appendChild(anchor);
    });
}

//sorts genre's according to genre name alphabetically 
function compareName(x,y){
    if(x.GenreName < y.GenreName){return -1;}
    else if (x.GenreName > y.GenreName){return 1;}
}  
});