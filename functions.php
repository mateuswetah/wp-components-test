<?php
/**
 * Plugin Name: WP Components Tests
 * Version: 0.0.1
 */

// Safety first
if (!defined('ABSPATH')) {
    exit;
}

// Add a page to the admin menu
function wp_components_test_add_page() {
    add_menu_page(
        'WP Components Test',            // Page title
        'WP Components Test',            // Menu label
        'manage_options',                // Required capability to access this page
        'wp-components-test',            // Page slug
        'wp_components_test_render_page' // Callback function to render the page
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
    echo '<h1>WP Components Test</h1>';
    echo '<p>This is an experimental plugin.</p>';
    echo '<div id="app"></div>';
    echo '</div>';
}

/**
 * Enqueue scripts
 */
function wp_components_test_enqueue_scripts() {
    
    wp_enqueue_script(
        'wp-components-test-scripts', // Script name
        plugins_url('index.js', __FILE__), // Script URL
        array('wp-element', 'wp-components'), // Dependencies
        '0.0.1', // Versão do script
        true // Carregar no rodapé da página
    );
    wp_enqueue_style(
        'wp-components-test-styles', // Style name
        plugins_url('style.css', __FILE__), // Style URL
        array('wp-components'), // Dependencies
        '0.0.1' // Versão do estilo
    );
}
add_action('admin_enqueue_scripts', 'wp_components_test_enqueue_scripts');