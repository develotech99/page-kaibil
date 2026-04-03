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
    <script>
        window.categoriesData = @json($menuCategorias);
    </script>

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

        /* ============================================
           RESPONSIVE: CAROUSEL HERO SECTION
           ============================================ */

        /* --- MÓVIL (< 640px) --- */
        @media (max-width: 639px) {
            /* Carrusel: altura fija pequeña */
            .assembly-slider { height: 260px !important; }
            .swiper-slide > div[style*="height:560px"],
            .swiper-slide > div[style*="560px"] { height: 260px !important; }

            /* Imagen recorte solo en móvil: full width */
            .assembly-wrapper { width: 100% !important; }

            /* Título y card: posición relativa apilada verticalmente */
            .assembly-title {
                position: absolute !important;
                top: 10px !important;
                right: 8px !important;
                width: 55% !important;
                z-index: 50 !important;
            }
            .assembly-title h2 { font-size: 1.1rem !important; line-height: 1.1 !important; }

            .assembly-card {
                position: absolute !important;
                bottom: 6px !important;
                right: 6px !important;
                width: 58% !important;
                padding: 8px 10px !important;
                font-size: 9px !important;
            }
            .assembly-card h4 { font-size: 7px !important; margin-bottom: 6px !important; }
            .assembly-card ul { gap: 5px !important; font-size: 9px !important; }
            .assembly-card li { padding-bottom: 4px !important; }

            /* Botones de navegación del swiper */
            .swiper-button-prev, .swiper-button-next { display: none !important; }

            /* Hero left panel: center en móvil */
            #inicio > div > div:first-child { padding-left: 1rem !important; padding-right: 1rem !important; text-align: center; }
            #inicio > div > div:first-child .flex.flex-wrap { justify-content: center; }

            /* Logo hero */
            .cyber-logo-container.w-36 { width: 80px !important; height: 80px !important; }
            h2.font-display.text-6xl { font-size: 2.8rem !important; }
            h1.font-display.text-3xl { font-size: 1.6rem !important; }
            #inicio p.text-gray-400 { font-size: 0.875rem !important; }

            /* Contenedor hero flex → column */
            #inicio .max-w-\[95\%\] { gap: 1rem !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 260px !important; }
        }

        /* --- TABLET (640px – 767px) --- */
        @media (min-width: 640px) and (max-width: 767px) {
            .assembly-slider { height: 320px !important; }
            .swiper-slide > div[style*="560px"] { height: 320px !important; }
            .assembly-wrapper { width: 60% !important; }
            .assembly-title { top: 12% !important; right: 4% !important; width: 42% !important; }
            .assembly-title h2 { font-size: 1.4rem !important; }
            .assembly-card { bottom: 8% !important; right: 3% !important; width: 45% !important; padding: 10px 12px !important; }
            .assembly-card h4 { font-size: 8px !important; }
            .assembly-card ul { font-size: 10px !important; gap: 6px !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 320px !important; }
        }

        /* --- TABLET GRANDE / iPad (768px – 1023px) --- */
        @media (min-width: 768px) and (max-width: 1023px) {
            .assembly-slider { height: 380px !important; }
            .swiper-slide > div[style*="560px"] { height: 380px !important; }
            .assembly-wrapper { width: 62% !important; }
            .assembly-title { top: 15% !important; right: 4% !important; width: 40% !important; }
            .assembly-title h2 { font-size: 1.7rem !important; }
            .assembly-card { bottom: 9% !important; right: 3% !important; width: 44% !important; padding: 12px 14px !important; }
            .assembly-card h4 { font-size: 8px !important; }
            .assembly-card ul { font-size: 10px !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 380px !important; }
        }

        /* --- LAPTOP (1024px – 1279px) --- */
        @media (min-width: 1024px) and (max-width: 1279px) {
            .assembly-slider { height: 460px !important; }
            .swiper-slide > div[style*="560px"] { height: 460px !important; }
            .assembly-title { top: 16% !important; right: 4% !important; width: 37% !important; }
            .assembly-title h2 { font-size: 2rem !important; }
            .assembly-card { bottom: 9% !important; right: 3% !important; width: 41% !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 460px !important; }
        }

        /* --- DESKTOP (1280px – 1535px) --- */
        @media (min-width: 1280px) and (max-width: 1535px) {
            .assembly-slider { height: 520px !important; }
            .swiper-slide > div[style*="560px"] { height: 520px !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 520px !important; }
        }

        /* --- WIDE (>=1536px) --- */
        @media (min-width: 1536px) {
            .assembly-slider { height: 620px !important; }
            .swiper-slide > div[style*="560px"] { height: 620px !important; }
            #inicio .w-full.xl\:w-7\/12 { height: 620px !important; }
            .assembly-title h2 { font-size: 3.5rem !important; }
            .assembly-card { width: 38% !important; padding: 22px 26px !important; }
        }

        /* ============================================
           RESPONSIVE: NAVBAR MOBILE MENU
           ============================================ */
        @media (max-width: 767px) {
            /* Navbar responsive: ocultar links de escritorio, mostrar hamburguesa */
            #mobile-menu-btn { display: flex !important; }
            #mobile-nav { transition: all 0.3s ease; }
        }

        /* ============================================
           RESPONSIVE: CATÁLOGO Y FILTROS
           ============================================ */
        @media (max-width: 767px) {
            /* Filtro lateral → colapso */
            #catalogo .flex.gap-6, #catalogo .flex.gap-8 { flex-direction: column !important; }
            #filter-sidebar { width: 100% !important; max-width: 100% !important; }
        }

        /* ============================================
           RESPONSIVE: TIPOGRAFÍA GENERAL
           ============================================ */
        @media (max-width: 639px) {
            h1 { font-size: 1.5rem !important; }
            h2 { font-size: 1.25rem !important; }
            .font-display.text-6xl { font-size: 2.5rem !important; }
        }

        /* ============================================
           NAVBAR LINKS — HOVER + ACTIVE STATE
           ============================================ */
        .nav-link {
            position: relative;
            color: #9ca3af;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: .03em;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2px;
            background: #00f0ff;
            border-radius: 2px;
            transition: transform 0.25s ease, opacity 0.25s ease;
            opacity: 0;
        }
        .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .nav-link:hover::after {
            transform: translateX(-50%) scaleX(1);
            opacity: 0.7;
        }
        .nav-link.nav-active {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .nav-link.nav-active::after {
            transform: translateX(-50%) scaleX(1);
            opacity: 1;
            background: #00f0ff;
            box-shadow: 0 0 8px rgba(0,240,255,0.6);
        }
        /* Mobile nav active */
        .mob-nav-link { color: #9ca3af; }
        .mob-nav-link.nav-active { color: #fff; background: rgba(0,240,255,0.05); }
        .mob-nav-link.nav-active .mob-dot { background: #00f0ff; box-shadow: 0 0 6px #00f0ff; }
        .mob-nav-link:hover { color: #e5e7eb; background: rgba(255,255,255,0.04); }
    </style>

    <script>
        /* IntersectionObserver — detecta sección activa y marca nav */
        document.addEventListener('DOMContentLoaded', function () {
            const sectionMap = {
                'inicio':         ['nav-inicio',       'mnav-inicio'],
                'catalogo':       ['nav-catalogo',     'mnav-catalogo'],
                'empresa':        ['nav-empresa',      'mnav-empresa'],
                'contacto':       ['nav-contacto',     'mnav-contacto'],
                'contacto-cards': ['nav-contacto-cards','mnav-contacto-cards'],
            };
            const allNavIds = Object.values(sectionMap).flat();

            function setActive(sectionId) {
                allNavIds.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.classList.remove('nav-active');
                });
                const ids = sectionMap[sectionId];
                if (ids) ids.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.classList.add('nav-active');
                });
            }

            const observer = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    if (e.isIntersecting) setActive(e.target.id);
                });
            }, { rootMargin: '-40% 0px -55% 0px', threshold: 0 });

            Object.keys(sectionMap).forEach(id => {
                const el = document.getElementById(id);
                if (el) observer.observe(el);
            });
        });
    </script>
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
        <nav class="fixed w-full z-50 transition-all duration-300 bg-[#0c0c0c] border-b border-white/5 top-0 shadow-[0_4px_24px_4px_#0c0c0c]" id="navbar">
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
                
                <div class="hidden md:flex items-center gap-1 font-medium text-sm">
                    <a href="#inicio" id="nav-inicio" onclick="scrollToSection('#inicio', event)" class="nav-link px-4 py-2 rounded-lg text-gray-400 transition-all duration-200 relative">Inicio</a>
                    <a href="#catalogo" id="nav-catalogo" onclick="resetCatalog(); scrollToSection('#catalogo', event)" class="nav-link px-4 py-2 rounded-lg text-gray-400 transition-all duration-200 relative">Catálogo</a>
                    <a href="#empresa" id="nav-empresa" onclick="scrollToSection('#empresa', event)" class="nav-link px-4 py-2 rounded-lg text-gray-400 transition-all duration-200 relative">Nosotros</a>
                    <a href="#contacto" id="nav-contacto" onclick="scrollToSection('#contacto', event)" class="nav-link px-4 py-2 rounded-lg text-gray-400 transition-all duration-200 relative">Ubicaciones</a>
                    <a href="#contacto-cards" id="nav-contacto-cards" onclick="scrollToSection('#contacto-cards', event)" class="nav-link px-4 py-2 rounded-lg text-gray-400 transition-all duration-200 relative">Contacto</a>
                </div>

                <!-- Hamburger btn móvil -->
                <button id="mobile-menu-btn" class="md:hidden flex flex-col justify-center items-center gap-[5px] w-10 h-10 rounded border border-white/10 bg-white/5 hover:bg-white/10 transition-colors" onclick="toggleMobileMenu()" aria-label="Menú">
                    <span class="mobile-bar block w-5 h-[2px] bg-white transition-all duration-300"></span>
                    <span class="mobile-bar block w-5 h-[2px] bg-white transition-all duration-300"></span>
                    <span class="mobile-bar block w-5 h-[2px] bg-white transition-all duration-300"></span>
                </button>
            </div>

            <!-- Menú móvil colapsable -->
            <div id="mobile-nav" class="md:hidden hidden flex-col gap-0 bg-[#0c0c0c] border-t border-white/5 pb-4">
                <a href="#inicio" id="mnav-inicio" onclick="scrollToSection('#inicio', event); closeMobileMenu()" class="mob-nav-link px-6 py-3.5 text-gray-400 font-medium text-sm border-b border-white/5 flex items-center gap-3 transition-all"><span class="mob-dot w-1.5 h-1.5 rounded-full bg-transparent transition-all"></span>Inicio</a>
                <a href="#catalogo" id="mnav-catalogo" onclick="resetCatalog(); scrollToSection('#catalogo', event); closeMobileMenu()" class="mob-nav-link px-6 py-3.5 text-gray-400 font-medium text-sm border-b border-white/5 flex items-center gap-3 transition-all"><span class="mob-dot w-1.5 h-1.5 rounded-full bg-transparent transition-all"></span>Catálogo</a>
                <a href="#empresa" id="mnav-empresa" onclick="scrollToSection('#empresa', event); closeMobileMenu()" class="mob-nav-link px-6 py-3.5 text-gray-400 font-medium text-sm border-b border-white/5 flex items-center gap-3 transition-all"><span class="mob-dot w-1.5 h-1.5 rounded-full bg-transparent transition-all"></span>Nosotros</a>
                <a href="#contacto" id="mnav-contacto" onclick="scrollToSection('#contacto', event); closeMobileMenu()" class="mob-nav-link px-6 py-3.5 text-gray-400 font-medium text-sm border-b border-white/5 flex items-center gap-3 transition-all"><span class="mob-dot w-1.5 h-1.5 rounded-full bg-transparent transition-all"></span>Ubicaciones</a>
                <a href="#contacto-cards" id="mnav-contacto-cards" onclick="scrollToSection('#contacto-cards', event); closeMobileMenu()" class="mob-nav-link px-6 py-3.5 text-gray-400 font-medium text-sm flex items-center gap-3 transition-all"><span class="mob-dot w-1.5 h-1.5 rounded-full bg-transparent transition-all"></span>Contacto</a>
            </div>
        </nav>

        <!-- Cabecera / Hero Central con Carrusel Integrado -->
        @php
            // Helper para obtener contenido del dashboard con fallback
            $getD = function($section, $key, $field = 'content', $fallback = '') use ($web) {
                // Buscamos el ítem en la colección aplanada
                $item = collect($web)->where('section', $section)->where('key', $key)->first();
                
                // Si no hay ítem, devolvemos el fallback directo
                if (!$item) return $fallback;

                // Seleccionamos el valor según el campo solicitado
                $val = match($field) {
                    'image'       => $item['image_url'] ?? null,
                    'header'      => $item['header']    ?? null,
                    'description' => $item['description'] ?? null,
                    'progress'    => $item['progress']    ?? null,
                    default       => $item['content']     ?? null,
                };

                // Si el valor es nulo o es una cadena vacía, usamos el fallback
                return (!is_null($val) && $val !== '') ? $val : $fallback;
            };
        @endphp
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
                <div class="w-full xl:w-7/12 relative" style="height:560px">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[120px] pointer-events-none"></div>

                    <div class="swiper assembly-slider w-full overflow-hidden" style="height:100%">
                        <div class="swiper-wrapper">

                            <!-- Slide 1: Calidad Garantizada -->
                            <div class="swiper-slide">
                                <div style="position:relative;height:560px;width:100%;border:1px solid rgba(0,240,255,0.18)">
                                    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(0,240,255,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(0,240,255,0.07) 1px,transparent 1px);background-size:44px 44px;z-index:0;pointer-events:none"></div>
                                    <div class="assembly-wrapper" style="position:absolute;left:0;top:0;width:63%;height:100%;overflow:hidden;z-index:1">
                                        @php $hero_img1 = $getD('hero', 'banner_1', 'image', asset('images/banner_home_1.jpg')); @endphp
                                        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 50% 50%,rgba(0,240,255,0.12) 0%,transparent 70%)"></div>
                                        <div class="frag frag-1" style="position:absolute;inset:0;z-index:30;opacity:0;clip-path:polygon(0 0,38% 0,38% 100%,0 100%)"><img src="{{ $hero_img1 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-2" style="position:absolute;inset:0;z-index:20;opacity:0;clip-path:polygon(38% 0,70% 0,70% 100%,38% 100%)"><img src="{{ $hero_img1 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-3" style="position:absolute;inset:0;z-index:10;opacity:0;clip-path:polygon(70% 0,100% 0,100% 100%,70% 100%)"><img src="{{ $hero_img1 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 55%,rgba(4,8,20,0.95) 100%);z-index:35"></div>
                                        <div class="assemble-grid" style="position:absolute;inset:0;background-image:linear-gradient(rgba(0,240,255,0.1) 1px,transparent 1px),linear-gradient(90deg,rgba(0,240,255,0.1) 1px,transparent 1px);background-size:44px 44px;opacity:0;pointer-events:none;z-index:40"></div>
                                    </div>
                                    <!-- Title top-right -->
                                    <div class="assembly-title" style="position:absolute;top:18%;right:5%;width:38%;z-index:50;opacity:0">
                                        <h2 class="font-display" style="font-size:clamp(2rem,3.2vw,3.2rem);font-weight:700;color:white;line-height:1.1;margin:0;text-align:right">Calidad<br><span style="background:linear-gradient(to right,#22d3ee,#3b82f6);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Garantizada</span></h2>
                                    </div>
                                    <!-- Card bottom-right overlapping image -->
                                    <div class="assembly-card" style="position:absolute;bottom:10%;right:3%;width:42%;z-index:50;opacity:0;padding:18px 20px;border-radius:8px;border:1px solid rgba(0,240,255,0.3);background:rgba(3,6,16,0.88);backdrop-filter:blur(20px);box-shadow:0 16px 50px rgba(0,0,0,0.9)">
                                        <h4 style="color:#22d3ee;font-family:monospace;font-size:9px;letter-spacing:.2em;border-left:2px solid #22d3ee;padding-left:10px;margin:0 0 12px;text-transform:uppercase">ESTÁNDAR BALAM-01</h4>
                                        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-family:monospace;font-size:11px">
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">CERTIFICACIÓN</span><span style="color:white;font-weight:700;text-transform:uppercase">MIL-SPEC</span></li>
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">VIDA ÚTIL</span><span style="color:white;font-weight:700;text-transform:uppercase">EXTREMA</span></li>
                                            <li style="display:flex;justify-content:space-between"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">CONTROL</span><span style="color:white;font-weight:700;text-transform:uppercase">RIGUROSO</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 2: Precisión Táctica -->
                            <div class="swiper-slide">
                                <div style="position:relative;height:560px;width:100%;border:1px solid rgba(230,126,34,0.18)">
                                    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(230,126,34,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(230,126,34,0.07) 1px,transparent 1px);background-size:44px 44px;z-index:0;pointer-events:none"></div>
                                    <div class="assembly-wrapper" style="position:absolute;left:0;top:0;width:63%;height:100%;overflow:hidden;z-index:1">
                                        @php $hero_img2 = $getD('hero', 'banner_2', 'image', asset('images/banner_home_2.jpg')); @endphp
                                        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 50% 50%,rgba(230,126,34,0.12) 0%,transparent 70%)"></div>
                                        <div class="frag frag-1" style="position:absolute;inset:0;z-index:30;opacity:0;clip-path:polygon(0 0,38% 0,38% 100%,0 100%)"><img src="{{ $hero_img2 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-2" style="position:absolute;inset:0;z-index:20;opacity:0;clip-path:polygon(38% 0,70% 0,70% 100%,38% 100%)"><img src="{{ $hero_img2 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-3" style="position:absolute;inset:0;z-index:10;opacity:0;clip-path:polygon(70% 0,100% 0,100% 100%,70% 100%)"><img src="{{ $hero_img2 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 55%,rgba(4,8,20,0.95) 100%);z-index:35"></div>
                                        <div class="assemble-grid" style="position:absolute;inset:0;background-image:linear-gradient(rgba(230,126,34,0.1) 1px,transparent 1px),linear-gradient(90deg,rgba(230,126,34,0.1) 1px,transparent 1px);background-size:44px 44px;opacity:0;pointer-events:none;z-index:40"></div>
                                    </div>
                                    <div class="assembly-title" style="position:absolute;top:18%;right:5%;width:38%;z-index:50;opacity:0">
                                        <h2 class="font-display" style="font-size:clamp(2rem,3.2vw,3.2rem);font-weight:700;color:white;line-height:1.1;margin:0;text-align:right">Precisión<br><span style="background:linear-gradient(to right,#e67e22,#ea580c);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Táctica</span></h2>
                                    </div>
                                    <div class="assembly-card" style="position:absolute;bottom:10%;right:3%;width:42%;z-index:50;opacity:0;padding:18px 20px;border-radius:8px;border:1px solid rgba(230,126,34,0.3);background:rgba(3,6,16,0.88);backdrop-filter:blur(20px);box-shadow:0 16px 50px rgba(0,0,0,0.9)">
                                        <h4 style="color:#e67e22;font-family:monospace;font-size:9px;letter-spacing:.2em;border-left:2px solid #e67e22;padding-left:10px;margin:0 0 12px;text-transform:uppercase">MÓDULO DE TIRO</h4>
                                        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-family:monospace;font-size:11px">
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">ALCANCE</span><span style="color:white;font-weight:700;text-transform:uppercase">MÁXIMO</span></li>
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">ESTABILIDAD</span><span style="color:white;font-weight:700;text-transform:uppercase">PROFESIONAL</span></li>
                                            <li style="display:flex;justify-content:space-between"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">RECORRIDO</span><span style="color:white;font-weight:700;text-transform:uppercase">MATCH GRADE</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 3: Rendimiento Superior -->
                            <div class="swiper-slide">
                                <div style="position:relative;height:560px;width:100%;border:1px solid rgba(16,185,129,0.18)">
                                    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(16,185,129,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(16,185,129,0.07) 1px,transparent 1px);background-size:44px 44px;z-index:0;pointer-events:none"></div>
                                    <div class="assembly-wrapper" style="position:absolute;left:0;top:0;width:63%;height:100%;overflow:hidden;z-index:1">
                                        @php $hero_img3 = $getD('hero', 'banner_3', 'image', asset('images/banner_home_3.jpg')); @endphp
                                        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 50% 50%,rgba(16,185,129,0.12) 0%,transparent 70%)"></div>
                                        <div class="frag frag-1" style="position:absolute;inset:0;z-index:30;opacity:0;clip-path:polygon(0 0,38% 0,38% 100%,0 100%)"><img src="{{ $hero_img3 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-2" style="position:absolute;inset:0;z-index:20;opacity:0;clip-path:polygon(38% 0,70% 0,70% 100%,38% 100%)"><img src="{{ $hero_img3 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-3" style="position:absolute;inset:0;z-index:10;opacity:0;clip-path:polygon(70% 0,100% 0,100% 100%,70% 100%)"><img src="{{ $hero_img3 }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 55%,rgba(4,8,20,0.95) 100%);z-index:35"></div>
                                        <div class="assemble-grid" style="position:absolute;inset:0;background-image:linear-gradient(rgba(16,185,129,0.1) 1px,transparent 1px),linear-gradient(90deg,rgba(16,185,129,0.1) 1px,transparent 1px);background-size:44px 44px;opacity:0;pointer-events:none;z-index:40"></div>
                                    </div>
                                    <div class="assembly-title" style="position:absolute;top:18%;right:5%;width:38%;z-index:50;opacity:0">
                                        <h2 class="font-display" style="font-size:clamp(2rem,3.2vw,3.2rem);font-weight:700;color:white;line-height:1.1;margin:0;text-align:right">Rendimiento<br><span style="background:linear-gradient(to right,#34d399,#22c55e);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Superior</span></h2>
                                    </div>
                                    <div class="assembly-card" style="position:absolute;bottom:10%;right:3%;width:42%;z-index:50;opacity:0;padding:18px 20px;border-radius:8px;border:1px solid rgba(16,185,129,0.3);background:rgba(3,6,16,0.88);backdrop-filter:blur(20px);box-shadow:0 16px 50px rgba(0,0,0,0.9)">
                                        <h4 style="color:#34d399;font-family:monospace;font-size:9px;letter-spacing:.2em;border-left:2px solid #34d399;padding-left:10px;margin:0 0 12px;text-transform:uppercase">MÓDULO DE PODER</h4>
                                        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-family:monospace;font-size:11px">
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">VELOCIDAD</span><span style="color:white;font-weight:700;text-transform:uppercase">ALTA</span></li>
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">ERGONOMÍA</span><span style="color:white;font-weight:700;text-transform:uppercase">ADAPTATIVA</span></li>
                                            <li style="display:flex;justify-content:space-between"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">CONFIABILIDAD</span><span style="color:white;font-weight:700;text-transform:uppercase">ÓPTIMA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 4: Equipo Profesional -->
                            <div class="swiper-slide">
                                <div style="position:relative;height:560px;width:100%;border:1px solid rgba(59,130,246,0.18)">
                                    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(59,130,246,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(59,130,246,0.07) 1px,transparent 1px);background-size:44px 44px;z-index:0;pointer-events:none"></div>
                                    <div class="assembly-wrapper" style="position:absolute;left:0;top:0;width:63%;height:100%;overflow:hidden;z-index:1">
                                        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 50% 50%,rgba(59,130,246,0.12) 0%,transparent 70%)"></div>
                                        <div class="frag frag-1" style="position:absolute;inset:0;z-index:30;opacity:0;clip-path:polygon(0 0,38% 0,38% 100%,0 100%)"><img src="{{ asset('images/banner_home_4.jpg') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-2" style="position:absolute;inset:0;z-index:20;opacity:0;clip-path:polygon(38% 0,70% 0,70% 100%,38% 100%)"><img src="{{ asset('images/banner_home_4.jpg') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-3" style="position:absolute;inset:0;z-index:10;opacity:0;clip-path:polygon(70% 0,100% 0,100% 100%,70% 100%)"><img src="{{ asset('images/banner_home_4.jpg') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 55%,rgba(4,8,20,0.95) 100%);z-index:35"></div>
                                        <div class="assemble-grid" style="position:absolute;inset:0;background-image:linear-gradient(rgba(59,130,246,0.1) 1px,transparent 1px),linear-gradient(90deg,rgba(59,130,246,0.1) 1px,transparent 1px);background-size:44px 44px;opacity:0;pointer-events:none;z-index:40"></div>
                                    </div>
                                    <div class="assembly-title" style="position:absolute;top:18%;right:5%;width:38%;z-index:50;opacity:0">
                                        <h2 class="font-display" style="font-size:clamp(2rem,3.2vw,3.2rem);font-weight:700;color:white;line-height:1.1;margin:0;text-align:right">Equipo<br><span style="background:linear-gradient(to right,#60a5fa,#6366f1);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Profesional</span></h2>
                                    </div>
                                    <div class="assembly-card" style="position:absolute;bottom:10%;right:3%;width:42%;z-index:50;opacity:0;padding:18px 20px;border-radius:8px;border:1px solid rgba(59,130,246,0.3);background:rgba(3,6,16,0.88);backdrop-filter:blur(20px);box-shadow:0 16px 50px rgba(0,0,0,0.9)">
                                        <h4 style="color:#60a5fa;font-family:monospace;font-size:9px;letter-spacing:.2em;border-left:2px solid #60a5fa;padding-left:10px;margin:0 0 12px;text-transform:uppercase">MÓDULO ÉLITE</h4>
                                        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-family:monospace;font-size:11px">
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">DISEÑO</span><span style="color:white;font-weight:700;text-transform:uppercase">SOLO-OP</span></li>
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">MATERIAL</span><span style="color:white;font-weight:700;text-transform:uppercase">ALTO GRADO</span></li>
                                            <li style="display:flex;justify-content:space-between"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">DESEMPEÑO</span><span style="color:white;font-weight:700;text-transform:uppercase">COMPROBADO</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Slide 5: Seguridad Total -->
                            <div class="swiper-slide">
                                <div style="position:relative;height:560px;width:100%;border:1px solid rgba(239,68,68,0.18)">
                                    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(239,68,68,0.07) 1px,transparent 1px),linear-gradient(90deg,rgba(239,68,68,0.07) 1px,transparent 1px);background-size:44px 44px;z-index:0;pointer-events:none"></div>
                                    <div class="assembly-wrapper" style="position:absolute;left:0;top:0;width:63%;height:100%;overflow:hidden;z-index:1">
                                        <div style="position:absolute;inset:0;background:radial-gradient(ellipse at 50% 50%,rgba(239,68,68,0.12) 0%,transparent 70%)"></div>
                                        <div class="frag frag-1" style="position:absolute;inset:0;z-index:30;opacity:0;clip-path:polygon(0 0,38% 0,38% 100%,0 100%)"><img src="{{ asset('images/beretta.png') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-2" style="position:absolute;inset:0;z-index:20;opacity:0;clip-path:polygon(38% 0,70% 0,70% 100%,38% 100%)"><img src="{{ asset('images/beretta.png') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div class="frag frag-3" style="position:absolute;inset:0;z-index:10;opacity:0;clip-path:polygon(70% 0,100% 0,100% 100%,70% 100%)"><img src="{{ asset('images/beretta.png') }}" style="width:100%;height:100%;object-fit:cover;object-position:center"></div>
                                        <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 55%,rgba(4,8,20,0.95) 100%);z-index:35"></div>
                                        <div class="assemble-grid" style="position:absolute;inset:0;background-image:linear-gradient(rgba(239,68,68,0.1) 1px,transparent 1px),linear-gradient(90deg,rgba(239,68,68,0.1) 1px,transparent 1px);background-size:44px 44px;opacity:0;pointer-events:none;z-index:40"></div>
                                    </div>
                                    <div class="assembly-title" style="position:absolute;top:18%;right:5%;width:38%;z-index:50;opacity:0">
                                        <h2 class="font-display" style="font-size:clamp(2rem,3.2vw,3.2rem);font-weight:700;color:white;line-height:1.1;margin:0;text-align:right">Seguridad<br><span style="background:linear-gradient(to right,#f87171,#fb7185);-webkit-background-clip:text;-webkit-text-fill-color:transparent">Total</span></h2>
                                    </div>
                                    <div class="assembly-card" style="position:absolute;bottom:10%;right:3%;width:42%;z-index:50;opacity:0;padding:18px 20px;border-radius:8px;border:1px solid rgba(239,68,68,0.3);background:rgba(3,6,16,0.88);backdrop-filter:blur(20px);box-shadow:0 16px 50px rgba(0,0,0,0.9)">
                                        <h4 style="color:#f87171;font-family:monospace;font-size:9px;letter-spacing:.2em;border-left:2px solid #f87171;padding-left:10px;margin:0 0 12px;text-transform:uppercase">MÓDULO DE CONTROL</h4>
                                        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-family:monospace;font-size:11px">
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">PROTOCOLO</span><span style="color:white;font-weight:700;text-transform:uppercase">ACTIVO</span></li>
                                            <li style="display:flex;justify-content:space-between;border-bottom:1px solid rgba(255,255,255,0.08);padding-bottom:7px"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">SISTEMA</span><span style="color:white;font-weight:700;text-transform:uppercase">SEGURO</span></li>
                                            <li style="display:flex;justify-content:space-between"><span style="color:#6b7280;text-transform:uppercase;letter-spacing:.05em">BLOQUEO</span><span style="color:white;font-weight:700;text-transform:uppercase">INTEGRADO</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Navegacion custom swiper -->
                        <div class="swiper-button-prev !text-white opacity-40 hover:opacity-100 !left-0 scale-75 transition-opacity drop-shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
                        <div class="swiper-button-next !text-white opacity-40 hover:opacity-100 !right-0 scale-75 transition-opacity drop-shadow-[0_0_10px_rgba(255,255,255,0.8)]"></div>
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
        <section id="catalogo" class="pt-0 pb-24 relative">
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

                    <!-- Sidebar escritorio (sin cambios) -->
                    <aside id="catalog-sidebar" class="w-full lg:w-1/4 xl:w-1/5 shrink-0 lg:sticky lg:top-[96px] z-20 pb-10 lg:max-h-[calc(100vh-140px)] lg:overflow-y-auto hide-scrollbar custom-scrollbar hidden lg:block">
                        <div class="mb-10 px-4 pt-6">
                            <h3 class="font-display text-4xl font-black text-white uppercase tracking-tighter mb-8 border-b-4 border-accent-cyan pb-2 w-max">
                                Catálogo
                            </h3>
                            
                            <ul class="flex flex-col border-t border-white/5" id="nav-accordion">
                                <li>
                                    <a href="#catalogo" onclick="showAllProducts()" class="flex items-center justify-between py-5 border-b border-white/5 group transition-all filter-item active" id="filter-all">
                                        <span class="font-display text-xl font-bold text-white group-hover:text-accent-cyan tracking-widest uppercase">TODOS NUESTROS PRODUCTOS</span>
                                        <div class="w-5 h-5 rounded border-2 border-accent-cyan bg-accent-cyan flex items-center justify-center transition-all selection-box">
                                            <i class='bx bx-check text-black font-bold'></i>
                                        </div>
                                    </a>
                                </li>
                                @if(isset($menuCategorias))
                                    @foreach($menuCategorias as $cat)
                                    <li class="border-b border-white/5">
                                        <div class="flex items-center justify-between py-5 cursor-pointer group transition-all" onclick="toggleAccordion('cat-{{ $cat['slug'] }}')">
                                            <span class="font-display text-xl font-bold text-white group-hover:text-accent-cyan tracking-widest uppercase">{{ $cat['nombre'] }}</span>
                                            <i class='bx bx-plus text-2xl text-gray-500 group-hover:text-accent-cyan transition-transform' id="icon-cat-{{ $cat['slug'] }}"></i>
                                        </div>
                                        <ul id="cat-{{ $cat['slug'] }}" class="hidden flex flex-col pl-4 pb-4 animate-fade-down gap-1">
                                            <li>
                                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $cat['slug'] }}', 'cat', this)" class="flex items-center gap-3 py-2 text-[11px] text-gray-400 hover:text-white transition-all uppercase font-mono tracking-widest filter-item" data-filter="{{ $cat['slug'] }}">
                                                    <div class="w-4 h-4 rounded border border-white/20 flex items-center justify-center transition-all selection-box group-hover:border-accent-cyan/50">
                                                        <i class='bx bx-check text-black font-bold hidden'></i>
                                                    </div>
                                                    Ver Todo de {{ $cat['nombre'] }}
                                                </a>
                                            </li>
                                            @foreach($cat['subcategorias'] as $sub)
                                            <li>
                                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $sub['slug'] }}', 'subcat', this)" class="flex items-center gap-3 py-2 text-[11px] text-gray-500 hover:text-white transition-all uppercase font-mono tracking-widest filter-item" data-filter="{{ $sub['slug'] }}">
                                                    <div class="w-4 h-4 rounded border border-white/20 flex items-center justify-center transition-all selection-box group-hover:border-accent-cyan/50">
                                                        <i class='bx bx-check text-black font-bold hidden'></i>
                                                    </div>
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
                        <div class="sticky top-[64px] md:top-[80px] z-40 bg-[#0c0c0c] -mx-6 px-6 py-5 mb-8 border-b border-white/10 transition-all duration-300 flex flex-col gap-5 shadow-[0_4px_30px_6px_#0c0c0c]" id="catalogo-top-bar">
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

                            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-3 md:gap-6 items-end">
                                <!-- Filtrar por Marca -->
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Filtrar por Marca</span>
                                    <select id="top-filter-brand" onchange="applyFilters()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-2.5 px-3 text-white text-[10px] md:text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5 w-full">
                                        <option value="all">TODAS LAS MARCAS</option>
                                        @if(isset($marcas))
                                            @foreach($marcas as $marca)
                                                <option value="{{ $marca['slug'] }}">{{ $marca['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <!-- Filtrar por Sucursal -->
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Por Sucursal</span>
                                    <select id="top-filter-branch" onchange="applyFilters()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-2.5 px-3 text-white text-[10px] md:text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5 w-full">
                                        <option value="all">TODAS LAS SEDES</option>
                                        @if(isset($sucursales))
                                            @foreach($sucursales as $suc)
                                                <option value="{{ $suc['slug'] }}">{{ $suc['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <!-- Mostrar X -->
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Mostrar X</span>
                                    <select id="top-items-per-page" onchange="changeItemsPerPage(this.value)" class="bg-tactical-950/80 border border-white/10 rounded-xl py-2.5 px-3 text-white text-[10px] md:text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5 w-full">
                                        <option value="10">10 PRODUCTOS</option>
                                        <option value="20">20 PRODUCTOS</option>
                                        <option value="25" selected>25 PRODUCTOS</option>
                                        <option value="30">30 PRODUCTOS</option>
                                    </select>
                                </div>

                                <!-- Ordenar Por -->
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[0.2em] pl-1">Ordenar Por</span>
                                    <select id="top-sort-order" onchange="applySorting()" class="bg-tactical-950/80 border border-white/10 rounded-xl py-2.5 px-3 text-white text-[10px] md:text-[11px] font-bold uppercase tracking-wider transition-all focus:outline-none focus:border-accent-cyan/50 cursor-pointer hover:bg-white/5 w-full">
                                        <option value="default">RELEVANCIA</option>
                                        <option value="az">ALFABÉTICO A - Z</option>
                                        <option value="za">ALFABÉTICO Z - A</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Grilla de Subcategorías (Dinámica) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden mb-16" id="subcategory-grid">
                            <!-- Inyectado por JS -->
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 border-t border-l border-white/5 md:border-none" id="product-grid">

                            @if(isset($productos))
                                @forelse($productos as $producto)
                                @php
                                    // Construir URL de imagen con el dominio PROPIO de cada sucursal
                                    $imagenes   = $producto['imagenes'] ?? [];
                                    $storageUrl = rtrim($producto['storage_url'] ?? '', '/');
                                    $allImages  = [];
                                    $tieneImagenREAL = false;

                                    foreach($imagenes as $img) {
                                        $allImages[] = $storageUrl . '/' . ltrim($img, '/');
                                    }
                                    
                                    // REEMPLAZO DINÁMICO DE IMAGEN VACÍA (Diseño Estilo "Armería Confidencial")
                                    if(empty($allImages)) {
                                        $inicial = strtoupper(mb_substr(trim($producto['nombre'] ?? 'B'), 0, 1));
                                        // Color gris carbón súper táctico (stealth) para no distraer
                                        $fallbackUrl = "https://ui-avatars.com/api/?name=" . urlencode($inicial) . "&background=111116&color=334155&size=512&font-size=0.4&bold=true";
                                        $allImages[] = $fallbackUrl;
                                    } else {
                                        $tieneImagenREAL = true;
                                    }
                                    
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
                                        
                                        <img src="{{ $imgUrl }}" class="max-h-full max-w-full object-contain filter drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] {{ $tieneImagenREAL ? 'group-hover:scale-110 group-hover:-rotate-3 transition-transform duration-500' : 'opacity-80' }} relative z-10" alt="{{ $producto['nombre'] }}">
                                        
                                        @if(!$tieneImagenREAL)
                                            <!-- Overlay Mensaje Faltante -->
                                            <div class="absolute bottom-4 left-0 right-0 flex justify-center z-20 pointer-events-none">
                                                <div class="bg-black/80 backdrop-blur border border-white/5 text-gray-500 text-[8px] font-mono tracking-[0.2em] px-3 py-1.5 rounded uppercase flex items-center gap-1.5 shadow-xl">
                                                    <i class='bx bx-camera text-[10px]'></i> FOTO EN CAMINO
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-5 flex flex-col flex-1 relative z-10">
                                        <div class="flex justify-between items-start mb-2 gap-2">
                                            <div class="text-[10px] text-accent-cyan border border-accent-cyan/30 bg-accent-cyan/10 px-2 py-0.5 rounded font-bold tracking-widest uppercase">{{ $catName }}</div>
                                            <div class="text-[10px] text-gray-400 font-mono text-right"><i class='bx bx-map'></i> {{ $branchName }}</div>
                                        </div>
                                        <h4 class="font-display text-xl font-bold text-white mb-2 group-hover/card:text-accent-cyan transition-colors">{{ $producto['nombre'] }}</h4>
                                        

                                        
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

            <!-- FAB: Botón flotante de categorías (solo móvil/tablet) -->
            <button id="cat-fab" onclick="openCatDrawer()"
                class="lg:hidden fixed left-3 bottom-24 z-50 flex flex-col items-center justify-center w-12 h-12 rounded-full bg-[#0c0c0c] border border-accent-cyan/40 shadow-[0_0_20px_rgba(0,240,255,0.25)] hover:shadow-[0_0_30px_rgba(0,240,255,0.45)] transition-all active:scale-95"
                title="Filtrar por Categoría">
                <i class='bx bx-filter-alt text-xl text-accent-cyan'></i>
            </button>
        </section>

        <!-- ==============================================
             PROMOCIONES Y EVENTOS
        =================================================== -->
        <section id="promociones" class="py-16 md:py-24 relative overflow-hidden border-t border-b border-white/10 bg-tactical-950">
            <!-- Capas de Background Cinemático y de Cristal -->
            <div class="absolute inset-0 z-0 select-none pointer-events-none">
                <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-10 filter grayscale blur-sm">
                <div class="absolute inset-0 bg-tactical-950/80 backdrop-blur-3xl"></div>
                <!-- Glowing orbs tacticos -->
                <div class="absolute top-[10%] left-[-5%] w-[600px] h-[600px] bg-[#e67e22]/10 rounded-full blur-[150px] mix-blend-screen pointer-events-none"></div>
                <div class="absolute bottom-[-10%] right-[-5%] w-[600px] h-[600px] bg-accent-cyan/10 rounded-full blur-[150px] mix-blend-screen pointer-events-none"></div>
            </div>

            <div class="max-w-[95%] mx-auto px-4 z-10 relative">
                <!-- Título Mejorado con Glowing Effect -->
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gsap-reveal gs-fade-up">
                    <div class="relative pl-6">
                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gradient-to-b from-[#e67e22] to-transparent rounded-full shadow-[0_0_15px_#e67e22]"></div>
                        <h2 class="font-display text-4xl md:text-5xl font-black text-white mb-2 tracking-tighter uppercase relative z-10 inline-block">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#e67e22] to-yellow-500 drop-shadow-[0_0_10px_rgba(230,126,34,0.5)]">Promociones</span> 
                            <span class="text-white drop-shadow-[0_0_10px_rgba(255,255,255,0.3)]">& Eventos</span>
                            <div class="absolute inset-0 bg-[#e67e22]/20 blur-3xl z-[-1]"></div>
                        </h2>
                        <p class="text-gray-400 font-mono text-sm tracking-widest uppercase mt-1">Sorteos • Oportunidades • Novedades</p>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 items-stretch pt-2">
                    <!-- Banner Promocional Principal (Izquierda) -->
                    <div class="w-full lg:w-5/12 xl:w-5/12 flex flex-col gsap-reveal gs-slide-right h-[450px] md:h-[500px]">
                        <div class="glass-card rounded-2xl overflow-hidden p-2 relative w-full h-full flex flex-col group mouse-glow shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/5 hover:border-[#e67e22]/50 transition-all duration-500 bg-[#0a0a0ce6] cursor-pointer" onclick="event.stopPropagation(); window.openLightbox('{{ asset('images/promociones/rifa.jpg') }}', 'Destacados del Mes')">
                            <!-- Glow effect -->
                            <div class="absolute inset-0 bg-[#e67e22]/10 rounded-full blur-[80px] opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                            
                            <div class="relative w-full h-full rounded-xl overflow-hidden group-hover:shadow-[0_0_30px_rgba(230,126,34,0.3)] transition-all bg-[#050505]">
                                <img src="{{ asset('images/promociones/rifa.jpg') }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 opacity-90 group-hover:opacity-100" alt="Promoción Principal" onerror="this.onerror=null; this.src='{{ asset('images/logo.jpg') }}'">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-transparent pointer-events-none"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                    <div class="bg-black/50 backdrop-blur-sm rounded-full p-4 border border-white/20 shadow-[0_0_15px_rgba(230,126,34,0.5)]"><i class='bx bx-zoom-in text-white text-3xl'></i></div>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 z-20 md:p-8 pointer-events-none">
                                    <div class="inline-block px-3 py-1 bg-[#e67e22]/20 border border-[#e67e22]/40 text-[#f39c12] text-[10px] font-bold tracking-widest uppercase rounded mb-3 backdrop-blur-md shadow-[0_0_15px_rgba(230,126,34,0.3)]"><i class='bx bx-time-five'></i> OPORTUNIDAD LIMITADA</div>
                                    <h3 class="font-display text-3xl font-black text-white uppercase tracking-tighter mb-2 drop-shadow-lg">Destacados del Mes</h3>
                                    <p class="text-gray-300 text-sm font-mono uppercase tracking-widest w-full">Equipamiento táctico, descuentos exclusivos y novedades.</p>
                                    <div class="mt-4 px-6 py-2 bg-white/10 text-white text-xs font-bold uppercase tracking-[0.2em] rounded border border-white/20 transition-colors shadow-lg flex items-center gap-2 w-max group-hover:bg-[#e67e22] group-hover:border-[#e67e22]">Ampliar Vista <i class='bx bx-zoom-in text-lg'></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carrusel de Tendencias (Derecha) -->
                    <div class="w-full lg:w-7/12 xl:w-7/12 flex flex-col justify-center relative gsap-reveal gs-slide-left h-[450px] md:h-[500px]">
                        <div class="flex items-center justify-between mb-4 shrink-0 px-2 lg:px-0">
                            <h4 class="text-white font-black uppercase tracking-widest text-lg font-display flex items-center gap-2 drop-shadow-md">
                                <i class='bx bx-radar text-[#e67e22] animate-pulse'></i> EN TENDENCIA
                            </h4>
                            <div class="flex gap-2">
                                <button onclick="document.getElementById('native-promo-slider').scrollBy({left: -350, behavior: 'smooth'})" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-[#e67e22] hover:border-[#e67e22] transition-all cursor-pointer"><i class='bx bx-chevron-left text-xl pointer-events-none'></i></button>
                                <button onclick="document.getElementById('native-promo-slider').scrollBy({left: 350, behavior: 'smooth'})" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-[#e67e22] hover:border-[#e67e22] transition-all cursor-pointer"><i class='bx bx-chevron-right text-xl pointer-events-none'></i></button>
                            </div>
                        </div>

                        <!-- Carrusel JS/CSS Robusto Permanente -->
                        <div id="native-promo-slider" class="w-full h-full pb-0 overflow-x-auto overflow-y-hidden snap-x snap-mandatory flex gap-4 hide-scrollbar scroll-smooth">
                                <!-- Elemento 1 -->
                                <div class="shrink-0 w-[85%] sm:w-[calc(50%-0.5rem)] lg:w-[calc(50%-0.5rem)] snap-start h-full pb-2">
                                    <div class="glass-card rounded-2xl overflow-hidden p-2 flex flex-col h-full bg-tactical-800/80 border border-white/5 mouse-glow group shadow-lg">
                                        <div class="relative w-full shrink-0 h-[85%] bg-[#0a0a0c] rounded-xl overflow-hidden mb-3 border border-white/5 cursor-pointer group-hover:border-accent-cyan/30 transition-all" onclick="event.stopPropagation(); window.openLightbox('{{ asset('images/promociones/premio1.jpg') }}', 'Alta Demanda')">
                                            <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover:opacity-100 blur-xl transition-all pointer-events-none"></div>
                                            <img src="{{ asset('images/promociones/premio1.jpg') }}" alt="Equipo" class="absolute inset-0 w-full h-full object-cover filter drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] group-hover:scale-110 transition-transform duration-700" onerror="this.onerror=null; this.src='{{ asset('images/logo.jpg') }}'">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent pointer-events-none"></div>
                                            <div class="absolute top-3 left-3 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[9px] font-bold px-2 py-1 rounded-sm tracking-widest font-mono uppercase shadow-lg z-10"><i class='bx bx-crosshair'></i> ALTA DEMANDA</div>
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                                <div class="bg-black/50 backdrop-blur-sm rounded-full p-3 border border-white/20"><i class='bx bx-zoom-in text-white text-2xl'></i></div>
                                            </div>
                                        </div>
                                        <div class="px-3 flex flex-col flex-1 pb-1 justify-center relative">
                                            <a href="#contacto-cards" class="mt-auto px-4 py-2 border border-white/10 rounded-lg text-white/80 text-[10px] font-bold uppercase tracking-[0.2em] group-hover:border-accent-cyan/50 group-hover:text-accent-cyan group-hover:bg-accent-cyan/10 transition-colors bg-white/5 text-left relative flex justify-between items-center w-full shadow-sm">Consultar <i class='bx bx-message-rounded-dots text-lg'></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Elemento 2 -->
                                <div class="shrink-0 w-[85%] sm:w-[calc(50%-0.5rem)] lg:w-[calc(50%-0.5rem)] snap-start h-full pb-2">
                                    <div class="glass-card rounded-2xl overflow-hidden p-2 flex flex-col h-full bg-tactical-800/80 border border-white/5 mouse-glow group shadow-lg">
                                        <div class="relative w-full shrink-0 h-[85%] bg-[#0a0a0c] rounded-xl overflow-hidden mb-3 border border-white/5 cursor-pointer group-hover:border-accent-cyan/30 transition-all" onclick="event.stopPropagation(); window.openLightbox('{{ asset('images/promociones/premio2.jpg') }}', 'Exclusivo')">
                                            <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover:opacity-100 blur-xl transition-all pointer-events-none"></div>
                                            <img src="{{ asset('images/promociones/premio2.jpg') }}" alt="Equipo" class="absolute inset-0 w-full h-full object-cover filter drop-shadow-[0_10px_20px_rgba(0,0,0,0.8)] group-hover:scale-110 transition-transform duration-700" onerror="this.onerror=null; this.src='{{ asset('images/logo.jpg') }}'">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent pointer-events-none"></div>
                                            <div class="absolute top-3 left-3 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[9px] font-bold px-2 py-1 rounded-sm tracking-widest font-mono uppercase shadow-lg z-10"><i class='bx bx-shield-quarter'></i> EXCLUSIVO</div>
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                                <div class="bg-black/50 backdrop-blur-sm rounded-full p-3 border border-white/20"><i class='bx bx-zoom-in text-white text-2xl'></i></div>
                                            </div>
                                        </div>
                                        <div class="px-3 flex flex-col flex-1 pb-1 justify-center relative">
                                            <a href="#contacto-cards" class="mt-auto px-4 py-2 border border-white/10 rounded-lg text-white/80 text-[10px] font-bold uppercase tracking-[0.2em] group-hover:border-accent-cyan/50 group-hover:text-accent-cyan group-hover:bg-accent-cyan/10 transition-colors bg-white/5 text-left relative flex justify-between items-center w-full shadow-sm">Consultar <i class='bx bx-message-rounded-dots text-lg'></i></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Elemento 3 -->
                                <div class="shrink-0 w-[85%] sm:w-[calc(50%-0.5rem)] lg:w-[calc(50%-0.5rem)] snap-start h-full pb-2">
                                    <div class="glass-card rounded-2xl overflow-hidden p-2 flex flex-col h-full bg-tactical-800/80 border border-white/5 mouse-glow group shadow-lg">
                                        <div class="relative w-full shrink-0 h-[85%] bg-[#0a0a0c] rounded-xl overflow-hidden mb-3 border border-white/5 cursor-pointer group-hover:border-accent-cyan/30 transition-all" onclick="event.stopPropagation(); window.openLightbox('{{ asset('images/promociones/premio3.png') }}', 'Imperdible')">
                                            <div class="absolute inset-0 bg-accent-cyan/5 opacity-0 group-hover:opacity-100 blur-xl transition-all pointer-events-none"></div>
                                            <img src="{{ asset('images/promociones/premio3.png') }}" alt="Equipo" class="absolute inset-0 w-full h-full object-cover filter drop-shadow-[0_15px_15px_rgba(0,0,0,0.9)] group-hover:scale-110 transition-transform duration-700" onerror="this.onerror=null; this.src='{{ asset('images/logo.jpg') }}'">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent pointer-events-none"></div>
                                            <div class="absolute top-3 left-3 bg-white/10 backdrop-blur-md border border-white/20 text-white text-[9px] font-bold px-2 py-1 rounded-sm tracking-widest font-mono uppercase shadow-lg z-10"><i class='bx bxs-hot'></i> IMPERDIBLE</div>
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity z-20">
                                                <div class="bg-black/50 backdrop-blur-sm rounded-full p-3 border border-white/20"><i class='bx bx-zoom-in text-white text-2xl'></i></div>
                                            </div>
                                        </div>
                                        <div class="px-3 flex flex-col flex-1 pb-1 justify-center relative">
                                            <a href="#contacto-cards" class="mt-auto px-4 py-2 border border-white/10 rounded-lg text-white/80 text-[10px] font-bold uppercase tracking-[0.2em] group-hover:border-accent-cyan/50 group-hover:text-accent-cyan group-hover:bg-accent-cyan/10 transition-colors bg-white/5 text-left relative flex justify-between items-center w-full shadow-sm">Consultar <i class='bx bx-message-rounded-dots text-lg'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            <div class="max-w-[95%] mx-auto px-6 relative z-20">
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
                    
                    <div class="swiper video-slider w-full py-1" style="overflow:hidden">
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

                    <!-- Custom Navigation Controls outside the overflow hidden box -->
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
                    <!-- Item Ingreso 1 -->
                    @php
                        $prog1 = $getD('nuevo_ingreso', 'ingreso_1', 'progress', 92);
                        $img1  = $getD('nuevo_ingreso', 'ingreso_1', 'image', 'https://images.unsplash.com/photo-1595101834457-fe3419097753?q=80&w=600&auto=format&fit=crop');
                        $tit1  = $getD('nuevo_ingreso', 'ingreso_1', 'header', 'GLOCK 19X COYOTE');
                        $desc1 = $getD('nuevo_ingreso', 'ingreso_1', 'description', 'Crossover oficial de Glock. Diseño robusto, cargadores de alta capacidad y acabado táctico nPVD.');
                    @endphp
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-accent-pink/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-red-600 to-accent-pink w-[{{ $prog1 }}%] shadow-[0_0_15px_#ff2a55]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-pink text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-accent-pink/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-pink animate-ping"></span> {{ $prog1 }}% TRÁNSITO
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-pink/50 group-hover/inc:shadow-[0_0_20px_rgba(255,42,85,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-pink'></i>
                                </div>
                            </div>
                            <img src="{{ $img1 }}" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="{{ $tit1 }}">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-ship'></i> ARRIBO: ESTIMADO
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-pink transition-colors leading-none tracking-tight uppercase">{{ $tit1 }}</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">{{ $desc1 }}</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-accent-pink hover:text-white transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(255,42,85,0.3)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>
                    
                    <!-- Item Ingreso 2 -->
                    @php
                        $prog2 = $getD('nuevo_ingreso', 'ingreso_2', 'progress', 65);
                        $img2  = $getD('nuevo_ingreso', 'ingreso_2', 'image', 'https://images.unsplash.com/photo-1590425712124-7473a2164478?q=80&w=600&auto=format&fit=crop');
                        $tit2  = $getD('nuevo_ingreso', 'ingreso_2', 'header', 'SIG SAUER MCX VIRTUS');
                        $desc2 = $getD('nuevo_ingreso', 'ingreso_2', 'description', 'Sistema multi-calibre configurable. La cúspide de la ingeniería de tiro moderna y adaptable.');
                    @endphp
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-accent-cyan/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-cyan-600 to-accent-cyan w-[{{ $prog2 }}%] shadow-[0_0_15px_#00e5ff]"></div></div>
                        <div class="absolute top-4 right-6 text-accent-cyan text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-accent-cyan/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan animate-ping"></span> {{ $prog2 }}% TRÁNSITO
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-accent-cyan/50 group-hover/inc:shadow-[0_0_20px_rgba(0,229,255,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-accent-cyan'></i>
                                </div>
                            </div>
                            <img src="{{ $img2 }}" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="{{ $tit2 }}">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-plane-alt'></i> ARRIBO: ESTIMADO
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-accent-cyan transition-colors leading-none tracking-tight uppercase">{{ $tit2 }}</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">{{ $desc2 }}</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-accent-cyan hover:text-black transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(0,229,255,0.3)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>

                    <!-- Item Ingreso 3 -->
                    @php
                        $prog3 = $getD('nuevo_ingreso', 'ingreso_3', 'progress', 15);
                        $img3  = $getD('nuevo_ingreso', 'ingreso_3', 'image', 'https://images.unsplash.com/photo-1595101834161-267591e6005c?q=80&w=600&auto=format&fit=crop');
                        $tit3  = $getD('nuevo_ingreso', 'ingreso_3', 'header', 'BENELLI M4 TACTICAL');
                        $desc3 = $getD('nuevo_ingreso', 'ingreso_3', 'description', 'Escopeta semi-automática de combate. Fiabilidad legendaria para cualquier escenario crítico.');
                    @endphp
                    <div class="glass-card rounded-[2rem] p-6 flex flex-col gap-6 items-center border border-white/5 bg-black/40 hover:border-yellow-500/50 transition-all duration-500 mouse-glow relative overflow-hidden group/inc hover:-translate-y-2">
                        <!-- Barra de llegada progreso -->
                        <div class="absolute bottom-0 left-0 h-1.5 bg-tactical-800 w-full"><div class="h-full bg-gradient-to-r from-yellow-600 to-yellow-400 w-[{{ $prog3 }}%] shadow-[0_0_15px_#fbbf24]"></div></div>
                        <div class="absolute top-4 right-6 text-yellow-500 text-[9px] font-mono font-bold tracking-widest uppercase flex items-center gap-1.5 bg-black/40 px-2 py-1 rounded-full border border-yellow-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-ping"></span> {{ $prog3 }}% LOGÍSTICA
                        </div>

                        <!-- Miniatura lockeada -->
                        <div class="w-full h-48 bg-tactical-950/80 rounded-2xl flex items-center justify-center p-4 relative overflow-hidden border border-white/5 shrink-0">
                            <div class="absolute inset-0 bg-black/60 z-10 flex items-center justify-center rounded-2xl backdrop-blur-[2px] group-hover/inc:backdrop-blur-none transition-all duration-700">
                                <div class="w-12 h-12 rounded-full border border-white/10 flex items-center justify-center bg-black/50 group-hover/inc:border-yellow-500/50 group-hover/inc:shadow-[0_0_20px_rgba(251,191,36,0.3)] transition-all">
                                    <i class='bx bx-lock-alt text-2xl text-white/50 group-hover/inc:text-yellow-500'></i>
                                </div>
                            </div>
                            <img src="{{ $img3 }}" class="h-full w-full object-cover filter brightness-75 group-hover/inc:brightness-100 transition-all duration-1000" alt="{{ $tit3 }}">
                        </div>

                        <!-- Detalles -->
                        <div class="flex-1 w-full text-center py-2 h-full flex flex-col">
                            <div class="inline-flex items-center justify-center gap-1.5 text-[9px] text-gray-500 border border-white/5 bg-white/5 px-3 py-1 rounded-full font-bold tracking-[0.2em] uppercase mb-4 w-max mx-auto">
                                <i class='bx bx-box'></i> ARRIBO: ESTIMADO
                            </div>
                            <h4 class="font-display text-2xl font-black text-white mb-2 group-hover/inc:text-yellow-500 transition-colors leading-none tracking-tight uppercase">{{ $tit3 }}</h4>
                            <p class="text-[11px] text-gray-400 font-light mb-auto leading-relaxed px-2">{{ $desc3 }}</p>
                            
                            <button class="mt-6 bg-white/5 text-white font-bold uppercase tracking-[0.2em] py-4 px-4 rounded-xl hover:bg-white hover:text-black transition-all border border-white/10 hover:border-transparent hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] w-full text-[10px]">
                                AGENDAR NOTIFICACIÓN
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        <!-- Empresa: Quienes Somos (Rediseño Moderno) -->
        <section id="empresa" class="relative py-24 md:py-32 flex flex-col items-center bg-tactical-900 overflow-hidden border-b border-white/5">
            <!-- Background Image con Overlay Cinematográfico -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1595590424283-b8f1784cb2c8?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-10 grayscale contrast-150">
                <div class="absolute inset-0 bg-gradient-to-t from-tactical-900 via-tactical-900/60 to-tactical-900"></div>
            </div>

            <div class="relative z-10 max-w-[95%] mx-auto px-6">
                <!-- Grid de 2 Columnas para Desktop -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    @php
                        $nTitle = $getD('nosotros', 'nosotros_main', 'header', 'DÉCADAS DE EXCELENCIA TÁCTICA');
                        $nDesc  = $getD('nosotros', 'nosotros_main', 'content', 'Balam Armería nació como un proyecto para proveer a los profesionales de la seguridad y entusiastas del tiro deportivo con el mejor equipamiento.');
                        $nImg   = $getD('nosotros', 'nosotros_main', 'image', asset('images/nosotros_tigre_v2.png'));
                    @endphp

                    <!-- Columna Izquierda: Imagen de Marca Táctica (Tigre) -->
                    <div class="relative order-2 lg:order-1 flex justify-center">
                        <div class="relative rounded-3xl overflow-hidden border border-white/10 shadow-[0_20px_40px_rgba(0,0,0,0.6)] group max-w-sm md:max-w-md">
                            <img src="{{ $nImg }}" alt="Balam Armería - Elite" class="w-full h-auto transform group-hover:scale-105 transition-transform duration-1000">
                        </div>
                        
                        <!-- Badge de Calidad Flotante -->
                        <div class="absolute -bottom-4 -left-4 bg-tactical-900 border border-white/10 p-4 rounded-2xl shadow-2xl backdrop-blur-xl flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#e67e22]/10 border border-[#e67e22]/30 flex items-center justify-center text-[#e67e22]">
                                <i class='bx bxs-check-shield text-2xl'></i>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-500 font-mono uppercase tracking-widest leading-none mb-1">Certificación</p>
                                <p class="text-white font-bold text-sm uppercase italic">Calidad Élite</p>
                            </div>
                        </div>
                    </div>

                    <!-- Columna Derecha: Texto y Valores -->
                    <div class="flex flex-col text-center lg:text-left order-1 lg:order-2">
                        <span class="text-[#e67e22] font-bold tracking-[0.5em] uppercase text-[10px] md:text-sm mb-6 flex items-center justify-center lg:justify-start gap-3">
                            <span class="w-8 h-[1px] bg-[#e67e22]/50"></span>
                            ¿QUIÉNES SOMOS?
                        </span>
                        <h2 class="font-display text-4xl md:text-6xl lg:text-7xl font-black text-white mb-8 leading-[1] uppercase tracking-tighter drop-shadow-[0_15px_30px_rgba(0,0,0,0.5)]">
                            {{ $nTitle }}
                        </h2>
                        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light mb-10 italic border-l-2 lg:border-l-4 border-[#e67e22]/30 pl-6">
                            {{ $nDesc }}
                        </p>

                        <!-- Highlights Tácticos -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12">
                            <div class="flex flex-col items-center lg:items-start group">
                                <i class='bx bx-award text-3xl text-[#e67e22] mb-3 group-hover:scale-110 transition-transform'></i>
                                <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-1">Experiencia</h5>
                                <p class="text-gray-500 text-[10px] uppercase font-mono">15+ Años en el Mercado</p>
                            </div>
                            <div class="flex flex-col items-center lg:items-start group">
                                <i class='bx bx-support text-3xl text-[#e67e22] mb-3 group-hover:scale-110 transition-transform'></i>
                                <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-1">Soporte</h5>
                                <p class="text-gray-500 text-[10px] uppercase font-mono">Asesoramiento Experto</p>
                            </div>
                            <div class="flex flex-col items-center lg:items-start group">
                                <i class='bx bx-target-lock text-3xl text-[#e67e22] mb-3 group-hover:scale-110 transition-transform'></i>
                                <h5 class="text-white font-bold uppercase tracking-widest text-xs mb-1">Precisión</h5>
                                <p class="text-gray-500 text-[10px] uppercase font-mono">Equipo de Alta Gama</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marquee de Marcas removido por solicitud del usuario -->
            </div>
        </section>

        <!-- Red de Sedes y Contacto (Mapas Integrados) -->
        <section id="contacto" class="py-16 bg-[#050505] relative z-10 overflow-hidden border-t border-white/5">
            <!-- 1. Capas de Fondo de Nivel Profesional / Elite Tactical -->
            
            <!-- Ruido y Textura Base (Obsidian Noise) -->
            <div class="absolute inset-0 bg-noise opacity-[0.03] pointer-events-none"></div>
            
            <!-- Topografía Digital (Ultra-Sutil) -->
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/binding-dark.png')] opacity-20 pointer-events-none"></div>
            
            <!-- Grid de fondo tecnológico de precisión -->
            <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.01)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.01)_1px,transparent_1px)] bg-[size:100px_100px] pointer-events-none"></div>
            
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
                        <div class="location-card relative group cursor-pointer" onclick="switchContactBranch('poptun')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-accent-primary/0 to-accent-primary/0 group-hover:from-accent-primary/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-accent-primary/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-primary/50 transition-all relative">
                                        <img src="{{ $getD('sucursales', 'poptun', 'image', asset('images/sucursales/poptun.png')) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-accent-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-accent-primary tracking-widest uppercase">BALAM 01</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-accent-primary transition-colors leading-tight">Sede Poptún</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Barrio El Centro, Petén</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=16.3314,-89.4183','_blank')" class="flex-1 bg-white/5 hover:bg-accent-primary hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-accent-primary">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('{{ asset('images/sucursales/poptun.png') }}', 'Sede Poptún')" class="flex-1 bg-white/5 hover:bg-accent-primary/10 hover:border-accent-primary/50 hover:text-accent-primary py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-accent-primary/20 hover:-translate-y-0.5">
                                                <i class='bx bx-camera'></i> VER FOTO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede San Luis -->
                        <div class="location-card relative group cursor-pointer" onclick="switchContactBranch('sanluis')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-accent-primary/0 to-accent-primary/0 group-hover:from-accent-primary/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-accent-primary/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-primary/50 transition-all relative">
                                        <img src="{{ $getD('sucursales', 'sanluis', 'image', 'https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=600&auto=format&fit=crop') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-accent-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-accent-primary tracking-widest uppercase">BALAM 02</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-accent-primary transition-colors leading-tight">Sede San Luis</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Calle Principal, Petén</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=16.1956,-89.4442','_blank')" class="flex-1 bg-white/5 hover:bg-accent-primary hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-accent-primary">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1595590424283-b8f17842773f?q=80&w=1200', 'Sede San Luis')" class="flex-1 bg-white/5 hover:bg-accent-primary/10 hover:border-accent-primary/50 hover:text-accent-primary py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-accent-primary/20 hover:-translate-y-0.5">
                                                <i class='bx bx-camera'></i> VER FOTO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sede Melchor -->
                        <div class="location-card relative group cursor-pointer" onclick="switchContactBranch('melchor')">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-accent-primary/0 to-accent-primary/0 group-hover:from-accent-primary/30 group-hover:to-transparent rounded-2xl blur opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                            <div class="relative bg-tactical-900/60 backdrop-blur-xl border border-white/5 rounded-2xl p-5 group-hover:border-accent-primary/30 transition-all duration-300">
                                <div class="flex items-center gap-5">
                                    <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 border border-white/10 group-hover:border-accent-primary/50 transition-all relative">
                                        <img src="{{ $getD('sucursales', 'melchor', 'image', 'https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=600&auto=format&fit=crop') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-accent-primary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] font-black text-accent-primary tracking-widest uppercase">BALAM 03</span>
                                        </div>
                                        <h4 class="text-2xl font-bold text-white group-hover:text-accent-primary transition-colors leading-tight">Sede Melchor</h4>
                                        <p class="text-gray-300 text-xs tracking-wide opacity-80 mt-1 font-medium">Frontera, Melchor de Mencos</p>
                                        
                                        <div class="flex gap-2 mt-4">
                                            <button onclick="event.stopPropagation(); window.open('https://www.google.com/maps/search/?api=1&query=17.0628,-89.1558','_blank')" class="flex-1 bg-white/5 hover:bg-accent-primary hover:text-black py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 hover:border-accent-primary">
                                                <i class='bx bxs-map'></i> MAPS
                                            </button>
                                            <button onclick="event.stopPropagation(); openLightbox('https://images.unsplash.com/photo-1584282361661-04eecb31548e?q=80&w=1200', 'Sede Melchor')" class="flex-1 bg-white/5 hover:bg-accent-primary/10 hover:border-accent-primary/50 hover:text-accent-primary py-2.5 rounded-lg text-xs font-bold uppercase transition-all flex items-center justify-center gap-2 border border-white/5 shadow-sm hover:shadow-accent-primary/20 hover:-translate-y-0.5">
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

            </div>
        </section>

    <!-- Sección de Contacto Dinámica por Sede -->
    <section id="contacto-cards" class="py-20 relative bg-tactical-800 cyber-grid-bg border-b border-white/5 z-10 transition-colors">
        <div class="max-w-7xl mx-auto px-4 z-10 relative">
            <div class="text-center mb-10">
                <span class="text-accent-primary font-bold tracking-widest text-[10px] uppercase border border-accent-primary/30 py-1.5 px-4 rounded-full bg-accent-primary/10 shadow-[0_0_15px_rgba(234,179,8,0.2)]">Centro de Comunicaciones</span>
                <h2 class="font-display text-4xl lg:text-5xl font-bold text-white mt-6 drop-shadow-[0_0_15px_rgba(234,179,8,0.4)]">Contáctanos</h2>
                <p class="text-gray-400 text-sm mt-4 font-light max-w-xl mx-auto">Conecta con nuestros especialistas. Selecciona una sede para comunicarte directamente con su equipo.</p>
            </div>

            <!-- Selector de Sucursales -->
            <div class="flex flex-wrap justify-center gap-3 md:gap-6 mb-12">
                <button onclick="switchContactBranch('poptun')" id="btn-poptun" class="contact-tab px-6 py-2.5 rounded-full border border-accent-primary bg-accent-primary/10 text-white font-mono text-[11px] font-bold uppercase tracking-widest shadow-[0_0_15px_rgba(234,179,8,0.3)] transition-all hover:scale-105 active:scale-95"><i class='bx bx-map mr-1'></i> Poptún</button>
                <button onclick="switchContactBranch('sanluis')" id="btn-sanluis" class="contact-tab px-6 py-2.5 rounded-full border border-white/10 bg-white/5 text-gray-400 font-mono text-[11px] font-bold uppercase tracking-widest transition-all hover:bg-white/10 hover:text-white hover:scale-105 active:scale-95"><i class='bx bx-map mr-1'></i> San Luis</button>
                <button onclick="switchContactBranch('melchor')" id="btn-melchor" class="contact-tab px-6 py-2.5 rounded-full border border-white/10 bg-white/5 text-gray-400 font-mono text-[11px] font-bold uppercase tracking-widest transition-all hover:bg-white/10 hover:text-white hover:scale-105 active:scale-95"><i class='bx bx-map mr-1'></i> Melchor</button>
            </div>

            <!-- Grid de Redes Sociales y Contacto -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- [FIJO] Teléfono Central Empresa -->
                <a href="https://wa.me/50251736991" target="_blank" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-[#e67e22]/30 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(230,126,34,0.15)] bg-gradient-to-r from-[#e67e22]/10 to-transparent">
                    <div class="w-14 h-14 rounded-xl bg-[#e67e22]/20 flex items-center justify-center text-[#e67e22] group-hover:text-white group-hover:bg-[#e67e22] transition-all shadow-[0_0_15px_rgba(230,126,34,0.3)]">
                        <i class='bx bxs-business text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-[#e67e22] font-mono tracking-widest uppercase font-bold">Línea Central Empresa</p>
                        <h4 class="text-white font-bold text-lg mt-0.5 group-hover:text-gray-300 transition-colors">+502 5173 6991</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-[#e67e22] group-hover:text-white transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- [FIJO] Correo -->
                <a href="mailto:balamarmasymuniciones@gmail.com" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(255,255,255,0.05)] hover:border-gray-500/50">
                    <div class="w-14 h-14 rounded-xl bg-gray-500/10 flex items-center justify-center text-gray-400 group-hover:text-white group-hover:bg-gray-500/30 transition-all">
                        <i class='bx bx-envelope text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1 break-all">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Correo Oficial</p>
                        <h4 class="text-white font-bold text-xs md:text-sm mt-0.5 group-hover:text-gray-300 transition-colors">balamarmasymuniciones<br>@gmail.com</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-white transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- [DINÁMICO] WhatsApp Sucursal -->
                <a id="dyn-wa-link" href="https://wa.me/50240430725" target="_blank" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(37,211,102,0.15)] hover:border-[#25D366]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#25D366]/10 flex items-center justify-center text-[#25D366] group-hover:text-white group-hover:bg-[#25D366] transition-all shadow-[0_0_15px_rgba(37,211,102,0.2)]">
                        <i class='bx bxl-whatsapp text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">WhatsApp Sucursal</p>
                        <h4 id="dyn-wa-num" class="text-white font-bold text-lg mt-0.5 group-hover:text-[#25D366] transition-colors">+502 4043 0725</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#25D366] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- [DINÁMICO] Facebook -->
                <a id="dyn-fb-link" href="https://www.facebook.com/share/1AuQFGQPtt/?mibextid=wwXIfr" target="_blank" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(24,119,242,0.15)] hover:border-[#1877F2]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#1877F2]/10 flex items-center justify-center text-[#1877F2] group-hover:text-white group-hover:bg-[#1877F2] transition-all shadow-[0_0_15px_rgba(24,119,242,0.2)]">
                        <i class='bx bxl-facebook text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Facebook</p>
                        <h4 id="dyn-fb-alias" class="text-white font-bold text-lg mt-0.5 group-hover:text-[#1877F2] transition-colors line-clamp-1">Balam Poptún</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#1877F2] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- [DINÁMICO] Instagram -->
                <a id="dyn-ig-link" href="https://www.instagram.com/balampoptun?igsh=MXNmM210ZDVxYTYzOA==" target="_blank" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(225,48,108,0.15)] hover:border-[#E1306C]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#E1306C]/10 flex items-center justify-center text-[#E1306C] group-hover:text-white group-hover:bg-gradient-to-br group-hover:from-[#833AB4] group-hover:via-[#FD1D1D] group-hover:to-[#F56040] transition-all shadow-[0_0_15px_rgba(225,48,108,0.2)]">
                        <i class='bx bxl-instagram text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Instagram</p>
                        <h4 id="dyn-ig-alias" class="text-white font-bold text-sm lg:text-md mt-0.5 group-hover:text-[#E1306C] transition-colors line-clamp-1">@balampoptun</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#E1306C] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

                <!-- [DINÁMICO] TikTok -->
                <a id="dyn-tk-link" href="https://www.tiktok.com/@balampoptun?_r=1&_t=ZS-959MbJz25Ya" target="_blank" class="glass-card mouse-glow flex items-center p-6 rounded-2xl group border border-white/5 cursor-pointer transition-all hover:-translate-y-2 hover:shadow-[0_10px_30px_rgba(255,0,80,0.15)] hover:border-[#FF0050]/50">
                    <div class="w-14 h-14 rounded-xl bg-[#FF0050]/10 flex items-center justify-center text-[#FF0050] group-hover:text-white group-hover:bg-gradient-to-br group-hover:from-[#00f2fe] group-hover:to-[#4facfe] transition-all shadow-[0_0_15px_rgba(255,0,80,0.2)]">
                        <i class='bx bxl-tiktok text-3xl'></i>
                    </div>
                    <div class="ml-5 flex-1">
                        <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">TikTok</p>
                        <h4 id="dyn-tk-alias" class="text-white font-bold text-sm lg:text-md mt-0.5 group-hover:text-[#00f2fe] transition-colors line-clamp-1">@balampoptun</h4>
                    </div>
                    <i class='bx bx-right-arrow-alt text-2xl text-gray-600 group-hover:text-[#00f2fe] transition-colors group-hover:translate-x-1 duration-300'></i>
                </a>

            </div>

            <!-- CTA Bar -->
            <div class="mt-16 bg-tactical-900/80 p-8 rounded-3xl border border-white/10 flex flex-col md:flex-row items-center justify-between gap-6 backdrop-blur-xl">
                <div>
                    <h3 class="text-white font-bold text-2xl font-display">¿Necesitas ayuda inmediata?</h3>
                    <p class="text-gray-400 text-sm mt-2 font-light">Nuestros asesores de la sucursal activa están listos para guiar tu próxima adquisición.</p>
                </div>
                <a id="cta-wa-link" href="https://wa.me/50240430725" target="_blank" class="bg-[#25D366] hover:bg-[#20c35b] text-white px-8 py-4 rounded-xl font-bold tracking-widest transition-all shadow-[0_0_20px_rgba(37,211,102,0.4)] hover:shadow-[0_0_30px_rgba(37,211,102,0.6)] flex items-center gap-3 hover:-translate-y-1">
                    <i class='bx bxl-whatsapp text-2xl'></i>
                    CHATEAR CON POPTÚN
                </a>
            </div>
        </div>
        
        <script>
            const branchContacts = {
                poptun: {
                    name: '{{ $getD('sucursales', 'poptun', 'header', 'Sede Poptún') }}',
                    address: '{{ $getD('sucursales', 'poptun', 'description', 'Barrio El Centro, Petén') }}',
                    coords: '{{ $getD('sucursales', 'poptun', 'content', '16.3314,-89.4183') }}',
                    wa: { num: '+502 4043 0725', link: 'https://wa.me/50240430725' },
                    fb: { alias: 'Balam Poptún',   link: 'https://www.facebook.com/share/1AuQFGQPtt/?mibextid=wwXIfr' },
                    ig: { alias: '@balampoptun',  link: 'https://www.instagram.com/balampoptun?igsh=MXNmM210ZDVxYTYzOA==' },
                    tk: { alias: '@balampoptun',  link: 'https://www.tiktok.com/@balampoptun?_r=1&_t=ZS-959MbJz25Ya' }
                },
                sanluis: {
                    name: '{{ $getD('sucursales', 'sanluis', 'header', 'Sede San Luis') }}',
                    address: '{{ $getD('sucursales', 'sanluis', 'description', 'Calle Principal, Petén') }}',
                    coords: '{{ $getD('sucursales', 'sanluis', 'content', '16.1956,-89.4442') }}',
                    wa: { num: '+502 4903 8728', link: 'https://wa.me/50249038728' },
                    fb: { alias: 'Balam San Luis', link: 'https://www.facebook.com/share/1NULrBuz4A/?mibextid=wwXIfr' },
                    ig: { alias: '@balamsanluis', link: 'https://www.instagram.com/balamsanluis?igsh=enB5cHl2bTAzODd3' },
                    tk: { alias: '@balamsanluis1', link: 'https://www.tiktok.com/@balamsanluis1?_r=1&_t=ZS-959Mvvx5eeS' }
                },
                melchor: {
                    name: '{{ $getD('sucursales', 'melchor', 'header', 'Sede Melchor') }}',
                    address: '{{ $getD('sucursales', 'melchor', 'description', 'Frontera, Melchor de Mencos') }}',
                    coords: '{{ $getD('sucursales', 'melchor', 'content', '17.0628,-89.1558') }}',
                    wa: { num: '+502 4499 7414', link: 'https://wa.me/50244997414' },
                    fb: { alias: 'Balam Melchor',  link: 'https://www.facebook.com/share/1DjAQtgF6N/?mibextid=wwXIfr' },
                    ig: { alias: '@balammelchordemencos', link: 'https://www.instagram.com/balammelchordemencos?igsh=MWsyNzU4djBocm51Yw==' },
                    tk: { alias: '@balam__22',     link: 'https://www.tiktok.com/@balam__22?_r=1&_t=ZS-959N4cOkqtY' }
                }
            };

            function switchContactBranch(branch) {
                // 1. Apagar todos los botones
                document.querySelectorAll('.contact-tab').forEach(btn => {
                    btn.classList.remove('bg-accent-primary/10', 'border-accent-primary', 'text-white', 'shadow-[0_0_15px_rgba(234,179,8,0.3)]');
                    btn.classList.add('bg-white/5', 'border-white/10', 'text-gray-400');
                });
                
                // Encender el botón clickeado
                let activeBtn = document.getElementById('btn-' + branch);
                activeBtn.classList.remove('bg-white/5', 'border-white/10', 'text-gray-400');
                activeBtn.classList.add('bg-accent-primary/10', 'border-accent-primary', 'text-white', 'shadow-[0_0_15px_rgba(234,179,8,0.3)]');

                // 2. Extraer los datos correctos
                const data = branchContacts[branch];
                
                // 3. Sincronizar el Mapa (Si la función existe en main.js)
                if (window.showLocation) {
                    window.showLocation(data.coords, data.name, data.address);
                }

                // 4. Animación GSAP para "refrescar" los datos de contacto
                const dynElements = [
                    'dyn-wa-link', 'dyn-fb-link', 'dyn-ig-link', 'dyn-tk-link'
                ];
                
                gsap.to(dynElements.map(id => document.getElementById(id)), {
                    opacity: 0,
                    y: 10,
                    duration: 0.2,
                    stagger: 0.05,
                    onComplete: () => {
                        // Actualizar WhatsApp
                        document.getElementById('dyn-wa-link').href = data.wa.link;
                        document.getElementById('dyn-wa-num').innerText = data.wa.num;
                        const ctaBtn = document.getElementById('cta-wa-link');
                        ctaBtn.href = data.wa.link;
                        ctaBtn.innerHTML = `<i class='bx bxl-whatsapp text-2xl'></i> CHATEAR CON ${branch.toUpperCase()}`;
                        
                        // Actualizar Facebook
                        document.getElementById('dyn-fb-link').href = data.fb.link;
                        document.getElementById('dyn-fb-alias').innerText = data.fb.alias;

                        // Actualizar Instagram
                        document.getElementById('dyn-ig-link').href = data.ig.link;
                        document.getElementById('dyn-ig-alias').innerText = data.ig.alias;

                        // Actualizar TikTok
                        document.getElementById('dyn-tk-link').href = data.tk.link;
                        document.getElementById('dyn-tk-alias').innerText = data.tk.alias;

                        // Aparecer con animación
                        gsap.to(dynElements.map(id => document.getElementById(id)), {
                            opacity: 1,
                            y: 0,
                            duration: 0.4,
                            stagger: 0.05,
                            ease: "back.out(1.7)"
                        });
                    }
                });
            }
            // Exponer la función globalmente para los handlers onclick
            window.switchContactBranch = switchContactBranch;
        </script>
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
                <p class="mt-6 text-sm text-gray-500 leading-relaxed font-light uppercase tracking-tight">
                    Excelencia, trayectoria legal y el mejor equipamiento táctico en Guatemala. Somos la armería líder y tu aliado estratégico para cada misión.
                </p>
                <div class="flex gap-3 mt-8">
                    <a href="https://www.facebook.com/share/1AuQFGQPtt/?mibextid=wwXIfr" target="_blank" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center text-gray-400 hover:bg-[#1877F2] hover:text-white hover:border-[#1877F2] hover:shadow-[0_0_15px_rgba(24,119,242,0.4)] transition-all">
                        <i class='bx bxl-facebook text-xl'></i>
                    </a>
                    <a href="https://www.instagram.com/balampoptun?igsh=MXNmM210ZDVxYTYzOA==" target="_blank" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center text-gray-400 hover:bg-[#E1306C] hover:text-white hover:border-[#E1306C] hover:shadow-[0_0_15px_rgba(225,48,108,0.4)] transition-all">
                        <i class='bx bxl-instagram text-xl'></i>
                    </a>
                    <a href="https://www.tiktok.com/@balampoptun?_r=1&_t=ZS-959MbJz25Ya" target="_blank" class="w-10 h-10 rounded-xl bg-tactical-800 border border-white/5 flex items-center justify-center text-gray-400 hover:bg-[#00f2fe] hover:text-black hover:border-[#00f2fe] hover:shadow-[0_0_15px_rgba(0,242,254,0.4)] transition-all">
                        <i class='bx bxl-tiktok text-xl'></i>
                    </a>
                </div>
            </div>

            <!-- Columna 2: Navegación -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-compass text-accent-primary'></i> Navegación
                </h4>
                <ul class="flex flex-col gap-4">
                    <li><a href="#inicio" onclick="scrollToSection('#inicio', event)" class="text-gray-400 hover:text-accent-primary text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Inicio</a></li>
                    <li><a href="#catalogo" onclick="scrollToSection('#catalogo', event)" class="text-gray-400 hover:text-accent-primary text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nuestro Catálogo</a></li>
                    <li><a href="#empresa" onclick="scrollToSection('#empresa', event)" class="text-gray-400 hover:text-accent-primary text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Nosotros</a></li>
                    <li><a href="#contacto" onclick="scrollToSection('#contacto', event)" class="text-gray-400 hover:text-accent-primary text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group"><i class='bx bx-chevron-right text-gray-600 group-hover:text-accent-primary transition-colors'></i> Ubicaciones</a></li>
                </ul>
            </div>

            <!-- Columna 3: Servicios -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-crosshair text-accent-primary'></i> Servicios
                </h4>
                <ul class="flex flex-col gap-4">
                    <li class="text-gray-400 text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group hover:text-white cursor-default"><i class='bx bx-check-double text-gray-600 group-hover:text-accent-cyan'></i> Venta de Armas</li>
                    <li class="text-gray-400 text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group hover:text-white cursor-default"><i class='bx bx-check-double text-gray-600 group-hover:text-accent-cyan'></i> Municiones Varios Calibres</li>
                    <li class="text-gray-400 text-[11px] font-bold uppercase tracking-widest flex items-center gap-2 transition-colors group hover:text-white cursor-default"><i class='bx bx-check-double text-gray-600 group-hover:text-accent-cyan'></i> Equipo Táctico Profesional</li>

                </ul>
            </div>

            <!-- Columna 4: Estado Operativo -->
            <div>
                <h4 class="text-white font-bold font-display uppercase tracking-widest mb-6 flex items-center gap-2 text-sm">
                    <i class='bx bx-pulse text-accent-primary'></i> Estado de Servicio
                </h4>
                <div class="bg-tactical-800/40 p-6 rounded-2xl border border-white/5 relative overflow-hidden group hover:border-white/10 transition-colors backdrop-blur-md">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent-primary/5 to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="flex justify-between items-center text-[10px] mb-4 border-b border-white/5 pb-3">
                        <span class="text-gray-400 font-bold uppercase tracking-widest">Atención L-V</span>
                        <span class="text-white font-mono font-bold tracking-wider bg-black/40 px-2 py-1 rounded">08:00 - 18:00</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] mb-6 border-b border-white/5 pb-3">
                        <span class="text-gray-400 font-bold uppercase tracking-widest">Sábados</span>
                        <span class="text-white font-mono font-bold tracking-wider bg-black/40 px-2 py-1 rounded">08:00 - 12:00</span>
                    </div>
                    
                    <div id="footer-status-badge" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 shadow-[0_0_15px_rgba(34,197,94,0.1)] transition-all">
                        <span id="footer-status-dot" class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]"></span>
                        <span id="footer-status-text" class="text-green-500 text-[10px] font-black tracking-[0.2em] uppercase">Unidades Activas</span>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Bottom Footer (Copyright y Develotech) - FIXED -->
        <div class="fixed bottom-0 left-0 w-full z-[100] bg-[#030406]/95 backdrop-blur-xl py-4 border-t border-white/5 shadow-[0_-15px_40px_rgba(0,0,0,0.9)]">
            <div class="max-w-[95%] mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-3">
                <div class="text-gray-400 text-[9px] sm:text-[10px] font-mono tracking-[0.2em] uppercase leading-relaxed text-center md:text-left order-2 md:order-1">
                    &copy; 2026 BALAM Armas y Municiones. todos los derechos reservados. guatemala, c.a.
                </div>
                
                <a href="https://develotechgt.com/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 group cursor-pointer order-1 md:order-2 bg-white/5 px-4 py-1.5 rounded-full border border-white/5 hover:border-accent-primary/30 transition-all">
                    <span class="text-accent-primary font-mono text-[10px]">&lt;/&gt;</span>
                    <span class="text-[9px] sm:text-[10px] font-black tracking-[0.3em] text-gray-500 group-hover:text-white transition-colors uppercase">
                        hecho por develotch
                    </span>
                </a>
            </div>
        </div>

        <script>
            function updateFooterStatus() {
                const now = new Date();
                const day = now.getDay(); // 0=Sun, 1=Mon, ..., 6=Sat
                const hour = now.getHours();
                const minutes = now.getMinutes();
                const time = hour + minutes / 60;

                let isOpen = false;
                if (day >= 1 && day <= 5) { // Lunes a Viernes
                    if (time >= 8 && time < 18) isOpen = true;
                } else if (day === 6) { // Sábado
                    if (time >= 8 && time < 12) isOpen = true;
                }

                const badge = document.getElementById('footer-status-badge');
                const dot = document.getElementById('footer-status-dot');
                const text = document.getElementById('footer-status-text');

                if (isOpen) {
                    badge.className = 'w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-green-500/10 border border-green-500/20 shadow-[0_0_15px_rgba(34,197,94,0.1)]';
                    dot.className = 'w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse shadow-[0_0_10px_rgba(34,197,94,0.8)]';
                    text.innerText = 'Unidades Activas';
                    text.className = 'text-green-500 text-[10px] font-black tracking-[0.2em] uppercase';
                } else {
                    badge.className = 'w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 shadow-[0_0_15px_rgba(239,68,68,0.1)]';
                    dot.className = 'w-2.5 h-2.5 rounded-full bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.8)]';
                    text.innerText = 'Fuera de Operación';
                    text.className = 'text-red-500 text-[10px] font-black tracking-[0.2em] uppercase';
                }
            }
            updateFooterStatus();
            setInterval(updateFooterStatus, 60000); // Actualizar cada minuto
        </script>
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

    <!-- Mobile menu JS -->
    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('mobile-nav');
            const bars = document.querySelectorAll('.mobile-bar');
            const isOpen = !nav.classList.contains('hidden');
            if (isOpen) {
                nav.classList.add('hidden');
                nav.classList.remove('flex');
                bars[0].style.transform = '';
                bars[1].style.opacity = '';
                bars[2].style.transform = '';
            } else {
                nav.classList.remove('hidden');
                nav.classList.add('flex');
                bars[0].style.transform = 'translateY(7px) rotate(45deg)';
                bars[1].style.opacity = '0';
                bars[2].style.transform = 'translateY(-7px) rotate(-45deg)';
            }
        }
        function closeMobileMenu() {
            const nav = document.getElementById('mobile-nav');
            const bars = document.querySelectorAll('.mobile-bar');
            nav.classList.add('hidden');
            nav.classList.remove('flex');
            bars[0].style.transform = '';
            bars[1].style.opacity = '';
            bars[2].style.transform = '';
        }
        function openCatDrawer() {
            const drawer   = document.getElementById('cat-drawer');
            const backdrop = document.getElementById('cat-drawer-backdrop');
            backdrop.style.display = 'block';
            drawer.getBoundingClientRect();
            drawer.style.transform = 'translateX(0)';
            document.body.style.overflow = 'hidden';
        }
        function closeCatDrawer() {
            const drawer   = document.getElementById('cat-drawer');
            const backdrop = document.getElementById('cat-drawer-backdrop');
            drawer.style.transform = 'translateX(-100%)';
            setTimeout(() => { backdrop.style.display = 'none'; }, 300);
            document.body.style.overflow = '';
        }
        function toggleDrawerAccordion(listId, iconId) {
            const list = document.getElementById(listId);
            const icon = document.getElementById(iconId);
            if (!list) return;
            const isOpen = list.style.display === 'flex';
            list.style.display = isOpen ? 'none' : 'flex';
            if (icon) icon.className = isOpen ? 'bx bx-plus' : 'bx bx-minus';
        }
        // Mostrar FAB solo cuando el usuario está sobre la sección #catalogo
        document.addEventListener('DOMContentLoaded', function() {
            const fab     = document.getElementById('cat-fab');
            const section = document.getElementById('catalogo');
            if (!fab || !section) return;
            // Solo en móvil/tablet (< 1024px)
            const mq = window.matchMedia('(max-width:1023px)');
            if (!mq.matches) return;
            const observer = new IntersectionObserver(entries => {
                entries.forEach(e => {
                    fab.style.display = e.isIntersecting ? 'flex' : 'none';
                });
            }, { threshold: 0.05 });
            observer.observe(section);
        });
    </script>

    <!-- ===== DRAWER CATEGORÍAS MÓVIL (body-level para que fixed funcione) ===== -->
    <div id="cat-drawer-backdrop" onclick="closeCatDrawer()" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.75);backdrop-filter:blur(4px);z-index:9000"></div>
    <div id="cat-drawer" style="position:fixed;top:0;left:0;height:100%;width:288px;max-width:85vw;background:#0c0c0c;border-right:1px solid rgba(255,255,255,0.08);z-index:9100;transform:translateX(-100%);transition:transform 0.3s ease;overflow-y:auto">
        <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid rgba(255,255,255,0.08)">
            <span style="font-family:inherit;font-weight:900;font-size:1.25rem;color:#fff;text-transform:uppercase;letter-spacing:.05em">Categorías</span>
            <button onclick="closeCatDrawer()" style="width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.05);border:none;color:#9ca3af;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1.25rem">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div style="padding:12px 16px">
            <ul style="list-style:none;padding:0;margin:0;border-top:1px solid rgba(255,255,255,0.05)">
                <li>
                    <a href="#catalogo" onclick="showAllProducts();closeCatDrawer()" style="display:flex;align-items:center;justify-content:space-between;padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.05);color:#fff;text-decoration:none;font-weight:700;font-size:.8rem;text-transform:uppercase;letter-spacing:.07em">
                        Todos los Productos <i class='bx bx-check-circle' style="color:#00f0ff;font-size:1.1rem"></i>
                    </a>
                </li>
                @if(isset($menuCategorias))
                    @foreach($menuCategorias as $cat)
                    <li style="border-bottom:1px solid rgba(255,255,255,0.05)">
                        <div onclick="toggleDrawerAccordion('dcat-{{ $cat['slug'] }}','dico-{{ $cat['slug'] }}')" style="display:flex;align-items:center;justify-content:space-between;padding:14px 0;cursor:pointer;color:#fff;font-weight:700;font-size:.8rem;text-transform:uppercase;letter-spacing:.07em">
                            {{ $cat['nombre'] }} <i class='bx bx-plus' id="dico-{{ $cat['slug'] }}" style="color:#6b7280;font-size:1.1rem"></i>
                        </div>
                        <ul id="dcat-{{ $cat['slug'] }}" style="display:none;flex-direction:column;padding:0 0 10px 12px;margin:0;list-style:none;gap:2px">
                            <li>
                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $cat['slug'] }}','cat',this);closeCatDrawer()" style="display:block;padding:8px 0;color:#9ca3af;text-decoration:none;font-size:.68rem;text-transform:uppercase;letter-spacing:.1em;font-family:monospace">Ver Todo de {{ $cat['nombre'] }}</a>
                            </li>
                            @foreach($cat['subcategorias'] as $sub)
                            <li>
                                <a href="#catalogo" onclick="updateProductsByFilter('{{ $sub['slug'] }}','subcat',this);closeCatDrawer()" style="display:block;padding:8px 0;color:#6b7280;text-decoration:none;font-size:.68rem;text-transform:uppercase;letter-spacing:.1em;font-family:monospace">{{ $sub['nombre'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <!-- FAB flotante categorías (body-level) -->
    <button id="cat-fab" onclick="openCatDrawer()" style="display:none;position:fixed;left:12px;bottom:96px;z-index:8900;width:48px;height:48px;border-radius:50%;background:#0c0c0c;border:1px solid rgba(0,240,255,0.4);color:#00f0ff;font-size:1.35rem;cursor:pointer;align-items:center;justify-content:center;box-shadow:0 0 20px rgba(0,240,255,0.25);transition:box-shadow 0.3s,transform 0.15s" title="Filtrar por Categoría">
        <i class='bx bx-filter-alt'></i>
    </button>

</body>
</html>
