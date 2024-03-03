//Navbar Fixed
window.onscroll = function() {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;

    if (window.scrollY > fixedNav) {
        header.classList.add('navbar-fixed')
    } else {
        heade.classList.remove('navbar-fixed');
    }
}

// Bagian Hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector('#nav-menu');

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
});