// Toggle Class Active
const navbarNav = document.querySelector('.navbars-nav')

// Saat hamburger di klik
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active')
}

// Saat diklik diluar navbar, navnya ilang
const hamburger = document.querySelector('#hamburger-menu')
const popup = document.querySelector('#popup')

document.addEventListener('click', function(event) {
    if(!hamburger.contains(event.target) && !navbarNav.contains(event.target)) {
        navbarNav.classList.remove('active')
    }
})

document.addEventListener('click', function(event) {
    if(!popup.contains(event.target)) {
        popup.style.display = 'none';
    }
})