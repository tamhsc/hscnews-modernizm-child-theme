<?php get_header(); ?>

<div id="content" class="columns col10">
<?php while ( have_posts() ) : the_post(); ?>

	<div class="post column col10">
		<div class="entry-content">
			<div class="entry-text">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<br/>
				<?php the_content(); ?>
			</div>
		</div><!-- .entry-content -->
	</div>

<?php endwhile; ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
