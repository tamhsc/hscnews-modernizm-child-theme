<?php get_header(); ?>

<div id="content" class="recent-list columns col10">
<div class="column col10">
 <h1><?php dynamictitles();?></h1>
</div>
<?php if ( have_posts() ) {?>
<?php
	$i=1;$count=1;
	while ( have_posts() ) : the_post(); 
	if ($i==1)echo '<div class="row">';
	?>

	<div class="column col3">
		<?php colabs_image('width=235&height=230&play=true') ?>
		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'colabsthemes' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
		<p><?php excerpt(); ?></p>
		<a class="more-link" title="<?php printf( esc_attr__( 'Permalink to %s', 'colabsthemes' ), the_title_attribute( 'echo=0' ) ); ?>" href="<?php the_permalink();?>"><?php _e('Continue Reading','colabsthemes');?>&rarr;</a>
	</div>
	<?php if ($i==3){echo '</div>'; $i=0;}
	$i++;$count++;
	?>
<?php endwhile; ?>
<?php 
if($count%3!= 1){echo '</div>';}?>
<?php }else{ ?>
<div class="column col2">
<?php colabs_no_result();?>
</div>
<?php }?>
<?php the_pagination('', 3, '');?>
<div class="column col10">
	<h3>Additional archives</h3>
	<ul id="additionalArchives">
		<?php wp_get_archives( array( 'type' => 'yearly', 'limit' => 12 ) ); ?>
	</ul>
</div>
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
