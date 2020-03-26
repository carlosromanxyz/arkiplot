<?php

// Register Custom Post Type
function custom_post_type_servicio() {

	$labels = array(
		'name'                  => _x( 'Servicio', 'Post Type General Name', 'arkiplot' ),
		'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'arkiplot' ),
		'menu_name'             => __( 'Servicios', 'arkiplot' ),
		'name_admin_bar'        => __( 'Servicio', 'arkiplot' ),
		'archives'              => __( 'Todos los servicios', 'arkiplot' ),
		'attributes'            => __( 'Atributos del servicio', 'arkiplot' ),
		'parent_item_colon'     => __( 'Servicio principal', 'arkiplot' ),
		'all_items'             => __( 'Todos los servicios', 'arkiplot' ),
		'add_new_item'          => __( 'Añadir nuevo servicios', 'arkiplot' ),
		'add_new'               => __( 'Añadir nuevo', 'arkiplot' ),
		'new_item'              => __( 'Añadir nuevo servicio', 'arkiplot' ),
		'edit_item'             => __( 'Editar servicio', 'arkiplot' ),
		'update_item'           => __( 'Actualizar servicio', 'arkiplot' ),
		'view_item'             => __( 'Ver servicio', 'arkiplot' ),
		'view_items'            => __( 'Ver servicios', 'arkiplot' ),
		'search_items'          => __( 'Buscar servicios', 'arkiplot' ),
		'not_found'             => __( 'Nada encontrado', 'arkiplot' ),
		'not_found_in_trash'    => __( 'Nada encontrado en la Papelera', 'arkiplot' ),
		'featured_image'        => __( 'Imagen del servicio', 'arkiplot' ),
		'set_featured_image'    => __( 'Indicar como imagen para el servicio', 'arkiplot' ),
		'remove_featured_image' => __( 'Quitar imagen del servicio', 'arkiplot' ),
		'use_featured_image'    => __( 'Usar como imagen para el servicio', 'arkiplot' ),
		'insert_into_item'      => __( 'Insertar en el servicio', 'arkiplot' ),
		'uploaded_to_this_item' => __( 'Subido a este servicio', 'arkiplot' ),
		'items_list'            => __( 'Lista de servicios', 'arkiplot' ),
		'items_list_navigation' => __( 'Navegación de la lista de servicios', 'arkiplot' ),
		'filter_items_list'     => __( 'Filtrar lista de servicios', 'arkiplot' ),
	);
	$args = array(
		'label'                 => __( 'Servicio', 'arkiplot' ),
		'description'           => __( 'Servicios provistos por ARKIPLOT', 'arkiplot' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-excerpt-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'servicio', $args );

}
add_action( 'init', 'custom_post_type_servicio', 0 );

// Register Custom Post Type
function custom_post_type_instrucciones() {

	if(current_user_can( 'administrator' )) :
		$show_in_admin_bar = true;
		$show_in_menu = true;
	else :
		$show_in_admin_bar = false;
		$show_in_menu = false;
	endif;

	$labels = array(
		'name'                  => _x( 'Instrucciones', 'Post Type General Name', 'arkiplot' ),
		'singular_name'         => _x( 'Instrucción', 'Post Type Singular Name', 'arkiplot' ),
		'menu_name'             => __( 'Instrucciones', 'arkiplot' ),
		'name_admin_bar'        => __( 'Instrucción', 'arkiplot' ),
		'archives'              => __( 'Todas las instrucciones', 'arkiplot' ),
		'attributes'            => __( 'Item Attributes', 'arkiplot' ),
		'parent_item_colon'     => __( 'Parent Item:', 'arkiplot' ),
		'all_items'             => __( 'Todas las instrucciones', 'arkiplot' ),
		'add_new_item'          => __( 'Añadir nueva instrucción', 'arkiplot' ),
		'add_new'               => __( 'Añadir nueva', 'arkiplot' ),
		'new_item'              => __( 'Nueva instrucción', 'arkiplot' ),
		'edit_item'             => __( 'Editar instrucción', 'arkiplot' ),
		'update_item'           => __( 'Actualizar instrucción', 'arkiplot' ),
		'view_item'             => __( 'Ver instrucción', 'arkiplot' ),
		'view_items'            => __( 'Ver instrucciones', 'arkiplot' ),
		'search_items'          => __( 'Buscar instrucciones', 'arkiplot' ),
		'not_found'             => __( 'Nada encontrado', 'arkiplot' ),
		'not_found_in_trash'    => __( 'Nada encontrado en la Papelera', 'arkiplot' ),
		'featured_image'        => __( 'Featured Image', 'arkiplot' ),
		'set_featured_image'    => __( 'Set featured image', 'arkiplot' ),
		'remove_featured_image' => __( 'Remove featured image', 'arkiplot' ),
		'use_featured_image'    => __( 'Use as featured image', 'arkiplot' ),
		'insert_into_item'      => __( 'Insertar en la instrucción', 'arkiplot' ),
		'uploaded_to_this_item' => __( 'Subido a esta instrucción', 'arkiplot' ),
		'items_list'            => __( 'Lista de instrucciones', 'arkiplot' ),
		'items_list_navigation' => __( 'Navegación por la lista de instrucciones', 'arkiplot' ),
		'filter_items_list'     => __( 'Filtrar lista de instrucciones', 'arkiplot' ),
	);
	$args = array(
		'label'                 => __( 'Instrucción', 'arkiplot' ),
		'description'           => __( 'Instrucciones para manejar el sitio', 'arkiplot' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'seccion' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => $show_in_menu,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => $show_in_admin_bar,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'instruccion', $args );

}
add_action( 'init', 'custom_post_type_instrucciones', 0 );