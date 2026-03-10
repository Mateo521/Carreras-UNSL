<?php
function unsl_registrar_cpt_taxonomias() {


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
        'rewrite'            => array( 'slug' => 'carreras' ), 
        'capability_type'    => 'post',
        'has_archive'        => true, 
        'hierarchical'       => false,
        'menu_position'      => 5, 
        'menu_icon'          => 'dashicons-welcome-learn-more', 

        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true 
    );

    register_post_type( 'carrera', $args_carrera );


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
    register_taxonomy( 'nivel', array( 'carrera' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_nivel,
        'show_ui'           => true,
        'show_admin_column' => true, 
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'nivel' ),
        'show_in_rest'      => true
    ));


    $labels_facultad = array(
        'name'              => 'Facultades',
        'singular_name'     => 'Facultad',
        'menu_name'         => 'Facultades',
    );
    register_taxonomy( 'facultad', array( 'carrera' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_facultad,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'facultad' ),
        'show_in_rest'      => true
    ));

    $labels_sede = array(
        'name'              => 'Sedes',
        'singular_name'     => 'Sede',
        'menu_name'         => 'Sedes',
    );
    register_taxonomy( 'sede', array( 'carrera' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_sede,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'sede' ),
        'show_in_rest'      => true
    ));


    $labels_modalidad = array(
        'name'              => 'Modalidades',
        'singular_name'     => 'Modalidad',
        'menu_name'         => 'Modalidades',
    );
    register_taxonomy( 'modalidad', array( 'carrera' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_modalidad,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'modalidad' ),
        'show_in_rest'      => true
    ));
}

add_action( 'init', 'unsl_registrar_cpt_taxonomias', 0 );