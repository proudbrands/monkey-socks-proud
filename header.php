<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proud_Brands
 */

?>
<!doctype html>
<html <?php language_attributes(); ?><?php
	// Dark-only pages: services, contact, blog, about
	if (
		is_page_template( 'template-services.php' ) ||
		is_page_template( 'template-contact.php' ) ||
		is_page_template( 'template-blog.php' ) ||
		is_page_template( 'template-about.php' )
	) {
		echo ' data-theme="dark"';
	// Light-default pages: case studies
	} elseif ( is_post_type_archive( 'case_study' ) || is_singular( 'case_study' ) ) {
		echo ' data-theme="light"';
	}
?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ProudBrands">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Bootstrap CSS -->
    <!-- swiper CSS -->

    <?php wp_head(); ?>
    
    <?php if (!is_front_page()) : ?>
        <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css" />
    <?php endif; ?>


    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">

    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/aos.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/aos.css">

    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/banner.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/banner.css">

    <!-- <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/style.css" as="style"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">

    <!-- <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/custom.css" as="style"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/theme-toggle.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/case-studies.css?v=2.3">

    <?php if ( is_page_template( 'template-seo-agency.php' ) ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/seo-agency.css">
    <?php endif; ?>

    <?php if ( is_page_template( 'template-osof.php' ) ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/osof.css">
    <?php endif; ?>

    <?php if ( is_page_template( 'template-services-overview.php' ) || is_page_template( 'template-home2.php' ) || is_page_template( 'template-home.php' ) || is_page_template( 'template-components.php' ) ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/services.css?v=2.2">
    <?php endif; ?>

    <?php if ( is_page_template( 'template-home.php' ) ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/homepage.css">
    <?php endif; ?>

    <?php /* ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    </noscript>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/aos.css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/aos.css">
    </noscript>

    <!-- Preload Banner CSS -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/banner.css" as="style">    
    <!-- Now Link the CSS Normally -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/banner.css" id="banner-css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/banner.css">
    </noscript>

    <!-- Preload style CSS -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/css/style.css" as="style">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    </noscript>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css" media="print" onload="this.media='all'; this.onload=null;">
    <noscript>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
    </noscript>
    <?php */ ?>

    <!-- Theme toggle — runs early to prevent flash of wrong theme -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/theme-toggle.js"></script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <header class="hdr_sec position-relative">
        <div class="container">
            <div class="header_div d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="logo-dark" width="201" height="61" src="<?php echo get_template_directory_uri() ?>/images/logo.webp" alt="logo">
                        <img class="logo-light" width="201" height="61" src="<?php echo get_template_directory_uri() ?>/light-theme-logo.png" alt="logo">
                    </a>
                </div>
                <button type="button" class="pb-theme-toggle" aria-label="Toggle light/dark mode" title="Toggle light/dark mode">
                    <!-- Sun icon (shown in dark mode — click to go light) -->
                    <svg class="pb-theme-toggle__sun" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="5"/>
                        <line x1="12" y1="1" x2="12" y2="3"/>
                        <line x1="12" y1="21" x2="12" y2="23"/>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
                        <line x1="1" y1="12" x2="3" y2="12"/>
                        <line x1="21" y1="12" x2="23" y2="12"/>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                    </svg>
                    <!-- Moon icon (shown in light mode — click to go dark) -->
                    <svg class="pb-theme-toggle__moon" viewBox="0 0 24 24" fill="none">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>
                </button>
                <div class="hdr__rgt-mbl">
                    <div class="hdr__nav-icon" id="hdr__nav-icon2">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                      <small>Menu</small>
                    </div> 
                </div>
                <div class="navigation">
                	<?php
						wp_nav_menu(
							array(
								'menu'        => 'Top Header Menu'
							)
						);
					?>
                    <!-- <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="our_work.html">Our Work</a></li>
                        <li><a href="#">Word salad</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul> -->
                    <ol class="hdr_social_links d-lg-none">
                        <li>
                            <a target="_blank" href="#"><img width="34" height="34" src="<?php echo get_template_directory_uri() ?>/images/facebook.svg" alt="facebook"></a>
                        </li>
                        <li>
                            <a target="_blank" href="#"><img width="34" height="34" src="<?php echo get_template_directory_uri() ?>/images/twitter_x.svg" alt="facebook"></a>
                        </li>
                        <li>
                            <a target="_blank" href="#"><img width="34" height="34" src="<?php echo get_template_directory_uri() ?>/images/linked_in.svg" alt="facebook"></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </header>