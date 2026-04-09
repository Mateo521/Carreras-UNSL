<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carreras UNSL <?php wp_title('-', true, 'left'); ?></title>

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-toolbar.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-custom.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

  <?php wp_head(); ?>

  <style>
    :root {
      --navy: #08183A;
      --navy2: #0D2452;
      --gold: #BAE4FF;
      --blue-l: #A8C8F4;
    }


    #site-header {
      position: fixed;
      /* ← fixed, no sticky */
      top: 0;
      left: 0;
      right: 0;
      z-index: 50;
      transition:
        background .4s cubic-bezier(.4, 0, .2, 1),
        border-color .4s cubic-bezier(.4, 0, .2, 1),
        box-shadow .4s cubic-bezier(.4, 0, .2, 1),
        backdrop-filter .4s;
      will-change: background;
    }


    #site-header.at-top {
      background: transparent;
      border-bottom: 1px solid transparent;
      box-shadow: none;
      backdrop-filter: none;
      -webkit-backdrop-filter: none;
    }


    #site-header.scrolled {
      background: #2A3E8A;
      border-bottom: 1px solid rgba(255, 255, 255, .08);
      box-shadow: 0 4px 24px rgba(0, 0, 0, .25);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }


    .header-inner {
      max-width: 88rem;
      margin: 0 auto;
      padding: 0 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 72px;
      transition: height .4s cubic-bezier(.4, 0, .2, 1);
    }

    #site-header.scrolled .header-inner {
      height: 64px;
    }

    .header-logo img {
      height: 2.75rem;
      width: auto;
      object-fit: contain;
      transition: height .4s;
    }

    #site-header.scrolled .header-logo img {
      height: 2.4rem;
    }


    .header-nav a {
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem;
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, .7);
      text-decoration: none;
      position: relative;
      padding-bottom: 3px;
      transition: color .2s;
    }

    .header-nav a::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--gold);
      transition: width .25s cubic-bezier(.4, 0, .2, 1);
    }

    .header-nav a:hover,
    .header-nav a.active {
      color: #fff;
    }

    .header-nav a:hover::after,
    .header-nav a.active::after {
      width: 100%;
    }


    .btn-ghost {
      font-family: 'DM Sans', sans-serif;
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, .75);
      text-decoration: none;
      padding: .5rem 1.1rem;
      border: 1px solid rgba(255, 255, 255, .22);
      transition: background .2s, color .2s, border-color .2s;
      white-space: nowrap;
    }

    .btn-ghost:hover {
      background: rgba(255, 255, 255, .1);
      color: #fff;
      border-color: rgba(255, 255, 255, .4);
    }

    .btn-primary {
      font-family: 'DM Sans', sans-serif;
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--navy);
      background: var(--gold);
      text-decoration: none;
      padding: .55rem 1.3rem;
      border: 1px solid var(--gold);
      transition: background .2s, color .2s;
      white-space: nowrap;
    }

    .btn-primary:hover {
      background: #145596;
      border-color: #145596;
    }


    .header-logo a:focus-visible,
    .header-nav a:focus-visible,
    .btn-ghost:focus-visible,
    .btn-primary:focus-visible,
    #mobile-menu-btn:focus-visible {
      outline: 2px solid var(--gold);
      outline-offset: 3px;
    }


    #mobile-menu {
      display: none;
      background: var(--navy);
      border-top: 1px solid rgba(255, 255, 255, .08);
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

    .mobile-nav-link {
      display: block;
      padding: .85rem 1rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .9rem;
      font-weight: 400;
      color: rgba(255, 255, 255, .7);
      text-decoration: none;
      border-left: 2px solid transparent;
      transition: color .15s, border-color .15s, background .15s;
    }

    .mobile-nav-link:hover,
    .mobile-nav-link.active {
      color: #fff;
      background: rgba(255, 255, 255, .04);
      border-left-color: var(--gold);
    }






    .search-form {
      display: flex;
      align-items: center;
      position: relative;
    }

    .search-input {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 9999px;
      padding: 0.45rem 2.2rem 0.45rem 1rem;
      color: #fff;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.82rem;
      width: 180px;
      transition: background 0.2s, border-color 0.2s, width 0.3s;
    }

    .search-input::placeholder {
      color: rgba(255, 255, 255, 0.5);
    }

    .search-input:focus {
      outline: none;
      border-color: var(--gold);
      background: rgba(255, 255, 255, 0.12);
      width: 320px;
    }

    .search-btn {
      position: absolute;
      right: 0.5rem;
      background: transparent;
      border: none;
      color: rgba(255, 255, 255, 0.6);
      cursor: pointer;
      padding: 0.2rem;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: color 0.2s;
    }

    .search-btn:hover,
    .search-input:focus+.search-btn {
      color: var(--gold);
    }


    .mobile-search-container {
      padding: 1rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      margin-bottom: 0.5rem;
    }

    .mobile-search-container .search-input {
      width: 100%;
    }





    .skip-link {
      position: absolute;
      top: -100%;
      left: 1rem;
      background: var(--gold);
      color: var(--navy);
      padding: .5rem 1rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem;
      font-weight: 500;
      z-index: 999;
      text-decoration: none;
      transition: top .2s;
    }

    .skip-link:focus {
      top: 1rem;
    }


    .nav-sep {
      width: 1px;
      height: 14px;
      background: rgba(255, 255, 255, .15);
      display: inline-block;
      flex-shrink: 0;
    }
  </style>
</head>

<body <?php body_class(); ?> style="font-family:'DM Sans',sans-serif; background:#E3F0FF; color:#111827;">


  <a class="skip-link" href="#main-content">Saltar al contenido principal</a>

  <header id="site-header" class="at-top" role="banner">
    <div class="header-inner">


      <div class="header-logo">
        <a href="<?php echo home_url(); ?>" aria-label="Inicio — Universidad Nacional de San Luis">
          <img
            src="<?php echo get_template_directory_uri(); ?>/logo-unsl-negativo2.svg"
            alt="Universidad Nacional de San Luis" />
        </a>
      </div>


      <nav
        class="header-nav"
        aria-label="Navegación principal"
        style="display:none; align-items:center; gap:2rem;"
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
          $is_active = trailingslashit($item['url']) === $current ? ' active' : '';
        ?>
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="<?php echo trim($is_active); ?>"
            <?php if ($is_active) echo 'aria-current="page"'; ?>><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>
      </nav>



      <div
        style="display:none; align-items:center; gap:.75rem;"
        id="desktop-ctas">

        <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/carreras/')); ?>">
          <input
            type="search"
            id="searchInputHeader"
            class="search-input w-full"
            placeholder="Buscar carrera..."
            value="<?php echo isset($_GET['q']) ? esc_attr($_GET['q']) : ''; ?>"
            name="q"
            autocomplete="off"
            aria-label="Buscar carrera" />

          <button type="submit" class="search-btn absolute right-0 top-0 bottom-0 px-3" aria-label="Enviar búsqueda">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
            </svg>
          </button>

          <ul id="searchResultsList" class="absolute z-50 w-full bg-white border border-gray-200 rounded-md shadow-lg hidden max-h-60 overflow-y-auto mt-1 top-full left-0">
          </ul>
        </form>

        <!--a
          href="https://campus.unsl.edu.ar/"
          target="_blank"
          rel="noopener noreferrer"
          class="btn-ghost rounded-full">Campus Virtual</a-->

        <a
          href="<?php echo home_url('/preinscripcion/'); ?>"
          class="btn-primary rounded-full">Ingreso 2026</a>
      </div>


      <button
        id="mobile-menu-btn"
        type="button"
        aria-controls="mobile-menu"
        aria-expanded="false"
        aria-label="Abrir menú de navegación"
        style="display:flex; align-items:center; justify-content:center;
          width:40px; height:40px;
          background:transparent;
          border:1px solid rgba(255,255,255,.2);
          cursor:pointer;
          color:rgba(255,255,255,.8);
          transition:background .2s, border-color .2s;"
        onmouseover="this.style.background='rgba(255,255,255,.08)'"
        onmouseout="this.style.background='transparent'">
        <svg id="icon-menu" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="icon-close" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" style="display:none;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </div>



    <nav id="mobile-menu" role="navigation" aria-label="Menú móvil">

      <div class="mobile-search-container">
        <form role="search" method="get" class="search-form relative" action="<?php echo esc_url(home_url('/carreras/')); ?>">
          <input
            type="search"
            id="searchInputHeader"
            class="search-input w-full"
            placeholder="Buscar carrera..."
            value="<?php echo isset($_GET['q']) ? esc_attr($_GET['q']) : ''; ?>"
            name="q"
            autocomplete="off"
            aria-label="Buscar carrera" />

          <button type="submit" class="search-btn absolute right-0 top-0 bottom-0 px-3" aria-label="Enviar búsqueda">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />
            </svg>
          </button>

          <ul id="searchResultsList" class="absolute z-50 w-full bg-white border border-gray-200 rounded-md shadow-lg hidden max-h-60 overflow-y-auto mt-1 top-full left-0">
          </ul>
        </form>
      </div>

      <div style="padding:.5rem 1rem 1.5rem;">
        <?php foreach ($nav_items as $item) :
          $is_active = trailingslashit($item['url']) === $current ? ' active' : '';
        ?>
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="mobile-nav-link<?php echo $is_active; ?>"
            <?php if ($is_active) echo 'aria-current="page"'; ?>><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>

        <div style="margin-top:1.2rem;padding-top:1.2rem;border-top:1px solid rgba(255,255,255,.08);display:flex;flex-direction:column;gap:.6rem;">
          <!--a
            href="https://campus.unsl.edu.ar/"
            target="_blank"
            rel="noopener noreferrer"
            style="display:block;text-align:center;
              font-family:'DM Sans',sans-serif;font-size:.82rem;font-weight:500;
              letter-spacing:.06em;text-transform:uppercase;
              color:rgba(255,255,255,.7);
              border:1px solid rgba(255,255,255,.2);
              padding:.7rem 1rem;
              text-decoration:none;">Campus Virtual</a-->
          <a
            href="<?php echo home_url('/preinscripcion/'); ?>"
            style="display:block;text-align:center;
              font-family:'DM Sans',sans-serif;font-size:.82rem;font-weight:500;
              letter-spacing:.06em;text-transform:uppercase;
              color:var(--navy);background:var(--gold);
              padding:.75rem 1rem;
              text-decoration:none;">Ingreso 2026</a>
        </div>
      </div>
    </nav>

  </header>


  <script>
    (function() {
      const header = document.getElementById('site-header');
      const btnMenu = document.getElementById('mobile-menu-btn');
      const mobileMenu = document.getElementById('mobile-menu');
      const iconMenu = document.getElementById('icon-menu');
      const iconClose = document.getElementById('icon-close');
      const desktopNav = document.getElementById('desktop-nav');
      const desktopCtas = document.getElementById('desktop-ctas');
      const desktopBtn = document.getElementById('mobile-menu-btn');


      function applyBreakpoint() {
        const wide = window.innerWidth >= 1024;
        desktopNav.style.display = wide ? 'flex' : 'none';
        desktopCtas.style.display = wide ? 'flex' : 'none';
        desktopBtn.style.display = wide ? 'none' : 'flex';
      }
      applyBreakpoint();
      window.addEventListener('resize', applyBreakpoint);


      const THRESHOLD = 48;

      function onScroll() {
        if (window.scrollY > THRESHOLD) {
          header.classList.remove('at-top');
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
          header.classList.add('at-top');
        }
      }
      window.addEventListener('scroll', onScroll, {
        passive: true
      });
      onScroll();

      btnMenu.addEventListener('click', function() {
        const isOpen = mobileMenu.classList.toggle('open');
        iconMenu.style.display = isOpen ? 'none' : 'block';
        iconClose.style.display = isOpen ? 'block' : 'none';
        btnMenu.setAttribute('aria-expanded', isOpen);
        if (isOpen) {


          header.classList.remove('at-top');
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
      const searchInput = document.getElementById('searchInputHeader');
      const resultsList = document.getElementById('searchResultsList');
      let timeoutId;

      if (!searchInput || !resultsList) return;


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


      const wpRestUrl = "<?php echo esc_url(rest_url('wp/v2/carrera')); ?>?per_page=5&search=";

      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim();
        clearTimeout(timeoutId);

        if (query.length < 2) {
          resultsList.innerHTML = '';
          resultsList.classList.add('hidden');
          return;
        }

        timeoutId = setTimeout(() => {
          fetch(wpRestUrl + encodeURIComponent(query))
            .then(response => response.json())
            .then(carreras => {
              resultsList.innerHTML = '';

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
                                <span class="text-sm font-medium text-[#1a1a2e] truncate"><a title="${carrera.title.rendered}" href="#" class="block w-full h-full">
                                    ${tituloLimpio}
                                </a></span>
                            `;

                  li.addEventListener('click', () => {
                    window.location.href = carrera.link;
                  });

                  resultsList.appendChild(li);
                });
                resultsList.classList.remove('hidden');
              } else {
                resultsList.innerHTML = '<li class="px-4 py-3 text-sm text-gray-500 italic">No se encontraron carreras</li>';
                resultsList.classList.remove('hidden');
              }
            })
            .catch(error => console.error('Error:', error));
        }, 300);
      });

      document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !resultsList.contains(e.target)) {
          resultsList.classList.add('hidden');
        }
      });
    });
  </script>

  </script>


  <main id="main-content" tabindex="-1" style="outline:none;">