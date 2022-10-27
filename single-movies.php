<?php

    // Affichage du header
    get_header();

?>

<div class="col-10">
    <?php
        // Afficher le contenu du Film
    ?>

    <div class="row">
        <div class="col-4">
            <div class="image">
                <figure class="poster">
                    <img alt="<?= get_the_title(); ?>" 
                        src="<?= get_the_post_thumbnail_url(); ?>"
                        class="w-100">
                </figure>
            </div>
        </div>

        <div class="col-8">
            <?php
                the_title();

                the_content();
        
                // Debug de tous les champs personnalisés
                //var_dump( get_post_meta( get_the_ID() ) );
        
                // Date de sortie
                //echo '<span>' . get_post_meta( get_the_ID(), 'annee_de_sortie', true ) , '</span>';        
                echo '<span>Année de sortie: ' . get_field( 'annee_de_sortie' ) . '</span>';
        
                // Distribution
                echo '<div>Distribution:<br/>' . get_field('distribution') . '</div>';
        
                // Censure
                // Attention, c'est un tableau!
                echo '<div>Censure: ' . get_field('censure')[0] . '</div>';
            ?>

            <hr/>

            <div>
                <h4>Séances à venir:</h4>
                <?php
                    // https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters

                    // Arguments
                    $args = array(
                        'post_type' => 'seances',
                        'posts_per_page' => 5,
                        
                        // Critère de sélection pour l'id du film affiché
                        'meta_key'   => 'film',
	                    'meta_value' => get_the_ID()
                    );

                    // Requete
                    $query = new WP_Query( $args );

                    // Résultats?
                    if ($query->have_posts())
                    {        
                        // Parcours des contenus
                        while ( $query->have_posts() )
                        {
                            // Récupère le post en cours
                            $query->the_post();

                            // Afficher l'heure
                            echo get_field('date_et_heure_de_debut', get_the_ID());

                            echo "<br>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php

// Affichage sidebar
get_sidebar();


// footer
get_footer();