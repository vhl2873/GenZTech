<?php
// Tự động load tất cả controller
foreach (glob(get_template_directory() . '/controllers/*.php') as $controller) {
    require_once $controller;
}

// Tự động load tất cả model
foreach (glob(get_template_directory() . '/models/*.php') as $model) {
    require_once $model;
}
/**
 * Functions.php - GenZTech Theme
 */

// 🔹 1. Kích hoạt menu điều hướng
function genztech_register_menus() {
    register_nav_menus([
        'primary' => __('Main Menu', 'genztech'),
        'footer'  => __('Footer Menu', 'genztech'),
    ]);
}
add_action('init', 'genztech_register_menus');

// 🔹 2. Thêm hỗ trợ các tính năng cơ bản của theme
function genztech_theme_setup() {
    // Cho phép đổi tiêu đề trang
    add_theme_support('title-tag');
    // Cho phép thêm ảnh đại diện (thumbnail)
    add_theme_support('post-thumbnails');
    // Cho phép HTML5 markup
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'genztech_theme_setup');

// 🔹 3. Load CSS & JS
function genztech_enqueue_scripts() {
    // CSS chính
    wp_enqueue_style('genztech-style', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');

    // Thêm file JS (nếu có)
    wp_enqueue_script('genztech-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'genztech_enqueue_scripts');

// 🔹 4. Tạo sidebar (nếu cần widget)
function genztech_register_sidebars() {
    register_sidebar([
        'name'          => __('Main Sidebar', 'genztech'),
        'id'            => 'main-sidebar',
        'description'   => __('Sidebar hiển thị ở blog', 'genztech'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'genztech_register_sidebars');

// 🔹 5. Fallback menu khi chưa tạo menu
function genztech_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'genztech') . '</a></li>';
    echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . __('Add Menu', 'genztech') . '</a></li>';
    echo '</ul>';
}

// 🔹 6. Custom search form
function genztech_search_form($form) {
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label>
            <span class="screen-reader-text">' . __('Search for:', 'genztech') . '</span>
            <input type="search" class="search-field" placeholder="' . esc_attr__('Search...', 'genztech') . '" value="' . get_search_query() . '" name="s" />
        </label>
        <button type="submit" class="search-submit">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span class="screen-reader-text">' . __('Search', 'genztech') . '</span>
        </button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'genztech_search_form');

// 🔹 7. Helper functions để lấy dữ liệu menu
function genztech_get_menu_items($location = 'primary') {
    $locations = get_nav_menu_locations();
    
    if (!isset($locations[$location])) {
        return false;
    }
    
    $menu_id = $locations[$location];
    return wp_get_nav_menu_items($menu_id);
}

function genztech_get_menu_data($location = 'primary') {
    $menu_items = genztech_get_menu_items($location);
    
    if (!$menu_items) {
        return false;
    }
    
    $menu_data = [];
    foreach ($menu_items as $item) {
        $menu_data[] = [
            'id' => $item->ID,
            'title' => $item->title,
            'url' => $item->url,
            'target' => $item->target,
            'parent' => $item->menu_item_parent,
            'classes' => $item->classes,
            'description' => $item->description,
            'object_id' => $item->object_id,
            'object' => $item->object,
            'type' => $item->type,
        ];
    }
    
    return $menu_data;
}

// 🔹 8. Custom Walker để tùy chỉnh menu output
class GenZTech_Walker_Nav_Menu extends Walker_Nav_Menu {
    
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