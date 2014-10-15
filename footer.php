<?php global $colabs_options; ?>
<div id="footer" class="columns col12">
  <?php
    wp_reset_postdata();
    $cat_featured=get_option('colabs_cat_featured');
    if($cat_featured=='')$cat_featured=1;
    if (!is_home() || !is_front_page()){colabs_latest_post(6,'col12');}else{
    ?>
  <div class="featured-head column col12">
    <h6 class="floatleft"><?php _e('Featured','colabsthemes');?></h6>
    <a href="<?php echo get_category_link($cat_featured);?>" class="link-button floatright"><?php _e('All Featured','colabsthemes');?></a>
  </div><!-- .featured-head -->
  <?php
    $query_posts = new WP_query('showposts=3&cat='.$cat_featured);
    if ( $query_posts->have_posts() ) : ?>
  <div class="featured columns col12">
    <!-- Pake Loop dulu biar ga pusing bacanya -->
    <?php while ( $query_posts->have_posts() ) : $query_posts->the_post();?>
      <div class="column col4">
        <?php colabs_image('width=307&height=204&play=true'); ?>
        <h3 class="headline-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <p><?php excerpt();?></p>
        <a class="more-link" href="<?php the_permalink();?>"><?php _e('Continue Reading','colabsthemes');?> &rarr;</a>
      </div>
    <?php endwhile; ?>
  </div><!-- .featured -->
  <?php endif; ?>
  <div class="footer-widget columns col12">
    <?php if ( colabs_active_sidebar( 'sidebar-footer' ) ) : colabs_sidebar( 'sidebar-footer' ); else: ?>

    <?php endif; ?>
  </div><!-- .footer-widget -->
  <?php } ?>
    <footer>
      <div class="tamhscFooter mobileHide">
        <div id="footAcad">
          <h5>Academics</h5>
          <ul>
            <li class="bcd"><a href="http://bcd.tamhsc.edu">A&amp;M Baylor College of Dentistry</a></li>
            <li class="com"><a href="http://medicine.tamhsc.edu">College of Medicine</a></li>
            <li class="con"><a href="http://nursing.tamhsc.edu">College of Nursing</a></li>
            <li class="cop"><a href="http://pharmacy.tamhsc.edu">Rangel College of Pharmacy</a></li>
            <li class="srph"><a href="http://sph.tamhsc.edu">School of Public Health</a></li>
          </ul>
        </div>
        <div id="quickLinksCentral">
          <h5>Quick Links</h5>
          <ul>
            <li><a href="http://www.tamhsc.edu/about/">About TAMHSC</a></li>
            <li><a href="http://www.tamhsc.edu/ehsm/">Health &amp; Safety</a></li>
            <li><a href="http://it.tamhsc.edu/scheduling/">Room Scheduling</a></li>
            <li><a href="http://www.tamhsc.edu/assetworks/">Facilities Work Request</a></li>
            <li><a href="http://www.tamhsc.edu/security/photo-access-request.html">Photo ID &amp; Access Request</a></li>
            <li><a href="http://www.tamhsc.edu/education/veterans/">Veterans Benefits</a></li>
            <li class="last"><a href="http://www.tamhsc.edu/1115-waiver/">1115 Medicaid Waiver</a></li>
          </ul>
          <ul class="right">
            <li><a href="http://www.tamhsc.edu/departments/finance-admin/fuss/emergency-management/index.html">Emergency Mgmt.</a></li>
            <li class="last"><a href="http://www.tamhsc.edu/news/weather.html">Weather Alerts</a></li>
          </ul>
        </div>
        <div id="infoLinks">
          <h5>Information</h5>
          <ul>
            <li><a href="http://www.tamhsc.edu/contact/">Contact Us</a></li>
            <li><a href="http://www.tamhsc.edu/about/faq/">FAQs</a></li>
            <li><a href="//www.tamhsc.edu/marcomm/media-resources.html">Press &amp; Media</a></li>
            <li><a href="mailto:central-webmaster@tamhsc.edu">Contact Webmaster</a></li>
            <li><a href="http://helpdesk.tamhsc.edu/">IT Help Desk</a></li>
            <li class="last"><a href="http://www.tamhsc.edu/hscalert/">HSC Alert</a></li>
          </ul>
        </div>
        <div id="affliationsCentral">
          <h5>Affiliations</h5>
          <a href="http://www.tamus.edu/"><img src="http://webassets.tamhsc.edu/global-assets/images/logos/tamus-footer-logo.png" alt="Texas A&amp;M University System" height="77" width="101" style="max-width: 101px;" /></a> <br/>
          <a href="http://www.aahcdc.org/"><img src="http://webassets.tamhsc.edu/global-assets/images/logos/aahc-footer-logo.png" alt="The Association of Academic Health Centers (AAHC)" height="77" width="101" style="max-width: 101px;" /></a>
          </div>
          <div id="bottomLinks">
            <a href="http://www.texasonline.com/">State of Texas</a> ·
            <a href="http://www.texashomelandsecurity.com/">Texas Homeland Security</a> ·
            <a href="http://www.tamhsc.edu/web/open-records.html">Public Information Act</a> ·
            <a href="https://secure.ethicspoint.com/domain/en/report_custom.asp?clientid=19681">Risk, Fraud &amp; Misconduct Hotline</a> ·
            <a href="http://www.tsl.state.tx.us/trail/">Statewide Search</a> ·
            <a href="http://www2.dir.state.tx.us/pubs/Pages/weblink-privacy.aspx">State Link Policy</a>
            <br>
            <a href="http://www.tamhsc.edu/security/">Security</a> ·
            <a href="http://www.tamhsc.edu/web/eeo.html">Equal Opportunity/Nondiscrimination</a> ·
            <a href="http://jobs.tamhsc.edu">Employment Opportunities</a> ·
            <a href="http://veterans.portal.texas.gov/en/Pages/default.aspx">Texas Veterans Portal</a> ·
            <a href="http://tamhsc.edu/web/">Site Policies</a> ·
            <a href="http://www.tamhsc.edu/web/accessibility.html">Web Accessibility</a>
          </div>
      </div>
      <div class="mobileFoot desktopHide">
        <a href="/">Home</a>
          &middot; <a href="mailto:central-webmaster@tamhsc.edu">Webmaster</a>
          &middot; <a href="http://tamhsc.edu/web/">Site Policies</a>
          &middot; <a href="http://www.tamhsc.edu/web/accessibility.html">Web Accessibility</a>
      </div>
    </footer>
</div><!-- #footer -->
</div><!-- .container -->
<?php wp_footer(); ?>
</body>
</html>
