<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php wp_title('|', true, 'right'); ?></title>

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
      --navy:   #08183A;
      --navy2:  #0D2452;
      --gold:   #BAE4FF;
      --blue-l: #A8C8F4;
    }

    /* ── Header base ─────────────────────────────────────────── */
    #site-header {
      position: fixed;          /* ← fixed, no sticky */
      top: 0;
      left: 0;
      right: 0;
      z-index: 50;
      transition:
        background  .4s cubic-bezier(.4,0,.2,1),
        border-color .4s cubic-bezier(.4,0,.2,1),
        box-shadow   .4s cubic-bezier(.4,0,.2,1),
        backdrop-filter .4s;
      will-change: background;
    }

    /* Estado: en el tope → completamente transparente */
    #site-header.at-top {
      background:   transparent;
      border-bottom: 1px solid transparent;
      box-shadow:   none;
      backdrop-filter: none;
      -webkit-backdrop-filter: none;
    }

    /* Estado: scrolled → navy sólido con blur */
    #site-header.scrolled {
      background:   rgba(8, 24, 58, .97);
      border-bottom: 1px solid rgba(255,255,255,.08);
      box-shadow:   0 4px 24px rgba(0,0,0,.25);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }

    /* ── Inner layout ────────────────────────────────────────── */
    .header-inner {
      max-width: 88rem;
      margin: 0 auto;
      padding: 0 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 72px;
      transition: height .4s cubic-bezier(.4,0,.2,1);
    }
    #site-header.scrolled .header-inner {
      height: 64px;
    }

    /* ── Logo ────────────────────────────────────────────────── */
    .header-logo img {
      height: 2.75rem;
      width: auto;
      object-fit: contain;
      transition: height .4s;
    }
    #site-header.scrolled .header-logo img {
      height: 2.4rem;
    }

    /* ── Nav links ───────────────────────────────────────────── */
    .header-nav a {
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem;
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: rgba(255,255,255,.7);
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
      transition: width .25s cubic-bezier(.4,0,.2,1);
    }
    .header-nav a:hover,
    .header-nav a.active {
      color: #fff;
    }
    .header-nav a:hover::after,
    .header-nav a.active::after {
      width: 100%;
    }

    /* ── Botones CTA ─────────────────────────────────────────── */
    .btn-ghost {
      font-family: 'DM Sans', sans-serif;
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: rgba(255,255,255,.75);
      text-decoration: none;
      padding: .5rem 1.1rem;
      border: 1px solid rgba(255,255,255,.22);
      transition: background .2s, color .2s, border-color .2s;
      white-space: nowrap;
    }
    .btn-ghost:hover {
      background: rgba(255,255,255,.1);
      color: #fff;
      border-color: rgba(255,255,255,.4);
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

    /* ── Focus ring accesible ────────────────────────────────── */
    .header-logo a:focus-visible,
    .header-nav a:focus-visible,
    .btn-ghost:focus-visible,
    .btn-primary:focus-visible,
    #mobile-menu-btn:focus-visible {
      outline: 2px solid var(--gold);
      outline-offset: 3px;
    }

    /* ── Menú móvil ──────────────────────────────────────────── */
    #mobile-menu {
      display: none;
      background: var(--navy);
      border-top: 1px solid rgba(255,255,255,.08);
    }
    #mobile-menu.open {
      display: block;
      animation: slideDown .25s cubic-bezier(.4,0,.2,1);
    }
    @keyframes slideDown {
      from { opacity:0; transform:translateY(-8px); }
      to   { opacity:1; transform:translateY(0); }
    }
    .mobile-nav-link {
      display: block;
      padding: .85rem 1rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .9rem;
      font-weight: 400;
      color: rgba(255,255,255,.7);
      text-decoration: none;
      border-left: 2px solid transparent;
      transition: color .15s, border-color .15s, background .15s;
    }
    .mobile-nav-link:hover,
    .mobile-nav-link.active {
      color: #fff;
      background: rgba(255,255,255,.04);
      border-left-color: var(--gold);
    }

    /* ── Barra de accesibilidad ──────────────────────────────── */
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
    .skip-link:focus { top: 1rem; }

    /* ── Separador decorativo en nav ─────────────────────────── */
    .nav-sep {
      width: 1px;
      height: 14px;
      background: rgba(255,255,255,.15);
      display: inline-block;
      flex-shrink: 0;
    }
  </style>
</head>

<body <?php body_class(); ?> style="font-family:'DM Sans',sans-serif; background:#F5F2EB; color:#111827;">

  <?php /* Skip to content — accesibilidad */ ?>
  <a class="skip-link" href="#main-content">Saltar al contenido principal</a>

  <header id="site-header" class="at-top" role="banner">
    <div class="header-inner">

      <?php /* ── Logo ── */ ?>
      <div class="header-logo">
        <a href="<?php echo home_url(); ?>" aria-label="Inicio — Universidad Nacional de San Luis">
          <img
            src="<?php echo get_template_directory_uri(); ?>/logo-unsl-negativo2.svg"
            alt="Universidad Nacional de San Luis"
          />
        </a>
      </div>

      <?php /* ── Navegación desktop ── */ ?>
      <nav
        class="header-nav"
        aria-label="Navegación principal"
        style="display:none; align-items:center; gap:2rem;"
        id="desktop-nav"
      >
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
            <?php if ($is_active) echo 'aria-current="page"'; ?>
          ><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>
      </nav>

      <?php /* ── CTAs desktop ── */ ?>
      <div
        style="display:none; align-items:center; gap:.75rem;"
        id="desktop-ctas"
      >
        <a
          href="https://campus.unsl.edu.ar/"
          target="_blank"
          rel="noopener noreferrer"
          class="btn-ghost"
        >Campus Virtual</a>

        <a
          href="<?php echo home_url('/preinscripcion/'); ?>"
          class="btn-primary"
        >Ingreso 2026</a>
      </div>

      <?php /* ── Botón hamburguesa (móvil) ── */ ?>
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
        onmouseout="this.style.background='transparent'"
        
      >
        <svg id="icon-menu" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="icon-close" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" style="display:none;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>

    </div><!-- /.header-inner -->

    <?php /* ── Menú móvil ── */ ?>
    <nav id="mobile-menu" role="navigation" aria-label="Menú móvil">
      <div style="padding:.5rem 1rem 1.5rem;">
        <?php foreach ($nav_items as $item) :
          $is_active = trailingslashit($item['url']) === $current ? ' active' : '';
        ?>
          <a
            href="<?php echo esc_url($item['url']); ?>"
            class="mobile-nav-link<?php echo $is_active; ?>"
            <?php if ($is_active) echo 'aria-current="page"'; ?>
          ><?php echo esc_html($item['label']); ?></a>
        <?php endforeach; ?>

        <div style="margin-top:1.2rem;padding-top:1.2rem;border-top:1px solid rgba(255,255,255,.08);display:flex;flex-direction:column;gap:.6rem;">
          <a
            href="https://campus.unsl.edu.ar/"
            target="_blank"
            rel="noopener noreferrer"
            style="display:block;text-align:center;
              font-family:'DM Sans',sans-serif;font-size:.82rem;font-weight:500;
              letter-spacing:.06em;text-transform:uppercase;
              color:rgba(255,255,255,.7);
              border:1px solid rgba(255,255,255,.2);
              padding:.7rem 1rem;
              text-decoration:none;"
          >Campus Virtual</a>
          <a
            href="<?php echo home_url('/preinscripcion/'); ?>"
            style="display:block;text-align:center;
              font-family:'DM Sans',sans-serif;font-size:.82rem;font-weight:500;
              letter-spacing:.06em;text-transform:uppercase;
              color:var(--navy);background:var(--gold);
              padding:.75rem 1rem;
              text-decoration:none;"
          >Ingreso 2026</a>
        </div>
      </div>
    </nav>

  </header><!-- /#site-header -->


  <?php /* ─────────────────────────────────────────────────────────
         SCRIPTS DEL HEADER
         ───────────────────────────────────────────────────────── */ ?>
  <script>
  (function () {
    const header   = document.getElementById('site-header');
    const btnMenu  = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconMenu = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');
    const desktopNav  = document.getElementById('desktop-nav');
    const desktopCtas = document.getElementById('desktop-ctas');
    const desktopBtn = document.getElementById('mobile-menu-btn');

    // ── Breakpoint responsive ─────────────────────────────────
    function applyBreakpoint() {
      const wide = window.innerWidth >= 1024;
      desktopNav.style.display  = wide ? 'flex' : 'none';
      desktopCtas.style.display = wide ? 'flex' : 'none';
      desktopBtn.style.display  = wide ? 'none' : 'flex';
    }
    applyBreakpoint();
    window.addEventListener('resize', applyBreakpoint);

    // ── Scroll: transparente ↔ sólido ────────────────────────
    const THRESHOLD = 48;           // px desde el tope

    function onScroll() {
      if (window.scrollY > THRESHOLD) {
        header.classList.remove('at-top');
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
        header.classList.add('at-top');
      }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // estado inicial

    // ── Menú móvil toggle ─────────────────────────────────────
    btnMenu.addEventListener('click', function () {
      const isOpen = mobileMenu.classList.toggle('open');
      iconMenu.style.display  = isOpen ? 'none'   : 'block';
      iconClose.style.display = isOpen ? 'block'  : 'none';
      btnMenu.setAttribute('aria-expanded', isOpen);
      if (isOpen) {
        // Cuando abrimos el menú: header siempre sólido
        header.classList.remove('at-top');
        header.classList.add('scrolled');
      } else {
        // Al cerrar: re-evaluar posición de scroll
        onScroll();
      }
    });

    // ── Cerrar menú al hacer clic en un enlace (móvil) ────────
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('open');
        iconMenu.style.display  = 'block';
        iconClose.style.display = 'none';
        btnMenu.setAttribute('aria-expanded', 'false');
        onScroll();
      });
    });

    // ── Cerrar con Escape ─────────────────────────────────────
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
        mobileMenu.classList.remove('open');
        iconMenu.style.display  = 'block';
        iconClose.style.display = 'none';
        btnMenu.setAttribute('aria-expanded', 'false');
        btnMenu.focus();
        onScroll();
      }
    });
  })();
  </script>

  <?php /* ── Punto de anclaje para "saltar al contenido" ── */ ?>
  <main id="main-content" tabindex="-1" style="outline:none;">
