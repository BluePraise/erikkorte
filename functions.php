<?php
/**
 * Erik Korte Theme Functions
 * Bootstrap-first architecture with modular CSS
 * Version 3.0 - December 2025
 */

/**
 * Enqueue front-end assets - Consolidated Bootstrap + Lightbox
 * All page-specific CSS depends on Bootstrap for consistency
 */
function erikkorte_enqueue_assets() {
    // 1. FONT AWESOME ICONS (v6.1.2)
    wp_enqueue_style(
        'font-awesome',
        'https://use.fontawesome.com/releases/v6.1.2/css/all.css',
        array(),
        '6.1.2'
    );

    // 2. GOOGLE FONTS (Montserrat & Source Sans 3)
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Source+Sans+3:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // 3. BOOTSTRAP CSS (Single source of truth - v5.3.8)
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css',
        array(),
        '5.3.8'
    );

    // 3. THEME BASE CSS (Core variables and global styles)
    $base_css = get_template_directory() . '/assets/css/base.css';
    if (file_exists($base_css)) {
        wp_enqueue_style(
            'erikkorte-base',
            get_template_directory_uri() . '/assets/css/base.css',
            array('bootstrap-css'),
            filemtime($base_css)
        );
    }

    // 3a. HEADER CSS (Loaded site-wide)
    $header_css = get_template_directory() . '/assets/css/07-header.css';
    if (file_exists($header_css)) {
        wp_enqueue_style(
            'erikkorte-header',
            get_template_directory_uri() . '/assets/css/07-header.css',
            array('erikkorte-base'),
            filemtime($header_css)
        );
    }

    // 3b. FOOTER CSS (Loaded site-wide)
    $footer_css = get_template_directory() . '/assets/css/08-footer.css';
    if (file_exists($footer_css)) {
        wp_enqueue_style(
            'erikkorte-footer',
            get_template_directory_uri() . '/assets/css/08-footer.css',
            array('erikkorte-base'),
            filemtime($footer_css)
        );
    }

    // 3c. COMPONENTS CSS (Loaded site-wide)
    $components_css = get_template_directory() . '/assets/css/09-components.css';
    if (file_exists($components_css)) {
        wp_enqueue_style(
            'erikkorte-components',
            get_template_directory_uri() . '/assets/css/09-components.css',
            array('erikkorte-base'),
            filemtime($components_css)
        );
    }

    // 4. LIGHTBOX CSS (for image galleries)
    wp_enqueue_style(
        'lightbox-css',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.min.css',
        array('bootstrap-css'),
        '2.11.5'
    );

    // 5. JAVASCRIPT - WordPress jQuery + Bootstrap + Lightbox
    wp_enqueue_script('jquery'); // WordPress bundled version

    // Bootstrap JS Bundle (includes Popper) - v5.3.8
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.3.8',
        true
    );

    // Lightbox JS (CDN)
    wp_enqueue_script(
        'lightbox-js',
        'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js',
        array('jquery'),
        '2.11.5',
        true
    );

    // Initialize Lightbox with custom options
    wp_add_inline_script(
        'lightbox-js',
        "jQuery(function(){ if(window.lightbox && lightbox.option){ lightbox.option({ resizeDuration: 200, wrapAround: true }); } });"
    );

    // Theme custom JS (mobile menu)
    $theme_js = get_template_directory() . '/assets/js/erikkorte-theme.js';
    if (file_exists($theme_js)) {
        wp_enqueue_script(
            'erikkorte-theme',
            get_template_directory_uri() . '/assets/js/erikkorte-theme.js',
            array('jquery'),
            filemtime($theme_js),
            true
        );
    }

    // 6. CONDITIONAL PAGE-SPECIFIC STYLES (Bootstrap overrides only)
    // All depend on 'erikkorte-base' which includes Bootstrap utilities

    // Home / Front page
    $home_css = get_template_directory() . '/assets/css/pages/home.css';
    if ((is_front_page() || is_home()) && file_exists($home_css)) {
        wp_enqueue_style(
            'erikkorte-page-home',
            get_template_directory_uri() . '/assets/css/pages/home.css',
            array('erikkorte-base'),
            filemtime($home_css)
        );
    }

    // Blog index and single posts
    $blog_css = get_template_directory() . '/assets/css/pages/blog.css';
    if ((is_page('blog') || is_home() || is_archive() || is_single()) && file_exists($blog_css)) {
        wp_enqueue_style(
            'erikkorte-page-blog',
            get_template_directory_uri() . '/assets/css/pages/blog.css',
            array('erikkorte-base'),
            filemtime($blog_css)
        );
    }

    // Contact page by slug or template
    $contact_css = get_template_directory() . '/assets/css/pages/contact.css';
    if ((is_page('contact') || is_page('meld-een-overlijden') || is_page_template('template-parts/contact-page.php')) && file_exists($contact_css)) {
        wp_enqueue_style(
            'erikkorte-page-contact',
            get_template_directory_uri() . '/assets/css/pages/contact.css',
            array('erikkorte-base'),
            filemtime($contact_css)
        );
    }

    // Testimonials page and CPT
    $testimonials_css = get_template_directory() . '/assets/css/pages/testimonials.css';
    if ((is_page_template('page-testimonials.php') || is_singular('testim_and_reviews') || is_post_type_archive('testim_and_reviews')) && file_exists($testimonials_css)) {
        wp_enqueue_style(
            'erikkorte-page-testimonials',
            get_template_directory_uri() . '/assets/css/pages/testimonials.css',
            array('erikkorte-base'),
            filemtime($testimonials_css)
        );
    }
}
add_action('wp_enqueue_scripts', 'erikkorte_enqueue_assets');

// WordPress theme supports
add_theme_support('align-wide');
add_theme_support('editor-styles');

// Register navigation menus
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('footer-quick', 'Footer Quick Menu');
register_nav_menu('regions-menu', 'Regions Menu');

/**
 * Register Custom Post Type: Team Member
 * Used for team profiles across the site
 */
function erikkorte_register_team_cpt() {
    $labels = array(
        'name'                  => 'Teamleden',
        'singular_name'         => 'Teamlid',
        'menu_name'             => 'Team',
        'add_new'               => 'Nieuw Teamlid',
        'add_new_item'          => 'Nieuw Teamlid Toevoegen',
        'edit_item'             => 'Teamlid Bewerken',
        'new_item'              => 'Nieuw Teamlid',
        'view_item'             => 'Teamlid Bekijken',
        'search_items'          => 'Teamleden Zoeken',
        'not_found'             => 'Geen teamleden gevonden',
        'not_found_in_trash'    => 'Geen teamleden in prullenbak',
        'all_items'             => 'Alle Teamleden',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-groups',
        'menu_position'         => 25,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'team'),
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'supports'              => array('title', 'thumbnail'),
        'show_in_rest'          => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'erikkorte_register_team_cpt');

/**
 * Register Custom Post Type: Reacties van Nabestaanden (Testimonials & Reviews)
 * Used for displaying testimonials from relatives
 */
function erikkorte_register_testimonial_cpt() {
    $labels = array(
        'name'                  => 'Reacties van Nabestaanden',
        'singular_name'         => 'Reactie',
        'menu_name'             => 'Reacties',
        'add_new'               => 'Nieuwe Reactie',
        'add_new_item'          => 'Nieuwe Reactie Toevoegen',
        'edit_item'             => 'Reactie Bewerken',
        'new_item'              => 'Nieuwe Reactie',
        'view_item'             => 'Reactie Bekijken',
        'search_items'          => 'Reacties Zoeken',
        'not_found'             => 'Geen reacties gevonden',
        'not_found_in_trash'    => 'Geen reacties in prullenbak',
        'all_items'             => 'Alle Reacties',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-testimonial',
        'menu_position'         => 26,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'reacties'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'show_in_rest'          => true,
    );

    register_post_type('testim_and_reviews', $args);
}
add_action('init', 'erikkorte_register_testimonial_cpt');


function theme_support() {
    // Add theme support for various features
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_theme_support('custom-header');
    add_theme_support('page-attributes'); // Ensure page attributes panel shows in block editor
    add_theme_support('title-tag'); // Let WordPress manage the document title

    $defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => false,
    );
	add_theme_support( 'custom-logo', $defaults );
}
add_action('after_setup_theme', 'theme_support');

/**
 * Breadcrumbs Function
 * Displays hierarchical breadcrumb navigation
 */
function the_breadcrumb()
{
        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '&raquo;'; // delimiter between crumbs
        $home = 'Home'; // text for the 'Home' link
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb

        global $post;
        $homeLink = get_bloginfo('url');
        if (is_home() || is_front_page()) {
            if ($showOnHome == 1) {
                echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
            }
        } else {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
            if (is_category()) {
                $thisCat = get_category(get_query_var('cat'), false);
                if ($thisCat->parent != 0) {
                    echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
                }
                echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
            } elseif (is_search()) {
                echo $before . 'Search results for "' . get_search_query() . '"' . $after;
            } elseif (is_day()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('d') . $after;
            } elseif (is_month()) {
                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
                echo $before . get_the_time('F') . $after;
            } elseif (is_year()) {
                echo $before . get_the_time('Y') . $after;
            } elseif (is_single() && !is_attachment()) {
                if (get_post_type() != 'post') {
                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                    if ($showCurrent == 1) {
                        echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                    }
                } else {
                    $cat = get_the_category();
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                    if ($showCurrent == 0) {
                        $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                    }
                    echo $cats;
                    if ($showCurrent == 1) {
                        echo $before . get_the_title() . $after;
                    }
                }
            } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
                $post_type = get_post_type_object(get_post_type());
                echo $before . $post_type->labels->singular_name . $after;
            } elseif (is_attachment()) {
                $parent = get_post($post->post_parent);
                $cat = get_the_category($parent->ID);
                $cat = $cat[0];
                echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } elseif (is_page() && !$post->post_parent) {
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            } elseif (is_page() && $post->post_parent) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) {
                        echo ' ' . $delimiter . ' ';
                    }
                }
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } elseif (is_tag()) {
                echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
            } elseif (is_author()) {
                global $author;
                $userdata = get_userdata($author);
                echo $before . 'Articles posted by ' . $userdata->display_name . $after;
            } elseif (is_404()) {
                echo $before . 'Error 404' . $after;
            }
            if (get_query_var('paged')) {
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                    echo ' (';
                }
                echo __('Page') . ' ' . get_query_var('paged');
                if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                    echo ')';
                }
            }
            echo '</div>';
        }
    } // end the_breadcrumb()

/**
 * ACF Theme Settings Page
 */
add_action('acf/init', 'my_acf_init');

function my_acf_init() {

	if( function_exists('acf_add_options_page') ) {

		$option_page = acf_add_options_page(array(
			'page_title' 	=> __('Theme General Settings', 'erikkorte'),
			'menu_title' 	=> __('Algemene Instellingen', 'erikkorte'),
			'menu_slug' 	=> 'theme-general-settings',
		));

	}

}
/* Theme Settings End */


// Display current year
function year_shortcode() {
	$year = date_i18n('Y');
	return $year;
}
add_shortcode('year', 'year_shortcode');


function custom_theme_widgets_init() {
    // Register a new widget area
    register_sidebar(array(
        'name'          => __('Widget 1', 'textdomain'),
        'id'            => 'footer_widget_one',
        'description'   => __('Widgets in this area will be shown in the custom location.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Widget 2', 'textdomain'),
        'id'            => 'footer_widget_two',
        'description'   => __('Widgets in this area will be shown in the custom location.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Widget 3', 'textdomain'),
        'id'            => 'footer_widget_three',
        'description'   => __('Widgets in this area will be shown in the custom location.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'custom_theme_widgets_init');


// Allow Iframe in WYSIWYG Editor
function allow_iframes_in_editor($init_array) {
    $init_array['extended_valid_elements'] = 'iframe[src|frameborder|style|scrolling|class|width|height|name|align]';
    return $init_array;
}
add_filter('tiny_mce_before_init', 'allow_iframes_in_editor');

function allow_iframe_in_wp_kses($tags, $context) {
    if ($context === 'post') {
        $tags['iframe'] = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allow'           => true,
            'allowfullscreen' => true,
            'scrolling'       => true,
        );
    }
    return $tags;
}
add_filter('wp_kses_allowed_html', 'allow_iframe_in_wp_kses', 10, 2);

// Add Featured Image column before the Title column, for 'post' and 'page' post types
function add_featured_image_column_before_title($columns) {
    global $typenow;
    if (in_array($typenow, ['post', 'page'])) {
        $new_columns = [];
        foreach ($columns as $key => $value) {
            if ($key === 'title') {
                $new_columns['featured_image'] = __('Featured Image', 'your-textdomain'); // Add Featured Image column
            }
            $new_columns[$key] = $value;
        }
        return $new_columns;
    }
    return $columns;
}
add_filter('manage_posts_columns', 'add_featured_image_column_before_title');
add_filter('manage_pages_columns', 'add_featured_image_column_before_title'); // Apply to pages as well

function show_featured_image_column($column_name, $post_id) {
    if ($column_name === 'featured_image') {
        $thumbnail = get_the_post_thumbnail($post_id, [80, 80], [
            'style' => 'border-radius: 50%; height: 80px; width: 80px; object-fit: cover;',
        ]);
        echo $thumbnail ?: __('No Image', 'your-textdomain');
    }
}
add_action('manage_posts_custom_column', 'show_featured_image_column', 10, 2);
add_action('manage_pages_custom_column', 'show_featured_image_column', 10, 2); // Apply to pages as well

function make_featured_image_column_sortable($columns) {
    global $typenow;
    if (in_array($typenow, ['post', 'page'])) {
        $columns['featured_image'] = 'featured_image';
    }
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'make_featured_image_column_sortable');
add_filter('manage_edit-page_sortable_columns', 'make_featured_image_column_sortable');

/**
 * NOTE: Condoleance Register is now a PLUGIN
 * Meta boxes and candle management are handled by:
 * - /plugins/condoleance-register/includes/post-types/class-condoleance.php
 * - /plugins/condoleance-register/includes/frontend/class-candles.php
 *
 * The old meta box code has been REMOVED to avoid conflicts.
 * Post type is 'condoleance' (not 'cpt_condolances')
 */

/**
 * SEO Functions
 * Add meta descriptions and canonical URLs
 */
function erikkorte_add_seo_meta_tags() {
    // Meta Description
    $meta_description = '';

    if (is_singular()) {
        // Check for Yoast/RankMath meta first
        $yoast_desc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
        $rankmath_desc = get_post_meta(get_the_ID(), 'rank_math_description', true);

        if (!empty($yoast_desc)) {
            $meta_description = $yoast_desc;
        } elseif (!empty($rankmath_desc)) {
            $meta_description = $rankmath_desc;
        } else {
            // Fallback to excerpt or content
            $post = get_post();
            if (!empty($post->post_excerpt)) {
                $meta_description = wp_trim_words($post->post_excerpt, 20, '...');
            } else {
                $meta_description = wp_trim_words(strip_tags($post->post_content), 20, '...');
            }
        }
    } elseif (is_home() || is_front_page()) {
        $meta_description = get_bloginfo('description');
    } elseif (is_category()) {
        $meta_description = category_description();
    } elseif (is_tag()) {
        $meta_description = tag_description();
    } elseif (is_archive()) {
        $meta_description = get_the_archive_description();
    }

    // Output meta description
    if (!empty($meta_description)) {
        echo '<meta name="description" content="' . esc_attr(strip_tags($meta_description)) . '">' . "\n";
    }

    // Canonical URL
    $canonical_url = '';

    if (is_singular()) {
        $canonical_url = get_permalink();
    } elseif (is_home() || is_front_page()) {
        $canonical_url = home_url('/');
    } elseif (is_category() || is_tag() || is_tax()) {
        $canonical_url = get_term_link(get_queried_object());
    } elseif (is_post_type_archive()) {
        $canonical_url = get_post_type_archive_link(get_post_type());
    }

    // Output canonical URL
    if (!empty($canonical_url) && !is_wp_error($canonical_url)) {
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }

    // Open Graph tags for social media
    if (is_singular()) {
        $post = get_post();
        echo '<meta property="og:type" content="article">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";

        if (!empty($meta_description)) {
            echo '<meta property="og:description" content="' . esc_attr(strip_tags($meta_description)) . '">' . "\n";
        }

        if (has_post_thumbnail()) {
            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'large');
            echo '<meta property="og:image" content="' . esc_url($thumbnail_url) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'erikkorte_add_seo_meta_tags', 1);

/**
 * Filter to ensure all images have alt text
 * Adds a filter to automatically use the image title if alt text is missing
 */
function erikkorte_default_image_alt($attr, $attachment) {
    if (empty($attr['alt'])) {
        $attr['alt'] = get_the_title($attachment->ID);
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'erikkorte_default_image_alt', 10, 2);

/**
 * ACF JSON Save & Load Points
 * Enables version control for ACF field groups
 */
add_filter('acf/settings/save_json', function($path) {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});


