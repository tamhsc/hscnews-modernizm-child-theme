<?php
  function my_register_sidebars() {
      if ( !function_exists('register_sidebars') )
          return;
      // Main Sidebar
      register_sidebar( array(
        'name'          => 'Homepg Right Sidebar',
        'id'            => 'homepg-sidebar',
        'description'   => 'This widget will appear in right sidebar area only on the homepage',
        'before_title'  => '<h6 class="widget-title">',
        'after_title'   => '</h6>',
        'before_widget' => '<div id="%1$s" class="widget %2$s column col2">',
        'after_widget'  => '</div>'
      ) );
  }
  add_action( 'widgets_init', 'my_register_sidebars' );


  //add custom widget for displaying hsc in the news posts
  $tamhsc_in_the_news_widget = locate_template( 'tamhsc-in-the-news-widget.php', TRUE, TRUE );


  // Remove support for post formats
  // Use the after_setup_theme hook with a priority of 11 to load after the
  // parent theme, which will fire on the default priority of 10
  function remove_post_format() {
      // This will remove support for post formats on ALL Post Types
      remove_theme_support( 'post-formats' );
      add_filter( 'show_post_format_ui', '__return_false' );
  }
  add_action( 'after_setup_theme', 'remove_post_format', 11 );

  //remove post metaboxes that we don't use
  function remove_post_meta_boxes() {

    /* Custom fields meta box. */
    remove_meta_box( 'postcustom', 'post', 'normal' );

    /* Comments meta box. */
    remove_meta_box( 'commentsdiv', 'post', 'normal' );

    /* Sharing meta box */
    remove_meta_box( 'sharing_meta', 'post', 'advanced' );

    /* Remove the useless colorlabs / modernizm theme custom metaboxes */
    remove_meta_box( 'colabsthemes-settings', 'post', 'normal' );
    remove_meta_box( 'colabsthemes-seo', 'post', 'normal' );
    remove_meta_box( 'colabsthemes-settings', 'page', 'normal' );
    remove_meta_box( 'colabsthemes-seo', 'page', 'normal' );
  }
  add_action( 'add_meta_boxes', 'remove_post_meta_boxes' );

  //always show excerpt metabox
  function mytheme_addbox() {
    add_meta_box('postexcerpt', __('Excerpt'), 'post_excerpt_meta_box', 'page', 'normal', 'core');
  }
  add_action( 'admin_menu', 'mytheme_addbox' );


  //hide permalink display in External news link custom post type
  /*
  
  function remove_permalink() {
    if($_GET['post']) {

      $post_type = get_post_type($_GET['post']);

      if($post_type == 'external-news-link' && $_GET['action'] == 'edit') {
        echo '<style>#edit-slug-box{display:none;}</style>';
      }
    }
  }
  //add_action('admin_init', 'remove_permalink');
  */

  // Remove the comments feed
  remove_action( 'wp_head', 'feed_links', 2 );
  remove_action('wp_head','feed_links_extra', 3);





/**************HSC Login page customizations**************/

  //disable password reset
  function disable_reset_lost_password() {
     return false;
  }
  add_filter( 'allow_password_reset', 'disable_reset_lost_password');


  //custom login message (code from http://wpsnippy.com/2013/08/how-to-add-custom-text-to-wordpress-login-page/)
  function wps_login_message( $message ) {
    if ( empty($message) ){
        return "<p class='message'>Your username is your full email address (ex: username@tamhsc.edu)</p>";
    } else {
        return $message;
    }
  }
  add_filter( 'login_message', 'wps_login_message' );


  //change 'Username' to 'HSC Email address' on login page
  //code based on example at http://wpsnipp.com/index.php/functions-php/change-register-text-to-sign-up-on-login-page/
  function username_text( $translated ) {
       $translated = str_ireplace(  'Username',  'HSC Email address',  $translated );
       return $translated;
  }
  add_filter(  'gettext',  'username_text'  );
  add_filter(  'ngettext',  'username_text'  );


  function my_login_logo() { ?>
    <style type="text/css">
        #login {
          width: 320px;
        }
        body.login div#login h1 a {
          background-image: url(https://webassets.tamhsc.edu/global-assets/images/logos/tamhsc-stacked-logo-maroon.png);
          padding-bottom: 30px;
          height: 105.84px;
          width: 280px;
        }
        .login h1 a {
          background-size: 280px 105.84px;
          height: 105.84px;
          width: 280px;
          margin-left: auto;
          margin-right: auto;
        }
        .login form {
          margin-left: auto;
          margin-right: auto;
          width: 280px;
        }
        .login #nav, .login #backtoblog, .forgetmenot{
          display: none;
        }
    </style>
  <?php }
  add_action( 'login_enqueue_scripts', 'my_login_logo' );


  //change url and title for logo (from codex: )
  function my_login_logo_url() {
    return get_bloginfo( 'url' );
  }
  add_filter( 'login_headerurl', 'my_login_logo_url' );

  function my_login_logo_url_title() {
      return 'Texas A&amp;M Health Science Center';
  }
  add_filter( 'login_headertitle', 'my_login_logo_url_title' );

?>