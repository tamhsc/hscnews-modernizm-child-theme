<?php get_header(); ?>

<div id="content" class="columns col10">


	<div class="post columns col10">
		<div class="entry-content column col6">
			<?php while ( have_posts() ) : the_post(); ?>
			<div <?php post_class(); ?>>
			<?php

			  $single_top = get_post_custom_values("colabs_single_top");
			  if (($single_top[0]!='')||($single_top[0]=='none')){
			  ?>
			  <div class="singleimage">
				<?php

				if ($single_top[0]=='single_video'){
					$embed = colabs_get_embed('colabs_embed',473,296,'widget_video',$post->ID);
					if ($embed!=''){
						echo $embed;

					}
				}elseif($single_top[0]=='single_image'){
					colabs_image('width=641');

				}

				?>
			  </div>
			  <?php }?>
			<div class="entry-text column col5 floatright">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-meta">
					<?php printf( __('%1$s by %2$s', 'colabsthemes'), get_the_date(), get_the_author() ); ?>
				</div>
				<?php
				if ( has_post_format( 'audio' )){
					$attr = array(
							'no' => $post->ID,
							'file' => get_post_meta($post->ID,'colabs_audio_url',true)
							);
					$content = wp_audio_player($attr);
					echo "<div class='audio-player'>".$content."</div>";
				} else if ( has_post_format( 'gallery' )){
					echo do_shortcode('[gallery]');
				} else if(has_post_format( 'quote' )){?>
					<div class="quote">
						<?php echo get_the_content();
						echo '"';
						$qauthor = get_post_meta($post->ID,'colabs_quote_author',true); ?>
					</div>
					<?php if ($qauthor!="") echo "<div class='quote-author'>".$qauthor.'</div>';?>
				<?php } ?>
				<?php if ( !has_post_format( 'gallery' ) && !has_post_format( 'quote' ) ){
					the_content();
				}?>

				<div class="post-detail">
					<?php the_tags('', ', ', ''); ?>
					<a href="#comments" title="Go to comments"><?php comments_number( __('No Comment','colabsthemes'), __('1 Comment','colabsthemes'), __('% Comment','colabsthemes') ); ?></a>
				</div>
				<?php echo colabs_share();?>
			</div>
			<?php endwhile; ?>

			<?php if(get_option('colabs_post_layout') == 'two-col') {
				comments_template( '', true );
			}?>

			<?php colabs_postnav();?>
		</div><!-- .entry-content -->

		<?php if(get_option('colabs_post_layout') == 'three-col') {
			comments_template( '', true );
		} ?>
	</div>

</div>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
