<?php
/**
 * Plugin Name: Admin Panel Plugin
 * Plugin URI: https://example.com
 * Description: Voegt een 'Administratie' knop toe aan het admin-menu en toont een eenvoudige administratiepagina met enkele beheertaken, waaronder het verwijderen van berichten.
 * Version: 1.0
 * Author: Jouw Naam
 * Author URI: https://example.com
 * License: GPLv2 or later
 */

// Voorkom directe toegang.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Voeg de 'Administratie' knop toe aan het admin menu.
add_action( 'admin_menu', 'app_add_admin_menu' );

function app_add_admin_menu() {
    add_menu_page(
        __( 'Administratie', 'admin-panel-plugin' ), // Titel van de pagina.
        __( 'Administratie', 'admin-panel-plugin' ), // Naam van het menu item.
        'manage_options', // Vereiste bevoegdheid voor de gebruiker.
        'admin_panel_page', // Slug (unieke naam voor de pagina).
        'app_admin_page_content', // Callback functie voor het tonen van inhoud.
        'dashicons-admin-generic', // Icoon voor het menu-item.
        6 // Positie in het menu.
    );
}

// Inhoud van de administratiepagina.
function app_admin_page_content() {
    ?>
    <div class="wrap">
        <!-- Weergeven van systeeminformatie -->
        <h2><?php esc_html_e( 'Systeeminformatie', 'admin-panel-plugin' ); ?></h2>
        <ul>
            <li><strong><?php esc_html_e( 'WordPress Versie:', 'admin-panel-plugin' ); ?></strong> <?php echo get_bloginfo( 'version' ); ?></li>
            <li><strong><?php esc_html_e( 'PHP Versie:', 'admin-panel-plugin' ); ?></strong> <?php echo phpversion(); ?></li>
            <li><strong><?php esc_html_e( 'Website URL:', 'admin-panel-plugin' ); ?></strong> <?php echo get_site_url(); ?></li>
        </ul>

        <!-- Lijst van Berichten -->
        <h2><?php esc_html_e( 'Lijst van Berichten', 'admin-panel-plugin' ); ?></h2>
        <?php
        // Haal alle berichten op (gebruiker kan deze berichten verwijderen)
        $args = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1, // Alle berichten ophalen
        );
        $posts = get_posts( $args );

        if ( ! empty( $posts ) ) {
            echo '<table class="wp-list-table widefat fixed striped posts">';
            echo '<thead><tr><th>' . esc_html__( 'ID', 'admin-panel-plugin' ) . '</th><th>' . esc_html__( 'Titel', 'admin-panel-plugin' ) . '</th><th>' . esc_html__( 'Actie', 'admin-panel-plugin' ) . '</th></tr></thead>';
            echo '<tbody>';
            foreach ( $posts as $post ) {
                echo '<tr>';
                echo '<td>' . esc_html( $post->ID ) . '</td>';
                echo '<td>' . esc_html( $post->post_title ) . '</td>';
                echo '<td><form method="post" onsubmit="return confirm(\'' . esc_js( sprintf( __('Weet je zeker dat je bericht %d wilt verwijderen?', 'admin-panel-plugin'), $post->ID ) ) . '\');">
                        <input type="hidden" name="post_id" value="' . esc_attr( $post->ID ) . '">
                        <input type="submit" name="delete_post" value="' . esc_html__( 'Verwijder', 'admin-panel-plugin' ) . '">
                      </form></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>' . esc_html__( 'Er zijn geen berichten gevonden.', 'admin-panel-plugin' ) . '</p>';
        }

        // Verwerken van het formulier om berichten te verwijderen
        if ( isset( $_POST['delete_post'] ) && isset( $_POST['post_id'] ) ) {
            // Beveiligingscontrole om te verifiëren dat de gebruiker de juiste rechten heeft
            if ( ! current_user_can( 'delete_posts' ) ) {
                echo '<p>' . esc_html__( 'Je hebt geen toestemming om berichten te verwijderen.', 'admin-panel-plugin' ) . '</p>';
                return;
            }

            // Verkrijg het bericht-ID en controleer of het bericht bestaat
            $post_id = intval( $_POST['post_id'] );
            $post = get_post( $post_id );

            if ( $post && $post->post_type === 'post' ) {
                // Verwijder het bericht
                wp_delete_post( $post_id, true ); // De tweede parameter is true voor definitief verwijderen (niet in de prullenbak)

                echo '<p>' . esc_html__( 'Het bericht is succesvol verwijderd.', 'admin-panel-plugin' ) . '</p>';
            } else {
                echo '<p>' . esc_html__( 'Ongeldig bericht-ID of bericht niet gevonden.', 'admin-panel-plugin' ) . '</p>';
            }
        }
        ?>
    </div>
    <?php
}
