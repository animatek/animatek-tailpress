<?php
/**
 * Template Name: UZZ VCV Rack (EN)
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-ztep-template.php' );
animatek_ztep_vcv_render( 'en' );

get_footer();
