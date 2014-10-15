<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head>

<title><?php if ( function_exists( 'colabs_title') ){ colabs_title(); }else{ echo get_bloginfo('name'); ?>&nbsp;<?php wp_title(); } ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php

	if ( function_exists( 'colabs_meta') ) colabs_meta();

	if ( function_exists( 'colabs_meta_head') )colabs_meta_head();

	if ( function_exists( 'colabs_head') ) colabs_head();

    global $colabs_options;

?>

	<?php if(get_option('colabs_disable_mobile')=='false'){?>

	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<?php }?>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


<?php

    if ( function_exists( 'colabs_head') ) colabs_head();

    wp_head();

?>

<!--[if !IE]><!--><script>
// detect IE 10, hack found at http://www.impressivewebs.com/ie10-css-hacks/
if (/*@cc_on!@*/false && document.documentMode === 10) {
    document.documentElement.className+=' ie10';
}

// detect ie 11 and up, hack found at http://stackoverflow.com/questions/17447373/how-can-i-target-only-internet-explorer-11-with-javascript
var isAtLeastIE11 = !!(navigator.userAgent.match(/Trident/) && !navigator.userAgent.match(/MSIE/));
if (isAtLeastIE11){
    document.documentElement.className+='ie ie11';
}
</script><!--<![endif]-->
<!--[if IE]>
    <link href="wp-content/themes/modernizm/ie.css" rel="stylesheet"/>
<![endif]-->

<!--[if IE 9]>
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie9.css" rel="stylesheet"/>
<![endif]-->

<!--[if IE 8]>
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie8.css" rel="stylesheet"/>
<![endif]-->

<!--[if IE 7]>
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie7.css" rel="stylesheet"/>
<![endif]-->
</head>



<body <?php body_class(get_option('colabs_post_layout')); ?>>

<div class="topBarContainer">

    <div class="topBar">

        <h1 class="tabletHide mobileHide"><a href="http://www.tamhsc.edu/"></a></h1>

        <div class="topLinks">

            <ul class="tabletHide mobileHide">
                <li><a href="//bcd.tamhsc.edu/">Dentistry</a></li>
                <li><a href="//medicine.tamhsc.edu/">Medicine</a></li>
                <li><a href="//nursing.tamhsc.edu/">Nursing</a></li>
                <li><a href="//pharmacy.tamhsc.edu/">Pharmacy</a></li>
                <li><a href="//sph.tamhsc.edu/">Public Health</a></li>
            </ul>

            <form class="websearch" action="/search" method="get">

                    <label class="hidden" for="headerSearchField">Search</label>

                    <input id="headerSearchField" class="searchField" maxlength="256" name="q" size="32" placeholder="Search News &amp; Info" type="search" autocomplete="off"/>

                    <input name="sa" value="Search" type="hidden"/>

                    <input name="entqr" value="0" type="hidden"/>

                    <input name="ud" value="1" type="hidden"/>

                    <input name="sort" value="date:D:L:d1" type="hidden"/>

                    <input name="output" value="xml_no_dtd" type="hidden"/>

                    <input name="oe" value="UTF-8" type="hidden"/>

                    <input name="ie" value="UTF-8" type="hidden"/>

                    <input name="client" value="hsc_frontend" type="hidden"/>

                    <input name="proxystylesheet" value="hsc_frontend" type="hidden"/>

                    <input name="site" value="default_collection" type="hidden"/>

                    <input name="search button" class="hidden" type="submit" value="Search" />

               </form>

        </div>

    </div>

</div>

<div class="container">

	<div id="header" class="columns col12">

		<div id="logo" class="columns col8">
			<h1 id="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    Vital Record
				</a>
			</h1>
            <?php /*<p>Your source for health news from the Texas A&amp;M Health Science Center</p>*/ ?>
		</div><!-- #logo -->

		<a class="btn-navbar collapsed">

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			</a>

		<div id="topmenu" class="columns col4">

			<div class="nav-collapse collapse">

				<?php colabs_nav('topmenu');?>

			</div>

		</div><!-- #topmenu -->

	</div><!-- #header -->

