<!DOCTYPE html>
<html lang="es" class="scroll-smooth scroll-pt-20 md:scroll-pt-20 border-none">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Balam Armería | Elite Tactical Gear</title>
    
    <!-- ==========================================
         RECURSOS CORE DEL SISTEMA (VITE)
         ========================================== -->
    <!-- Vite empaqueta TODO y lo hace local: Tailwind CSS v4, animaciones GSAP, íconos Boxicons, fuentes de Google (Space Grotesk e Inter) y Swiper.js. Nada dependerá de servidores externos. -->
    @vite(['resources/css/app.css', 'resources/js/main.js'])
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
                    <a href="#inicio" class="hover:text-accent-primary transition-colors hover-glow">Inicio</a>
                    <a href="#catalogo" class="hover:text-accent-primary transition-colors hover-glow">Catálogo</a>
                    <a href="#empresa" class="hover:text-accent-primary transition-colors hover-glow">Nosotros (Quiénes Somos)</a>
                    <a href="#contacto" class="hover:text-accent-primary transition-colors hover-glow">Ubicaciones</a>
                    <a href="#contacto-cards" class="hover:text-accent-primary transition-colors hover-glow">Contacto</a>
                </div>

                <a href="#contacto" class="hidden md:flex bg-white/5 hover:bg-white/10 px-5 py-2.5 rounded border border-white/10 text-white font-medium transition-colors items-center gap-2">
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
                        <h2 class="font-display text-4xl md:text-5xl font-bold text-white mb-2">Catálogo <span class="text-accent-cyan text-gradient-cyan">Global</span></h2>
                        <p class="text-gray-400 font-light">Escanéa toda la base de datos de las 3 agencias conectadas.</p>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 items-start relative">
                    <!-- Sidebar de Filtros (Izquierda) -->
                    <aside class="w-full lg:w-1/4 xl:w-1/5 shrink-0 glass-card rounded-2xl p-5 sticky top-28 mouse-glow z-20 lg:-mt-[22px]">
                        <div class="flex items-center gap-3 mb-6 pb-6 border-b border-white/5">
                                <i class='bx bx-radar text-2xl text-accent-cyan'></i>
                                <h3 class="font-display text-xl font-bold text-white">Consola Filtros</h3>
                            </div>
                            
                            <!-- Buscador Inteligente -->
                            <div class="mb-8 relative group">
                                <input type="text" id="filter-search" placeholder="Búsqueda táctica (Ej. Glock)..." class="w-full bg-tactical-800/50 border border-white/10 rounded-xl py-3 pl-11 pr-4 text-white text-sm focus:outline-none focus:border-accent-cyan/50 focus:ring-1 focus:ring-accent-cyan/50 transition-all font-mono placeholder:text-gray-500">
                                <i class='bx bx-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg group-focus-within:text-accent-cyan transition-colors'></i>
                            </div>
                            
                            <!-- Filtro Categorias -->
                            <div class="mb-8">
                                <h4 class="text-sm font-bold text-white tracking-wider mb-4 border-l-2 border-accent-cyan pl-2">Por Categoría</h4>
                                <ul class="space-y-3" id="filter-category">
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="cat" value="all" class="accent-accent-cyan w-4 h-4 cursor-pointer" checked>
                                            <span class="text-gray-300 group-hover:text-white">Ver Todo</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="cat" value="pistola" class="accent-accent-cyan w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Armas Cortas (Pistolas)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="cat" value="fusil" class="accent-accent-cyan w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Fusiles Automáticos</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="cat" value="sniper" class="accent-accent-cyan w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Precisión Táctica (Sniper)</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Filtro Sucursales -->
                            <div>
                                <h4 class="text-sm font-bold text-white tracking-wider mb-4 border-l-2 border-accent-pink pl-2">Por Sucursal (Nodo)</h4>
                                <ul class="space-y-3" id="filter-branch">
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="branch" value="all" class="accent-accent-pink w-4 h-4 cursor-pointer" checked>
                                            <span class="text-gray-300 group-hover:text-white">Todas las Sedes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="branch" value="poptun" class="accent-accent-pink w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Sede Poptún</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="branch" value="sanluis" class="accent-accent-pink w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Sede San Luis</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex items-center gap-3 cursor-pointer group hover:bg-white/5 p-1 rounded transition-colors">
                                            <input type="radio" name="branch" value="melchor" class="accent-accent-pink w-4 h-4 cursor-pointer">
                                            <span class="text-gray-300 group-hover:text-white">Sede Melchor de Mencos</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                    </aside>

                    <!-- Grilla de Productos (Derecha) -->
                    <main class="flex-1 w-full">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="product-grid">

                            @forelse($productos as $producto)
                                @php
                                    $imgUrl = (isset($producto['imagenes']) && count($producto['imagenes']) > 0) 
                                        ? rtrim(config('services.armeria.url'), '/') . '/storage/' . $producto['imagenes'][0] 
                                        : asset('images/logo.jpg');
                                    $catName = $producto['categoria'] ?? 'General';
                                    $branchName = $producto['sucursal'] ?? 'Multi-Sede';
                                @endphp
                                <div class="glass-card rounded-2xl p-2 flex flex-col mouse-glow product-item cursor-pointer group/card" 
                                     data-cat="{{ strtolower($catName) }}" 
                                     data-branch="{{ strtolower($branchName) }}" 
                                     onclick="openProductModal('{{ addslashes($producto['nombre']) }}', '{{ $imgUrl }}', '{{ addslashes($catName) }}', '{{ addslashes($branchName) }}', '{{ addslashes($producto['descripcion'] ?? '') }}', 'Hola, me interesa comprar {{ addslashes($producto['nombre']) }}')">
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
                                        <div class="text-accent-cyan font-bold text-sm mb-4">Q{{ number_format($producto['precio'], 2) }}</div>
                                        @endif
                                        
                                        <div class="mt-auto flex items-center justify-end">
                                            <a href="https://wa.me/50255556666?text={{ urlencode('Hola, me interesa comprar ' . $producto['nombre']) }}" onclick="event.stopPropagation();" target="_blank" class="w-10 h-10 rounded-[10px] btn-whatsapp flex items-center justify-center text-white shadow-lg" title="Preguntar por WhatsApp">
                                                <i class='bx bxl-whatsapp text-2xl'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-full text-center py-12 text-gray-500 font-mono text-sm border border-dashed border-gray-700 rounded-2xl bg-white/5 mt-6 mouse-glow">
                                    // ERROR_API: NO SE PUDO CONECTAR CON LA BASE DE DATOS GLOBAL O NO HAY INVENTARIO.
                                </div>
                            @endforelse

                        </div>
                        
                        <div id="no-products-msg" class="hidden text-center py-12 text-gray-500 font-mono text-sm border border-dashed border-gray-700 rounded-2xl bg-white/5 mt-6 mouse-glow">
                            // ERROR_404: NO HAY ARMAMENTO QUE COINCIDA CON LOS PARÁMETROS.
                        </div>

                    </main>
                </div>
            </div>
        </section>

        <!-- ==============================================
             1. VIDEOTECA TÁCTICA (VIDEOS)
        =================================================== -->
        <section class="py-28 relative z-10 overflow-hidden border-y border-white/10">
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
                <div class="flex flex-col md:flex-row justify-between items-end mb-14 gsap-reveal gs-fade-up relative">
                    <div class="relative">
                        <div class="absolute -left-6 top-2 bottom-2 w-1 bg-white/50 rounded-r-md"></div>
                        <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-2 tracking-tight drop-shadow-[0_0_20px_rgba(255,255,255,0.2)]">VIDEOTECA <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-100 to-gray-500">TÁCTICA</span></h2>
                        <p class="text-gray-400 font-mono text-sm tracking-widest uppercase">Reseñas en campo • Pruebas de polígono • Unboxing</p>
                    </div>
                    <a href="#" class="mt-6 md:mt-0 text-white bg-white/5 border border-white/20 px-8 py-3 rounded-xl text-xs uppercase tracking-[0.2em] font-bold hover:bg-white hover:text-black transition-all flex items-center gap-2 group/btn shadow-[0_4px_30px_rgba(0,0,0,0.5)] backdrop-blur-md">
                        Explorar Archivo <i class='bx bx-right-arrow-alt text-xl group-hover/btn:translate-x-1 transition-transform'></i>
                    </a>
                </div>

                <div class="swiper videoteca-slider w-full pb-10 mt-8">
                    <div class="swiper-wrapper">
                        <!-- Video 1 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer mouse-glow relative h-full bg-white/5 backdrop-blur-xl shadow-[0_8px_30px_rgba(0,0,0,0.5)] border border-white/10 hover:border-white/30 hover:shadow-[0_10px_40px_rgba(255,255,255,0.1)] transition-all duration-500">
                                <div class="aspect-video bg-black relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 to-transparent z-10 opacity-60"></div>
                                    <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-40 transition-all duration-700 pointer-events-none">
                                    <div class="absolute inset-0 flex items-center justify-center z-20">
                                        <div class="w-16 h-16 rounded-full bg-white/10 border border-white/30 text-white flex items-center justify-center backdrop-blur-md group-hover:bg-white group-hover:text-black group-hover:border-white transition-all transform group-hover:scale-110 shadow-[0_0_30px_rgba(255,255,255,0.1)] group-hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                                            <i class='bx bx-play text-4xl ml-1'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-white/5 bg-gradient-to-t from-white/5 to-transparent h-full relative z-20">
                                    <span class="inline-block px-2 py-1 bg-white/10 text-gray-300 rounded text-[10px] uppercase font-bold tracking-widest mb-3 border border-white/10 group-hover:bg-white group-hover:text-black transition-colors">Entrenamiento</span>
                                    <h4 class="font-display font-bold text-white text-xl mb-1 drop-shadow-md">Prueba de Fuego: Glock 19X</h4>
                                    <p class="text-xs text-gray-400 font-mono mt-2">10.5K Vistas • Base Táctica 01</p>
                                </div>
                            </div>
                        </div>
                        <!-- Video 2 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer mouse-glow relative h-full bg-white/5 backdrop-blur-xl shadow-[0_8px_30px_rgba(0,0,0,0.5)] border border-white/10 hover:border-white/30 hover:shadow-[0_10px_40px_rgba(255,255,255,0.1)] transition-all duration-500">
                                <div class="aspect-video bg-black relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 to-transparent z-10 opacity-60"></div>
                                    <img src="https://images.unsplash.com/photo-1584346851458-9635b7192ea6?q=80&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-40 transition-all duration-700 pointer-events-none">
                                    <div class="absolute inset-0 flex items-center justify-center z-20">
                                        <div class="w-16 h-16 rounded-full bg-white/10 border border-white/30 text-white flex items-center justify-center backdrop-blur-md group-hover:bg-white group-hover:text-black group-hover:border-white transition-all transform group-hover:scale-110 shadow-[0_0_30px_rgba(255,255,255,0.1)] group-hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                                            <i class='bx bx-play text-4xl ml-1'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-white/5 bg-gradient-to-t from-white/5 to-transparent h-full relative z-20">
                                    <span class="inline-block px-2 py-1 bg-white/10 text-gray-300 rounded text-[10px] uppercase font-bold tracking-widest mb-3 border border-white/10 group-hover:bg-white group-hover:text-black transition-colors">Review a Fondo</span>
                                    <h4 class="font-display font-bold text-white text-xl mb-1 drop-shadow-md">Review: SIG MCX Spear</h4>
                                    <p class="text-xs text-gray-400 font-mono mt-2">8.2K Vistas • Especial Fuerzas</p>
                                </div>
                            </div>
                        </div>
                        <!-- Video 3 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer mouse-glow relative h-full bg-white/5 backdrop-blur-xl shadow-[0_8px_30px_rgba(0,0,0,0.5)] border border-white/10 hover:border-white/30 hover:shadow-[0_10px_40px_rgba(255,255,255,0.1)] transition-all duration-500">
                                <div class="aspect-video bg-black relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 to-transparent z-10 opacity-60"></div>
                                    <img src="https://images.unsplash.com/photo-1552554747-0b1e3e7f9175?q=80&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-40 transition-all duration-700 pointer-events-none">
                                    <div class="absolute inset-0 flex items-center justify-center z-20">
                                        <div class="w-16 h-16 rounded-full bg-white/10 border border-white/30 text-white flex items-center justify-center backdrop-blur-md group-hover:bg-white group-hover:text-black group-hover:border-white transition-all transform group-hover:scale-110 shadow-[0_0_30px_rgba(255,255,255,0.1)] group-hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                                            <i class='bx bx-play text-4xl ml-1'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-white/5 bg-gradient-to-t from-white/5 to-transparent h-full relative z-20">
                                    <span class="inline-block px-2 py-1 bg-white/10 text-gray-300 rounded text-[10px] uppercase font-bold tracking-widest mb-3 border border-white/10 group-hover:bg-white group-hover:text-black transition-colors">Tácticas CQB</span>
                                    <h4 class="font-display font-bold text-white text-xl mb-1 drop-shadow-md">Movimiento con AR-15</h4>
                                    <p class="text-xs text-gray-400 font-mono mt-2">15.1K Vistas • Avanzado CQC</p>
                                </div>
                            </div>
                        </div>
                        <!-- Video 4 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-2xl overflow-hidden group cursor-pointer mouse-glow relative h-full bg-white/5 backdrop-blur-xl shadow-[0_8px_30px_rgba(0,0,0,0.5)] border border-white/10 hover:border-white/30 hover:shadow-[0_10px_40px_rgba(255,255,255,0.1)] transition-all duration-500">
                                <div class="aspect-video bg-black relative">
                                    <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 to-transparent z-10 opacity-60"></div>
                                    <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=600" class="w-full h-full object-cover opacity-60 group-hover:scale-105 group-hover:opacity-40 grayscale-[50%] transition-all duration-700 pointer-events-none">
                                    <div class="absolute inset-0 flex items-center justify-center z-20">
                                        <div class="w-16 h-16 rounded-full bg-white/10 border border-white/30 text-white flex items-center justify-center backdrop-blur-md group-hover:bg-white group-hover:text-black group-hover:border-white transition-all transform group-hover:scale-110 shadow-[0_0_30px_rgba(255,255,255,0.1)] group-hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                                            <i class='bx bx-play text-4xl ml-1'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 border-t border-white/5 bg-gradient-to-t from-white/5 to-transparent h-full relative z-20">
                                    <span class="inline-block px-2 py-1 bg-white/10 text-gray-300 rounded text-[10px] uppercase font-bold tracking-widest mb-3 border border-white/10 group-hover:bg-white group-hover:text-black transition-colors">Ópticas</span>
                                    <h4 class="font-display font-bold text-white text-xl mb-1 drop-shadow-md">Análisis Miras Holográficas</h4>
                                    <p class="text-xs text-gray-400 font-mono mt-2">22K Vistas • Laboratorio Pruebas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Botones de Navegación del Carrusel -->
                    <div class="swiper-button-prev videoteca-prev !text-white opacity-40 hover:opacity-100 scale-75 transition-all duration-300 drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] hover:scale-90 bg-black/40 hover:bg-white/10 rounded-full w-12 h-12 backdrop-blur-md border border-white/10 -ml-4 lg:-ml-6 shadow-[0_0_15px_rgba(0,0,0,0.5)]"></div>
                    <div class="swiper-button-next videoteca-next !text-white opacity-40 hover:opacity-100 scale-75 transition-all duration-300 drop-shadow-[0_0_10px_rgba(255,255,255,0.8)] hover:scale-90 bg-black/40 hover:bg-white/10 rounded-full w-12 h-12 backdrop-blur-md border border-white/10 -mr-4 lg:-mr-6 shadow-[0_0_15px_rgba(0,0,0,0.5)]"></div>

                    <!-- Paginación (Puntos) -->
                    <div class="swiper-pagination videoteca-pagination !bottom-0 mt-8"></div>
                </div>
            </div>
        </section>

        <!-- ==============================================
             2. ARSENAL DESTACADO (MÁS VENDIDOS)
        =================================================== -->
        <section class="py-24 bg-tactical-950 relative z-10 overflow-hidden border-t border-white/5">
            <!-- Efectos de luz difusa y scanlines -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 pointer-events-none"></div>
            <div class="absolute -top-40 -left-40 w-[600px] h-[600px] bg-accent-cyan/10 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
            <div class="absolute top-1/2 right-0 w-1/3 h-[2px] bg-accent-cyan/20 blur-sm pointer-events-none"></div>

            <div class="max-w-[90rem] mx-auto px-6 relative z-20">
                <div class="flex flex-col items-center text-center mb-16 gsap-reveal gs-fade-up">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-accent-cyan/10 border border-accent-cyan/30 rounded-full text-accent-cyan font-mono text-xs uppercase tracking-[0.2em] mb-4">
                        <i class='bx bxs-star'></i> Los Más Codiciados
                    </div>
                    <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-4 tracking-tighter uppercase">Arsenal <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-cyan to-blue-500">Destacado</span></h2>
                    <p class="text-gray-300 max-w-2xl text-base md:text-lg font-light leading-relaxed">
                        Conoce el equipamiento que marca la diferencia. Presentamos <strong class="text-white">los preferidos por nuestros clientes</strong>: plataformas de combate comprobadas y desplegadas por los operativos más exigentes.
                    </p>
                </div>

                <div class="swiper arsenal-slider w-full pb-10">
                    <div class="swiper-wrapper">
                        <!-- Card 1 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-accent-cyan/30 transition-colors h-full">
                                <div class="absolute -top-3 -right-2 bg-gradient-to-br from-yellow-400 to-yellow-600 text-black text-[10px] font-black px-3 py-1 rounded border border-yellow-300 shadow-[0_0_15px_rgba(250,204,21,0.4)] z-30 uppercase tracking-widest transform rotate-3 group-hover/card:rotate-0 transition-transform">BEST SELLER</div>
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('images/glock1.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="Glock">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-accent-cyan transition-colors">Glock 19 Gen 5</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Las armas cortas más vendidas del mercado actual.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-accent-cyan text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-gray-400/30 transition-colors h-full">
                                <div class="absolute -top-3 -right-2 bg-gradient-to-br from-gray-300 to-gray-500 text-black text-[10px] font-black px-3 py-1 rounded border border-gray-200 shadow-[0_0_15px_rgba(156,163,175,0.4)] z-30 uppercase tracking-widest transform rotate-[-3deg] group-hover/card:rotate-0 transition-transform">Popular</div>
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <img src="{{ asset('images/ar15.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="M4">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-gray-300 transition-colors">Fusil Táctico M4A1</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Confiabilidad extrema en sistemas de asalto urbano.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-gray-400 text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-[#cd7f32]/40 transition-colors h-full">
                                <div class="absolute -top-3 -right-2 bg-gradient-to-br from-[#cd7f32] to-[#8b5a2b] text-white text-[10px] font-black px-3 py-1 rounded border border-[#cd7f32] shadow-[0_0_15px_rgba(205,127,50,0.4)] z-30 uppercase tracking-widest transform rotate-[2deg] group-hover/card:rotate-0 transition-transform">Favorito</div>
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <img src="{{ asset('images/sniper2.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="Remington">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-[#cd7f32] transition-colors">Remington 700 SPS</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Precisión letal para cacería y tiradores deportivos.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-[#cd7f32] text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-red-500/30 transition-colors h-full">
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <div class="absolute inset-0 bg-red-500/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('images/smg.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="CZ Scorpion">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-red-400 transition-colors">CZ Scorpion EVO3</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Plataforma PCC ultraligera asombrosamente precisa.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-red-500 text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 (Nuevo) -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-accent-pink/30 transition-colors h-full">
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <div class="absolute inset-0 bg-accent-pink/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('images/shootgun.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="Mossberg">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-accent-pink transition-colors">Mossberg 590 Tact</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Escopeta de bombeo legendaria, protección total del hogar.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-accent-pink text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 (Test Corrimiento) -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-red-500/30 transition-colors h-full">
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <div class="absolute inset-0 bg-red-500/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('images/smg.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="CZ Scorpion">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-red-400 transition-colors">Micro Roni Gen 4</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Conversión ideal para plataformas de armas cortas.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-red-500 text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 7 (Test Corrimiento) -->
                        <div class="swiper-slide pt-4 pb-4">
                            <div class="glass-card rounded-[1.5rem] p-2 flex flex-col mouse-glow cursor-crosshair group/card relative border border-white/5 hover:border-accent-cyan/30 transition-colors h-full">
                                <div class="bg-gradient-to-b from-black/60 to-black/20 rounded-[1.2rem] h-48 flex items-center justify-center p-4 relative overflow-hidden group border border-white/5">
                                    <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover/card:opacity-100 transition-opacity"></div>
                                    <img src="{{ asset('images/glock1.png') }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_25px_25px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700 relative z-10" alt="Glock">
                                </div>
                                <div class="p-5 flex flex-col flex-1">
                                    <h4 class="font-display text-lg font-bold text-white mb-2 group-hover/card:text-accent-cyan transition-colors">Colt 1911 .45 ACP</h4>
                                    <p class="text-[11px] text-gray-400 font-mono mb-4 leading-relaxed">Poder de detención absoluto y confiabilidad clásica.</p>
                                    <div class="mt-auto flex items-center justify-end border-t border-white/5 pt-3">
                                        <i class='bx bx-plus-circle text-accent-cyan text-xl opacity-50 group-hover/card:opacity-100'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Item Ingreso 1 -->
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col sm:flex-row gap-8 items-center border border-white/5 bg-black/40 hover:bg-black/60 hover:border-accent-pink/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.8)]">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-red-600 to-accent-pink w-[85%] shadow-[0_0_15px_#ff2a55]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-pink text-[10px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-pink animate-ping"></span> 85% Tránsito
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full md:w-40 xl:w-48 h-32 md:h-full bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-sm group-hover/inc:backdrop-blur-[1px] transition-all">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-pink/50 group-hover/inc:shadow-[0_0_20px_rgba(255,42,85,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-pink'></i>
                                </div>
                            </div>
                            <img src="{{ asset('images/ar15.png') }}" class="h-full w-full object-contain filter drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)] opacity-30 group-hover/inc:opacity-50 contrast-125 grayscale group-hover/inc:grayscale-0 transition-all duration-700" alt="Próximo">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center sm:text-left py-4">
                            <div class="inline-flex items-center gap-1.5 text-[10px] text-gray-400 border border-white/10 bg-white/5 px-3 py-1 rounded-full font-bold tracking-widest uppercase mb-4">
                                <i class='bx bx-ship'></i> Lote ETA: 10 Días
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-pink transition-colors leading-none tracking-tight">IWI Tavor X95</h4>
                            <p class="text-sm text-gray-400 font-light mb-6 leading-relaxed">El futuro del combate CQC. Diseño Bullpup ultracompacto para Operadores de Fuerzas Especiales.</p>
                            <button class="bg-white/10 text-white font-bold uppercase tracking-[0.15em] py-3 px-8 rounded-xl hover:bg-accent-pink hover:text-white transition-all border border-white/20 hover:border-transparent hover:shadow-[0_0_20px_rgba(255,42,85,0.4)] w-full sm:w-auto text-xs">
                                Pre-ordenar Cupo
                            </button>
                        </div>
                    </div>
                    
                    <!-- Item Ingreso 2 -->
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col sm:flex-row gap-8 items-center border border-white/5 bg-black/40 hover:bg-black/60 hover:border-accent-cyan/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.8)]">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-blue-600 to-accent-cyan w-[40%] shadow-[0_0_15px_#00e5ff]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-cyan text-[10px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan animate-ping"></span> 40% Tránsito
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full md:w-40 xl:w-48 h-32 md:h-full bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-sm group-hover/inc:backdrop-blur-[1px] transition-all">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-cyan/50 group-hover/inc:shadow-[0_0_20px_rgba(0,229,255,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-cyan'></i>
                                </div>
                            </div>
                            <img src="{{ asset('images/sniper2.png') }}" class="h-full w-full object-contain filter drop-shadow-[0_10px_10px_rgba(0,0,0,0.5)] opacity-30 group-hover/inc:opacity-50 contrast-125 grayscale group-hover/inc:grayscale-0 transition-all duration-700" alt="Próximo">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center sm:text-left py-4">
                            <div class="inline-flex items-center gap-1.5 text-[10px] text-gray-400 border border-white/10 bg-white/5 px-3 py-1 rounded-full font-bold tracking-widest uppercase mb-4">
                                <i class='bx bx-plane-alt'></i> Lote ETA: 28 Días
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-cyan transition-colors leading-none tracking-tight">Barrett M82A1</h4>
                            <p class="text-sm text-gray-400 font-light mb-6 leading-relaxed">Poder de demolición anti-material. El rifle .50 BMG de francotirador pesado estándar a nivel global.</p>
                            <button class="bg-white/10 text-white font-bold uppercase tracking-[0.15em] py-3 px-8 rounded-xl hover:bg-accent-cyan hover:text-black transition-all border border-white/20 hover:border-transparent hover:shadow-[0_0_20px_rgba(0,229,255,0.4)] w-full sm:w-auto text-xs">
                                Apartar Sistema
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        <!-- Empresa: Quienes Somos (Rediseño Moderno) -->
        <section id="empresa" class="relative min-h-[90vh] flex flex-col items-center justify-center bg-tactical-900 overflow-hidden">
            <!-- Background Image con Overlay Cinematográfico -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-30 grayscale contrast-125">
                <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 via-tactical-900/40 to-tactical-900"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,240,255,0.05)_0%,transparent_70%)]"></div>
            </div>

            <!-- Contenido Central -->
            <div class="relative z-10 max-w-5xl mx-auto px-6 text-center gsap-reveal gs-fade-up">
                <span class="text-accent-cyan font-bold tracking-[0.5em] uppercase text-[10px] md:text-sm mb-6 block border-b border-white/10 pb-4 w-max mx-auto">Trayectoria y Confianza</span>
                <h2 class="font-display text-4xl md:text-7xl font-black text-white mb-8 leading-[1] uppercase tracking-tighter drop-shadow-[0_15px_30px_rgba(0,0,0,0.5)]">
                    DÉCADAS DE <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-100 to-cyan-400">EXCELENCIA</span> <br> NOS RESPALDAN
                </h2>
                <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light mb-12">
                    Somos líderes en la distribución de armamento de alta gama, brindando asesoría especializada a deportistas de élite, cazadores y expertos en seguridad.
                </p>

                <!-- Tarjeta de Marcas (Estilo Excel Example) -->
                <div class="glass-card rounded-[2rem] p-8 md:p-12 border border-white/10 shadow-[0_40px_100px_rgba(0,0,0,0.6)] mt-8 mouse-glow relative overflow-hidden group">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-cyan-500/10 blur-[80px] rounded-full group-hover:bg-cyan-500/20 transition-all"></div>
                    
                    <h4 class="text-xs font-bold text-gray-500 tracking-[0.4em] uppercase mb-10 border-b border-white/5 pb-4">Nuestras Marcas Aliadas</h4>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-12 gap-y-16 items-center">
                        <!-- Brand 1: Glock (Simulated Logo) -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <span class="text-2xl md:text-3xl font-black text-white tracking-tighter border-2 border-white px-2 leading-none mb-2">GLOCK</span>
                            <span class="text-[8px] text-cyan-400 font-mono tracking-widest uppercase">Perfection</span>
                        </div>
                        
                        <!-- Brand 2: Beretta -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                             <div class="flex items-center gap-1 mb-2">
                                <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
                                <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
                             </div>
                            <span class="text-xl md:text-2xl font-display font-bold text-white tracking-widest uppercase italic">BERETTA</span>
                        </div>

                        <!-- Brand 3: Sig Sauer -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <span class="text-2xl md:text-3xl font-display font-bold text-white tracking-tight uppercase">SIG<span class="text-cyan-500">SAUER</span></span>
                        </div>

                        <!-- Brand 4: CZ -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <div class="w-10 h-10 border-2 border-white rounded-full flex items-center justify-center mb-2">
                                <span class="text-lg font-bold">CZ</span>
                            </div>
                            <span class="text-[9px] text-gray-400 font-mono tracking-widest uppercase">Ceska Zbrojovka</span>
                        </div>

                        <!-- Brand 5: Smith & Wesson -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <span class="text-xl md:text-2xl font-serif font-black text-white italic">S&W</span>
                            <span class="text-[8px] text-gray-500 font-mono tracking-tighter uppercase">Smith & Wesson</span>
                        </div>

                        <!-- Brand 6: Ruger -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                             <div class="w-12 h-6 bg-red-600 rounded flex items-center justify-center mb-2">
                                <i class='bx bxs-bolt text-white'></i>
                             </div>
                            <span class="text-xl font-black text-white uppercase tracking-tighter">RUGER</span>
                        </div>

                        <!-- Brand 7: Colt -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <i class='bx bxs-chess text-3xl text-white mb-1'></i>
                            <span class="text-xl font-bold text-white uppercase italic tracking-widest">COLT</span>
                        </div>

                        <!-- Brand 8: Taurus -->
                        <div class="flex flex-col items-center group/brand opacity-60 hover:opacity-100 transition-all cursor-crosshair">
                            <span class="text-2xl font-display font-black text-white tracking-widest uppercase">TAURUS</span>
                            <span class="text-[8px] text-gray-500 font-mono tracking-widest uppercase">Since 1939</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Red de Sedes y Contacto (Mapas Integrados) -->
        <section id="contacto" class="py-10 bg-tactical-950 relative z-10 overflow-hidden border-t border-white/5">
            <!-- Fondo Cristalizado Moderno -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542281286-9e0a16bb7366?q=80&w=1920&auto=format&fit=crop')] bg-cover bg-fixed bg-center opacity-10 pointer-events-none"></div>
            <div class="absolute top-[-20%] right-[-10%] w-[600px] h-[600px] bg-accent-cyan/15 rounded-full blur-[150px] animate-pulse pointer-events-none" style="animation-duration: 10s;"></div>
            <div class="absolute bottom-[-20%] left-[-10%] w-[600px] h-[600px] bg-accent-pink/10 rounded-full blur-[150px] animate-pulse pointer-events-none" style="animation-duration: 8s;"></div>
            <div class="absolute inset-0 backdrop-blur-[100px] pointer-events-none"></div>

            <div class="max-w-[95%] mx-auto px-4 z-10 relative">
                <div class="mb-8 gsap-reveal gs-slide-right max-w-2xl px-4">
                    <span class="text-accent-cyan font-bold tracking-widest text-[10px] uppercase badge-glow">Presencia Regional</span>
                    <h2 class="font-display text-4xl font-bold text-white mt-2 drop-shadow-[0_0_15px_rgba(0,240,255,0.4)]">Nuestras Sucursales</h2>
                    <p class="text-gray-300 text-sm mt-2 font-light leading-relaxed">
                        <span class="text-accent-cyan font-bold">Visítanos y equípate.</span> Estamos siempre listos para ti.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    <!-- Tarjetas de sucursales -->
                    <div class="lg:col-span-4 flex flex-col gap-4 max-h-[75vh] pr-2 overflow-y-auto custom-scrollbar lg:ml-auto">
                        
                        <!-- Sede Poptún -->
                        <div class="glass-card p-6 rounded-[2rem] border border-white/5 group cursor-pointer mouse-glow bg-tactical-800/40 hover:bg-tactical-800/80 transition-all hover:border-accent-cyan/40 max-w-[440px]" onclick="showLocation('16.3314,-89.4183')">
                            <div class="flex items-start gap-6">
                                <div class="w-32 h-32 rounded-2xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-cyan/30 transition-colors shadow-2xl relative mb-4">
                                    <img src="{{ asset('images/sucursales/poptun.png') }}" class="w-full h-full object-cover transition-all scale-110 group-hover:scale-100" id="img-poptun" alt="Poptun Shop">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <i class='bx bx-search-alt text-white text-3xl'></i>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between py-1 flex-1">
                                    <div>
                                        <h5 class="font-display text-xl font-bold text-white group-hover:text-accent-cyan transition-colors">Sede Poptún</h5>
                                        <p class="text-gray-400 text-[10px] font-mono uppercase tracking-tighter mt-1">Barrio El Centro, Petén</p>
                                        <div class="mt-2 flex items-center gap-2 text-[9px] text-accent-cyan font-bold tracking-widest">
                                            <span class="w-2 h-2 rounded-full bg-accent-cyan animate-pulse"></span> OPERATIVA
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        <a href="https://www.google.com/maps/search/?api=1&query=16.3314,-89.4183" target="_blank" onclick="event.stopPropagation();" class="bg-accent-cyan/10 hover:bg-accent-cyan text-accent-cyan hover:text-tactical-900 border border-accent-cyan/20 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-navigation text-sm'></i> MAPS
                                        </a>
                                        <button onclick="event.stopPropagation(); openLightbox('{{ asset('images/sucursales/poptun.png') }}', 'Sede Poptún')" class="bg-white/5 hover:bg-white/20 text-white border border-white/10 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-image text-sm'></i> VER FOTO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede San Luis -->
                        <div class="glass-card p-6 rounded-[2rem] border border-white/5 group cursor-pointer mouse-glow bg-tactical-800/40 hover:bg-tactical-800/80 transition-all hover:border-accent-cyan/40 max-w-[440px]" onclick="showLocation('16.1956,-89.4442')">
                            <div class="flex items-start gap-6">
                                <div class="w-32 h-32 rounded-2xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-cyan/30 transition-colors shadow-2xl relative mb-4">
                                    <img src="https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover transition-all scale-110 group-hover:scale-100" id="img-sanluis" alt="San Luis Shop">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <i class='bx bx-search-alt text-white text-3xl'></i>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between py-1 flex-1">
                                    <div>
                                        <h5 class="font-display text-xl font-bold text-white group-hover:text-accent-cyan transition-colors">Sede San Luis</h5>
                                        <p class="text-gray-400 text-[10px] font-mono uppercase tracking-tighter mt-1">Calle Principal, Petén</p>
                                        <div class="mt-2 flex items-center gap-2 text-[9px] text-accent-cyan font-bold tracking-widest">
                                            <span class="w-2 h-2 rounded-full bg-accent-cyan animate-pulse"></span> OPERATIVA
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        <a href="https://www.google.com/maps/search/?api=1&query=16.1956,-89.4442" target="_blank" onclick="event.stopPropagation();" class="bg-accent-cyan/10 hover:bg-accent-cyan text-accent-cyan hover:text-tactical-900 border border-accent-cyan/20 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-navigation text-sm'></i> MAPS
                                        </a>
                                        <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=1200', 'Sede San Luis')" class="bg-white/5 hover:bg-white/20 text-white border border-white/10 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-image text-sm'></i> VER FOTO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede Melchor de Mencos -->
                        <div class="glass-card p-6 rounded-[2rem] border border-white/5 group cursor-pointer mouse-glow bg-tactical-800/40 hover:bg-tactical-800/80 transition-all hover:border-accent-cyan/40 max-w-[440px]" onclick="showLocation('17.0628,-89.1558')">
                            <div class="flex items-start gap-6">
                                <div class="w-32 h-32 rounded-2xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-cyan/30 transition-colors shadow-2xl relative mb-4">
                                    <img src="https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover transition-all scale-110 group-hover:scale-100" id="img-melchor" alt="Melchor Shop">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <i class='bx bx-search-alt text-white text-3xl'></i>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between py-1 flex-1">
                                    <div>
                                        <h5 class="font-display text-xl font-bold text-white group-hover:text-accent-cyan transition-colors">Sede Melchor</h5>
                                        <p class="text-gray-400 text-[10px] font-mono uppercase tracking-tighter mt-1">Frontera, Melchor de Mencos</p>
                                        <div class="mt-2 flex items-center gap-2 text-[9px] text-accent-pink font-bold tracking-widest">
                                            <span class="w-2 h-2 rounded-full bg-accent-pink animate-pulse"></span> ESTRATÉGICO
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap gap-2 mt-4">
                                        <a href="https://www.google.com/maps/search/?api=1&query=17.0628,-89.1558" target="_blank" onclick="event.stopPropagation();" class="bg-accent-cyan/10 hover:bg-accent-cyan text-accent-cyan hover:text-tactical-900 border border-accent-cyan/20 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-navigation text-sm'></i> MAPS
                                        </a>
                                        <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=1200', 'Sede Melchor de Mencos')" class="bg-white/5 hover:bg-white/20 text-white border border-white/10 px-3 py-2 text-[9px] font-black uppercase rounded-lg flex items-center gap-1 transition-all">
                                            <i class='bx bx-image text-sm'></i> VER FOTO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Contenedor Mapa -->
                    <div class="lg:col-span-8 bg-[#0a0f18] rounded-[2.5rem] overflow-hidden border border-white/5 relative h-[400px] lg:h-[500px] gsap-reveal gs-fade-up shadow-[0_0_35px_rgba(0,0,0,0.9)] sticky top-24">
                        <div id="map-msg" class="absolute inset-0 flex flex-col items-center justify-center bg-tactical-900/90 backdrop-blur-md z-10 transition-opacity duration-300 pointer-events-none">
                            <i class='bx bx-radar text-8xl text-accent-cyan animate-spin mb-4' style="animation-duration: 3s; filter: drop-shadow(0 0 10px rgba(0,240,255,0.8));"></i>
                            <p class="font-display text-white tracking-widest text-2xl">SISTEMA SATELITAL PREPARADO</p>
                            <p class="text-sm text-gray-400 mt-2 font-mono" id="map-status-sub">SELECCIONA UNA SUCURSAL DE LA IZQUIERDA PARA VISUALIZAR.</p>
                        </div>
                        <iframe id="google-map-iframe" width="100%" height="100%" class="absolute inset-0 transition-all duration-1000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15444.60639918237!2d-89.4183!3d16.3314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTbCsDE5JzUzLjAiTiA4OcKwMjUnMDUuOSJX!5e0!3m2!1sen!2sgt!4v1680000000000!5m2!1sen!2sgt"></iframe>
                    </div>
                </div>
            </div>

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
    <footer class="bg-[#05080c] pt-20 pb-20 relative z-10 border-t border-accent-primary/20">
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
                    <li><a href="#" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Inicio</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nuestro Catálogo</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nosotros (Academia)</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-accent-primary text-sm flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Sucursales</a></li>
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

        <!-- Legal Disclaimer Bar -->
        <div class="bg-accent-primary text-tactical-900 py-3 px-4 relative z-20 mb-16 md:mb-12">
            <p class="text-[9px] sm:text-[10px] font-bold uppercase tracking-widest flex items-center justify-center gap-2 max-w-[95%] mx-auto text-center opacity-80">
                <i class='bx bx-error-circle text-sm sm:text-base hidden sm:block'></i>
                <span>Aviso legal: La comercialización y venta de armas y municiones están estrictamente reguladas de acuerdo a la ley de armas y municiones en Guatemala y supervisadas por DIGECAM.</span>
            </p>
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
            
            <!-- Sección Izquierda: Imagen Grande -->
            <div class="w-full md:w-1/2 p-10 flex items-center justify-center bg-[#05080c] relative group min-h-[300px] border-b md:border-b-0 md:border-r border-white/5">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,240,255,0.10)_0%,transparent_60%)]"></div>
                <!-- Botón Cerrar (Solo visible en Móvil sobre la imagen, en desktop pasa a la derecha) -->
                <button onclick="closeProductModal()" class="md:hidden absolute top-4 right-4 w-10 h-10 rounded-full bg-black/50 border border-white/10 flex items-center justify-center text-white hover:bg-accent-pink hover:border-accent-pink transition-all z-50 backdrop-blur-md">
                    <i class='bx bx-x text-2xl'></i>
                </button>
                <img id="modal-img" src="" class="max-w-full max-h-[350px] object-contain filter drop-shadow-[0_20px_20px_rgba(0,0,0,0.8)] relative z-10 transition-transform duration-500 group-hover:scale-110" alt="Vista del Producto">
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

                <div class="mb-8 border-t border-b border-white/5 py-4">
                    <span class="text-xs text-gray-500 font-mono tracking-widest uppercase block mb-1">Inversión Táctica</span>
                    <!-- Eliminado el precio -->
                </div>
                
                <a id="modal-whatsapp" href="#" target="_blank" class="w-full bg-tactical-950 border border-[#25D366]/30 hover:bg-[#25D366]/10 text-[#25D366] hover:text-white py-4 rounded-xl font-bold tracking-widest transition-all hover:border-[#25D366] shadow-[0_0_15px_rgba(37,211,102,0.05)] hover:shadow-[0_0_25px_rgba(37,211,102,0.2)] flex items-center justify-center gap-3 hover:-translate-y-1">
                    <i class='bx bxl-whatsapp text-2xl'></i>
                    SOLICITAR DISPONIBILIDAD
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Simple Image Lightbox (Para el mapa de Sucursales) -->
    <div id="image-lightbox" class="fixed inset-0 z-[110] flex items-center justify-center pointer-events-none opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-tactical-900/95 backdrop-blur-md" onclick="closeLightbox()"></div>
        <div class="relative z-10 w-[90%] max-w-5xl flex flex-col items-center">
            <div class="flex justify-between items-center w-full mb-4">
                <h3 id="lightbox-title" class="font-display text-white text-xl md:text-2xl font-bold uppercase tracking-widest"></h3>
                <button onclick="closeLightbox()" class="text-gray-400 hover:text-white transition-colors bg-white/5 w-10 h-10 rounded-full flex items-center justify-center"><i class='bx bx-x text-2xl'></i></button>
            </div>
            <img id="lightbox-img" src="" class="max-w-full max-h-[75vh] object-contain rounded-xl border border-white/10 shadow-[0_0_40px_rgba(0,0,0,0.8)]">
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
