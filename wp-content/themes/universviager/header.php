<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?php acf_form_head(); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <!-- Header Section -->
    <header id="header" class="site-header" role="banner">

        <!-- Banner -->
        <div class="header-banner">
            <div>
                <div>
                    <a href="/">
                        <img src="http://univers-viager.test/wp-content/uploads/2023/10/btn-AlertMail.svg" alt="Icon du bouton créez votre alerte email"/>
                        <p>Créez votre alerte email</p>
                    </a>
                </div>
                <div></div>
                <div>
                    <div>
                        <div>0800 800 310</div>
                    </div>
                    <div>
                        <div>Service & appel<br>gratuits</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- header -->
        <div class="header">
            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php endif; ?>
            </div>
            
            <!-- Navigation Menu -->
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header',
                    'menu_id'        => 'primary-menu',
                    'container'      => 'ul',
                    'container_class' => 'main-navigation',
                ));
                ?>
            </nav>
        </div>
       
    </header>

