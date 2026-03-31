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
window.openProductModal = function (title, imgSources, category, branch, description, wsText, tech = {}) {
    const modal = document.getElementById('product-modal');
    const content = document.getElementById('product-modal-content');
    const mainImg = document.getElementById('modal-img');
    const thumbContainer = document.getElementById('modal-thumbnails');

    // Poblar datos básicos
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-category').innerText = category;
    document.getElementById('modal-branch').innerHTML = `<i class='bx bx-map mr-1'></i> ${branch}`;
    document.getElementById('modal-desc').innerText = description;

    // Manejar Galería de Imágenes
    if (thumbContainer) {
        thumbContainer.innerHTML = '';
        const sources = Array.isArray(imgSources) ? imgSources : [imgSources];
        
        if (sources.length > 1) {
            sources.forEach((src, idx) => {
                const isActive = idx === 0;
                const thumb = document.createElement('div');
                // Estilo ultra-resaltado para la activa (Naranja Balam)
                thumb.className = `w-16 h-16 rounded-xl border-[3px] overflow-hidden cursor-pointer transition-all duration-500 ${isActive ? 'border-[#e67e22] shadow-[0_0_20px_rgba(230,126,34,0.6)] scale-110 grayscale-0 z-10' : 'border-white/10 grayscale hover:grayscale-0 hover:border-white/30'}`;
                thumb.innerHTML = `<img src="${src}" class="w-full h-full object-cover">`;
                thumb.onclick = () => window.switchModalImg(thumb, src);
                thumbContainer.appendChild(thumb);
            });
            thumbContainer.classList.remove('hidden');
        } else {
            thumbContainer.classList.add('hidden');
        }

        // Imagen inicial
        mainImg.src = sources[0] || '';
    }

    // Poblar Especificaciones Técnicas (Dinámico)
    const specsContainer = document.getElementById('modal-specs');
    if (specsContainer) {
        specsContainer.innerHTML = '';
        const fields = [
            { label: 'MARCA', value: tech.marca },
            { label: 'MODELO', value: tech.modelo },
            { label: 'CALIBRE', value: tech.calibre },
            { label: 'ORIGEN', value: tech.pais },
        ];

        fields.forEach(f => {
            if (f.value && f.value.trim() !== '' && f.value !== 'undefined') {
                specsContainer.innerHTML += `
                    <div class="flex flex-col border-l border-white/10 pl-3 transition-colors hover:border-[#e67e22]/50 group/spec">
                        <span class="text-gray-500 text-[9px] uppercase tracking-tighter">${f.label}</span>
                        <span class="text-white text-xs font-bold uppercase transition-colors group-hover/spec:text-[#e67e22]">${f.value}</span>
                    </div>
                `;
            }
        });
    }

    // Enlace de WhatsApp codificado
    const waBase = document.getElementById('modal-whatsapp').getAttribute('data-base-url') || 'https://wa.me/50244445555';
    document.getElementById('modal-whatsapp').href = `${waBase}?text=${encodeURIComponent(wsText)}`;

    // Mostrar modal
    modal.classList.remove('opacity-0', 'pointer-events-none');
    gsap.fromTo(content,
        { scale: 0.9, opacity: 0, y: 30 },
        { scale: 1, opacity: 1, y: 0, duration: 0.5, ease: "back.out(1.2)" }
    );
};

window.switchModalImg = function (thumb, src) {
    const mainImg = document.getElementById('modal-img');
    if (!mainImg || mainImg.src === src) return;

    // Animación de transición de imagen
    gsap.to(mainImg, { 
        opacity: 0, scale: 0.95, duration: 0.25, 
        onComplete: () => {
            mainImg.src = src;
            gsap.to(mainImg, { opacity: 1, scale: 1, duration: 0.4, ease: 'expo.out' });
        }
    });

    // Actualizar estilos de miniaturas con resaltado reforzado
    const thumbs = document.querySelectorAll('#modal-thumbnails > div');
    thumbs.forEach(t => {
        t.classList.add('border-white/10', 'grayscale');
        t.classList.remove('border-[#e67e22]', 'shadow-[0_0_20px_rgba(230,126,34,0.6)]', 'scale-110', 'grayscale-0', 'z-10');
    });

    thumb.classList.remove('border-white/10', 'grayscale');
    // Aplicar estilo resaltado
    thumb.classList.add('border-[#e67e22]', 'shadow-[0_0_20px_rgba(230,126,34,0.6)]', 'scale-110', 'grayscale-0', 'z-10');
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

let assemblySwiper, videoSwiper, arsenalSwiper;
const initSwiper = () => {
    assemblySwiper = new Swiper('.assembly-slider', {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        observer: true,
        observeParents: true,
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

    // Inicializar Carrusel de Videoteca (Premium)
    videoSwiper = new Swiper('.video-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        rewind: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: '.swiper-pagination-video',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-video',
            prevEl: '.swiper-button-prev-video',
        },
        observer: true,
        observeParents: true,
        centerInsufficientSlides: true,
        watchOverflow: true,
        breakpoints: {
            640: { slidesPerView: 1, spaceBetween: 20 },
            768: { slidesPerView: 2, spaceBetween: 30 },
            1024: { slidesPerView: 3, spaceBetween: 30 },
        },
    });

    // Inicializar Carrusel de Arsenal Destacado
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

// Initialization will be performed after the entry animation completes.

// ==========================================
// ==========================================
// LÓGICA DE FILTRADO DE CATÁLOGO (LEGION-STYLE)
// ==========================================

// Estado Global de Filtros
window.activeFilters = {
    cat: 'all',
    subcat: 'all'
};

window.toggleAccordion = function (id) {
    const list = document.getElementById(id);
    const icon = document.getElementById('icon-' + id);
    if (!list) return;

    const isOpen = !list.classList.contains('hidden');

    // Cerrar otros abiertos para un efecto limpio
    document.querySelectorAll('#nav-accordion ul').forEach(ul => {
        if (ul.id !== id && ul.id !== 'nav-accordion') {
            ul.classList.add('hidden');
            const otherIcon = document.getElementById('icon-' + ul.id);
            if (otherIcon) {
                otherIcon.classList.remove('rotate-45');
                otherIcon.classList.add('bx-plus');
                otherIcon.classList.remove('bx-minus');
            }
        }
    });

    if (isOpen) {
        list.classList.add('hidden');
        if (icon) {
            icon.classList.remove('rotate-45');
            icon.classList.add('bx-plus');
            icon.classList.remove('bx-minus');
        }
    } else {
        list.classList.remove('hidden');
        if (icon) {
            icon.classList.add('rotate-45');
            icon.classList.remove('bx-plus');
            icon.classList.add('bx-minus');
        }
    }
};

window.updateProductsByFilter = function (value, type = 'all') {
    // Resetear filtros secundarios al cambiar de categoría principal o subcategoría
    const brandSel = document.getElementById('top-filter-brand');
    const branchSel = document.getElementById('top-filter-branch');
    if (brandSel) brandSel.value = 'all';
    if (branchSel) branchSel.value = 'all';

    if (type === 'all') {
        window.activeFilters.cat = 'all';
        window.activeFilters.subcat = 'all';
        document.getElementById('current-filter-title').innerText = 'ARSENAL DISPONIBLE';
        
        // Limpiar buscador si se resetea
        const searchInput = document.getElementById('filter-search');
        if (searchInput) searchInput.value = '';
    } else if (type === 'cat') {
        window.activeFilters.cat = value;
        window.activeFilters.subcat = 'all';
        document.getElementById('current-filter-title').innerText = value.toUpperCase().replace(/-/g, ' ');
    } else if (type === 'subcat') {
        window.activeFilters.subcat = value;
        document.getElementById('current-filter-title').innerText = value.toUpperCase().replace(/-/g, ' ');
    }
    
    // Smooth scroll al catálogo
    const section = document.getElementById('catalogo');
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }

    // Al cambiar categoría, actualizamos qué marcas son visibles en el dropdown
    window.updateBrandDropdown();
    window.applyFilters();
};

window.updateBrandDropdown = function () {
    const brandSel = document.getElementById('top-filter-brand');
    if (!brandSel) return;

    const products = document.querySelectorAll('.product-item');
    const brandsInCategory = new Set();

    // Ver qué marcas existen para la Categoría/Subcategoría seleccionada
    products.forEach(p => {
        const pCat = p.getAttribute('data-cat') || '';
        const pSub = p.getAttribute('data-subcat') || '';
        const pMar = p.getAttribute('data-marca') || '';

        const catMatch = window.activeFilters.cat === 'all' || pCat === window.activeFilters.cat;
        const subMatch = window.activeFilters.subcat === 'all' || pSub === window.activeFilters.subcat;

        if (catMatch && subMatch && pMar) {
            brandsInCategory.add(pMar);
        }
    });

    // Ocultar marcas que no pertenecen a este grupo
    const options = brandSel.options;
    for (let i = 0; i < options.length; i++) {
        const opt = options[i];
        if (opt.value === 'all') {
            opt.hidden = false;
            opt.disabled = false;
            continue;
        }

        if (brandsInCategory.has(opt.value)) {
            opt.hidden = false;
            opt.disabled = false;
        } else {
            opt.hidden = true;
            opt.disabled = true; // Algunos navegadores necesitan disabled para no seleccionarlos con teclado
        }
    }
};

window.applyFilters = function () {
    const brand = document.getElementById('top-filter-brand')?.value || 'all';
    const branch = document.getElementById('top-filter-branch')?.value || 'all';
    const searchInput = document.getElementById('filter-search');
    const search = searchInput ? searchInput.value.toLowerCase().trim() : '';

    const products = document.querySelectorAll('.product-item');
    const noMsg = document.getElementById('no-products-msg');
    let count = 0;

    products.forEach(p => {
        const pCat = p.getAttribute('data-cat') || '';
        const pSub = p.getAttribute('data-subcat') || '';
        const pMar = p.getAttribute('data-marca') || '';
        const pBra = p.getAttribute('data-branch') || '';
        const pName = p.getAttribute('data-name') || '';

        const catMatch = window.activeFilters.cat === 'all' || pCat === window.activeFilters.cat;
        const subMatch = window.activeFilters.subcat === 'all' || pSub === window.activeFilters.subcat;
        const brandMatch = brand === 'all' || pMar === brand;
        const branchMatch = branch === 'all' || pBra === branch;
        const searchMatch = search === '' || pName.includes(search);

        if (catMatch && subMatch && brandMatch && branchMatch && searchMatch) {
            p.classList.remove('hidden');
            count++;
        } else {
            p.classList.add('hidden');
        }
    });

    if (noMsg) {
        if (count === 0) noMsg.classList.remove('hidden');
        else noMsg.classList.add('hidden');
    }
};

window.applySorting = function () {
    const order = document.getElementById('top-sort-order')?.value;
    const grid = document.getElementById('product-grid');
    if (!grid) return;
    
    // Obtener todos los items (incluso ocultos) para mantener coherencia
    const items = Array.from(document.querySelectorAll('.product-item'));

    if (!order || order === 'default') return;

    // Ordenar el array en memoria (Rápido)
    items.sort((a, b) => {
        const nameA = a.getAttribute('data-name') || '';
        const nameB = b.getAttribute('data-name') || '';
        
        if (order === 'az') return nameA.localeCompare(nameB, 'es', { sensitivity: 'base' });
        if (order === 'za') return nameB.localeCompare(nameA, 'es', { sensitivity: 'base' });
        return 0;
    });

    // Re-organizar en el DOM (Operación atómica)
    // Usamos un DocumentFragment para máxima velocidad y evitar re-flows constantes
    const fragment = document.createDocumentFragment();
    items.forEach(i => fragment.appendChild(i));
    grid.appendChild(fragment);
    
    // Solo animamos los que están visibles para que se sienta instantáneo
    const visibleItems = items.filter(i => !i.classList.contains('hidden'));
    
    if (visibleItems.length > 0) {
        gsap.fromTo(visibleItems, 
            { opacity: 0 }, 
            { opacity: 1, duration: 0.3, stagger: 0.005, ease: "none" }
        );
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('filter-search');
    if (searchInput) {
        searchInput.addEventListener('input', window.applyFilters);
    }
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
                // Instanciar carruseles después de que el DOM esté completamente estabilizado (0.5s)
                if (typeof initSwiper === 'function') {
                    setTimeout(() => {
                        initSwiper();
                    }, 500);
                }
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
