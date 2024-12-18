<?php
get_header();
?>

<!-- Menu -->
<section id="menu">

    <!-- Search -->
    <section>
        <form class="search" method="get" action="#">
            <input type="text" name="query" placeholder="Search" />
        </form>
    </section>

    <!-- Links -->
    <section>
        <ul class="links">
            <li>
                <a href="#">
                    <h3>Lorem ipsum</h3>
                    <p>Feugiat tempus veroeros dolor</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Dolor sit amet</h3>
                    <p>Sed vitae justo condimentum</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Feugiat veroeros</h3>
                    <p>Phasellus sed ultricies mi congue</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Etiam sed consequat</h3>
                    <p>Porta lectus amet ultricies</p>
                </a>
            </li>
        </ul>
    </section>

    <!-- Actions -->
    <section>
        <ul class="actions stacked">
            <li><a href="#" class="button large fit">Log In</a></li>
        </ul>
    </section>

</section>

<!-- Main Content -->
<div id="main">

    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
    ?>
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="meta">
                <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                <a href="#" class="author">
                    <span class="name"><?php the_author(); ?></span>
                    <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>" />
                </a>
            </div>
        </header>
        
        <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>" class="image featured">
            <?php the_post_thumbnail('full'); ?>
        </a>
        <?php endif; ?>
        
        <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
        <footer>
            <ul class="actions">
                <li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
            </ul>
            <ul class="stats">
                <li><a href="#"><?php the_category(', '); ?></a></li>
                <li><a href="#" class="icon solid fa-heart"><?php echo get_comments_number(); ?></a></li>
                <li><a href="#" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
            </ul>
        </footer>
    </article>
    <?php
        endwhile;
    else:
        echo '<p>No posts found.</p>';
    endif;

    // Reset post data
    wp_reset_postdata();
    ?>

    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="" class="disabled button large previous">Previous Page</a></li>
        <li><a href="#" class="button large next">Next Page</a></li>
    </ul>

</div>

<!-- Sidebar -->
<?php get_sidebar(); ?>

<!-- Footer -->
<?php get_footer(); ?>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
