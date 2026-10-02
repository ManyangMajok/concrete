(function(){let e=document.createElement(`link`).relList;if(e&&e.supports&&e.supports(`modulepreload`))return;for(let e of document.querySelectorAll(`link[rel="modulepreload"]`))n(e);new MutationObserver(e=>{for(let t of e)if(t.type===`childList`)for(let e of t.addedNodes)e.tagName===`LINK`&&e.rel===`modulepreload`&&n(e)}).observe(document,{childList:!0,subtree:!0});function t(e){let t={};return e.integrity&&(t.integrity=e.integrity),e.referrerPolicy&&(t.referrerPolicy=e.referrerPolicy),t.credentials=e.crossOrigin===`use-credentials`?`include`:e.crossOrigin===`anonymous`?`omit`:`same-origin`,t}function n(e){if(e.ep)return;e.ep=!0;let n=t(e);fetch(e.href,n)}})(),document.body.insertAdjacentHTML(`beforeend`,`
  <div class="modal-overlay" id="quoteModal">
    <div class="modal-container">
      <button class="modal-close" id="closeModalBtn"><i class="fa-solid fa-xmark"></i></button>
      <div class="modal-header">
        <h2>Request a Quote</h2>
        <p>Fill out the form below and our estimation team will get back to you within 24 hours.</p>
      </div>
      <form action="#" method="POST" id="quoteForm">
        <div class="m-form-row">
          <div class="m-form-group">
            <label for="m-firstName">First Name</label>
            <input type="text" id="m-firstName" class="m-form-control" placeholder="John" required>
          </div>
          <div class="m-form-group">
            <label for="m-lastName">Last Name</label>
            <input type="text" id="m-lastName" class="m-form-control" placeholder="Doe" required>
          </div>
        </div>
        <div class="m-form-group">
          <label for="m-email">Email Address</label>
          <input type="email" id="m-email" class="m-form-control" placeholder="john@company.com" required>
        </div>
        <div class="m-form-group">
          <label for="m-service">Service Needed (Optional)</label>
          <select id="m-service" class="m-form-control">
            <option value="" disabled selected>Select a Service</option>
            <option value="commercial">Commercial Concrete</option>
            <option value="residential">Residential Concrete</option>
            <option value="repair">Structural Repair</option>
            <option value="other">Other / General Inquiry</option>
          </select>
        </div>
        <div class="m-form-group">
          <label for="m-message">Project Details</label>
          <textarea id="m-message" class="m-form-control" placeholder="Please describe your project, estimated square footage, and timeline..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Request <i class="fa-solid fa-paper-plane" style="margin-left: 8px;"></i></button>
      </form>
    </div>
  </div>
`);var e=document.getElementById(`quoteModal`),t=document.getElementById(`closeModalBtn`),n=document.getElementById(`m-service`);function r(t=null){e.classList.add(`active`),t&&n?n.value=Array.from(n.options).map(e=>e.value).includes(t)?t:`other`:n&&(n.value=``)}function i(){e.classList.remove(`active`)}t.addEventListener(`click`,i),e.addEventListener(`click`,t=>{t.target===e&&i()}),document.addEventListener(`click`,e=>{let t=e.target.closest(`.quote-trigger`);t&&(e.preventDefault(),r(t.getAttribute(`data-service`)))}),document.body.insertAdjacentHTML(`beforeend`,`
<div class="floating-contact" id="floatingContact">
  <div class="fc-menu" id="fcMenu">
    <a href="tel:+15551234567" class="fc-menu-item">
      <span class="fc-tooltip">Call Us</span>
      <div class="fc-icon"><i class="fa-solid fa-phone"></i></div>
    </a>
    <a href="#" class="fc-menu-item quote-trigger" id="fcQuoteBtn">
      <span class="fc-tooltip">Get Quote</span>
      <div class="fc-icon"><i class="fa-solid fa-file-invoice"></i></div>
    </a>
  </div>
  <button class="fc-main-btn" id="fcToggleBtn"><i class="fa-solid fa-message"></i></button>
</div>
`);var a=document.getElementById(`fcToggleBtn`),o=document.getElementById(`fcMenu`),s=document.getElementById(`fcQuoteBtn`);a.addEventListener(`click`,()=>{o.classList.toggle(`active`);let e=a.querySelector(`i`);o.classList.contains(`active`)?(e.classList.remove(`fa-message`),e.classList.add(`fa-xmark`)):(e.classList.remove(`fa-xmark`),e.classList.add(`fa-message`))}),document.addEventListener(`click`,e=>{if(!e.target.closest(`.floating-contact`)){o.classList.remove(`active`);let e=a.querySelector(`i`);e.classList.remove(`fa-xmark`),e.classList.add(`fa-message`)}}),s&&s.addEventListener(`click`,()=>{o.classList.remove(`active`);let e=a.querySelector(`i`);e.classList.remove(`fa-xmark`),e.classList.add(`fa-message`)});var c=document.querySelector(`.navbar`);c&&window.addEventListener(`scroll`,()=>{window.scrollY>50?c.classList.add(`scrolled`):c.classList.remove(`scrolled`)});var l=new IntersectionObserver((e,t)=>{e.forEach(e=>{e.isIntersecting&&(e.target.classList.add(`is-visible`),t.unobserve(e.target))})},{root:null,rootMargin:`0px`,threshold:.15});document.querySelectorAll(`.fade-in-up, .fade-in-left, .slide-in-left, .slide-in-right`).forEach(e=>l.observe(e)),document.body.insertAdjacentHTML(`beforeend`,`
  <div class="mobile-nav" id="mobileNav">
    <button class="mobile-nav-close" id="mobileNavClose"><i class="fa-solid fa-xmark"></i></button>
    <ul class="mobile-nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="services.html">Services</a></li>
      <li><a href="projects.html">Projects</a></li>
      <li><a href="team.html">Our Team</a></li>
    </ul>
    <div class="mobile-nav-actions">
      <a href="#" class="btn btn-primary quote-trigger" style="width: 100%; text-align: center;">Get Quote</a>
    </div>
  </div>
`);var u=document.getElementById(`mobileNav`),d=document.getElementById(`mobileNavClose`);document.querySelectorAll(`.mobile-menu-btn`).forEach(e=>{e.addEventListener(`click`,e=>{e.preventDefault(),u.classList.add(`open`)})}),d&&d.addEventListener(`click`,()=>{u.classList.remove(`open`)});