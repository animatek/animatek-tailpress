<?php
/**
 * Template Name: Animatek NME (EN)
 */

get_header();

require_once get_theme_file_path( 'inc/animatek-nme-template.php' );
animatek_nme_render_page( 'en' );

get_footer();
