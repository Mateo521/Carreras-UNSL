<?php

/**
 * Template Name: Nuestras Sedes
 * Description: Plantilla para mostrar la información detallada de las sedes de la UNSL.
 */
get_header();
?>



<header class="bg-[#0b1f4a] py-16 lg:py-24 relative overflow-hidden">
    <div class="absolute inset-0 top-0 z-10 bg-gradient-to-b from-[#0b1f4a] to-[#1e3a8a] opacity-80"></div>
    <div class="absolute inset-0 opacity-10 z-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent bg-[length:20px_20px]"></div>
    <img class="absolute object-cover size-full top-0 z-0" src="<?php echo  get_template_directory_uri() . '/imagenes/carreras.jpg' ?>" alt="">
    <div class="relative max-w-7xl mx-auto px-6 text-center z-10">
        <!--span class="inline-block py-1.5 px-4  bg-white/10 backdrop-blur-md text-[#88CAFC] text-xs font-bold tracking-widest uppercase mb-4 border border-white/20"> 
            Estructura Institucional
        </span-->
        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold  mb-6"> <!-- font-['Libre_Baskerville',serif] -->
            Nuestras sedes
        </h1>
        <!--p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s 
        </p-->
    </div>
</header>

<div class="bg-white border-b border-[#ACCEF2]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e]">Nuestras Sedes</span>
    </div>
</div>

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

                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Ubicada en la capital provincial, un centro urbano dinámico al pie de las sierras, esta sede alberga el edificio del Rectorado de la UNSL. Es un espacio de intensa vida universitaria que integra disciplinas orientadas a las ciencias exactas, la tecnología, las humanidades, la psicología y la salud, promoviendo el avance del conocimiento en estrecho vínculo con el quehacer social, administrativo y cultural de la ciudad.
                </p>
                <div class="bg-white border border-[#ACCEF2] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades en esta sede</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#008D3B]"></span>Facultad de Química, Bioquímica y Farmacia</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#E42420]"></span>Facultad de Ciencias Físico Matemáticas y Naturales</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#ED6F03]"></span>Facultad de Ciencias Humanas</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#F4B318]"></span>Facultad de Psicología</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#A5C614]"></span>Facultad de Ciencias de la Salud</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 shrink-0 rounded-full bg-[#972F70]"></span>Instituto Politécnico y Artístico Universitario</li>
                    </ul>
                </div>

                <a href="<?php echo esc_url( add_query_arg( 'sede', 'san-luis', home_url( '/carreras/' ) ) ); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]"> Explorar carreras en San Luis
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



                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Inserta en la segunda ciudad más poblada de la provincia, reconocida por su marcado perfil agroindustrial y su rica identidad cultural. En este escenario productivo, la sede enfoca su propuesta académica en la ingeniería, las ciencias agropecuarias y el campo económico, jurídico y social, formando profesionales que interactúan de manera directa con las necesidades, las industrias y el desarrollo de la región.


                <div class="bg-white border border-[#ACCEF2] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-4 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#4B707F]"></span> Facultad de Ingeniería y Ciencias Agropecuarias</li>
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#502773]"></span> Facultad de Ciencias Económicas, Jurídicas y Sociales</li>
                    </ul>
                </div>

                <a href="<?php echo esc_url( add_query_arg( 'sede', 'villa-mercedes', home_url( '/carreras/' ) ) ); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]">
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


                <p class="text-[#1a1a2e88] leading-relaxed mb-6">
                    Emplazada en el principal destino turístico de la provincia, una localidad célebre por su microclima y su imponente entorno natural serrano. En este marco paisajístico único, la sede concentra su propuesta en el turismo, el urbanismo y el territorio, orientando la vida académica hacia la gestión sustentable, la planificación y la puesta en valor del medioambiente y la cultura local.


                <div class="bg-white border border-[#ACCEF2] rounded p-5 mb-8">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#1a1a2e55] mb-3">Facultades</p>
                    <ul class="grid grid-cols-1 gap-2 text-sm font-medium text-[#0b1f4a]">
                        <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#996A16]"></span> Facultad de Turismo y Urbanismo</li>
                    </ul>
                </div>

               <a href="<?php echo esc_url( add_query_arg( 'sede', 'merlo', home_url( '/carreras/' ) ) ); ?>" class="inline-flex items-center justify-center gap-2 bg-[#0b1f4a] hover:bg-[#88CAFC] text-white hover:text-[#0b1f4a] font-bold py-3.5 px-6 rounded-lg transition-all duration-300 w-fit group shadow-lg shadow-[#0b1f4a33]">
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