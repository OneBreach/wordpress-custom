<?php if (is_active_sidebar('sidebar-1')) : ?>
    <!-- Sidebar -->
    <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <header>
                <h2>GreenTech Solutions</h2>
                <p>Lorem ipsum</p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">

                <?php
                // Query om de laatste 4 berichten op te halen (mini-posts)
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4, // Aantal mini-posts dat je wilt weergeven
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $query = new WP_Query($args);

                // Loop om de berichten weer te geven
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                ?>
                        <!-- Mini Post -->
                        <article class="mini-post">
                            <header>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                <a href="#" class="author">
                                    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="Author Image" />
                                </a>
                            </header>
                            <!-- Uitgelichte afbeelding -->
                            <a href="<?php the_permalink(); ?>" class="image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <!-- Plaats een placeholder-afbeelding als er geen uitgelichte afbeelding is -->
                                    <img src="http://hello-world.local/wp-content/uploads/2024/12/logo.jpg" alt="Placeholder Image" />
                                <?php endif; ?>
                            </a>
                        </article>

                <?php
                    endwhile;
                else :
                    echo '<p>No mini posts found.</p>';
                endif;

                // Reset de query na de loop
                wp_reset_postdata();
                ?>

            </div>
        </section>

        <!-- Footer Widget -->
        <section class="blurb">
            <h2>About</h2>
            <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
                amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.
            </p>
            <ul class="actions">
                <li><a href="#" class="button">Learn More</a></li>
            </ul>
        </section>

    </section><!-- End Sidebar -->

<?php else : ?>
    <!-- Fallback in case there are no widgets in the sidebar -->
    <section id="sidebar">
        <p>No widgets found! Please add widgets through the WordPress Dashboard.</p>
    </section>
<?php endif; ?>
