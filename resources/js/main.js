// ==========================================
// IMPORTACIÓN DE LIBRERÍAS LOCALES (NPM)
// ==========================================
import '@fontsource/inter/300.css';
import '@fontsource/inter/400.css';
import '@fontsource/inter/500.css';
import '@fontsource/inter/600.css';
import '@fontsource/space-grotesk/400.css';
import '@fontsource/space-grotesk/600.css';
import '@fontsource/space-grotesk/700.css';
import 'boxicons/css/boxicons.min.css';
import 'swiper/css/bundle';

import Swiper from 'swiper/bundle';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Exponer globalmente si es necesario
window.Swiper = Swiper;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// 1. GSAP Global Inicializacion
gsap.registerPlugin(ScrollTrigger);

// Efectos de Reveal GSAP (Sin scroller override, usa el scroll nativo de Windows)
document.querySelectorAll('.gsap-reveal').forEach((el) => {
    gsap.fromTo(el,
        { autoAlpha: 0, y: 50 },
        {
            duration: 1, autoAlpha: 1, y: 0, ease: "power3.out",
            scrollTrigger: {
                trigger: el, start: "top 85%"
            }
        }
    );
});

// Lógica Navbar Fondo (Scroll Nativo)
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('bg-tactical-900/90', 'shadow-2xl');
        navbar.classList.remove('border-b', 'border-white/5');
    } else {
        navbar.classList.remove('bg-tactical-900/90', 'shadow-2xl');
        navbar.classList.add('border-b', 'border-white/5');
    }
});

// 5. EFECTO DINÁMICO DE RATÓN (CRISTAL QUE SIGUE AL CURSOR)
// Optimizado masivamente con requestAnimationFrame y cálculo de visibilidad
let glowCards = [];
let cursorX = 0, cursorY = 0;
let isGlowTicking = false;

document.addEventListener('DOMContentLoaded', () => {
    glowCards = Array.from(document.getElementsByClassName("mouse-glow"));
    
    // Si se cargan nuevos elementos mas adelante (ej: un modal), se debe refrescar este array
    const observer = new MutationObserver(() => {
        glowCards = Array.from(document.getElementsByClassName("mouse-glow"));
    });
    observer.observe(document.body, { childList: true, subtree: true });
});

document.addEventListener('mousemove', e => {
    cursorX = e.clientX;
    cursorY = e.clientY;
    
    if (!isGlowTicking) {
        requestAnimationFrame(() => {
            const h = window.innerHeight;
            glowCards.forEach(card => {
                const rect = card.getBoundingClientRect();
                // Solo renderiza si la tarjeta está dentro del viewport visible del usuario
                if (rect.top < h && rect.bottom > 0) {
                    const x = cursorX - rect.left;
                    const y = cursorY - rect.top;
                    card.style.setProperty("--mouse-x", `${x}px`);
                    card.style.setProperty("--mouse-y", `${y}px`);
                }
            });
            isGlowTicking = false;
        });
        isGlowTicking = true;
    }
});

// 6. LÓGICA DE FILTROS EN JAVASCRIPT
const filterCatRadios = document.querySelectorAll('input[name="cat"]');
const filterBranchRadios = document.querySelectorAll('input[name="branch"]');
const productItems = document.querySelectorAll('.product-item');
const noProductsMsg = document.getElementById('no-products-msg');

function filterProducts() {
    let checkedCat = document.querySelector('input[name="cat"]:checked');
    let checkedBranch = document.querySelector('input[name="branch"]:checked');

    if (!checkedCat || !checkedBranch) return;

    let selectedCat = checkedCat.value;
    let selectedBranch = checkedBranch.value;
    let visibleCount = 0;

    productItems.forEach(item => {
        let itemCat = item.getAttribute('data-cat');
        let itemBranches = item.getAttribute('data-branch'); // Ej: "hq,sur"

        // Checkers
        let catMatch = (selectedCat === 'all' || itemCat === selectedCat);
        let branchMatch = (selectedBranch === 'all' || itemBranches.includes(selectedBranch));

        if (catMatch && branchMatch) {
            item.classList.remove('product-hidden');
            visibleCount++;
        } else {
            item.classList.add('product-hidden');
        }
    });

    // Mostrar u ocultar mensaje de "No Resultados"
    if (visibleCount === 0) {
        noProductsMsg.classList.remove('hidden');
    } else {
        noProductsMsg.classList.add('hidden');
    }
}

// Asignar eventos a las radios
filterCatRadios.forEach(r => r.addEventListener('change', filterProducts));
filterBranchRadios.forEach(r => r.addEventListener('change', filterProducts));


// 7. LÓGICA MAPAS SATELITALES (MUESTRA LA POSICIÓN, SIN ENRUTAMIENTO)
window.showLocation = function (destinationCoords) {
    const mapMsg = document.getElementById('map-msg');
    const iframe = document.getElementById('google-map-iframe');

    // Encender radar visualmente
    mapMsg.style.opacity = '1';
    mapMsg.querySelector('p:last-child').innerText = "CALIBRANDO GPS...";

    // Pequeño timeout para el efecto UI de carga y actualizar iFrame
    setTimeout(() => {
        iframe.src = `https://maps.google.com/maps?q=${destinationCoords}&hl=es&z=17&t=m&output=embed`;

        // Apagar el overlay del radar 
        setTimeout(() => {
            mapMsg.style.opacity = '0';
        }, 400);
    }, 600);
};

// 8. LÓGICA LIGHTBOX IMÁGENES
window.openLightbox = function (imgSrc, title) {
    const lightbox = document.getElementById('image-lightbox');
    const img = document.getElementById('lightbox-img');
    const titleEl = document.getElementById('lightbox-title');

    img.src = imgSrc;
    titleEl.innerText = title;

    lightbox.classList.remove('opacity-0', 'pointer-events-none');
    // GSAP para entrada elegante
    gsap.fromTo(img,
        { scale: 0.8, opacity: 0 },
        { scale: 1, opacity: 1, duration: 0.6, ease: "expo.out" }
    );
};

window.closeLightbox = function () {
    const lightbox = document.getElementById('image-lightbox');
    lightbox.classList.add('opacity-0', 'pointer-events-none');
};

// 9. LÓGICA MODAL CATÁLOGO PRODUCTOS
window.openProductModal = function (title, imgSrc, category, branch, price, description, wsText) {
    const modal = document.getElementById('product-modal');
    const content = document.getElementById('product-modal-content');

    // Poblar datos dinámicamente
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-img').src = imgSrc;
    document.getElementById('modal-category').innerText = category;
    document.getElementById('modal-branch').innerHTML = `<i class='bx bx-map mr-1'></i> ${branch}`;
    document.getElementById('modal-price').innerText = price;
    document.getElementById('modal-desc').innerText = description;

    // Enlace de WhatsApp codificado
    document.getElementById('modal-whatsapp').href = `https://wa.me/50255556666?text=${encodeURIComponent(wsText)}`;

    // Mostrar modal (quitar opacidad y pointer-events)
    modal.classList.remove('opacity-0', 'pointer-events-none');

    // Animar la entrada con GSAP
    gsap.fromTo(content,
        { scale: 0.9, opacity: 0, y: 30 },
        { scale: 1, opacity: 1, y: 0, duration: 0.5, ease: "back.out(1.2)" }
    );
};

window.closeProductModal = function () {
    const modal = document.getElementById('product-modal');
    const content = document.getElementById('product-modal-content');

    // Animar salida con GSAP
    gsap.to(content, {
        scale: 0.9, opacity: 0, y: -20, duration: 0.4, ease: "power2.in",
        onComplete: () => {
            modal.classList.add('opacity-0', 'pointer-events-none');
        }
    });
};

// 10. CERRAR MODALES CON TECLA ESCAPE
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        const pModal = document.getElementById('product-modal');
        const lBox = document.getElementById('image-lightbox');

        if (pModal && !pModal.classList.contains('pointer-events-none')) {
            closeProductModal();
        }
        if (lBox && !lBox.classList.contains('pointer-events-none')) {
            closeLightbox();
        }
    }
});

// ==========================================
// ANIMACIÓN GSAP ENSAMBLAJE DENTRO DEL HERO
// ==========================================
const runAssemblyGSAP = (slideEl) => {
    const tl = gsap.timeline();
    if (!slideEl) return;

    // Set inicial local al slide activo para "Reiniciar"
    gsap.set(slideEl.querySelectorAll('.frag-1'), { x: -80, y: -60, rotation: -12, opacity: 0 });
    gsap.set(slideEl.querySelectorAll('.frag-2'), { y: 100, scale: 1.1, opacity: 0 });
    gsap.set(slideEl.querySelectorAll('.frag-3'), { x: 80, y: -60, rotation: 12, opacity: 0 });
    gsap.set(slideEl.querySelectorAll('.assembly-title'), { filter: 'blur(10px)', opacity: 0, y: 20 });
    gsap.set(slideEl.querySelectorAll('.assembly-card'), { opacity: 0, y: 50, transformPerspective: 1000, rotationX: -10 });
    gsap.set(slideEl.querySelectorAll('.assemble-grid'), { opacity: 0 });

    // Animar localmente
    tl.to(slideEl.querySelectorAll('.frag'), {
        x: 0, y: 0, rotation: 0, scale: 1, opacity: 1,
        duration: 1.1, ease: "back.out(1.5)", stagger: 0.15
    })
        .to(slideEl.querySelectorAll('.assemble-grid'), { opacity: 1, duration: 0.5 }, "-=0.5")
        .to(slideEl.querySelectorAll('.assembly-title'), { filter: 'blur(0px)', opacity: 1, y: 0, duration: 0.7, ease: "power2.out" }, "-=0.2")
        .to(slideEl.querySelectorAll('.assembly-card'), { opacity: 1, y: 0, rotationX: 0, duration: 0.7, ease: "power3.out" }, "-=0.3");
};

let assemblySwiper, videotecaSwiper, arsenalSwiper;
const initSwiper = () => {
    assemblySwiper = new Swiper('.assembly-slider', {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        on: {
            init: function () {
                setTimeout(() => {
                    runAssemblyGSAP(this.slides[this.activeIndex]);
                }, 300);
            },
            slideChangeTransitionStart: function () {
                runAssemblyGSAP(this.slides[this.activeIndex]);
            }
        }
    });

    videotecaSwiper = new Swiper('.videoteca-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.videoteca-pagination', clickable: true },
        // Esta configuración centra dinámicamente el contenido horizontalmente
        // Y desactiva el arrastre si las tarjetas caben en pantalla
        centerInsufficientSlides: true,
        watchOverflow: true,
        breakpoints: {
            768: { slidesPerView: 2, spaceBetween: 24 },
            1024: { 
                slidesPerView: 3, 
                spaceBetween: 30 
            }
        },
        navigation: {
            nextEl: '.videoteca-next',
            prevEl: '.videoteca-prev'
        }
    });

    arsenalSwiper = new Swiper('.arsenal-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: { delay: 3500, disableOnInteraction: false },
        pagination: { el: '.arsenal-pagination', clickable: true },
        centerInsufficientSlides: true,
        watchOverflow: true,
        breakpoints: {
            640: { slidesPerView: 2, spaceBetween: 20 },
            768: { slidesPerView: 3, spaceBetween: 24 },
            1024: { slidesPerView: 4, spaceBetween: 24 },
            1280: { slidesPerView: 5, spaceBetween: 30 }
        },
        navigation: {
            nextEl: '.arsenal-next',
            prevEl: '.arsenal-prev'
        }
    });
};

// ==========================================
// LÓGICA DE FILTRADO DE CATÁLOGO (BÚSQUEDA + RADIOS)
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('filter-search');
    const catRadios = document.querySelectorAll('input[name="cat"]');
    const branchRadios = document.querySelectorAll('input[name="branch"]');
    const products = document.querySelectorAll('.product-item');
    const noProductsMsg = document.getElementById('no-products-msg');

    if (!products.length) return;

    const filterProducts = () => {
        const searchTerm = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const activeCat = document.querySelector('input[name="cat"]:checked')?.value || 'all';
        const activeBranch = document.querySelector('input[name="branch"]:checked')?.value || 'all';

        let visibleCount = 0;

        products.forEach(product => {
            const prodCat = product.getAttribute('data-cat') || '';
            const prodBranch = product.getAttribute('data-branch') || '';
            const prodText = product.innerText.toLowerCase();

            // Match tests
            const textMatch = searchTerm === '' || prodText.includes(searchTerm);
            const catMatch = activeCat === 'all' || activeCat === prodCat;
            const branchMatch = activeBranch === 'all' || prodBranch.includes(activeBranch);

            if (textMatch && catMatch && branchMatch) {
                product.classList.remove('hidden');
                visibleCount++;
            } else {
                product.classList.add('hidden');
            }
        });

        if (noProductsMsg) {
            if (visibleCount === 0) {
                noProductsMsg.classList.remove('hidden');
            } else {
                noProductsMsg.classList.add('hidden');
            }
        }
    };

    // Event Listeners
    if (searchInput) searchInput.addEventListener('input', filterProducts);
    catRadios.forEach(radio => radio.addEventListener('change', filterProducts));
    branchRadios.forEach(radio => radio.addEventListener('change', filterProducts));
});

// ==========================================
// INTRO ANIMATION (SPLASH SCREEN 4D)
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    const introScreen = document.getElementById('intro-screen');
    if (!introScreen) return;

    // Bloquear scroll inicial mientras ocurre la animación
    document.body.style.overflow = 'hidden';
    document.body.style.maxHeight = '100vh';

    const tl = gsap.timeline({
        onComplete: () => {
            // Desbloquear scroll
            document.body.style.overflow = '';
            document.body.style.maxHeight = '';
            // Remover la pantalla de intro del DOM
            introScreen.remove();
        }
    });

    // 1. Mostrar iluminación/ambiente de fondo
    tl.to('.intro-ambient', { opacity: 1, duration: 1.5, ease: 'power2.out' })
        // 2. Mostrar logo desde abajo
        .to('.intro-logo-container', { opacity: 1, y: 0, scale: 1, duration: 1.2, ease: 'back.out(1.5)' }, "-=1.0")
        // 3. Mostrar título de Armería Balam
        .to('.intro-title', { opacity: 1, y: 0, duration: 1, ease: 'power3.out' }, "-=0.4")
        // 4. Mostrar "Armas y Municiones"
        .to('.intro-subtitle', { opacity: 1, y: 0, duration: 0.8, ease: 'power2.out' }, "-=0.5")
        // Pausa dramática para que lo vea el usuario
        .to({}, { duration: 1.5 })
        // 5. Efecto CORTINA 4D y Desvanecimiento simultáneo
        // Separar cortinas simulando abrir una puerta profunda
        .to('.left-curtain', { x: '-100%', rotationY: -15, duration: 1.8, ease: 'power4.inOut' }, "reveal")
        .to('.right-curtain', { x: '100%', rotationY: 15, duration: 1.8, ease: 'power4.inOut' }, "reveal")
        // Mostrar la página de atrás con un fade de entrada
        .to('#scroll-wrapper', { autoAlpha: 1, duration: 1.5, ease: 'power2.inOut' }, "reveal+=0.3")
        // Aumentar la escala de todo al frente para dar sensación de inmersión 3D
        .to('.intro-content', { scale: 1.3, opacity: 0, duration: 1.5, ease: 'power3.inOut' }, "reveal+=0.1")
        .to('.intro-ambient', { opacity: 0, duration: 1.2, ease: 'power2.inOut' }, "reveal+=0.3")
        // Desvanecer el screen container superior final
        .to(introScreen, {
            opacity: 0, duration: 0.5, onComplete: () => {
                // Iniciar el carrusel una vez que la pantalla principal y slider sean visibles
                if (typeof initSwiper === 'function') initSwiper();
            }
        }, "-=0.2");
});

// ============================================================
// BALAM – LÓGICA DE CURSOR TÁCTICO + EFECTO RIPPLE/DISTORSIÓN
// ============================================================
(function () {
    /* ==========================================================
       CONFIGURACIÓN — ajusta a tu gusto
    ========================================================== */
    const CFG = {
        rippleColor: '255, 26, 26',   // RGB del color de las ondas
        rippleOpacity: 0.55,            // opacidad máxima de cada onda
        rippleMaxR: 90,              // radio máximo de expansión (px)
        rippleSpeed: 2.2,             // qué tan rápido crece la onda
        rippleDecay: 0.022,           // qué tan rápido se desvanece
        rippleSpawnGap: 28,              // ms mínimos entre ondas al moverse
        trailGap: 30,              // ms entre partículas de rastro
        lagSpeed: 0.12,            // velocidad del lag del anillo
    };

    /* ==========================================================
       CANVAS RIPPLE
    ========================================================== */
    const canvas = document.getElementById('balam-ripple-canvas');
    if (!canvas) return; // fail safe
    const ctx = canvas.getContext('2d');

    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // Pool de ondas activas
    const ripples = [];

    function addRipple(x, y, radiusBoost = 0) {
        ripples.push({
            x, y,
            r: 4 + radiusBoost,
            opacity: CFG.rippleOpacity,
        });
    }

    function drawRipples() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        for (let i = ripples.length - 1; i >= 0; i--) {
            const rp = ripples[i];

            // Gradiente radial: anillo brillante que se expande
            const grad = ctx.createRadialGradient(rp.x, rp.y, rp.r * 0.6, rp.x, rp.y, rp.r);
            grad.addColorStop(0, `rgba(${CFG.rippleColor}, 0)`);
            grad.addColorStop(0.7, `rgba(${CFG.rippleColor}, ${(rp.opacity * 0.6).toFixed(3)})`);
            grad.addColorStop(0.88, `rgba(${CFG.rippleColor}, ${rp.opacity.toFixed(3)})`);
            grad.addColorStop(1, `rgba(${CFG.rippleColor}, 0)`);

            ctx.beginPath();
            ctx.arc(rp.x, rp.y, rp.r, 0, Math.PI * 2);
            ctx.fillStyle = grad;
            ctx.fill();

            // Línea exterior tenue
            ctx.beginPath();
            ctx.arc(rp.x, rp.y, rp.r, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(${CFG.rippleColor}, ${(rp.opacity * 0.4).toFixed(3)})`;
            ctx.lineWidth = 0.8;
            ctx.stroke();

            // Avanzar
            rp.r += CFG.rippleSpeed;
            rp.opacity -= CFG.rippleDecay;

            if (rp.opacity <= 0 || rp.r >= CFG.rippleMaxR) {
                ripples.splice(i, 1);
            }
        }
    }

    /* ==========================================================
       ESTADO DEL MOUSE
    ========================================================== */
    let mx = window.innerWidth / 2;
    let my = window.innerHeight / 2;
    let lagX = mx, lagY = my;
    let prevMx = mx, prevMy = my;
    let trailTimer = 0;
    let rippleTimer = 0;

    document.addEventListener('mousemove', e => {
        prevMx = mx; prevMy = my;
        mx = e.clientX;
        my = e.clientY;

        const now = Date.now();
        const dx = mx - prevMx;
        const dy = my - prevMy;
        const speed = Math.sqrt(dx * dx + dy * dy);

        // Onda de movimiento proporcional a la velocidad
        if (now - rippleTimer > CFG.rippleSpawnGap && speed > 1.5) {
            rippleTimer = now;
            addRipple(mx, my, speed * 0.5);
        }
    });

    /* ==========================================================
       HOVER INTERACTIVO
    ========================================================== */
    const HOVER_SEL = 'a, button, [role="button"], input, select, textarea, label, .card, .nav-link, .nav-item, li, .glass-card, .product-item';
    document.querySelectorAll(HOVER_SEL).forEach(el => {
        el.addEventListener('mouseenter', () => {
            document.body.classList.add('balam-hovering');
            // Onda extra al entrar a un elemento
            addRipple(mx, my, 20);
        });
        el.addEventListener('mouseleave', () => document.body.classList.remove('balam-hovering'));
    });

    /* ==========================================================
       CLICK
    ========================================================== */
    document.addEventListener('click', e => {
        // Onda grande de impacto
        for (let i = 0; i < 3; i++) {
            setTimeout(() => addRipple(e.clientX, e.clientY, i * 18), i * 60);
        }

        // Burst visual
        const burst = document.createElement('div');
        burst.className = 'balam-click-burst';
        burst.style.left = e.clientX + 'px';
        burst.style.top = e.clientY + 'px';
        document.body.appendChild(burst);

        const shards = document.createElement('div');
        shards.className = 'balam-shards';
        shards.style.left = e.clientX + 'px';
        shards.style.top = e.clientY + 'px';
        for (let i = 0; i < 8; i++) {
            const s = document.createElement('div');
            s.className = 'balam-shard';
            s.style.setProperty('--r', (i * 45) + 'deg');
            shards.appendChild(s);
        }
        document.body.appendChild(shards);
        setTimeout(() => { burst.remove(); shards.remove(); }, 600);
    });

    /* ==========================================================
       RASTRO DE MOVIMIENTO
    ========================================================== */
    function spawnTrail(x, y) {
        const now = Date.now();
        if (now - trailTimer < CFG.trailGap) return;
        trailTimer = now;

        const dx = x - prevMx;
        const dy = y - prevMy;
        const speed = Math.sqrt(dx * dx + dy * dy);
        if (speed < 2) return;

        // Punto
        const dot = document.createElement('div');
        dot.className = 'balam-trail-dot';
        const sz = Math.min(4 + speed * 0.15, 8);
        dot.style.cssText = `
          left:${x}px; top:${y}px;
          width:${sz}px; height:${sz}px;
          background: radial-gradient(circle, rgba(255,26,26,0.9), rgba(255,26,26,0.1));
          box-shadow: 0 0 ${sz * 2}px rgba(255,26,26,0.5);
          --dur:${(0.4 + Math.random() * 0.3).toFixed(2)}s;
          --op:${(0.5 + Math.random() * 0.4).toFixed(2)};
          --sz:${sz}px;
        `;
        document.body.appendChild(dot);
        setTimeout(() => dot.remove(), 800);

        // Scratch line
        if (speed > 5) {
            const line = document.createElement('div');
            line.className = 'balam-trail-line';
            const angle = Math.atan2(dy, dx) * 180 / Math.PI;
            const len = Math.min(speed * 1.5, 30);
            line.style.cssText = `
            left:${x - dx * 0.5}px;
            top:${y - dy * 0.5}px;
            width:${len}px;
            transform: rotate(${angle}deg);
            transform-origin: left center;
          `;
            document.body.appendChild(line);
            setTimeout(() => line.remove(), 500);
        }
    }

    /* ==========================================================
       LOOP PRINCIPAL
    ========================================================== */
    const ARM_GAP = 12;
    const ARM_LEN = 20;
    const CORNER = 34;

    function loop() {
        lagX += (mx - lagX) * CFG.lagSpeed;
        lagY += (my - lagY) * CFG.lagSpeed;

        // Canvas ondas
        drawRipples();

        // HUD lines
        const hudH = document.getElementById('hud-h');
        const hudV = document.getElementById('hud-v');
        if (hudH) hudH.style.top = my + 'px';
        if (hudV) hudV.style.left = mx + 'px';

        // Anillos (lag)
        const outer = document.getElementById('s-outer');
        const rotate = document.getElementById('s-rotate');
        if (outer) { outer.style.left = lagX + 'px'; outer.style.top = lagY + 'px'; }
        if (rotate) { rotate.style.left = lagX + 'px'; rotate.style.top = lagY + 'px'; }

        // Dot + ping (exacto)
        ['s-dot', 's-ping', 's-gap'].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.style.left = mx + 'px'; el.style.top = my + 'px'; }
        });

        // Brazos
        const at = document.getElementById('s-arm-t');
        const ab = document.getElementById('s-arm-b');
        const al = document.getElementById('s-arm-l');
        const ar = document.getElementById('s-arm-r');
        if (at) { at.style.left = mx + 'px'; at.style.top = (my - ARM_GAP - ARM_LEN) + 'px'; at.style.transform = 'translateX(-50%)'; }
        if (ab) { ab.style.left = mx + 'px'; ab.style.top = (my + ARM_GAP) + 'px'; ab.style.transform = 'translateX(-50%)'; }
        if (al) { al.style.left = (mx - ARM_GAP - ARM_LEN) + 'px'; al.style.top = my + 'px'; al.style.transform = 'translateY(-50%)'; }
        if (ar) { ar.style.left = (mx + ARM_GAP) + 'px'; ar.style.top = my + 'px'; ar.style.transform = 'translateY(-50%)'; }

        // Esquinas (lag)
        const stl = document.getElementById('s-tl');
        const str = document.getElementById('s-tr');
        const sbl = document.getElementById('s-bl');
        const sbr = document.getElementById('s-br');
        if (stl) stl.style.cssText += `left:${lagX - CORNER}px; top:${lagY - CORNER}px;`;
        if (str) str.style.cssText += `left:${lagX + CORNER}px; top:${lagY - CORNER}px;`;
        if (sbl) sbl.style.cssText += `left:${lagX - CORNER}px; top:${lagY + CORNER}px;`;
        if (sbr) sbr.style.cssText += `left:${lagX + CORNER}px; top:${lagY + CORNER}px;`;

        // Rastro
        spawnTrail(mx, my);

        requestAnimationFrame(loop);
    }

    loop();

})();
