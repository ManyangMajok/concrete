<?php /* Template Name: projects */ ?>
<?php get_header(); ?>
    <style>
      .page-header { background-color: var(--darker); padding: 150px 0 80px; text-align: center; color: var(--white); }
      .page-header h1 { font-size: 3.5rem; color: var(--white); margin-bottom: 15px; }
      .page-header p { font-size: 1.1rem; color: #CBD5E1; max-width: 600px; margin: 0 auto; }
      
      .filter-bar { display: flex; justify-content: center; gap: 15px; padding: 40px 0 20px; flex-wrap: wrap; }
      .filter-btn { padding: 10px 25px; border: 2px solid var(--primary); background: transparent; border-radius: 30px; color: var(--darker); font-weight: 600; cursor: pointer; transition: all 0.3s; font-family: 'Outfit', sans-serif; }
      .filter-btn:hover, .filter-btn.active { background-color: var(--primary); color: var(--darker); }
      
      .blog-grid-section { padding: 40px 0 80px; background-color: var(--light); }
      .blog-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
      
      .blog-card { background-color: var(--white); border-radius: 15px; overflow: hidden; box-shadow: var(--shadow); transition: transform 0.3s ease, box-shadow 0.3s ease; display: flex; flex-direction: column; }
      .blog-card.hidden { display: none !important; }
      .blog-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15); }
      
      .blog-img-wrapper { width: 100%; aspect-ratio: 16/9; overflow: hidden; position: relative; }
      .blog-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
      .blog-card:hover .blog-img-wrapper img { transform: scale(1.05); }
      
      .blog-content { padding: 30px; flex-grow: 1; display: flex; flex-direction: column; }
      .blog-category { color: var(--primary); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; display: inline-block; }
      .blog-title { font-size: 1.5rem; margin-bottom: 15px; color: var(--darker); line-height: 1.3; }
      .blog-excerpt { color: #64748B; font-size: 1rem; margin-bottom: 25px; line-height: 1.6; flex-grow: 1; }
      
      .blog-read-more { font-weight: 600; color: var(--darker); display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; margin-top: auto; }
      .blog-read-more i { font-size: 0.85rem; transition: transform 0.3s; }
      .blog-read-more:hover { color: var(--primary); }
      .blog-read-more:hover i { transform: translateX(5px); }
      
      @media (max-width: 992px) { .blog-grid { grid-template-columns: repeat(2, 1fr); } }
      @media (max-width: 768px) { .blog-grid { grid-template-columns: 1fr; gap: 30px; } }
    </style>

    <!-- Page Header -->
    <section class="page-header">
      <div class="container fade-in-up">
        <h1>Our Featured Projects</h1>
        <p>Explore our latest concrete pours, structural repairs, and detailed construction methodologies.</p>
      </div>
    </section>
    
    <!-- Filter Bar -->
    <div class="container" style="background-color: var(--light); padding-top: 40px; border-radius: 20px 20px 0 0; margin-top: -20px; position: relative; z-index: 2;">
      <div class="filter-bar fade-in-up" style="padding-top: 0;">
        <button class="filter-btn active" data-filter="all">All Projects</button>
        <?php
        $terms = get_terms(array('taxonomy' => 'project_category', 'hide_empty' => true));
        foreach ($terms as $term) {
            echo '<button class="filter-btn" style="text-transform: capitalize;" data-filter="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</button>';
        }
        ?>
      </div>
    </div>

    <!-- Blog Grid -->
    <section class="blog-grid-section">
      <div class="container blog-grid">
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);
        $delay = 1;
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $terms = get_the_terms(get_the_ID(), 'project_category');
                $term_slug = $terms ? $terms[0]->slug : '';
                $term_name = $terms ? $terms[0]->name : 'Article';
                
                $img_url = get_post_meta(get_the_ID(), '_project_image_url', true);
                if (has_post_thumbnail()) {
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                }
                
                $delay_class = 'delay-' . $delay;
                $delay = $delay == 1 ? 2 : 1;
        ?>
        <article class="blog-card fade-in-up <?php echo $delay_class; ?>" data-category="<?php echo esc_attr($term_slug); ?>">
          <a href="<?php the_permalink(); ?>" class="blog-img-wrapper">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" />
          </a>
          <div class="blog-content">
            <span class="blog-category"><?php echo esc_html($term_name); ?></span>
            <a href="<?php the_permalink(); ?>"><h3 class="blog-title"><?php the_title(); ?></h3></a>
            <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
            <a href="<?php the_permalink(); ?>" class="blog-read-more">View Project <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </article>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </div>
    </section>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.blog-card');
        
        filterBtns.forEach(btn => {
          btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.getAttribute('data-filter');
            
            items.forEach(item => {
              if (filter === 'all' || item.getAttribute('data-category') === filter) {
                item.classList.remove('hidden');
              } else {
                item.classList.add('hidden');
              }
            });
          });
        });
      });
    </script>
<?php get_footer(); ?>
