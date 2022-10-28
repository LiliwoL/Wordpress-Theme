<?php
    /*
        Page d'affichage des genres
    */

    // Affichage du header
    get_header();



    // Récupération de la chaine de requête utilisée sur cette page
    global $query_string;

    // Complétion de la requête en cours avec une spécification du type de contenu désiré
    $posts = query_posts($query_string.'&post_type=movies');

?>

<div class="col-10">

    <div class="titles">
        <h2>
            <?= 
                // Affichage de la description du tag en cours
                tag_description();
            ?>
        </h2>
    </div>

    <div>
        <?php
        // On va récupérer le tag en cours
            //var_dump(get_queried_object());
            $tag = get_queried_object();

            // Parcours et affichage
            if ( have_posts() ) :
                echo "Liste des films de " . $tag->name;
                echo '<br><br><hr>';
                while ( have_posts() ) : 
                    the_post(); 
        ?>
                    <a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
        <?php 
                endwhile; // end of the loop.
            endif;
        ?>
    </div>
</div>

<?php

// Affichage sidebar
get_sidebar();


// footer
get_footer();