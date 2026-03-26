<?php
/**
 * Proud Brands functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Proud_Brands
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function proud_brand_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Proud Brands, use a find and replace
		* to change 'proud-brand' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'proud-brand', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'proud-brand' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'proud_brand_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'proud_brand_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function proud_brand_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'proud_brand_content_width', 640 );
}
add_action( 'after_setup_theme', 'proud_brand_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function proud_brand_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'proud-brand' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'proud-brand' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'proud_brand_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function proud_brand_scripts() {
	// wp_enqueue_style( 'proud-brand-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), _S_VERSION );
    // wp_enqueue_style( 'proud-brand-aos-css', get_template_directory_uri() . '/css/aos.css', array(), _S_VERSION );
    // wp_enqueue_style( 'proud-brand-banner-css', get_template_directory_uri() . '/css/banner.css', array(), _S_VERSION );
    // wp_enqueue_style( 'proud-brand-style-css', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
    // wp_enqueue_style( 'proud-brand-custom-css', get_template_directory_uri() . '/css/custom.css', array(), _S_VERSION );
    
	wp_enqueue_style( 'proud-brand-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'proud-brand-style', 'rtl', 'replace' );


	wp_enqueue_script( 'proud-brand-jquery-js', get_template_directory_uri() . '/js/jquery.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-lenis-js', get_template_directory_uri() . '/js/lenis.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-aos-js', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-counterup-js', get_template_directory_uri() . '/js/counterup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-jquery-waypoints-min-js', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-header_custom-js', get_template_directory_uri() . '/js/header_custom.js', array(), _S_VERSION, true );
	
    if ( ! is_front_page() ) {
        wp_enqueue_script( 'proud-brand-swiper-js', get_template_directory_uri() . '/js/swiper.js', array(), _S_VERSION, true );
    }

	wp_enqueue_script( 'proud-brand-swiper_custom-js', get_template_directory_uri() . '/js/swiper_custom.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'proud-brand-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Components page stylesheet
	if ( is_page_template( 'template-components.php' ) ) {
		wp_enqueue_style( 'proud-brand-components-page', get_template_directory_uri() . '/css/components-page.css', array(), _S_VERSION );
	}

	// Homepage v2 animated sections
	if ( is_page_template( 'template-home.php' ) ) {
		wp_enqueue_style( 'proud-brand-hp-v2-css', get_template_directory_uri() . '/css/hp-sections-v2.css', array(), _S_VERSION );
		wp_enqueue_script( 'proud-brand-hp-v2-js', get_template_directory_uri() . '/js/hp-sections-v2.js', array(), _S_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'proud_brand_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}







// this is theme setting

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings'
	));
}





function allow_webp_uploads($mimes) {
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'allow_webp_uploads');







/* --
 Custom post type and taxonomy for Our Works custom Post type
-- */

function create_our_works_function(){
    $labels = array(
        'name' => _x('Our Work', 'post type general name', 'your_text_domain'),
        'singular_name' => _x('Our Work', 'post type Singular name', 'your_text_domain'),
        'add_new' => _x('Add Our Work', '', 'your_text_domain'),
        'add_new_item' => __('Add New Our Work', 'your_text_domain'),
        'edit_item' => __('Edit Our Work', 'your_text_domain'),
        'new_item' => __('New Our Work', 'your_text_domain'),
        'all_items' => __('All Our Work', 'your_text_domain'),
        'view_item' => __('View Our Work', 'your_text_domain'),
        'search_items' => __('Search Our Work', 'your_text_domain'),
        'not_found' => __('No Our Work found', 'your_text_domain'),
        'not_found_in_trash' => __('No Our Work on trash', 'your_text_domain'),
        'parent_item_colon' => '',
        'menu_name' => __('Our Work', 'your_text_domain')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-work', 'with_front' => false ),
        'capability_type' => 'page',
        'has_archive' => 'our-work',
        'hierarchical' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' )
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        ' update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('our_works_category', array('our_work'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'our_works_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'our_works_category'))
    );
    register_post_type('our_work', $args);
    flush_rewrite_rules();
}
add_action('init', 'create_our_works_function');





/* --
 Custom post type and taxonomy for Resource custom Post type
-- */

function create_resource_function(){
    $labels = array(
        'name' => _x('Resource', 'post type general name', 'your_text_domain'),
        'singular_name' => _x('Resource', 'post type Singular name', 'your_text_domain'),
        'add_new' => _x('Add Resource', '', 'your_text_domain'),
        'add_new_item' => __('Add New Resource', 'your_text_domain'),
        'edit_item' => __('Edit Resource', 'your_text_domain'),
        'new_item' => __('New Resource', 'your_text_domain'),
        'all_items' => __('All Resource', 'your_text_domain'),
        'view_item' => __('View Resource', 'your_text_domain'),
        'search_items' => __('Search Resource', 'your_text_domain'),
        'not_found' => __('No Resource found', 'your_text_domain'),
        'not_found_in_trash' => __('No Resource on trash', 'your_text_domain'),
        'parent_item_colon' => '',
        'menu_name' => __('Resource', 'your_text_domain')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'resource', 'with_front' => false ),
        'capability_type' => 'page',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' )
    );
    $labels = array(
        'name' => __('Category'),
        'singular_name' => __('Category'),
        'search_items' => __('Search'),
        'popular_items' => __('More Used'),
        'all_items' => __('All Categories'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Add new'),
        ' update_item' => __('Update'),
        'add_new_item' => __('Add new Category'),
        'new_item_name' => __('New')
    );
    register_taxonomy('resource_category', array('resource'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'singular_label' => 'resource_category',
		'all_items' => 'Category',
		'query_var' => true,
		'rewrite' => array('slug' => 'resource_category'))
    );
    register_post_type('resource', $args);
    flush_rewrite_rules();
}
add_action('init', 'create_resource_function');






// load more ajax blog posts
 add_action('wp_ajax_nopriv_ajax_pagination', 'wp_ajax_pagination');
 add_action('wp_ajax_ajax_pagination', 'wp_ajax_pagination');


 function wp_ajax_pagination(){
 	$Total_Pages = $_POST['TotalPages'];
 	$Current_Page = $_POST['CurrentPage'];
 	$Next_Pages = $_POST['NexxtPage'];


 	$argss = array(
 		'post_type' => 'post',
 		'post_status' => 'publish',
 		'posts_per_page' => 6,
 		'order' => 'DESC',
 		'paged' => $Next_Pages
 	);
 	$queery = new WP_query($argss);
 	$html.='';
 	if ($queery->have_posts()) {
 		while ($queery->have_posts()) {
 			$queery->the_post();

 			$html.='
 				<div class="article smooth w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="article_pic w-100 float-start">
                        <a href="'.get_the_permalink().'">
                            <img aria-hidden="true" decoding="async" src="'.get_the_post_thumbnail_url().'" alt="banner image" width="430" height="221">
                        </a>
                    </div>
                    <div class="article_des w-100 float-start">
                        <span>'.get_the_date('j-n-Y').'</span>
                        <h2><a class="article_title" href="'.get_the_permalink().'">'.get_the_title().'</a></h2>
                        <p>'.get_the_excerpt().'</p>
                        <a class="read_article" href="'.get_the_permalink().'">Read Article</a>
                    </div>
                </div>';

 		}
 	}

 	echo $html;

 	exit();

 }




// load more ajax resource posts
add_action('wp_ajax_nopriv_ajax_pagination_resc', 'wp_ajax_pagination_resc');
add_action('wp_ajax_ajax_pagination_resc', 'wp_ajax_pagination_resc');

function wp_ajax_pagination_resc() {
    $Total_Pagesr = $_POST['TotalPages'];
    $Current_Pager = $_POST['CurrentPage'];
    $Next_Pagesr = $_POST['NexxtPage'];


    $argssr = array(
        'post_type' => 'resource',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'order' => 'DESC',
        'paged' => $Next_Pagesr
    );
    $queeryr = new WP_query($argssr);
    $html.='';
    if ($queeryr->have_posts()) {
        while ($queeryr->have_posts()) {
            $queeryr->the_post();

            $html.='
                <div class="single_book w-100 float-start text-center">
                    <span class="w-100 float-start">
                        <a href="'.get_the_permalink().'?post_id='.get_the_ID().'">
                            <img src="'.get_the_post_thumbnail_url().'" alt="">
                        </a>
                    </span>
                    <h3><a href="'.get_the_permalink().'?post_id='.get_the_ID().'">'.get_the_title().'</a></h3>
                    <p>'.get_the_excerpt().'</p>
                    <a class="primary_btn" href="'.get_the_permalink().'?post_id='.get_the_ID().'" >Download <img width="13" height="16" src="'.get_template_directory_uri().'/images/down-arrow.png" alt="down arrow"></a>

                </div>';

        }
    }

    echo $html;

    exit();

 }







// Load more AJAX for our works posts
add_action('wp_ajax_nopriv_ajax_pagination_work', 'wp_ajax_pagination_work');
add_action('wp_ajax_ajax_pagination_work', 'wp_ajax_pagination_work');

function wp_ajax_pagination_work() {
    // Sanitize and assign the POST values
    $Total_Pages  = $_POST['TotalPages'];
    $Current_Page = $_POST['CurrentPage'];
    $Next_Pages   = $_POST['NexxtPage'];
    $existedposts = [];
    if (!empty($_POST['ExistedPosts'])) {
        $existedposts = is_array($_POST['ExistedPosts']) ? array_map('intval', $_POST['ExistedPosts']) : [];
    }

    $args = array(
        'post_type'      => 'our_work',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'order'          => 'DESC',
        //'paged'          => $Next_Pages,
        'offset' => 7
        //'post__not_in' => $existedposts,
        
    );
    $query = new WP_Query($args);
    $html  = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Use featured image if available, otherwise use a fallback image
            if (has_post_thumbnail()) {
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            } else {
                $image_url = get_template_directory_uri() . '/images/cs_1.webp';
            }

            $html .= '<div class="case_study_box w-100 float-start">
                        <div class="cs_img w-100 float-start position-relative">
                            <img aria-hidden="true" loading="lazy" decoding="async" src="' . esc_url($image_url) . '" alt="image" width="647" height="604">
                            <a href="' . get_the_permalink() . '">
                                <span class="view-more">
                                    <b><img width="21" height="21" src="' . get_template_directory_uri() . '/images/learn_more.png" alt="arrow"></b>
                                </span>
                            </a>
                        </div>
                        <div class="cs_dtl w-100 float-start">
                            <h3>' . get_the_title() . '</h3>
                            <ul class="w-100 float-start">';

            // Get and output the case study categories
            $post_terms = get_the_terms(get_the_ID(), 'our_works_category');
            if ($post_terms && !is_wp_error($post_terms)) {
                foreach ($post_terms as $term) {
                    $html .= '<li class="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</li>';
                }
            }

            $html .= '      </ul>
                        </div>
                    </div>';
        }
    }
    
    wp_reset_postdata();
    echo $html;
    exit();
}







// Load more AJAX for case study posts
add_action('wp_ajax_nopriv_ajax_pagination_case_study', 'wp_ajax_pagination_case_study');
add_action('wp_ajax_ajax_pagination_case_study', 'wp_ajax_pagination_case_study');

function wp_ajax_pagination_case_study() {
    $next_page = isset($_POST['NexxtPage']) ? intval($_POST['NexxtPage']) : 1;
    $category  = isset($_POST['Category']) ? sanitize_text_field($_POST['Category']) : '';

    $args = array(
        'post_type'      => 'case_study',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'order'          => 'DESC',
        'paged'          => $next_page
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'case_study_type',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    $query = new WP_Query($args);
    $html  = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $image_url = has_post_thumbnail()
                ? get_the_post_thumbnail_url(get_the_ID(), 'large')
                : get_template_directory_uri() . '/images/cs_1.webp';

            $terms = get_the_terms(get_the_ID(), 'case_study_type');
            $term_name = '';
            if ($terms && !is_wp_error($terms)) {
                $term_name = $terms[0]->name;
            }

            $card_subtitle = get_field('cs_card_subtitle');

            $html .= '<div class="col-md-6 col-lg-4 cs-card-col" data-aos="fade-up">
                <a href="' . get_the_permalink() . '" class="cs-card">
                    <div class="cs-card__image">
                        <img loading="lazy" decoding="async" src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" width="600" height="400">
                        <span class="cs-card__tag">' . esc_html($term_name) . '</span>
                    </div>
                    <div class="cs-card__body">
                        <h3 class="cs-card__title">' . esc_html(get_the_title()) . '</h3>
                        ' . ($card_subtitle ? '<p class="cs-card__stat">' . esc_html($card_subtitle) . '</p>' : '') . '
                    </div>
                </a>
            </div>';
        }
    }

    wp_reset_postdata();
    echo $html;
    exit();
}


// for gravity form
add_filter( 'gform_enable_legacy_markup', '__return_true' );
add_filter( 'gform_disable_css', '__return_true' );
add_filter( 'use_block_editor_for_post_type', 'my_use_block_editor_for_post_type', 10, 2 );
function my_use_block_editor_for_post_type( $use_block_editor, $post_type ) {
    if ( $post_type === 'post' ) {
        return true;
    }
    return $use_block_editor;
}


/* ──────────────────────────────────────────────────────────────────────────
 * Gravity Forms → HubSpot CRM Integration
 * Pushes "Start a Project" form (ID 2) submissions to HubSpot as contacts
 * with an engagement note containing all form details.
 * Reuses the HubSpot API token already configured in the Heather chatbot.
 * ────────────────────────────────────────────────────────────────────────── */

add_action( 'gform_after_submission_2', 'pb_gf_to_hubspot', 10, 2 );

function pb_gf_to_hubspot( $entry, $form ) {

	// ── Get HubSpot API token ──
	$token = pb_get_hubspot_token();
	if ( empty( $token ) ) {
		error_log( 'PB GF→HubSpot: No API token configured.' );
		return;
	}

	// ── Map Gravity Form fields ──
	$first_name     = rgar( $entry, '1' );
	$last_name      = rgar( $entry, '3' );
	$email          = rgar( $entry, '4' );
	$company        = rgar( $entry, '5' );
	$phone          = rgar( $entry, '6' );
	$website        = rgar( $entry, '7' );
	$service        = rgar( $entry, '14' );
	$contact_method = rgar( $entry, '15' );
	$budget         = rgar( $entry, '16' );
	$message        = rgar( $entry, '12' );

	// ── Build HubSpot contact properties ──
	$properties = array(
		'firstname'      => $first_name,
		'lastname'       => $last_name,
		'email'          => $email,
		'company'        => $company,
		'lifecyclestage' => 'lead',
		'hs_lead_status' => 'NEW',
	);

	if ( ! empty( $phone ) ) {
		$properties['phone'] = $phone;
	}
	if ( ! empty( $website ) ) {
		$properties['website'] = $website;
	}

	// Assign HubSpot owner if configured in Heather settings.
	$options = get_option( 'heather_chatbot_options', array() );
	if ( ! empty( $options['hubspot_owner_id'] ) ) {
		$properties['hubspot_owner_id'] = $options['hubspot_owner_id'];
	}

	$api_base = 'https://api.hubapi.com';

	// ── Search → Create or Update ──
	$contact_id = null;
	if ( ! empty( $email ) ) {
		$contact_id = pb_hubspot_search_contact( $email, $token, $api_base );
	}

	if ( $contact_id ) {
		pb_hubspot_update_contact( $contact_id, $properties, $token, $api_base );
	} else {
		$contact_id = pb_hubspot_create_contact( $properties, $token, $api_base );
	}

	if ( ! $contact_id ) {
		error_log( 'PB GF→HubSpot: Failed to create/update contact for ' . $email );
		return;
	}

	// ── Create engagement note with all form details ──
	$note  = "Contact Form Submission — Start a Project\n\n";
	$note .= "Name: {$first_name} {$last_name}\n";
	$note .= "Email: {$email}\n";
	$note .= "Company: {$company}\n";
	if ( $phone )          { $note .= "Phone: {$phone}\n"; }
	if ( $website )        { $note .= "Website: {$website}\n"; }
	if ( $service )        { $note .= "Service Needed: {$service}\n"; }
	if ( $contact_method ) { $note .= "Preferred Contact: {$contact_method}\n"; }
	if ( $budget && $budget !== 'Please select an option' ) {
		$note .= "Budget: {$budget}\n";
	}
	if ( $message ) { $note .= "\nMessage:\n{$message}\n"; }

	pb_hubspot_create_note( $contact_id, $note, $token, $api_base );

	error_log( 'PB GF→HubSpot: Contact ' . $contact_id . ' synced (' . $email . ')' );
}


/**
 * Decrypt the HubSpot API token stored by the Heather chatbot plugin.
 */
function pb_get_hubspot_token() {
	$options = get_option( 'heather_chatbot_options', array() );
	if ( empty( $options['hubspot_token'] ) ) {
		return '';
	}

	// Use Heather's class if the plugin is active.
	if ( class_exists( 'Heather_Encryption' ) ) {
		$enc = new Heather_Encryption();
		return $enc->decrypt( $options['hubspot_token'] );
	}

	// Fallback: replicate AES-256-CBC decryption inline.
	$salt   = defined( 'AUTH_KEY' ) ? AUTH_KEY : 'heather-default-salt';
	$key    = hash( 'sha256', $salt, true );
	$cipher = 'aes-256-cbc';

	$decoded = base64_decode( $options['hubspot_token'], true );
	if ( $decoded === false ) {
		return '';
	}

	$parts = explode( '::', $decoded, 2 );
	if ( count( $parts ) !== 2 ) {
		return '';
	}

	list( $iv, $encrypted ) = $parts;
	$decrypted = openssl_decrypt( $encrypted, $cipher, $key, 0, $iv );

	return ( $decrypted !== false ) ? $decrypted : '';
}


/**
 * Search HubSpot for an existing contact by email.
 */
function pb_hubspot_search_contact( $email, $token, $api_base ) {
	$response = wp_remote_post( $api_base . '/crm/v3/objects/contacts/search', array(
		'headers' => array(
			'Authorization' => 'Bearer ' . $token,
			'Content-Type'  => 'application/json',
		),
		'body'    => wp_json_encode( array(
			'filterGroups' => array(
				array(
					'filters' => array(
						array(
							'propertyName' => 'email',
							'operator'     => 'EQ',
							'value'        => $email,
						),
					),
				),
			),
			'limit' => 1,
		) ),
		'timeout' => 10,
	) );

	if ( is_wp_error( $response ) ) {
		error_log( 'PB GF→HubSpot search error: ' . $response->get_error_message() );
		return null;
	}

	$data = json_decode( wp_remote_retrieve_body( $response ), true );
	return isset( $data['results'][0]['id'] ) ? $data['results'][0]['id'] : null;
}


/**
 * Create a new HubSpot contact.
 */
function pb_hubspot_create_contact( $properties, $token, $api_base ) {
	$response = wp_remote_post( $api_base . '/crm/v3/objects/contacts', array(
		'headers' => array(
			'Authorization' => 'Bearer ' . $token,
			'Content-Type'  => 'application/json',
		),
		'body'    => wp_json_encode( array( 'properties' => $properties ) ),
		'timeout' => 10,
	) );

	if ( is_wp_error( $response ) ) {
		error_log( 'PB GF→HubSpot create error: ' . $response->get_error_message() );
		return null;
	}

	$code = wp_remote_retrieve_response_code( $response );
	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( $code === 201 && isset( $data['id'] ) ) {
		return $data['id'];
	}

	error_log( 'PB GF→HubSpot create HTTP ' . $code . ': ' . wp_remote_retrieve_body( $response ) );
	return null;
}


/**
 * Update an existing HubSpot contact (won't downgrade lifecycle stage).
 */
function pb_hubspot_update_contact( $contact_id, $properties, $token, $api_base ) {
	// HubSpot won't allow lifecycle stage downgrades, so skip it on update.
	unset( $properties['lifecyclestage'] );

	$response = wp_remote_request( $api_base . '/crm/v3/objects/contacts/' . $contact_id, array(
		'method'  => 'PATCH',
		'headers' => array(
			'Authorization' => 'Bearer ' . $token,
			'Content-Type'  => 'application/json',
		),
		'body'    => wp_json_encode( array( 'properties' => $properties ) ),
		'timeout' => 10,
	) );

	if ( is_wp_error( $response ) ) {
		error_log( 'PB GF→HubSpot update error: ' . $response->get_error_message() );
		return null;
	}

	return $contact_id;
}


/**
 * Create a HubSpot engagement note associated with a contact.
 */
function pb_hubspot_create_note( $contact_id, $note_body, $token, $api_base ) {
	$response = wp_remote_post( $api_base . '/crm/v3/objects/notes', array(
		'headers' => array(
			'Authorization' => 'Bearer ' . $token,
			'Content-Type'  => 'application/json',
		),
		'body'    => wp_json_encode( array(
			'properties'   => array(
				'hs_timestamp' => gmdate( 'Y-m-d\TH:i:s.v\Z' ),
				'hs_note_body' => $note_body,
			),
			'associations' => array(
				array(
					'to'    => array( 'id' => $contact_id ),
					'types' => array(
						array(
							'associationCategory' => 'HUBSPOT_DEFINED',
							'associationTypeId'   => 202, // Note → Contact.
						),
					),
				),
			),
		) ),
		'timeout' => 10,
	) );

	if ( is_wp_error( $response ) ) {
		error_log( 'PB GF→HubSpot note error: ' . $response->get_error_message() );
	}
}
