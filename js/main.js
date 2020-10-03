// Variables

// let nav = document.getElementById('nav');
// let menu = document.getElementById('enlaces');
// let abrir = document.getElementById('open');
// let botones = document.getElementsByClassName('btn-header');
let cerrado = true;

// function menus(){
//     let Desplazamiento_Actual = window.pageYOffset;

//     if(Desplazamiento_Actual <= 170){
//         nav.classList.remove('nav2');
//         nav.className = ('nav1');
//         nav.style.transition = '1s';
//         menu.style.top = '80px';
//         abrir.style.color = '#fff';
//     }else{
//         nav.classList.remove('nav1');
//         nav.className = ('nav2');
//         nav.style.transition = '1s';
//         menu.style.top = '100px';
//         abrir.style.color = '#000';
//     }
// }

// function apertura(){
//     if(cerrado){
//         menu.style.width = '70vw';
//         cerrado = false;
//     }else{
//         menu.style.width = '0%';
//         menu.style.overflow = 'hidden';
//         cerrado = true;
//     }
// }

// window.addEventListener('load', function(){
//     $('#onload').fadeOut();
//     $('body').removeClass('hidden');
//     menus();
// });
window.addEventListener('click',function(e){
    // console.log(e.target);
    if(cerrado==false){
        let span = document.querySelector('span');
        if(e.target !== span && e.target !== abrir){
            menu.style.width = '0%';
            menu.style.overflow = 'hidden';
            cerrado = true;
        }
    }
});
// window.addEventListener('scroll', function(){
//     // console.log(window.pageYOffset);
//     menus();
// });
// window.addEventListener('resize', function(){
//     if(screen.width>= 700){
//         cerrado = true;
//         menu.style.removeProperty('overflow');
//         menu.style.removeProperty('width');
//     }
// });
// abrir.addEventListener('click', function(){
//     apertura();
// });
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  // var i;
  // var x = document.getElementsByClassName("mySlides");
  // var dots = document.getElementsByClassName("demo");
  // if (n > x.length) {slideIndex = 1}
  // if (n < 1) {slideIndex = x.length}
  // for (i = 0; i < x.length; i++) {
  //   x[i].style.display = "none";  
  // }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" w3-white", "");
  // }
  // x[slideIndex-1].style.display = "block";  
  // dots[slideIndex-1].className += " w3-white";
}
// sidebar toggle
// const btnToggle = document.querySelector('#toggle-btn');

// btnToggle.addEventListener('click', function () {
//   console.log('click')
//   document.getElementById('sidebar').classList.toggle('active');
//   console.log(document.getElementById('sidebar'))
// });
var myIndex = 0;
carousel();

function carousel() {
  // var i;
  // var x = document.getElementsByClassName("mySlides");
  // for (i = 0; i < x.length; i++) {
  //   x[i].style.display = "none";  
  // }
  
  // myIndex++;
  // if (myIndex > x.length) {myIndex = 1}    
  // x[myIndex-1].style.display = "block";  
  // setTimeout(carousel, 2000); // Change image every 2 seconds
}