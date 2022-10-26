<div class="col-4">
    <?php

        // Afficher la liste des contenus (posts)
        // Instance de WP_Query
        // https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters
        $query = new WP_Query( 'order=DESC & orderby=date & posts_per_page=5' );
        
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
                    echo '<a href="' . get_the_permalink() . '">';

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
            echo "Aucun article dans cette catégorie";
        }
    ?>

</div>