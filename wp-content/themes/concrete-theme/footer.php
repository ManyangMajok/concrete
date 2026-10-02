    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <a href="<?php echo home_url('/'); ?>" class="logo footer-logo" style="text-decoration: none; display: flex; align-items: center;">
            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo-white.png" alt="CONC CARE GROUP Logo" style="height: 60px; width: auto;" />
          </a>
          <ul class="footer-links">
            <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about/'); ?>">About Us</a></li>
            <li><a href="#" class="quote-trigger" style="color: var(--darker);">Contact</a></li>
            <li><a href="<?php echo home_url('/services/'); ?>">Service</a></li>
            <li><a href="<?php echo home_url('/team/'); ?>">Our Team</a></li>
          </ul>
          <div class="social-links">
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="footer-bottom" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
          <p>&copy; <?php echo date('Y'); ?> Conc Care Group. All rights reserved.</p>
          <div class="footer-contact" style="display: flex; gap: 20px; font-weight: 500;">
            <span><i class="fa-solid fa-phone" style="color: var(--primary); margin-right: 5px;"></i> 0430 922 430</span>
            <span><i class="fa-solid fa-envelope" style="color: var(--primary); margin-right: 5px;"></i> Ccgconcrete24@gmail.com</span>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
