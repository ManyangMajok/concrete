<?php /* Template Name: services */ ?>
<?php get_header(); ?>
    <style>
      .page-header { background-color: var(--darker); padding: 150px 0 80px; text-align: center; color: var(--white); }
      .page-header h1 { font-size: 3.5rem; color: var(--white); margin-bottom: 15px; }
      .page-header p { font-size: 1.1rem; color: #CBD5E1; max-width: 600px; margin: 0 auto; }
      
      .services-section { padding: 80px 0; background-color: var(--light); }
      .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
      
      .service-card { background-color: var(--white); border-radius: 15px; padding: 40px 30px; text-align: center; box-shadow: var(--shadow); transition: transform 0.3s, box-shadow 0.3s; display: flex; flex-direction: column; align-items: center; }
      .service-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-lg); }
      
      .icon-wrapper { width: 70px; height: 70px; background-color: rgba(0, 163, 224, 0.1); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin-bottom: 25px; transition: background-color 0.3s, color 0.3s; }
      .service-card:hover .icon-wrapper { background-color: var(--primary); color: var(--white); }
      
      .service-card h3 { font-size: 1.3rem; margin-bottom: 15px; color: var(--darker); }
      .service-card p { color: var(--text); font-size: 0.95rem; line-height: 1.6; margin-bottom: 0; }
      
      @media (max-width: 992px) { .services-grid { grid-template-columns: repeat(2, 1fr); } }
      @media (max-width: 768px) { .services-grid { grid-template-columns: 1fr; } }
    </style>

    <!-- Page Header -->
    <section class="page-header">
      <div class="container fade-in-up">
        <h1>Our Services</h1>
        <p>Comprehensive concrete solutions ranging from large-scale civil pours to custom residential hardscaping.</p>
      </div>
    </section>

    <!-- Detailed Services -->
    <section class="services-section">
      <div class="container">
        <div class="services-grid">
          <?php
          $services_query = new WP_Query(array(
              'post_type' => 'service',
              'posts_per_page' => -1,
              'order' => 'ASC',
              'orderby' => 'title' // Or menu_order if defined, but title is fine for now
          ));

          $delay = 0;
          if ($services_query->have_posts()) :
              while ($services_query->have_posts()) : $services_query->the_post();
                  $icon = get_post_meta(get_the_ID(), '_service_icon', true) ?: 'fa-hammer';
                  $delay_class = $delay > 0 ? 'delay-' . $delay : '';
                  ?>
                  <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit; display: block;">
                      <div class="service-card fade-in-up <?php echo $delay_class; ?>" style="height: 100%; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="icon-wrapper"><i class="fa-solid <?php echo esc_attr($icon); ?>"></i></div>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <span style="display: inline-block; margin-top: 15px; color: var(--primary); font-weight: 600;">Learn More <i class="fa-solid fa-arrow-right"></i></span>
                      </div>
                  </a>
                  <?php
                  $delay++;
                  if ($delay > 2) $delay = 0;
              endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>
        
        <div class="text-center" style="margin-top: 50px;">
            <p style="font-size: 1.2rem; color: var(--darker); font-weight: 600;">...And Any Concrete Related Work!</p>
            <a href="#" class="btn btn-primary quote-trigger" style="margin-top: 15px;">Get a Free Quote <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
