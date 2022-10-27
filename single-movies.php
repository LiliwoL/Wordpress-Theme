<?php

    // Affichage du header
    get_header();

?>

<div class="col-10">
    <?php
        // Afficher le contenu du Film
        
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
</div>

<?php

// Affichage sidebar
get_sidebar();


// footer
get_footer();