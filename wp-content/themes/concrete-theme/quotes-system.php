<?php
// Register Quotes Custom Post Type
function concrete_register_quotes_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Quotes',
            'singular_name' => 'Quote Request',
            'menu_name' => 'Quotes',
            'all_items' => 'All Quotes'
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array('title', 'editor'),
        'capability_type' => 'post',
        'map_meta_cap' => true,
    );
    register_post_type('quote_request', $args);
}
add_action('init', 'concrete_register_quotes_cpt');

// Setup Meta Columns for Quotes
function concrete_quotes_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => 'Name',
        'email' => 'Email',
        'service' => 'Service',
        'date' => 'Date'
    );
    return $columns;
}
add_filter('manage_quote_request_posts_columns', 'concrete_quotes_columns');

function concrete_quotes_custom_column($column, $post_id) {
    switch ($column) {
        case 'email':
            echo esc_html(get_post_meta($post_id, '_quote_email', true));
            break;
        case 'service':
            echo esc_html(get_post_meta($post_id, '_quote_service', true));
            break;
    }
}
add_action('manage_quote_request_posts_custom_column', 'concrete_quotes_custom_column', 10, 2);

// Handle AJAX Request
function concrete_handle_quote_submission() {
    check_ajax_referer('quote_request_nonce', 'nonce');

    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);
    
    if (empty($first_name) || empty($last_name) || empty($email)) {
        wp_send_json_error(array('message' => 'Missing required fields.'));
        wp_die();
    }

    $title = $first_name . ' ' . $last_name;
    
    $post_data = array(
        'post_title' => $title,
        'post_content' => $message,
        'post_status' => 'publish',
        'post_type' => 'quote_request'
    );
    
    $post_id = wp_insert_post($post_data);
    
    if ($post_id) {
        update_post_meta($post_id, '_quote_email', $email);
        update_post_meta($post_id, '_quote_service', $service);
        
        // Send Email Notification to Admin
        $to = get_option('admin_email');
        $subject = 'New Quote Request from ' . $title;
        $body = "You have received a new quote request from your website.\n\n" .
                "Name: $title\n" .
                "Email: $email\n" .
                "Service Requested: $service\n\n" .
                "Project Details:\n$message\n\n" .
                "View it in your WordPress Dashboard: " . admin_url("post.php?post=$post_id&action=edit");
        
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        wp_mail($to, $subject, $body, $headers);

        // Send Auto-responder to the Client
        $client_subject = 'We received your quote request - Conc Care Group';
        $client_body = "Hi $first_name,\n\n" .
                       "Thank you for reaching out to Conc Care Group! This is an automated message to confirm that we have received your quote request for: $service.\n\n" .
                       "Our estimation team is reviewing your project details and will get back to you within 24 hours.\n\n" .
                       "Best regards,\n" .
                       "The Conc Care Group Team\n" .
                       "STRONG FOUNDATIONS, A BRIGHTER TOMORROW";
        wp_mail($email, $client_subject, $client_body, $headers);
        
        wp_send_json_success(array('message' => 'Quote submitted successfully!'));
    } else {
        wp_send_json_error(array('message' => 'Failed to save quote.'));
    }
    wp_die();
}
add_action('wp_ajax_submit_quote_request', 'concrete_handle_quote_submission');
add_action('wp_ajax_nopriv_submit_quote_request', 'concrete_handle_quote_submission');
?>
