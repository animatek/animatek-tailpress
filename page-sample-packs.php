<?php
/**
 * Template Name: Sample Packs
 *
 * Página de sample packs descargables de Animatek.
 *
 * @package Animatek
 */

get_header();
require_once get_theme_file_path( 'inc/animatek-sample-packs-template.php' );
animatek_sample_packs_render_page();
get_footer();
