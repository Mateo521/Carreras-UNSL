<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title('-', true, 'left'); ?></title>

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-toolbar.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-custom.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>

  <style>
    #site-header {
      transition: background .4s cubic-bezier(.4, 0, .2, 1),
        border-color .4s cubic-bezier(.4, 0, .2, 1),
        box-shadow .4s cubic-bezier(.4, 0, .2, 1),
        backdrop-filter .4s;
      will-change: background;
    }

    #site-header.scrolled {
      background: #172044;
      border-bottom: 1px solid rgba(255, 255, 255, .08);
      box-shadow: 0 4px 24px rgba(0, 0, 0, .25);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }

    .header-nav a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: #BAE4FF;
      transition: width .25s cubic-bezier(.4, 0, .2, 1);
    }

    .header-nav a:hover::after,
    .header-nav a.active::after {
      width: 100%;
    }

    .header-logo a:focus-visible,
    .header-nav a:focus-visible,
    .btn-ghost:focus-visible,
    .btn-primary:focus-visible,
    #mobile-menu-btn:focus-visible {
      outline: 2px solid #BAE4FF;
      outline-offset: 3px;
    }

    #mobile-menu.open {
      display: block;
      animation: slideDown .25s cubic-bezier(.4, 0, .2, 1);
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .search-input {
      transition: background 0.2s, border-color 0.2s, width 0.3s;
    }

    .search-input:focus {
      outline: none;
      border-color: #BAE4FF;
      background: rgba(255, 255, 255, 0.12);
      width: 320px;
    }

    .search-input:focus+.search-btn {
      color: #BAE4FF;
    }

    .mobile-search-container .search-input:focus {
      width: 100%;
    }

    .skip-link {
      transition: top .2s;
    }

    .skip-link:focus {
      top: 1rem;
    }
  </style>
</head>

<body <?php body_class(); ?> class="bg-[#E3F0FF] text-[#111827]" style="font-family: 'DM Sans', sans-serif;">

  <a class="skip-link absolute -top-[100%] left-4 bg-[#BAE4FF] text-[#08183A] px-4 py-2 font-['DM_Sans'] text-[0.82rem] font-medium z-[999] no-underline focus:top-4" href="#main-content">Saltar al contenido principal</a>

  <header id="site-header" class="fixed top-0 left-0 right-0 z-50 bg-transparent border-b border-transparent" role="banner">

    <div id="header-inner" class="max-w-[88rem] mx-auto px-6 flex items-center justify-between h-[72px] transition-[height] duration-400 ease-[cubic-bezier(0.4,0,0.2,1)]">

      <div class="header-logo">
        <a href="<?php echo home_url(); ?>" aria-label="Inicio — Universidad Nacional de San Luis">
          <img
            id="logo-img"
            class="h-[3.7rem] w-auto object-contain transition-[height] duration-400"
            src="<?php echo get_template_directory_uri(); ?>/logo-n-unsl.png"
            alt="Universidad Nacional de San Luis" />
        </a>
      </div>

      <nav
        class="header-nav hidden lg:flex items-center gap-8"
        aria-label="Navegación principal"
        id="desktop-nav">
        <?php
        $nav_items = [
          ['label' => 'Inicio',      'url' => home_url('/')],
          ['label' => 'Carreras',    'url' => home_url('/carreras/')],
          ['label' => 'Facultades',  'url' => home_url('/facultades/')],
          ['label' => 'Sedes',       'url' => home_url('/sedes/')],
        ];
        $current = trailingslashit(esc_url(home_url(add_query_arg([], $GLOBALS['wp']->request))));
        foreach ($nav_items as $item) :
          $is_active = trailingslashit($item['url']) === $current ? ' active text-white' : ' text-white/70 hover:text-white';
        ?>
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="font-['DM_Sans'] text-[0.82rem] font-medium tracking-[0.06em] uppercase no-underline relative pb-[3px] transition-colors <?php echo trim($is_active); ?>"
            <?php if (trailingslashit($item['url']) === $current) echo 'aria-current="page"'; ?>><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>
      </nav>

      <div class="hidden lg:flex items-center gap-3" id="desktop-ctas">
        <form role="search" method="get" class="search-form flex items-center relative" action="<?php echo esc_url(home_url('/carreras/')); ?>">
          <input
            type="search"
            id="searchInputHeader"
            class="search-input bg-white/10 border border-white/20 rounded-full py-[0.45rem] pr-[2.2rem] pl-4 text-white font-['DM_Sans'] text-[0.82rem] w-[180px] placeholder:text-white/50"
            placeholder="Buscar carrera..."
            value="<?php echo isset($_GET['q']) ? esc_attr($_GET['q']) : ''; ?>"
            name="q"
            autocomplete="off"
            aria-label="Buscar carrera" />

          <button type="submit" class="search-btn absolute right-2 bg-transparent border-none text-white/60 hover:text-[#BAE4FF] cursor-pointer p-1 flex items-center justify-center transition-colors" aria-label="Enviar búsqueda">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
            </svg>
          </button>

          <ul id="searchResultsList" class="absolute z-50 w-full bg-white border border-gray-200 rounded-md shadow-lg hidden max-h-60 overflow-y-auto mt-1 top-full left-0">
          </ul>
        </form>

        <a
          href="<?php echo home_url('/preinscripcion/'); ?>"
          class="btn-primary font-['DM_Sans'] text-[0.78rem] font-medium tracking-[0.06em] uppercase text-[#08183A] bg-[#BAE4FF] hover:bg-[#145596] hover:border-[#145596] no-underline py-[0.55rem] px-[1.3rem] border border-[#BAE4FF] transition-colors whitespace-nowrap rounded-full">Ingreso 2027</a>
      </div>

      <button
        id="mobile-menu-btn"
        type="button"
        aria-controls="mobile-menu"
        aria-expanded="false"
        aria-label="Abrir menú de navegación"
        class="lg:hidden flex items-center justify-center w-10 h-10 bg-transparent hover:bg-white/10 border border-white/20 cursor-pointer text-white/80 transition-colors">
        <svg id="icon-menu" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="icon-close" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" class="hidden">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </div>


    <nav id="mobile-menu" role="navigation" aria-label="Menú móvil" class="hidden bg-[#08183A] border-t border-white/10">

      <div class="p-4 border-b border-white/10 mb-2">
        <form role="search" method="get" class="search-form flex items-center relative" action="<?php echo esc_url(home_url('/carreras/')); ?>">
          <input
            type="search"
            id="searchInputHeaderMobile"
            class="search-input w-full bg-white/10 border border-white/20 rounded-full py-[0.45rem] pr-[2.2rem] pl-4 text-white font-['DM_Sans'] text-[0.82rem] placeholder:text-white/50"
            placeholder="Buscar carrera..."
            value="<?php echo isset($_GET['q']) ? esc_attr($_GET['q']) : ''; ?>"
            name="q"
            autocomplete="off"
            aria-label="Buscar carrera" />

          <button type="submit" class="search-btn absolute right-2 bg-transparent border-none text-white/60 hover:text-[#BAE4FF] cursor-pointer p-1 flex items-center justify-center transition-colors" aria-label="Enviar búsqueda">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
            </svg>
          </button>

          <ul id="searchResultsListMobile" class="absolute z-50 w-full bg-white border border-gray-200 rounded-md shadow-lg hidden max-h-60 overflow-y-auto mt-1 top-full left-0">
          </ul>
        </form>
      </div>

      <div class="px-4 pb-6 pt-2">
        <?php foreach ($nav_items as $item) :
          $is_active = trailingslashit($item['url']) === $current ? ' text-white bg-white/5 border-l-[#BAE4FF]' : ' text-white/70 border-transparent hover:text-white hover:bg-white/5 hover:border-l-[#BAE4FF]';
        ?>
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="block py-[0.85rem] px-4 font-['DM_Sans'] text-[0.9rem] font-normal no-underline border-l-2 transition-all <?php echo $is_active; ?>"
            <?php if (trailingslashit($item['url']) === $current) echo 'aria-current="page"'; ?>><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>

        <div class="mt-5 pt-5 border-t border-white/10 flex flex-col gap-[0.6rem]">
          <a
            href="<?php echo home_url('/preinscripcion/'); ?>"
            class="block text-center font-['DM_Sans'] text-[0.82rem] font-medium tracking-[0.06em] uppercase text-[#08183A] bg-[#BAE4FF] py-3 px-4 no-underline">Ingreso 2027</a>
        </div>
      </div>
    </nav>
  </header>

  <script>
    (function() {
      const header = document.getElementById('site-header');
      const headerInner = document.getElementById('header-inner');
      const logoImg = document.getElementById('logo-img');
      const btnMenu = document.getElementById('mobile-menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      const iconMenu = document.getElementById('icon-menu');
      const iconClose = document.getElementById('icon-close');

      const THRESHOLD = 48;

      function onScroll() {
        if (window.scrollY > THRESHOLD) {
          header.classList.add('scrolled');
          headerInner.style.height = '64px';
          logoImg.style.height = '3.5rem';
        } else {
          header.classList.remove('scrolled');
          headerInner.style.height = '72px';
          logoImg.style.height = '3.7rem';
        }
      }
      window.addEventListener('scroll', onScroll, {
        passive: true
      });
      onScroll(); // Init

      btnMenu.addEventListener('click', function() {
        const isOpen = mobileMenu.classList.toggle('open');
        iconMenu.style.display = isOpen ? 'none' : 'block';
        iconClose.style.display = isOpen ? 'block' : 'none';
        btnMenu.setAttribute('aria-expanded', isOpen);
        if (isOpen) {
          header.classList.add('scrolled');
        } else {
          onScroll();
        }
      });

      mobileMenu.querySelectorAll('a').forEach(function(link) {
        link.addEventListener('click', function() {
          mobileMenu.classList.remove('open');
          iconMenu.style.display = 'block';
          iconClose.style.display = 'none';
          btnMenu.setAttribute('aria-expanded', 'false');
          onScroll();
        });
      });

      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
          mobileMenu.classList.remove('open');
          iconMenu.style.display = 'block';
          iconClose.style.display = 'none';
          btnMenu.setAttribute('aria-expanded', 'false');
          btnMenu.focus();
          onScroll();
        }
      });
    })();



    function formatearTitulo(str) {
      if (!str) return "";
      const textoMinusculas = str.toLowerCase();
      const palabrasMenores = ['de', 'del', 'en', 'y', 'a', 'la', 'las', 'el', 'los', 'por', 'para', 'con'];

      return textoMinusculas.split(' ').map((palabra, index) => {
        if (palabra.length === 0) return palabra;
        if (index === 0 || !palabrasMenores.includes(palabra)) {
          return palabra.charAt(0).toUpperCase() + palabra.slice(1);
        }
        return palabra;
      }).join(' ');
    }

    document.addEventListener('DOMContentLoaded', () => {




      const els = document.querySelectorAll('.reveal');
      if (els.length) {
        const io = new IntersectionObserver(
          (entries) => entries.forEach(e => {
            if (e.isIntersecting) {
              e.target.classList.add('visible');
              io.unobserve(e.target);
            }
          }), {
            threshold: .12
          }
        );
        els.forEach(el => io.observe(el));
      }

      const movers = document.querySelectorAll('#year-parallax .scroll-mover');
      if (movers.length > 0) {
        window.addEventListener('scroll', function() {
          let scrollPosition = window.scrollY;

          movers.forEach((mover, index) => {
            let scrollThreshold = index * 45;
            let effectiveScroll = Math.max(0, scrollPosition - scrollThreshold);

            let moveX = -(effectiveScroll * 1);
            let moveY = 0;

            mover.style.transform = `translate(${moveX}px, ${moveY}px)`;
          });
        }, {
          passive: true
        });
      }

      const inputsList = [{
          input: document.getElementById('searchInputHeader'),
          list: document.getElementById('searchResultsList')
        },
        {
          input: document.getElementById('searchInputHeaderMobile'),
          list: document.getElementById('searchResultsListMobile')
        }
      ];

      let timeoutId;
      const wpRestUrl = "<?php echo esc_url(rest_url('wp/v2/carrera')); ?>?per_page=5&search=";

      const TIPO_COLORS = {
        'pregrado': {
          bg: 'bg-[#e8f4f0]',
          text: 'text-[#1a6b52]',
          label: 'Pregrado'
        },
        'grado': {
          bg: 'bg-[#eef2ff]',
          text: 'text-[#3730a3]',
          label: 'Grado'
        },
        'posgrado': {
          bg: 'bg-[#fff7ed]',
          text: 'text-[#92400e]',
          label: 'Posgrado'
        }
      };

      inputsList.forEach(({
        input,
        list
      }) => {
        if (!input || !list) return;

        input.addEventListener('input', (e) => {
          const query = e.target.value.trim();
          clearTimeout(timeoutId);

          if (query.length < 2) {
            list.innerHTML = '';
            list.classList.add('hidden');
            return;
          }

          timeoutId = setTimeout(() => {
            fetch(wpRestUrl + encodeURIComponent(query))
              .then(response => response.json())
              .then(carreras => {
                list.innerHTML = '';

                if (carreras.length > 0) {
                  carreras.forEach(carrera => {
                    const li = document.createElement('li');
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = carrera.title.rendered;
                    const tituloCrudo = tempDiv.textContent || tempDiv.innerText || "";
                    const tituloLimpio = formatearTitulo(tituloCrudo);

                    const tipo = carrera.tipo_nivel || 'general';
                    const configColor = TIPO_COLORS[tipo] || {
                      bg: 'bg-gray-100',
                      text: 'text-gray-700',
                      label: 'General'
                    };

                    li.className = 'px-4 py-3 hover:bg-slate-50 cursor-pointer border-b border-gray-100 last:border-0 transition-colors flex flex-col sm:flex-row sm:items-center gap-2';
                    li.innerHTML = `
                                    <span class="${configColor.bg} ${configColor.text} text-[9px] font-bold uppercase tracking-widest px-2 py-0.5 rounded w-max shrink-0">
                                        ${configColor.label}
                                    </span>
                                    <span class="text-sm font-medium text-[#1a1a2e] truncate"><a title="${carrera.title.rendered}" href="${carrera.link}" class="block w-full h-full">
                                        ${tituloLimpio}
                                    </a></span>
                                `;

                    li.addEventListener('click', () => {
                      window.location.href = carrera.link;
                    });
                    list.appendChild(li);
                  });
                  list.classList.remove('hidden');
                } else {
                  list.innerHTML = '<li class="px-4 py-3 text-sm text-gray-500 italic">No se encontraron carreras</li>';
                  list.classList.remove('hidden');
                }
              })
              .catch(error => console.error('Error:', error));
          }, 300);
        });

        document.addEventListener('click', (e) => {
          if (!input.contains(e.target) && !list.contains(e.target)) {
            list.classList.add('hidden');
          }
        });
      });
    });
  </script>

  <main id="main-content" class="bg-[#f7fcff]" tabindex="-1" class="outline-none">