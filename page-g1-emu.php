<?php
/**
 * Template Name: G1-Emu
 */
get_header();
require_once get_theme_file_path( 'inc/animatek-g1-emu-template.php' );
animatek_g1_emu_render_page();
get_footer();
