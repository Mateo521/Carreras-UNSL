<?php

/**
 *  principal
 *  UNSL Carreras
 */
get_header();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

    .grain::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 1;
    }

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

    @keyframes fadeUpDigit {
        to {
            opacity: 0.04;
            transform: translateY(0);
        }
    }
</style>

<section class="relative min-h-screen flex flex-col justify-end overflow-hidden bg-[#151B4D]">

    <video
        class="absolute inset-0 w-full h-full object-cover z-0 opacity-40"
        autoplay muted loop playsinline
        src="<?php echo get_template_directory_uri(); ?>/videos/video-4.mp4"></video>

    <div class="absolute inset-0 z-10 bg-gradient-to-b from-[#080d381a] from-0% via-[#080d381a] via-40% via-[#080d3833] via-80% to-[#080d38b3] to-100%"></div>

    <div id="year-parallax" class="absolute bottom-0 right-0 select-none pointer-events-none z-20 font-extrabold text-[clamp(140px,20vw,280px)] leading-[0.7] text-white tracking-[-0.02em] pt-[0.1em] pr-[0.15em] flex" aria-hidden="true">
        <div class="scroll-mover"><span class="block opacity-0  animate-[fadeUpDigit_1s_cubic-bezier(0.25,1,0.5,1)_forwards] [animation-delay:0.1s]">2</span></div>
        <div class="scroll-mover"><span class="block opacity-0  animate-[fadeUpDigit_1s_cubic-bezier(0.25,1,0.5,1)_forwards] [animation-delay:0.25s]">0</span></div>
        <div class="scroll-mover"><span class="block opacity-0  animate-[fadeUpDigit_1s_cubic-bezier(0.25,1,0.5,1)_forwards] [animation-delay:0.4s]">2</span></div>
        <div class="scroll-mover"><span class="block opacity-0  animate-[fadeUpDigit_1s_cubic-bezier(0.25,1,0.5,1)_forwards] [animation-delay:0.55s]">7</span></div>
    </div>

    <div class="absolute top-1/2 -translate-y-1/2 px-6 md:px-24 w-full max-w-7xl mx-auto z-30">
        <div class="flex items-center gap-3 mb-0 animate-[fadeUp_.8s_.1s_both_cubic-bezier(.22,1,.36,1)]">
            <span class="text-base font-medium uppercase text-white/60">Universidad Nacional de San Luis</span>
        </div>

        <h1 class="relative -left-1 font-extrabold text-[clamp(44px,7vw,96px)] leading-none tracking-[-0.03em] text-white mb-5 animate-[fadeUp_.8s_.2s_both_cubic-bezier(.22,1,.36,1)]">
            Carreras <em class="not-italic text-[#A8C8F4]">UNSL</em>
        </h1>

        <p class="text-[clamp(16px,2vw,20px)] text-white/65 max-w-[520px] mb-10 animate-[fadeUp_.8s_.3s_both_cubic-bezier(.22,1,.36,1)]">
            Explorá la propuesta académica 2027 de la UNSL: pregrado, grado y posgrado en tres sedes de San Luis.
        </p>

        <div class="animate-[fadeUp_.8s_.4s_both_cubic-bezier(.22,1,.36,1)]">
            <form action="<?php echo home_url('/carreras/'); ?>" method="GET" class="flex bg-white/5 border border-white/20 backdrop-blur-md max-w-[580px] overflow-hidden">
                <div class="relative flex-1">
                    <svg class="absolute left-[18px] top-1/2 -translate-y-1/2 w-[18px] h-[18px] text-white/45 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="search" name="q" placeholder="¿Qué te gustaría estudiar?" class="w-full py-[1.1rem] pr-4 pl-12 bg-transparent border-none outline-none text-[15px] text-white placeholder-white/40 focus:outline-none">
                </div>
                <button type="submit" class="px-[1.6rem] py-[0.9rem] bg-[#2a3e8a] hover:bg-[#0B2B4D] font-medium text-[0.85rem] tracking-[0.06em] uppercase text-white transition-colors whitespace-nowrap">
                    Buscar
                </button>
            </form>
        </div>

        <div class="flex flex-wrap gap-3 mt-6 animate-[fadeUp_.8s_.5s_both_cubic-bezier(.22,1,.36,1)]">
            <?php
            $quick = [
                ['Pregrado', '/carreras/?tipo=pregrado'],
                ['Grado',    '/carreras/?tipo=grado'],
                ['Posgrado', '/carreras/?tipo=posgrado'],
                ['Ver todas A–Z', '/carreras/'],
            ];
            foreach ($quick as $q) : ?>
                <a href="<?php echo home_url($q[1]); ?>" class="text-[0.78rem] font-medium tracking-[0.05em] text-white/70 border border-white/20 py-[0.4rem] px-4 hover:bg-white/10 hover:text-white transition-all">
                    <?php echo $q[0]; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 z-30 animate-[fadeUp_.8s_.8s_both_cubic-bezier(.22,1,.36,1)]" aria-hidden="true">
        <span class="text-[0.7rem] tracking-[0.2em] uppercase text-white/35"><a href="#seleccion">Explorar</a></span>
        <div class="w-[1px] h-[36px] bg-gradient-to-b from-white/35 to-transparent"></div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#C9E0FF] py-28 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-20">
            <div>
                <p id="seleccion" class="text-[0.72rem] font-medium tracking-[0.22em] uppercase text-[#2a3e8a] mb-3">Propuesta académica</p>
                <h2 class="font-extrabold text-[clamp(32px,5vw,54px)] leading-[1.05] tracking-[-0.025em] text-[#151B4D]">Descubrí tu futuro académico</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 rounded-xl">
            <?php
            $niveles = [
                ['tipo' => 'pregrado', 'titulo' => 'Pregrado', 'desc' => 'Tecnicaturas universitarias y carreras cortas orientadas al ejercicio profesional inmediato.', 'tags' => ['Tecnicaturas', 'Ciclos cortos']],
                ['tipo' => 'grado',    'titulo' => 'Grado',    'desc' => 'Licenciaturas, ingenierías, profesorados y otras carreras de grado universitario pleno.', 'tags' => ['Licenciaturas', 'Ingenierías', 'Profesorados']],
                ['tipo' => 'posgrado', 'titulo' => 'Posgrado', 'desc' => 'Especializaciones, maestrías y doctorados para la formación avanzada e investigación.', 'tags' => ['Especializaciones', 'Maestrías', 'Doctorados']],
            ];
            foreach ($niveles as $i => $n) : ?>
                <a href="<?php echo home_url('/carreras/?tipo=' . $n['tipo']); ?>" class="reveal rounded-xl reveal-d<?php echo $i + 1; ?> group block p-12 relative overflow-hidden bg-white hover:bg-[#151B4D] transition-colors duration-300">
                    <h3 class="font-bold text-[1.9rem] tracking-[-0.02em] text-[#151B4D] group-hover:text-white mb-4 relative z-10 transition-colors">
                        <?php echo $n['titulo']; ?>
                    </h3>
                    <p class="font-light text-[0.93rem] text-[#6B7280] group-hover:text-white/65 leading-[1.65] mb-8 relative z-10 transition-colors">
                        <?php echo $n['desc']; ?>
                    </p>
                    <div class="flex flex-wrap gap-2 mb-10 relative z-10">
                        <?php foreach ($n['tags'] as $tag) : ?>
                            <span class="text-[0.72rem] font-medium text-[#151B4D] bg-[#EAF2FF] group-hover:bg-white/12 group-hover:text-white py-1 px-3 transition-colors">
                                <?php echo $tag; ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex items-center gap-2 text-[0.82rem] font-medium text-[#151B4D] group-hover:text-white relative z-10 transition-colors">
                        <span>Ver carreras</span>
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="reveal reveal-d4 flex items-center justify-center gap-4 mt-12">
            <span class="block h-[1px] w-[40px] bg-[#232C771F]"></span>
            <a href="<?php echo home_url('/carreras/'); ?>" class="text-[0.82rem] font-medium text-[#6B7280] hover:text-[#151B4D] tracking-[0.04em] transition-colors">
                Ver todas las carreras (A–Z)
            </a>
            <span class="block h-[1px] w-[40px] bg-[#232C771F]"></span>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#151B4D] py-28 px-6">
    <div aria-hidden="true" class="absolute top-0 left-0 w-[3px] h-full bg-gradient-to-b from-transparent via-[#2a3e8a] to-transparent"></div>
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            <div>
                <h2 class="reveal reveal-d1 font-extrabold text-[clamp(30px,4.5vw,52px)] leading-[1.05] tracking-[-0.025em] text-white mb-6">
                    ¿Todavía no sabés qué estudiar?
                </h2>
                <p class="reveal reveal-d2 font-light text-base text-white/60 leading-[1.75] max-w-[440px] mb-10">
                    El <strong class="text-white font-medium">Servicio de Orientación Vocacional Ocupacional (OVO)</strong> es permanente, abierto y gratuito para toda la comunidad, dependiente de la Secretaría Académica de la UNSL.
                </p>
                <div class="reveal reveal-d3">
                    <a href="https://secretariaacademica.unsl.edu.ar/categoria/ovo" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-[0.6rem] font-medium text-[0.88rem] tracking-[0.06em] uppercase text-white bg-[#2a3e8a] hover:bg-[#126F99] py-[0.9rem] px-[1.8rem] transition-colors">
                        Ingresá al programa OVO
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="reveal reveal-d2">
                <p class="text-[0.72rem] font-medium tracking-[0.16em] uppercase text-white/30 mb-6 pb-6 border-b border-white/10">Contacto y redes</p>
                <?php
                $contactos = [
                    ['tipo' => 'email', 'href' => 'mailto:ovounsl@gmail.com', 'label' => 'ovounsl@gmail.com', 'target' => '_self', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>'],
                    ['tipo' => 'facebook', 'href' => 'https://www.facebook.com/people/Orientaci%C3%B3n-Vocacional-Unsl/100054513097602/', 'label' => 'Facebook', 'target' => '_blank', 'icon' => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="currentColor"/>'],
                    ['tipo' => 'instagram', 'href' => 'https://www.instagram.com/programa_ovo_unsl/', 'label' => '@programa_ovo_unsl', 'target' => '_blank', 'icon' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm4.846-10.405c0 .795.645 1.44 1.44 1.44s1.44-.645 1.44-1.44-.645-1.44-1.44-1.44-1.44.645-1.44 1.44z" fill="currentColor"/>'],
                ];
                foreach ($contactos as $c) :
                    $icon_props = $c['tipo'] === 'email' ? 'fill="none" stroke="currentColor" stroke-width="1.5"' : '';
                ?>
                    <a href="<?php echo $c['href']; ?>" target="<?php echo $c['target']; ?>" rel="noopener noreferrer" class="group flex items-center gap-5 py-[1.2rem] border-b border-white/10 hover:pl-2 transition-all">
                        <span class="w-[36px] h-[36px] flex items-center justify-center border border-white/15 text-white/50 shrink-0">
                            <svg width="16" height="16" viewBox="0 0 24 24" <?php echo $icon_props; ?>>
                                <?php echo $c['icon']; ?>
                            </svg>
                        </span>
                        <span class="text-[0.9rem] font-normal text-white/75"><?php echo $c['label']; ?></span>
                        <svg class="ml-auto text-white/25" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#C9E0FF] py-28 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="reveal flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-16">
            <div>
                <p class="text-[0.72rem] font-medium  uppercase text-[#2a3e8a] mb-3">Unidades académicas</p>
                <h2 class="font-extrabold text-[clamp(28px,4vw,46px)] leading-[1.05] tracking-[-0.025em] text-[#151B4D]">Facultades<br>e institutos</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            $facultades = [
                ['sigla' => 'FQBYF',  'nombre' => 'Facultad de Química, Bioquímica y Farmacia',             'sede' => 'San Luis',                  'hex' => '#008e3b', 'img' => 'fqbyf.png'],
                ['sigla' => 'FCFMyN', 'nombre' => 'Facultad de Ciencias Físico Matemáticas y Naturales',    'sede' => 'San Luis',                  'hex' => '#d2231f', 'img' => 'fcfmyn.png'],
                ['sigla' => 'FICA',   'nombre' => 'Facultad de Ingeniería y Ciencias Agropecuarias',        'sede' => 'Villa Mercedes',            'hex' => '#2e6fa5', 'img' => 'fica.png'],
                ['sigla' => 'FCEJS',  'nombre' => 'Facultad de Ciencias Económicas, Jurídicas y Sociales',  'sede' => 'Villa Mercedes',            'hex' => '#6b2fa0', 'img' => 'fcejs.png'],
                ['sigla' => 'FCH',    'nombre' => 'Facultad de Ciencias Humanas',                           'sede' => 'San Luis',                  'hex' => '#e5641c', 'img' => 'fch.png'],
                ['sigla' => 'FAPSI',  'nombre' => 'Facultad de Psicología',                                 'sede' => 'San Luis',                  'hex' => '#c89a00', 'img' => 'fapsi.png'],
                ['sigla' => 'FCS',    'nombre' => 'Facultad de Ciencias de la Salud',                       'sede' => 'San Luis · Villa Mercedes', 'hex' => '#5a8f1e', 'img' => 'fcs.png'],
                ['sigla' => 'FTU',    'nombre' => 'Facultad de Turismo y Urbanismo',                        'sede' => 'Merlo',                     'hex' => '#8a6200', 'img' => 'ftu.png'],
            ];
            foreach ($facultades as $i => $fac) :
                $slug = strtolower($fac['sigla']);
                $delay = ($i % 3) + 1;
            ?>
                <a href="<?php echo home_url('/unidad-academica/' . $slug . '/'); ?>" class="reveal reveal-d<?php echo $delay; ?> group flex items-center gap-[1.2rem] bg-white p-6 transition-all hover:translate-x-1 hover:shadow-[0_4px_20px_rgba(8,24,58,0.08)]" style="border-left: 3px solid <?php echo $fac['hex']; ?>;">
                    <div class="w-[44px] h-[44px] flex items-center justify-center shrink-0">
                        <img src="<?php echo get_template_directory_uri() . '/imagenes/' . $fac['img']; ?>" alt="<?php echo $fac['sigla']; ?>" width="35" height="35" class="object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                        <span class="hidden font-bold text-[0.7rem]" style="color: <?php echo $fac['hex']; ?>;"><?php echo substr($fac['sigla'], 0, 2); ?></span>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[0.68rem] font-medium tracking-[0.18em] uppercase mb-1" style="color: <?php echo $fac['hex']; ?>;"><?php echo $fac['sigla']; ?></p>
                        <p class="font-medium text-[0.88rem] text-[#2A3E8A] leading-[1.35] mb-[0.4rem]"><?php echo $fac['nombre']; ?></p>
                        <p class="text-[0.75rem] text-[#6B7280] flex items-center gap-[0.3rem]">
                            <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                            </svg>
                            <?php echo $fac['sede']; ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

            <a href="<?php echo home_url('/carreras/?facultad=IPAU'); ?>" class="reveal reveal-d3 md:col-span-2 lg:col-span-1 group flex items-center gap-[1.2rem] bg-white p-6 border-l-[3px] border-[#972f70] transition-all hover:translate-x-1 hover:shadow-[0_4px_20px_rgba(8,24,58,0.08)]">
                <div class="w-[44px] h-[44px] flex items-center justify-center shrink-0 bg-[#C8922A26]">
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/ipau.png" alt="IPAU" width="28" height="28" class="object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='block'">
                    <span class="hidden font-bold text-[0.7rem] text-[#2a3e8a]">IP</span>
                </div>
                <div>
                    <p class="text-[0.68rem] font-medium tracking-[0.18em] uppercase text-[#972f70] mb-1">IPAU</p>
                    <p class="font-medium text-[0.88rem] text-[#2A3E8A] leading-[1.35] mb-[0.4rem]">Instituto Politécnico y Artístico Universitario</p>
                    <p class="text-[0.75rem] text-[#972f70] flex items-center gap-[0.3rem]">
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

<?php get_footer(); ?>