<?php
/**
 * Plugin Name: Admin Panel Plugin
 * Plugin URI: https://example.com
 * Description: Voegt een 'Administratie' knop toe aan het admin-menu en toont een eenvoudige administratiepagina met grafieken en beheertaken.
 * Version: 1.1
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
        __( 'Administratie', 'admin-panel-plugin' ), 
        __( 'Administratie', 'admin-panel-plugin' ), 
        'manage_options', 
        'admin_panel_page', 
        'app_admin_page_content', 
        'dashicons-chart-bar', 
        6
    );
}

// Inhoud van de administratiepagina.
function app_admin_page_content() {
    $published_posts = wp_count_posts()->publish;
    $draft_posts = wp_count_posts()->draft;
    $categories = count( get_categories( array( 'hide_empty' => false ) ) );

    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Administratie Dashboard', 'admin-panel-plugin' ); ?></h1>

        <!-- Statistiekenblok -->
        <div style="display: flex; gap: 20px; margin-bottom: 30px;">
            <div style="flex: 1; background: #f1f1f1; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h2><?php esc_html_e( 'Systeeminformatie', 'admin-panel-plugin' ); ?></h2>
                <ul>
                    <li><strong><?php esc_html_e( 'WordPress Versie:', 'admin-panel-plugin' ); ?></strong> <?php echo get_bloginfo( 'version' ); ?></li>
                    <li><strong><?php esc_html_e( 'PHP Versie:', 'admin-panel-plugin' ); ?></strong> <?php echo phpversion(); ?></li>
                    <li><strong><?php esc_html_e( 'Website URL:', 'admin-panel-plugin' ); ?></strong> <?php echo get_site_url(); ?></li>
                </ul>
            </div>

            <div style="flex: 2; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h2><?php esc_html_e( 'Berichten Statistieken', 'admin-panel-plugin' ); ?></h2>
                <canvas id="postStatsChart" width="250" height="125" style="max-width: 100%; margin: auto;"></canvas>
            </div>
        </div>

        <!-- Lijst van berichten -->
        <h2><?php esc_html_e( 'Lijst van Berichten', 'admin-panel-plugin' ); ?></h2>
        <form method="post">
            <?php
            $args = array(
                'post_type'   => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $posts = get_posts( $args );

            if ( ! empty( $posts ) ) {
                echo '<table class="wp-list-table widefat fixed striped posts">';
                echo '<thead><tr>';
                echo '<th style="width: 5%;"><input type="checkbox" id="select-all"></th>';
                echo '<th style="width: 10%;">' . esc_html__( 'ID', 'admin-panel-plugin' ) . '</th>';
                echo '<th style="width: 60%;">' . esc_html__( 'Titel', 'admin-panel-plugin' ) . '</th>';
                echo '<th style="width: 25%;">' . esc_html__( 'Publicatiedatum', 'admin-panel-plugin' ) . '</th>';
                echo '<th style="width: 25%;">' . esc_html__( 'Acties', 'admin-panel-plugin' ) . '</th>';
                echo '</tr></thead>';
                echo '<tbody>';
                foreach ( $posts as $post ) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="post_ids[]" value="' . esc_attr( $post->ID ) . '"></td>';
                    echo '<td>' . esc_html( $post->ID ) . '</td>';
                    echo '<td>' . esc_html( $post->post_title ) . '</td>';
                    echo '<td>' . esc_html( get_the_date( 'Y-m-d-h-s', $post ) ) . '</td>'; 
                    echo '<td>
                            <form method="post" style="display: inline-block;">
                                <input type="hidden" name="post_id" value="' . esc_attr( $post->ID ) . '">
                                <input type="submit" name="delete_post" value="' . esc_attr__( 'Verwijder', 'admin-panel-plugin' ) . '" class="button button-secondary" onclick="return confirm(\'' . esc_js( __( 'Weet je zeker dat je dit bericht wilt verwijderen?', 'admin-panel-plugin' ) ) . '\');">
                            </form>
                          </td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                // Bulkactie-opties
                ?>
                <div style="margin-top: 10px;">
                    <input type="submit" name="apply_bulk_action" value="<?php esc_attr_e( 'verwijder geselecteerde', 'admin-panel-plugin' ); ?>" class="button button-primary">
                </div>
                <?php
            } else {
                echo '<p>' . esc_html__( 'Er zijn geen berichten gevonden.', 'admin-panel-plugin' ) . '</p>';
            }
            ?>
        </form>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('postStatsChart').getContext('2d');
        const postStatsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Gepubliceerde Berichten', 'Concepten'],
                datasets: [{
                    label: '<?php esc_html_e( 'Berichten Statistieken', 'admin-panel-plugin' ); ?>',
                    data: [<?php echo esc_js( $published_posts ); ?>, <?php echo esc_js( $draft_posts ); ?>],
                    backgroundColor: ['#4CAF50', '#FFC107'],
                    borderColor: ['#4CAF50', '#FFC107'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    </script>

    <script>
        document.getElementById('select-all').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[name="post_ids[]"]');
            for (let checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    </script>
    <?php
}
