<!DOCTYPE HTML>
<html>
    <head>

        <?php 
            // Affichage de la partie head (gérée par Wordress)
            wp_head();
        ?>
        
    </head>

    <body>
        <main>
            <!-- Logo -->
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">
                <img src="http://10.105.0.254/wordpress/wp-content/uploads/2022/10/Thelma_et_Louise-affiche-480x640-1.jpg" alt="" class="w-25"/>
            </a>

            <?php
                // Affichage du menu
                if (function_exists('display_main_menu'))
                {
                    display_main_menu();
                }
            ?>

            <div class="container">
                <div class="row">
                    <!-- Le header s'arrete ici -->