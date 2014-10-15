<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<div id="content" class="columns col10">
<?php while ( have_posts() ) : the_post(); ?>

	<div id="searchPage" class="post columns col10">
		<div class="entry-content column col10">
			<div class="entry-text">
				<h1 class="entry-title"><?php the_title(); ?></h1>
		
				<?php the_content(); ?>
				<script>
				  (function() {
				    var cx = '011688702991608557321:j5nnyrfjjnq';
				    var gcse = document.createElement('script');
				    gcse.type = 'text/javascript';
				    gcse.async = true;
				    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
				        '//www.google.com/cse/cse.js?cx=' + cx;
				    var s = document.getElementsByTagName('script')[0];
				    s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<gcse:search></gcse:search>

			</div>
		</div><!-- .entry-content -->
	</div>

<?php endwhile; ?>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
