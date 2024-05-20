<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'font-awesome','simple-line-icons','oceanwp-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

//*commande*//
// Démarrer la session avant tout en utilisant le hook 'init'
function start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'start_session', 1);

// Fonction pour afficher la quantité actuelle
function display_quantity($fruit) {
    return isset($_SESSION[$fruit]) ? $_SESSION[$fruit] : 0;
}

// Shortcodes pour afficher la quantité
add_shortcode('fraisedisplay', function() {
    return display_quantity('fraise');
});

add_shortcode('pamplemoussedisplay', function() {
    return display_quantity('pamplemousse');
});

add_shortcode('framboisedisplay', function() {
    return display_quantity('framboise');
});

add_shortcode('citrondisplay', function() {
    return display_quantity('citron');
});

// Fonction pour gérer l'action du formulaire
function handle_fruit_action() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fruits = ['fraise', 'pamplemousse', 'framboise', 'citron'];
        foreach ($fruits as $fruit) {
            if (isset($_POST[$fruit . '-action'])) {
                $action = $_POST[$fruit . '-action'];
                if (!isset($_SESSION[$fruit])) {
                    $_SESSION[$fruit] = 0;
                }
                if ($action == 'increase') {
                    $_SESSION[$fruit]++;
                } elseif ($action == 'decrease' && $_SESSION[$fruit] > 0) {
                    $_SESSION[$fruit]--;
                }
                break; // Un seul fruit traité à la fois
            }
        }
    }
}
add_action('init', 'handle_fruit_action');

