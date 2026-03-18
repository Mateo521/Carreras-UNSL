<?php

/**
 * Plantilla de Archivo para el listado de todas las Carreras
 * URL: /carreras/
 */
get_header();
?>



<header class="bg-[#0b1f4a] pb-6 pt-24 relative overflow-hidden ">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f4a] to-[#1e3a8a] opacity-90"></div>
    <div class="relative max-w-7xl mx-auto px-6 text-left">
        <h1 class="text-white text-3xl md:text-4xl font-bold  mb-4"> <!-- font-['Libre_Baskerville',serif] -->
            Carreras UNSL
        </h1>
        <!--p class="text-slate-300 text-base max-w-2xl mx-auto">
            Utiliza los filtros a continuación para explorar nuestra oferta académica y encontrar el plan de estudios ideal para tu futuro.
        </p-->
    </div>
    <div class="max-w-7xl mx-auto relative" style="">
        <p class="absolute  bottom-[-23px] text-[#152659] leading-[0.7] font-[800] right-0 px-12 text-[7vw]">UNSL</p>
    </div>
</header>
<div class="bg-white border-b border-[#e5e0d8]">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center gap-2 text-xs text-[#1a1a2e55]">
        <a href="<?php echo home_url(); ?>" class="hover:text-[#0b1f4a] transition-colors">Inicio</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <span class="text-[#1a1a2e]">Explorador de carreras</span>
    </div>
</div>
<div class="bg-white border-b border-[#e5e0d8] sticky top-[65px] z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3">

        <div class="flex justify-between items-center lg:hidden">
            <span class="text-sm font-bold text-[#0b1f4a] flex items-center gap-2">
                <svg class="w-4 h-4 text-[#88CAFC]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                </svg>
                Filtros de búsqueda
            </span>
            <button id="toggleMobileFilters" class="bg-[#f5f3ee] hover:bg-[#e5e0d8] text-[#0b1f4a] px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wide transition-colors">
                Mostrar
            </button>
        </div>

        <div id="filtersWrapper" class="hidden lg:flex flex-col lg:flex-row flex-wrap gap-3 items-stretch lg:items-center mt-4 lg:mt-0">

            <div class="flex flex-wrap items-center gap-1.5 bg-[#f5f3ee] p-1 rounded-lg w-full lg:w-auto">
                <button data-filter="tipo" data-value="" class="flex-1 lg:flex-none filter-btn active-tipo px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 bg-[#0b1f4a] text-white shadow-sm">Todos</button>
                <button data-filter="tipo" data-value="pregrado" class="flex-1 lg:flex-none filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Pregrado</button>
                <button data-filter="tipo" data-value="grado" class="flex-1 lg:flex-none filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Grado</button>
                <button data-filter="tipo" data-value="posgrado" class="flex-1 lg:flex-none filter-btn px-4 py-2 rounded-md text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Posgrado</button>
            </div>

            <?php
            function imprimir_opciones_taxonomia_archivo($taxonomia, $placeholder)
            {
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


                echo '<select id="filter' . ucfirst($taxonomia) . '" class="w-full lg:w-auto bg-[#f5f3ee] border-0 px-4 py-2.5 rounded-lg text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8 lg:max-w-xs truncate">';
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

            <select id="filterProfesion" class="w-full lg:w-auto bg-[#f5f3ee] border-0 px-4 py-2.5 rounded-lg text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8">
                <option value="">Tipo de Profesión</option>
                <option value="licenciatura">Licenciaturas</option>
                <option value="ingenieria">Ingenierías</option>
                <option value="profesorado">Profesorados</option>
                <option value="tecnicatura">Tecnicaturas</option>
            </select>

            <!--button id="clearFilters" class="mt-2 lg:mt-0 lg:ml-auto w-full lg:w-auto text-center text-xs text-[#1a1a2e55] hover:text-[#88CAFC] font-medium transition-colors underline underline-offset-2 py-2">
                Limpiar filtros
            </button-->

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
        <p class="text-sm font-medium text-[#1a1a2e66] bg-white px-3 py-1  shadow-sm border border-[#e5e0d8]"><span id="resultCount">—</span> carreras listadas</p>
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
            border: 'border-b-[#008e3b]',
            bgPill: 'bg-[#ecfdf5]',
            textPill: 'text-[#065f46]'
        },
        'fcfmyn': {
            border: 'border-b-[#d2231f]',
            bgPill: 'bg-[#d2231f]',
            textPill: 'text-[#fff]'
        },
        'fica': {
            border: 'border-b-[#466876]',
            bgPill: 'bg-[#466876]',
            textPill: 'text-[#fff]'
        },
        'fcejs': {
            border: 'border-b-[#4b256b]',
            bgPill: 'bg-[#4b256b]',
            textPill: 'text-[#fff]'
        },
        'fch': {
            border: 'border-b-[#e5641c]',
            bgPill: 'bg-[#e5641c]',
            textPill: 'text-[#fff]'
        },
        'fapsi': {
            border: 'border-b-[#f4ce85]',
            bgPill: 'bg-[#F2BB52]',
            textPill: 'text-[#fff]'
        },
        'fcs': {
            border: 'border-b-[#88ae2a]',
            bgPill: 'bg-[#f0fdfa]',
            textPill: 'text-[#0f766e]'
        },
        'ftu': {
            border: 'border-b-[#996b16]',
            bgPill: 'bg-[#996b16]',
            textPill: 'text-[#fff]'
        },
        'ipau': {
            border: 'border-b-[#983071]',
            bgPill: 'bg-[#983071]',
            textPill: 'text-[#fff]'
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
        profesion: "",
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
            border: 'border-b-[#e5e0d8]',
            bgPill: 'bg-[#EEF1F5]',
            textPill: 'text-[#1a1a2e66]'
        };
        const nombreFacultad = NOMBRES_FACULTADES[c.facultad_slug] || c.facultad;

        const modalidadText = c.modalidad.toLowerCase().includes("virtual") ? "Virtual" : "Presencial";
        const modalidadIcon = modalidadText === "Virtual" ? '<path d="M9.75 17 9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>' : '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/>';
        const modalidadClass = modalidadText === "Virtual" ? "text-[#0b1f4a] bg-[#0b1f4a14]" : "text-[#1a6b52] bg-[#1a6b5214]";

        return `
            <a href="${c.link}" class="group bg-white  overflow-hidden border-x border-b border-[#e5e0d8] border-b-4 ${fc.border} hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col cursor-pointer">
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
                    <div class="flex flex-col gap-2 mt-auto pt-4 border-b border-dashed border-[#e5e0d8]">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#1a1a2e66] font-medium">Facultad</span>
                            <span class="font-bold ${fc.textPill} ${fc.bgPill} px-2 py-1 rounded text-right max-w-[65%] truncate" title="${nombreFacultad}">
                                ${nombreFacultad}
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs mt-1">
                            <span class="text-[#1a1a2e66] font-medium">Sede</span>
                            <span class="font-medium text-[#1a1a2e]">${c.sede}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs mt-1">
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
            if (state.profesion) {
                const prof = state.profesion.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                if (!name.includes(prof)) return false;
            }

            if (q && !name.includes(q)) return false;
            return true;
        });

        const grid = document.getElementById("carrerasGrid");
        const empty = document.getElementById("emptyState");
        const resultCount = document.getElementById("resultCount");

        if (resultCount) resultCount.textContent = filtered.length;

        if (filtered.length === 0) {
            if (grid) grid.innerHTML = "";
            if (empty) empty.classList.remove("hidden");
        } else {
            if (empty) empty.classList.add("hidden");
            if (grid) grid.innerHTML = filtered.map(buildCard).join("");
        }
    }


    document.addEventListener("DOMContentLoaded", () => {




        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('q')) {
            state.search = urlParams.get('q');
            const searchInput = document.getElementById('searchInput');
            if (searchInput) searchInput.value = state.search;
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
            if (selectFacultad) selectFacultad.value = state.facultad;
        }

        if (urlParams.has('sede')) {
            state.sede = urlParams.get('sede');
            const selectSede = document.getElementById('filterSede');
            if (selectSede) selectSede.value = state.sede;
        }


        const searchInput = document.getElementById("searchInput");
        if (searchInput) {
            searchInput.addEventListener("input", e => {
                state.search = e.target.value;
                render();
            });
        }


        const toggleMobileFilters = document.getElementById("toggleMobileFilters");
        const filtersWrapper = document.getElementById("filtersWrapper");

        if (toggleMobileFilters && filtersWrapper) {
            toggleMobileFilters.addEventListener("click", () => {

                filtersWrapper.classList.toggle("hidden");
                filtersWrapper.classList.toggle("flex");


                if (filtersWrapper.classList.contains("hidden")) {
                    toggleMobileFilters.textContent = "Mostrar";
                } else {
                    toggleMobileFilters.textContent = "Ocultar";
                }
            });
        }


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

        const filterModalidad = document.getElementById("filterModalidad");
        if (filterModalidad) filterModalidad.addEventListener("change", e => {
            state.modalidad = e.target.value;
            render();
        });

        const filterSede = document.getElementById("filterSede");
        if (filterSede) filterSede.addEventListener("change", e => {
            state.sede = e.target.value;
            render();
        });

        const filterFacultad = document.getElementById("filterFacultad");
        if (filterFacultad) filterFacultad.addEventListener("change", e => {
            state.facultad = e.target.value;
            render();
        });

        const filterProfesion = document.getElementById("filterProfesion");
        if (filterProfesion) {
            filterProfesion.addEventListener("change", e => {
                state.profesion = e.target.value;
                render();
            });
        }

        const clearFiltersBtn = document.getElementById("clearFilters");
        if (clearFiltersBtn) {
            clearFiltersBtn.addEventListener("click", () => {
                state = {
                    tipo: "",
                    modalidad: "",
                    sede: "",
                    profesion: "",
                    facultad: "",
                    search: ""
                };

                if (searchInput) searchInput.value = "";
                if (filterModalidad) filterModalidad.value = "";
                if (filterSede) filterSede.value = "";
                if (filterFacultad) filterFacultad.value = "";
                if (document.getElementById("filterProfesion")) document.getElementById("filterProfesion").value = "";

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
        }


        render();
    });
</script>
<?php get_footer(); ?>