<?php
get_header();
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
while (have_posts()) : the_post();
    $terms_nivel = get_the_terms(get_the_ID(), 'nivel');
    $nivel_nombre = ($terms_nivel && !is_wp_error($terms_nivel)) ? $terms_nivel[0]->name : 'Grado';
    $terms_facultad = get_the_terms(get_the_ID(), 'facultad');
    $facultad_slug = ($terms_facultad && !is_wp_error($terms_facultad)) ? strtolower($terms_facultad[0]->slug) : '';
    $facultad_nombre_completo = isset($nombres_facultades[$facultad_slug]) ? $nombres_facultades[$facultad_slug] : (($terms_facultad && !is_wp_error($terms_facultad)) ? $terms_facultad[0]->name : 'UNSL');
    $terms_sede = get_the_terms(get_the_ID(), 'sede');
    $sede_nombre = ($terms_sede && !is_wp_error($terms_sede)) ? $terms_sede[0]->name : 'San Luis';
    $terms_modalidad = get_the_terms(get_the_ID(), 'modalidad');
    $modalidad_nombre = ($terms_modalidad && !is_wp_error($terms_modalidad)) ? $terms_modalidad[0]->name : 'Presencial';
    $titulo_otorgado = get_field('titulo_otorgado') ?: get_the_title();
    $duracion = get_field('duracion_carrera') ?: 'No especificada';
    $acreditada_coneau = get_field('acreditada_coneau');
    $enlace_plan = get_field('enlace_plan_estudios') ?: '#';
    $imagen_fondo = get_field('imagen_fondo_hero');
    $url_fondo = $imagen_fondo ? esc_url($imagen_fondo) : get_template_directory_uri() . '/imagenes/default-hero.jpg';
?>
    <div class="bg-white border-b border-[#e5e0d8]">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
            <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
            <a href="<?php echo home_url('/carreras/'); ?>" class="hover:text-[#0b1f4a] transition-colors">Carreras</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
            <span class="text-[#1a1a2e]"><?php the_title(); ?></span>
        </div>
    </div>
    <div class="relative bg-[#0b1f4a] overflow-hidden">
        <div class="absolute inset-0">
            <img src="<?php echo $url_fondo; ?>" alt="Fondo de <?php the_title(); ?>" class="w-full h-full object-cover opacity-100" />
            <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f4a] via-[#0b1f4acc] to-[#0b1f4a55]"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-6 py-16 lg:py-24">
            <div class="max-w-3xl">
                <div class="flex flex-wrap items-center gap-2 mb-6">
                    <span class="inline-flex items-center gap-1.5 bg-[#eef2ff] text-[#3730a3] text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#3730a3]"></span>
                        <?php echo esc_html($nivel_nombre); ?>
                    </span>
                    <?php if ($acreditada_coneau) : ?>
                        <span class="inline-flex items-center gap-1.5 bg-white border border-[#88CAFC30] text-black text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 rounded">
                            Acreditada CONEAU
                        </span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-2.5 mb-4">
                    <p class="text-[#88CAFC] text-sm font-semibold"><?php echo esc_html($facultad_nombre_completo); ?></p>
                </div>
                <h1 class="text-white text-4xl lg:text-5xl font-bold leading-tight mb-3">
                    <?php the_title(); ?>
                </h1>
                <p class="text-[#ffffff88] text-base">Te egresas como: <strong class="text-white font-semibold"><?php echo esc_html($titulo_otorgado); ?></strong></p>
                <div class="flex flex-wrap gap-3 mt-8">
                    <div class="flex items-center gap-2 bg-[#ffffff0d] border border-[#ffffff12] px-4 py-2.5">
                        <svg class="w-4 h-4 text-[#88CAFC] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span class="text-white text-sm font-medium"><?php echo esc_html($duracion); ?></span>
                    </div>
                    <div class="flex items-center gap-2 bg-[#ffffff0d] border border-[#ffffff12] px-4 py-2.5">
                        <svg class="w-4 h-4 text-[#88CAFC] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                        </svg>
                        <span class="text-white text-sm font-medium"><?php echo esc_html($sede_nombre); ?></span>
                    </div>
                    <div class="flex items-center gap-2 bg-[#ffffff0d] border border-[#ffffff12] px-4 py-2.5">
                        <svg class="w-4 h-4 text-[#88CAFC] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z" />
                        </svg>
                        <span class="text-white text-sm font-medium"><?php echo esc_html($modalidad_nombre); ?></span>
                    </div>
                    <div class="flex items-center gap-2 bg-[#ffffff0d] border border-[#ffffff12] px-4 py-2.5">
                        <svg class="w-4 h-4 text-[#88CAFC] shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <a href="<?php echo esc_url($enlace_plan); ?>" target="_blank" class="text-[#88CAFC] text-sm font-medium hover:text-white transition-colors">Plan de estudios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 flex flex-col gap-8">
                <?php if (get_field('objetivos_carrera')) : ?>
                    <section class="bg-white border border-[#e5e0d8] overflow-hidden">
                        <div class="border-b border-[#f0ece4] px-7 py-5 flex items-center gap-3">
                            <h2 class=" text-[#0b1f4a] font-bold text-lg">Objetivos de la carrera</h2> <!-- font-['Libre_Baskerville',serif] -->
                        </div>
                        <div class="px-7 py-6 text-[#1a1a2e88] text-sm leading-relaxed wp-content-format">
                            <?php echo get_field('objetivos_carrera'); ?>
                        </div>
                    </section>
                <?php endif; ?>
                <?php if (get_field('alcances_titulo')) : ?>
                    <section class="bg-white border border-[#e5e0d8] overflow-hidden">
                        <div class="border-b border-[#f0ece4] px-7 py-5 flex items-center gap-3">
                            <h2 class=" text-[#0b1f4a] font-bold text-lg">Alcances e incumbencias del título</h2> <!-- font-['Libre_Baskerville',serif] -->
                        </div>
                        <div class="px-7 py-6 text-[#1a1a2e88] text-sm leading-relaxed wp-content-format">
                            <?php echo get_field('alcances_titulo'); ?>
                        </div>
                    </section>
                <?php endif; ?>
                <?php
                $maximos_anios_posibles = 6;
                $plan_de_estudios = array();
                for ($i = 1; $i <= $maximos_anios_posibles; $i++) {
                    $materias_brutas = get_field('materias_anio_' . $i);
                    if (!empty($materias_brutas)) {
                        $lista_materias = array_filter(array_map('trim', explode("\n", $materias_brutas)));
                        if (!empty($lista_materias)) {
                            $plan_de_estudios[$i] = $lista_materias;
                        }
                    }
                }
                if (!empty($plan_de_estudios)) :
                    $ultimo_anio = max(array_keys($plan_de_estudios));
                ?>
                    <section class="bg-white border border-[#e5e0d8] overflow-hidden">
                        <div class="border-b border-[#f0ece4] px-7 py-5 flex items-center gap-3">
                            <h2 class=" text-[#0b1f4a] font-bold text-lg">Organización Curricular</h2> <!-- font-['Libre_Baskerville',serif] -->
                        </div>
                        <div class="p-7">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <?php foreach ($plan_de_estudios as $numero_anio => $materias) :
                                    $es_final = ($numero_anio === $ultimo_anio);
                                    $col_span_class = $es_final ? 'sm:col-span-2' : '';
                                    $ul_class = $es_final ? 'grid grid-cols-2 sm:grid-cols-3 divide-x divide-y divide-[#f0ece4]' : 'divide-y divide-[#f0ece4]';
                                    $li_class = $es_final ? 'px-4 py-3 text-xs text-[#1a1a2e88] flex items-center gap-2' : 'px-4 py-2.5 text-xs text-[#1a1a2e88] flex items-center gap-2';
                                ?>
                                    <div class="border border-[#e5e0d8] overflow-hidden <?php echo esc_attr($col_span_class); ?>">
                                        <div class="bg-[#0b1f4a] px-4 py-3 flex items-center gap-2">
                                            <span class="w-6 h-6 rounded-full bg-[#88CAFC] flex items-center justify-center shrink-0">
                                                <span class="text-[#0b1f4a] text-[10px] font-black"><?php echo esc_html($numero_anio); ?></span>
                                            </span>
                                            <h3 class="text-white text-sm font-semibold"><?php echo esc_html($numero_anio); ?>º Año</h3>
                                            <?php if ($es_final) : ?>
                                                <span class="ml-auto text-[#88CAFC66] text-[10px] uppercase tracking-widest font-bold">Año final</span>
                                            <?php endif; ?>
                                        </div>
                                        <ul class="<?php echo esc_attr($ul_class); ?>">
                                            <?php foreach ($materias as $materia) : ?>
                                                <li class="<?php echo esc_attr($li_class); ?>">
                                                    <span class="w-1 h-1 rounded-full bg-[#88CAFC] shrink-0"></span>
                                                    <?php echo esc_html($materia); ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (get_field('enlace_plan_estudios')) : ?>
                                <a href="<?php echo esc_url(get_field('enlace_plan_estudios')); ?>" target="_blank" class="mt-5 flex items-center gap-2 text-sm text-[#0b1f4a] font-semibold hover:text-[#88CAFC] transition-colors group w-fit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    Ver plan de estudios completo en PDF
                                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
            <aside class="flex flex-col gap-6">
                <div class="bg-white border border-[#e5e0d8] p-6">
                    <h3 class=" text-[#0b1f4a] font-bold text-base mb-4">Compartí esta carrera</h3> <!-- font-['Libre_Baskerville',serif] -->
                    <div class="flex gap-3">
                        <?php $url_actual = urlencode(get_permalink()); ?>
                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $url_actual; ?>" target="_blank" class="w-10 h-10 bg-[#EEF1F5] hover:bg-[#1877f2] group flex items-center justify-center transition-all">
                            <svg class="w-5 h-5 text-[#1877f2] group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="whatsapp://send?text=<?php echo $url_actual; ?>" target="_blank" class="w-10 h-10 bg-[#EEF1F5] hover:bg-[#25D366] group flex items-center justify-center transition-all">
                            <svg class="w-5 h-5 text-[#25D366] group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="bg-white border border-[#e5e0d8] overflow-hidden">
                    <div class="bg-[#0b1f4a] px-6 py-4">
                        <h3 class=" text-white font-bold text-base">Contacto</h3> <!-- font-['Libre_Baskerville',serif] -->
                        <p class="text-[#88CAFC] text-xs mt-0.5"><?php echo esc_html($facultad_nombre_completo); ?></p>
                    </div>
                    <div class="p-6 flex flex-col gap-4">
                        <?php if (get_field('telefono_contacto')) : ?>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-[#EEF1F5] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4 text-[#0b1f4a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 6z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[#1a1a2e55] text-[11px] uppercase tracking-widest font-bold mb-0.5">Teléfono</p>
                                    <a href="tel:<?php echo get_field('telefono_contacto'); ?>" class="text-[#0b1f4a] text-sm font-semibold hover:text-[#88CAFC] transition-colors"><?php echo get_field('telefono_contacto'); ?></a>
                                    <?php if (get_field('interno_contacto')) : ?>
                                        <p class="text-[#1a1a2e44] text-xs mt-0.5">Interno: <?php echo get_field('interno_contacto'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('sitio_web_contacto')) : ?>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-[#EEF1F5] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4 text-[#0b1f4a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253M3 12a8.96 8.96 0 0 0 .284 2.253" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[#1a1a2e55] text-[11px] uppercase tracking-widest font-bold mb-0.5">Sitio web</p>
                                    <a href="<?php echo esc_url(get_field('sitio_web_contacto')); ?>" target="_blank" class="text-[#0b1f4a] text-sm font-semibold hover:text-[#88CAFC] transition-colors break-all">Visitar sitio web</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('correo_contacto')) : ?>
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-[#EEF1F5] flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4 text-[#0b1f4a]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[#1a1a2e55] text-[11px] uppercase tracking-widest font-bold mb-0.5">Correo electrónico</p>
                                    <?php $correo = get_field('correo_contacto'); ?>
                                    <a href="mailto:<?php echo antispambot($correo); ?>" class="text-[#0b1f4a] text-sm font-semibold hover:text-[#88CAFC] transition-colors break-all"><?php echo antispambot($correo); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (get_field('instagram_contacto') || get_field('facebook_contacto')) : ?>
                            <div class="pt-4 border-t border-[#f0ece4]">
                                <p class="text-[#1a1a2e55] text-[11px] uppercase tracking-widest font-bold mb-3">Redes sociales</p>
                                <div class="flex flex-col gap-2">
                                    <?php if (get_field('instagram_contacto')) : ?>
                                        <a href="<?php echo esc_url(get_field('instagram_contacto')); ?>" target="_blank" class="flex items-center gap-2 text-sm text-[#1a1a2e88] hover:text-[#E1306C] transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                                            </svg>
                                            Instagram
                                        </a>
                                    <?php endif; ?>
                                    <?php if (get_field('facebook_contacto')) : ?>
                                        <a href="<?php echo esc_url(get_field('facebook_contacto')); ?>" target="_blank" class="flex items-center gap-2 text-sm text-[#1a1a2e88] hover:text-[#1877f2] transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                            Facebook
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="bg-[#0b1f4a] p-6 relative overflow-hidden">
                    <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full bg-[#88CAFC] opacity-10 pointer-events-none"></div>
                    <h3 class="  text-white font-bold text-base mb-2 relative">¿Te interesa esta carrera?</h3> <!-- font-['Libre_Baskerville',serif] -->
                    <p class="text-[#ffffff77] text-sm mb-5 relative">Realizá tu preinscripción y comenzá tu camino en la UNSL.</p>
                    <a href="/preinscripcion" class="relative flex items-center justify-center gap-2 bg-[#88CAFC] hover:bg-white text-[#0b1f4a] font-bold text-sm px-5 py-3.5 transition-all">
                        Preinscripción 2026
                    </a>
                </div>
            </aside>
        </div>
    </div>
<?php
endwhile;
get_footer();
?>