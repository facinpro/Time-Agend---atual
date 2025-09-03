const menuToggle = document.querySelector('.menu-toggle');
const menu = document.querySelector('.menu-principal');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('active'); // Alterna a classe 'active' no menu
});


