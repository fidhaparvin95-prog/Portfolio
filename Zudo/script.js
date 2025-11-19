// Navbar

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", () =>{
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n=>n.addEventListener("click", () => {
    hamburger.classList.remove("active");
}))


// Banner Slider
var firstindex=0;
function autoslider(){
    setTimeout(autoslider, 2000);
    var images;
    const img=document.querySelectorAll(".sliderimage");
    for(images=0;images<img.length;images++){
        img[images].style.display="none";
    }
    firstindex++;
    if(firstindex > img.length){
        firstindex=1;
    }
    img[firstindex - 1].style.display="block";
}
autoslider();

// Table - Size Chart

function display(){
    var p=document.getElementById("sizechart");
    if(p.style.display == "none"){
        p.style.display = "block";
    }
    else{
        p.style.display = "none";
    }

}






