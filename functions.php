<?php


function mi_script_header()
{
    wp_enqueue_script(
        'mi-script',
        get_template_directory_uri() . '/js/a11y-toolbar-master/js/a11y-custom.js',
        array(),
        null,
        true
    );

    wp_localize_script('mi-script', 'miThemeData', array(
        'imgAccesibilidad' => get_template_directory_uri() . '/imagenes/accesibilidad-blanco.png'
    ));
}
add_action('wp_enqueue_scripts', 'mi_script_header');



function unsl_registrar_cpt_taxonomias()
{


    $labels_carrera = array(
        'name'                  => 'Carreras',
        'singular_name'         => 'Carrera',
        'menu_name'             => 'Carreras',
        'name_admin_bar'        => 'Carrera',
        'add_new'               => 'Añadir Nueva',
        'add_new_item'          => 'Añadir Nueva Carrera',
        'new_item'              => 'Nueva Carrera',
        'edit_item'             => 'Editar Carrera',
        'view_item'             => 'Ver Carrera',
        'all_items'             => 'Todas las Carreras',
        'search_items'          => 'Buscar Carreras',
        'not_found'             => 'No se encontraron carreras.',
        'not_found_in_trash'    => 'No se encontraron carreras en la papelera.'
    );

    $args_carrera = array(
        'labels'             => $labels_carrera,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'carreras'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',

        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true
    );

    register_post_type('carrera', $args_carrera);


    $labels_nivel = array(
        'name'              => 'Niveles Académicos',
        'singular_name'     => 'Nivel Académico',
        'search_items'      => 'Buscar Niveles',
        'all_items'         => 'Todos los Niveles',
        'edit_item'         => 'Editar Nivel',
        'update_item'       => 'Actualizar Nivel',
        'add_new_item'      => 'Añadir Nuevo Nivel',
        'new_item_name'     => 'Nuevo Nombre de Nivel',
        'menu_name'         => 'Niveles',
    );
    register_taxonomy('nivel', array('carrera'), array(
        'hierarchical'      => true,
        'labels'            => $labels_nivel,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'nivel'),
        'show_in_rest'      => true
    ));


    $labels_facultad = array(
        'name'              => 'Facultades',
        'singular_name'     => 'Facultad',
        'menu_name'         => 'Facultades',
    );
    register_taxonomy('facultad', array('carrera'), array(
        'hierarchical'      => true,
        'labels'            => $labels_facultad,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'facultad'),
        'show_in_rest'      => true
    ));

    $labels_sede = array(
        'name'              => 'Sedes',
        'singular_name'     => 'Sede',
        'menu_name'         => 'Sedes',
    );
    register_taxonomy('sede', array('carrera'), array(
        'hierarchical'      => true,
        'labels'            => $labels_sede,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'sede'),
        'show_in_rest'      => true
    ));


    $labels_modalidad = array(
        'name'              => 'Modalidades',
        'singular_name'     => 'Modalidad',
        'menu_name'         => 'Modalidades',
    );
    register_taxonomy('modalidad', array('carrera'), array(
        'hierarchical'      => true,
        'labels'            => $labels_modalidad,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'modalidad'),
        'show_in_rest'      => true
    ));
}

add_action('init', 'unsl_registrar_cpt_taxonomias', 0);













add_action('init', 'unsl_scraping_e_importacion_directa');

function unsl_scraping_e_importacion_directa()
{
    if (!isset($_GET['ejecutar_scraping']) || $_GET['ejecutar_scraping'] !== 'unsl') {
        return;
    }
    if (!current_user_can('manage_options')) {
        wp_die('Acceso denegado.');
    }

    set_time_limit(0);
    libxml_use_internal_errors(true);

    echo '<div style="font-family: sans-serif; padding: 20px;">';
    echo "<h2>Iniciando Limpieza e Importación...</h2>";
    flush();
    ob_flush();

    $url_base = 'https://carreras.unsl.edu.ar/carreras?limit=9999';
    $response_base = wp_remote_get($url_base, array('timeout' => 60));

    if (is_wp_error($response_base)) wp_die('Error al conectar.');

    $html_base = wp_remote_retrieve_body($response_base);
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html_base);
    $xpath = new DOMXPath($dom);

    $nodos_enlaces = $xpath->query("//div[contains(@class, 'tarjeta-carrera')]/parent::a");
    $enlaces_carreras = [];

    foreach ($nodos_enlaces as $nodo) {
        $enlaces_carreras[] = 'https://carreras.unsl.edu.ar' . $nodo->getAttribute('href');
    }

    $contador_creadas = 0;
    $contador_actualizadas = 0;

    foreach ($enlaces_carreras as $enlace) {

        $response_carrera = wp_remote_get($enlace, array('timeout' => 30));
        if (is_wp_error($response_carrera)) continue;

        $html_carrera = wp_remote_retrieve_body($response_carrera);
        $dom_c = new DOMDocument();
        $dom_c->loadHTML('<?xml encoding="utf-8" ?>' . $html_carrera);
        $xpath_c = new DOMXPath($dom_c);

        $nodo_h1 = $xpath_c->query("//h1")->item(0);
        $nombre = $nodo_h1 ? trim(str_replace('Ciclo de Complementación Curricular:', '', $nodo_h1->nodeValue)) : '';
        if (empty($nombre)) continue;

        $nodo_titulo = $xpath_c->query("//h5[contains(text(), 'Te egresas como:')]//strong")->item(0);
        $titulo_otorgado = $nodo_titulo ? trim($nodo_titulo->nodeValue) : '';


        $titulo_intermedio = '';
        $nodo_curioso = $xpath_c->query("//div[contains(@class, 'alert-primary')]//p")->item(0);




        if ($nodo_curioso) {
            $texto_curioso = trim(strip_tags($nodo_curioso->nodeValue));
            $titulo_limpio = str_ireplace(['Esta carrera posee el titulo intermedio de', 'Esta carrera posee el título intermedio de'], '', $texto_curioso);
            $titulo_intermedio = trim($titulo_limpio);
        }

        $nodo_duracion = $xpath_c->query("//small[contains(text(), 'Duración:')]//b")->item(0);
        $duracion = $nodo_duracion ? trim($nodo_duracion->nodeValue) : '';

        $nodo_sede = $xpath_c->query("//small[contains(text(), 'Sede:')]//b")->item(0);
        $sede = $nodo_sede ? trim($nodo_sede->nodeValue) : '';

        $nodo_tipo = $xpath_c->query("//small[contains(text(), 'Tipo:')]//b")->item(0);
        $tipo = $nodo_tipo ? trim(strtolower($nodo_tipo->nodeValue)) : '';

        $nodo_plan = $xpath_c->query("//a[contains(., 'Plan de estudios')]")->item(0);
        $plan_estudios = $nodo_plan ? $nodo_plan->getAttribute('href') : '';
        if ($plan_estudios && strpos($plan_estudios, 'http') === false) {
            $plan_estudios = 'https://carreras.unsl.edu.ar' . $plan_estudios;
        }

        $nodo_tel = $xpath_c->query("//small[contains(text(), 'Teléfono:')]//a")->item(0);
        $telefono = $nodo_tel ? trim($nodo_tel->nodeValue) : '';

        $nodo_int = $xpath_c->query("//small[contains(text(), 'Interno:')]//b")->item(0);
        $interno = $nodo_int ? trim($nodo_int->nodeValue) : '';

        $nodo_web = $xpath_c->query("//small[contains(text(), 'Sitio web:')]//a")->item(0);
        $sitio_web = $nodo_web ? trim($nodo_web->getAttribute('href')) : '';

        $nodo_ig = $xpath_c->query("//a[contains(@href, 'instagram.com')]")->item(0);
        $instagram = $nodo_ig ? $nodo_ig->getAttribute('href') : '';

        $nodo_fb = $xpath_c->query("//a[contains(@href, 'facebook.com') and not(contains(@href, 'sharer.php'))]")->item(0);
        $facebook = $nodo_fb ? $nodo_fb->getAttribute('href') : '';




        $html_objetivos = '';
        $html_alcances = '';
        $seccion_actual = 'objetivos';


        $nodo_contenido_titulo = $xpath_c->query("//h6[contains(text(), 'Contenido')]")->item(0);
        if ($nodo_contenido_titulo && $nodo_contenido_titulo->parentNode) {
            $hermano = $nodo_contenido_titulo->nextSibling;

            while ($hermano) {
                if ($hermano->nodeName !== 'hr') {
                    $texto_plano = trim($hermano->nodeValue);

                    // Detectamos si el párrafo es un título de "Alcances" o "Perfil"
                    if (stripos($texto_plano, 'alcance') !== false || stripos($texto_plano, 'perfil del egresado') !== false) {
                        $seccion_actual = 'alcances';
                        $hermano = $hermano->nextSibling;
                        continue; // Saltamos este nodo para no imprimir el título basura
                    }

                    // Detectamos si es el título "Objetivos" (para borrarlo)
                    if (stripos($texto_plano, 'objetivo') !== false && strlen($texto_plano) < 60) {
                        $seccion_actual = 'objetivos';
                        $hermano = $hermano->nextSibling;
                        continue;
                    }

                    // Obtenemos el HTML del nodo
                    $raw_html = $dom_c->saveHTML($hermano);

                    // MAGIA: Borramos todos los estilos raros y dejamos solo etiquetas básicas
                    $clean_html = strip_tags($raw_html, '<p><ul><li><ol><br><strong><b><em><i>');
                    // Por si quedó algún atributo style o class pegado en las etiquetas permitidas
                    $clean_html = preg_replace('/(style|class)="[^"]*"/i', '', $clean_html);

                    if (trim($clean_html) !== '') {
                        if ($seccion_actual === 'objetivos') {
                            $html_objetivos .= $clean_html;
                        } else {
                            $html_alcances .= $clean_html;
                        }
                    }
                }
                $hermano = $hermano->nextSibling;
            }
        }



        $materias_por_ano = [];
        $nodos_anios = $xpath_c->query("//div[contains(@class, 'card border box-shadow')]");
        foreach ($nodos_anios as $nodo_anio) {
            $nodo_titulo_anio = $xpath_c->query(".//h5", $nodo_anio)->item(0);
            if ($nodo_titulo_anio) {
                $titulo_ano = $nodo_titulo_anio->nodeValue;
                preg_match('/\d+/', $titulo_ano, $matches);
                $numero_ano = isset($matches[0]) ? (int)$matches[0] : 0;

                if ($numero_ano > 0) {
                    $nodos_li = $xpath_c->query(".//li", $nodo_anio);
                    $materias_tmp = [];
                    foreach ($nodos_li as $li) {
                        $materias_tmp[] = trim($li->nodeValue);
                    }


                    $materias_por_ano["materias_anio_" . $numero_ano] = implode("\r\n", $materias_tmp);
                }
            }
        }


        $post_existente = get_page_by_title($nombre, OBJECT, 'carrera');

        if (!$post_existente) {
            $post_id = wp_insert_post(array(
                'post_title'  => $nombre,
                'post_type'   => 'carrera',
                'post_status' => 'publish',
            ));
            $contador_creadas++;
            echo "<p style='color:green;'> Creada: {$nombre}</p>";
        } else {
            $post_id = $post_existente->ID;
            $contador_actualizadas++;
            echo "<p style='color:blue;'> Actualizada y Limpiada: {$nombre}</p>";
        }
        flush();
        ob_flush();

        if (!is_wp_error($post_id)) {

            if (!empty($tipo)) wp_set_object_terms($post_id, str_replace(['licenciaturas', 'ingenierías', 'tecnicaturas'], ['grado', 'grado', 'pregrado'], $tipo), 'nivel', false);


            $nodo_img_facu = $xpath_c->query("//h1//img")->item(0);
            if ($nodo_img_facu) {
                $src_facu = $nodo_img_facu->getAttribute('src');
                preg_match('/facultades\/([a-z]+)\.(png|jpg|jpeg)/i', $src_facu, $matches_facu);
                if (isset($matches_facu[1])) {
                    wp_set_object_terms($post_id, strtoupper($matches_facu[1]), 'facultad', false);
                }
            }





            if (!empty($sede)) wp_set_object_terms($post_id, str_replace('Villa de Merlo', 'Merlo', $sede), 'sede', false);

            update_field('titulo_otorgado', $titulo_otorgado, $post_id);
            update_field('duracion_carrera', $duracion, $post_id);
            update_field('enlace_plan_estudios', $plan_estudios, $post_id);
            update_field('telefono_contacto', $telefono, $post_id);
            update_field('interno_contacto', $interno, $post_id);
            update_field('sitio_web_contacto', $sitio_web, $post_id);
            update_field('instagram_contacto', $instagram, $post_id);
            update_field('facebook_contacto', $facebook, $post_id);
            update_field('titulo_intermedio', $titulo_intermedio, $post_id);
            update_field('objetivos_carrera', $html_objetivos, $post_id);
            update_field('alcances_titulo', $html_alcances, $post_id);

            for ($i = 1; $i <= 6; $i++) {
                $key = "materias_anio_" . $i;
                if (isset($materias_por_ano[$key])) {
                    update_field($key, $materias_por_ano[$key], $post_id);
                } else {
                    update_field($key, '', $post_id);
                }
            }
        }
        usleep(200000);
    }

    echo "<hr>";
    echo "<h3>¡Proceso de limpieza finalizado con éxito!</h3>";
    echo '<a href="' . admin_url('edit.php?post_type=carrera') . '" style="display:inline-block; padding:10px 20px; background:#0b1f4a; color:white; text-decoration:none; border-radius:5px;">Ir a ver las Carreras</a>';
    echo '</div>';
    exit;
}





/**
 * BOT PARA IMPORTAR CREAR CARRERAS DE POSGRADO DESDE EXCEL
 * Protege las carreras de pregrado y grado.
 * Uso: Visita http://tusitio.com/?importar_posgrados=true
 */
add_action('init', 'unsl_importar_posgrados_excel');
function unsl_importar_posgrados_excel()
{
    if (!isset($_GET['importar_posgrados']) || $_GET['importar_posgrados'] !== 'true') return;
    if (!current_user_can('manage_options')) wp_die('Acceso denegado.');

    $csv_file = get_template_directory() . '/posgrados.csv';
    if (!file_exists($csv_file)) wp_die('No se encontró posgrados.csv en la carpeta del tema.');

    echo '<div style="font-family:sans-serif; padding:20px; max-w-3xl; margin:auto;">';
    echo '<h2 style="color:#0b1f4a;"> Importando Carreras de Posgrado...</h2>';
    echo '<p style="color:#666;">Nota: Se ignorarán estrictamente todas las carreras de Pregrado y Grado para proteger cambios manuales.</p><hr>';
    flush();
    ob_flush();


    $diccionario_facultades = array(
        'FÍSICO MATEMATICAS Y NATURALES' => 'fcfmyn',
        'CIENCIAS HUMANAS' => 'fch',
        'CIENCIAS DE LA SALUD' => 'fcs',
        'TURISMO Y URBANISMO' => 'ftu',
        'INGENIERIA Y CIENCIAS AGROPECUARIAS' => 'fica',
        'ECONÓMICAS, JURÍDICAS Y SOCIALES' => 'fcejs',
        'QUÍMICA, BIOQUÍMICA Y FARMACIA' => 'fqbyf',
        'PSICOLOGÍA' => 'fapsi',
        'INSTITUTO POLITÉCNICO' => 'ipau'
    );

    $handle = fopen($csv_file, "r");
    $header = fgetcsv($handle, 1000, ",");

    $facultad_actual_slug = '';
    $creadas = 0;
    $actualizadas = 0;

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        if (count($data) < 2) continue;

        $nombre_excel = trim($data[0]);
        $nivel_excel = mb_strtoupper(trim($data[1]), 'UTF-8');

        if (empty($nombre_excel) || $nombre_excel === 'CARRERA') continue;

        if (strpos(mb_strtoupper($nombre_excel, 'UTF-8'), 'FACULTAD DE') === 0 || strpos(mb_strtoupper($nombre_excel, 'UTF-8'), 'INSTITUTO') === 0) {
            foreach ($diccionario_facultades as $key => $slug) {
                if (strpos(mb_strtoupper($nombre_excel, 'UTF-8'), $key) !== false) {
                    $facultad_actual_slug = $slug;
                    echo "<br><h4 style='color:#3730a3;'> Entrando a sección: {$nombre_excel} ({$slug})</h4>";
                    break;
                }
            }
            continue;
        }

        if ($nivel_excel !== 'POSGRADO') {
            continue;
        }


        $post_existente = get_page_by_title($nombre_excel, OBJECT, 'carrera');

        if (!$post_existente) {
            $post_id = wp_insert_post(array(
                'post_title'  => $nombre_excel,
                'post_type'   => 'carrera',
                'post_status' => 'publish',
            ));
            $creadas++;
            echo "<p style='color:green; margin:2px 0;'> Creada: <strong>{$nombre_excel}</strong></p>";
        } else {
            $post_id = $post_existente->ID;
            $actualizadas++;
            echo "<p style='color:blue; margin:2px 0;'> Actualizada: <strong>{$nombre_excel}</strong></p>";
        }


        if (!is_wp_error($post_id)) {


            wp_set_object_terms($post_id, 'posgrado', 'nivel', false);
            if (!empty($facultad_actual_slug)) {
                wp_set_object_terms($post_id, strtoupper($facultad_actual_slug), 'facultad', false);
            }


            $ordenanzas = trim($data[2] ?? '') . ' | ' . trim($data[3] ?? '');
            if ($ordenanzas === ' | ') $ordenanzas = '';

            $res_min = trim($data[4] ?? '');
            $coneau = trim($data[5] ?? '');
            $obs = trim($data[6] ?? '');

            update_field('ordenanzas_unsl', $ordenanzas, $post_id);
            update_field('resolucion_ministerial', $res_min, $post_id);
            update_field('resolucion_coneau', $coneau, $post_id);
            update_field('observaciones_academicas', $obs, $post_id);
        }
    }

    fclose($handle);
    echo "<hr><h3 style='color:#0b1f4a;'> ¡Proceso finalizado!</h3>";
    echo "<p>Se crearon: <b>{$creadas}</b> | Se actualizaron: <b>{$actualizadas}</b></p>";
    echo '<a href="' . admin_url('edit.php?post_type=carrera') . '" style="display:inline-block; padding:10px 20px; background:#0b1f4a; color:white; text-decoration:none; border-radius:5px; margin-top:10px;">Ver mis Carreras</a>';
    echo '</div>';
    exit;
}



/*
add_action('init', 'unsl_importar_carreras_desde_json');

function unsl_importar_carreras_desde_json()
{
    if (!isset($_GET['importar_carreras']) || $_GET['importar_carreras'] !== 'secreto') {
        return;
    }
    if (!current_user_can('manage_options')) {
        wp_die('No tienes permisos para ejecutar este script.');
    }
Estructura Institucional


    $json_crudo = '[
        {"nombre":"Doctorado en Ciencias de la Computación","facultad":"FCFMYN","duracion":"5 años","tipo":"posgrado","modalidad":"presencial","sede":"San Luis"},
        {"nombre":"Licenciatura en Psicología","facultad":"FAPSI","duracion":"5 años","tipo":"grado","modalidad":"presencial","sede":"San Luis"}
    ]';


    $carreras = json_decode($json_crudo, true);
    $contador_creadas = 0;

    foreach ($carreras as $carrera) {

        $existe = get_page_by_title($carrera['nombre'], OBJECT, 'carrera');

        if (!$existe) {

            $post_id = wp_insert_post(array(
                'post_title'  => $carrera['nombre'],
                'post_type'   => 'carrera',
                'post_status' => 'publish',
            ));

            if (!is_wp_error($post_id)) {

                wp_set_object_terms($post_id, $carrera['tipo'], 'nivel', false);
                wp_set_object_terms($post_id, $carrera['facultad'], 'facultad', false);


                update_field('duracion_carrera', $carrera['duracion'], $post_id);


                $contador_creadas++;
            }
        }
    }

    echo "<h1>Migración Completada</h1>";
    echo "<p>Se crearon " . $contador_creadas . " carreras nuevas exitosamente.</p>";
    echo "<p>Revisa tu panel de administración.</p>";
    exit;
}
*/
