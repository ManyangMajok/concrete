<?php
/**
 * Services System - Registers the 'service' Custom Post Type and seeds initial data.
 */

function ccg_register_service_cpt() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Service', 'textdomain' ),
        'new_item'              => __( 'New Service', 'textdomain' ),
        'edit_item'             => __( 'Edit Service', 'textdomain' ),
        'view_item'             => __( 'View Service', 'textdomain' ),
        'all_items'             => __( 'All Services', 'textdomain' ),
        'search_items'          => __( 'Search Services', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Services:', 'textdomain' ),
        'not_found'             => __( 'No services found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'ccg_register_service_cpt' );

// Function to auto-create default services if they don't exist
function ccg_seed_default_services() {
    $services = array(
        array(
            'title' => 'House Slabs',
            'slug' => 'house-slabs',
            'desc' => 'We specialize in strong, highly durable concrete house slabs designed to provide the perfect foundation for your new residential build.',
            'icon' => 'fa-house',
            'img' => 'service-house-slabs.jpg'
        ),
        array(
            'title' => 'Granny Flat Slabs',
            'slug' => 'granny-flat-slabs',
            'desc' => 'Expertly poured foundation slabs for backyard granny flats, sheds, and outbuildings, perfectly leveled for immediate construction.',
            'icon' => 'fa-house-chimney',
            'img' => 'service-granny-flat.jpg'
        ),
        array(
            'title' => 'House Footings',
            'slug' => 'house-footings',
            'desc' => 'Deep and robust concrete footings to ensure your structural integrity meets all engineering and local council requirements.',
            'icon' => 'fa-trowel',
            'img' => 'service-footings.jpg'
        ),
        array(
            'title' => 'Driveways',
            'slug' => 'driveways',
            'desc' => 'Transform your property with a beautiful, high-quality concrete driveway. Available in exposed aggregate, stamped, or standard finish.',
            'icon' => 'fa-car',
            'img' => 'service-driveways.jpg'
        ),
        array(
            'title' => 'Garages & Sheds',
            'slug' => 'garages-sheds',
            'desc' => 'Smooth, perfectly leveled interior concrete floors for residential garages and commercial sheds designed for heavy vehicle loads.',
            'icon' => 'fa-warehouse',
            'img' => 'service-garages.jpg'
        ),
        array(
            'title' => 'Alfresco Areas',
            'slug' => 'alfresco-areas',
            'desc' => 'Stylish stamped and decorative concrete for your alfresco patio or outdoor entertainment area, elevating your backyard aesthetics.',
            'icon' => 'fa-umbrella-beach',
            'img' => 'service-alfresco.jpg'
        ),
        array(
            'title' => 'Paths & Walkways',
            'slug' => 'paths-walkways',
            'desc' => 'Clean, sweeping concrete pathways around your house that add curb appeal and functional, mud-free access to all areas.',
            'icon' => 'fa-shoe-prints',
            'img' => 'service-paths.jpg'
        ),
        array(
            'title' => 'Crossovers',
            'slug' => 'crossovers',
            'desc' => 'Council-approved concrete crossovers meeting all local regulations, providing a seamless transition from street to driveway.',
            'icon' => 'fa-road',
            'img' => 'service-crossovers.jpg'
        ),
        array(
            'title' => 'Concrete Cutting',
            'slug' => 'concrete-cutting',
            'desc' => 'Professional concrete cutting services using high-powered saws for precision expansion joints, removals, and trenches.',
            'icon' => 'fa-scissors',
            'img' => 'service-cutting.jpg'
        ),
        array(
            'title' => 'Pressure Washing',
            'slug' => 'pressure-washing',
            'desc' => 'Revitalize your old, dirty concrete driveways and paths with our high-pressure washing service, restoring it to look brand new.',
            'icon' => 'fa-shower',
            'img' => 'service-washing.jpg'
        ),
        array(
            'title' => 'Concrete Repairs',
            'slug' => 'concrete-repairs',
            'desc' => 'Expert structural repair and patching of cracked or damaged concrete walls and slabs to extend their lifespan.',
            'icon' => 'fa-hammer',
            'img' => 'service-repairs.jpg'
        ),
        array(
            'title' => 'Commercial & Civil Works',
            'slug' => 'commercial-civil-works',
            'desc' => 'Large-scale commercial and civil concrete solutions including massive foundation slabs, carparks, and heavy infrastructure.',
            'icon' => 'fa-building',
            'img' => 'service-commercial.jpg'
        )
    );

    foreach ($services as $srv) {
        $existing = get_page_by_path($srv['slug'], OBJECT, 'service');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'    => $srv['title'],
                'post_name'     => $srv['slug'],
                'post_content'  => $srv['desc'],
                'post_excerpt'  => $srv['desc'],
                'post_status'   => 'publish',
                'post_type'     => 'service'
            ));

            if ($post_id) {
                // Save icon meta
                update_post_meta($post_id, '_service_icon', $srv['icon']);
                
                // We will skip programmatically attaching the featured image for now to save complexity with WordPress attachment sideloading, 
                // instead we will just save the image filename to meta and use it in the template directly if no thumbnail is set!
                update_post_meta($post_id, '_service_image_filename', $srv['img']);
            }
        }
    }
}
// Seed on init, runs fast if already exists
add_action( 'init', 'ccg_seed_default_services' );

// Add meta box for Service Icon
function ccg_service_meta_boxes() {
    add_meta_box(
        'ccg_service_details',
        'Service Details',
        'ccg_service_details_callback',
        'service',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ccg_service_meta_boxes' );

function ccg_service_details_callback( $post ) {
    wp_nonce_field( 'ccg_service_save_meta_box_data', 'ccg_service_meta_box_nonce' );
    $icon = get_post_meta( $post->ID, '_service_icon', true );
    $img_filename = get_post_meta( $post->ID, '_service_image_filename', true );

    echo '<label for="ccg_service_icon">FontAwesome Icon Class (e.g. fa-house):</label>';
    echo '<input type="text" id="ccg_service_icon" name="ccg_service_icon" value="' . esc_attr( $icon ) . '" size="25" style="width:100%; margin-bottom: 10px;" />';
    
    echo '<label for="ccg_service_image_filename">Fallback Image Filename:</label>';
    echo '<input type="text" id="ccg_service_image_filename" name="ccg_service_image_filename" value="' . esc_attr( $img_filename ) . '" size="25" style="width:100%;" />';
}

function ccg_service_save_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['ccg_service_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ccg_service_meta_box_nonce'], 'ccg_service_save_meta_box_data' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['ccg_service_icon'] ) ) {
        update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['ccg_service_icon'] ) );
    }
    if ( isset( $_POST['ccg_service_image_filename'] ) ) {
        update_post_meta( $post_id, '_service_image_filename', sanitize_text_field( $_POST['ccg_service_image_filename'] ) );
    }
}
add_action( 'save_post', 'ccg_service_save_meta_box_data' );
