<?php
/**
 * Dynamische footer template voor WordPress.
 */
?>

<section id="footer">
    <ul class="icons">
        <?php if ( get_theme_mod( 'footer_twitter_url' ) ) : ?>
            <li><a href="<?php echo esc_url( get_theme_mod( 'footer_twitter_url' ) ); ?>" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <?php endif; ?>

        <?php if ( get_theme_mod( 'footer_facebook_url' ) ) : ?>
            <li><a href="<?php echo esc_url( get_theme_mod( 'footer_facebook_url' ) ); ?>" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <?php endif; ?>

        <?php if ( get_theme_mod( 'footer_instagram_url' ) ) : ?>
            <li><a href="<?php echo esc_url( get_theme_mod( 'footer_instagram_url' ) ); ?>" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        <?php endif; ?>

        <?php if ( get_theme_mod( 'footer_rss_url' ) ) : ?>
            <li><a href="<?php echo esc_url( get_theme_mod( 'footer_rss_url' ) ); ?>" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
        <?php endif; ?>

        <?php if ( get_theme_mod( 'footer_email' ) ) : ?>
            <li><a href="mailto:<?php echo sanitize_email( get_theme_mod( 'footer_email' ) ); ?>" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        <?php endif; ?>
    </ul>
    <p class="copyright">&copy; <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.</p>
</section>

<?php
