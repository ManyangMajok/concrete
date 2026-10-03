<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/src/assets/images/favicon.svg?v=6" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="nav-container">
        <a href="<?php echo home_url('/'); ?>" class="logo" style="text-decoration: none; display: flex; align-items: center;">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-dark" style="height: 60px; width: auto;" />
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-light" style="height: 60px; width: auto; display: none;" />
        </a>
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-links',
                'fallback_cb' => false
            ));
        } else {
            // Fallback
            echo '<ul class="nav-links">';
            echo '<li><a href="' . home_url('/') . '">Home</a></li>';
            echo '<li><a href="' . home_url('/about/') . '">About Us</a></li>';
            echo '<li><a href="' . home_url('/services/') . '">Services</a></li>';
            echo '<li><a href="' . home_url('/projects/') . '">Projects</a></li>';
            echo '<li><a href="' . home_url('/team/') . '">Our Team</a></li>';
            echo '</ul>';
        }
        ?>
        <div class="nav-actions">
          <a href="#" class="btn btn-primary quote-trigger">Get Quote</a>
          <button class="mobile-menu-btn" style="color: var(--darker);"><i class="fa-solid fa-bars"></i></button>
        </div>
      </div>
    </nav>
