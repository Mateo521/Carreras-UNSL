<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?php wp_title('|', true, 'right'); ?></title>

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet" />



  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-toolbar.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/css/a11y-custom.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <!--script src="<?php echo get_template_directory_uri(); ?>/js/a11y-toolbar-master/js/a11y-custom.js"></script-->

  <?php wp_head(); ?>
</head>

<body <?php body_class("bg-[#EEF1F5] text-[#1a1a2e] antialiased"); ?>>

  <header class="bg-[#0b1f4a]/95 backdrop-blur-md sticky top-0 z-50 border-b border-[#ffffff12] transition-all duration-300 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">

        <div class="flex-shrink-0 flex items-center">
          <a href="<?php echo home_url(); ?>" class="focus:outline-none focus:ring-2 focus:ring-[#88CAFC] rounded-sm">
            <span class="sr-only">Inicio UNSL</span>
            <img class="h-12 w-auto object-contain" src="<?php echo get_template_directory_uri(); ?>/logo-unsl-negativo2.svg" alt="Logo Universidad Nacional de San Luis" />
          </a>
        </div>

        <nav class="hidden lg:flex items-center gap-8">
          <a href="<?php echo home_url(); ?>" class="text-white font-medium hover:text-[#88CAFC] transition-colors text-sm tracking-wide">Inicio</a>
          <a href="<?php echo home_url('/carreras/'); ?>" class="text-slate-300 font-medium hover:text-[#88CAFC] transition-colors text-sm tracking-wide">Carreras</a>
          <a href="<?php echo home_url('/facultades/'); ?>" class="text-slate-300 font-medium hover:text-[#88CAFC] transition-colors text-sm tracking-wide">Facultades</a>
          <a href="<?php echo home_url('/sedes/'); ?>" class="text-slate-300 font-medium hover:text-[#88CAFC] transition-colors text-sm tracking-wide">Sedes</a>
        </nav>

        <div class="hidden lg:flex items-center gap-4">
          <a href="https://campus.unsl.edu.ar/" target="_blank" class="bg-white/10 hover:bg-white/20 text-white px-5 py-2 rounded-lg font-medium transition-colors text-sm border border-white/10 focus:outline-none focus:ring-2 focus:ring-white/50">
            Campus Virtual
          </a>
          <a href="<?php echo home_url('/preinscripcion/'); ?>" class="bg-[#88CAFC] hover:bg-[#6ab3ea] text-[#0b1f4a] px-6 py-2 rounded-lg font-bold transition-all text-sm focus:outline-none focus:ring-2 focus:ring-[#88CAFC] focus:ring-offset-2 focus:ring-offset-[#0b1f4a]">
            Preinscripción
          </a>
        </div>

        <div class="flex lg:hidden items-center">
          <button id="mobile-menu-btn" type="button" class="text-slate-300 hover:text-white focus:outline-none p-2 rounded-md focus:ring-2 focus:ring-[#88CAFC]" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Abrir menú principal</span>
            <svg id="icon-menu" class="h-6 w-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="icon-close" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

      </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-[#0b1f4a] border-t border-[#ffffff12] shadow-2xl">
      <div class="px-4 pt-2 pb-6 space-y-1">
        <a href="<?php echo home_url(); ?>" class="block px-3 py-3 text-base font-medium text-white bg-white/5 rounded-md">Inicio</a>
        <a href="<?php echo home_url('/carreras/'); ?>" class="block px-3 py-3 text-base font-medium text-slate-300 hover:text-white hover:bg-white/5 rounded-md transition-colors">Carreras</a>
        <a href="<?php echo home_url('/facultades/'); ?>" class="block px-3 py-3 text-base font-medium text-slate-300 hover:text-white hover:bg-white/5 rounded-md transition-colors">Facultades</a>
        <a href="<?php echo home_url('/sedes/'); ?>" class="block px-3 py-3 text-base font-medium text-slate-300 hover:text-white hover:bg-white/5 rounded-md transition-colors">Sedes</a>

        <div class="mt-6 pt-6 border-t border-white/10 flex flex-col gap-3">
          <a href="https://campus.unsl.edu.ar/" target="_blank" class="block text-center w-full bg-white/10 text-white px-5 py-3 rounded-lg font-medium border border-white/10">
            Campus Virtual
          </a>
          <a href="<?php echo home_url('/preinscripcion/'); ?>" class="block text-center w-full bg-[#88CAFC] text-[#0b1f4a] px-5 py-3 rounded-lg font-bold">
            Ingreso 2026
          </a>
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const btn = document.getElementById('mobile-menu-btn');
      const menu = document.getElementById('mobile-menu');
      const iconMenu = document.getElementById('icon-menu');
      const iconClose = document.getElementById('icon-close');

      if (btn) {
        btn.addEventListener('click', () => {
          menu.classList.toggle('hidden');
          iconMenu.classList.toggle('hidden');
          iconClose.classList.toggle('hidden');
          iconClose.classList.toggle('block');
          const isExpanded = btn.getAttribute('aria-expanded') === 'true';
          btn.setAttribute('aria-expanded', !isExpanded);
        });
      }
    });
  </script>