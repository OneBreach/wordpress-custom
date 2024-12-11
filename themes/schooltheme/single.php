<?php
get_header();
?>

<!-- Main Content -->
<div id="main">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <article class="post">
                <header>
                    <div class="title">
                        <!-- De titel van het bericht -->
                        <h2><?php the_title(); ?></h2>
                        <!-- Optioneel: korte beschrijving -->
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="meta">
                        <!-- Publicatiedatum -->
                        <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <!-- Auteur -->
                        <a href="#" class="author">
                            <span class="name"><?php the_author(); ?></span>
                            <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>" />
                        </a>
                    </div>
                </header>

                <!-- Uitgelichte afbeelding -->
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>" class="image featured">
                        <?php the_post_thumbnail('full'); ?>
                    </a>
                <?php endif; ?>

                <!-- Inhoud van het bericht -->
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    else:
        echo '<p>No content found.</p>';
    endif;
    ?>
</div>

<?php
get_footer();
?>