<?php
function concrete_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'concrete_theme_setup');

function concrete_theme_scripts() {
    $theme_dir = get_template_directory();
    wp_enqueue_style('concrete-style', get_template_directory_uri() . '/src/style.css', array(), filemtime($theme_dir . '/src/style.css'));
    wp_enqueue_script('concrete-main', get_template_directory_uri() . '/src/main.js', array(), filemtime($theme_dir . '/src/main.js'), true);
    
    wp_localize_script('concrete-main', 'concrete_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('quote_request_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'concrete_theme_scripts');

require get_template_directory() . '/quotes-system.php';
require get_template_directory() . '/services-system.php';

function add_type_attribute($tag, $handle, $src) {
    if ('concrete-main' !== $handle) {
        return $tag;
    }
    return '<script type="module" src="' . esc_url($src) . '"></script>';
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

function concrete_theme_auto_setup() {
    if (get_option('concrete_theme_setup_done')) { return; }
    $pages = ['About' => 'about.php', 'Services' => 'services.php', 'Projects' => 'projects.php', 'Team' => 'team.php'];
    foreach ($pages as $title => $template) {
        $page_check = get_page_by_title($title);
        if (!isset($page_check->ID)) {
            $page_id = wp_insert_post(['post_title' => $title, 'post_status' => 'publish', 'post_type' => 'page']);
            if ($page_id) { update_post_meta($page_id, '_wp_page_template', $template); }
        }
    }
    $home_title = 'Home';
    $home_check = get_page_by_title($home_title);
    if (!isset($home_check->ID)) {
        $home_id = wp_insert_post(['post_title' => $home_title, 'post_status' => 'publish', 'post_type' => 'page']);
        if ($home_id) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home_id);
        }
    }
    update_option('concrete_theme_setup_done', true);
}
add_action('after_setup_theme', 'concrete_theme_auto_setup');

function concrete_theme_cpt() {
    register_post_type('project', array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'portfolio')
    ));

    register_taxonomy('project_category', 'project', array(
        'labels' => array(
            'name' => 'Project Categories',
            'singular_name' => 'Project Category'
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
    ));
}
add_action('init', 'concrete_theme_cpt');

function concrete_theme_projects_setup() {
    if (get_option('concrete_theme_projects_setup_done')) { return; }
    
    // Create categories
    $categories = array('Commercial' => 'commercial', 'Residential' => 'residential', 'Repair' => 'repair');
    foreach ($categories as $name => $slug) {
        if (!term_exists($name, 'project_category')) {
            wp_insert_term($name, 'project_category', array('slug' => $slug));
        }
    }

    // Default projects
    $projects = array(
        array(
            'title' => 'Downtown Commercial Center',
            'content' => 'A massive 15,000 sq ft foundation pour completed ahead of schedule. We utilized high-strength concrete mix to ensure the structural integrity of this new city landmark. The project involved deep excavations and precise laser leveling for a flawless finish.',
            'category' => 'commercial',
            'image' => '/src/assets/images/commercial.jpg',
            'excerpt' => '15,000 sq ft foundation pour'
        ),
        array(
            'title' => 'Highway Overpass Pillars',
            'content' => 'Critical structural reinforcement and repair on aging highway pillars. Our team removed spalled concrete, treated exposed rebar with anti-corrosion agents, and poured high-performance structural concrete to extend the lifespan of the bridge by decades.',
            'category' => 'repair',
            'image' => '/src/assets/images/repair.jpg',
            'excerpt' => 'Structural reinforcement & repair'
        ),
        array(
            'title' => 'Luxury Residential Driveway',
            'content' => 'A stunning decorative stamped concrete driveway designed to complement a high-end luxury home. We used a cobblestone stamp pattern with custom integral coloring and a glossy protective sealer for maximum curb appeal and longevity.',
            'category' => 'residential',
            'image' => '/src/assets/images/residential.jpg',
            'excerpt' => 'Decorative stamped concrete'
        ),
        array(
            'title' => 'Industrial Warehouse Slab',
            'content' => 'High-capacity, laser-leveled concrete floor built to withstand heavy forklift traffic and massive storage racks. Our specialized finishing techniques resulted in an ultra-smooth surface that meets the strictest industrial warehouse tolerances.',
            'category' => 'commercial',
            'image' => '/src/assets/images/pour.jpg',
            'excerpt' => 'High-capacity laser-leveled floor'
        ),
        array(
            'title' => 'City Walkway Restoration',
            'content' => 'Comprehensive spall repair and resurfacing of heavily trafficked pedestrian walkways downtown. We ensured ADA compliance and utilized fast-setting concrete to minimize disruption to city foot traffic.',
            'category' => 'repair',
            'image' => '/src/assets/images/worker.jpg',
            'excerpt' => 'Spall repair and resurfacing'
        ),
        array(
            'title' => 'Custom Concrete Patio',
            'content' => 'A beautiful exposed aggregate finish patio for a suburban backyard. This low-maintenance, highly durable outdoor living space perfectly bridges the gap between indoor comfort and outdoor entertainment.',
            'category' => 'residential',
            'image' => '/src/assets/images/mixer.jpg',
            'excerpt' => 'Exposed aggregate finish'
        )
    );

    foreach ($projects as $p) {
        $check = get_page_by_title($p['title'], OBJECT, 'project');
        if (!isset($check->ID)) {
            $post_id = wp_insert_post(array(
                'post_title' => $p['title'],
                'post_content' => $p['content'],
                'post_excerpt' => $p['excerpt'],
                'post_status' => 'publish',
                'post_type' => 'project'
            ));
            if ($post_id) {
                wp_set_object_terms($post_id, $p['category'], 'project_category');
                update_post_meta($post_id, '_project_image_url', get_template_directory_uri() . $p['image']);
            }
        }
    }
    
    update_option('concrete_theme_projects_setup_done', true);
}
add_action('init', 'concrete_theme_projects_setup');

// Add Meta Box for Featured Projects
function concrete_theme_add_featured_meta_box() {
    add_meta_box('featured_project_meta', 'Feature on Homepage', 'concrete_theme_featured_meta_callback', 'project', 'side', 'high');
}
add_action('add_meta_boxes', 'concrete_theme_add_featured_meta_box');

function concrete_theme_featured_meta_callback($post) {
    wp_nonce_field('save_featured_project', 'featured_project_nonce');
    $is_featured = get_post_meta($post->ID, '_is_featured', true);
    echo '<label><input type="checkbox" name="is_featured" value="yes" ' . checked($is_featured, 'yes', false) . ' /> Yes, feature this project on the homepage</label>';
}

function concrete_theme_save_featured_meta($post_id) {
    if (!isset($_POST['featured_project_nonce']) || !wp_verify_nonce($_POST['featured_project_nonce'], 'save_featured_project')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    if (isset($_POST['is_featured'])) {
        update_post_meta($post_id, '_is_featured', 'yes');
    } else {
        delete_post_meta($post_id, '_is_featured');
    }
}
add_action('save_post_project', 'concrete_theme_save_featured_meta');
?>
