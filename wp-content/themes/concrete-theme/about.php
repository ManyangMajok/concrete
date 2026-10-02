<?php /* Template Name: about */ ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us | Conc Care Group</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/src/style.css" />
    <style>
      .page-header { background-color: var(--darker); padding: 150px 0 80px; text-align: center; color: var(--white); }
      .page-header h1 { font-size: 3.5rem; color: var(--white); margin-bottom: 15px; }
      .page-header p { font-size: 1.1rem; color: #CBD5E1; max-width: 600px; margin: 0 auto; }
      
      .about-content { padding: 80px 0; }
      
      /* Timeline specific styles */
      .timeline-section { padding: 80px 0; background-color: var(--light); }
      .timeline { position: relative; max-width: 800px; margin: 0 auto; }
      .timeline::after { content: ''; position: absolute; width: 4px; background-color: var(--primary); top: 0; bottom: 0; left: 50%; margin-left: -2px; }
      .timeline-container { padding: 10px 40px; position: relative; background-color: inherit; width: 50%; }
      .timeline-container::after { content: ''; position: absolute; width: 20px; height: 20px; right: -10px; background-color: var(--white); border: 4px solid var(--primary); top: 15px; border-radius: 50%; z-index: 1; }
      .left-timeline { left: 0; }
      .right-timeline { left: 50%; }
      .right-timeline::after { left: -10px; }
      .timeline-content { padding: 20px 30px; background-color: var(--white); position: relative; border-radius: 10px; box-shadow: var(--shadow); }
      .timeline-content h3 { color: var(--darker); margin-bottom: 5px; }
      .timeline-content span { color: var(--primary); font-weight: bold; margin-bottom: 10px; display: block; }
      
      @media screen and (max-width: 768px) {
        .timeline::after { left: 31px; }
        .timeline-container { width: 100%; padding-left: 70px; padding-right: 25px; }
        .timeline-container::after { left: 21px; }
        .right-timeline { left: 0%; }
      }
    </style>
  <?php wp_head(); ?>
</head>
  <body>
    <!-- Navbar -->
    <nav class="navbar scrolled" style="position: fixed; background-color: var(--white); box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 15px 0;">
      <div class="nav-container">
        <a href="<?php echo home_url('/'); ?>" class="logo" style="text-decoration: none; display: flex; align-items: center;">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png" alt="CONC CARE GROUP Logo" class="logo-for-dark" style="height: 60px; width: auto;" />
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.png" alt="CONC CARE GROUP Logo" class="logo-for-light" style="height: 60px; width: auto; display: none;" />
        </a>
        <ul class="nav-links">
          <li><a href="<?php echo home_url('/'); ?>" style="color: var(--darker);">Home</a></li>
          <li><a href="<?php echo home_url('/about/'); ?>" style="color: var(--primary);">About Us</a></li>
          <li><a href="<?php echo home_url('/services/'); ?>" style="color: var(--darker);">Services</a></li>
          <li><a href="<?php echo home_url('/projects/'); ?>" style="color: var(--darker);">Projects</a></li>
          <li><a href="<?php echo home_url('/team/'); ?>" style="color: var(--darker);">Our Team</a></li>
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
        <h1>About Conc Care Group</h1>
        <p>Decades of experience in delivering high-quality, durable concrete solutions for commercial and residential needs.</p>
      </div>
    </section>

    <!-- Detailed About Section -->
    <section class="about-content section-padding">
      <div class="container about-grid">
        <div class="about-text fade-in-up">
          <h2>Our Mission & Vision</h2>
          <p>At Conc Care Group, our mission is to build foundations that last generations. We are committed to using the highest grade materials and advanced engineering techniques to ensure structural integrity and aesthetic excellence.</p>
          <p>Founded on the principles of hard work, consistency, and innovation, we have grown to become an industry leader in concrete pouring, finishing, and structural repair.</p>
          
          <h3 style="margin-top: 30px; margin-bottom: 15px;">Core Values</h3>
          <ul class="features-list">
            <li><i class="fa-solid fa-circle-check"></i> <strong>Integrity:</strong> Honest assessments and transparent pricing.</li>
            <li><i class="fa-solid fa-circle-check"></i> <strong>Quality:</strong> Never cutting corners on materials or curing times.</li>
            <li><i class="fa-solid fa-circle-check"></i> <strong>Safety First:</strong> Strict adherence to OSHA standards on every site.</li>
            <li><i class="fa-solid fa-circle-check"></i> <strong>Innovation:</strong> Utilizing the latest admixtures and finishing tech.</li>
          </ul>
        </div>
        <div class="about-images fade-in-up delay-1">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/pour.jpg" alt="Construction Work" style="width: 100%; border-radius: 20px; box-shadow: var(--shadow);" />
        </div>
      </div>
    </section>

    <!-- Company Timeline Section -->
    <section class="timeline-section">
      <div class="container">
        <div class="section-header text-center" style="margin-bottom: 60px;">
          <h2>Our History</h2>
          <p>Building a legacy, one pour at a time.</p>
        </div>
        
        <div class="timeline">
          <div class="timeline-container left-timeline slide-in-left">
            <div class="timeline-content">
              <span>1998</span>
              <h3>Company Founded</h3>
              <p>Conc Care Group started as a small, family-owned residential driveway business with a single mixer truck.</p>
            </div>
          </div>
          <div class="timeline-container right-timeline slide-in-right">
            <div class="timeline-content">
              <span>2005</span>
              <h3>Commercial Expansion</h3>
              <p>Secured our first major commercial contract for the Downtown Plaza foundations, expanding our fleet.</p>
            </div>
          </div>
          <div class="timeline-container left-timeline slide-in-left">
            <div class="timeline-content">
              <span>2012</span>
              <h3>Structural Repair Division</h3>
              <p>Launched a dedicated structural repair and epoxy injection team to service aging infrastructure.</p>
            </div>
          </div>
          <div class="timeline-container right-timeline slide-in-right">
            <div class="timeline-content">
              <span>2020</span>
              <h3>Eco-Friendly Initiative</h3>
              <p>Began incorporating recycled materials and low-carbon cement into our standard commercial pours.</p>
            </div>
          </div>
          <div class="timeline-container left-timeline slide-in-left">
            <div class="timeline-content">
              <span>Today</span>
              <h3>Industry Leader</h3>
              <p>Operating with over 50 trucks and 200+ dedicated professionals across multiple states.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <div class="footer-col">
            <a href="<?php echo home_url('/'); ?>" class="logo footer-logo" style="text-decoration: none; display: flex; align-items: center;">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png" alt="CONC CARE GROUP Logo" style="height: 60px; width: auto;" />
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

