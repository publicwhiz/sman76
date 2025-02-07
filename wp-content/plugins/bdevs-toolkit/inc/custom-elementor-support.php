<?php

if (!defined('ABSPATH')) exit;

//Upload SVG file
function bdevs_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'bdevs_mime_types', 10, 1);


// Upload SVG for Elementor
function bdevs_unfiltered_files_upload()
{

    //if exists, assign to $cpt_support var
    $cpt_support = get_option('elementor_unfiltered_files_upload');

    //check if option DOESN'T exist in db
    if (!$cpt_support) {
        $cpt_support = '1'; //create string value default to enable upload svg
        update_option('elementor_unfiltered_files_upload', $cpt_support); //write it to the database
    }
}
add_action('elementor/init', 'bdevs_unfiltered_files_upload');

// Elementor support
function bdevs_elementor_opton_updated()
{
    $color = get_option('elementor_disable_color_schemes');
    if (!$color) {
        update_option('elementor_disable_color_schemes', 'yes');
    }
    $typography = get_option('elementor_disable_typography_schemes');
    if (!$typography) {
        update_option('elementor_disable_typography_schemes', 'yes');
    }
    $svg_icon = get_option('elementor_experiment-e_font_icon_svg');
    if (!$svg_icon) {
        update_option('elementor_experiment-e_font_icon_svg', 'inactive');
    }
    $bdevs_cpt = get_option('elementor_cpt_support') ? get_option('elementor_cpt_support') : array();
    $bdevs_cpt = array_merge($bdevs_cpt, array('post', 'page', 'bdevs-services', 'bdevs-portfolio'));
    update_option('elementor_cpt_support', $bdevs_cpt);
}
add_action('elementor/init', 'bdevs_elementor_opton_updated');
