<?php 
  include_once('../config/url.php');
  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeAgend - Barbearia Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            scroll-behavior: smooth;
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 50%, #1a1a1a 100%);
        }
        
        .text-accent {
            color: #D4AF37;
        }
        
        .bg-accent {
            background-color: #D4AF37;
        }
        
        .border-accent {
            border-color: #D4AF37;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #D4AF37 0%, #F4E4BC 50%, #D4AF37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.3s ease;
        }
        
        .glass-card:hover {
            background: rgba(212, 175, 55, 0.03);
            border-color: rgba(212, 175, 55, 0.2);
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #D4AF37 0%, #B8941F 100%);
            color: #000;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
        
        .btn-outline {
            border: 2px solid #D4AF37;
            color: #D4AF37;
            background: transparent;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #D4AF37;
            color: #000;
            transform: translateY(-1px);
        }
        
        .slide-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .slide-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .service-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.08);
            transition: all 0.3s ease;
        }
        
        .service-card:hover {
            background: rgba(212, 175, 55, 0.04);
            border-color: rgba(212, 175, 55, 0.15);
            transform: translateY(-3px);
        }
        
        .modern-navbar {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .hero-text {
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .subtle-glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.1);
        }
        
        .testimonial-card {
            background: rgba(212, 175, 55, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.08);
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            background: rgba(212, 175, 55, 0.04);
            border-color: rgba(212, 175, 55, 0.15);
        }
        
        .modern-input {
            background: rgba(212, 175, 55, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.1);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .modern-input:focus {
            background: rgba(212, 175, 55, 0.05);
            border-color: #D4AF37;
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        .brand-logo {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.01em;
            background: linear-gradient(135deg, #D4AF37 0%, #F4E4BC 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .subtle-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(212, 175, 55, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(212, 175, 55, 0.02) 0%, transparent 50%);
        }
        
        .elegant-shadow {
            box-shadow: 0 10px 40px -10px rgba(0, 0, 0, 0.3);
        }
        
        .stats-number {
            font-weight: 800;
            font-size: 2.5rem;
            background: linear-gradient(135deg, #D4AF37 0%, #F4E4BC 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-subtle {
            animation: floatSubtle 6s ease-in-out infinite;
        }
        
        @keyframes floatSubtle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 50%;
            background-color: #D4AF37;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .elegant-border {
            border: 1px solid rgba(212, 175, 55, 0.2);
        }
        
        .soft-glow {
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.08);
        }
    </style>
</head>
<body class="bg-black text-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 modern-navbar">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>

                    <div class="brand-logo">TimeAgend</div>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="nav-link font-medium hover:text-accent transition-colors">Início</a>
                    <a href="#services" class="nav-link font-medium hover:text-accent transition-colors">Serviços</a>
                    <a href="#gallery" class="nav-link font-medium hover:text-accent transition-colors">Galeria</a>
                    <a href="#about" class="nav-link font-medium hover:text-accent transition-colors">Sobre</a>
                    <a href="#contact" class="nav-link font-medium hover:text-accent transition-colors">Contato</a>
                </div>
                
                <a href="<?= BASE_URL?>/user/login.php" class="btn-primary px-6 py-2.5 rounded-lg inline-block text-center">
                  Agendar
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="gradient-bg min-h-screen flex items-center justify-center relative subtle-pattern">
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
            <div class="slide-in mb-8">
                <h1 class="hero-text text-5xl md:text-7xl lg:text-8xl mb-6">
                    <br><span class="block text-gradient">TimeAgend</span> 
                    <span class="block text-white text-3xl md:text-4xl lg:text-5xl font-normal mt-2">Barbearia Premium</span>
                </h1>
                <div class="w-20 h-1 bg-accent mx-auto mb-6 rounded-full"></div>
            </div>
            
            <p class="text-xl md:text-2xl mb-12 max-w-3xl mx-auto font-light leading-relaxed slide-in text-gray-300">
                Onde tradição e modernidade se encontram para criar a experiência perfeita em cuidados masculinos
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16 slide-in">
                <a onclick="window.location.href='<?= BASE_URL?>/public/agendamento.php' " class="btn-primary px-8 py-3 rounded-lg text-lg inline-block text-center">
                    Reservar Horário
                </a>
                <a href="#services" class="btn-outline px-8 py-3 rounded-lg text-lg text-center">
                  Nossos Serviços
                </a>
            </div>
            
            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto slide-in">
                <div class="glass-card p-6 rounded-xl text-center">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2 text-accent">Agendamento Online</h3>
                    <p class="text-gray-400 text-sm">Sistema inteligente disponível 24 horas</p>
                </div>
                
                <div class="glass-card p-6 rounded-xl text-center">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2 text-accent">Profissionais Qualificados</h3>
                    <p class="text-gray-400 text-sm">Barbeiros experientes e especializados</p>
                </div>
                
                <div class="glass-card p-6 rounded-xl text-center">
                    <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2 text-accent">Ambiente Premium</h3>
                    <p class="text-gray-400 text-sm">Conforto e sofisticação em cada detalhe</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section-padding bg-black">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 slide-in">
                <span class="text-accent font-medium text-sm uppercase tracking-wider">Nossos Serviços</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-gradient">
                    Experiências Únicas
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Cada serviço é pensado para oferecer o melhor em cuidados masculinos
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Corte Clássico</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Corte personalizado com técnicas tradicionais e acabamento impecável</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 60</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">45 min</div>
                    </div>
                </div>
                
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 14l5.5-5.5L10 10l7-7h3v3l-7 7 1.5 1.5L9 16H5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Design de Barba</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Modelagem profissional com produtos premium e técnicas especializadas</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 45</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">35 min</div>
                    </div>
                </div>
                
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Combo Completo</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Corte + barba + tratamentos especiais para uma experiência completa</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 95</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">80 min</div>
                    </div>
                </div>
                
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Tratamento Capilar</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Cuidados especiais para cabelo e couro cabeludo com produtos de qualidade</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 70</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">50 min</div>
                    </div>
                </div>
                
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h18v2H3V3zm0 4h18v2H3V7zm0 4h18v2H3v-2zm0 4h18v2H3v-2zm0 4h18v2H3v-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Pacote Noivo</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Preparação especial para o grande dia com atendimento personalizado</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 180</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">120 min</div>
                    </div>
                </div>
                
                <div class="service-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="w-14 h-14 bg-accent rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-accent">Relaxamento</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">Massagem relaxante e tratamentos para alívio do estresse do dia a dia</p>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-accent">R$ 55</div>
                        <div class="text-sm text-gray-500 bg-gray-800 px-3 py-1 rounded-full">40 min</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section-padding gradient-bg">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 slide-in">
                <span class="text-accent font-medium text-sm uppercase tracking-wider">Nossa Galeria</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-gradient">
                    Trabalhos Realizados
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Confira alguns dos nossos melhores trabalhos e transformações
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 14l5.5-5.5L10 10l7-7h3v3l-7 7 1.5 1.5L9 16H5z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h18v2H3V3zm0 4h18v2H3V7zm0 4h18v2H3v-2zm0 4h18v2H3v-2zm0 4h18v2H3v-2z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 16L3 14l5.5-5.5L10 10l7-7h3v3l-7 7 1.5 1.5L9 16H5z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="aspect-square glass-card rounded-xl overflow-hidden slide-in floating-subtle">
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-accent" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section-padding bg-black">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16 slide-in">
                <span class="text-accent font-medium text-sm uppercase tracking-wider">Depoimentos</span>
                <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-gradient">
                    O Que Dizem Nossos Clientes
                </h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="testimonial-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mr-4">
                            <span class="text-black font-semibold">MC</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-accent">Marcelo Costa</h4>
                            <p class="text-gray-500 text-sm">Empresário</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        "Excelente atendimento e profissionalismo. O agendamento online facilita muito e o resultado sempre supera as expectativas."
                    </p>
                    <div class="flex text-accent">
                        ★★★★★
                    </div>
                </div>
                
                <div class="testimonial-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mr-4">
                            <span class="text-black font-semibold">AS</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-accent">André Silva</h4>
                            <p class="text-gray-500 text-sm">Arquiteto</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        "Ambiente acolhedor e serviço de primeira qualidade. A TimeAgend se tornou minha barbearia de confiança."
                    </p>
                    <div class="flex text-accent">
                        ★★★★★
                    </div>
                </div>
                
                <div class="testimonial-card p-6 rounded-xl slide-in elegant-shadow">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center mr-4">
                            <span class="text-black font-semibold">RL</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-accent">Ricardo Lima</h4>
                            <p class="text-gray-500 text-sm">Advogado</p>
                        </div>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        "Profissionais altamente qualificados e um sistema de agendamento que realmente funciona. Recomendo!"
                    </p>
                    <div class="flex text-accent">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding gradient-bg">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="slide-in">
                    <span class="text-accent font-medium text-sm uppercase tracking-wider">Nossa História</span>
                    <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 text-gradient">
                        Tradição e Inovação
                    </h2>
                    
                    <div class="space-y-6 mb-8">
                        <p class="text-gray-400 text-lg leading-relaxed">
                            A <span class="font-semibold text-accent">TimeAgend</span> nasceu da paixão por oferecer serviços de barbearia de alta qualidade, combinando técnicas tradicionais com a praticidade da tecnologia moderna.
                        </p>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Nossa equipe é formada por profissionais experientes e apaixonados pelo que fazem, sempre em busca da excelência no atendimento e nos resultados.
                        </p>
                        <p class="text-gray-400 text-lg leading-relaxed">
                            Acreditamos que cada cliente merece uma experiência única e personalizada, por isso investimos constantemente em qualificação e equipamentos de última geração.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="stats-number mb-2">8+</div>
                            <div class="text-gray-500 text-sm">Anos de Experiência</div>
                        </div>
                        <div class="text-center">
                            <div class="stats-number mb-2">2K+</div>
                            <div class="text-gray-500 text-sm">Clientes Satisfeitos</div>
                        </div>
                        <div class="text-center">
                            <div class="stats-number mb-2">98%</div>
                            <div class="text-gray-500 text-sm">Satisfação</div>
                        </div>
                    </div>
                </div>
                
                <!-- Illustration -->
                <div class="relative slide-in">
                    <div class="glass-card rounded-xl p-8 elegant-shadow flex items-center justify-center h-80">
                        <img src="<?= BASE_URL ?>/img/uploads/image (1).png" alt="Barbearia TimeAgend"  />
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer class="section-padding bg-black">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-accent rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <div class="brand-logo">TimeAgend</div>
                    </div>
                    <p class="text-gray-500 mb-6 leading-relaxed">
                        A barbearia que combina tradição e modernidade para oferecer a melhor experiência em cuidados masculinos.
                    </p>
                    <div class="flex space-x-3">
                        <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center hover:bg-yellow-600 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center hover:bg-yellow-600 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </div>
                        <div class="w-10 h-10 bg-accent rounded-lg flex items-center justify-center hover:bg-yellow-600 transition-colors cursor-pointer">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.083.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-6 text-accent">Navegação</h3>
                    <ul class="space-y-3 text-gray-500">
                        <li><a href="#home" class="hover:text-accent transition-colors">Início</a></li>
                        <li><a href="#services" class="hover:text-accent transition-colors">Serviços</a></li>
                        <li><a href="#gallery" class="hover:text-accent transition-colors">Galeria</a></li>
                        <li><a href="#about" class="hover:text-accent transition-colors">Sobre</a></li>
                        <li><a href="#contact" class="hover:text-accent transition-colors">Contato</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-6 text-accent">Serviços</h3>
                    <ul class="space-y-3 text-gray-500">
                        <li>Corte Clássico</li>
                        <li>Design de Barba</li>
                        <li>Combo Completo</li>
                        <li>Tratamento Capilar</li>
                        <li>Pacote Noivo</li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg mb-6 text-accent">Contato</h3>
                    <ul class="space-y-3 text-gray-500">
                        <li>(11) 99999-8888</li>
                        <li>contato@timeagend.com</li>
                        <li>Rua das Palmeiras, 123<br>São Paulo, SP</li>
                        <li class="text-accent">Segunda - Domingo<br>8h às 20h</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
                <p>&copy; 2024 TimeAgend. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.slide-in').forEach(el => {
            observer.observe(el);
        });

        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';
            
            setTimeout(() => {
                // Create success notification
                const notification = document.createElement('div');
                notification.className = 'fixed top-6 right-6 glass-card border-accent px-6 py-4 rounded-lg elegant-shadow z-50 transform translate-x-full transition-all duration-300 max-w-sm';
                notification.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-accent">Mensagem Enviada!</div>
                            <div class="text-gray-400 text-sm">Entraremos em contato em breve.</div>
                        </div>
                    </div>
                `;
                document.body.appendChild(notification);
                
                setTimeout(() => notification.classList.remove('translate-x-full'), 100);
                
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => document.body.removeChild(notification), 300);
                }, 4000);
                
                // Reset form
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                submitBtn.style.opacity = '1';
            }, 1500);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(0, 0, 0, 0.95)';
                navbar.style.borderBottomColor = 'rgba(212, 175, 55, 0.2)';
            } else {
                navbar.style.background = 'rgba(0, 0, 0, 0.9)';
                navbar.style.borderBottomColor = 'rgba(212, 175, 55, 0.1)';
            }
        });

        // Initialize animations
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.querySelectorAll('.slide-in').forEach((el, index) => {
                    setTimeout(() => {
                        el.classList.add('visible');
                    }, index * 100);
                });
            }, 200);
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9792202fd6e5f202',t:'MTc1Njg2OTc3OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
