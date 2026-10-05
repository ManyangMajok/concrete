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
      <p style="margin: 0; font-size: 0.85rem;">ABN: 32 665 772 163</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
