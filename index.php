<?php

// Affichage du header
get_header();


// Afficher la liste des contenus (posts)

// Instance de WP_Query
$query = new WP_Query( 'order=DESC AND orderby=date AND posts_per_page=10' );

// Résultats?
if ($query->have_posts())
{

    // Parcours des contenus
    while ( $query->have_posts() )
    {
        // Récupère le post en cours
        $query->the_post();

        // Utiliser les méthodes d'affichage (ici, uniquement le titre des contenus)
        echo '<h2>' . get_the_title() . '</h2>';

        // L'extrait
        echo '<h3>' . get_the_date() . '</h3>';
    }

}else{
    echo "Aucun article dans cette catégorie";
}


// footer
get_footer();