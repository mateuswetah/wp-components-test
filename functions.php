<?php
/**
 * Plugin Name: WP Components Tests
 * Version: 0.0.1
 */

// Safety first
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define this constant as 'VUE' or 'JS' to render different tests
 */
const TEST_WITH = 'JS'; // 'VUE';

// Add a page to the admin menu
function wp_components_test_add_page() {
    add_menu_page(
        'WP Components Test with '. TEST_WITH,            // Page title
        'WP Components Test with '. TEST_WITH,            // Menu label
        'manage_options',                       // Required capability to access this page
        'wp-components-test-js',                   // Page slug
        'wp_components_test_render_page'     // Callback function to render the page
    );
}
add_action('admin_menu', 'wp_components_test_add_page');

/**
 * Callback function to render the page
 *
 * @return void
 */
function wp_components_test_render_page() {
    echo '<div class="wrap">';
    echo '<h1>WP Components Test with ' . TEST_WITH . '</h1>';
    echo '<p>This is an experimental plugin.</p>';
    echo '<div id="app"></div>';
    echo '</div>';
}

/**
 * Enqueue scripts
 */
function wp_components_test_enqueue_scripts() {
    
    if ( TEST_WITH === 'VUE' ) {
        wp_enqueue_script(
            'wp-components-test-vue-scripts', // Script name
            plugins_url('/wp-components-test-vue/dist/entries/index.js', __FILE__), // Script URL
            array('wp-element', 'wp-components'), // Dependencies
            '0.0.1', // Versão do script
            true // Carregar no rodapé da página
        );
        wp_enqueue_style(
            'wp-components-test-vue-styles', // Style name
            plugins_url('/wp-components-test-vue/dist/assets/index.css', __FILE__), // Style URL
            array('wp-components'), // Dependencies
            '0.0.1' // Versão do estilo
        );
    } else {
        wp_enqueue_script(
            'wp-components-test-js-scripts', // Script name
            plugins_url('/wp-components-test-js/index.js', __FILE__), // Script URL
            array('wp-element', 'wp-components'), // Dependencies
            '0.0.1', // Versão do script
            true // Carregar no rodapé da página
        );
        wp_enqueue_style(
            'wp-components-test-js-styles', // Style name
            plugins_url('/wp-components-test-js/style.css', __FILE__), // Style URL
            array('wp-components'), // Dependencies
            '0.0.1' // Versão do estilo
        );
    }
}
add_action('admin_enqueue_scripts', 'wp_components_test_enqueue_scripts');