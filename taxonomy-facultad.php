<?php

/**
 * Plantilla para mostrar la información y carreras de una Facultad específica
 * URL típica: /facultad/fqbyf/
 */

get_header();

$term = get_queried_object();
$sigla = strtoupper($term->name);
$slug = strtolower($term->slug);

$nombres_facultades = array(
    'fqbyf'  => 'Facultad de Química, Bioquímica y Farmacia',
    'fcfmyn' => 'Facultad de Ciencias Físico Matemáticas y Naturales',
    'fica'   => 'Facultad de Ingeniería y Ciencias Agropecuarias',
    'fcejs'  => 'Facultad de Ciencias Económicas, Jurídicas y Sociales',
    'fch'    => 'Facultad de Ciencias Humanas',
    'fapsi'  => 'Facultad de Psicología',
    'fcs'    => 'Facultad de Ciencias de la Salud',
    'ftu'    => 'Facultad de Turismo y Urbanismo',
    'ipau'   => 'Instituto Politécnico y Artístico Universitario'
);

$descripciones = array(
    'fqbyf'  => 'Pionera en investigación científica, enfocada en la salud, el medio ambiente y la innovación tecnológica en procesos químicos y bioquímicos.',
    'fcfmyn' => 'Centro de excelencia en ciencias exactas y tecnología, formando profesionales líderes en informática, física, matemáticas y geología.',
    'fica'   => 'Impulsando el desarrollo agroindustrial de la región mediante la formación de ingenieros y técnicos altamente capacitados para los desafíos productivos actuales.',
    'fcejs'  => 'Formando líderes con visión estratégica, ética y compromiso social en los campos de la economía, el derecho y la administración pública y privada.',
    'fch'    => 'Dedicada a la comprensión del ser humano, la educación y la sociedad, formando profesionales críticos y comprometidos con el desarrollo cultural.',
    'fapsi'  => 'Referente regional en el estudio del comportamiento humano, promoviendo la salud mental y el bienestar integral de la comunidad.',
    'fcs'    => 'Comprometida con la formación de profesionales de la salud con profunda vocación de servicio, excelencia clínica y enfoque preventivo.',
    'ftu'    => 'Aprovechando el entorno privilegiado de la región para formar expertos en gestión turística sostenible y desarrollo urbano planificado.',
    'ipau'   => 'Espacio de innovación que entrelaza la técnica, el arte y los oficios, brindando formaciones ágiles y con rápida salida laboral.'
);

$colores_facultades = array(
    'fqbyf'  => array('bg' => 'bg-[#ecfdf5]', 'text' => 'text-[#065f46]'),
    'fcfmyn' => array('bg' => 'bg-[#eff6ff]', 'text' => 'text-[#1e40af]'),
    'fica'   => array('bg' => 'bg-[#fff7ed]', 'text' => 'text-[#92400e]'),
    'fcejs'  => array('bg' => 'bg-[#eef2ff]', 'text' => 'text-[#3730a3]'),
    'fch'    => array('bg' => 'bg-[#fdf4ff]', 'text' => 'text-[#6b21a8]'),
    'fapsi'  => array('bg' => 'bg-[#fff1f2]', 'text' => 'text-[#9f1239]'),
    'fcs'    => array('bg' => 'bg-[#f0fdfa]', 'text' => 'text-[#0f766e]'),
    'ftu'    => array('bg' => 'bg-[#f0fdf4]', 'text' => 'text-[#166534]'),
    'ipau'   => array('bg' => 'bg-[#f0f4f8]', 'text' => 'text-[#0b1f4a]')
);

$nombre_completo = isset($nombres_facultades[$slug]) ? $nombres_facultades[$slug] : $sigla;
$descripcion_seo = isset($descripciones[$slug]) ? $descripciones[$slug] : 'Conoce nuestra oferta académica y fórmate para el futuro.';
$color_bg = isset($colores_facultades[$slug]) ? $colores_facultades[$slug]['bg'] : 'bg-white';
$color_text = isset($colores_facultades[$slug]) ? $colores_facultades[$slug]['text'] : 'text-[#0b1f4a]';
$logo_url = get_template_directory_uri() . '/imagenes/' . $slug . '.png';

?>

<div class="bg-white border-b border-[#e5e0d8]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <a href="<?php echo home_url("facultades"); ?>" class="hover:text-[#0b1f4a] transition-colors">
            <span class="text-[#1a1a2e]">Facultades</span>
        </a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e] font-semibold"><?php echo esc_html($sigla); ?></span>
    </div>
</div>

<header class="bg-[#0b1f4a] py-16 lg:py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent bg-[length:20px_20px]"></div>

    <div class="relative max-w-7xl mx-auto px-6 z-10 flex flex-col items-center text-center">

        <div class="w-24 h-24 md:w-32 md:h-32 rounded-2xl <?php echo esc_attr($color_bg); ?> flex items-center justify-center mb-8 shadow-2xl transform hover:scale-105 transition-transform duration-300">
            <img src="<?php echo esc_url($logo_url); ?>" alt="Logo <?php echo esc_attr($sigla); ?>" class="w-16 md:w-20 object-contain" onerror="this.src='<?php echo get_template_directory_uri(); ?>/logo-unsl-negativo2.svg'; this.classList.add('opacity-40', 'invert');">
        </div>

        <span class="inline-block py-1 px-3 rounded text-[10px] font-black uppercase tracking-widest mb-4 <?php echo esc_attr($color_bg); ?> <?php echo esc_attr($color_text); ?>">
            Unidad Académica
        </span>

        <h1 class="text-white text-3xl md:text-5xl font-bold font-['Libre_Baskerville',serif] mb-6 max-w-4xl leading-tight">
            <?php echo esc_html($nombre_completo); ?>
        </h1>

        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed font-light">
            <?php echo esc_html($descripcion_seo); ?>
        </p>

    </div>
</header>

<main class="bg-[#EEF1F5] py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between mb-8 pb-4 border-b border-[#e5e0d8]">
            <div>
                <h2 class="text-2xl font-bold text-[#0b1f4a] font-['Libre_Baskerville',serif]">Oferta Académica</h2>
                <p class="text-[#1a1a2e66] text-sm mt-1">Todas las carreras dictadas en la <?php echo esc_html($sigla); ?></p>
            </div>
            <a href="<?php echo home_url('/carreras/'); ?>" class="hidden sm:flex items-center gap-2 text-sm font-semibold text-[#88CAFC] hover:text-[#0b1f4a] transition-colors">
                Ver todo el catálogo general
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php

            $args = array(
                'post_type' => 'carrera',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'facultad',
                        'field'    => 'slug',
                        'terms'    => $slug,
                    ),
                ),
            );
            $query_facultad = new WP_Query($args);

            if ($query_facultad->have_posts()) :
                while ($query_facultad->have_posts()) : $query_facultad->the_post();


                    $terms_nivel = get_the_terms(get_the_ID(), 'nivel');
                    $tipo_slug = ($terms_nivel && !is_wp_error($terms_nivel)) ? strtolower($terms_nivel[0]->slug) : 'grado';

                    $terms_sede = get_the_terms(get_the_ID(), 'sede');
                    $sede_name = ($terms_sede && !is_wp_error($terms_sede)) ? $terms_sede[0]->name : 'San Luis';

                    $terms_modalidad = get_the_terms(get_the_ID(), 'modalidad');
                    $modalidad_name = ($terms_modalidad && !is_wp_error($terms_modalidad)) ? $terms_modalidad[0]->name : 'Presencial';

                    $duracion = get_field('duracion_carrera') ?: 'N/A';


                    $tc_bg = ($tipo_slug == 'pregrado') ? 'bg-[#e8f4f0]' : (($tipo_slug == 'posgrado') ? 'bg-[#fff7ed]' : 'bg-[#eef2ff]');
                    $tc_text = ($tipo_slug == 'pregrado') ? 'text-[#1a6b52]' : (($tipo_slug == 'posgrado') ? 'text-[#92400e]' : 'text-[#3730a3]');
                    $tc_dot = ($tipo_slug == 'pregrado') ? 'bg-[#1a6b52]' : (($tipo_slug == 'posgrado') ? 'bg-[#92400e]' : 'bg-[#3730a3]');
                    $tc_label = ucfirst($tipo_slug);
            ?>

                    <a href="<?php the_permalink(); ?>" class="group bg-white rounded-xl overflow-hidden border-x border-b border-[#e5e0d8] border-t-4 border-t-[<?php echo $colores_facultades[$slug]['text']; ?>] hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col cursor-pointer">
                        <div class="p-6 flex flex-col gap-4 flex-1">
                            <div class="flex items-start justify-between gap-2">
                                <span class="<?php echo esc_attr($tc_bg . ' ' . $tc_text); ?> text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded flex items-center gap-1.5 shrink-0">
                                    <span class="w-1.5 h-1.5 rounded <?php echo esc_attr($tc_dot); ?>"></span><?php echo esc_html($tc_label); ?>
                                </span>
                                <span class="flex items-center gap-1 text-[10px] font-bold text-[#1a6b52] bg-[#1a6b5214] rounded px-2 py-1 uppercase tracking-wide">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                                    </svg>
                                    <?php echo esc_html($modalidad_name); ?>
                                </span>
                            </div>
                            <div class="flex items-start gap-4 mt-2">
                                <h3 class="text-[#1a1a2e] text-base font-bold leading-snug group-hover:text-[#0b1f4a] transition-colors flex-1 mt-1">
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                            <div class="flex flex-col gap-2 mt-auto pt-4 border-t border-dashed border-[#e5e0d8]">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="text-[#1a1a2e66] font-medium">Sede</span>
                                    <span class="font-medium text-[#1a1a2e]"><?php echo esc_html($sede_name); ?></span>
                                </div>
                                <div class="flex items-center justify-between text-xs mt-1">
                                    <span class="text-[#1a1a2e66] font-medium">Duración</span>
                                    <span class="font-medium text-[#1a1a2e]"><?php echo esc_html($duracion); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="col-span-3 text-center text-slate-500 py-10">Aún no hay carreras cargadas para esta facultad.</p>';
            endif;
            ?>
        </div>

        <div class="mt-8 text-center sm:hidden">
            <a href="<?php echo home_url('/carreras/'); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-[#88CAFC] hover:text-[#0b1f4a] transition-colors">
                Ver todo el catálogo general
            </a>
        </div>

    </div>
</main>

<?php get_footer(); ?>