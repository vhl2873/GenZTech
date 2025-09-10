<?php
/**
 * BambooStudy Theme Functions
 * 
 * @package BambooStudy
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('BAMBOOSTUDY_VERSION', '1.0.0');
define('BAMBOOSTUDY_THEME_DIR', get_template_directory());
define('BAMBOOSTUDY_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function bamboostudy_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '2d5a27',
        'width'              => 1200,
        'height'             => 600,
        'flex-height'        => true,
        'flex-width'         => true,
    ));
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('dark-editor-style');
    
    // Add image sizes
    add_image_size('bamboostudy-featured', 800, 600, true);
    add_image_size('bamboostudy-thumbnail', 300, 200, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'bamboostudy'),
        'footer'  => __('Footer Menu', 'bamboostudy'),
        'mobile'  => __('Mobile Menu', 'bamboostudy'),
    ));
    
    // Load theme textdomain
    load_theme_textdomain('bamboostudy', BAMBOOSTUDY_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'bamboostudy_setup');

/**
 * Enqueue Scripts and Styles
 */
function bamboostudy_scripts() {
    // Main stylesheet
    wp_enqueue_style('bamboostudy-style', get_stylesheet_uri(), array(), BAMBOOSTUDY_VERSION);
    
    // Google Fonts
    wp_enqueue_style('bamboostudy-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap', array(), null);
    
    // Main JavaScript
    wp_enqueue_script('bamboostudy-script', BAMBOOSTUDY_THEME_URI . '/assets/js/main.js', array('jquery'), BAMBOOSTUDY_VERSION, true);
    
    // Localize script for AJAX
    wp_localize_script('bamboostudy-script', 'bamboostudy_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('bamboostudy_nonce'),
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bamboostudy_scripts');

/**
 * Register Widget Areas
 */
function bamboostudy_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'bamboostudy'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'bamboostudy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 1', 'bamboostudy'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in the first footer column.', 'bamboostudy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 2', 'bamboostudy'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in the second footer column.', 'bamboostudy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widget Area 3', 'bamboostudy'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in the third footer column.', 'bamboostudy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bamboostudy_widgets_init');

/**
 * Fallback Menu
 */
function bamboostudy_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'bamboostudy') . '</a></li>';
    echo '<li><a href="#ielts">' . __('IELTS', 'bamboostudy') . '</a></li>';
    echo '<li><a href="#business-english">' . __('Business English', 'bamboostudy') . '</a></li>';
    echo '<li><a href="#jlpt">' . __('JLPT', 'bamboostudy') . '</a></li>';
    echo '<li><a href="#about">' . __('About', 'bamboostudy') . '</a></li>';
    echo '</ul>';
}

/**
 * Custom Search Form
 */
function bamboostudy_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label>
            <span class="screen-reader-text">' . __('Search for:', 'bamboostudy') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr__('Want to learn?', 'bamboostudy') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <button type="submit" class="search-submit">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span class="screen-reader-text">' . __('Search', 'bamboostudy') . '</span>
        </button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'bamboostudy_search_form');

/**
 * Custom Walker for Navigation Menu
 */
class BambooStudy_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Customizer Additions
 */
function bamboostudy_customize_register($wp_customize) {
    // Add BambooStudy section
    $wp_customize->add_section('bamboostudy_options', array(
        'title'    => __('BambooStudy Options', 'bamboostudy'),
        'priority' => 30,
    ));
    
    // Hero title setting
    $wp_customize->add_setting('bamboostudy_hero_title', array(
        'default'           => 'Let The Panda Do The Prep',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('bamboostudy_hero_title', array(
        'label'   => __('Hero Title', 'bamboostudy'),
        'section' => 'bamboostudy_options',
        'type'    => 'text',
    ));
    
    // Hero subtitle setting
    $wp_customize->add_setting('bamboostudy_hero_subtitle', array(
        'default'           => 'Học IELTS, Business English, JLPT dễ dàng với BambooStudy.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('bamboostudy_hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'bamboostudy'),
        'section' => 'bamboostudy_options',
        'type'    => 'textarea',
    ));
}
add_action('customize_register', 'bamboostudy_customize_register');

/**
 * Content Width
 */
function bamboostudy_content_width() {
    $GLOBALS['content_width'] = apply_filters('bamboostudy_content_width', 1200);
}
add_action('after_setup_theme', 'bamboostudy_content_width', 0);

/**
 * Add body classes
 */
function bamboostudy_body_classes($classes) {
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }
    
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    return $classes;
}
add_filter('body_class', 'bamboostudy_body_classes');

/**
 * Display post meta information
 */
function bamboostudy_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        esc_html_x('Posted on %s', 'post date', 'bamboostudy'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';
}

function bamboostudy_posted_by() {
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'bamboostudy'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

/**
 * Display post thumbnail
 */
function bamboostudy_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div><!-- .post-thumbnail -->
    <?php else : ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail('post-thumbnail', array(
                'alt' => the_title_attribute(array(
                    'echo' => false,
                )),
            ));
            ?>
        </a>
        <?php
    endif;
}

/**
 * Display entry footer
 */
function bamboostudy_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'bamboostudy'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'bamboostudy') . '</span>', $categories_list);
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'bamboostudy'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'bamboostudy') . '</span>', $tags_list);
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bamboostudy'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                __('Edit <span class="screen-reader-text">%s</span>', 'bamboostudy'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
}