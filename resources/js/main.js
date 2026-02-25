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
// Aplicable a todas las cards con la clase mouse-glow
document.body.onmousemove = e => {
    for (const card of document.getElementsByClassName("mouse-glow")) {
        const rect = card.getBoundingClientRect(),
            x = e.clientX - rect.left,
            y = e.clientY - rect.top;
        card.style.setProperty("--mouse-x", `${x}px`);
        card.style.setProperty("--mouse-y", `${y}px`);
    }
}

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

// Cerrar con ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
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

const assemblySwiper = new Swiper('.assembly-slider', {
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    on: {
        init: function () {
            // Trigger en cuanto se inicialice porque esta en el top hero visile siempre
            setTimeout(() => {
                runAssemblyGSAP(this.slides[this.activeIndex]);
            }, 300);
        },
        slideChangeTransitionStart: function () {
            runAssemblyGSAP(this.slides[this.activeIndex]);
        }
    }
});
