<?php

// Register Custom Taxonomy
function custom_taxonomy_seccion() {

	$labels = array(
		'name'                       => _x( 'Secciones', 'Taxonomy General Name', 'arkiplot' ),
		'singular_name'              => _x( 'Sección', 'Taxonomy Singular Name', 'arkiplot' ),
		'menu_name'                  => __( 'Secciones', 'arkiplot' ),
		'all_items'                  => __( 'Todas las secciones', 'arkiplot' ),
		'parent_item'                => __( 'Sección principal', 'arkiplot' ),
		'parent_item_colon'          => __( 'Sección principal:', 'arkiplot' ),
		'new_item_name'              => __( 'Nombre de la nueva sección', 'arkiplot' ),
		'add_new_item'               => __( 'Añadir nueva sección', 'arkiplot' ),
		'edit_item'                  => __( 'Editar sección', 'arkiplot' ),
		'update_item'                => __( 'Actualizar sección', 'arkiplot' ),
		'view_item'                  => __( 'Ver sección', 'arkiplot' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'arkiplot' ),
		'add_or_remove_items'        => __( 'Añadir o eliminar secciones', 'arkiplot' ),
		'choose_from_most_used'      => __( 'Escoger desde las más utilizadas', 'arkiplot' ),
		'popular_items'              => __( 'Secciones populares', 'arkiplot' ),
		'search_items'               => __( 'Buscar secciones', 'arkiplot' ),
		'not_found'                  => __( 'Nada encontrado', 'arkiplot' ),
		'no_terms'                   => __( 'No hay secciones', 'arkiplot' ),
		'items_list'                 => __( 'Lista de secciones', 'arkiplot' ),
		'items_list_navigation'      => __( 'Navegación por la lista de secciones', 'arkiplot' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'seccion', array( 'instruccion' ), $args );

}
add_action( 'init', 'custom_taxonomy_seccion', 0 );