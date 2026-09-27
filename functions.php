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
        'rewrite'           => array('slug' => 'unidad-academica'),  
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









add_action( 'template_redirect', 'unsl_legacy_url_redirects' );

function unsl_legacy_url_redirects() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $path = parse_url( $request_uri, PHP_URL_PATH );
    $path = rtrim( $path, '/' );

    $path = preg_replace('#(/page)?/\d+$#i', '', $path);

   
    $redirects = [
        '/facultades'                 => '/unidades-academicas/',
        
        // Facultades 
        '/facultades/fqbyf'           => '/unidad-academica/fqbyf/',
        '/facultades/fcfmyn'          => '/unidad-academica/fcfmyn/',
        '/facultades/fica'            => '/unidad-academica/fica/',
        '/facultades/fcejs'           => '/unidad-academica/fcejs/',
        '/facultades/fch'             => '/unidad-academica/fch/',
        '/facultades/fapsi'           => '/unidad-academica/fapsi/',
        '/facultades/fcs'             => '/unidad-academica/fcs/',
        '/facultades/ftu'             => '/unidad-academica/ftu/',
        '/facultades/ipau'            => '/unidad-academica/ipau/',

        // Sedes
        '/sedes/san-luis'             => '/carreras/?sede=san-luis',
        '/sedes/merlo'                => '/carreras/?sede=merlo',
        '/sedes/villa-mercedes'       => '/carreras/?sede=villa-mercedes',

        // Tipos de carrera
        '/tipo-carrera'               => '/carreras/',
        '/tipo-carrera/licenciaturas' => '/carreras/?tipo-de-profesion=licenciatura',
        '/tipo-carrera/ingenierias'   => '/carreras/?tipo-de-profesion=ingenieria',
        '/tipo-carrera/profesorados'  => '/carreras/?tipo-de-profesion=profesorado',
        '/tipo-carrera/tecnicaturas'  => '/carreras/?tipo-de-profesion=tecnicatura',

        // Páginas sueltas
        '/pages/preinscripcion'       => '/preinscripcion/',
        '/preinscripcion-online'      => '/preinscripcion/'  
    ];

    if ( array_key_exists( $path, $redirects ) ) {
        wp_redirect( home_url( $redirects[ $path ] ), 301 );
        exit;
    }
}







add_action('rest_api_init', function () {
    register_rest_field('carrera', 'tipo_nivel', array(
        'get_callback' => function ($carrera_arr) {

            $terminos = wp_get_post_terms($carrera_arr['id'], 'nivel');

            if (!empty($terminos) && !is_wp_error($terminos)) {

                return strtolower($terminos[0]->name);
            }



            return 'general';
        }
    ));
});

add_filter( 'wpseo_metadesc', 'dinamizar_meta_desc_carreras' );

function dinamizar_meta_desc_carreras( $desc ) {

    if ( is_singular( 'carrera' ) ) { 
        $titulo_otorgado = get_field('titulo_otorgado') ?: get_the_title(); //
        $duracion = get_field('duracion_carrera') ?: 'duración no especificada'; 
        

        $nueva_desc = "Estudiá para ser " . esc_attr($titulo_otorgado) . " en la UNSL. Formación de " . esc_attr($duracion) . ". Conocé los alcances del título, modalidad y el plan de estudios completo.";
        

        return wp_trim_words( $nueva_desc, 25, '...' );
    }
    return $desc;
}




