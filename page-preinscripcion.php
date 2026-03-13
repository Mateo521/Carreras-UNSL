<?php

/**
 * Plantilla Preinscripción
 * Diseño Institucional Limpio y Elegante
 */
get_header();
?>




<!-- BREADCRUMB -->
<div class="bg-white border-b border-[#D8DEE5]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="/" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e]">Preinscripción</span>
    </div>
</div>

<!-- HERO -->
<section class="bg-[#0b1f4a] px-6 relative overflow-hidden">
    <img src="/static/inscripciones.jpg" alt="" class="absolute inset-0 w-full h-full object-cover opacity-20" />
    <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f4a] via-[#0b1f4acc] to-[#0b1f4a55]"></div>

    <div class="relative max-w-7xl mx-auto py-20 lg:py-28">
        <!--p class="text-[#88CAFC] text-xs font-bold  uppercase mb-4 flex items-center gap-3"> 
        
            Ingreso 2026
        </p-->
        <h1 class=" text-white text-4xl lg:text-5xl font-bold leading-tight mb-4"> <!-- font-['Libre_Baskerville',serif] -->
            Preinscripción
            <em class="text-[#88CAFC] not-italic">Online</em>
        </h1>
        <p class="text-[#ffffffaa] text-lg max-w-xl font-light">
            Comenzá tu camino en la UNSL. Completá tu preinscripción antes de la inscripción presencial.
        </p>

        <!-- Steps strip -->
        <div class="flex flex-wrap gap-4 mt-10">
            <div class="flex items-center gap-3 bg-[#ffffff0d] border border-[#ffffff12] rounded px-4 py-3">
                <span
                    class="w-7 h-7 rounded-full bg-[#88CAFC] text-[#0b1f4a] text-xs font-black flex items-center justify-center shrink-0">1</span>
                <span class="text-white text-sm font-medium">Completá la preinscripción online</span>
            </div>
            <div class="flex items-center gap-2 text-[#ffffff44] self-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </div>
            <div class="flex items-center gap-3 bg-[#ffffff0d] border border-[#ffffff12] rounded px-4 py-3">
                <span
                    class="w-7 h-7 rounded-full bg-[#ffffff22] text-white text-xs font-black flex items-center justify-center shrink-0">2</span>
                <span class="text-white text-sm font-medium">Reuní la documentación</span>
            </div>
            <div class="flex items-center gap-2 text-[#ffffff44] self-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </div>
            <div class="flex items-center gap-3 bg-[#ffffff0d] border border-[#ffffff12] rounded px-4 py-3">
                <span
                    class="w-7 h-7 rounded-full bg-[#ffffff22] text-white text-xs font-black flex items-center justify-center shrink-0">3</span>
                <span class="text-white text-sm font-medium">Presentate a inscripción presencial</span>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- ─── INGRESO POR PRIMERA VEZ ─── -->
        <div class="flex flex-col gap-6">
            <div class="bg-white rounded border border-[#D8DEE5] overflow-hidden">

                <!-- Header -->
                <div class="bg-[#0b1f4a] px-7 py-6 relative overflow-hidden">
                    <!--div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-[#88CAFC] opacity-10 pointer-events-none">
                    </div-->
                    <div class="flex items-start gap-4 relative">
                        <!--div
                            class="w-11 h-11 rounded bg-[#88CAFC18] border border-[#88CAFC30] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                        </div-->
                        <div>
                            <p class="text-[#88CAFC] text-[10px] font-black uppercase  mb-1">Primera vez en la UNSL <!-- tracking-[0.2em] -->
                            </p>
                            <h2 class=" text-white text-xl font-bold leading-tight">Ingreso por <!-- font-['Libre_Baskerville',serif] --> primera vez</h2>
                            <p class="text-[#ffffff66] text-sm mt-1">Completá el formulario de preinscripción de tu facultad</p>
                        </div>
                    </div>
                </div>




                <div class="px-7 py-6">
                    <p class="text-[#1a1a2e88] text-sm leading-relaxed mb-5">
                        Seleccioná la facultad a la que pertenece tu carrera para realizar la preinscripción. En la ficha deberás
                        completar los datos requeridos y subir los requisitos solicitados. <strong class="text-[#1a1a2e]">Podés
                            realizarlo en etapas.</strong>
                    </p>

                    <p class="text-[#1a1a2e55] text-[10px] font-black uppercase tracking-widest mb-3">Seleccioná tu facultad</p>

                    <div class="flex flex-col gap-2">

                        <a href="http://preingreso.unsl.edu.ar/fqbyf/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#ecfdf5] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fqbyf.png" alt="FQBYF" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#065f46] font-black text-[9px] leading-tight text-center">FQ</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Química, Bioquímica y Farmacia</p>
                                <p class="text-[#10101F] text-[10px]">FQBYF · San Luis</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/fcfmyn/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#eff6ff] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fcfmyn.png" alt="FCFMYN" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#1e40af] font-black text-[9px] leading-tight text-center">FC</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Ciencias Físico Matemáticas y Naturales</p>
                                <p class="text-[#10101F] text-[10px]">FCFMYN · San Luis</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/fica/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#fff7ed] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fica.png" alt="FICA" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#92400e] font-black text-[9px] leading-tight text-center">FI</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Ingeniería y Ciencias Agropecuarias</p>
                                <p class="text-[#10101F] text-[10px]">FICA · Villa Mercedes</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/facejs/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#eef2ff] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fcejs.png" alt="FCEJS" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#3730a3] font-black text-[9px] leading-tight text-center">FC</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Ciencias Económicas, Jurídicas y Sociales</p>
                                <p class="text-[#10101F] text-[10px]">FCEJS · Villa Mercedes</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/fch/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#fdf4ff] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fch.png" alt="FCH" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#6b21a8] font-black text-[9px] leading-tight text-center">FC</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Ciencias Humanas</p>
                                <p class="text-[#10101F] text-[10px]">FCH · San Luis</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/psico/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#fff1f2] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fapsi.png" alt="FAPSI" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#9f1239] font-black text-[9px] leading-tight text-center">FA</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Psicología</p>
                                <p class="text-[#10101F] text-[10px]">FAPSI · San Luis</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/fcs/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#f0fdfa] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fcs.png" alt="FCS" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#0f766e] font-black text-[9px] leading-tight text-center">FC</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Ciencias de la Salud</p>
                                <p class="text-[#10101F] text-[10px]">FCS · San Luis · Villa Mercedes</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/ftu/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#D8DEE5] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#f0fdf4] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/ftu.png" alt="FTU" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#166534] font-black text-[9px] leading-tight text-center">FT</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Facultad de Turismo y Urbanismo</p>
                                <p class="text-[#10101F] text-[10px]">FTU · Merlo</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                        <a href="http://preingreso.unsl.edu.ar/ipau/" target="_blank"
                            class="group flex items-center gap-3 p-3.5 rounded border border-[#0b1f4a22] bg-[#0b1f4a05] hover:border-[#88CAFC] hover:bg-[#f8fbff] transition-all duration-200">
                            <div class="w-9 h-9 rounded-lg  flex items-center justify-center shrink-0  transition-transform"> <!-- bg-[#0b1f4a0d] -->
                                <img src="<?php echo get_template_directory_uri(); ?>/imagenes/ipau.png" alt="IPAU" class="w-12 h-12 object-contain"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                                <span class="hidden text-[#0b1f4a] font-black text-[9px] leading-tight text-center">IP</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-[#1a1a2e] text-sm font-semibold leading-snug group-hover:text-[#0b1f4a]">
                                    Instituto Politécnico y Artístico Universitario</p>
                                <p class="text-[#10101F] text-[10px]">IPAU · San Luis</p>
                            </div>
                            <svg class="w-4 h-4 text-[#1a1a2e22] group-hover:text-[#88CAFC] shrink-0 transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>

                    </div>
                </div>




            </div>
        </div>

        <!-- ─── COLUMNA DERECHA ─── -->
        <div class="flex flex-col gap-6">


            <div class="bg-white rounded border border-[#D8DEE5] overflow-hidden">
                <div class="bg-[#1a6b52] px-7 py-6 relative overflow-hidden">
                    <!--div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-white opacity-10 pointer-events-none"></div-->
                    <div class="flex items-start gap-4 relative">
                        <!--div
                            class="w-11 h-11 rounded bg-[#ffffff15] border border-[#ffffff20] flex items-center justify-center shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                        </div-->
                        <div>
                            <p class="text-[#a7f3d0] text-[10px] font-black uppercase tracking-[0.2em] mb-1">Ya tengo usuario UNSL</p>
                            <h2 class=" text-white text-xl font-bold leading-tight">Ya soy alumno de la UNSL</h2> <!-- font-['Libre_Baskerville',serif] -->
                            <p class="text-[#ffffff77] text-sm mt-1">Preinscribite por SIU Guaraní</p>
                        </div>
                    </div>
                </div>

                <div class="px-7 py-6">
                    <p class="text-[#1a1a2e88] text-sm leading-relaxed mb-5">
                        Ingresá al <strong class="text-[#1a1a2e]">SIU Guaraní</strong> con tu usuario y contraseña. Elegí la opción
                        <em>Trámites → Preinscripción a Propuestas</em>, seleccioná la propuesta y subí los requisitos solicitados.
                    </p>

                    <a href="http://g3.unsl.edu.ar/g3/" target="_blank"
                        class="group flex items-center gap-3 w-full p-4 rounded border-2 border-[#1a6b52] hover:bg-[#1a6b52] transition-all duration-200">
                        <!--div
                            class="w-10 h-10 rounded-lg bg-[#ecfdf5] group-hover:bg-[#ffffff15] flex items-center justify-center shrink-0 transition-colors">
                            <svg class="w-5 h-5 text-[#1a6b52] group-hover:text-white transition-colors" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3" />
                            </svg>
                        </div-->
                        <div class="flex-1">
                            <p class="text-[#1a6b52] group-hover:text-white font-bold text-sm transition-colors">Acceder a SIU Guaraní
                            </p>
                            <p class="text-[#1a6b5288] group-hover:text-[#ffffff77] text-xs transition-colors">g3.unsl.edu.ar/g3</p>
                        </div>
                        <!--svg class="w-4 h-4 text-[#1a6b52] group-hover:text-white shrink-0 transition-colors" fill="none"
                            stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg-->
                    </a>
                </div>
            </div>

            <!-- INSCRIPCION PRESENCIAL -->
            <div class="bg-white rounded border border-[#D8DEE5] overflow-hidden">
                <div class="border-b border-[#f0ece4] px-7 py-5 flex items-center gap-3">
                    <!--div class="w-8 h-8 rounded-lg bg-[#fff7ed] flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#92400e]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div-->
                    <h2 class=" text-[#0b1f4a] font-bold text-lg">Inscripción presencial</h2> <!-- font-['Libre_Baskerville',serif] -->
                </div>
                <div class="px-7 py-6">
                    <p class="text-[#1a1a2e88] text-sm leading-relaxed mb-5">
                        En el momento de la inscripción el postulante debe presentar la <strong class="text-[#1a1a2e]">ficha de
                            preinscripción impresa</strong> junto a toda la documentación respaldatoria, en las fechas que las
                        Unidades Académicas dispongan.
                    </p>

                    <!-- Steps -->
                    <div class="flex flex-col gap-3">
                        <div class="flex items-start gap-3 p-4 rounded bg-[#EEF1F5]">
                            <span
                                class="w-12 h-12 rounded-full bg-[#0b1f4a] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">1</span>
                            <p class="text-[#1a1a2e] text-sm leading-relaxed">Completá la preinscripción online y descargá la ficha
                                impresa.</p>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded bg-[#EEF1F5]">
                            <span
                                class="w-12 h-12 rounded-full bg-[#0b1f4a] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">2</span>
                            <p class="text-[#1a1a2e] text-sm leading-relaxed">Reuní la documentación requerida.</p>
                        </div>
                        <div class="flex items-start gap-3 p-4 rounded bg-[#EEF1F5]">
                            <span
                                class="w-12 h-12 rounded-full bg-[#0b1f4a] text-white text-[10px] font-black flex items-center justify-center shrink-0 mt-0.5">3</span>
                            <p class="text-[#1a1a2e] text-sm leading-relaxed">Presentate en tu facultad en las fechas establecidas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DOCUMENTACION -->
            <div class="bg-white rounded border border-[#D8DEE5] overflow-hidden">
                <div class="border-b border-[#f0ece4] px-7 py-5 flex items-center gap-3">
                    <!--div class="w-8 h-8 rounded-lg bg-[#eff6ff] flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-[#1e40af]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div-->
                    <h2 class=" text-[#0b1f4a] font-bold text-lg">Documentación requerida</h2> <!-- font-['Libre_Baskerville',serif] -->
                </div>
                <div class="px-7 py-6 flex flex-col gap-3">

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#1a6b52] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-[#1a1a2e88] text-sm leading-relaxed">
                            <strong class="text-[#1a1a2e]">Certificado analítico</strong> que acredite la finalización del secundario
                            (legalizado). Si aún no fue emitido, presentar certificado de estudios en trámite.
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#1a6b52] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-[#1a1a2e88] text-sm leading-relaxed">
                            <strong class="text-[#1a1a2e]">Documento Nacional de Identidad (DNI)</strong> original.
                        </p>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#1a6b52] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p class="text-[#1a1a2e88] text-sm leading-relaxed">
                            <strong class="text-[#1a1a2e]">Certificado de salud</strong> emitido por entidad de Salud Pública visado
                            por el Centro de Salud Estudiantil, o emitido directamente por el Centro según sede.
                        </p>
                    </div>

                    <!-- Alerta centros de salud -->
                    <div class="mt-2 rounded border border-[#88CAFC44] bg-[#EFF7FF] p-4">
                        <p class="text-[#0b1f4a] text-xs font-bold uppercase tracking-widest mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            Centros de Salud Estudiantil
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="bg-white rounded-lg border border-[#D8DEE5] p-3">
                                <p class="text-[#0b1f4a] text-xs font-bold mb-1">CESEU — San Luis</p>
                                <p class="text-[#1a1a2e66] text-xs">Rivadavia 1359</p>
                                <a href="https://goo.gl/maps/wKGhLjFMxyokpvGK6" target="_blank"
                                    class="text-[#88CAFC] text-[10px] font-semibold hover:underline mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                                    </svg>
                                    Ver en mapa
                                </a>
                            </div>
                            <div class="bg-white rounded-lg border border-[#D8DEE5] p-3">
                                <p class="text-[#0b1f4a] text-xs font-bold mb-1">CUSE — Villa Mercedes</p>
                                <p class="text-[#1a1a2e66] text-xs">Junín 269</p>
                                <a href="https://goo.gl/maps/Wh9MHNajyQKvBFEDA" target="_blank"
                                    class="text-[#88CAFC] text-[10px] font-semibold hover:underline mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                                    </svg>
                                    Ver en mapa
                                </a>
                            </div>
                        </div>
                        <p class="text-[#1a1a2e55] text-[10px] mt-3 leading-relaxed">
                            Para la sede Villa de Merlo no se requiere visado del Centro de Salud Estudiantil.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<?php
get_footer();
?>