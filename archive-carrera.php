<?php

/**
 * Plantilla de Archivo para el listado de todas las Carreras
 * URL: /carreras/
 */
get_header();
?>

<div class="bg-white border-b border-[#e5e0d8]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e]">Explorador de carreras</span>
    </div>
</div>

<header class="bg-[#0b1f4a] py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f4a] to-[#1e3a8a] opacity-90"></div>
    <div class="relative max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-white text-3xl md:text-4xl font-bold  mb-4"> <!-- font-['Libre_Baskerville',serif] -->
            Carreras UNSL
        </h1>
        <!--p class="text-slate-300 text-base max-w-2xl mx-auto">
            Utiliza los filtros a continuación para explorar nuestra oferta académica y encontrar el plan de estudios ideal para tu futuro.
        </p-->
    </div>
</header>

<div class="bg-white border-b border-[#e5e0d8] sticky top-[80px] z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-2">
        <div class="flex flex-wrap gap-3 items-center">

            <div class="flex items-center gap-1.5 bg-[#f5f3ee] p-1 rounded-lg">
                <button data-filter="tipo" data-value="" class="filter-btn active-tipo px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 bg-[#0b1f4a] text-white shadow-sm">Todos</button>
                <button data-filter="tipo" data-value="pregrado" class="filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Pregrado</button>
                <button data-filter="tipo" data-value="grado" class="filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Grado</button>
                <button data-filter="tipo" data-value="posgrado" class="filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Posgrado</button>
            </div>

            <?php

            function imprimir_opciones_taxonomia_archivo($taxonomia, $placeholder)
            {

                // Diccionario de facultades
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

                $terms = get_terms(array('taxonomy' => $taxonomia, 'hide_empty' => false));

                echo '<select id="filter' . ucfirst($taxonomia) . '" class="bg-[#f5f3ee] border-0 px-4 py-2.5 rounded-lg text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8 max-w-xs truncate">';
                echo '<option value="">' . esc_html($placeholder) . '</option>';

                foreach ($terms as $term) {
                    $texto_visible = esc_html($term->name);

                    if ($taxonomia === 'facultad' && isset($nombres_facultades[$term->slug])) {
                        $texto_visible = esc_html($term->name) . ' (' . esc_html($nombres_facultades[$term->slug]) . ')';
                    }


                    echo '<option value="' . esc_attr($term->name) . '" title="' . $texto_visible . '">' . $texto_visible . '</option>';
                }

                echo '</select>';
            }
            ?>


            <?php imprimir_opciones_taxonomia_archivo('modalidad', 'Modalidad'); ?>
            <?php imprimir_opciones_taxonomia_archivo('sede', 'Sede'); ?>
            <?php imprimir_opciones_taxonomia_archivo('facultad', 'Unidad Académica'); ?>

            <button id="clearFilters" class="ml-auto text-xs text-[#1a1a2e55] hover:text-[#88CAFC] font-medium transition-colors underline underline-offset-2">
                Limpiar filtros
            </button>
        </div>
    </div>
</div>

<?php
$args = array(
    'post_type'      => 'carrera',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);
$query_carreras = new WP_Query($args);
$array_carreras = array();

if ($query_carreras->have_posts()) {
    while ($query_carreras->have_posts()) {
        $query_carreras->the_post();

        $terms_nivel = get_the_terms(get_the_ID(), 'nivel');
        $tipo_slug = ($terms_nivel && !is_wp_error($terms_nivel)) ? $terms_nivel[0]->slug : '';

        $terms_facultad = get_the_terms(get_the_ID(), 'facultad');
        $facultad_name = ($terms_facultad && !is_wp_error($terms_facultad)) ? $terms_facultad[0]->name : '';
        // ¡NUEVA LÍNEA! Obtenemos la sigla (ej: fch, fcfmyn)
        $facultad_slug = ($terms_facultad && !is_wp_error($terms_facultad)) ? $terms_facultad[0]->slug : '';

        $terms_sede = get_the_terms(get_the_ID(), 'sede');
        $sede_name = ($terms_sede && !is_wp_error($terms_sede)) ? $terms_sede[0]->name : '';

        $terms_modalidad = get_the_terms(get_the_ID(), 'modalidad');
        $modalidad_name = ($terms_modalidad && !is_wp_error($terms_modalidad)) ? $terms_modalidad[0]->name : '';

        $duracion = get_field('duracion_carrera') ? get_field('duracion_carrera') : 'No especificada';

        $array_carreras[] = array(
            'nombre'        => html_entity_decode(get_the_title()),
            'link'          => get_permalink(),
            'tipo'          => $tipo_slug,
            'facultad'      => html_entity_decode($facultad_name),
            'facultad_slug' => strtolower($facultad_slug),
            'duracion'      => $duracion,
            'sede'          => html_entity_decode($sede_name),
            'modalidad'     => html_entity_decode($modalidad_name)
        );
    }
    wp_reset_postdata();
}
?>

<main class="max-w-7xl mx-auto px-6 py-10 bg-[#EEF1F5]">

    <div class="bg-white p-6 rounded shadow-sm border border-[#e5e0d8] mb-8">
        <div class="relative w-full">
            <svg class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-[#0b1f4a] opacity-50 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
            </svg>
            <input id="searchInput" type="search" placeholder="Búsqueda rápida por nombre..." class="w-full bg-[#f5f3ee] pl-14 pr-5 py-3.5 rounded text-[#1a1a2e] text-base placeholder:text-[#1a1a2e66] outline-none focus:ring-2 focus:ring-[#88CAFC] focus:bg-white transition-all" />
        </div>
    </div>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-[#0b1f4a] ">Catálogo</h2> <!-- font-['Libre_Baskerville',serif] -->
        <p class="text-sm font-medium text-[#1a1a2e66] bg-white px-3 py-1 rounded-full shadow-sm border border-[#e5e0d8]"><span id="resultCount">—</span> carreras listadas</p>
    </div>

    <div id="carrerasGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>

    <div id="emptyState" class="hidden text-center py-24 bg-white rounded border border-[#e5e0d8]">
        <svg class="w-16 h-16 mx-auto text-[#1a1a2e22] mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
        </svg>
        <p class="text-[#0b1f4a] text-lg font-bold ">No se encontraron carreras</p> <!-- font-['Libre_Baskerville',serif] -->
        <p class="text-[#1a1a2e66] text-sm mt-2 max-w-sm mx-auto">No hay resultados que coincidan con la combinación de filtros seleccionada.</p>
        <button onclick="document.getElementById('clearFilters').click()" class="mt-4 text-[#88CAFC] font-medium hover:text-[#0b1f4a] transition-colors">Limpiar búsqueda</button>
    </div>
</main>

<script>
    const CARRERAS = <?php echo json_encode($array_carreras, JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG); ?>;
    const THEME_URL = "<?php echo get_template_directory_uri(); ?>";

    const TIPO_CONFIG = {
        pregrado: {
            label: "Pregrado",
            bg: "bg-[#e8f4f0]",
            text: "text-[#1a6b52]",
            dot: "bg-[#1a6b52]"
        },
        grado: {
            label: "Grado",
            bg: "bg-[#eef2ff]",
            text: "text-[#3730a3]",
            dot: "bg-[#3730a3]"
        },
        posgrado: {
            label: "Posgrado",
            bg: "bg-[#fff7ed]",
            text: "text-[#92400e]",
            dot: "bg-[#92400e]"
        },
    };


    const FACU_CONFIG = {
        'fqbyf': {
            bg: 'bg-[#f5fef9]'
        },
        'fcfmyn': {
            bg: 'bg-[#fef9f8]'
        },
        'fica': {       
            bg: 'bg-[#f7fbfd]'
        },
        'fcejs': {
            bg: 'bg-[#faf8fc]'
        },
        'fch': {
            bg: 'bg-[#fdf5f1]'
        },
        'fapsi': {
            bg: 'bg-[#fffbf7]'
        },
        'fcs': {
            bg: 'bg-[#fdfff5]'
        },
        'ftu': {
            bg: 'bg-[#fffef9]'
        },
        'ipau': {
            bg: 'bg-[#fff9fc]'
        }
    };

    const NOMBRES_FACULTADES = {
        'fqbyf': 'Facultad de Química, Bioquímica y Farmacia',
        'fcfmyn': 'Facultad de Ciencias Físico Matemáticas y Naturales',
        'fica': 'Facultad de Ingeniería y Ciencias Agropecuarias',
        'fcejs': 'Facultad de Ciencias Económicas, Jurídicas y Sociales',
        'fch': 'Facultad de Ciencias Humanas',
        'fapsi': 'Facultad de Psicología',
        'fcs': 'Facultad de Ciencias de la Salud',
        'ftu': 'Facultad de Turismo y Urbanismo',
        'ipau': 'Instituto Politécnico y Artístico Universitario'
    };

    let state = {
        tipo: "",
        modalidad: "",
        sede: "",
        facultad: "",
        search: ""
    };

    function buildCard(c) {
        const tc = TIPO_CONFIG[c.tipo] || {
            label: "General",
            bg: "bg-gray-100",
            text: "text-gray-700",
            dot: "bg-gray-700"
        };


        const fc = FACU_CONFIG[c.facultad_slug] || {
            bg: 'bg-white'
        };

        const nombreFacultad = NOMBRES_FACULTADES[c.facultad_slug] || c.facultad;

        const modalidadText = c.modalidad.toLowerCase().includes("virtual") ? "Virtual" : "Presencial";
        const modalidadIcon = modalidadText === "Virtual" ? '<path d="M9.75 17 9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>' : '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>';
        const modalidadClass = modalidadText === "Virtual" ? "text-[#0b1f4a] bg-[#0b1f4a14]" : "text-[#1a6b52] bg-[#1a6b5214]";

        // INCORPORACIÓN DE LA CLASE DE FONDO DINÁMICA:
        // Hemos quitado "bg-white" y colocado "${fc.bg}" en las clases de la etiqueta <a>
        return `
            <a href="${c.link}" class="group ${fc.bg} rounded overflow-hidden border border-[#e5e0d8] hover:border-[#88CAFC] hover:-translate-y-1 hover:shadow-xl hover:shadow-[#0b1f4a1a] transition-all duration-300 flex flex-col cursor-pointer">
                <div class="p-6 flex flex-col gap-4 flex-1">
                    
                    <div class="flex items-start justify-between gap-2">
                        <span class="${tc.bg} ${tc.text} text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded flex items-center gap-1.5 shrink-0">
                            <span class="w-1.5 h-1.5 rounded ${tc.dot}"></span>${tc.label}
                        </span>
                        
                        <span class="flex items-center gap-1 text-[10px] font-bold ${modalidadClass} rounded px-2 py-1 uppercase tracking-wide">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">${modalidadIcon}</svg>
                            ${modalidadText}
                        </span>
                    </div>

                    <div class="flex items-start gap-4 mt-2">
                        <h3 class="text-[#1a1a2e] text-base font-bold leading-snug group-hover:text-[#0b1f4a] transition-colors flex-1 mt-1">
                            ${c.nombre}
                        </h3>
                    </div>

                    <div class="flex flex-col gap-2 mt-auto pt-4 border-t border-dashed border-[#e5e0d8]">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#1a1a2e66] font-medium">Facultad</span>
                            <span class="font-bold text-[#0b1f4a] bg-white border border-[#e5e0d8] px-2 py-0.5 rounded text-right max-w-[65%] truncate" title="${nombreFacultad}">${nombreFacultad}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#1a1a2e66] font-medium">Sede</span>
                            <span class="font-medium text-[#1a1a2e]">${c.sede}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#1a1a2e66] font-medium">Duración</span>
                            <span class="font-medium text-[#1a1a2e]">${c.duracion}</span>
                        </div>
                    </div>

                </div>
            </a>`;
    }

    function render() {
        const q = state.search.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        const filtered = CARRERAS.filter(c => {
            const name = c.nombre.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            if (state.tipo && c.tipo !== state.tipo) return false;
            if (state.modalidad && c.modalidad !== state.modalidad) return false;
            if (state.sede && c.sede !== state.sede) return false;
            if (state.facultad && c.facultad !== state.facultad) return false;
            if (q && !name.includes(q)) return false;
            return true;
        });

        const grid = document.getElementById("carrerasGrid");
        const empty = document.getElementById("emptyState");
        document.getElementById("resultCount").textContent = filtered.length;

        if (filtered.length === 0) {
            grid.innerHTML = "";
            empty.classList.remove("hidden");
        } else {
            empty.classList.add("hidden");
            grid.innerHTML = filtered.map(buildCard).join("");
        }
    }


    document.getElementById("searchInput").addEventListener("input", e => {
        state.search = e.target.value;
        render();
    });

    document.querySelectorAll("[data-filter='tipo']").forEach(btn => {
        btn.addEventListener("click", () => {
            state.tipo = btn.dataset.value;
            document.querySelectorAll("[data-filter='tipo']").forEach(b => {
                b.classList.remove("bg-[#0b1f4a]", "text-white", "shadow-sm");
                b.classList.add("text-[#1a1a2e66]");
            });
            btn.classList.add("bg-[#0b1f4a]", "text-white", "shadow-sm");
            btn.classList.remove("text-[#1a1a2e66]");
            render();
        });
    });

    document.getElementById("filterModalidad").addEventListener("change", e => {
        state.modalidad = e.target.value;
        render();
    });
    document.getElementById("filterSede").addEventListener("change", e => {
        state.sede = e.target.value;
        render();
    });
    document.getElementById("filterFacultad").addEventListener("change", e => {
        state.facultad = e.target.value;
        render();
    });

    document.getElementById("clearFilters").addEventListener("click", () => {
        state = {
            tipo: "",
            modalidad: "",
            sede: "",
            facultad: "",
            search: ""
        };
        document.getElementById("searchInput").value = "";
        document.getElementById("filterModalidad").value = "";
        document.getElementById("filterSede").value = "";
        document.getElementById("filterFacultad").value = "";


        window.history.replaceState({}, document.title, window.location.pathname);

        document.querySelectorAll("[data-filter='tipo']").forEach((b, i) => {
            if (i === 0) {
                b.classList.add("bg-[#0b1f4a]", "text-white", "shadow-sm");
                b.classList.remove("text-[#1a1a2e66]");
            } else {
                b.classList.remove("bg-[#0b1f4a]", "text-white", "shadow-sm");
                b.classList.add("text-[#1a1a2e66]");
            }
        });
        render();
    });


    document.addEventListener("DOMContentLoaded", () => {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('q')) {
            state.search = urlParams.get('q');
            document.getElementById('searchInput').value = state.search;
        }

        if (urlParams.has('tipo')) {
            state.tipo = urlParams.get('tipo');
            document.querySelectorAll("[data-filter='tipo']").forEach(b => {
                if (b.dataset.value === state.tipo) {
                    b.classList.add("bg-[#0b1f4a]", "text-white", "shadow-sm");
                    b.classList.remove("text-[#1a1a2e66]");
                } else {
                    b.classList.remove("bg-[#0b1f4a]", "text-white", "shadow-sm");
                    b.classList.add("text-[#1a1a2e66]");
                }
            });
        }

        if (urlParams.has('facultad')) {
            state.facultad = urlParams.get('facultad');
            const selectFacultad = document.getElementById('filterFacultad');
            if (selectFacultad) {
                selectFacultad.value = state.facultad;
            }
        }


        render();
    });
</script>
<?php get_footer(); ?>