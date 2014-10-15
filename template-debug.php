<?php
/*
Template Name: DEBUGGING
*/
?>
<?php get_header(); ?>

<div id="content" class="columns col10">
<?php while ( have_posts() ) : the_post(); ?>

	<div id="searchPage" class="post columns col10">
		<div class="entry-content column col10">
			<div class="entry-text">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php if ( get_option('permalink_structure') ) { echo 'permalinks enabled'; } ?>

				<br/>
				<?php print_r(get_option('permalink_structure')); ?>
				<br/><br/>
				<?php
					//phpinfo();
				?>


			</div>
		</div><!-- .entry-content -->
	</div>

<?php endwhile; ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
