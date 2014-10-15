<div id="sidebar" class="columns col2">

  <?php if(is_active_sidebar('homepg-sidebar') && is_front_page()) : ?>
  <!--begin-->
    <?php dynamic_sidebar('homepg-sidebar'); ?>
  <!--end-->
  <?php endif; ?>

  <?php
  $link = 'http://colorlabsproject.com/';
  if ( colabs_active_sidebar( 'sidebar' ) ) : colabs_sidebar( 'sidebar' ); else: ?>
  <div class="column col2 social">
    <h6><?php _e("Follow Us","colabsthemes"); ?></h6>
    <ul>
      <li><a class="twitter" href="<?php if (get_option("colabs_social_twitter")!=''){ echo get_option("colabs_social_twitter"); }else{ echo 'http://twitter.com/colorlabs'; }?>">Twitter</a></li>
      <li><a class="facebook" href="<?php if (get_option("colabs_social_facebook")!=''){ echo get_option("colabs_social_facebook"); }else{ echo 'http://www.facebook.com/colorlabs'; }?>">Facebook</a></li>
      <li><a class="linkedin" href="<?php if (get_option("colabs_social_linkedin")!=''){ echo get_option("colabs_social_linkedin"); }else{ echo 'http://www.linkedin.com/colorlabs/'; }?>">Linkedin</a></li>
      <li><a class="rss" href="<?php if(get_option("colabs_feed_url") != ''){ echo 'http://feeds.feedburner.com/'.get_option("colabs_feed_url");  }else{ bloginfo("rss2_url"); }?>">RSS</a></li>
    </ul>
  </div><!-- .social -->

  <div class="column col2 widget">
    <h6><?php _e("Recommended Links","colabsthemes"); ?></h6>
    <ul>
      <li><a href="<?php echo $link;?>" target="_blank"><?php _e("Storefront","colabsthemes"); ?></a></li>
      <li><a href="<?php echo $link.'blog';?>" target="_blank"><?php _e("Company Blog","colabsthemes"); ?></a></li>
      <li><a href="<?php echo $link.'themes';?>" target="_blank"><?php _e("Themes","colabsthemes"); ?></a></li>
      <li><a href="<?php echo $link.'showcase';?>" target="_blank"><?php _e("Showcase","colabsthemes"); ?></a></li>
      <li><a href="<?php echo $link.'team';?>" target="_blank"><?php _e("The Team","colabsthemes"); ?></a></li>
      <li><a href="<?php echo $link.'jobs';?>" target="_blank"><?php _e("Grow With Us","colabsthemes"); ?></a></li>
    </ul>
  </div>

  <?php endif; ?>

</div><!-- #sidebar -->
