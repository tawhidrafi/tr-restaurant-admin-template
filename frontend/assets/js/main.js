//SECTION
const navSwitch = document.querySelector('#nav__switch'),
    nav = document.querySelector('#nav__menu');
    
navSwitch.addEventListener('click', ()=>{
    nav.classList.toggle('nav__menu-show');
});