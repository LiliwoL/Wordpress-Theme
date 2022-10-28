<?php
    /*
        
    */
    
    // Récupération de la chaine de requête utilisée sur cette page
    global $query_string;

    // Complétion de la requête en cours avec une spécification du type de contenu désiré
    $posts = query_posts($query_string.'&post_type=movies');

    // Parocurs et affichage
    if ( have_posts() ) 
        while ( have_posts() ) : 
            the_post(); 
?>
            <a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
<?php 
        endwhile; // end of the loop. 
?>