<?php
/**
 * Single Service Template
 */
get_header();

$icon = get_post_meta( get_the_ID(), '_service_icon', true );
$img_filename = get_post_meta( get_the_ID(), '_service_image_filename', true );
$img_url = get_template_directory_uri() . '/src/assets/images/' . $img_filename;
?>

<div class="service-single-hero" style="background: linear-gradient(rgba(15, 23, 42, 0.8), rgba(15, 23, 42, 0.9)), url('<?php echo esc_url($img_url); ?>') center/cover; padding: 180px 0 100px; text-align: center; color: var(--white);">
    <div class="container">
        <?php if ($icon): ?>
            <div style="width: 80px; height: 80px; background: rgba(0, 163, 224, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; border: 1px solid rgba(0, 163, 224, 0.3);">
                <i class="fa-solid <?php echo esc_attr($icon); ?>" style="font-size: 2.5rem; color: var(--primary);"></i>
            </div>
        <?php endif; ?>
        <h1 style="font-size: 3.5rem; margin-bottom: 20px; font-weight: 800;"><?php the_title(); ?></h1>
        <p style="font-size: 1.2rem; max-width: 800px; margin: 0 auto; color: #cbd5e1;"><?php echo get_the_excerpt(); ?></p>
    </div>
</div>

<div class="container service-details-grid" style="padding: 80px 0;">
    <div class="service-content">
        <h2 style="font-size: 2.2rem; margin-bottom: 25px; font-weight: 700; color: var(--darker);">Premium <?php the_title(); ?> Services</h2>
        <div style="font-size: 1.1rem; color: var(--text); line-height: 1.8; margin-bottom: 40px;">
            <?php the_content(); ?>
        </div>
        
        <div class="service-benefits">
            <h3 style="font-size: 1.5rem; margin-bottom: 20px; color: var(--darker);">Why Choose Conc Care Group?</h3>
            <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 15px;">
                <li style="display: flex; align-items: center; gap: 15px; font-size: 1.1rem; font-weight: 600; color: var(--darker);"><i class="fa-solid fa-circle-check" style="color: var(--primary); font-size: 1.2rem;"></i> Unmatched Durability & Strength</li>
                <li style="display: flex; align-items: center; gap: 15px; font-size: 1.1rem; font-weight: 600; color: var(--darker);"><i class="fa-solid fa-circle-check" style="color: var(--primary); font-size: 1.2rem;"></i> Expert Craftsmanship & Precision</li>
                <li style="display: flex; align-items: center; gap: 15px; font-size: 1.1rem; font-weight: 600; color: var(--darker);"><i class="fa-solid fa-circle-check" style="color: var(--primary); font-size: 1.2rem;"></i> 100% Satisfaction Guarantee</li>
            </ul>
        </div>
    </div>
    
    <div class="service-image-wrapper">
        <div class="service-image" style="position: relative;">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 500px; object-fit: cover; border-radius: 15px; box-shadow: var(--shadow-lg);" />
            <div class="service-quote-box" style="position: absolute; bottom: -30px; left: -30px; background: var(--darker); color: var(--white); padding: 40px; border-radius: 15px; box-shadow: var(--shadow-lg); width: 80%;">
                <h3 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 15px;">Ready to start?</h3>
                <p style="margin-bottom: 25px; color: #94A3B8;">Contact us today for a free, no-obligation quote on your <?php the_title(); ?> project.</p>
                <a href="#" class="btn btn-primary quote-trigger" data-service="<?php echo esc_attr(strtolower(get_the_title())); ?>" style="width: 100%; text-align: center; justify-content: center;">Get A Free Quote <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="service-cta-banner" style="background: var(--darker); color: var(--white); padding: 80px 0; text-align: center; margin-top: 40px;">
    <div class="container">
        <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Need professional <?php the_title(); ?>?</h2>
        <p style="font-size: 1.2rem; color: #94A3B8; margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;">Our team of experts is ready to deliver top-tier results for your project. Don't settle for less than the best.</p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="tel:0430922430" class="btn btn-outline" style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2);"><i class="fa-solid fa-phone"></i> 0430 922 430</a>
            <a href="#" class="btn btn-primary quote-trigger" data-service="<?php echo esc_attr(strtolower(get_the_title())); ?>">Request a Quote <i class="fa-solid fa-clipboard-list"></i></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
