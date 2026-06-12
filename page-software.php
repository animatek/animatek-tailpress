<?php
/**
 * Template Name: Software Hub
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-software-hub.php' );
animatek_software_hub_render( 'es' );

get_footer();
