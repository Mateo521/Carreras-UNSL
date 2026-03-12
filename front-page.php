<?php

/**
 * Plantilla principal (Front Page)
 * Diseño Institucional Limpio y Elegante
 */
get_header();
?>

<section class="relative h-[calc(100vh+73px)] min-h-[600px] w-full overflow-hidden bg-[#0b1f4a]"> <!--  -->
    <video class="absolute inset-0 w-full h-full object-cover z-0" autoplay muted loop playsinline src="<?php echo get_template_directory_uri(); ?>/videos/video-2.mp4"></video>
    <div class="absolute inset-0 bg-[#0b1f4a]/70 z-0 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#0b1f4a] via-[#0b1f4a]/70 to-transparent w-full  z-0"></div>

    <div class="relative z-10 h-full w-full max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 flex flex-col justify-center text-center items-center pb-20">
        <div class="w-full max-w-4xl">
            <h1 class="text-white text-5xl sm:text-6xl lg:text-7xl font-bold leading-tight mb-6 tracking-tight drop-shadow-lg">
                Oferta
                <em class="text-[#88CAFC]">Académica 2026</em>
            </h1>

            <p class="text-slate-200 text-lg sm:text-xl mb-10 font-light leading-relaxed drop-shadow-md">
                Explorá tu futuro en la Universidad Nacional de San Luis. Encontrá la carrera ideal para tu vocación profesional.
            </p>

            <form action="<?php echo home_url('/carreras/'); ?>" method="GET" class="relative shadow-2xl shadow-black/30 group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-slate-400 group-focus-within:text-[#88CAFC] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-4.35-4.35"></path>
                    </svg>
                </div>
                <input type="search" name="q" placeholder="¿Qué te gustaría estudiar? Ej: Enfermería..." class="block w-full pl-14 pr-32 py-5 bg-white/95 backdrop-blur-sm text-slate-900 placeholder:text-slate-500 border border-white/20 focus:ring-4 focus:ring-[#88CAFC]/50 text-lg transition-all">

                <button type="submit" class="absolute inset-y-2 right-2 px-6 bg-[#0b1f4a] text-white font-medium hover:bg-blue-900 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0b1f4a]">
                    Buscar
                </button>
            </form>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-20 pointer-events-none"> <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-[80px] md:h-[150px]">
            <path d="M0,120 C300,0 900,0 1200,120 L1200,120 L0,120 Z" fill="#ffffff"></path>
        </svg>
    </div>
</section>

<section class="pb-24 pt-12 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-[#0b1f4a]  mb-4">Descubrí tu camino</h2> <!-- font-['Libre_Baskerville',serif] -->
            <p class="text-slate-500 text-lg max-w-2xl mx-auto">Seleccioná el nivel académico de tu interés para explorar las opciones que la UNSL tiene preparadas para vos.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <a href="<?php echo home_url('/carreras/?tipo=pregrado'); ?>" class="group flex flex-col items-center text-center p-10 rounded-2xl bg-[#0b1f4a] border border-[#0b1f4a] hover:shadow-2xl hover:shadow-[#0b1f4a33] transition-all duration-300 transform relative overflow-hidden"> <!-- hover:-translate-y-2  -->
                <!--div class="w-20 h-20 rounded-full bg-[#e8f4f0] text-[#1a6b52] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>
                </div-->
                <div class="absolute left-0 bottom-0 w-32 h-32 bg-[#88CAFC] rounded-full opacity-10"></div>
                <h3 class="text-2xl font-bold text-white mb-3 relative z-10">Pregrado</h3>
                <p class="text-slate-300 text-sm leading-relaxed mb-6 relative z-10">Carreras cortas y tecnicaturas...</p>
                <span class="text-[#88CAFC] font-semibold text-sm group-hover:text-white flex items-center gap-2 mt-auto relative z-10">
                    Ver carreras <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </a>

            <a href="<?php echo home_url('/carreras/?tipo=grado'); ?>" class="group flex flex-col items-center text-center p-10 rounded-2xl bg-[#0b1f4a] border border-[#0b1f4a] hover:shadow-2xl hover:shadow-[#0b1f4a33] transition-all duration-300 transform relative overflow-hidden"> <!-- hover:-translate-y-2  -->
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-[#88CAFC] rounded-full opacity-10"></div>
                <!--div class="w-20 h-20 rounded-full bg-white/10 text-[#88CAFC] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform relative z-10">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" /></svg>
                </div-->
                <h3 class="text-2xl font-bold text-white mb-3 relative z-10">Grado</h3>
                <p class="text-slate-300 text-sm leading-relaxed mb-6 relative z-10">Licenciaturas, ingenierías y profesorados...</p>
                <span class="text-[#88CAFC] font-semibold text-sm group-hover:text-white flex items-center gap-2 mt-auto relative z-10">
                    Ver carreras <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </a>

            <a href="<?php echo home_url('/carreras/?tipo=posgrado'); ?>" class="group flex flex-col items-center text-center p-10 rounded-2xl bg-[#0b1f4a] border border-[#0b1f4a] hover:shadow-2xl hover:shadow-[#0b1f4a33] transition-all duration-300 transform relative overflow-hidden"> <!-- hover:-translate-y-2  -->
                <!--div class="w-20 h-20 rounded-full bg-[#fff7ed] text-[#92400e] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>
                </div-->
                <div class="absolute -right-10 bottom-0 w-32 h-32 bg-[#88CAFC] rounded-full opacity-10"></div>

                <h3 class="text-2xl font-bold text-white mb-3 relative z-10">Posgrado</h3>
                <p class="text-slate-300 text-sm leading-relaxed mb-6 relative z-10">Especializaciones, maestrías y doctorados...</p>
                <span class="text-[#88CAFC] font-semibold text-sm group-hover:text-white flex items-center gap-2 mt-auto relative z-10">
                    Ver carreras <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </span>
            </a>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo home_url('/carreras/'); ?>" class="inline-flex items-center gap-2 text-[#0b1f4a] font-semibold hover:text-[#88CAFC] transition-colors underline underline-offset-4">
                Ver todas las carreras (A-Z)
            </a>
        </div>
    </div>
</section>


<!--section class="spikes"></section>
<style>
    .spikes {
        position: relative;
        background: #ffffff;
        height: 0px;
    }

    .spikes::after {
        content: '';
        position: absolute;
        right: 0;
        left: -0%;
        top: 100%;
        z-index: 10;
        display: block;
        height: 50px;
        background-size: 50px 100%;
        background-image: linear-gradient(135deg, #ffffff 25%, transparent 25%), linear-gradient(225deg, #ffffff 25%, transparent 25%);
        background-position: 0 0;
    }
</style-->
<section class="bg-[#0b1f4a] relative overflow-hidden pt-16">
    <div class="max-w-7xl mx-auto">
        <div class="relative grid grid-cols-1 items-center lg:grid-cols-2">

            <div class="py-12 px-8 flex flex-col justify-center z-10">
                <h2 class="text-white text-2xl lg:text-4xl font-bold mb-6">
                    ¿No sabés qué estudiar?
                </h2>

                <p class="text-[#ffffffbb] text-lg leading-relaxed mb-8 max-w-md">
                    Si todavía no te decidiste, te ayudamos a encontrar tu perfil. El Servicio de <strong class="text-white font-semibold">Orientación Vocacional Ocupacional (OVO)</strong> es gratuito, permanente y abierto, dependiente de la Secretaría Académica.
                </p>

                <a href="https://secretariaacademica.unsl.edu.ar/categoria/ovo" target="_blank" class="group inline-flex items-center justify-center gap-3 bg-[#88CAFC] hover:bg-white text-[#0b1f4a] font-bold text-sm px-8 py-4 rounded-xl transition-all duration-300 w-fit">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    Ingresá al programa OVO
                    <svg class="w-4 h-4 shrink-0 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>

                <div class="mt-10 pt-6 border-t border-white/10 flex flex-wrap items-center gap-6">
                    <p class="text-[#ffffff77] text-sm w-full sm:w-auto font-medium">Contacto:</p>

                    <a href="mailto:ovounsl@gmail.com" class="flex items-center gap-2.5 text-white hover:text-[#88CAFC] text-sm transition-colors group">
                        <div class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#88CAFC]/20 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        ovounsl@gmail.com
                    </a>

                    <a href="https://www.facebook.com/people/Orientaci%C3%B3n-Vocacional-Unsl/100054513097602/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2.5 text-white hover:text-[#1877f2] text-sm transition-colors group">
                        <div class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#1877f2]/20 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </div>
                        Facebook
                    </a>

                    <a href="https://www.instagram.com/programa_ovo_unsl//" target="_blank" class="flex items-center gap-2.5 text-white hover:text-[#1877f2] text-sm transition-colors group">
                        <div class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center group-hover:bg-[#1877f2]/20 transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm4.846-10.405c0 .795.645 1.44 1.44 1.44s1.44-.645 1.44-1.44-.645-1.44-1.44-1.44-1.44.645-1.44 1.44z" />
                            </svg>
                        </div>
                        Instagram
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex justify-end pr-12 relative">
                <div class="w-[400px] h-[400px] rounded-full border border-white/10 absolute top-1/2 -translate-y-1/2 right-10"></div>
                <div class="w-[300px] h-[300px] rounded-full border border-[#88CAFC]/20 absolute top-1/2 -translate-y-1/2 right-24"></div>
                <!--img src="<?php echo get_template_directory_uri(); ?>/imagenes/ovo.jpeg" alt="Estudiantes UNSL" class="relative z-10 w-full max-w-md object-cover rounded-2xl shadow-2xl hover:rotate-3 rotate-0 transition-transform duration-500" onerror="this.style.display='none'"-->
            </div>

        </div>
    </div>
</section>


<section class="curved"></section>
<style>
    .curved {
        position: relative;
        background: #0b1f4a;
        height: 100px;
        border-bottom-left-radius: 50% 28%;
        border-bottom-right-radius: 50% 28%;
    }
</style>


<section class="px-6 py-24 bg-[#EEF1F5]">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <!--p class="text-[#88CAFC] text-xs font-bold uppercase tracking-widest mb-3">Estructura académica</p-->
            <h2 class=" text-[#0b1f4a] text-3xl md:text-4xl font-bold">Unidades Académicas</h2> <!-- font-['Libre_Baskerville',serif] -->
            <p class="text-gray-700 text-base mt-4 max-w-2xl mx-auto leading-relaxed">
                La Universidad Nacional de San Luis está organizada en nueve unidades académicas distribuidas en sus tres sedes.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php
            $facultades = [
                ['sigla' => 'FQBYF', 'nombre' => 'Facultad de Química, Bioquímica y Farmacia', 'sede' => 'San Luis', 'color_bg' => 'bg-[#ecfdf5]', 'color_txt' => 'text-[#065f46]', 'img' => 'fqbyf.png'],
                ['sigla' => 'FCFMYN', 'nombre' => 'Facultad de Ciencias Físico Matemáticas y Naturales', 'sede' => 'San Luis', 'color_bg' => 'bg-[#eff6ff]', 'color_txt' => 'text-[#1e40af]', 'img' => 'fcfmyn.png'],
                ['sigla' => 'FICA', 'nombre' => 'Facultad de Ingeniería y Ciencias Agropecuarias', 'sede' => 'Villa Mercedes', 'color_bg' => 'bg-[#fff7ed]', 'color_txt' => 'text-[#92400e]', 'img' => 'fica.png'],
                ['sigla' => 'FCEJS', 'nombre' => 'Facultad de Ciencias Económicas, Jurídicas y Sociales', 'sede' => 'Villa Mercedes', 'color_bg' => 'bg-[#eef2ff]', 'color_txt' => 'text-[#3730a3]', 'img' => 'fcejs.png'],
                ['sigla' => 'FCH', 'nombre' => 'Facultad de Ciencias Humanas', 'sede' => 'San Luis', 'color_bg' => 'bg-[#fdf4ff]', 'color_txt' => 'text-[#6b21a8]', 'img' => 'fch.png'],
                ['sigla' => 'FAPSI', 'nombre' => 'Facultad de Psicología', 'sede' => 'San Luis', 'color_bg' => 'bg-[#fff1f2]', 'color_txt' => 'text-[#9f1239]', 'img' => 'fapsi.png'],
                ['sigla' => 'FCS', 'nombre' => 'Facultad de Ciencias de la Salud', 'sede' => 'San Luis · Villa Mercedes', 'color_bg' => 'bg-[#f0fdfa]', 'color_txt' => 'text-[#0f766e]', 'img' => 'fcs.png'],
                ['sigla' => 'FTU', 'nombre' => 'Facultad de Turismo y Urbanismo', 'sede' => 'Merlo', 'color_bg' => 'bg-[#f0fdf4]', 'color_txt' => 'text-[#166534]', 'img' => 'ftu.png'],
            ];

            foreach ($facultades as $fac) : ?>
                <a href="<?php echo home_url('/carreras/?facultad=' . urlencode($fac['sigla'])); ?>" class="group bg-white rounded-xl border border-[#e5e0d8] hover:border-[#88CAFC] hover:shadow-lg hover:shadow-[#0b1f4a08] transition-all duration-300 p-6 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-xl <?php echo $fac['color_bg']; ?> flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <img src="<?php echo get_template_directory_uri() . '/imagenes/' . $fac['img']; ?>" alt="<?php echo $fac['sigla']; ?>" class="w-11 h-11 object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                        <span class="hidden w-11 h-11 items-center justify-center font-['Libre_Baskerville',serif] font-bold text-sm <?php echo $fac['color_txt']; ?> leading-tight text-center"><?php echo substr($fac['sigla'], 0, 2); ?></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="<?php echo $fac['color_txt']; ?> text-[10px] font-black tracking-[0.2em] uppercase mb-1"><?php echo $fac['sigla']; ?></p>
                        <h3 class="text-[#1a1a2e] font-bold text-sm leading-snug group-hover:text-[#0b1f4a] transition-colors"><?php echo $fac['nombre']; ?></h3>
                        <p class="text-[#1a1a2e55] text-xs mt-2 flex items-center gap-1.5 font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                            </svg>
                            <?php echo $fac['sede']; ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

            <a href="<?php echo home_url('/carreras/?facultad=IPAU'); ?>" class="group col-span-1 sm:col-span-2 lg:col-span-1 bg-[#0b1f4a] rounded-xl border border-[#0b1f4a] hover:border-[#88CAFC] hover:shadow-xl transition-all duration-300 p-6 flex items-center gap-5">
                <div class="w-16 h-16 rounded-xl bg-white/10 flex items-center justify-center shrink-0 group-hover:bg-[#88CAFC20] transition-colors group-hover:scale-105 duration-300">
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/ipau.png" alt="IPAU" class="w-11 h-11 object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                    <span class="hidden w-11 h-11 items-center justify-center font-['Libre_Baskerville',serif] font-bold text-sm text-[#88CAFC] leading-tight text-center">IP</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-[#88CAFC] text-[10px] font-black tracking-[0.2em] uppercase mb-1">IPAU</p>
                    <h3 class="text-white font-bold text-sm leading-snug">Instituto Politécnico y Artístico Universitario</h3>
                    <p class="text-white/50 text-xs mt-2 flex items-center gap-1.5 font-medium">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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