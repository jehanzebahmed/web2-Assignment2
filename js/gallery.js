window.addEventListener('load', function(){
    
const url = "/Services/gallery.php";
fetch(url)
.then(function (response){
     return response.json();
})
.then( function (data){
   sortG = sortGallery(data); //sorts gallery  by gallery name
   
   for(let d of sortG){
        var ul = document.getElementById('galleries');
        var a = document.createElement('a');
        a.setAttribute('href', '/SingleViewPages/gallery_singleView.php?GalleryID=' + d.GalleryID);
        var text = document.createTextNode(d.GalleryName);
        var li = document.createElement('li');
        li.appendChild(text);
        a.appendChild(li);
        ul.appendChild(a);
   }
})

//sorts gallerys section of home page by gallery name alphabetically 
function sortGallery(data){
    const sortedData = data.sort(function(a,b){ 
        if(a.GalleryName < b.GalleryName){ return -1;}
        else if (a.GalleryName > b.GalleryName){return 1;}
    });
    return sortedData;
}
});