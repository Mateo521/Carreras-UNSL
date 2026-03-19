<?php

/**
 * Plantilla principal (Front Page)
 * Diseño Editorial Institucional — UNSL Carreras 2026
 */
get_header();
?>

<?php /* ─── ESTILOS GLOBALES ─────────────────────────────────────────── */ ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

    :root {
        --navy: #08183A;
        --navy-2: #0D2452;
        --azulunsl: #164270;
        --cream: #F5FCFF;
        --ice: #EAF2FF;
        --blue: #4A82DC;
        --blue-l: #A8C8F4;
        --ink: #111827;
        --mid: #6B7280;
        --line: rgba(8, 24, 58, 0.12);
    }

    /* Noise texture — grain sutil sobre fondos claros */
    .grain::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 1;
    }

    /* Reveal animado en scroll */
    .reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity .7s cubic-bezier(.22, 1, .36, 1), transform .7s cubic-bezier(.22, 1, .36, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-d1 {
        transition-delay: .1s;
    }

    .reveal-d2 {
        transition-delay: .2s;
    }

    .reveal-d3 {
        transition-delay: .3s;
    }

    .reveal-d4 {
        transition-delay: .4s;
    }

    /* Línea decorativa diagonal */
    .slash {
        display: inline-block;
        width: 2px;
        height: 1em;
        background: var(--azulunsl);
        transform: rotate(20deg) translateY(2px);
        margin: 0 .35em;
        flex-shrink: 0;
    }
</style>

<?php /* ─── SECCIÓN 1: HERO ─────────────────────────────────────────── */ ?>
<section
    class="relative min-h-screen flex flex-col justify-end overflow-hidden "
    style="background: var(--navy);">
    <?php /* Video de fondo */ ?> <!-- grain -->
    <video
        class="absolute inset-0 w-full h-full object-cover"
        style="z-index:0; opacity:.38;"
        autoplay muted loop playsinline
        src="<?php echo get_template_directory_uri(); ?>/videos/video-2.mp4"></video>

    <?php /* Gradiente: más opaco abajo para legibilidad del texto */ ?>
    <div
        class="absolute inset-0"
        style="z-index:1; background: linear-gradient(
      to bottom,
      rgba(8,24,58,.2) 0%,
      rgba(8,24,58,.5) 40%,
      rgba(8,24,58,.92) 80%,
      rgba(8,24,58,1) 100%
    );"></div>



    <?php /* Año fantasma en esquina superior derecha — elemento editorial */ ?>
    <div
    id="year-parallax"
    class="absolute bottom-0 right-0 select-none pointer-events-none"
    aria-hidden="true"
    style="
      z-index: 2;
      font-weight: 800;
      font-size: clamp(140px,20vw,280px);
      line-height: 0.7;
      color: white;
      letter-spacing: -.02em;
      padding: .1em .15em 0 0;
      display: flex; 
    ">
    <div class="scroll-mover"><span class="digit block" style="--delay: 0.1s;">2</span></div>
    <div class="scroll-mover"><span class="digit block" style="--delay: 0.25s;">0</span></div>
    <div class="scroll-mover"><span class="digit block" style="--delay: 0.4s;">2</span></div>
    <div class="scroll-mover"><span class="digit block" style="--delay: 0.55s;">6</span></div>
</div>


    <?php /* Contenido del hero */ ?> <!--  sm:px-12 lg:px-16 pb-20 -->
    <div
        class="absolute top-1/2 -translate-y-1/2 px-6 md:px-24 w-full max-w-7xl mx-auto "
        style="z-index:3;">

        <?php /* Eyebrow — etiqueta institucional */ ?>
        <div
            class="flex items-center gap-3 mb-7"
            style="animation: fadeUp .8s .1s both cubic-bezier(.22,1,.36,1);">

            <span
                style="
          font-size:.75rem;
          font-weight:500;
      
        text-transform:uppercase;
          color:rgba(255,255,255,.6);">Universidad Nacional de San Luis</span>
        </div>

        <?php /* Titular principal */ ?>
        <h1
            style="
        font-weight:800;
        font-size:clamp(44px,7vw,96px);
        line-height:1.0;
        letter-spacing:-.03em;
        color:#fff;
        margin-bottom:1.2rem;
        animation: fadeUp .8s .2s both cubic-bezier(.22,1,.36,1);">
            Carreras
            <em style="font-style:normal; color:var(--blue-l);">UNSL</em>
        </h1>

        <?php /* Bajada */ ?>
        <p
            style="
    
        font-size:clamp(16px,2vw,20px);
        color:rgba(255,255,255,.65);
        max-width:520px;
    
        margin-bottom:2.5rem;
        animation: fadeUp .8s .3s both cubic-bezier(.22,1,.36,1);">
            Explorá la oferta académica 2026 de la UNSL: pregrado, grado y posgrado en tres sedes de San Luis.
        </p>

        <?php /* Buscador */ ?>
        <div style="animation: fadeUp .8s .4s both cubic-bezier(.22,1,.36,1);">
            <form
                action="<?php echo home_url('/carreras/'); ?>"
                method="GET"
                style="display:flex;
        background:rgba(255,255,255,.07);
        border:1px solid rgba(255,255,255,.18);
        backdrop-filter:blur(16px);
        -webkit-backdrop-filter:blur(16px);
        max-width:580px;
        overflow:hidden;">
                <div style="position:relative;flex:1;">
                    <svg
                        style="position:absolute;left:18px;top:50%;transform:translateY(-50%);
            width:18px;height:18px;color:rgba(255,255,255,.45);pointer-events:none;"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input
                        type="search"
                        name="q"
                        placeholder="¿Qué te gustaría estudiar?"
                        style="width:100%;
            padding:1.1rem 1rem 1.1rem 3rem;
            background:transparent;
            border:none;
            outline:none;
            
            font-size:15px;
            color:#fff;">
                    <style>
                        input[name="q"]::placeholder {
                            color: rgba(255, 255, 255, .4);
                        }

                        input[name="q"]:focus {
                            outline: none;
                        }
                    </style>
                </div>
                <button
                    type="submit"
                    style="padding:.9rem 1.6rem;
            background:var(--azulunsl);
            border:none;
            cursor:pointer;
            
            font-weight:500;
            font-size:.85rem;
            letter-spacing:.06em;
            text-transform:uppercase;
            color:#fff;
            transition:background .2s;
            white-space:nowrap;"
                    onmouseover="this.style.background='#0B2B4D'"
                    onmouseout="this.style.background='var(--azulunsl)'">Buscar</button>
            </form>
        </div>

        <?php /* Badges de acceso rápido */ ?>
        <div
            class="flex flex-wrap gap-3 mt-6"
            style="animation: fadeUp .8s .5s both cubic-bezier(.22,1,.36,1);">
            <?php
            $quick = [
                ['Pregrado', '/carreras/?tipo=pregrado'],
                ['Grado',    '/carreras/?tipo=grado'],
                ['Posgrado', '/carreras/?tipo=posgrado'],
                ['Ver todas A–Z', '/carreras/'],
            ];
            foreach ($quick as $q) : ?>
                <a
                    href="<?php echo home_url($q[1]); ?>"
                    style="
            font-size:.78rem;
            font-weight:500;
            letter-spacing:.05em;
            color:rgba(255,255,255,.7);
            border:1px solid rgba(255,255,255,.2);
            padding:.4rem 1rem;
            text-decoration:none;
            transition:all .2s;"
                    onmouseover="this.style.background='rgba(255,255,255,.1)';this.style.color='#fff'"
                    onmouseout="this.style.background='transparent';this.style.color='rgba(255,255,255,.7)'"><?php echo $q[0]; ?></a>
            <?php endforeach; ?>
        </div>

    </div>

    <?php /* Indicador de scroll */ ?>
    <div
        class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2"
        style="z-index:3; animation: fadeUp .8s .8s both cubic-bezier(.22,1,.36,1);"
        aria-hidden="true">
        <span
            style="
        font-size:.7rem;
        letter-spacing:.2em;
        text-transform:uppercase;
        color:rgba(255,255,255,.35);"><a href="#seleccion">Explorar</a> </span>
        <div style="width:1px;height:36px;background:linear-gradient(to bottom,rgba(255,255,255,.35),transparent);"></div>
    </div>
</section>

<?php /* ─── KEYFRAMES ───────────────────────────────────────────────── */ ?>
<style>
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animación inicial para el 2026 */
    @keyframes fadeInScale {
        0% {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
        }

        100% {
            opacity: 0.04;
            /* La opacidad final que tenías */
            transform: scale(1) translateY(0);
        }
    }

    .fade-in-scale {
        animation: fadeInScale 1.5s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        /* El delay opcional si quieres que aparezca un poquito después de cargar */
        animation-delay: 0.2s;
    }


    .digit {
        opacity: 0;
        transform: translateY(30px);
        /* Usamos la variable --delay que definimos en el HTML */
        animation: fadeUpDigit 1s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        animation-delay: var(--delay);
    }

    @keyframes fadeUpDigit {
        to {
            opacity: 0.04;
            /* El nivel de transparencia que querías */
            transform: translateY(0);
        }
    }
</style>


<?php /* ─── SECCIÓN 2: NIVELES ACADÉMICOS ─────────────────────────── */ ?>
<section
    class="relative overflow-hidden "
    style="background:var(--cream); padding:7rem 1.5rem;">
    <div class="max-w-7xl mx-auto"> <!-- grain -->

        <?php /* Cabecera de sección — layout asimétrico */ ?>
        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-20">
            <div>
                <p id="seleccion"
                    style="
            font-size:.72rem;
            font-weight:500;
            letter-spacing:.22em;
            text-transform:uppercase;
            color:var(--azulunsl);
            margin-bottom:.8rem;">Oferta académica</p>
                <h2 
                    style="
            font-weight:800;
            font-size:clamp(32px,5vw,54px);
            line-height:1.05;
            letter-spacing:-.025em;
            color:var(--navy);">Descubrí tu camino académico</h2>
            </div>
            <p
                style="
          font-weight:300;
          font-size:1rem;
          color:var(--mid);
          max-width:380px;
          line-height:1.7;">Seleccioná el nivel académico de tu interés para explorar la oferta completa de la UNSL.</p>
        </div>

        <?php /* Tarjetas de nivel — layout con números grandes */ ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 rounded-xl"> <!-- style="background:var(--line);" -->

            <?php
            $niveles = [
                [
                    'num'    => 'a',
                    'tipo'   => 'pregrado',
                    'titulo' => 'Pregrado',
                    'desc'   => 'Tecnicaturas universitarias y carreras cortas orientadas al ejercicio profesional inmediato.',
                    'tags'   => ['Tecnicaturas', 'Ciclos cortos'],
                ],
                [
                    'num'    => 'b',
                    'tipo'   => 'grado',
                    'titulo' => 'Grado',
                    'desc'   => 'Licenciaturas, ingenierías, profesorados y otras carreras de grado universitario pleno.',
                    'tags'   => ['Licenciaturas', 'Ingenierías', 'Profesorados'],
                ],
                [
                    'num'    => 'c',
                    'tipo'   => 'posgrado',
                    'titulo' => 'Posgrado',
                    'desc'   => 'Especializaciones, maestrías y doctorados para la formación avanzada e investigación.',
                    'tags'   => ['Especializaciones', 'Maestrías', 'Doctorados'],
                ],
            ];
            foreach ($niveles as $i => $n) : ?>
                <a
                    href="<?php echo home_url('/carreras/?tipo=' . $n['tipo']); ?>"
                    class="reveal rounded-xl reveal-d<?php echo $i + 1; ?> group block"
                    style="background:#fff;
            text-decoration:none;
            padding:3rem 2.5rem;
            position:relative;
            overflow:hidden;
            transition:background .3s;"
                    onmouseover="this.style.background='var(--navy)'"
                    onmouseout="this.style.background='#fff'">
                    <?php /* Número editorial grande */ ?>
                    <!--span
                        class="group-hover-number"
                        style="
            font-weight:800;
            font-size:5rem;
            line-height:1;
            letter-spacing:-.04em;
            color:var(--cream);
            position:absolute;
            top:1.5rem;
            right:2rem;
            transition:color .3s, opacity .3s;
            user-select:none;"
                        aria-hidden="true"><?php echo $n['num']; ?></span-->

                    <!--p
                        style="
            font-size:.72rem;
            font-weight:500;
            letter-spacing:.18em;
            text-transform:uppercase;
            color:var(--azulunsl);
            margin-bottom:1.2rem;
            position:relative;z-index:1;
            transition:color .3s;"><?php echo $n['num']; ?></p-->

                    <h3
                        style="
            font-weight:700;
            font-size:1.9rem;
            letter-spacing:-.02em;
            color:var(--navy);
            margin-bottom:1rem;
            position:relative;z-index:1;
            transition:color .3s;"><?php echo $n['titulo']; ?></h3>

                    <p
                        style="
            font-weight:300;
            font-size:.93rem;
            color:var(--mid);
            line-height:1.65;
            margin-bottom:2rem;
            position:relative;z-index:1;
            transition:color .3s;"><?php echo $n['desc']; ?></p>

                    <?php /* Tags */ ?>
                    <div style="display:flex;flex-wrap:wrap;gap:.5rem;margin-bottom:2.5rem;position:relative;z-index:1;">
                        <?php foreach ($n['tags'] as $tag) : ?>
                            <span
                                style="
                  font-size:.72rem;
                  font-weight:500;
                  color:var(--navy);
                  background:var(--ice);
                  padding:.25rem .75rem;
                  transition:background .3s, color .3s;"
                                class="tag-chip"><?php echo $tag; ?></span>
                        <?php endforeach; ?>
                    </div>

                    <?php /* CTA flecha */ ?>
                    <div
                        style="display:flex;
              align-items:center;
              gap:.5rem;
              
              font-size:.82rem;
              font-weight:500;
              color:var(--navy);
              position:relative;z-index:1;
              transition:color .3s;">
                        <span>Ver carreras</span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>

                </a>
            <?php endforeach; ?>
        </div>

        <?php /* Nota al pie */ ?>
        <div class="reveal reveal-d4 flex items-center justify-center gap-4 mt-12">
            <span style="display:block;height:1px;width:40px;background:var(--line);"></span>
            <a
                href="<?php echo home_url('/carreras/'); ?>"
                style="
          font-size:.82rem;
          font-weight:500;
          color:var(--mid);
          text-decoration:none;
          letter-spacing:.04em;
          transition:color .2s;"
                onmouseover="this.style.color='var(--navy)'"
                onmouseout="this.style.color='var(--mid)'">Ver todas las carreras (A–Z)</a>
            <span style="display:block;height:1px;width:40px;background:var(--line);"></span>
        </div>

    </div>
</section>

<?php /* Hover inline styles para las tarjetas */ ?>
<style>
    a[href*="tipo"]:hover .tag-chip {
        background: rgba(255, 255, 255, .12) !important;
        color: #fff !important;
    }

    a[href*="tipo"]:hover h3 {
        color: #fff !important;
    }

    a[href*="tipo"]:hover p {
        color: rgba(255, 255, 255, .65) !important;
    }

    a[href*="tipo"]:hover>div:last-child {
        color: #fff !important;
    }

    a[href*="tipo"]:hover .group-hover-number {
        color: rgba(255, 255, 255, .08) !important;
    }
</style>


<?php /* ─── SECCIÓN 3: OVO — ORIENTACIÓN VOCACIONAL ─────────────────── */ ?>
<section
    class="relative overflow-hidden"
    style="background:var(--navy); padding:7rem 1.5rem;">
    <?php /* Línea decorativa lateral */ ?>
    <div
        aria-hidden="true"
        style="position:absolute;top:0;left:0;width:3px;height:100%;background:linear-gradient(to bottom, transparent, var(--azulunsl), transparent);"></div>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <?php /* Columna izquierda: texto */ ?>
            <div>
                <p
                    class="reveal"
                    style="
            font-size:.72rem;
            font-weight:500;
            letter-spacing:.22em;
            text-transform:uppercase;
            color:var(--azulunsl);
            margin-bottom:1.2rem;">Servicio gratuito · UNSL</p>

                <h2
                    class="reveal reveal-d1"
                    style="
            font-weight:800;
            font-size:clamp(30px,4.5vw,52px);
            line-height:1.05;
            letter-spacing:-.025em;
            color:#fff;
            margin-bottom:1.5rem;">¿Todavía no sabés qué estudiar?</h2>

                <p
                    class="reveal reveal-d2"
                    style="
            font-weight:300;
            font-size:1rem;
            color:rgba(255,255,255,.6);
            line-height:1.75;
            max-width:440px;
            margin-bottom:2.5rem;">
                    El <strong style="color:#fff;font-weight:500;">Servicio de Orientación Vocacional Ocupacional (OVO)</strong> es permanente, abierto y gratuito para toda la comunidad, dependiente de la Secretaría Académica de la UNSL.
                </p>

                <div class="reveal reveal-d3">
                    <a
                        href="https://secretariaacademica.unsl.edu.ar/categoria/ovo"
                        target="_blank"
                        rel="noopener noreferrer"
                        style="display:inline-flex;
              align-items:center;
              gap:.6rem;
              
              font-weight:500;
              font-size:.88rem;
              letter-spacing:.06em;
              text-transform:uppercase;
              color:var(--navy);
              background:var(--azulunsl);
              padding:.9rem 1.8rem;
              text-decoration:none;
              transition:background .2s;"
                        onmouseover="this.style.background='#126F99'"
                        onmouseout="this.style.background='var(--azulunsl)'">
                        Ingresá al programa OVO
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <?php /* Columna derecha: contacto */ ?>
            <div class="reveal reveal-d2">
                <p
                    style="
            font-size:.72rem;
            font-weight:500;
            letter-spacing:.16em;
            text-transform:uppercase;
            color:rgba(255,255,255,.3);
            margin-bottom:1.5rem;
            padding-bottom:1.5rem;
            border-bottom:1px solid rgba(255,255,255,.08);">Canales de contacto</p>

                <?php
                $contactos = [
                    [
                        'tipo'   => 'email',
                        'href'   => 'mailto:ovounsl@gmail.com',
                        'label'  => 'ovounsl@gmail.com',
                        'target' => '_self',
                        'icon'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>',
                    ],
                    [
                        'tipo'   => 'facebook',
                        'href'   => 'https://www.facebook.com/people/Orientaci%C3%B3n-Vocacional-Unsl/100054513097602/',
                        'label'  => 'Facebook',
                        'target' => '_blank',
                        'icon'   => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="currentColor"/>',
                    ],
                    [
                        'tipo'   => 'instagram',
                        'href'   => 'https://www.instagram.com/programa_ovo_unsl/',
                        'label'  => '@programa_ovo_unsl',
                        'target' => '_blank',
                        'icon'   => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm4.846-10.405c0 .795.645 1.44 1.44 1.44s1.44-.645 1.44-1.44-.645-1.44-1.44-1.44-1.44.645-1.44 1.44z" fill="currentColor"/>',
                    ],
                ];
                foreach ($contactos as $c) :
                    $icon_props = $c['tipo'] === 'email'
                        ? 'fill="none" stroke="currentColor" stroke-width="1.5"'
                        : '';
                ?>
                    <a
                        href="<?php echo $c['href']; ?>"
                        target="<?php echo $c['target']; ?>"
                        rel="noopener noreferrer"
                        style="display:flex;
              align-items:center;
              gap:1.2rem;
              padding:1.2rem 0;
              border-bottom:1px solid rgba(255,255,255,.07);
              text-decoration:none;
              group:true;
              transition:padding-left .2s;"
                        onmouseover="this.style.paddingLeft='.5rem'"
                        onmouseout="this.style.paddingLeft='0'">
                        <span
                            style="width:36px;height:36px;
                display:flex;align-items:center;justify-content:center;
                border:1px solid rgba(255,255,255,.15);
                color:rgba(255,255,255,.5);
                flex-shrink:0;">
                            <svg width="16" height="16" viewBox="0 0 24 24" <?php echo $icon_props; ?>>
                                <?php echo $c['icon']; ?>
                            </svg>
                        </span>
                        <span
                            style="
                font-size:.9rem;
                font-weight:400;
                color:rgba(255,255,255,.75);"><?php echo $c['label']; ?></span>
                        <svg style="margin-left:auto;color:rgba(255,255,255,.25);" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>


<?php /* ─── SECCIÓN 4: FACULTADES ──────────────────────────────────── */ ?>
<section
    class=""
    style="background:var(--cream); padding:7rem 1.5rem;"> <!-- grain -->
    <div class="max-w-7xl mx-auto">

        <?php /* Encabezado */ ?>
        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
                <p
                    style="
            font-size:.72rem;
            font-weight:500;
            letter-spacing:.22em;
            text-transform:uppercase;
            color:var(--azulunsl);
            margin-bottom:.8rem;">Estructura académica</p>
                <h2
                    style="
            font-weight:800;
            font-size:clamp(28px,4vw,46px);
            line-height:1.05;
            letter-spacing:-.025em;
            color:var(--navy);">Facultades<br>e institutos</h2>
            </div>
            <p
                style="
          font-weight:300;
          font-size:.95rem;
          color:var(--mid);
          max-width:340px;
          line-height:1.7;">Nueve unidades académicas distribuidas en tres sedes: San Luis, Villa Mercedes y Merlo.</p>
        </div>

        <?php /* Grilla de facultades — estilo editorial con borde izquierdo de color */ ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php


            $facultades = [
                ['sigla' => 'FQBYF',  'nombre' => 'Química, Bioquímica y Farmacia',             'sede' => 'San Luis',                  'hex' => '#008e3b', 'img' => 'fqbyf.png'],
                ['sigla' => 'FCFMyN', 'nombre' => 'Ciencias Físico Matemáticas y Naturales',    'sede' => 'San Luis',                  'hex' => '#d2231f', 'img' => 'fcfmyn.png'],
                ['sigla' => 'FICA',   'nombre' => 'Ingeniería y Ciencias Agropecuarias',        'sede' => 'Villa Mercedes',            'hex' => '#2e6fa5', 'img' => 'fica.png'],
                ['sigla' => 'FCEJS',  'nombre' => 'Ciencias Económicas, Jurídicas y Sociales',  'sede' => 'Villa Mercedes',            'hex' => '#6b2fa0', 'img' => 'fcejs.png'],
                ['sigla' => 'FCH',    'nombre' => 'Ciencias Humanas',                           'sede' => 'San Luis',                  'hex' => '#e5641c', 'img' => 'fch.png'],
                ['sigla' => 'FAPSI',  'nombre' => 'Psicología',                                 'sede' => 'San Luis',                  'hex' => '#c89a00', 'img' => 'fapsi.png'],
                ['sigla' => 'FCS',    'nombre' => 'Ciencias de la Salud',                       'sede' => 'San Luis · Villa Mercedes', 'hex' => '#5a8f1e', 'img' => 'fcs.png'],
                ['sigla' => 'FTU',    'nombre' => 'Turismo y Urbanismo',                        'sede' => 'Merlo',                     'hex' => '#8a6200', 'img' => 'ftu.png'],
            ];

            foreach ($facultades as $i => $fac) :
                $slug = strtolower($fac['sigla']);
                $delay = ($i % 3) + 1;
            ?>
                <a
                    href="<?php echo home_url('/facultad/' . $slug . '/'); ?>"
                    class="reveal reveal-d<?php echo $delay; ?> group"
                    style="display:flex;
            align-items:center;
            gap:1.2rem;
            background:#fff;
            padding:1.5rem;
            border-left:3px solid <?php echo $fac['hex']; ?>;
            text-decoration:none;
            transition:transform .2s, box-shadow .2s;"
                    onmouseover="this.style.transform='translateX(4px)';this.style.boxShadow='0 4px 20px rgba(8,24,58,.08)'"
                    onmouseout="this.style.transform='translateX(0)';this.style.boxShadow='none'">
                    <?php /* Ícono/logo de facultad */ ?>
                    <div
                        style="width:44px;height:44px;
            display:flex;align-items:center;justify-content:center;
            flex-shrink:0;
            background:<?php echo $fac['hex']; ?>14;">
                        <img
                            src="<?php echo get_template_directory_uri() . '/imagenes/' . $fac['img']; ?>"
                            alt="<?php echo $fac['sigla']; ?>"
                            width="28" height="28"
                            style="object-fit:contain;"
                            onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                        <span
                            style="display:none;
                
                font-weight:700;
                font-size:.7rem;
                color:<?php echo $fac['hex']; ?>;"><?php echo substr($fac['sigla'], 0, 2); ?></span>
                    </div>

                    <div style="min-width:0;">
                        <p
                            style="
                font-size:.68rem;
                font-weight:500;
                letter-spacing:.18em;
                text-transform:uppercase;
                color:<?php echo $fac['hex']; ?>;
                margin-bottom:.25rem;"><?php echo $fac['sigla']; ?></p>

                        <p
                            style="
                font-weight:500;
                font-size:.88rem;
                color:var(--ink);
                line-height:1.35;
                margin-bottom:.4rem;"><?php echo $fac['nombre']; ?></p>

                        <p
                            style="
                font-size:.75rem;
                color:var(--mid);
                display:flex;
                align-items:center;
                gap:.3rem;">
                            <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                            </svg>
                            <?php echo $fac['sede']; ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

            <?php /* IPAU — destacado */ ?>
            <a
                href="<?php echo home_url('/carreras/?facultad=IPAU'); ?>"
                class="reveal reveal-d3 md:col-span-2 lg:col-span-1 group"
                style="display:flex;
        align-items:center;
        gap:1.2rem;
        background:var(--navy);
        padding:1.5rem;
        border-left:3px solid var(--azulunsl);
        text-decoration:none;
        transition:transform .2s;"
                onmouseover="this.style.transform='translateX(4px)'"
                onmouseout="this.style.transform='translateX(0)'">
                <div
                    style="width:44px;height:44px;
            display:flex;align-items:center;justify-content:center;
            flex-shrink:0;
            background:rgba(200,146,42,.15);">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/imagenes/ipau.png"
                        alt="IPAU"
                        width="28" height="28"
                        style="object-fit:contain;"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                    <span
                        style="display:none;
              
              font-weight:700;
              font-size:.7rem;
              color:var(--azulunsl);">IP</span>
                </div>

                <div>
                    <p
                        style="
              font-size:.68rem;
              font-weight:500;
              letter-spacing:.18em;
              text-transform:uppercase;
              color:var(--azulunsl);
              margin-bottom:.25rem;">IPAU</p>
                    <p
                        style="
              font-weight:500;
              font-size:.88rem;
              color:#fff;
              line-height:1.35;
              margin-bottom:.4rem;">Instituto Politécnico y Artístico Universitario</p>
                    <p
                        style="
              font-size:.75rem;
              color:rgba(255,255,255,.4);
              display:flex;align-items:center;gap:.3rem;">
                        <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                        </svg>
                        San Luis
                    </p>
                </div>
            </a>

        </div>
    </div>
</section>

<?php /* ─── SCRIPT: SCROLL REVEAL ─────────────────────────────────── */ ?>
<script>
    (function() {
        const els = document.querySelectorAll('.reveal');
        if (!els.length) return;
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
    })();



    document.addEventListener("DOMContentLoaded", function() {
        const movers = document.querySelectorAll('#year-parallax .scroll-mover');

        if (movers.length === 0) {
            console.error("x");
            return;
        }

        window.addEventListener('scroll', function() {
            let scrollPosition = window.scrollY;

            movers.forEach((mover, index) => {
                let scrollThreshold = index * 45;
                let effectiveScroll = Math.max(0, scrollPosition - scrollThreshold);

                let moveX = -(effectiveScroll * 1);
                let moveY = 0; //-(effectiveScroll * 0.15)

                mover.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    });

</script>


<?php get_footer(); ?>