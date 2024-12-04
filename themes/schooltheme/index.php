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

<!-- Main -->
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
						<!-- De titel van het bericht met een link naar de detailpagina -->
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<!-- De excerpt van het bericht (beschrijving) -->
						<p><?php the_excerpt(); ?></p>
					</div>
					<div class="meta">
						<!-- De publicatiedatum van het bericht -->
						<time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
						<!-- De auteur van het bericht -->
						<a href="#" class="author">
							<span class="name"><?php the_author(); ?></span>
							<!-- Optioneel: voeg een afbeelding toe voor de auteur -->
							<img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>" />
						</a>
					</div>
				</header>
				<!-- De uitgelichte afbeelding van het bericht -->
				<?php if (has_post_thumbnail()): ?>
					<a href="<?php the_permalink(); ?>" class="image featured">
						<?php the_post_thumbnail('full'); ?>
					</a>
				<?php endif; ?>
				<!-- De inhoud van het bericht (alleen als je dat wilt weergeven) -->
				<p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
				<footer>
					<ul class="actions">
						<li><a href="<?php the_permalink(); ?>" class="button large">Continue Reading</a></li>
					</ul>
					<ul class="stats">
						<!-- Optionele tags, categorieën, of andere gegevens die je wilt weergeven -->
						<li><a href="#"><?php the_category(', '); ?></a></li>
						<li><a href="#" class="icon solid fa-heart"><?php echo get_comments_number(); ?></a></li>
						<li><a href="#" class="icon solid fa-comment"><?php echo get_comments_number(); ?></a></li>
					</ul>
				</footer>
			</article>
			<?php
		endwhile;
	else:
		echo '<p>Geen berichten gevonden.</p>';
	endif;

	// Herstel de oorspronkelijke postdata
	wp_reset_postdata();
	?>



	<!-- Pagination -->
	<ul class="actions pagination">
		<li><a href="" class="disabled button large previous">Previous Page</a></li>
		<li><a href="#" class="button large next">Next Page</a></li>
	</ul>

</div>

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

			<!-- Mini Post -->
			<article class="mini-post">
				<header>
					<h3><a href="single.html">Vitae sed condimentum</a></h3>
					<time class="published" datetime="2015-10-20">October 20, 2015</time>
					<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
				</header>
				<a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
			</article>

			<!-- Mini Post -->
			<article class="mini-post">
				<header>
					<h3><a href="single.html">Rutrum neque accumsan</a></h3>
					<time class="published" datetime="2015-10-19">October 19, 2015</time>
					<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
				</header>
				<a href="single.html" class="image"><img src="images/pic05.jpg" alt="" /></a>
			</article>

			<!-- Mini Post -->
			<article class="mini-post">
				<header>
					<h3><a href="single.html">Odio congue mattis</a></h3>
					<time class="published" datetime="2015-10-18">October 18, 2015</time>
					<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
				</header>
				<a href="single.html" class="image"><img src="images/pic06.jpg" alt="" /></a>
			</article>

			<!-- Mini Post -->
			<article class="mini-post">
				<header>
					<h3><a href="single.html">Enim nisl veroeros</a></h3>
					<time class="published" datetime="2015-10-17">October 17, 2015</time>
					<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
				</header>
				<a href="single.html" class="image"><img src="images/pic07.jpg" alt="" /></a>
			</article>

		</div>
	</section>


	<!-- Posts List -->
	<section>
		<ul class="posts">
			<li>
				<article>
					<header>
						<h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
						<time class="published" datetime="2015-10-20">October 20, 2015</time>
					</header>
					<a href="single.html" class="image"><img src="/wp-content/uploads/2024/11/pic03.jpg" alt="" /></a>
				</article>
			</li>
			<li>
				<article>
					<header>
						<h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
						<time class="published" datetime="2015-10-15">October 15, 2015</time>
					</header>
					<a href="single.html" class="image"><img src="/wp-content/uploads/2024/11/pic03.jpg" alt="" /></a>
				</article>
			</li>
			<li>
				<article>
					<header>
						<h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
						<time class="published" datetime="2015-10-10">October 10, 2015</time>
					</header>
					<a href="single.html" class="image"><img src="/wp-content/uploads/2024/11/pic03.jpg" alt="" /></a>
				</article>
			</li>
			<li>
				<article>
					<header>
						<h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
						<time class="published" datetime="2015-10-08">October 8, 2015</time>
					</header>
					<a href="single.html" class="image"><img src="/wp-content/uploads/2024/11/pic03.jpg" alt="" /></a>
				</article>
			</li>
			<li>
				<article>
					<header>
						<h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
						<time class="published" datetime="2015-10-06">October 7, 2015</time>
					</header>
					<a href="single.html" class="image"><img src="/wp-content/uploads/2024/11/pic03.jpg" alt="" /></a>
				</article>
			</li>
		</ul>
	</section>


	<!-- About -->
	<section class="blurb">
		<h2>About</h2>
		<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
			amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.
		</p>
		<ul class="actions">
			<li><a href="#" class="button">Learn More</a></li>
		</ul>
	</section>

	<!-- Footer -->
	<?php
	get_footer();
	?>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	</body>

	</html>