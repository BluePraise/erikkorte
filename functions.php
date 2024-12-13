<?php

add_theme_support('align-wide');
add_theme_support('editor-styles');
// include style css
function load_stylesheets(){
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


// Register navigation menu
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('footer-menu', 'Footer Menu');
register_nav_menu('footer-quick', 'Quick Menu');
register_nav_menu('bottom-menu', 'Copyright Menu');
register_nav_menu('regions-menu', 'Regions Menu');


function theme_support() {
    // Add theme support for various features
    add_theme_support('menus', 'post-thumbnails', 'widgets', 'custom-header');
	add_theme_support('post-thumbnails');
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

// acf json save
//add_filter('acf/settings/save_json', 'acf_json_save_point');
// function acf_json_save_point( $path ) {
    //update path
    // $path = get_stylesheet_directory() . '/acf-json';
    //return
    // return $path;
// }


add_action('acf/init', 'register_custom_acf_block');
function register_custom_acf_block() {
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              => 'hero-banner',
            'title'             => __('Hero Banner'),
            'description'       => __('A Hero banner created using ACF and Gutenberg.'),
            'render_template'   => get_template_directory() . '/blocks/hero-banner.php', // Path to the render template.
            'category'          => 'formatting', // Choose from core block categories or create your own.
            'icon'              => 'admin-customizer', // Dashicon for the block.
            'keywords'          => array( 'custom', 'acf', 'block' ),
        ));

        acf_register_block_type(array(
            'name'              => 'funeral-services',
            'title'             => __('Funeral Services'),
            'description'       => __('A block for displaying funeral services with ACF fields.'),
            'render_template'   => get_template_directory() . '/blocks/funeral-services.php',
            'category'          => 'formatting',
            'icon'              => 'admin-post',
            'keywords'          => array('funeral', 'services', 'acf', 'block'),
        ));

        acf_register_block_type(array(
            'name'              => 'team-section',
            'title'             => __('Team Section'),
            'description'       => __('A block to display team members with ACF fields.'),
            'render_template'   => get_template_directory() . '/blocks/team-section.php',
            'category'          => 'formatting',
            'icon'              => 'groups',
            'keywords'          => array('team', 'members', 'acf', 'block'),
        ));

        acf_register_block_type(array(
            'name'              => 'quality-mark',
            'title'             => __('Quality Mark'),
            'description'       => __('A block to showcase quality marks or certifications.'),
            'render_template'   => get_template_directory() . '/blocks/quality-mark.php',
            'category'          => 'formatting',
            'icon'              => 'awards',
            'keywords'          => array('quality', 'mark', 'certification', 'acf'),
        ));

        acf_register_block_type(array(
            'name'              => 'contact-details',
            'title'             => __('Contact Details'),
            'description'       => __('A block to showcase quality marks or certifications.'),
            'render_template'   => get_template_directory() . '/blocks/contact-details.php',
            'category'          => 'formatting',
            'icon'              => 'awards',
            'keywords'          => array('contact', 'info', 'address', 'acf'),
        ));

        acf_register_block_type(array(
            'name'              => 'inner-page-banner', 
            'title'             => __('Inner Page Banner'), 
            'description'       => __('A block to show the inne page banner in Erik Korte.'), 
            'render_template'   => get_template_directory() . '/blocks/team-erik-korte.php', 
            'category'          => 'formatting',
            'icon'              => 'groups', 
            'keywords'          => array('team', 'members', 'Erik Korte', 'acf'),
        ));

     
        acf_register_block_type(array(
            'name'              => 'team-erik-korte', 
            'title'             => __('Team Erik Korte'), 
            'description'       => __('A block to showcase the team members of Erik Korte.'), 
            'render_template'   => get_template_directory() . '/blocks/team-erik-korte.php', 
            'category'          => 'formatting',
            'icon'              => 'groups', 
            'keywords'          => array('team', 'members', 'Erik Korte', 'acf'),
        ));
        
          
        acf_register_block_type(array(
            'name'              => 'contact-us-page',  
            'title'             => __('Contact us page'), 
            'description'       => __('A block to allow users to add contact details in contact us page.'), 
            'render_template'   => get_template_directory() . '/blocks/contact-us-page.php', 
            'category'          => 'formatting', 
            'icon'              => 'groups', 
            'keywords'          => array('contact us', 'conatct', 'Erik Korte', 'acf'), 
        ));
        
        
        acf_register_block_type(array(
            'name'              => 'image-gallery',  // Use the new block name 'service-cost'
            'title'             => __('Image Gallery'),  // Update the title to reflect the new block name
            'description'       => __('A block to display image gallery.'), // Modify description
            'render_template'   => get_template_directory() . '/blocks/image-gallery.php',  // Change the template to 'service-cost.php'
            'category'          => 'formatting', // The block category, adjust as needed
            'icon'              => 'money',  
            'keywords'          => array('image', 'gallery', 'acf'),  
        ));
        

        acf_register_block_type(array(
            'name'              => 'funeral-home-twente',  // New block name 'funeral-home-twente'
            'title'             => __('Funeral Home Twente'),  // Update the title
            'description'       => __('A block to display funeral home Twente information.'),  // Modify description to fit the content
            'render_template'   => get_template_directory() . '/blocks/funeral-home-twente.php',  // Template file for rendering the block
            'category'          => 'formatting', // You can change this to a different category if needed
            'icon'              => 'businessperson',  // Adjust icon if needed, you can choose another from the available WordPress icons
            'keywords'          => array('funeral', 'home', 'twente', 'acf', 'service'),  // Keywords for better block discovery
        ));
        





    }






    /*=============================================
                    BREADCRUMBS
    =============================================*/
    //  to include in functions.php
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



}




/* Theme Settings */
add_action('acf/init', 'my_acf_init');

function my_acf_init() {
	
	if( function_exists('acf_add_options_page') ) {
		
		$option_page = acf_add_options_page(array(
			'page_title' 	=> __('Theme General Settings', 'my_text_domain'),
			'menu_title' 	=> __('Theme Settings', 'my_text_domain'),
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


//Allow Font Awesome 
add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );
function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v6.1.2/css/all.css' );
}

//Allow Iframe in WYSIWYG Editor
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


// Add Option To manuaaly add candles in Condoleance Register Post Type 


/**
 * Add repeater field for name and date/time
 */

 function condolence_add_meta_box() {
    add_meta_box(
        'condolence_meta_box', // ID of the meta box
        'Candles Details',  // Title of the meta box
        'condolence_meta_box_callback', // Callback function
        'cpt_condolances', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'condolence_add_meta_box');

function condolence_meta_box_callback($post) {
    // Nonce for security
    wp_nonce_field('condolence_save_meta_box_data', 'condolence_meta_box_nonce');

    $candles = get_post_meta($post->ID, 'cmb_condalances_candles', 1);
    $candles = is_array($candles) ? $candles : ['count' => 0, 'authors' => []];
    
    //Array ( [count] => 11 [authors] => 6 )
    // Get candle count
    $candle_count = isset($candles['count']) ? $candles['count'] : 0;

    ?>
    <!-- Candle Count Input -->
    <label for="candle_count">Candle Count:</label>
    <input type="number" id="candle_count" name="candle_count" value="<?php echo esc_attr($candle_count); ?>" />

    <!-- Repeater Container -->
    <div id="repeater-container">
        <?php
        if (!empty($candles['authors']) && is_array($candles['authors']) ) {
            foreach (array_reverse($candles['authors']) as $candleName) {
                if(is_array($candleName) && isset($candleName['candle_name']) && isset($candleName['candle_date']) ){
                ?>
                <div class="repeater-row">
                    <input type="text" name="condolence_name[]" placeholder="Name" value="<?php echo esc_attr($candleName['candle_name']); ?>" />
                    <input type="text" name="condolence_date[]" value="<?php echo esc_attr($candleName['candle_date']); ?>" />
                    <button type="button" class="remove-row">Remove</button>
                </div>
                <?php
                }
            }
        }
        ?>
    </div>
    <button type="button" id="add-row">Light a Candle</button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('#repeater-container');
            const addRow = document.querySelector('#add-row');

            addRow.addEventListener('click', function () {
                const row = document.createElement('div');
                row.classList.add('repeater-row');
                row.innerHTML = `
                    <input type="text" name="condolence_name[]" placeholder="Name" />
                    <input type="text" name="condolence_date[]" />
                    <button type="button" class="remove-row">Remove</button>
                `;
                container.appendChild(row);

                row.querySelector('.remove-row').addEventListener('click', function () {
                    row.remove();
                });
            });

            container.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-row')) {
                    e.target.parentNode.remove();
                }
            });
        });
    </script>
    <?php
}

function condolence_save_meta_box_data($post_id) {
    // Verify nonce
    if (!isset($_POST['condolence_meta_box_nonce']) || !wp_verify_nonce($_POST['condolence_meta_box_nonce'], 'condolence_save_meta_box_data')) {
        return;
    }

    // Check for autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Collect and sanitize candle count
    $candle_count = isset($_POST['candle_count']) ? intval($_POST['candle_count']) : 0;

    // Collect and sanitize repeater data
    $candles_data = ['count' => $candle_count, 'authors' => []];
    if (isset($_POST['condolence_name']) && isset($_POST['condolence_date'])) {
        foreach ($_POST['condolence_name'] as $index => $name) {
            $candles_data['authors'][] = [
                'candle_name' => sanitize_text_field($name),
                'candle_date' => sanitize_text_field($_POST['condolence_date'][$index]),
            ];
        }
    }

    // Save meta data
    update_post_meta($post_id, 'cmb_condalances_candles', $candles_data);
}
add_action('save_post', 'condolence_save_meta_box_data');

