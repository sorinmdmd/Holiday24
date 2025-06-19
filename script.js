//Funktion zum schließen der Navleiste
const navbar = document.getElementById('navbar');

const openSidebar = () => {
    navbar.classList.add('show');
}

const closeSidebar = () => {
    navbar.classList.remove('show');
}
//Schöner 3D Effekt beim runterscrollen, der landingpage
window.onscroll = () => {
    document.querySelector(".layer2").style.marginTop = scrollY * .8+ "px";
    document.querySelector(".layer3").style.marginTop = scrollY  + "px";
    document.querySelector(".layer3").style.marginTop = scrollY  + "px";
    document.querySelector(".home h1").style.opacity = (100 - scrollY);
}