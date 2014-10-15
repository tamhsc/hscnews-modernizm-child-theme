<?php
/**
 * Plugin Name: TAMHSC In the News widget
 * Description: A widget that displays the TAMHSC in the News content in a sidebar. Built on WPTuts tutorial by Bilal Shaheen: http://wp.tutsplus.com/tutorials/creative-coding/building-custom-wordpress-widgets/
 * Version: 0.1
 * Author: TAMHSC Web team
 * Author URI: http://it.tamhsc.edu
 */


add_action( 'widgets_init', 'my_widget' );


function my_widget() {
	register_widget( 'MY_Widget' );
}

class MY_Widget extends WP_Widget {

	function MY_Widget() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays the TAMHSC in the News content ', 'example') );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'example-widget' );

		$this->WP_Widget( 'example-widget', __('TAMHSC in the News', 'example'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		// Widget output
		$posts = get_posts(array(
			'numberposts' => 4,
			'post_type' => 'external-news-link'
		));

		if($posts)
		{
			echo '
			<div id="tamhsc-in-the-news" class="widget widget_text column col4">
				<h6 class="widget-title">In the News</h6>
				<ul id="external-news">';

			foreach($posts as $post) {
				/*
				custom post type produced using advanced custom fields plugin but their API
				doesnt work in widgets for some reason - so using built in wp get post meta
				function to pull data http://codex.wordpress.org/Function_Reference/get_post_meta
				*/
				$title_of_the_article = get_the_title($post->ID);
				$link_url = get_post_meta( $post->ID, 'link_url', true );
				$author_of_the_article = get_post_meta( $post->ID, 'author_of_the_article', true );
				if (isset($author_of_the_article)) {
					$author_of_the_article = 'By <strong>'. $author_of_the_article .'</strong>&nbsp; | &nbsp;';
				}

				$name_of_the_publication = get_post_meta( $post->ID, 'name_of_the_publication', true );
				if (isset($name_of_the_publication)) {
					$name_of_the_publication = '<strong>'. $name_of_the_publication .'</strong>';
				}

				$date_this_article_was_published = get_post_meta( $post->ID, 'date_this_article_was_published', true );
				$unix_timestamp = strtotime($date_this_article_was_published);
				$human_readable_date = date("F j,",$unix_timestamp) .' '. date("Y",$unix_timestamp);

				echo '<li class="">
								<a class="" href="'. $link_url .'">' . $title_of_the_article . '</a>
								<br/>'.
								$human_readable_date . ' | ' . $name_of_the_publication .
					 		'</li>';
			}

			echo '</ul>
						<a class="more-link" href="https://news.tamhsc.edu/in-the-news/">More HSC in the News →</a>
				</div>';
		}

	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}


	function form( $instance ) {
		// Output admin widget options form
	}


}

?>