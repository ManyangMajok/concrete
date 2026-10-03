<?php /* Template Name: team */ ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Our Team | Conc Care Group</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/src/style.css?v=<?php echo time(); ?>" />
    <style>
      .page-header { background-color: var(--darker); padding: 150px 0 80px; text-align: center; color: var(--white); }
      .page-header h1 { font-size: 3.5rem; color: var(--white); margin-bottom: 15px; }
      .page-header p { font-size: 1.1rem; color: #CBD5E1; max-width: 600px; margin: 0 auto; }
      .team-section { padding: 80px 0; }
      .team-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; }
      .team-member { text-align: center; background-color: var(--white); padding: 20px; border-radius: 15px; box-shadow: var(--shadow); transition: transform 0.3s ease; }
      .team-member img { width: 100%; aspect-ratio: 1/1; object-fit: cover; border-radius: 10px; margin-bottom: 20px; }
      .team-member:hover { transform: translateY(-10px); }
      .team-member h3 { font-size: 1.3rem; margin-bottom: 5px; color: var(--darker); }
      .team-member p { color: var(--primary); font-weight: 600; font-size: 0.95rem; margin-bottom: 15px; }
      .team-member .bio { color: var(--text); font-size: 0.9rem; font-weight: 400; line-height: 1.5; }
      
      @media (max-width: 992px) { .team-grid { grid-template-columns: repeat(2, 1fr); } }
      @media (max-width: 768px) { .team-grid { grid-template-columns: 1fr; } }
    </style>
  <?php wp_head(); ?>
</head>
  <body>
    <!-- Navbar -->
    <nav class="navbar scrolled" style="position: fixed; background-color: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 15px 0;">
      <div class="nav-container">
        <a href="<?php echo home_url('/'); ?>" class="logo" style="text-decoration: none; display: flex; align-items: center;">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-dark" style="height: 60px; width: auto;" />
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-light" style="height: 60px; width: auto; display: none;" />
        </a>
        <ul class="nav-links">
          <li><a href="<?php echo home_url('/'); ?>" style="color: var(--darker);">Home</a></li>
          <li><a href="<?php echo home_url('/about/'); ?>" style="color: var(--darker);">About Us</a></li>
          <li><a href="<?php echo home_url('/services/'); ?>" style="color: var(--darker);">Services</a></li>
          <li><a href="<?php echo home_url('/projects/'); ?>" style="color: var(--darker);">Projects</a></li>
          <li><a href="<?php echo home_url('/team/'); ?>" style="color: var(--primary);">Our Team</a></li>
        </ul>
        <div class="nav-actions">
          <a href="#" class="btn btn-primary quote-trigger">Get Quote</a>
          <button class="mobile-menu-btn" style="color: var(--darker);"><i class="fa-solid fa-bars"></i></button>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
      <div class="container fade-in-up">
        <h1>Meet the Experts</h1>
        <p>The dedicated engineers, foremen, and specialists behind every successful pour.</p>
      </div>
    </section>

    <!-- Team Grid -->
    <section class="team-section">
      <div class="container team-grid">
        <div class="team-member fade-in-up delay-1">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer1.jpg" alt="Michael Harris" />
          <h3>Michael Harris</h3>
          <p>Chief Structural Engineer</p>
          <div class="bio">With 15 years in civil engineering, Michael ensures every design exceeds structural load requirements safely.</div>
        </div>
        <div class="team-member fade-in-up delay-2">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer3.jpg" alt="David Chen" />
          <h3>David Chen</h3>
          <p>Lead Site Foreman</p>
          <div class="bio">David has managed over 200 pours, coordinating logistics and managing teams to keep projects strictly on schedule.</div>
        </div>
        <div class="team-member fade-in-up delay-1">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer2.jpg" alt="Sarah Jenkins" />
          <h3>Sarah Jenkins</h3>
          <p>Project Manager</p>
          <div class="bio">Sarah acts as the primary liaison for our commercial clients, handling budgeting, timelines, and procurement.</div>
        </div>
        <div class="team-member fade-in-up delay-2">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer4.jpg" alt="Robert Fox" />
          <h3>Robert Fox</h3>
          <p>Quality Assurance Lead</p>
          <div class="bio">Robert's meticulous eye ensures finishing and curing processes result in zero defects and maximum durability.</div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="footer-top">
          <div class="footer-col">
            <a href="<?php echo home_url('/'); ?>" class="logo footer-logo" style="text-decoration: none; display: flex; align-items: center;">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" style="height: 60px; width: auto;" />
          </a>
            <p style="color: #94A3B8; font-size: 0.95rem; line-height: 1.6; margin-top: -10px;">More Than Concrete.<br>A Stronger Future.</p>
            <div class="social-links" style="margin-top: 10px;">
              <a href="#"><i class="fa-brands fa-twitter"></i></a>
              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
          </div>
          
          <div class="footer-col">
            <h3>Quick Links</h3>
            <ul class="footer-links">
              <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
              <li><a href="<?php echo home_url('/about/'); ?>">About Us</a></li>
              <li><a href="<?php echo home_url('/services/'); ?>">Services</a></li>
              <li><a href="<?php echo home_url('/projects/'); ?>">Projects</a></li>
              <li><a href="<?php echo home_url('/team/'); ?>">Our Team</a></li>
            </ul>
          </div>
          
          <div class="footer-col">
            <h3>Contact Us</h3>
            <div class="footer-contact-info">
              <p><i class="fa-solid fa-phone"></i> 0430 922 430</p>
              <p><i class="fa-solid fa-envelope"></i> Ccgconcrete24@gmail.com</p>
              <p><i class="fa-solid fa-clock"></i> Mon-Fri: 7:00 AM - 5:00 PM</p>
              <p><i class="fa-solid fa-location-dot"></i> Servicing Perth & Surrounding Areas</p>
            </div>
          </div>
        </div>
        <div class="footer-bottom" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-top: 20px;">
          <p>&copy; <?php echo date('Y'); ?> Conc Care Group. All rights reserved.</p>
          <p style="margin: 0; font-size: 0.85rem;">ABN: 12 345 678 901 (Example)</p>
        </div>
      </div>
    </footer>


  <?php wp_footer(); ?>
</body>
</html>

