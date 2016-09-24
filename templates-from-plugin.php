<?php
/*
 * Plugin Name: Templates from plugin
 * Description: Add templates to pages from a plugin
 * Author: Giustino Borzacchiello
 * Author email: giustinob@gmail.com
 *
 */

add_filter( 'theme_page_templates', 'j_add_new_templates' );

function j_add_new_templates( $templates ) {

	$templates[ plugin_dir_path( __FILE__ ) . 'templates/tmp-empty.php' ] = __( 'Empty Template', 'j' );

	return $templates;
}


add_filter( 'template_include', 'j_template_include' );

function j_template_include( $template ) {
	$meta = get_post_meta( get_the_ID() );

	if ( ! empty( $meta['_wp_page_template'][0] ) && $meta['_wp_page_template'][0] !== $template ) {
		return $meta['_wp_page_template'][0];
	}

	return $template;
}