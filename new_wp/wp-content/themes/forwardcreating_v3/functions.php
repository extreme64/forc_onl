<?php
/**
 * ForwardCreating_v3 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ForwardCreating_v3
 */

if ( ! function_exists( 'forwardcreating_v3_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function forwardcreating_v3_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ForwardCreating_v3, use a find and replace
		 * to change 'forwardcreating_v3' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'forwardcreating_v3', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'forwardcreating_v3' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'forwardcreating_v3_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'forwardcreating_v3_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function forwardcreating_v3_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'forwardcreating_v3_content_width', 640 );
}
add_action( 'after_setup_theme', 'forwardcreating_v3_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function forwardcreating_v3_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 1', 'forwardcreating_v3' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'On the left.', 'forwardcreating_v3' ),
		'before_widget' => '<section id="%1$s" class="widget widgets-1 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'forwardcreating_v3' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Centered.', 'forwardcreating_v3' ),
		'before_widget' => '<section id="%1$s" class="widget widgets-2 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'forwardcreating_v3' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'On the right', 'forwardcreating_v3' ),
		'before_widget' => '<section id="%1$s" class="widget widgets-3 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'forwardcreating_v3_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function forwardcreating_v3_scripts() {
	wp_enqueue_style( 'forwardcreating_v3-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap.4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/layouts/main.css' );


	// wp_deregister_script('jquery-core');
	// wp_deregister_script('jquery-migrate');
	wp_enqueue_script( 'jquery-3.3.1.min', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '20151215', false );
	// TOOLTIP & POPOVER POSITIONING ENGINE
	wp_enqueue_script( 'jpopper.js.1.14.7', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery-3.3.1.min'), '20151215', true );
	wp_enqueue_script( 'bootstrap.4.3.1', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery-3.3.1.min', 'jpopper.js.1.14.7'), '20151215', true );


	wp_enqueue_script( 'fontawesome-kit-5', 'https://kit.fontawesome.com/9fa9ed7a49.js', array(), '20151215', true );



	wp_enqueue_script( 'forwardcreating_v3-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'forwardcreating_v3-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'rest', get_template_directory_uri() . '/js/rest.js' , array('jquery'), '20151215', true );
	wp_enqueue_script( 'rest' );
	/** REST API */
	// Provide a global object to our JS file contaning our REST API endpoint, and API nonce
	// Nonce must be 'wp_rest' !
	//   ==   REST API includes a technique called nonces to avoid CSRF issues. This prevents
	//        other sites from forcing you to perform actions without explicitly intending to do so
	wp_localize_script( 'rest', 'rest_object',
			array(
					'api_nonce' => wp_create_nonce( 'wp_rest' ),
					'api_url'   => site_url('/wp-json/rest/v1/')
			)
	);
	/** */

	wp_register_script( 'posts_jsmo', get_template_directory_uri() . '/js/modules/posts.js' , array('jquery-3.3.1.min'), '20151215', true );
	wp_enqueue_script( 'posts_jsmo' );

}
add_action( 'wp_enqueue_scripts', 'forwardcreating_v3_scripts' );


/** filters to mod script attributes */
// script_loader_tag to mod script tag
add_filter( 'script_loader_tag', 'add_id_to_script', 10, 3 );
function add_id_to_script( $tag, $handle, $src ) {
	if ( 'posts_jsmo' === $handle || 'rest' === $handle) {
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
	}
	return $tag;
}
// apply on rest.js
apply_filters( 'script_loader_tag',
	get_site_url() . '/wp-content/themes/forwardcreating_v3/js/rest.js?ver=20151215',
	"rest",
	get_template_directory_uri() ."/js/rest.js"
);
// apply on posts.js
apply_filters( 'script_loader_tag',
	get_site_url() . '/wp-content/themes/forwardcreating_v3/js/modules/posts.js?ver=20151215',
	"posts_jsmo",
	get_template_directory_uri() ."/js/modules/posts.js"
);
/***/





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




/** REST API */

function rest_concepts_posts_endpoint() {
    // Declare our namespace
    $namespace = 'rest/v1';

    // Register the route
    register_rest_route( $namespace, '/concepts', array(
        'methods'   => WP_REST_Server::READABLE,
        'callback'  => 'rest_concepts_posts_handler',
        'args'      => array(
        	'catId'  => array( 'required' => true ), // This is where we could do the validation callback
        )
    ) );
}
add_action( 'rest_api_init', 'rest_concepts_posts_endpoint' );

// The callback handler for the endpoint
function rest_concepts_posts_handler( $request ) {
    // We don't need to specifically check the nonce like with admin-ajax. It is handled by the API.
	$per_page = 4;
	$is_last_page;
	$params = $request->get_params();
	
	$page = $params['page'];
	$page_saved = $params['catId'];
	$allpages = filter_var($params['allpages'], FILTER_VALIDATE_BOOLEAN);
	// $loadMoreAction = $params['loadMoreAction'];
	// $isCategoryFiltering =  $params['isCategoryFiltering'];
	// set array 
	$filter_concept_posts_options = array( 
		'category'         => $params['catId'],
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => array(),
		'exclude'          => array(),
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'suppress_filters' => true
	);
	

	$query_posts1 = new WP_Query( array( 'cat' => $params['catId'], 'posts_per_page' => $per_page) );
	$fposts = $query_posts1->found_posts;
	$fposts_pages_max = $query_posts1->max_num_pages;
	$is_last_page = ($fposts_pages_max==$page) ? true : false;
	

	if($allpages && $page>1) {
		$filter_concept_posts_options['numberposts'] = $per_page * ($page);
		$filter_concept_posts_options['offset'] = 0;
	}else{
		$filter_concept_posts_options['numberposts'] = $per_page;
		if($page==1){
			$filter_concept_posts_options['offset'] = 0;
		}else{
			$filter_concept_posts_options['offset'] = $per_page * ($page-1);
		}
	}


	// get poists
	$posts = get_posts( $filter_concept_posts_options );

	$result;
	foreach ( $posts as $key => $post ) {
		$result[$key] = array(
			'post_id' => $post->ID,
			'post_title' => $post->post_title,
			'post_thumb_url' => get_the_post_thumbnail_url($post->ID, 'thumbnail', true),
			'post_excerpt' => $post->post_excerpt,
			'post_permalink' => get_permalink($post->ID)
		);
	}

    // Check what do we have for posts
    if (count($posts)>0) {
		return new WP_REST_Response( 
			array(	'posts_data' =>	json_encode($result), 
					'posts_count' => count($posts), 
					'is_last_page' => $is_last_page,  
					'str_bubbleup' => "php: " . $is_last_page 
			), 
			200 
		);
    } else {
		return new WP_REST_Response( 
			array(
					'posts_data' =>	json_encode(NULL), 
					'posts_count' => 0, 
					'is_last_page' => $is_last_page
			), 
			204 
		);
	}
}



