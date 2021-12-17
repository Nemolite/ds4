<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Awaken
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'awaken' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		
	<?php if ( has_nav_menu( 'top_navigation' ) || get_theme_mod( 'display_social_icons', false ) ) : ?>	
		<div class="top-nav">
			<div class="container" id="ds4-fix-container">
				<div class="row">
					<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>
					<div class="col-xs-12 col-sm-6 col-md-8 <?php echo $rtl; ?>">
						<?php if ( has_nav_menu( 'top_navigation' ) ) : ?>
							<nav id="top-navigation" class="top-navigation" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'top_navigation' ) ); ?>
							</nav><!-- #site-navigation -->	
							<a href="#" class="navbutton" id="top-nav-button"><?php _e( 'Top Menu', 'awaken' ); ?></a>
							<div class="responsive-topnav"></div>
						<?php endif; ?>			
					</div><!-- col-xs-12 col-sm-6 col-md-8 -->
					<div class="col-xs-12 col-sm-6 col-md-4">
						<?php awaken_socialmedia(); ?>
					</div><!-- col-xs-12 col-sm-6 col-md-4 -->
				</div><!-- row -->
			</div><!-- .container -->
		</div>
	<?php endif; ?>

	<div class="site-branding">
		<div class="container" id="ds4-fix-container">
			<div class="site-brand-container ds4-site-header-container">
			
			</div><!-- .site-brand-container -->
			<?php if(is_active_sidebar( 'header-ad' )) : ?>
				<div class="header-ad-area">
					<div id="secondary" class="widget-area" role="complementary">
						<?php dynamic_sidebar( 'header-ad' ); ?>
					</div><!-- #secondary -->
				</div><!--.header-ad-area-->
			<?php endif; ?>			
		</div>
	</div>

	<div class="container" id="ds4-fix-container">
		<div class="awaken-navigation-container">
			<nav id="site-navigation" class="main-navigation cl-effect-10 ds4-main-navigation" role="navigation" style="">
				<?php wp_nav_menu( array( 'theme_location' => 'main_navigation' ) ); ?>
			</nav><!-- #site-navigation -->
			<a href="#" class="navbutton" id="main-nav-button"><?php _e( 'Main Menu', 'awaken' ); ?></a>
			<div class="responsive-mainnav"></div>

			<?php if ( get_theme_mod( 'show_search_box', true ) ) : ?>
				<div class="awaken-search-button-icon"></div>
				<div class="awaken-search-box-container">
					<div class="awaken-search-box">
						<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="awaken-search-form" method="get">
							<input type="text" value="" name="s" id="s" />
							<input type="submit" value="<?php _e( 'Search', 'awaken' ); ?>" />
						</form>
					</div><!-- th-search-box -->
				</div><!-- .th-search-box-container -->
			<?php endif; ?>

		</div><!-- .awaken-navigation-container-->
	</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container" id="ds4-fix-container">

	<?php 
		if ( is_front_page() || is_page_template( 'layouts/magazine.php' ) ) {
			if ( get_theme_mod( 'display_slider', 1 ) == '1' ) {
				//awaken_featured_posts();
				ds4_awaken_featured_posts();
				
			}
		}
	?>