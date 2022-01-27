var icon=document.querySelector(".img-mynav");
var lines=document.querySelector(".lines");
var menu=document.querySelector(".menu");
icon.style.display="none";
menu.style.display="none";
lines.addEventListener("click",function(){
    icon.style.display="block";
    menu.style.display="block";
    lines.style.display="none";
})
icon.addEventListener("click",function(){
    lines.style.display="block";
    icon.style.display="none";
    menu.style.display="none";
})

var app = document.getElementById('app');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('Welcome to My <span class="color-project">S</span>uper<span class="color-project">M</span>arket')
    .pauseFor(2500)
    .deleteAll()
    .typeString('All  you need in your hand ')
    .pauseFor(2500)
    .deleteAll()
    .typeString('built by <strong>Ahmed Ebrahim </strong> ')
    .pauseFor(2500)

    .start();


    