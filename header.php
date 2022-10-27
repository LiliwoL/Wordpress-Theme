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
            <a href="" title="">
                <img src="" alt=""/>
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