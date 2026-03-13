<?php
/**
 * Template Name: Nuestras Facultades
 * Description: Plantilla para mostrar la grilla de Facultades de la UNSL.
 */
get_header(); 
?>

<div class="bg-white border-b border-[#e5e0d8]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
        <span class="text-[#1a1a2e]">Facultades</span>
    </div>
</div>

<header class="bg-[#0b1f4a] py-16 lg:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f4a] to-[#1e3a8a] opacity-90"></div>
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent bg-[length:20px_20px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 text-center z-10">
        <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md text-[#88CAFC] text-xs font-bold tracking-widest uppercase mb-4 border border-white/20">
            Estructura Institucional
        </span>
        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold font-['Libre_Baskerville',serif] mb-6">
            Facultades
        </h1>
        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
            La Universidad Nacional de San Luis está organizada en ocho facultades y un instituto, distribuidos estratégicamente en nuestras tres sedes provinciales para garantizar el acceso a la educación superior.
        </p>
    </div>
</header>

<main class="px-6 py-24 bg-[#EEF1F5]">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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

            foreach ($facultades as $fac) : 
               
                $enlace_seo = home_url('/facultad/' . strtolower($fac['sigla']) . '/');
            ?>
                <a href="<?php echo esc_url($enlace_seo); ?>" class="group bg-white rounded-xl border border-[#e5e0d8] hover:border-[#88CAFC] hover:shadow-lg hover:shadow-[#0b1f4a08] transition-all duration-300 p-6 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-xl <?php echo esc_attr($fac['color_bg']); ?> flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-105">
                        <img src="<?php echo get_template_directory_uri() . '/imagenes/' . esc_attr($fac['img']); ?>" alt="<?php echo esc_attr($fac['sigla']); ?>" class="w-11 h-11 object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                        <span class="hidden w-11 h-11 items-center justify-center font-['Libre_Baskerville',serif] font-bold text-sm <?php echo esc_attr($fac['color_txt']); ?> leading-tight text-center"><?php echo substr($fac['sigla'], 0, 2); ?></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="<?php echo esc_attr($fac['color_txt']); ?> text-[10px] font-black tracking-[0.2em] uppercase mb-1"><?php echo esc_html($fac['sigla']); ?></p>
                        <h3 class="text-[#1a1a2e] font-bold text-sm leading-snug group-hover:text-[#0b1f4a] transition-colors"><?php echo esc_html($fac['nombre']); ?></h3>
                        <p class="text-[#1a1a2e55] text-xs mt-2 flex items-center gap-1.5 font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                            </svg>
                            <?php echo esc_html($fac['sede']); ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

            <a href="<?php echo home_url('/facultad/ipau/'); ?>" class="group col-span-1 sm:col-span-2 lg:col-span-1 bg-[#0b1f4a] rounded-xl border border-[#0b1f4a] hover:border-[#88CAFC] hover:shadow-xl transition-all duration-300 p-6 flex items-center gap-5">
                <div class="w-16 h-16 rounded-xl bg-white/10 flex items-center justify-center shrink-0 transition-colors duration-300 group-hover:bg-[#88CAFC20] group-hover:scale-105">
                    <img src="<?php echo get_template_directory_uri(); ?>/imagenes/ipau.png" alt="IPAU" class="w-11 h-11 object-contain" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
                    <span class="hidden w-11 h-11 items-center justify-center font-['Libre_Baskerville',serif] font-bold text-sm text-[#88CAFC] leading-tight text-center">IP</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-[#88CAFC] text-[10px] font-black tracking-[0.2em] uppercase mb-1">IPAU</p>
                    <h3 class="text-white font-bold text-sm leading-snug">Instituto Politécnico y Artístico Universitario</h3>
                    <p class="text-white/50 text-xs mt-2 flex items-center gap-1.5 font-medium">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                        </svg>
                        San Luis
                    </p>
                </div>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>