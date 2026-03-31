<!DOCTYPE html>
<html lang="es" class="scroll-smooth scroll-pt-20 md:scroll-pt-20 border-none">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Balam Armería | Elite Tactical Gear</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">
    
    <!-- ==========================================
         RECURSOS CORE DEL SISTEMA (VITE)
         ========================================== -->
    <!-- Vite empaqueta TODO y lo hace local: Tailwind CSS v4, animaciones GSAP, íconos Boxicons, fuentes de Google (Space Grotesk e Inter) y Swiper.js. Nada dependerá de servidores externos. -->
    @vite(['resources/css/app.css', 'resources/js/main.js'])

    <style>
        /* Forzar esquema oscuro para controles del sistema (como dropdowns de select) */
        :root, html, body {
            color-scheme: dark !important;
            background-color: #0c0c0c;
        }

        /* Estilo ultra-agresivo para evitar destellos blancos en selects nativos */
        select {
            appearance: none;
            background-color: #050505 !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            cursor: pointer;
            outline: none !important;
            box-shadow: none !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            padding-right: 2.5rem !important;
        }

        /* Forzar que el popup de opciones herede el fondo oscuro en Chrome/Edge */
        select option {
            background-color: #111111 !important;
            color: #ffffff !important;
            border: none;
            padding: 12px !important;
        }

        /* Evitar el resaltado azul/blanco de Windows/Chrome al hacer clic */
        select:focus, select:active {
            background-color: #050505 !important;
            color: #ffffff !important;
            outline: none !important;
            box-shadow: 0 0 0 2px rgba(0, 240, 255, 0.2) !important;
        }

        /* Corregir hover en el select */
        select:hover {
            border-color: rgba(0, 240, 255, 0.4) !important;
            background-color: #0a0a0a !important;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-200 selection:bg-accent-primary selection:text-black">

    <!-- ==========================================
         INTRO ANIMATION (SPLASH SCREEN)
         ========================================== -->
    <div id="intro-screen" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center overflow-hidden bg-tactical-900 pointer-events-auto">
        <!-- Cortinas (Efecto 4D / Profundidad con box-shadows masivos y texturas) -->
        <div class="intro-curtain left-curtain absolute top-0 left-0 w-[51%] h-full bg-tactical-900 z-10 border-r border-white/5 shadow-[20px_0_50px_rgba(0,0,0,0.9)] origin-left flex items-center justify-end overflow-hidden">
             <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-30 pointer-events-none"></div>
             <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-black/80 to-transparent"></div>
        </div>
        <div class="intro-curtain right-curtain absolute top-0 right-0 w-[51%] h-full bg-tactical-900 z-10 border-l border-white/5 shadow-[-20px_0_50px_rgba(0,0,0,0.9)] origin-right flex items-center justify-start overflow-hidden">
             <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-30 pointer-events-none"></div>
             <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-black/80 to-transparent"></div>
        </div>
        
        <!-- Partículas y ambiente detrás del logo pero delante de las cortinas -->
        <div class="intro-ambient absolute inset-0 z-[15] bg-[radial-gradient(circle_at_center,rgba(230,126,34,0.15)_0%,transparent_60%)] opacity-0 pointer-events-none"></div>
        
        <!-- Contenedor del contenido central -->
        <div class="intro-content relative z-[20] flex flex-col items-center justify-center transform perspective-[1000px] w-full px-4">
            <!-- 1. Logo -->
            <div class="intro-logo-container opacity-0 transform translate-y-10 scale-90 md:w-56 md:h-56 w-40 h-40 rounded-full border-4 border-[#e67e22] bg-white p-1 mb-10 shadow-[0_0_60px_rgba(230,126,34,0.5)] relative overflow-hidden pointer-events-none">
                <img src="{{ asset('images/logo.jpg') }}" alt="Balam Logo" class="w-full h-full object-cover mix-blend-multiply scale-[1.12]">
            </div>
            
            <!-- 2. Armeria Balam -->
            <h1 class="intro-title opacity-0 transform translate-y-10 text-4xl md:text-6xl lg:text-7xl font-display font-black text-white uppercase tracking-widest drop-shadow-[0_0_25px_rgba(255,255,255,0.4)] mb-4 text-center leading-tight">
                Armería <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f39c12] to-[#e67e22] drop-shadow-[0_0_15px_rgba(230,126,34,0.5)]">Balam</span>
            </h1>
            
            <!-- 3. Armas y Municiones -->
            <h2 class="intro-subtitle opacity-0 transform translate-y-5 text-gray-400 font-mono tracking-[0.4em] md:tracking-[0.6em] text-[10px] md:text-xl uppercase flex items-center justify-center gap-2 md:gap-4 drop-shadow-xl text-center w-full mt-2">
                <span class="w-6 md:w-16 h-[1px] bg-[#e67e22]/50"></span>
                Armas Y Municiones
                <span class="w-6 md:w-16 h-[1px] bg-[#e67e22]/50"></span>
            </h2>
        </div>
    </div>

    <div data-scroll-container id="scroll-wrapper" style="opacity: 0; visibility: hidden;">
        
        <!-- Navbar -->
        <nav class="fixed w-full z-50 transition-all duration-300 backdrop-blur-md bg-tactical-900/60 border-b border-white/5 top-0" id="navbar">
            <div class="max-w-[95%] mx-auto px-6 py-4 flex justify-between items-center">
                <a href="#" class="flex items-center gap-2 group h-14 md:h-16 relative">
                    <div class="h-10 w-10 md:h-12 md:w-12 rounded-full bg-white cyber-logo-container border-2 border-[#e67e22]/30 shadow-[0_0_15px_rgba(230,126,34,0.3)] group-hover:shadow-[0_0_25px_rgba(230,126,34,0.5)] transition-all duration-500 flex items-center justify-center shrink-0">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Balam Logo" class="w-full h-full object-cover mix-blend-multiply scale-[1.15] group-hover:scale-[1.25] transition-transform duration-500">
                    </div>
                    <div class="flex flex-col ml-1">
                        <span class="font-display font-black text-lg md:text-xl tracking-tighter text-white uppercase leading-none group-hover:text-[#e67e22] transition-colors">
                            BALAM
                        </span>
                        <span class="text-[7px] md:text-[8px] text-[#e67e22] font-mono tracking-[0.25em] uppercase flex items-center whitespace-nowrap leading-none mt-1 group-hover:translate-x-1 transition-transform">
                            Armas & Municiones
                        </span>
                    </div>
                </a>
                
                <div class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-300">
                    <a href="#inicio" onclick="scrollToSection('#inicio', event)" class="hover:text-accent-primary transition-colors hover-glow">Inicio</a>
                    <a href="#catalogo" onclick="resetCatalog(); scrollToSection('#catalogo', event)" class="hover:text-accent-primary transition-colors hover-glow">Catálogo</a>
                    <a href="#empresa" onclick="scrollToSection('#empresa', event)" class="hover:text-accent-primary transition-colors hover-glow">Nosotros (Quiénes Somos)</a>
                    <a href="#contacto" onclick="scrollToSection('#contacto', event)" class="hover:text-accent-primary transition-colors hover-glow">Ubicaciones</a>
                    <a href="#contacto-cards" onclick="scrollToSection('#contacto-cards', event)" class="hover:text-accent-primary transition-colors hover-glow">Contacto</a>
                </div>

                <a href="#contacto" onclick="scrollToSection('#contacto', event)" class="hidden md:flex bg-white/5 hover:bg-white/10 px-5 py-2.5 rounded border border-white/10 text-white font-medium transition-colors items-center gap-2">
                    <i class='bx bx-user-circle text-xl'></i> Mi Arsenal
                </a>
            </div>
        </nav>

        <!-- Cabecera / Hero Central con Carrusel Integrado -->
        <section id="inicio" class="relative w-full min-h-screen bg-tactical-900 flex items-center overflow-hidden pt-24 pb-12">
            <!-- Capa negra atrás para evitar overlaps de texto extraños -->
            <div class="absolute inset-0 bg-tactical-900 z-0"></div>
            <!-- Capas de Fondo Inmersivas -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,240,255,0.03)_0%,rgba(0,0,0,0)_60%)] pointer-events-none"></div>
            <div class="absolute inset-0 bg-noise opacity-10 mix-blend-overlay"></div>

            <div class="max-w-[95%] mx-auto w-full relative z-10 flex flex-col xl:flex-row items-center justify-between gap-10">
                
                <!-- Textos Principales Lado Izquierdo -->
                <div class="w-full xl:w-5/12 flex flex-col justify-center gsap-reveal gs-slide-right px-4 lg:px-10 z-20">
                    
                    <!-- LOGO HERO BLOCK -->
                    <div class="flex flex-col md:flex-row items-center gap-8 md:gap-10 mb-10 relative group">
                        <!-- Glow de fondo para el logo -->
                        <div class="absolute -inset-10 bg-[#e67e22]/10 blur-[100px] opacity-40 pointer-events-none"></div>
                        
                        <!-- Logo Icono con Animada de Flotación -->
                        <div class="relative z-10 w-36 h-36 md:w-52 md:h-52 rounded-full bg-white border-4 border-[#e67e22] p-1 cyber-logo-container shadow-[0_0_40px_rgba(0,0,0,0.6)] group-hover:shadow-[0_0_70px_rgba(230,126,34,0.4)] transition-all duration-700 shrink-0 [animation:floating_6s_infinite_ease-in-out]">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Balam Logo" class="w-full h-full object-cover mix-blend-multiply scale-[1.12] group-hover:scale-[1.25] transition-transform duration-700">
                        </div>

                        <!-- Texto Tipográfico BALAM -->
                        <div class="flex flex-col items-center md:items-start relative z-10 mt-2 md:mt-0">
                            <h2 class="font-display text-6xl md:text-[7.5rem] flex items-center font-black text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-400 tracking-tighter uppercase leading-none drop-shadow-[0_10px_25px_rgba(0,0,0,0.5)] mb-2 hero-title-scanned">
                                BALAM
                                <span class="reveal-overlay">BALAM</span>
                            </h2>
                            <div class="flex items-center gap-3 whitespace-nowrap translate-y-[-10px] md:translate-y-[-20px] group-hover:translate-x-2 transition-transform duration-500 hero-title-scanned">
                                <span class="text-[#f39c12] font-bold tracking-[0.2em] md:tracking-[0.4em] text-xs md:text-2xl uppercase drop-shadow-[0_0_15px_rgba(230,126,34,0.5)]">Armas y Municiones</span>
                                <span class="reveal-overlay text-[#f39c12] font-bold tracking-[0.2em] md:tracking-[0.4em] text-xs md:text-2xl uppercase">Armas y Municiones</span>
                                <svg viewBox="0 0 100 24" class="h-4 md:h-6 w-auto text-[#f39c12] fill-current drop-shadow-[0_0_10px_rgba(230,126,34,0.4)]">
                                    <path d="M5,4h60l10,2v12l-10,2h-60V4z"/>
                                    <path d="M78,6c15,0,22,4,22,6c0,2-7,6-22,6h-10V6H78z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <span class="px-3 py-1 bg-white/5 text-gray-300 border border-white/20 rounded text-[10px] md:text-xs font-bold tracking-[0.3em] uppercase mb-6 inline-block w-max">Innovación en Seguridad y Deporte</span>
                    <h1 class="font-display text-3xl md:text-5xl font-black mb-6 text-white leading-[1] uppercase tracking-tighter">
                        Pasión por la <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-100 to-cyan-400 drop-shadow-[0_0_15px_rgba(0,240,255,0.2)]">Precisión.</span> 
                    </h1>
                    <p class="text-gray-400 text-lg mb-10 font-light max-w-xl leading-relaxed">
                        Explora una selección curada para el tirador moderno, desde atletas deportivos hasta entusiastas de la seguridad personal. Calidad sin compromisos para cada disciplina.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#catalogo" class="btn-crystal">
                            Explorar Catálogo <i class='bx bx-right-arrow-alt text-2xl'></i>
                        </a>
                    </div>
                </div>

                <!-- Carrusel de Armas (Fragmentos) Lado Derecho -->
                <div class="w-full xl:w-7/12 relative min-h-[550px] md:min-h-[700px] flex items-center justify-center">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[120px] pointer-events-none"></div>

                    <div class="swiper assembly-slider w-full h-full relative z-10 overflow-hidden">
                        <div class="swiper-wrapper">
                            
                            <!-- Slide 1: Sniper -->
                            <div class="swiper-slide flex flex-col md:flex-row items-center justify-center w-full px-4">
                                <!-- Área Visual (Izquierda/Arriba dentro del slide) -->
                                <div class="w-full h-[350px] md:h-[500px] relative assembly-wrapper perspective-[1200px] transition-transform duration-700">
                                    <div class="frag frag-1 absolute inset-0 z-30 opacity-0" style="clip-path: polygon(0 0, 38% 0, 38% 100%, 0 100%);">
                                        <img src="{{ asset('images/sniper.png') }}" class="w-full h-full object-contain filter drop-shadow-[15px_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <div class="frag frag-2 absolute inset-0 z-20 opacity-0" style="clip-path: polygon(38% 0, 70% 0, 70% 100%, 38% 100%);">
                                        <img src="{{ asset('images/sniper.png') }}" class="w-full h-full object-contain filter drop-shadow-[0_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <div class="frag frag-3 absolute inset-0 z-10 opacity-0" style="clip-path: polygon(70% 0, 100% 0, 100% 100%, 70% 100%);">
                                        <img src="{{ asset('images/sniper.png') }}" class="w-full h-full object-contain filter drop-shadow-[-15px_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <div class="assemble-grid absolute inset-0 border border-cyan-500/20 rounded-xl bg-[linear-gradient(rgba(0,240,255,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(0,240,255,0.05)_1px,transparent_1px)] bg-[size:40px_40px] opacity-0 pointer-events-none"></div>
                                </div>

                                <!-- Textos HUD -->
                                <div class="w-full mt-[-60px] md:mt-0 md:absolute md:bottom-10 md:right-4 lg:right-12 md:max-w-xs flex flex-col justify-end z-40 pointer-events-none px-2 lg:px-0">
                                    <h2 class="assembly-title font-display text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight opacity-0 text-right drop-shadow-xl break-words">Precisión<br><span class="text-transparent bg-clip-text bg-gradient-to-l from-cyan-400 to-blue-600 drop-shadow-[0_0_10px_rgba(0,240,255,0.5)]">Táctica</span></h2>
                                    
                                    <div class="assembly-card glass-card p-6 rounded-2xl border border-cyan-500/30 relative overflow-hidden group opacity-0 shadow-[0_20px_50px_rgba(0,0,0,0.8)] bg-tactical-800/90 backdrop-blur-xl pointer-events-auto w-full">
                                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent"></div>
                                        <h4 class="font-mono text-white mb-4 text-[10px] md:text-xs tracking-widest border-l-2 border-cyan-500 pl-3 relative z-10 w-full overflow-hidden text-ellipsis whitespace-nowrap">MÓDULO SENSOR</h4>
                                        <ul class="space-y-4 text-gray-400 font-mono text-[10px] md:text-[11px] relative z-10 w-full">
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">CHASIS</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">AERONÁUTICA</span></li>
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">ALCANCE</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">1,500 METROS</span></li>
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">VEL. BOCA</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">850 M/S</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Slide 2: AR15 -->
                            <div class="swiper-slide flex flex-col md:flex-row items-center justify-center w-full px-4">
                                <div class="w-full h-[350px] md:h-[500px] relative assembly-wrapper perspective-[1200px] transition-transform duration-700">
                                    <div class="frag frag-1 absolute inset-0 z-30 opacity-0" style="clip-path: polygon(0 0, 38% 0, 38% 100%, 0 100%);">
                                        <img src="{{ asset('images/ar15.png') }}" class="w-full h-full object-contain filter drop-shadow-[15px_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <div class="frag frag-2 absolute inset-0 z-20 opacity-0" style="clip-path: polygon(38% 0, 70% 0, 70% 100%, 38% 100%);">
                                        <img src="{{ asset('images/ar15.png') }}" class="w-full h-full object-contain filter drop-shadow-[0_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <div class="frag frag-3 absolute inset-0 z-10 opacity-0" style="clip-path: polygon(70% 0, 100% 0, 100% 100%, 70% 100%);">
                                        <img src="{{ asset('images/ar15.png') }}" class="w-full h-full object-contain filter drop-shadow-[-15px_15px_20px_rgba(0,0,0,0.9)]">
                                    </div>
                                    <!-- Use a slightly different color (green) mapping for AR15 grid -->
                                    <div class="assemble-grid absolute inset-0 border border-[#00ff66]/20 rounded-xl bg-[linear-gradient(rgba(0,255,102,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(0,255,102,0.05)_1px,transparent_1px)] bg-[size:40px_40px] opacity-0 pointer-events-none"></div>
                                </div>

                                <div class="w-full mt-[-60px] md:mt-0 md:absolute md:bottom-10 md:right-4 lg:right-12 md:max-w-xs flex flex-col justify-end z-40 pointer-events-none px-2 lg:px-0">
                                    <h2 class="assembly-title font-display text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight opacity-0 text-right drop-shadow-xl break-words">Plataforma<br><span class="text-transparent bg-clip-text bg-gradient-to-l from-[#00ff66] to-[#008833] drop-shadow-[0_0_10px_rgba(0,255,102,0.5)]">Modular</span></h2>
                                    
                                    <div class="assembly-card glass-card p-6 rounded-2xl border border-[#00ff66]/30 relative overflow-hidden group opacity-0 shadow-[0_20px_50px_rgba(0,0,0,0.8)] bg-tactical-800/90 backdrop-blur-xl pointer-events-auto w-full">
                                        <div class="absolute inset-0 bg-gradient-to-br from-[#00ff66]/10 to-transparent"></div>
                                        <h4 class="font-mono text-white mb-4 text-[10px] md:text-xs tracking-widest border-l-2 border-[#00ff66] pl-3 relative z-10 w-full overflow-hidden text-ellipsis whitespace-nowrap">MÓDULO SENSOR</h4>
                                        <ul class="space-y-4 text-gray-400 font-mono text-[10px] md:text-[11px] relative z-10 w-full">
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">SISTEMA</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">GAS DIRECTO</span></li>
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">CALIBRE</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">5.56x45mm</span></li>
                                            <li class="flex justify-between border-b border-white/5 pb-1 w-full"><span class="text-white shrink-0">FIRE RATE</span> <span class="text-white font-bold tracking-wider text-right pl-2 truncate">800 RPM</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <!-- Navegacion custom swiper -->
                        <div class="swiper-button-prev !text-white opacity-40 hover:opacity-100 !left-0 md:!-left-8 scale-75 transition-opacity drop-shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
                        <div class="swiper-button-next !text-white opacity-40 hover:opacity-100 !right-0 md:!-right-8 scale-75 transition-opacity drop-shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
                    </div>
                </div>
            </div>

            <!-- Mouse Scroll Indicator Descend -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 opacity-50">
                <span class="text-[10px] font-mono tracking-widest uppercase">Escanear Abajo</span>
                <div class="w-[1px] h-8 bg-gradient-to-b from-white to-transparent"></div>
            </div>
        </section>

        <!-- Sección de Filtro y Catálogo con JS Dinámico -->
        <section id="catalogo" class="pt-4 md:pt-6 pb-24 relative">
            <!-- Lineas diagonales de decoracion -->
            <div class="absolute inset-0 w-full h-full bg-[linear-gradient(45deg,transparent_25%,rgba(255,255,255,0.01)_25%,rgba(255,255,255,0.01)_50%,transparent_50%,transparent_75%,rgba(255,255,255,0.01)_75%,rgba(255,255,255,0.01)_100%)] bg-[length:20px_20px] pointer-events-none"></div>

            <div class="max-w-[95%] mx-auto px-4 z-10 relative">
                
                <div class="flex flex-col md:flex-row justify-between items-end mb-16 gsap-reveal gs-fade-up">
                    <div>
                        <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-2 uppercase tracking-tighter">Explora Todo <span class="text-accent-cyan text-gradient-cyan border-b-2 border-accent-cyan/30">Nuestro Arsenal</span></h2>
                        <p class="text-gray-400 font-light font-mono text-[10px] md:text-xs tracking-[0.3em] uppercase mt-2">
                            Descubre todo el equipo disponible de nuestras sucursales a nivel nacional.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-start relative">
                    <!-- Sidebar de Filtros (Izquierda) -->
                    <aside class="w-full lg:w-1/4 xl:w-1/5 shrink-0 sticky top-[96px] z-20 pb-10">
                        <div class="mb-10 px-4 pt-6">
                            <h3 class="font-display text-4xl font-black text-white uppercase tracking-tighter mb-8 border-b-4 border-accent-cyan pb-2 w-max">
                                Catálogo
                            </h3>
                            
                            <ul class="flex flex-col border-t border-white/5" id="nav-accordion">
                                <li>
                                    <a href="#catalogo" onclick="showAllProducts()" class="flex items-center justify-between py-5 border-b border-white/5 group transition-all">
                                        <span class="font-display text-xl font-bold text-white group-hover:text-accent-cyan tracking-widest uppercase">TODOS NUESTROS PRODUCTOS</span>
                                    </a>
                                </li>
                                @if(isset($menuCategorias))
                                    @foreach($menuCategorias as $cat)
                                    <li class="border-b border-white/5">
                                        <div class="flex items-center justify-between py-5 cursor-pointer group transition-all" onclick="toggleAccordion('cat-{{ $cat['slug'] }}')">
                                            <span class="font-display text-xl font-bold text-white group-hover:text-accent-cyan tracking-widest uppercase">{{ $cat['nombre'] }}</span>
                                            <i class='bx bx-plus text-2xl text-gray-500 group-hover:text-accent-cyan transition-transform' id="icon-cat-{{ $cat['slug'] }}"></i>
                                        </div>
                                        <ul id="cat-{{ $cat['slug'] }}" class="hidden flex flex-col pl-4 pb-4 animate-fade-down">
                                            <li>
                                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $cat['slug'] }}', 'cat')" class="block py-2 text-sm text-gray-400 hover:text-white transition-colors uppercase font-mono tracking-widest">
                                                    Ver Todo de {{ $cat['nombre'] }}
                                                </a>
                                            </li>
                                            @foreach($cat['subcategorias'] as $sub)
                                            <li>
                                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $sub['slug'] }}', 'subcat')" class="block py-2 text-sm text-gray-500 hover:text-white transition-colors uppercase font-mono tracking-widest">
                                                    {{ $sub['nombre'] }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </aside>

                    <!-- Grilla de Productos (Derecha) -->
                    <main class="flex-1 w-full">
                        <!-- Barra de Herramientas Superior / Top Bar Filtros -->
                        <!-- Barra de Herramientas Superior / Top Bar Filtros (Fija al Scroll) -->
                        <div class="sticky top-[96px] z-40 bg-tactical-900/95 backdrop-blur-2xl -mx-6 px-6 py-6 mb-8 border-b border-white/10 transition-all duration-300 flex flex-col gap-6 shadow-2xl" id="catalogo-top-bar">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <h2 id="current-filter-title" class="font-display text-4xl font-black text-white uppercase tracking-tighter">
                                    ARSENAL DISPONIBLE
                                </h2>

                                <!-- Buscador Inteligente Centrado/Derecha -->
                                <div class="relative group w-full md:max-w-md">
                                    <input type="text" id="filter-search" oninput="applyFilters()" placeholder="BUSCA TU EQUIPO TÁCTICO AQUÍ..." class="w-full bg-white/5 border border-white/10 rounded-full py-4 pl-12 pr-6 text-white text-xs font-bold tracking-widest focus:outline-none focus:border-accent-cyan/50 focus:ring-1 focus:ring-accent-cyan/20 transition-all placeholder:text-gray-600">
                                    <i class='bx bx-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-xl group-focus-within:text-accent-cyan transition-colors'></i>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-6 items-end">
                                <!-- Filtrar por Marca -->
                                <div class="flex flex-col gap-2 min-w-[160px]">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Filtrar por Marca</span>
                                    <select id="top-filter-brand" onchange="applyFilters()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-3 px-4 text-white text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5">
                                        <option value="all">TODAS LAS MARCAS</option>
                                        @if(isset($marcas))
                                            @foreach($marcas as $marca)
                                                <option value="{{ $marca['slug'] }}">{{ $marca['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <!-- Filtrar por Sucursal -->
                                <div class="flex flex-col gap-2 min-w-[160px]">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Por Sucursal</span>
                                    <select id="top-filter-branch" onchange="applyFilters()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-3 px-4 text-white text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5">
                                        <option value="all">TODAS LAS SEDES</option>
                                        @if(isset($sucursales))
                                            @foreach($sucursales as $suc)
                                                <option value="{{ $suc['slug'] }}">{{ $suc['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <!-- Mostrar X (Desplazado a la derecha) -->
                                <div class="flex flex-col gap-2 min-w-[120px] md:ml-auto">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Mostrar X</span>
                                    <select id="top-items-per-page" onchange="changeItemsPerPage(this.value)" class="bg-tactical-950/80 border border-white/10 rounded-xl py-3 px-4 text-white text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5">
                                        <option value="10">10 PRODUCTOS</option>
                                        <option value="20">20 PRODUCTOS</option>
                                        <option value="25" selected>25 PRODUCTOS</option>
                                        <option value="30">30 PRODUCTOS</option>
                                    </select>
                                </div>

                                <!-- Ordenar Por -->
                                <div class="flex flex-col gap-2 min-w-[140px]">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Ordenar Por</span>
                                    <select id="top-sort-order" onchange="applySorting()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-3 px-4 text-white text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5">
                                        <option value="default">RELEVANCIA</option>
                                        <option value="az">ALFABÉTICO A - Z</option>
                                        <option value="za">ALFABÉTICO Z - A</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 border-t border-l border-white/5 md:border-none" id="product-grid">

                            @if(isset($productos))
                                @forelse($productos as $producto)
                                @php
                                    // Construir URL de imagen con el dominio PROPIO de cada sucursal
                                    $imagenes   = $producto['imagenes'] ?? [];
                                    $storageUrl = rtrim($producto['storage_url'] ?? '', '/');
                                    $allImages  = [];
                                    foreach($imagenes as $img) {
                                        $allImages[] = $storageUrl . '/' . ltrim($img, '/');
                                    }
                                    if(empty($allImages)) $allImages[] = asset('images/logo.jpg');
                                    
                                    $imgUrl = $allImages[0];
                                    $allImagesJson = json_encode($allImages);

                                    $catName    = $producto['categoria'] ?? 'General';
                                    $branchName = $producto['sucursal'] ?? 'Multi-Sede';
                                    $branchSlug = $producto['sucursal_slug'] ?? '';
                                @endphp
                                <div class="glass-card rounded-none md:rounded-2xl p-2 flex flex-col mouse-glow product-item cursor-pointer group/card border-r border-b border-white/5 md:border-none {{ !($producto['is_initial'] ?? true) ? 'js-limit-hidden hidden' : '' }}"
                                     data-name="{{ strtolower(trim($producto['nombre'])) }}"
                                     data-cat="{{ strtolower(trim($catName)) }}"
                                     data-is-initial="{{ ($producto['is_initial'] ?? true) ? '1' : '0' }}"
                                     data-subcat="{{ strtolower(trim($producto['subcategoria'] ?? '')) }}"
                                     data-marca="{{ strtolower(trim($producto['marca'] ?? '')) }}"
                                     data-modelo="{{ strtolower(trim($producto['modelo'] ?? '')) }}"
                                     data-branch="{{ strtolower(trim($branchSlug)) }}"
                                     onclick="openProductModal('{{ addslashes($producto['nombre']) }}', {{ $allImagesJson }}, '{{ addslashes($catName) }}', '{{ addslashes($branchName) }}', '{{ addslashes($producto['descripcion'] ?? '') }}', 'Hola, me interesa comprar {{ addslashes($producto['nombre']) }}', { marca: '{{ addslashes($producto['marca'] ?? '') }}', modelo: '{{ addslashes($producto['modelo'] ?? '') }}', calibre: '{{ addslashes($producto['calibre'] ?? '') }}', pais: '{{ addslashes($producto['pais_fabricacion'] ?? '') }}' })">
                                    <div class="bg-black/30 rounded-xl h-56 flex items-center justify-center p-2 relative overflow-hidden group">
                                        <div class="absolute inset-0 bg-cyan-500/10 rounded-full blur-[60px] opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                                        <div class="absolute top-3 right-3 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300 w-8 h-8 rounded bg-white/10 flex items-center justify-center text-white backdrop-blur-md z-20"><i class='bx bx-zoom-in'></i></div>
                                        <img src="{{ $imgUrl }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-500 relative z-10" alt="{{ $producto['nombre'] }}">
                                    </div>
                                    <div class="p-5 flex flex-col flex-1 relative z-10">
                                        <div class="flex justify-between items-start mb-2 gap-2">
                                            <div class="text-[10px] text-accent-cyan border border-accent-cyan/30 bg-accent-cyan/10 px-2 py-0.5 rounded font-bold tracking-widest uppercase">{{ $catName }}</div>
                                            <div class="text-[10px] text-gray-400 font-mono text-right"><i class='bx bx-map'></i> {{ $branchName }}</div>
                                        </div>
                                        <h4 class="font-display text-xl font-bold text-white mb-2 group-hover/card:text-accent-cyan transition-colors">{{ $producto['nombre'] }}</h4>
                                        
                                        @if(isset($producto['precio']))
                                        <div class="text-accent-cyan font-bold text-lg mb-6">Q{{ number_format($producto['precio'], 2) }}</div>
                                        @endif
                                        
                                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-white/10">
                                            <!-- Enlace Estético Ver Detalle -->
                                            <button onclick="event.stopPropagation(); openProductModal('{{ addslashes($producto['nombre']) }}', {{ $allImagesJson }}, '{{ addslashes($catName) }}', '{{ addslashes($branchName) }}', '{{ addslashes($producto['descripcion'] ?? '') }}', 'Hola, me interesa comprar {{ addslashes($producto['nombre']) }}', { marca: '{{ addslashes($producto['marca'] ?? '') }}', modelo: '{{ addslashes($producto['modelo'] ?? '') }}', calibre: '{{ addslashes($producto['calibre'] ?? '') }}', pais: '{{ addslashes($producto['pais_fabricacion'] ?? '') }}' })" 
                                                    class="text-white/60 hover:text-accent-cyan text-[9px] font-bold uppercase tracking-[0.2em] transition-all flex items-center gap-2 group">
                                                <i class='bx bx-plus-circle text-sm group-hover:rotate-90 transition-transform'></i>
                                                VER DETALLE
                                            </button>

                                            <!-- Botón Circular WhatsApp Táctico con Color Original -->
                                            <a href="https://wa.me/50244445555?text={{ urlencode('Hola, me interesa comprar ' . $producto['nombre']) }}" 
                                               onclick="event.stopPropagation();" 
                                               target="_blank" 
                                               class="w-10 h-10 bg-[#25D366]/10 border border-[#25D366]/30 text-[#25D366] rounded-full flex items-center justify-center hover:bg-[#25D366] hover:text-white transition-all shadow-[0_0_15px_rgba(37,211,102,0.2)] hover:shadow-[0_0_20px_rgba(37,211,102,0.4)] active:scale-95 relative" 
                                               title="Consultar por WhatsApp">
                                                <i class='bx bxl-whatsapp text-2xl'></i>
                                                <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5 bg-[#25D366] rounded-full border-2 border-tactical-950 animate-pulse"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                @if(!empty($erroresSucursales ?? []))
                                    <div class="col-span-full text-center py-12 text-yellow-400 font-mono text-sm border border-dashed border-yellow-700 rounded-2xl bg-yellow-500/5 mt-6 mouse-glow">
                                        ⚠ ALGUNAS SUCURSALES NO RESPONDIERON. REVISA LOS LOGS DEL SISTEMA.
                                    </div>
                                @else
                                    <div class="col-span-full text-center py-12 text-gray-500 font-mono text-sm border border-dashed border-gray-700 rounded-2xl bg-white/5 mt-6 mouse-glow">
                                        // ERROR_API: NO SE PUDO CONECTAR CON LA BASE DE DATOS GLOBAL O NO HAY INVENTARIO.
                                    </div>
                                @endif
                            @endforelse
                            @endif

                        </div>
                        
                        <!-- Botón Ver Todo el Arsenal (Dinámico) -->
                        @if(count($productos) > 25)
                        <div id="show-all-container" class="mt-12 flex justify-center py-6">
                            <button id="show-all-btn" onclick="showAllProducts()" class="group relative px-12 py-5 bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:bg-white/10 transition-all duration-500 shadow-[0_0_30px_rgba(0,0,0,0.5)]">
                                <div class="absolute inset-0 bg-gradient-to-r from-accent-cyan/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <div class="relative flex items-center gap-3">
                                    <i class='bx bx-plus-circle text-accent-cyan text-xl group-hover:rotate-180 transition-transform duration-700'></i>
                                    <span class="text-white text-xs font-black uppercase tracking-[0.3em]">Cargar Todo el Arsenal</span>
                                </div>
                                <div class="mt-1 text-[8px] text-gray-500 font-mono text-center tracking-widest opacity-0 group-hover:opacity-60 transition-opacity uppercase">
                                    +{{ count($productos) - 25 }} Modelos Disponibles
                                </div>
                            </button>
                        </div>
                        @endif

                        <!-- Contenedor para Paginación Dinámica -->
                        <div id="p-pagination" class="relative z-50"></div>

                        <!-- Nuevo Estado Vacío Estilo Legion -->
                        <div id="no-products-msg" class="hidden py-32 px-6 flex flex-col items-center justify-center text-center animate-fade-in">
                            <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mb-8 border border-white/10">
                                <i class='bx bx-search text-5xl text-gray-600'></i>
                            </div>
                            <h3 class="font-display text-2xl font-bold text-white uppercase tracking-widest mb-4">No se encontraron productos</h3>
                            <p class="text-gray-500 font-mono text-sm max-w-sm mb-10 leading-relaxed uppercase tracking-tighter">
                                Intenta ajustar tus filtros o busca algo diferente para encontrar el equipo que necesitas.
                            </p>
                            <button onclick="updateProductsByFilter('all')" class="bg-accent-cyan/20 border border-accent-cyan/40 text-accent-cyan px-10 py-4 rounded-full text-xs font-black uppercase tracking-[0.25em] hover:bg-accent-cyan hover:text-black transition-all shadow-[0_0_30px_rgba(34,211,238,0.2)]">
                                Ver todo el inventario
                            </button>
                        </div>

                    </main>
                </div>
            </div>
        </section>

        <!-- ==============================================
             1. VIDEOTECA TÁCTICA (VIDEOS)
        =================================================== -->
        <section class="py-2 relative z-10 overflow-hidden border-y border-white/10">
            <!-- Capas de Background Cinemático y de Cristal -->
            <div class="absolute inset-0 z-0 select-none pointer-events-none">
                <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-20 filter grayscale blur-[2px]">
                <div class="absolute inset-0 bg-tactical-950/70 backdrop-blur-2xl"></div>
                <div class="absolute inset-0 bg-gradient-to-b from-tactical-900 via-transparent to-tactical-900"></div>
            </div>

            <!-- Efectos de Luces Dinámicas Desenfocadas (Orbes) -->
            <div class="absolute top-[10%] left-[-10%] w-[600px] h-[600px] bg-accent-pink/10 rounded-full blur-[150px] mix-blend-screen animate-pulse pointer-events-none" style="animation-duration: 6s;"></div>
            <div class="absolute bottom-[-20%] right-[-5%] w-[800px] h-[800px] bg-accent-cyan/10 rounded-full blur-[180px] mix-blend-screen animate-pulse pointer-events-none" style="animation-duration: 8s;"></div>
            
            <!-- Línea brillante separadora -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-[1px] bg-gradient-to-r from-transparent via-white/5 to-transparent pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-20">
                <div class="flex flex-col md:flex-row justify-between items-end mb-1 gsap-reveal gs-fade-up relative">
                    <div class="relative">
                        <div class="absolute -left-6 top-2 bottom-2 w-1 bg-white/50 rounded-r-md"></div>
                        <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-2 tracking-tight drop-shadow-[0_0_20px_rgba(255,255,255,0.2)]">VIDEOTECA <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-100 to-gray-500">TÁCTICA</span></h2>
                        <p class="text-gray-400 font-mono text-sm tracking-widest uppercase">Reseñas en campo • Pruebas de polígono • Unboxing</p>
                    </div>
                    <a href="#" class="mt-6 md:mt-0 text-white bg-white/5 border border-white/20 px-8 py-3 rounded-xl text-xs uppercase tracking-[0.2em] font-bold hover:bg-white hover:text-black transition-all flex items-center gap-2 group/btn shadow-[0_4px_30px_rgba(0,0,0,0.5)] backdrop-blur-md">
                        Explorar Archivo <i class='bx bx-right-arrow-alt text-xl group-hover/btn:translate-x-1 transition-transform'></i>
                    </a>
                </div>


                <!-- Modern Swiper Carousel for Videos -->
                <div class="relative w-full mt-10" id="video-carousel-container">
                    <!-- Glowing Backdrops for the Carousel -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80%] h-[50%] bg-gradient-to-r from-accent-pink/5 via-accent-cyan/10 to-accent-pink/5 blur-[80px] rounded-full pointer-events-none"></div>
                    
                    <div class="swiper video-slider w-full py-1 !overflow-visible">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide group">
                                <div class="glass-card rounded-2xl overflow-hidden cursor-crosshair mouse-glow relative border border-white/5 hover:border-accent-pink/30 transition-all h-full flex flex-col transform group-hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,42,85,0.15)]">
                                    <div class="aspect-video bg-black relative overflow-hidden">
                                        <div class="absolute inset-0 bg-accent-pink/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                                        <img src="https://images.unsplash.com/photo-1563821035532-68097b69c4f7?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none">
                                        <div class="absolute inset-0 flex items-center justify-center z-20">
                                            <div class="w-16 h-16 rounded-full bg-tactical-900/80 border border-accent-pink/40 text-accent-pink flex items-center justify-center backdrop-blur-md group-hover:bg-accent-pink group-hover:text-white group-hover:border-accent-pink group-hover:shadow-[0_0_30px_rgba(255,42,85,0.6)] transition-all duration-300 transform group-hover:scale-110">
                                                <i class='bx bx-play text-4xl ml-1'></i>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-3 right-3 z-20 bg-black/70 backdrop-blur-md border border-white/10 px-2 py-1 rounded text-[10px] text-white font-mono tracking-widest flex items-center gap-1 group-hover:border-accent-pink/50 transition-colors">
                                           <i class='bx bx-time'></i> 12:45
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-white/5 bg-gradient-to-t from-tactical-950 to-tactical-900 flex-1 relative z-20">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-[9px] font-bold tracking-widest text-accent-pink uppercase border border-accent-pink/30 px-2 py-0.5 rounded bg-accent-pink/10 shadow-[0_0_10px_rgba(255,42,85,0.2)]">Premium</span>
                                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">Pruebas Campo</span>
                                        </div>
                                        <h4 class="font-display font-bold text-white text-xl md:text-2xl mb-2 group-hover:text-accent-pink transition-colors leading-tight">Glock 19X: Rendimiento Extremo</h4>
                                        <p class="text-sm text-gray-400 font-light line-clamp-2 leading-relaxed mb-4">Análisis detallado de balística y fiabilidad en campo abierto con el modelo Crossover de Glock.</p>
                                        <div class="flex justify-between items-center mt-auto border-t border-white/5 pt-4">
                                            <span class="text-[10px] text-gray-400 font-mono tracking-widest"><i class='bx bx-show text-accent-pink mr-1'></i> 10.5K Vistas</span>
                                            <button class="text-[10px] font-bold text-white bg-white/5 px-4 py-1 rounded border border-white/10 group-hover:bg-accent-pink group-hover:text-white transition-all uppercase tracking-widest">Ver Video</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="swiper-slide group">
                                <div class="glass-card rounded-2xl overflow-hidden cursor-crosshair mouse-glow relative border border-white/5 hover:border-[#ffd700]/30 transition-all h-full flex flex-col transform group-hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,215,0,0.15)]">
                                    <div class="aspect-video bg-black relative overflow-hidden">
                                        <div class="absolute inset-0 bg-[#ffd700]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                                        <img src="https://images.unsplash.com/photo-1590425712124-7473a2164478?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none">
                                        <div class="absolute inset-0 flex items-center justify-center z-20">
                                            <div class="w-16 h-16 rounded-full bg-tactical-900/80 border border-[#ffd700]/40 text-[#ffd700] flex items-center justify-center backdrop-blur-md group-hover:bg-[#ffd700] group-hover:text-black group-hover:border-[#ffd700] group-hover:shadow-[0_0_30px_rgba(255,215,0,0.6)] transition-all duration-300 transform group-hover:scale-110">
                                                <i class='bx bx-play text-4xl ml-1'></i>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-3 right-3 z-20 bg-black/70 backdrop-blur-md border border-white/10 px-2 py-1 rounded text-[10px] text-white font-mono tracking-widest flex items-center gap-1 group-hover:border-[#ffd700]/50 transition-colors">
                                           <i class='bx bx-time'></i> 18:20
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-white/5 bg-gradient-to-t from-tactical-950 to-tactical-900 flex-1 relative z-20">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-[9px] font-bold tracking-widest text-[#ffd700] uppercase border border-[#ffd700]/30 px-2 py-0.5 rounded bg-[#ffd700]/10 shadow-[0_0_10px_rgba(255,215,0,0.2)]">Exclusivo</span>
                                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">Unboxing</span>
                                        </div>
                                        <h4 class="font-display font-bold text-white text-xl md:text-2xl mb-2 group-hover:text-[#ffd700] transition-colors leading-tight">SIG MCX Spear: El Nuevo Estándar</h4>
                                        <p class="text-sm text-gray-400 font-light line-clamp-2 leading-relaxed mb-4">El salto generacional en fusiles de asalto. Conociendo el nuevo estándar de la armada a detalle.</p>
                                        <div class="flex justify-between items-center mt-auto border-t border-white/5 pt-4">
                                            <span class="text-[10px] text-gray-400 font-mono tracking-widest"><i class='bx bx-show text-[#ffd700] mr-1'></i> 8.2K Vistas</span>
                                            <button class="text-[10px] font-bold text-white bg-white/5 px-4 py-1 rounded border border-white/10 group-hover:bg-[#ffd700] group-hover:text-black transition-all uppercase tracking-widest">Ver Video</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide group">
                                <div class="glass-card rounded-2xl overflow-hidden cursor-crosshair mouse-glow relative border border-white/5 hover:border-accent-cyan/30 transition-all h-full flex flex-col transform group-hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,240,255,0.15)]">
                                    <div class="aspect-video bg-black relative overflow-hidden">
                                        <div class="absolute inset-0 bg-accent-cyan/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                                        <img src="https://images.unsplash.com/photo-1552554747-0b1e3e7f9175?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none">
                                        <div class="absolute inset-0 flex items-center justify-center z-20">
                                            <div class="w-16 h-16 rounded-full bg-tactical-900/80 border border-accent-cyan/40 text-accent-cyan flex items-center justify-center backdrop-blur-md group-hover:bg-accent-cyan group-hover:text-black group-hover:border-accent-cyan group-hover:shadow-[0_0_30px_rgba(0,240,255,0.6)] transition-all duration-300 transform group-hover:scale-110">
                                                <i class='bx bx-play text-4xl ml-1'></i>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-3 right-3 z-20 bg-black/70 backdrop-blur-md border border-white/10 px-2 py-1 rounded text-[10px] text-white font-mono tracking-widest flex items-center gap-1 group-hover:border-accent-cyan/50 transition-colors">
                                           <i class='bx bx-time'></i> 45:10
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-white/5 bg-gradient-to-t from-tactical-950 to-tactical-900 flex-1 relative z-20">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-[9px] font-bold tracking-widest text-accent-cyan uppercase border border-accent-cyan/30 px-2 py-0.5 rounded bg-accent-cyan/10 shadow-[0_0_10px_rgba(0,240,255,0.2)]">Academia</span>
                                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">Desarrollo Táctico</span>
                                        </div>
                                        <h4 class="font-display font-bold text-white text-xl md:text-2xl mb-2 group-hover:text-accent-cyan transition-colors leading-tight">Masterclass CQB</h4>
                                        <p class="text-sm text-gray-400 font-light line-clamp-2 leading-relaxed mb-4">Técnicas avanzadas de limpieza de cuartos y despeje de áreas bajo fuego simulado.</p>
                                        <div class="flex justify-between items-center mt-auto border-t border-white/5 pt-4">
                                            <span class="text-[10px] text-gray-400 font-mono tracking-widest"><i class='bx bx-show text-accent-cyan mr-1'></i> 15.1K Vistas</span>
                                            <button class="text-[10px] font-bold text-white bg-white/5 px-4 py-1 rounded border border-white/10 group-hover:bg-accent-cyan group-hover:text-black transition-all uppercase tracking-widest">Ver Video</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide group">
                                <div class="glass-card rounded-2xl overflow-hidden cursor-crosshair mouse-glow relative border border-white/5 hover:border-accent-primary/30 transition-all h-full flex flex-col transform group-hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(234,179,8,0.15)]">
                                    <div class="aspect-video bg-black relative overflow-hidden">
                                        <div class="absolute inset-0 bg-accent-primary/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                                        <img src="https://images.unsplash.com/photo-1542281286-9e0a16bb7366?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700 pointer-events-none">
                                        <div class="absolute inset-0 flex items-center justify-center z-20">
                                            <div class="w-16 h-16 rounded-full bg-tactical-900/80 border border-accent-primary/40 text-accent-primary flex items-center justify-center backdrop-blur-md group-hover:bg-accent-primary group-hover:text-black group-hover:border-accent-primary group-hover:shadow-[0_0_30px_rgba(234,179,8,0.6)] transition-all duration-300 transform group-hover:scale-110">
                                                <i class='bx bx-play text-4xl ml-1'></i>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-3 right-3 z-20 bg-black/70 backdrop-blur-md border border-white/10 px-2 py-1 rounded text-[10px] text-white font-mono tracking-widest flex items-center gap-1 group-hover:border-accent-primary/50 transition-colors">
                                           <i class='bx bx-time'></i> 08:32
                                        </div>
                                    </div>
                                    <div class="p-6 border-t border-white/5 bg-gradient-to-t from-tactical-950 to-tactical-900 flex-1 relative z-20">
                                        <div class="flex items-center gap-2 mb-3">
                                            <span class="text-[9px] font-bold tracking-widest text-accent-primary uppercase border border-accent-primary/30 px-2 py-0.5 rounded bg-accent-primary/10 shadow-[0_0_10px_rgba(234,179,8,0.2)]">Revisión Polígono</span>
                                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">Precisión</span>
                                        </div>
                                        <h4 class="font-display font-bold text-white text-xl md:text-2xl mb-2 group-hover:text-accent-primary transition-colors leading-tight">Sight-in: Ópticas Élite</h4>
                                        <p class="text-sm text-gray-400 font-light line-clamp-2 leading-relaxed mb-4">Calibración de miras térmicas y nocturnas a 500 metros en condiciones adversas.</p>
                                        <div class="flex justify-between items-center mt-auto border-t border-white/5 pt-4">
                                            <span class="text-[10px] text-gray-400 font-mono tracking-widest"><i class='bx bx-show text-accent-primary mr-1'></i> 5.1K Vistas</span>
                                            <button class="text-[10px] font-bold text-white bg-white/5 px-4 py-1 rounded border border-white/10 group-hover:bg-accent-primary group-hover:text-black transition-all uppercase tracking-widest">Ver Video</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                        </div>


                        <!-- Custom Navigation Controls outside the overflow hidden box if needed, but inside container for absolute positioning -->
                        <div class="flex items-center justify-between w-full absolute top-[40%] left-0 z-30 pointer-events-none px-2 lg:-mx-12 lg:w-[calc(100%+6rem)]">
                            <div class="w-12 h-12 rounded-full glass-card border flex items-center justify-center text-white cursor-pointer hover:border-accent-pink hover:text-accent-pink transition-all shadow-xl swiper-button-prev-video pointer-events-auto backdrop-blur-xl">
                                <i class='bx bx-chevron-left text-3xl'></i>
                            </div>
                            <div class="w-12 h-12 rounded-full glass-card border flex items-center justify-center text-white cursor-pointer hover:border-accent-pink hover:text-accent-pink transition-all shadow-xl swiper-button-next-video pointer-events-auto backdrop-blur-xl">
                                <i class='bx bx-chevron-right text-3xl'></i>
                            </div>
                        </div>
                        
                        <!-- Premium Pagination -->
                        <div class="swiper-pagination-video mt-2 w-full flex justify-center gap-3"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==============================================
             2. ARSENAL DE ÉLITE (SELECCIÓN TÁCTICA)
        =================================================== -->
        <section class="py-16 bg-[#030406] relative z-10 overflow-hidden border-y border-white/5">
            <!-- Fondo Cristalizado Moderno (Capas de Profundidad) -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-[#e67e22]/5 via-transparent to-accent-cyan/5 pointer-events-none"></div>
            
            <!-- Elementos de Cristal Flotantes (Decorativos) -->
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/5 backdrop-blur-[120px] rounded-full pointer-events-none border border-white/10 rotate-12"></div>
            <div class="absolute bottom-10 -left-20 w-80 h-80 bg-accent-cyan/5 backdrop-blur-[100px] rounded-full pointer-events-none border border-accent-cyan/10 -rotate-12"></div>

            <div class="max-w-[95%] mx-auto px-6 relative z-20">
                <div class="flex flex-col md:flex-row items-center md:items-end justify-between mb-16 gap-8 border-b border-white/10 pb-8 relative">
                    <!-- Brillo lineal táctico en la parte superior del título -->
                    <div class="absolute top-0 left-0 w-32 h-[1px] bg-gradient-to-r from-transparent via-[#e67e22] to-transparent"></div>

                    <div class="max-w-2xl text-center md:text-left w-full">
                        <h2 class="font-display text-4xl md:text-5xl lg:text-6xl font-black text-white leading-none uppercase tracking-tighter mb-6">
                            PRODUCTOS <br class="hidden md:block"><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#e67e22] to-yellow-500 drop-shadow-[0_0_20px_rgba(230,126,34,0.3)]">DESTACADOS</span>
                        </h2>
                        <p class="text-gray-400 text-sm md:text-lg font-light leading-relaxed max-w-xl mx-auto md:mx-0 border-l-2 border-[#e67e22]/50 pl-6 mt-4">
                            La excelencia no es una opción, es nuestro <span class="text-white">estándar</span>. Descubre los <span class="text-[#e67e22] font-medium">productos más solicitados</span> por expertos, garantizando máxima calidad y precisión táctica.
                        </p>
                    </div>
                    
                    <div class="hidden md:flex flex-col text-right glass-card px-6 py-4 rounded-2xl border-white/10 bg-white/5 backdrop-blur-md">
                        <span class="text-[10px] text-gray-400 font-mono tracking-widest uppercase mb-1">Operaciones Balam</span>
                        <div class="flex items-center gap-2 mt-1">
                            <i class='bx bx-radar text-[#e67e22] text-2xl animate-pulse'></i>
                            <span class="text-white font-black tracking-widest uppercase text-xs">Múltiples Sedes</span>
                        </div>
                    </div>
                </div>

                @php
                    // Obtener una mezcla de productos destacados (con imágenes) - Aumentamos para asegurar carrusel
                    $destacados = collect($todosLosProductos ?? [])
                        ->filter(fn($p) => !empty($p['imagenes']))
                        ->shuffle()
                        ->take(12); // Tomamos 12 directamente para asegurar que el carrusel tenga qué mostrar
                @endphp

                <div class="swiper arsenal-slider w-full pb-10">
                    <div class="swiper-wrapper">
                        @foreach($destacados as $item)
                        @php
                            $iImagenes = $item['imagenes'] ?? [];
                            $iStorage  = rtrim($item['storage_url'] ?? '', '/');
                            $iAllImgs   = [];
                            foreach($iImagenes as $img) { $iAllImgs[] = $iStorage . '/' . ltrim($img, '/'); }
                            if(empty($iAllImgs)) $iAllImgs[] = asset('images/logo.jpg');
                            
                            $iImgUrl = $iAllImgs[0];
                            $iAllImgsJson = json_encode($iAllImgs);
                            $iCat  = $item['categoria'] ?? 'General';
                            $iSede = $item['sucursal'] ?? 'Balam Gear';
                        @endphp
                        <div class="swiper-slide pt-4 pb-4 h-auto">
                            <div class="glass-card rounded-[2rem] p-4 flex flex-col mouse-glow cursor-default group/card relative border border-white/5 hover:border-accent-cyan/30 transition-all duration-500 hover:-translate-y-2 h-full shadow-[0_15px_30px_rgba(0,0,0,0.4)] hover:shadow-[0_25px_50px_rgba(0,0,0,0.7)]"
                                 onclick="openProductModal('{{ addslashes($item['nombre']) }}', {{ $iAllImgsJson }}, '{{ addslashes($iCat) }}', '{{ addslashes($iSede) }}', '{{ addslashes($item['descripcion'] ?? '') }}', 'Me interesa el equipo destacado: {{ addslashes($item['nombre']) }}', { marca: '{{ addslashes($item['marca'] ?? '') }}', modelo: '{{ addslashes($item['modelo'] ?? '') }}', calibre: '{{ addslashes($item['calibre'] ?? '') }}', pais: '{{ addslashes($item['pais_fabricacion'] ?? '') }}' })">
                                
                                <div class="bg-tactical-900 border border-white/10 rounded-[1.5rem] h-52 flex items-center justify-center p-3 relative overflow-hidden group mb-6 shadow-inner w-full">
                                    <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                                    <!-- Contenedor blanco sutil para imágenes con fondos jpg -->
                                    <div class="w-full h-full flex items-center justify-center bg-white rounded-xl overflow-hidden shadow-[0_5px_15px_rgba(0,0,0,0.5)]">
                                        <img src="{{ $iImgUrl }}" class="max-h-[90%] max-w-[90%] object-contain group-hover:scale-105 transition-transform duration-700 relative z-10" alt="{{ $item['nombre'] }}">
                                    </div>
                                </div>

                                <div class="flex flex-col flex-1 px-2">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-[9px] font-bold text-accent-cyan uppercase tracking-tighter opacity-70 border-b border-accent-cyan/20">{{ $iCat }}</span>
                                        <span class="text-[9px] text-gray-500 font-mono flex items-center"><i class='bx bxs-map text-[#e67e22]/70 mr-1'></i> {{ $iSede }}</span>
                                    </div>
                                    <h4 class="font-display text-xl font-bold text-white mb-6 group-hover/card:text-accent-cyan transition-colors leading-tight line-clamp-2">
                                        {{ $item['nombre'] }}
                                    </h4>

                                    <div class="mt-auto flex items-center justify-between pt-5 border-t border-white/10">
                                        <!-- Ver Detalle (Estático) -->
                                        <button class="text-white/40 group-hover/card:text-white text-[10px] font-bold tracking-[0.1em] transition-all flex items-center gap-2">
                                            <i class='bx bx-plus-circle text-sm group-hover/card:rotate-90 transition-transform'></i>
                                            Ver detalle
                                        </button>

                                        <!-- WhatsApp Directo -->
                                        <a href="https://wa.me/50244445555?text={{ urlencode('Hola, vi en lo destacado el producto: ' . $item['nombre']) }}" 
                                           onclick="event.stopPropagation();" 
                                           target="_blank" 
                                           class="w-9 h-9 bg-[#25D366]/10 border border-[#25D366]/20 text-[#25D366] rounded-full flex items-center justify-center hover:bg-[#25D366] hover:text-white transition-all shadow-[0_0_10px_rgba(37,211,102,0.15)] active:scale-95 group/wa">
                                            <i class='bx bxl-whatsapp text-xl'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Botones de Navegación del Carrusel -->
                    <div class="swiper-button-prev arsenal-prev !text-white opacity-40 hover:opacity-100 scale-75 transition-all duration-300 drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] hover:scale-90 bg-black/40 hover:bg-white/10 rounded-full w-12 h-12 backdrop-blur-md border border-white/10 shadow-[0_0_15px_rgba(0,0,0,0.5)] -ml-2 lg:-ml-4"></div>
                    <div class="swiper-button-next arsenal-next !text-white opacity-40 hover:opacity-100 scale-75 transition-all duration-300 drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] hover:scale-90 bg-black/40 hover:bg-white/10 rounded-full w-12 h-12 backdrop-blur-md border border-white/10 shadow-[0_0_15px_rgba(0,0,0,0.5)] -mr-2 lg:-mr-4"></div>

                    <!-- Paginación (Puntos) -->
                    <div class="swiper-pagination arsenal-pagination !bottom-0 mt-8"></div>
                </div>
            </div>
        </section>

        <!-- ==============================================
             3. PRÓXIMOS INGRESOS (SOON)
        =================================================== -->
        <section class="py-24 bg-tactical-900 relative z-10 overflow-hidden border-t border-b border-white/5">
            <!-- Background con efecto radar/escaneo -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border border-white/5 rounded-full pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border border-white/5 rounded-full pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-accent-cyan/5 border border-accent-cyan/20 rounded-full blur-[80px] pointer-events-none animate-pulse"></div>
            <div class="absolute top-0 bottom-0 left-1/2 w-[1px] bg-white/5 pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-20">
                <div class="flex flex-col text-center items-center mb-16 gsap-reveal gs-fade-up">
                    <span class="text-accent-cyan font-bold tracking-[0.4em] uppercase text-[10px] md:text-sm mb-4 block">Radar de Importaciones</span>
                    <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-6 uppercase tracking-tight">Próximos <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-400 to-white">Ingresos</span></h2>
                    <p class="text-gray-400 text-base md:text-lg max-w-2xl font-light">
                        Asegura tu equipo táctico antes de que pise suelo y llegue a nuestras bóvedas. Evita el <span class="text-white border-b border-white border-dashed">Sold Out</span>.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Item Ingreso 1: Glock 19X -->
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-accent-pink/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-red-600 to-accent-pink w-[92%] shadow-[0_0_15px_#ff2a55]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-pink text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-accent-pink/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-pink animate-ping"></span> 92% TRÁNSITO
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-pink/50 group-hover/inc:shadow-[0_0_20px_rgba(255,42,85,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-pink'></i>
                                </div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1595101834457-fe3419097753?q=80&w=600&auto=format&fit=crop" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="Glock 19X">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-ship'></i> ARRIBO: 04 DÍAS
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-pink transition-colors leading-none tracking-tight uppercase">GLOCK 19X COYOTE</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">Crossover oficial de Glock. Diseño robusto, cargadores de alta capacidad y acabado táctico nPVD.</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-accent-pink hover:text-white transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(255,42,85,0.3)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>
                    
                    <!-- Item Ingreso 2: SIG SAUER MCX -->
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-accent-cyan/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-cyan-600 to-accent-cyan w-[65%] shadow-[0_0_15px_#00e5ff]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-cyan text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-accent-cyan/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan animate-ping"></span> 65% TRÁNSITO
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-cyan/50 group-hover/inc:shadow-[0_0_20px_rgba(0,229,255,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-cyan'></i>
                                </div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1590425712124-7473a2164478?q=80&w=600&auto=format&fit=crop" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="SIG MCX">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-plane-alt'></i> ARRIBO: 15 DÍAS
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-cyan transition-colors leading-none tracking-tight uppercase">SIG SAUER MCX VIRTUS</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">Sistema multi-calibre configurable. La cúspide de la ingeniería de tiro moderna y adaptable.</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-accent-cyan hover:text-black transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(0,229,255,0.3)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>

                    <!-- Item Ingreso 3: BENELI M4 -->
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-yellow-500/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-yellow-600 to-yellow-400 w-[15%] shadow-[0_0_15px_#fbbf24]"></div></div>
                        <div class="absolute top-4 right-6 text-yellow-500 text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-yellow-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-ping"></span> 15% LOGÍSTICA
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-yellow-500/50 group-hover/inc:shadow-[0_0_20px_rgba(251,191,36,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-yellow-500'></i>
                                </div>
                            </div>
                            <img src="https://images.unsplash.com/photo-1595101834161-267591e6005c?q=80&w=600&auto=format&fit=crop" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="Benelli M4">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-box'></i> ARRIBO: 45 DÍAS
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-yellow-500 transition-colors leading-none tracking-tight uppercase">BENELLI M4 TACTICAL</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">Escopeta semi-automática de combate. Fiabilidad legendaria para cualquier escenario crítico.</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-white hover:text-black transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        <!-- Empresa: Quienes Somos (Rediseño Moderno) -->
        <section id="empresa" class="relative py-16 flex flex-col items-center bg-tactical-900 overflow-hidden">
            <!-- Background Image con Overlay Cinematográfico -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-30 grayscale contrast-125">
                <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 via-tactical-900/40 to-tactical-900"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,240,255,0.05)_0%,transparent_70%)]"></div>
            </div>

            <!-- Contenido Central -->
            <div class="relative z-10 max-w-5xl mx-auto px-6 text-center gsap-reveal gs-fade-up">
                <span class="text-accent-cyan font-bold tracking-[0.5em] uppercase text-[10px] md:text-sm mb-4 block border-b border-white/10 pb-3 w-max mx-auto">Trayectoria y Confianza</span>
                <h2 class="font-display text-4xl md:text-7xl font-black text-white mb-6 leading-[1] uppercase tracking-tighter drop-shadow-[0_15px_30px_rgba(0,0,0,0.5)]">
                    DÉCADAS DE <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-100 to-cyan-400">EXCELENCIA</span> <br> NOS RESPALDAN
                </h2>
                <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light mb-4">
                    Somos líderes en la distribution de armamento de alta gama, brindando asesoría especializada a deportistas de élite, cazadores y expertos en seguridad.
                </p>

                <!-- Tarjeta de Marcas (Estilo Excel Example) -->
                <div class="glass-card rounded-[2rem] pt-4 pb-8 px-6 md:pt-6 md:pb-12 md:px-12 border border-white/10 shadow-[0_40px_100px_rgba(0,0,0,0.6)] mt-2 mouse-glow relative overflow-hidden group">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-cyan-500/10 blur-[80px] rounded-full group-hover:bg-cyan-500/20 transition-all"></div>
                    
                    <h4 class="text-[10px] font-bold text-gray-500 tracking-[0.4em] uppercase mb-4 opacity-70">Nuestras Marcas Aliadas</h4>
                    
                    <!-- Marquee Dinámico de Marcas de Armas (Innovador y Compacto) -->
                    <div class="relative overflow-hidden w-full py-4 [mask-image:linear-gradient(to_right,transparent,black_20%,black_80%,transparent)]">
                        <div class="flex gap-16 animate-marquee-balam whitespace-nowrap">
                            @foreach($marcasArmas as $marca)
                                <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair px-10">
                                    <span class="text-xl md:text-2xl font-black text-white/40 tracking-widest uppercase italic group-hover:text-white transition-colors">{{ $marca['nombre'] }}</span>
                                    <span class="text-[7px] text-accent-cyan font-mono tracking-[0.3em] uppercase opacity-0 group-hover/brand:opacity-100 transition-all duration-300">Activo Balam</span>
                                </div>
                            @endforeach
                            <!-- Duplicar el loop para efecto infinito -->
                            @foreach($marcasArmas as $marca)
                                <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair px-10">
                                    <span class="text-xl md:text-2xl font-black text-white/40 tracking-widest uppercase italic group-hover:text-white transition-colors">{{ $marca['nombre'] }}</span>
                                    <span class="text-[7px] text-accent-cyan font-mono tracking-[0.3em] uppercase opacity-0 group-hover/brand:opacity-100 transition-all duration-300">Activo Balam</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Red de Sedes y Contacto (Mapas Integrados) -->
        <section id="contacto" class="py-16 bg-[#050505] relative z-10 overflow-hidden border-t border-white/5">
            <!-- 1. Capas de Fondo de Nivel Profesional / Elite Tactical -->
            
            <!-- Ruido y Textura Base (Obsidian Noise) -->
            <div class="absolute inset-0 bg-noise opacity-[0.03] pointer-events-none"></div>
            
            <!-- Topografía Digital (Ultra-Sutil) -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/binding-dark.png')] opacity-20 pointer-events-none"></div>
            
            <!-- Tactical Radar HUD (Deco Background) - Profesional -->
            <div class="absolute top-[-5%] right-[2%] w-[500px] h-[500px] opacity-[0.1] pointer-events-none z-0">
                <div class="w-full h-full rounded-full border border-[#e67e22]/30 animate-[spin_120s_linear_infinite] shadow-[0_0_50px_rgba(230,126,34,0.1)]"></div>
                <div class="absolute inset-[5%] rounded-full border border-white/5"></div>
                <div class="absolute inset-[15%] rounded-full border border-[#e67e22]/10"></div>
                <div class="absolute inset-[35%] rounded-full border border-white/5"></div>
                <!-- Líneas de Cruzado Detalladas -->
                <div class="absolute top-1/2 left-0 w-full h-[0.5px] bg-white/10"></div>
                <div class="absolute left-1/2 top-0 w-[0.5px] h-full bg-white/10"></div>
                <div class="absolute top-1/2 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-[#e67e22]/20 to-transparent blur-[1px]"></div>
            </div>
            
            <!-- Grid de fondo tecnológico de precisión -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.01)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.01)_1px,transparent_1px)] bg-[size:100px_100px] pointer-events-none"></div>
            
            <!-- Gradientes de Atmósfera Profesional -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(230,126,34,0.04)_0%,transparent_60%)] pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-black to-transparent z-0 pointer-events-none"></div>

            <div class="max-w-[95%] mx-auto px-4 z-10 relative">
                <!-- Título y Subtítulo Estratégico -->
                <div class="mb-10 gsap-reveal gs-slide-right flex flex-col items-start gap-4">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-2 h-10 bg-[#e67e22] shadow-[0_0_15px_rgba(230,126,34,0.5)]"></span>
                        <div>
                            <h2 class="font-display text-4xl md:text-6xl font-black text-white uppercase tracking-tighter leading-none drop-shadow-[0_0_40px_rgba(0,0,0,0.8)]">Nuestras <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#e67e22] via-white to-[#ffd700] bg-[length:200%_auto] animate-gradient-x">Sedes</span></h2>
                        </div>
                    </div>
                    
                    <div class="relative pl-5 max-w-2xl">
                        <div class="absolute left-0 top-0 bottom-0 w-[1px] bg-gradient-to-b from-[#e67e22] to-transparent"></div>
                        <p class="text-gray-300 text-lg md:text-xl font-light italic tracking-wide leading-relaxed">
                            <span class="text-white font-bold opacity-100">Distribución estratégica</span> para una cobertura total, asegurando una respuesta inmediata en cada punto de origen.
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <!-- Sidebar de Sedes -->
                    <div class="lg:col-span-4 flex flex-col gap-6 max-h-[550px] overflow-y-auto px-2 custom-scrollbar">
                        
                        <!-- Sede Poptún -->
                        <div class="location-card relative group cursor-pointer" onclick="showLocation('16.3314,-89.4183', 'Sede Poptún', 'Barrio El Centro, Petén')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-[#e67e22]/0 to-[#e67e22]/0 group-hover:from-[#e67e22]/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-[#e67e22]/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-[#e67e22]/50 transition-all relative">
                                        <img src="{{ asset('images/sucursales/poptun.png') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-[#e67e22]/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-[#e67e22] tracking-widest uppercase">BALAM 01</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-[#e67e22] transition-colors leading-tight">Sede Poptún</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Barrio El Centro, Petén</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=16.3314,-89.4183','_blank')" class="flex-1 bg-white/5 hover:bg-[#e67e22] hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-[#e67e22]">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('{{ asset('images/sucursales/poptun.png') }}', 'Sede Poptún')" class="flex-1 bg-white/5 hover:bg-[#e67e22]/10 hover:border-[#e67e22]/50 hover:text-[#e67e22] py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-[#e67e22]/20 hover:-translate-y-0.5">
                                                <i class='bx bx-camera'></i> VER FOTO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede San Luis -->
                        <div class="location-card relative group cursor-pointer" onclick="showLocation('16.1956,-89.4442', 'Sede San Luis', 'Calle Principal, Petén')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-[#e67e22]/0 to-[#e67e22]/0 group-hover:from-[#e67e22]/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-[#e67e22]/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-[#e67e22]/50 transition-all relative">
                                        <img src="https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-[#e67e22]/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-[#e67e22] tracking-widest uppercase">BALAM 02</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-[#e67e22] transition-colors leading-tight">Sede San Luis</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Calle Principal, Petén</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=16.1956,-89.4442','_blank')" class="flex-1 bg-white/5 hover:bg-[#e67e22] hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-[#e67e22]">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=1200', 'Sede San Luis')" class="flex-1 bg-white/5 hover:bg-[#e67e22]/10 hover:border-[#e67e22]/50 hover:text-[#e67e22] py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-[#e67e22]/20 hover:-translate-y-0.5">
                                                <i class='bx bx-camera'></i> VER FOTO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede Melchor -->
                        <div class="location-card relative group cursor-pointer" onclick="showLocation('17.0628,-89.1558', 'Sede Melchor', 'Frontera, Melchor de Mencos')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-accent-pink/0 to-accent-pink/0 group-hover:from-accent-pink/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-accent-pink/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-pink/50 transition-all relative">
                                        <img src="https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-accent-pink/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-accent-pink tracking-widest uppercase">BALAM 03</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-[#e67e22] transition-colors leading-tight">Sede Melchor</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Frontera, Melchor de Mencos</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=17.0628,-89.1558','_blank')" class="flex-1 bg-white/5 hover:bg-accent-pink hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-accent-pink">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=1200', 'Sede Melchor')" class="flex-1 bg-white/5 hover:bg-[#e67e22]/10 hover:border-[#e67e22]/50 hover:text-[#e67e22] py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-[#e67e22]/20 hover:-translate-y-0.5">
                                                <i class='bx bx-camera'></i> VER FOTO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Tactical Map Console (Centro de Mando) -->
                    <div class="lg:col-span-8 relative">
                        <!-- HUD Elements (Gold) -->
                        <div class="absolute -top-3 -left-3 w-12 h-12 border-t-2 border-l-2 border-[#e67e22] z-20"></div>
                        <div class="absolute -top-3 -right-3 w-12 h-12 border-t-2 border-r-2 border-[#e67e22] z-20"></div>
                        <div class="absolute -bottom-3 -left-3 w-12 h-12 border-b-2 border-l-2 border-[#e67e22] z-20"></div>
                        <div class="absolute -bottom-3 -right-3 w-12 h-12 border-b-2 border-r-2 border-[#e67e22] z-20"></div>

                        <!-- Side Technical Readouts (Gold) -->
                        <div class="absolute top-6 left-6 z-20 flex flex-col font-mono text-[9px] text-[#e67e22]/60 pointer-events-none">
                            <span>SATELLITE: BALAM-NAV-01</span>
                            <span>STATUS: SCANNING...</span>
                            <span>FREQ: 142.100 MHz</span>
                        </div>
                        <div class="absolute bottom-6 right-6 z-20 flex flex-col font-mono text-[9px] text-[#e67e22]/60 text-right pointer-events-none">
                            <span id="map-coord-display">LAT: --.---- | LONG: --.----</span>
                            <span>ENCRYPTION: ACTIVE</span>
                        </div>

                        <!-- Map Main Glass Frame -->
                        <div class="relative w-full h-[400px] lg:h-[550px] rounded-[3rem] overflow-hidden border border-white/10 bg-black shadow-[0_0_80px_rgba(0,0,0,1)]">
                            <!-- Tactical Overlay (Lightened) -->
                            <div class="absolute inset-0 bg-[#e67e22]/2 pointer-events-none z-10 opacity-30"></div>
                            
                            <!-- Static Scanning Line Animation (Gold) -->
                            <div class="absolute left-0 w-full h-[1px] bg-[#e67e22]/50 shadow-[0_0_15px_rgba(230,126,34,1)] z-20 pointer-events-none opacity-20 animate-scanner"></div>

                            <!-- Welcome Screen / Loader -->
                            <div id="map-msg" class="absolute inset-0 flex flex-col items-center justify-center bg-[#050505]/95 backdrop-blur-xl z-30 transition-all duration-700">
                                <div class="relative w-20 h-20 mb-6 group">
                                    <div class="absolute inset-0 rounded-full border-2 border-[#e67e22]/20 animate-ping"></div>
                                    <div class="absolute inset-0 rounded-full border-t-4 border-[#e67e22] animate-spin" style="animation-duration: 2s;"></div>
                                    <div class="absolute inset-2 rounded-full border-b-4 border-white animate-spin-reverse" style="animation-duration: 3s;"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <i class='bx bx-target-lock text-3xl text-[#e67e22]'></i>
                                    </div>
                                </div>
                                <h3 class="font-display text-xl font-black text-white tracking-[0.2em] uppercase mb-3 text-center">Localizando <span class="text-[#e67e22]">Sucursal</span></h3>
                                <div class="flex flex-col items-center gap-2">
                                    <div class="w-48 h-1 bg-white/5 rounded-full overflow-hidden relative border border-white/10">
                                        <div id="map-loader-bar" class="absolute top-0 left-0 h-full bg-[#e67e22] w-0"></div>
                                    </div>
                                    <p class="text-[8px] font-mono text-gray-500 uppercase tracking-widest" id="map-status-sub">Esperando coordenadas...</p>
                                </div>
                            </div>

                            <!-- Real Google Map Frame -->
                            <iframe id="google-map-iframe" width="100%" height="100%" class="absolute inset-0 opacity-40 group-hover:opacity-60 transition-opacity duration-1000 saturate-[0.8]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src=""></iframe>
                    </div>
                </div>
            </div>
        </section>

            <!-- Lightbox Modal -->
            <div id="image-lightbox" onclick="closeLightbox()" class="fixed inset-0 z-[999] bg-black/95 backdrop-blur-xl flex items-center justify-center opacity-0 pointer-events-none transition-all duration-500 overflow-hidden cursor-zoom-out">
                <button onclick="closeLightbox()" class="absolute top-8 right-8 text-white/50 hover:text-accent-cyan text-6xl transition-colors z-[1000] cursor-pointer">
                    <i class='bx bx-x text-7xl'></i>
                </button>
                <div class="max-w-[90%] max-h-[85vh] relative group" onclick="event.stopPropagation()">
                    <div class="absolute -inset-1 bg-gradient-to-r from-accent-cyan/50 to-accent-pink/50 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <img id="lightbox-img" src="" class="relative rounded-2xl shadow-2xl border border-white/10 max-w-full max-h-[85vh] object-contain" alt="Sucursal Preview">
                    <div id="lightbox-caption" class="absolute bottom-6 left-6 right-6 p-4 bg-tactical-900/80 backdrop-blur-md rounded-xl border border-white/5">
                        <h4 class="font-display text-white text-xl font-bold tracking-wider" id="lightbox-title">Sede Balam</h4>
                        <p class="text-accent-cyan text-[10px] font-mono uppercase mt-1">Vista Detallada de Sucursal</p>
                    </div>
                </div>
            </div>
        </section>

    </div> <!-- Termina Scroll Container -->

    <!-- Marquee Marketing Animado Dorado -->
                            
    </div>

    <!-- Sección de Contacto -->
    <section id="contacto-cards" class="py-20 relative bg-tactical-800 cyber-grid-bg border-b border-white/5 z-10 transition-colors">
        <div class="max-w-7xl mx-auto px-4 z-10 relative">
            <div class="text-center mb-16 gsap-reveal">
                <span class="text-accent-primary font-bold tracking-widest text-[10px] uppercase border border-accent-primary/30 py-1.5 px-4 rounded-full bg-accent-primary/10 shadow-[0_0_15px_rgba(234,179,8,0.2)]">Centro de Comunicaciones</span>
                <h2 class="font-display text-4xl lg:text-5xl font-bold text-white mt-6 drop-shadow-[0_0_15px_rgba(234,179,8,0.4)]">Contáctanos</h2>
                <p class="text-gray-400 text-sm mt-4 font-light max-w-xl mx-auto">Conecta con nuestros especialistas por tu canal preferido. Estamos preparados para asistirte en cada misión.</p>
            </div>

            <!-- Grid de Redes Sociales y Contacto -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Teléfono -->
                <a href="tel:+50212345678" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(255,255,255,0.05)] hover:border-gray-500/50">
                    <div class="w-14 h-14 rounded-xl bg-gray-500/10 flex items-center justify-center text-gray-400 group-hover:text-white group-hover:bg-gray-500/30 transition-all shadow-[0_0_15px_rgba(0,0,0,0.5)]">
                        <i class='bx bxs-phone-call text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest focus:outline-none uppercase">Línea Directa</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-gray-300 transition-colors">+502 1234 5678</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-white transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- WhatsApp -->
                <a href="#" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(37,211,102,0.15)] hover:border-[#25D366]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#25D366]/10 flex items-center justify-center text-[#25D366] group-hover:text-white group-hover:bg-[#25D366] transition-all shadow-[0_0_15px_rgba(37,211,102,0.2)]">
                        <i class='bx bxl-whatsapp text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">WhatsApp</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-[#25D366] transition-colors">Atención Rápida</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#25D366] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- Instagram -->
                <a href="#" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(225,48,108,0.15)] hover:border-[#E1306C]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#E1306C]/10 flex items-center justify-center text-[#E1306C] group-hover:text-white group-hover:bg-gradient-to-br group-hover:from-[#833AB4] group-hover:via-[#FD1D1D] group-hover:to-[#F56040] transition-all shadow-[0_0_15px_rgba(225,48,108,0.2)]">
                        <i class='bx bxl-instagram text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Instagram</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-[#E1306C] transition-colors">@BalamArmeria</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#E1306C] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- TikTok -->
                <a href="#" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(255,0,80,0.15)] hover:border-[#FF0050]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#FF0050]/10 flex items-center justify-center text-[#FF0050] group-hover:text-white group-hover:bg-gradient-to-br group-hover:from-[#00f2fe] group-hover:to-[#4facfe] transition-all shadow-[0_0_15px_rgba(255,0,80,0.2)]">
                        <i class='bx bxl-tiktok text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">TikTok</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-[#00f2fe] transition-colors">@BalamArmeria</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#00f2fe] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- Facebook -->
                <a href="#" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(24,119,242,0.15)] hover:border-[#1877F2]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#1877F2]/10 flex items-center justify-center text-[#1877F2] group-hover:text-white group-hover:bg-[#1877F2] transition-all shadow-[0_0_15px_rgba(24,119,242,0.2)]">
                        <i class='bx bxl-facebook text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Facebook</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-[#1877F2] transition-colors">Balam Armería</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#1877F2] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- Facebook Messenger -->
                <a href="#" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(0,132,255,0.15)] hover:border-[#0084FF]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#0084FF]/10 flex items-center justify-center text-[#0084FF] group-hover:text-white group-hover:bg-[#0084FF] transition-all shadow-[0_0_15px_rgba(0,132,255,0.2)]">
                        <i class='bx bxl-messenger text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Messenger</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-[#0084FF] transition-colors">Chat Directo</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#0084FF] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>
            </div>

            <!-- CTA Bar -->
            <div class="mt-16 bg-tactical-900/80 p-8 rounded-3xl border border-white/10 flex flex-col md:flex-row items-center justify-between gap-6 backdrop-blur-xl gsap-reveal">
                <div>
                    <h3 class="text-white font-bold text-2xl font-display">¿Necesitas ayuda inmediata?</h3>
                    <p class="text-gray-400 text-sm mt-2 font-light">Nuestros asesores están en línea y listos para guiar tu próxima adquisición táctica.</p>
                </div>
                <a href="#" class="bg-[#25D366] hover:bg-[#20c35b] text-white px-8 py-4 rounded-xl font-bold tracking-widest transition-all shadow-[0_0_20px_rgba(37,211,102,0.4)] hover:shadow-[0_0_30px_rgba(37,211,102,0.6)] flex items-center gap-3 hover:-translate-y-1">
                    <i class='bx bxl-whatsapp text-2xl'></i>
                    CHATEA EN WHATSAPP
                </a>
            </div>
        </div>
    </section>

    <!-- Footer Completo -->
    <footer id="social-footer" class="bg-[#05080c] pt-20 pb-20 relative z-10 border-t border-accent-primary/20">
        <!-- Decoration light -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-[1px] bg-gradient-to-r from-transparent via-accent-primary/50 to-transparent"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[200px] h-[50px] bg-accent-primary/20 blur-[50px]"></div>

        <!-- Main Footer Columns -->
        <div class="max-w-[95%] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <!-- Columna 1: Brand -->
            <div class="flex flex-col">
                <div class="flex items-center gap-3 w-max select-none">
                    <div class="w-10 h-10 rounded bg-accent-primary flex items-center justify-center text-tactical-900 shadow-[0_0_15px_rgba(234,179,8,0.4)]">
                        <i class='bx bx-target-lock text-3xl'></i>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-black uppercase tracking-widest text-white font-display">Balam</span>
                        <span class="text-[9px] text-accent-primary font-mono tracking-[0.2em] uppercase mt-[-4px]">Armas & Municiones</span>
                    </div>
                </div>
                <p class="mt-6 text-sm text-gray-500 leading-relaxed font-light">
                    Excelencia, trayectoria legal y el mejor equipamiento táctico en Guatemala. Somos la armería líder y tu aliado estratégico para cada misión.
                </p>
                <div class="flex gap-3 mt-8 text-xl text-gray-400">
                    <a href="#" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] hover:shadow-[0_0_15px_rgba(24,119,242,0.4)] transition-all">
                        <i class='bx bxl-facebook'></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center hover:bg-[#E1306C] hover:text-white hover:border-[#E1306C] hover:shadow-[0_0_15px_rgba(225,48,108,0.4)] transition-all">
                        <i class='bx bxl-instagram'></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center hover:bg-[#00f2fe] hover:text-white hover:border-[#00f2fe] hover:shadow-[0_0_15px_rgba(0,242,254,0.4)] transition-all">
                        <i class='bx bxl-tiktok'></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Navegación -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-compass text-accent-primary'></i> Navegación
                </h4>
                <ul class="flex flex-col gap-4">
                    <li><a href="#inicio" onclick="scrollToSection('#inicio', event)" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Inicio</a></li>
                    <li><a href="#catalogo" onclick="scrollToSection('#catalogo', event)" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nuestro Catálogo</a></li>
                    <li><a href="#empresa" onclick="scrollToSection('#empresa', event)" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nosotros (Academia)</a></li>
                    <li><a href="#contacto" onclick="scrollToSection('#contacto', event)" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Sucursales</a></li>
                </ul>
            </div>

            <!-- Columna 3: Catálogo -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-crosshair text-accent-primary'></i> Especialidades
                </h4>
                <ul class="flex flex-col gap-4">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-cyan transition-colors'></i> Armas Cortas y Largas</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-cyan transition-colors'></i> Municiones Varios Calibres</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-cyan transition-colors'></i> Equipo Táctico Profesional</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-cyan transition-colors'></i> Óptica y Miras de Precisión</a></li>
                </ul>
            </div>

            <!-- Columna 4: Horarios -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-time-five text-accent-primary'></i> Horario de Atención
                </h4>
                <div class="bg-tactical-800 p-6 rounded-2xl border border-white/5 relative overflow-hidden group hover:border-white/10 transition-colors">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="flex justify-between items-center text-sm mb-4 border-b border-white/5 pb-3">
                        <span class="text-gray-400 font-medium">Lunes - Viernes</span>
                        <span class="text-white font-mono font-bold tracking-wider text-xs bg-black/40 px-2 py-1 rounded">08:00 - 18:00</span>
                    </div>
                    <div class="flex justify-between items-center text-sm mb-6 border-b border-white/5 pb-3">
                        <span class="text-gray-400 font-medium">Sábado</span>
                        <span class="text-white font-mono font-bold tracking-wider text-xs bg-black/40 px-2 py-1 rounded">08:00 - 13:00</span>
                    </div>
                    
                    <div class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-green-500/10 border border-green-500/20 shadow-[0_0_10px_rgba(34,197,94,0.1)]">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse shadow-[0_0_8px_rgba(34,197,94,0.8)]"></span>
                        <span class="text-green-500 text-[10px] font-bold tracking-[0.15em] uppercase">Abierto Ahora</span>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Bottom Footer (Copyright y Develotech) - FIXED -->
        <div class="fixed bottom-0 left-0 w-full z-[100] bg-[#030406]/90 backdrop-blur-xl py-4 border-t border-white/5 shadow-[0_-10px_30px_rgba(0,0,0,0.8)]">
            <div class="max-w-[95%] mx-auto px-4 flex flex-col items-center justify-center text-center gap-1">
                <div class="text-gray-400 text-[9px] sm:text-[11px] font-mono tracking-[0.2em] uppercase leading-relaxed">
                    &copy; 2026 BALAM Armas y Municiones. Todos los derechos reservados. Guatemala, C.A.
                </div>
                
                <a href="https://develotechgt.com/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 group cursor-pointer">
                    <span class="text-accent-primary font-mono text-[10px]">&lt;/&gt;</span>
                    <span class="text-[9px] sm:text-[10px] font-black tracking-[0.25em] text-gray-500 group-hover:text-accent-primary transition-colors uppercase">
                        hecho por develotch
                    </span>
                </a>
            </div>
        </div>


    </footer>



    <!-- ==========================================
         MODALES Y LIGHTBOXES
         ========================================== -->
    
    <!-- 1. Modal Detallado de Productos (Catálogo) -->
    <div id="product-modal" class="fixed inset-0 z-[100] flex items-center justify-center pointer-events-none opacity-0 transition-opacity duration-500 p-4">
        <!-- Overlay oscuro desenfocado -->
        <div class="absolute inset-0 bg-tactical-900/90 backdrop-blur-xl" onclick="closeProductModal()"></div>
        
        <!-- Tarjeta Central del Modal -->
        <div id="product-modal-content" class="glass-card w-full max-w-4xl max-h-[90vh] overflow-y-auto overflow-x-hidden rounded-[2rem] border border-accent-cyan/30 shadow-[0_0_50px_rgba(0,240,255,0.15)] relative scale-95 opacity-0 transition-all duration-500 flex flex-col md:flex-row">
            
            <!-- Sección Izquierda: Imagen Grande + Galeria -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col items-center justify-center bg-[#05080c] relative group min-h-[400px] border-b md:border-b-0 md:border-r border-white/5">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,240,255,0.10)_0%,transparent_60%)]"></div>
                <!-- Botón Cerrar (Solo visible en Móvil sobre la imagen, en desktop pasa a la derecha) -->
                <button onclick="closeProductModal()" class="md:hidden absolute top-4 right-4 w-10 h-10 rounded-full bg-black/50 border border-white/10 flex items-center justify-center text-white hover:bg-accent-pink hover:border-accent-pink transition-all z-50 backdrop-blur-md">
                    <i class='bx bx-x text-2xl'></i>
                </button>

                <div class="relative w-full flex items-center justify-center flex-1">
                    <img id="modal-img" src="" class="max-w-full max-h-[380px] object-contain filter drop-shadow-[0_20px_20px_rgba(0,0,0,0.8)] relative z-10 transition-transform duration-500 group-hover:scale-110" alt="Vista del Producto">
                </div>

                <!-- Galería de Miniaturas (Dinámica) -->
                <div id="modal-thumbnails" class="flex flex-wrap justify-center gap-2 mt-6 relative z-20">
                    <!-- Inyectado por JS -->
                </div>
            </div>
            
            <!-- Sección Derecha: Características -->
            <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center bg-tactical-800/40 relative">
                <!-- Botón Cerrar Desktop -->
                <button onclick="closeProductModal()" class="hidden md:flex absolute top-6 right-6 w-10 h-10 rounded-xl bg-white/5 border border-white/10 items-center justify-center text-gray-400 hover:text-white hover:bg-red-500/20 hover:border-red-500/50 transition-all z-50">
                    <i class='bx bx-x text-2xl'></i>
                </button>

                <div class="flex flex-wrap gap-3 mb-4">
                    <span id="modal-category" class="text-[10px] text-accent-cyan border border-accent-cyan/30 bg-accent-cyan/10 px-3 py-1 rounded font-bold tracking-widest uppercase"></span>
                    <span id="modal-branch" class="text-[10px] text-gray-400 font-mono flex items-center border border-white/10 bg-white/5 px-3 py-1 rounded"></span>
                </div>
                
                <h3 id="modal-title" class="font-display text-3xl md:text-4xl font-black text-white mb-2 leading-tight pr-10"></h3>
                
                <p id="modal-desc" class="text-gray-400 text-sm mt-4 font-light leading-relaxed mb-8">
                </p>

                <div id="modal-specs" class="grid grid-cols-2 gap-y-6 gap-x-4 mb-10">
                    <!-- Dinámico desde JS: MARCA, MODELO, CALIBRE, ORIGEN -->
                </div>

                <div class="mb-8 border-t border-white/5 py-4">
                    <span class="text-xs text-gray-500 font-mono tracking-widest uppercase block mb-1">Inversión Táctica</span>
                    <!-- Precio oculto -->
                </div>
                
                <a id="modal-whatsapp" href="#" target="_blank" class="w-full bg-tactical-950 border border-[#25D366]/30 hover:bg-[#25D366]/10 text-[#25D366] hover:text-white py-4 rounded-xl font-bold tracking-widest transition-all hover:border-[#25D366] shadow-[0_0_15px_rgba(37,211,102,0.05)] hover:shadow-[0_0_25px_rgba(37,211,102,0.2)] flex items-center justify-center gap-3 hover:-translate-y-1">
                    <i class='bx bxl-whatsapp text-2xl'></i>
                    SOLICITAR DISPONIBILIDAD
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Simple Image Lightbox (Para el mapa de Sucursales) -->
    <div id="image-lightbox" class="fixed inset-0 z-[110] flex items-center justify-center pointer-events-none opacity-0 transition-opacity duration-300 p-4">
        <div class="absolute inset-0 bg-tactical-900/95 backdrop-blur-xl" onclick="closeLightbox()"></div>
        <div class="relative z-10 w-full max-w-4xl bg-tactical-900/40 border border-white/10 rounded-[2.5rem] overflow-hidden backdrop-blur-xl shadow-[0_0_100px_rgba(0,0,0,0.8)]">
            <div class="flex justify-between items-center px-8 py-6 border-b border-white/5">
                <h3 id="lightbox-title" class="font-display text-white text-xl font-bold uppercase tracking-widest"></h3>
                <button onclick="closeLightbox()" class="text-gray-400 hover:text-white transition-colors bg-white/5 w-10 h-10 rounded-full flex items-center justify-center border border-white/10"><i class='bx bx-x text-2xl'></i></button>
            </div>
            <div class="aspect-video w-full flex items-center justify-center bg-black/60 relative group">
                <!-- Scan line effect over the image -->
                <div class="absolute inset-0 bg-[linear-gradient(rgba(230,126,34,0.05)_1px,transparent_1px)] bg-[size:100%_4px] pointer-events-none opacity-30"></div>
                <img id="lightbox-img" src="" class="w-full h-full object-contain relative z-10">
            </div>
            <div class="px-8 py-4 bg-black/20 flex justify-center">
                <span class="text-[9px] font-mono text-[#e67e22] tracking-[0.3em] uppercase">Visualización de Activo Balam-01 // Operativo</span>
            </div>
        </div>
    </div>

    <!-- ============================================================
         BALAM – CURSOR TÁCTICO + EFECTO RIPPLE/DISTORSIÓN
         ============================================================ -->
    <!-- 1. DIVs del cursor -->
    <div id="hud-h" class="balam-cur"></div>
    <div id="hud-v" class="balam-cur"></div>
    <div id="s-rotate" class="balam-cur"></div>
    <div id="s-outer"  class="balam-cur"></div>
    <div id="s-gap"    class="balam-cur"></div>
    <div id="s-ping"   class="balam-cur"></div>
    <div id="s-dot"    class="balam-cur"></div>
    <div id="s-arm-t"  class="balam-cur"></div>
    <div id="s-arm-b"  class="balam-cur"></div>
    <div id="s-arm-l"  class="balam-cur"></div>
    <div id="s-arm-r"  class="balam-cur"></div>
    <div id="s-tl" class="balam-cur"><div class="balam-corner-tick"></div></div>
    <div id="s-tr" class="balam-cur"><div class="balam-corner-tick"></div></div>
    <div id="s-bl" class="balam-cur"><div class="balam-corner-tick"></div></div>
    <div id="s-br" class="balam-cur"><div class="balam-corner-tick"></div></div>

    <!-- Canvas para el efecto de distorsión/ondas -->
    <canvas id="balam-ripple-canvas"></canvas>

    <!-- 2. Los estilos y scripts fueron movidos a app.css y main.js respectivamente para mantener el orden -->
</body>
</html>
