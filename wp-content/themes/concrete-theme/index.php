<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conc Care Group | Modern Construction & Concrete Solutions</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/src/style.css?v=<?php echo time(); ?>" />
  <?php wp_head(); ?>
</head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="nav-container">
        <a href="<?php echo home_url('/'); ?>" class="logo" style="text-decoration: none; display: flex; align-items: center;">
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-dark" style="height: 60px; width: auto;" />
          <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.png?v=<?php echo time(); ?>" alt="CONC CARE GROUP Logo" class="logo-for-light" style="height: 60px; width: auto; display: none;" />
        </a>
        <ul class="nav-links">
          <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
          <li><a href="<?php echo home_url('/about/'); ?>">About Us</a></li>
          <li><a href="<?php echo home_url('/services/'); ?>">Services</a></li>
          <li><a href="<?php echo home_url('/projects/'); ?>">Projects</a></li>
          <li><a href="<?php echo home_url('/team/'); ?>">Our Team</a></li>
        </ul>
        <div class="nav-actions">
          <a href="#" class="btn btn-primary quote-trigger">Get Quote</a>
          <button class="mobile-menu-btn" style="color: var(--darker);"><i class="fa-solid fa-bars"></i></button>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
      <div class="hero-content fade-in-up">
        <h1>We Build Something <span class="highlight">Solid And Consistent.</span></h1>
        <p>Your ideas and designs are transformed by us into long-lasting, engineered concrete structures. Excellence in every pour.</p>
        <div class="hero-btns fade-in-up delay-2">
          <a href="#" class="btn btn-primary quote-trigger">Get Started <i class="fa-solid fa-arrow-right"></i></a>
          <a href="<?php echo home_url('/services/'); ?>" class="btn btn-outline">Our Services <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="hero-image fade-in-left">
        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Construction Worker" class="main-img" />
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section-padding">
      <div class="container about-grid">
        <div class="about-text slide-in-left">
          <h2>Welcome To Concrete <br>Real Solution.</h2>
          <p>We provide top-tier concrete solutions for commercial and residential projects. Our expertise ensures durability, strength, and aesthetic appeal in every structure.</p>
          <ul class="features-list">
            <li><i class="fa-solid fa-circle-check"></i> High-quality ready-mix concrete</li>
            <li><i class="fa-solid fa-circle-check"></i> Advanced structural engineering</li>
            <li><i class="fa-solid fa-circle-check"></i> Expert pouring and finishing</li>
            <li><i class="fa-solid fa-circle-check"></i> On-time project delivery</li>
          </ul>
          <a href="<?php echo home_url('/about/'); ?>" class="btn btn-primary">Read More <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="about-images slide-in-right">
          <!-- Puzzle shape mask using CSS -->
          <div class="image-mask-container">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/mixer.jpg" alt="Concrete Mixer Truck" class="mask-img-1" />
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/pour.jpg" alt="Concrete Pouring" class="mask-img-2" />
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section-padding bg-light">
      <div class="container">
        <div class="section-header">
          <h2>We Provide Services</h2>
          <p>Delivering exceptional concrete services tailored to meet the demands of modern infrastructure.</p>
        </div>
        <div class="services-grid">
          <!-- Service Card 1 -->
          <div class="service-card fade-in-up">
            <div class="icon-wrapper"><i class="fa-solid fa-building"></i></div>
            <h3>Commercial Concrete</h3>
            <p>High-capacity foundations, slabs, and structural concrete for commercial buildings.</p>
            <a href="#" class="btn btn-outline-small quote-trigger" data-service="commercial">Get Started <i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <!-- Service Card 2 (Active/Highlighted) -->
          <div class="service-card active fade-in-up delay-1">
            <div class="icon-wrapper"><i class="fa-solid fa-house"></i></div>
            <h3>Residential Foundations</h3>
            <p>Reliable and durable concrete foundations, driveways, and patios for homes.</p>
            <a href="#" class="btn btn-primary-small quote-trigger" data-service="residential">Get Started <i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <!-- Service Card 3 -->
          <div class="service-card fade-in-up delay-2">
            <div class="icon-wrapper"><i class="fa-solid fa-hammer"></i></div>
            <h3>Structural Repair</h3>
            <p>Expert concrete repair and reinforcement to extend the lifespan of structures.</p>
            <a href="#" class="btn btn-outline-small quote-trigger" data-service="repair">Get Started <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="slider-controls">
          <button class="control-btn"><i class="fa-solid fa-arrow-left"></i></button>
          <button class="control-btn active"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section-padding">
      <div class="container testimonial-grid">
        <div class="testimonial-header slide-in-left">
          <h2>Hear From Our Satisfied Clients</h2>
          <p>We pride ourselves on delivering quality concrete work that exceeds expectations. See what our partners have to say.</p>
        </div>
        <div class="testimonial-cards slide-in-right">
          <div class="t-card back-card">
            <div class="t-profile">
              <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer1.jpg" alt="Client 2" />
              <div>
                <h4>Johan Mickel</h4>
                <span>Project Manager</span>
              </div>
            </div>
            <div class="stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p>"Outstanding concrete work on our latest commercial development."</p>
          </div>
          <div class="t-card front-card">
            <div class="t-profile">
              <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/engineer2.jpg" alt="Client 1" />
              <div>
                <h4>Larem Jemes</h4>
                <span>Civil Engineer</span>
              </div>
            </div>
            <div class="stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <p>"The team delivered exceptional quality with the ready-mix pour. Highly recommended."</p>
          </div>
          <div class="slider-controls t-controls">
            <button class="control-btn"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="control-btn active"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </section>

    <!-- News & Projects Section -->
    <section id="projects" class="news section-padding bg-light">
      <div class="container">
        <div class="news-header">
          <div>
            <h2>Latest Projects and News</h2>
            <p>Stay updated with our recent concrete pours and construction achievements.</p>
          </div>
          <a href="<?php echo home_url('/projects/'); ?>" class="btn btn-primary-small">See All <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="news-grid">
          <div class="news-main fade-in-up">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/commercial.jpg" alt="Large Concrete Project" />
            <div class="news-content">
              <h3>Massive Foundation Pour for City Mall</h3>
              <p>Over 10,000 cubic yards of concrete successfully poured in record time.</p>
              <a href="<?php echo home_url('/projects/'); ?>" class="read-more"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="news-side">
            <div class="news-item fade-in-up delay-1">
              <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/repair.jpg" alt="Bridge Concrete Project" />
              <div class="news-content">
                <h3>Bridge Pier Reinforcement</h3>
                <p>Advanced structural repair completed.</p>
                <a href="<?php echo home_url('/projects/'); ?>" class="read-more"><i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            <div class="news-item fade-in-up delay-2">
              <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/residential.jpg" alt="Residential Concrete Project" />
              <div class="news-content">
                <h3>Residential Driveway Finishing</h3>
                <p>High-quality stamped concrete work.</p>
                <a href="<?php echo home_url('/projects/'); ?>" class="read-more"><i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section section-padding" style="background-color: var(--white);">
      <div class="container">
        <div class="section-header fade-in-up">
          <h2>Frequently Asked Questions</h2>
          <p>Everything you need to know about our concrete services and process.</p>
        </div>
        
        <div class="faq-container fade-in-up delay-1">
          <div class="faq-item">
            <button class="faq-question">
              <span>How long does concrete take to cure?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>While concrete usually sets within 24 to 48 hours allowing for foot traffic, it takes about 28 days to reach its full structural strength. We typically recommend waiting at least 7 days before driving standard vehicles on a new driveway.</p>
            </div>
          </div>
          
          <div class="faq-item">
            <button class="faq-question">
              <span>Do you offer free estimates?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Yes! We offer completely free, no-obligation estimates for all commercial and residential projects. Just click any "Get Quote" button on our site to schedule an evaluation.</p>
            </div>
          </div>
          
          <div class="faq-item">
            <button class="faq-question">
              <span>Can concrete be poured in cold weather?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Yes, but it requires special precautions. We use specialized heated blankets, warm water mixes, and accelerating admixtures to ensure the concrete cures correctly even when temperatures drop below freezing.</p>
            </div>
          </div>
          
          <div class="faq-item">
            <button class="faq-question">
              <span>What is stamped concrete?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="faq-answer">
              <p>Stamped concrete is concrete that is patterned and/or textured or embossed to resemble brick, slate, flagstone, stone, tile, wood, and various other patterns and textures. It's a highly durable and cost-effective alternative to natural materials.</p>
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

    <script type="module" src="<?php echo get_template_directory_uri(); ?>/src/main.js"></script>
  <?php wp_footer(); ?>
</body>
</html>

