<?php 
  include_once('../config/url.php');
  
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TimeAgend Barbearia</title>
<link rel="stylesheet" href="<?= BASE_URL?>public/assets/css/style.css">
</head>
<body>
    
    <header>
        <div class="logo">
            <img class="logo1" src="<?= BASE_URL?>img/Captura de tela 2024-10-01 160102.png" alt="Logo TimeAgend">
        </div>
        <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button> <!-- Botão para alternar o menu -->
        <nav class="menu-principal">
            <ul>
                <li><a href="#inicio" class="menu">INÍCIO</a></li>
                <li><a href="#serviços" class="menu">SERVIÇOS</a></li>
                <li><a href="#sobre" class="menu">SOBRE-NÓS</a></li>
                <li><a href="<?= BASE_URL?>/public/planos.php" class="menu">PLANOS</a></li>
                <li><a href="<?= BASE_URL?>/user/login.php" class="btn-portal">Acesso ao portal</a></li>
            </ul>
        </nav>
    </header>
    
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu-principal');
    
        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active'); // Alterna a classe 'active' no menu
        });
    </script>
    
  

<main>
<section id="inicio" class="hero">
<div class="welcome-text">
<h1 class="bem-vindo">BEM-VINDO</h1>
<h2 class="timeagend">A barbearia TimeAgend</h2>
<p class="cortes-p">Cortes, barbas e cuidados de alta <br>qualidade. Agende seu horário e <br> transforme seu visual com a gente!</p>
<button class="btn-agendar" onclick="window.location.href='<?= BASE_URL?>/public/agendamento.php' ">AGENDAR </button>
</div>


    <div class="slider">
    
    <div class="slide active">
    <img class="barber-1" src="<?= BASE_URL?>img/barbearia.png" alt="Interior da barbearia" > <!-- Imagem da barbearia -->
    <div class="slide-text1">CONHEÇA NOSSA BARBEARIA</div>
    </div>
    
    <div class="slide">
    <img class="barber-2" src="<?= BASE_URL?>img/image.png" alt="Corte de cabelo">
    <div class="slide-text2">CORTES DE CABELO</div>
    
    
    <button class="next-slide">Next Slide</button>
    </div>


</section>


<section id="serviços" class="serviços">
<h1 class="principais-serviços">Pricipais Serviços</h1>

<div class="grupo-1">
    <div>
        <img class="img-1" src="<?= BASE_URL?>img/image (1).png" alt="Terapia facial">
        <h3 class="h3">Terapia Facial</h3>
        <p>Combate os sinais do envelhecimento,<br> manchas na pele, acne e entre outros.</p>
    </div>

<div>
    <img class="img-2" src="<?= BASE_URL?>img/image (2).png" alt="">
    <h3 class="h3">Barba e Coloração</h3>
    <p>Restaura a cor original da sua <br> barba e elimina os fios brancos.</p>
</div>
<div>
    <img class="img-3" src="<?= BASE_URL?>img/image (3).png" alt="">
    <h3 class="h3">Selagem</h3>
    <p>Trata à base de queratina que sela <br> as cutículas dos fios danificados.</p>
</div>
</div>
</section>

<section id="sobre" class="sobre">

    <img class="img-sobre" src="<?= BASE_URL?>img/image (4).png" alt="">

    <div class="grupo-sobre">
        <div class="div-1">
            <h1 class="sobre-h1">Sobre-Nós</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br> sed do eiusmod tempor incididunt ut labore et dolore <br> magna aliqua. Ut enim ad minim veniam.</p>
        </div>

        <div class="div-2">
            <h3 class="redes">Redes Sociais</h3>
            <img class="redes-i" src="<?= BASE_URL?>img/image (6).png" alt="">
            <img class="redes-w" src="<?= BASE_URL?>img/image (5).png" alt="">
        </div>
        
    </div>
</section>
</main>
<footer>
    <div>
        <h3>Endereço:</h3>
        <p>123 Anywhere St., Any City, ST 12345</p>
    </div>

<div>
    <h3>Email de contato:</h3>
    <p>hello@reallygreatsite.com</p>
</div>
<div>
    <h3>Telefone:</h3>
    <p>(123) 456-7890</p>
</div>
</footer>
</body>
</html>