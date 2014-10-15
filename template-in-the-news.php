<?php
/*
Template Name: In the News
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
			</div>
		</div><!-- .entry-content -->
	</div>

<?php endwhile; ?>

<?php
$posts = get_posts(array(
	'numberposts' => 50,
	'post_type' => 'external-news-link'
));

if($posts)
{
	echo '<ul id="external-news">';

	foreach($posts as $post) {
		//produced using advanced custom fields plugin
		//see code example at http://www.advancedcustomfields.com/resources/getting-started/code-examples/
		$title_of_the_article = get_the_title($post->ID);
		$link_url = get_field('link_url');
		$author_of_the_article = get_field('author_of_the_article');
		if (isset($author_of_the_article)) {
			$author_of_the_article = 'By <strong>'. $author_of_the_article .'</strong>&nbsp; | &nbsp;';
		}

		$name_of_the_publication = get_field('name_of_the_publication');
		if (isset($name_of_the_publication)) {
			$name_of_the_publication = '<strong>'. $name_of_the_publication .'</strong>&nbsp; | &nbsp;';
		}

		$date_this_article_was_published = get_field('date_this_article_was_published');
		$unix_timestamp = strtotime($date_this_article_was_published);
		//$human_readable_date = date("F j",$unix_timestamp) .'<sup>'. date("S",$unix_timestamp) .'</sup> '. date("Y",$unix_timestamp);
		$human_readable_date = date("F j,",$unix_timestamp) .' '. date("Y",$unix_timestamp);

		echo '<li class="external-news-item">
				<a class="external-news-link" href="' . $link_url . '">' . $title_of_the_article . '</a>
				<br/>'.
				$name_of_the_publication . ' '. $human_readable_date .'
			 </li>';
	}

	echo '</ul>';
}
?>

</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
