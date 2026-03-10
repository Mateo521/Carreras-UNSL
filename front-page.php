<?php

get_header();
?>

<section class="relative h-[calc(100vh-73px)] w-full overflow-hidden bg-[#0b1f4a]">
    <video class="absolute inset-0 w-full h-full object-cover z-0" autoplay muted loop playsinline src="<?php echo get_template_directory_uri(); ?>/videos/video-2.mp4"></video>
    <div class="absolute inset-0 bg-[#0b1f4a]/80 z-0 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#0b1f4a] via-[#0b1f4a]/80 to-transparent w-full md:w-3/4 lg:w-2/3 z-0"></div>

    <div class="relative z-10 h-full w-full max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 flex flex-col justify-center">
        <div class="w-full">
            <h1 class="text-white md:text-5xl text-2xl lg:text-8xl font-bold leading-tight mb-6 tracking-tight drop-shadow-lg">
                Oferta
                <em class="text-[#88CAFC] not-italic font-medium">Académica 2026</em>
            </h1>
            <p class="text-slate-200 text-lg sm:text-xl max-w-xl mb-10 font-light leading-relaxed drop-shadow-md">
                Encontrá tu vocación entre más de 80 carreras de pregrado, grado y posgrado en todas las sedes de la UNSL.
            </p>
        </div>
    </div>
</section>

<div class="bg-white border-b border-[#e5e0d8] sticky top-[80px] z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-2">
        <div class="flex flex-wrap gap-3 items-center">
            <div class="flex items-center gap-1.5 bg-[#f5f3ee] p-1">
                <button data-filter="tipo" data-value="" class="filter-btn active-tipo px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 bg-[#0b1f4a] text-white">Todos</button>
                <button data-filter="tipo" data-value="pregrado" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Pregrado</button>
                <button data-filter="tipo" data-value="grado" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Grado</button>
                <button data-filter="tipo" data-value="posgrado" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 text-[#1a1a2e66] hover:text-[#1a1a2e]">Posgrado</button>
            </div>

            <select id="filterModalidad" class="bg-[#f5f3ee] border-0 px-4 py-2.5 text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8">
                <option value="">Modalidad</option>
                <option value="presencial">Presencial</option>
                <option value="virtual">Virtual</option>
            </select>

            <select id="filterSede" class="bg-[#f5f3ee] border-0 px-4 py-2.5 text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8">
                <option value="">Sede</option>
                <option value="San Luis">San Luis</option>
                <option value="Villa Mercedes">Villa Mercedes</option>
                <option value="Merlo">Merlo</option>
            </select>

            <select id="filterFacultad" class="bg-[#f5f3ee] border-0 px-4 py-2.5 text-sm font-medium text-[#1a1a2e] outline-none focus:ring-2 focus:ring-[#88CAFC] cursor-pointer appearance-none pr-8">
                <option value="">Unidad Académica</option>
                <option value="FCFMYN">FCFMYN</option>
                <option value="FQBYF">FQBYF</option>
                <option value="FAPSI">FAPSI</option>
                <option value="FCEJS">FCEJS</option>
                <option value="FICA">FICA</option>
                <option value="FCH">FCH</option>
                <option value="FCS">FCS</option>
                <option value="FTU">FTU</option>
            </select>

            <button id="clearFilters" class="ml-auto text-xs text-[#1a1a2e55] hover:text-[#88CAFC] font-medium transition-colors underline underline-offset-2">
                Limpiar filtros
            </button>
        </div>
    </div>
</div>

<main class="max-w-7xl mx-auto px-6 py-10 bg-gray-100">
    <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-[#1a1a2e66]"><span id="resultCount">—</span> resultados</p>
    </div>

    <div class="bg-gray-100 p-5 rounded-t">
        <div class="relative">
            <svg class="absolute left-5 top-1/2 -translate-y-1/2 w-5 h-5 text-[#0b1f4a] opacity-50 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.35-4.35" />
            </svg>
            <input id="searchInput" type="search" placeholder="Buscar carrera por nombre…" class="w-full bg-white pl-14 pr-5 py-4 text-[#1a1a2e] text-base placeholder:text-[#1a1a2e66] outline-none focus:ring-2 focus:ring-[#88CAFC] transition-all" />
        </div>

        <div class="flex items-center justify-center gap-6 mt-10 pb-6">
            <div class="text-center w-full">
                <p class="text-[#0D385E] font-['Libre_Baskerville',serif] text-2xl font-bold" id="totalCount">—</p>
                <p class="text-black text-xs uppercase tracking-widest mt-0.5">Carreras</p>
            </div>
            <div class="w-px h-8 bg-[#0D385E33]"></div>
            <div class="text-center w-full">
                <p class="text-[#0D385E] font-['Libre_Baskerville',serif] text-2xl font-bold">8</p>
                <p class="text-black text-xs uppercase tracking-widest mt-0.5">Facultades</p>
            </div>
            <div class="w-px h-8 bg-[#0D385E33]"></div>
            <div class="text-center w-full">
                <p class="text-[#0D385E] font-['Libre_Baskerville',serif] text-2xl font-bold">3</p>
                <p class="text-black text-xs uppercase tracking-widest mt-0.5">Sedes</p>
            </div>
        </div>
    </div>

    <div id="carrerasGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5"></div>

    <div id="emptyState" class="hidden text-center py-24">
        <svg class="w-16 h-16 mx-auto text-[#1a1a2e22] mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
        </svg>
        <p class="text-[#1a1a2e55] text-lg font-medium">No se encontraron carreras</p>
        <p class="text-[#1a1a2e33] text-sm mt-1">Probá con otros filtros o términos de búsqueda</p>
    </div>
</main>

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

        $terms_sede = get_the_terms(get_the_ID(), 'sede');
        $sede_name = ($terms_sede && !is_wp_error($terms_sede)) ? $terms_sede[0]->name : '';

        $terms_modalidad = get_the_terms(get_the_ID(), 'modalidad');
        $modalidad_slug = ($terms_modalidad && !is_wp_error($terms_modalidad)) ? $terms_modalidad[0]->slug : '';


        $duracion = get_field('duracion_carrera') ? get_field('duracion_carrera') : 'No especificada';


        $array_carreras[] = array(
            'nombre'    => get_the_title(),
            'link'      => get_permalink(),
            'tipo'      => $tipo_slug,
            'facultad'  => $facultad_name,
            'duracion'  => $duracion,
            'sede'      => $sede_name,
            'modalidad' => $modalidad_slug
        );
    }
    wp_reset_postdata();
}
?>

<script>
    const CARRERAS = <?php echo json_encode($array_carreras, JSON_UNESCAPED_UNICODE); ?>;

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

        const modalidadBadge = c.modalidad === "virtual" ?
            `<span class="flex items-center gap-1 text-[10px] font-semibold text-[#0b1f4a] bg-[#0b1f4a14] rounded px-2 py-0.5 uppercase tracking-wide">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9.75 17 9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/></svg> Virtual
            </span>` :
            `<span class="flex items-center gap-1 text-[10px] font-semibold text-[#1a6b52] bg-[#1a6b5214] rounded px-2 py-0.5 uppercase tracking-wide">Presencial</span>`;


        return `
            <a href="${c.link}" class="group bg-white overflow-hidden border border-[#e5e0d8] hover:border-[#88CAFC] hover:shadow-xl hover:shadow-[#0b1f4a0d] transition-all duration-300 flex flex-col cursor-pointer">
                <div class="p-5 flex flex-col gap-3 flex-1">
                    <div class="flex items-start justify-between gap-2">
                        <span class="${tc.bg} ${tc.text} text-[10px] font-bold uppercase tracking-widest px-2.5 py-1 rounded flex items-center gap-1.5 shrink-0">
                            <span class="w-1.5 h-1.5 rounded ${tc.dot}"></span>${tc.label}
                        </span>
                    </div>
                    <h3 class="font-['Libre_Baskerville',serif] text-[#1a1a2e] text-sm font-bold leading-snug group-hover:text-[#0b1f4a] transition-colors flex-1">${c.nombre}</h3>
                    <div class="flex flex-col gap-1.5 mt-auto">
                        <div class="flex items-center gap-1.5 text-xs text-[#1a1a2e66]">
                            <span class="font-medium text-[#1a1a2e]">${c.facultad}</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-xs text-[#1a1a2e66]">
                            ${c.duracion} <span class="mx-1 text-[#e5e0d8]">·</span> ${c.sede}
                        </div>
                    </div>
                    <div class="pt-3 border-t border-[#f0ece4] flex items-center justify-between">
                        ${modalidadBadge}
                        <span class="text-[#88CAFC] opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </span>
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

    document.getElementById("totalCount").textContent = CARRERAS.length;
    document.getElementById("searchInput").addEventListener("input", e => {
        state.search = e.target.value;
        render();
    });

    document.querySelectorAll("[data-filter='tipo']").forEach(btn => {
        btn.addEventListener("click", () => {
            state.tipo = btn.dataset.value;
            document.querySelectorAll("[data-filter='tipo']").forEach(b => {
                b.classList.remove("bg-[#0b1f4a]", "text-white");
                b.classList.add("text-[#1a1a2e66]");
            });
            btn.classList.add("bg-[#0b1f4a]", "text-white");
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
        document.querySelectorAll("[data-filter='tipo']").forEach((b, i) => {
            if (i === 0) {
                b.classList.add("bg-[#0b1f4a]", "text-white");
                b.classList.remove("text-[#1a1a2e66]");
            } else {
                b.classList.remove("bg-[#0b1f4a]", "text-white");
                b.classList.add("text-[#1a1a2e66]");
            }
        });
        render();
    });

    render();
</script>

<?php

get_footer(); // Carga tu footer.php
?>