<?php

    // Affichage du header
    get_header();

?>

<div class="col-10">
    <?php
        // La requête a déjà été faite

        // Affichage du titre
        echo '<h1>' . get_the_title() . '</h1>';

        // Affichage de l'image mise en avant
        // the_post_thumbnail();

        // Affichage du contenu
        the_content();
    ?>
</div>

<?php

// Affichage sidebar
get_sidebar();


// footer
get_footer();