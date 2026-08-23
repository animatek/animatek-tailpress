<?php
/**
 * Template Name: UZZ Max for Live
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-ztep-template.php' );
animatek_ztep_m4l_render( 'es' );

get_footer();
