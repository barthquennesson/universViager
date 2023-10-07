<?php

function universViagers_supports()
{
    add_theme_support( 'post-thumbnails' );
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    wp_enqueue_style( 'universViagers', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'universViagers', get_template_directory_uri() . '/js/scripts.js');
}

function universViagers_register_assets()   
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
    
}


function universViagers_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

function universViagers_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}



function my_custom_acf_save_post($post_id) {

    if ($post_id && strpos($_POST['_acf_nonce'], 'acf-save-post') !== false) {

        $field1_value = get_field('type_de_bien', $post_id);
        $field2_value = get_field('region', $post_id);
        $field3_value = get_field('valeur_estimee', $post_id);
        $field4_value = get_field('votre_age', $post_id);
        $field5_value = get_field('nom', $post_id);
        $field6_value = get_field('prenom', $post_id);
        $field7_value = get_field('e-mail', $post_id);
        $field8_value = get_field('telephone', $post_id);


        $cpt_data = array(
            'post_title' => 'Formulaire estimation viager', 
            'post_type' => 'form_estimation', 
            'post_status' => 'publish',
        );


        $new_cpt_id = wp_insert_post($cpt_data);

        if (!is_wp_error($new_cpt_id)) {

            update_field('type_de_bien', $field1_value, $new_cpt_id);
            update_field('region', $field2_value, $new_cpt_id);
            update_field('valeur_estimee', $field3_value, $new_cpt_id);
            update_field('votre_age', $field4_value, $new_cpt_id);
            update_field('nom', $field5_value, $new_cpt_id);
            update_field('prenom', $field6_value, $new_cpt_id);
            update_field('e-mail', $field7_value, $new_cpt_id);
            update_field('telephone', $field8_value, $new_cpt_id);

 
        }
    }
}

require('fpdf.php'); 
function generate_pdf_function($cpt_id) {
    $pdf = new FPDF();

    $pdf->AddPage();

    $field1_value = get_field('type_de_bien', $post_id);
        $field2_value = get_field('region', $post_id);
        $field3_value = get_field('valeur_estimee', $post_id);
        $field4_value = get_field('votre_age', $post_id);
        $field5_value = get_field('nom', $post_id);
        $field6_value = get_field('prenom', $post_id);
        $field7_value = get_field('e-mail', $post_id);
        $field8_value = get_field('telephone', $post_id);

    $pdf->SetFont('Arial', 'B', 16);

    $pdf->Cell(40, 10, 'Type de bien : ' . $field1_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Région : ' . $field2_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Valeur estimée : ' . $field3_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Votre âge : ' . $field4_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Nom : ' . $field5_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Prénom : ' . $field6_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'E-mail : ' . $field7_value);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Téléphone : ' . $field8_value);


    $pdf_filename = 'estimation.pdf';
    $pdf->Output($pdf_filename, 'F');

    

    update_field('pdf_file', $pdf_filename, $cpt_id);
    unlink($pdf_filename);


    exit();
}

function my_custom_acf_save_post2($post_id) {

    if ($post_id && strpos($_POST['_acf_nonce'], 'acf-save-post') !== false) {

        $field1_value = get_field('type_de_bien', $post_id);
        $field2_value = get_field('region', $post_id);
        $field3_value = get_field('valeur_estimee', $post_id);
        $field4_value = get_field('votre_age', $post_id);
        $field5_value = get_field('nom', $post_id);
        $field6_value = get_field('prenom', $post_id);
        $field7_value = get_field('e-mail', $post_id);
        $field8_value = get_field('telephone', $post_id);


        $cpt_data = array(
            'post_title' => 'Formulaire estimation viager', 
            'post_type' => 'modele_pdf', 
            'post_status' => 'publish',
        );


        $new_cpt_id = wp_insert_post($cpt_data);

        if (!is_wp_error($new_cpt_id)) {

            update_field('type_de_bien', $field1_value, $new_cpt_id);
            update_field('region', $field2_value, $new_cpt_id);
            update_field('valeur_estimee', $field3_value, $new_cpt_id);
            update_field('votre_age', $field4_value, $new_cpt_id);
            update_field('nom', $field5_value, $new_cpt_id);
            update_field('prenom', $field6_value, $new_cpt_id);
            update_field('e-mail', $field7_value, $new_cpt_id);
            update_field('telephone', $field8_value, $new_cpt_id);

            generate_pdf_function($new_cpt_id);

        
        }
    }
}



add_action('acf/save_post', 'my_custom_acf_save_post');
add_action('acf/save_post', 'my_custom_acf_save_post2');
add_action('after_setup_theme', 'universViagers_supports');
add_action('wp_enqueue_scripts', 'universViagers_register_assets');
add_filter('nav_menu_css_class', 'universViagers_menu_class');
add_filter('nav_menu_link_attributes', 'universViagers_menu_link_class');
