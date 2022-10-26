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
