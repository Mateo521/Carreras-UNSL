<?php

/**
 * Template Name: Nuestras Sedes
 * Description: Plantilla para mostrar la información detallada de las sedes de la UNSL.
 */
get_header();
?>

<div class="bg-white border-b border-[#e5e0d8]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e]">Nuestras Sedes</span>
    </div>
</div>

<header class="bg-[#0b1f4a] py-16 lg:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f4a] to-[#1e3a8a] opacity-90"></div>
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent bg-[length:20px_20px]"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-center z-10">
        <!--span class="inline-block py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md text-[#88CAFC] text-xs font-bold tracking-widest uppercase mb-4 border border-white/20">
            Presencia Regional
        </span-->
        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold  mb-6"> <!-- font-['Libre_Baskerville',serif] -->
            Nuestras Sedes
        </h1>
        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
            La Universidad Nacional de San Luis cuenta con un fuerte anclaje territorial. Nuestras tres sedes provinciales están estratégicamente ubicadas para potenciar el desarrollo académico, científico y productivo de la región.
        </p>
    </div>
</header>

<main class="bg-[#EEF1F5] py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-24">

        <article class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-center">
            <div class="w-full lg:w-1/2">
                <div class="relative rounded overflow-hidden shadow-2xl shadow-[#0b1f4a22] group">
                    <div class="absolute inset-0 bg-[#0b1f4a]/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/sede-sanluis.jpg" alt="Sede San Luis" class="w-full h-[400px] object-cover transform  transition-transform duration-700" onerror="this.src='https://placehold.co/800x600/0b1f4a/ffffff?text=Sede+San+Luis'"> <!--  -->
                    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-[#0b1f4a] to-transparent z-20">
                        <p class="text-white font-semibold text-lg drop-shadow-md">Ciudad de San Luis</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-3">
                    <!--div class="w-10 h-10 rounded-full bg-[#0b1f4a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" /></svg>
                    </div-->
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#0b1f4a] ">Sede San Luis</h2> <!-- font-['Libre_Baskerville',serif] -->
                </div>

                <h3 class="text-lg font-semibold text-[#1a1a2e] mb-4 mt-2">Centro administrativo, científico y cultural</h3>

                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Situada en la capital provincial, es la sede central y fundacional de la institución. Estudiar aquí significa sumergirse en una vibrante vida universitaria, con acceso a laboratorios de primer nivel, bibliotecas centrales, residencias estudiantiles, el comedor universitario y un gran complejo deportivo.
                </p>

                <div class="bg-white border border-[#e5e0d8] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades en esta sede</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#065f46]"></span> Química, Bioquímica y Farmacia</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#1e40af]"></span> Ciencias Físico Matemáticas</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#6b21a8]"></span> Ciencias Humanas</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#9f1239]"></span> Psicología</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#0f766e]"></span> Ciencias de la Salud</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#88CAFC]"></span> IPAU</li>
                    </ul>
                </div>

                <a href="<?php echo home_url('/carreras/?sede=San Luis'); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]">
                    Explorar carreras en San Luis
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </article>

        <article class="flex flex-col lg:flex-row-reverse gap-10 lg:gap-16 items-center">
            <div class="w-full lg:w-1/2">
                <div class="relative rounded overflow-hidden shadow-2xl shadow-[#0b1f4a22] group">
                    <div class="absolute inset-0 bg-[#0b1f4a]/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/sede-mercedes.jpg" alt="Sede Villa Mercedes" class="w-full h-[400px] object-cover transform  transition-transform duration-700" onerror="this.src='https://placehold.co/800x600/0b1f4a/ffffff?text=Sede+Villa+Mercedes'">
                    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-[#0b1f4a] to-transparent z-20">
                        <p class="text-white font-semibold text-lg drop-shadow-md">Ciudad de Villa Mercedes</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-3">
                    <!--div class="w-10 h-10 rounded-full bg-[#0b1f4a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" /></svg>
                    </div-->
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#0b1f4a] ">Sede Villa Mercedes</h2> <!-- font-['Libre_Baskerville',serif] -->
                </div>

                <h3 class="text-lg font-semibold text-[#1a1a2e] mb-4 mt-2">Vínculo industrial y socioproductivo</h3>

                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Ubicada en el corazón industrial, económico y agropecuario de la provincia. La sede de Villa Mercedes se caracteriza por su estrecha relación con el sector productivo local, ofreciendo prácticas profesionales en entornos reales de alta exigencia, dotando a sus egresados de un perfil altamente competitivo.
                </p>

                <div class="bg-white border border-[#e5e0d8] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#92400e]"></span> Ingeniería y Cs. Agropecuarias</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#3730a3]"></span> Cs. Económicas, Jurídicas y Sociales</li>
                    </ul>
                </div>

                <a href="<?php echo home_url('/carreras/?sede=Villa Mercedes'); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]">
                    Explorar carreras en Villa Mercedes
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </article>

        <article class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-center">
            <div class="w-full lg:w-1/2">
                <div class="relative rounded overflow-hidden shadow-2xl shadow-[#0b1f4a22] group">
                    <div class="absolute inset-0 bg-[#0b1f4a]/20 group-hover:bg-transparent transition-colors duration-500 z-10"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/sede-merlo.jpg" alt="Sede Villa de Merlo" class="w-full h-[400px] object-cover transform  transition-transform duration-700" onerror="this.src='https://placehold.co/800x600/0b1f4a/ffffff?text=Sede+Villa+de+Merlo'">
                    <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-[#0b1f4a] to-transparent z-20">
                        <p class="text-white font-semibold text-lg drop-shadow-md">Villa de Merlo</p>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-3">
                    <!--div class="w-10 h-10 rounded-full bg-[#0b1f4a] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" /></svg>
                    </div-->
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#0b1f4a] ">Sede Villa de Merlo</h2> <!-- font-['Libre_Baskerville',serif] -->
                </div>

                <h3 class="text-lg font-semibold text-[#1a1a2e] mb-4 mt-2">Sinergia entre educación y turismo</h3>

                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Establecida en el principal polo turístico de la provincia y poseedora de un microclima reconocido a nivel mundial. La sede ofrece un entorno natural privilegiado para el aprendizaje, con un enfoque académico centrado en el desarrollo turístico sustentable, el urbanismo y la preservación del ecosistema regional.
                </p>

                <div class="bg-white border border-[#e5e0d8] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades</p>
                    <ul class="grid grid-cols-1 gap-2 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#166534]"></span> Facultad de Turismo y Urbanismo (FTU)</li>
                    </ul>
                </div>

                <a href="<?php echo home_url('/carreras/?sede=Merlo'); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]">
                    Explorar carreras en Merlo
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        </article>

    </div>
</main>

<?php get_footer(); ?>