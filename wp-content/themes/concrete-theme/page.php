<?php get_header(); ?>
<section class="page-header" style="background-color: var(--darker); padding: 150px 0 80px; text-align: center; color: var(--white);">
  <div class="container fade-in-up">
    <h1 style="font-size: 3.5rem; margin-bottom: 15px;"><?php the_title(); ?></h1>
  </div>
</section>
<section class="page-content section-padding" style="padding: 80px 0;">
  <div class="container">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
  </div>
</section>
<?php get_footer(); ?>
