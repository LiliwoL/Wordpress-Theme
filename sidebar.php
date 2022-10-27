<div class="col-2">

    <?php
        // Appel de la fonction d'affichage des derniers articles
        //display_last_articles();

        // Appel de la fonction d'affichage des derniers films
        if (function_exists('display_last_movies'))
        {
            display_last_movies();
        }
    ?>

</div>