const navSlide =() => {

   const sidemenu= document.querySelector('.sidemenu');
   const nav = document.querySelector('.pages');
   const otherpages = document.querySelectorAll('.pages li');

   sidemenu.addEventListener('click',()=>{
     nav.classList.toggle('nav-active');

     otherpages.forEach((link, index) => {
       if (link.style.animation){
         link.style.animation = '';
       } else {
         link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`
       }
     });
       //sidemenu animation
       sidemenu.classList.toggle('toggle');

   });
}

navSlide();
