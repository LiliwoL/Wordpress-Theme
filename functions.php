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
            'order'             => 'DESC',
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

			// Autre méthode (au choix)
			/*
				while ($query->have_posts()) :
					$query->the_post();
					?>
					<div class="card mb-3" style="width: 18rem;">
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
							<img src="<?php the_post_thumbnail_url() ?>" class="card-img-top" alt="<?php the_title() ?>">
							<div class="card-body">
								<h5 class="card-title"><?php the_title() ?></h5>
							</div>
						</a>
					</div>
					<?php
				endwhile;
			*/
        
        }else{
            echo "Aucun contenu à afficher";
        }
}

// ************************************************

/**
 * Pour afficher les derniers films
 */
function display_last_movies()
{
	echo '<h2>Liste des derniers films</h2>';

        // Afficher la liste des contenus (posts)
        // Instance de WP_Query
        // https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
        $args = array(
            'order'             => 'ASC',
            'orderby'           => 'date',
			'post_type'			=> 'movies',
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

			// Autre méthode (au choix)
			/*
				while ($query->have_posts()) :
					$query->the_post();
					?>
					<div class="card mb-3" style="width: 18rem;">
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
							<img src="<?php the_post_thumbnail_url() ?>" class="card-img-top" alt="<?php the_title() ?>">
							<div class="card-body">
								<h5 class="card-title"><?php the_title() ?></h5>
							</div>
						</a>
					</div>
					<?php
				endwhile;
			*/
        
        }else{
            echo "Aucun contenu à afficher";
        }
}

// **************************************

/**
 * Affichage du menu placé dans l'emplacement primary
 */
function display_main_menu()
{
	// https://getbootstrap.com/docs/4.0/components/navbar/

	echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="' . get_bloginfo('url') . '">
				<img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" 
				width="30" height="30" alt="' . get_bloginfo('name') . '">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
	';

	// Arguments du menu à afficher
	$args = array(
		'theme_location' 		=> 'primary',
		'container' 			=> 'div',
		'container_class' 		=> 'collapse navbar-collapse',
		'container_id' 			=> 'navbarNav',

		'items_wrap'           => '<ul class="navbar-nav mr-auto">%3$s</ul>',
		'item_spacing' 			=> 'preserve'
	);

	// Appel la fonction d'affichage
	// https://developer.wordpress.org/reference/functions/wp_nav_menu/
	wp_nav_menu( $args );

	echo '</nav>';
}


// ****************************************

// Pour aider à la rédaction d'un nouveau Content Type
// https://generatewp.com/post-type/

// Création d'un type de contenu Movie
function create_movie_type()
{

	$labels = array(
		'name'                  => _x( 'Films', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Film', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Films', 'text_domain' ),
		'name_admin_bar'        => __( 'Film', 'text_domain' ),
		'archives'              => __( 'Archives des films', 'text_domain' ),
		'attributes'            => __( 'Attributs films', 'text_domain' ),
		'parent_item_colon'     => __( 'Film parent', 'text_domain' ),
		'all_items'             => __( 'Tous les films', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter un film', 'text_domain' ),
		'add_new'               => __( 'Ajouter un film', 'text_domain' ),
		'new_item'              => __( 'Nouveau film', 'text_domain' ),
		'edit_item'             => __( 'Modifier un film', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour', 'text_domain' ),
		'view_item'             => __( 'Voir', 'text_domain' ),
		'view_items'            => __( 'Voir les films', 'text_domain' ),
		'search_items'          => __( 'Chercher un film', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Film', 'text_domain' ),
		'description'           => __( 'Films', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => false,
	);
	register_post_type( 'movies', $args );

}
add_action( 'init', 'create_movie_type', 0 );