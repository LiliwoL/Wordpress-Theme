                <!-- Début du footer -->
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <?php
                        // Affichage du menu footer UNIQUEMENT sur la page d'accueil
                        if (is_front_page())
                        {
                            if (function_exists('display_footer_menu'))
                            {
                                display_footer_menu();
                            }
                        }                        
                    ?>
                </div>
            </div>
        </main>
    </body>
</html>