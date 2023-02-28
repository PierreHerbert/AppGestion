icon_menu = document.getElementById('icon_menu');
menu = document.getElementById('menu');

icon_menu.addEventListener('click', event => {
    menu.classList.toggle('visible');
});