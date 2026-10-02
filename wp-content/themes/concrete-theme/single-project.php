<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<style>
  .article-header { padding: 180px 0 80px; text-align: center; background-color: var(--light); }
  .article-category { display: inline-block; padding: 6px 15px; background-color: rgba(251, 191, 36, 0.2); color: #B45309; font-weight: 700; border-radius: 30px; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; margin-bottom: 20px; }
  .article-title { font-size: 3.5rem; color: var(--darker); margin-bottom: 20px; max-width: 900px; margin-left: auto; margin-right: auto; line-height: 1.2; }
  .article-meta { color: #64748B; font-size: 1rem; display: flex; justify-content: center; gap: 20px; align-items: center; }
  
  .article-body { padding: 60px 0 100px; }
  .article-featured-image { width: 100%; max-width: 1000px; margin: 0 auto 50px; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow); position: relative; margin-top: -120px; z-index: 10; }
  .article-featured-image img { width: 100%; height: auto; display: block; max-height: 600px; object-fit: cover; }
  
  .article-content { max-width: 800px; margin: 0 auto; font-size: 1.15rem; line-height: 1.8; color: #334155; }
  .article-content h2, .article-content h3 { color: var(--darker); margin: 40px 0 20px; }
  .article-content p { margin-bottom: 25px; }
  .article-content img { max-width: 100%; height: auto; border-radius: 10px; margin: 30px 0; }
  .article-content ul, .article-content ol { margin-bottom: 25px; padding-left: 20px; }
  .article-content li { margin-bottom: 10px; }
  
  .article-footer { max-width: 800px; margin: 60px auto 0; padding-top: 40px; border-top: 1px solid #E2E8F0; display: flex; justify-content: space-between; align-items: center; }
  
  @media (max-width: 768px) {
    .article-title { font-size: 2.5rem; }
    .article-featured-image { margin-top: -60px; border-radius: 10px; }
    .article-content { font-size: 1.05rem; }
  }
</style>

<section class="article-header">
  <div class="container fade-in-up">
    <?php
    $terms = get_the_terms(get_the_ID(), 'project_category');
    if ($terms && !is_wp_error($terms)) {
        echo '<span class="article-category">' . esc_html($terms[0]->name) . '</span>';
    } else {
        echo '<span class="article-category">Project</span>';
    }
    ?>
    <h1 class="article-title"><?php the_title(); ?></h1>
    <div class="article-meta">
      <span><i class="fa-regular fa-calendar" style="margin-right: 5px;"></i> <?php echo get_the_date(); ?></span>
      <span><i class="fa-regular fa-user" style="margin-right: 5px;"></i> By Conc Care Group</span>
    </div>
  </div>
</section>

<section class="article-body">
  <div class="container">
    <div class="article-featured-image fade-in-up delay-1">
      <?php 
      $img_url = get_post_meta(get_the_ID(), '_project_image_url', true);
      if (has_post_thumbnail()) {
          the_post_thumbnail('full');
      } elseif ($img_url) {
          echo '<img src="' . esc_url($img_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
      }
      ?>
    </div>
    
    <div class="article-content fade-in-up delay-2">
      <?php the_content(); ?>
      
      <div class="article-footer">
        <a href="<?php echo home_url('/projects/'); ?>" class="btn btn-outline-small" style="color: var(--darker); border-color: #E2E8F0;">
          <i class="fa-solid fa-arrow-left"></i> Back to Projects
        </a>
        <div style="display: flex; gap: 15px; color: #94A3B8;">
          <a href="#" style="transition: color 0.3s;"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" style="transition: color 0.3s;"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" style="transition: color 0.3s;"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>

<script>
  // Add hover effect for social links in footer
  document.querySelectorAll('.article-footer a i').forEach(icon => {
    icon.parentElement.addEventListener('mouseenter', () => icon.style.color = 'var(--primary)');
    icon.parentElement.addEventListener('mouseleave', () => icon.style.color = '');
  });
</script>

<?php get_footer(); ?>
