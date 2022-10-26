<?php

/*
	Fonctions spécifiques au thème enfant
*/


// Ajout du CSS parent
add_action( 'wp_enqueue_scripts', 'theme_enqueue_parent_style');

function theme_enqueue_parent_style()
{
	// On ajoute un style à ceux déjà en place
	wp_enqueue_style('parent-style', get_template_directory_uri() . "/style.css");

	// On ajoute Bootstrap
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . "/bootstrap.min.css");
}

// ****************************************

// Ajout des emplacements de menu
function eni_menus()
{
	// Un tableau qui contient les infos sur les emplacements à créer
	$locations = array(
		'primary' 	=> __('Menu principal', 'eni'),
		'secondary' => __('Menu secondaire', 'eni'),
		'footer' 	=> __('Menu bas de page', 'eni')
	);

	// On donne à wordpress le tableau des emplacements de menu
	register_nav_menus( $locations );
}

add_action ('after_setup_theme', 'eni_menus');


// ************************************************

/**
 * Pour afficher les derniers articles
 */
function display_last_articles()
{
	echo '<h2>Liste des derniers articles</h2>';

        // Afficher la liste des contenus (posts)
        // Instance de WP_Query
        // https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
        $args = array(
            'order'             => 'ASC',
            'orderby'           => 'date',
            'posts_per_page'    => 5
        );
        $query = new WP_Query( $args );
        
        // Résultats?
        if ($query->have_posts())
        {        
            // Parcours des contenus
            while ( $query->have_posts() )
            {
                // Récupère le post en cours
                $query->the_post();

                // https://getbootstrap.com/docs/5.2/components/card/

                echo '<div class="card mb-3" style="width: 18rem;">';
                    // Lien
                    echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';

                        // Affiche
                        echo '<img src="' . get_the_post_thumbnail_url() . '" 
                            class="card-img-top" alt="' . get_the_title() . '">';

                        echo '<div class="card-body">';
                            // Titre
                            echo '<h5 class="card-title">' . get_the_title() . '</h5>';
                        echo '</div>';
                                
                    // Lien
                    echo '</a>';
                echo '</div>';
            }
        
        }else{
            echo "Aucun contenu à afficher";
        }
}