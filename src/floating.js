// Floating Contact Button Logic
const floatingHTML = `
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
  <button class="fc-main-btn" id="fcToggleBtn"><i class="fa-solid fa-phone"></i></button>
</div>
`;

// Inject into body
document.body.insertAdjacentHTML('beforeend', floatingHTML);

const fcToggleBtn = document.getElementById('fcToggleBtn');
const fcMenu = document.getElementById('fcMenu');
const fcQuoteBtn = document.getElementById('fcQuoteBtn');

fcToggleBtn.addEventListener('click', () => {
  fcMenu.classList.toggle('active');
  const icon = fcToggleBtn.querySelector('i');
  if (fcMenu.classList.contains('active')) {
    icon.classList.remove('fa-phone');
    icon.classList.add('fa-xmark');
  } else {
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-phone');
  }
});

// Close menu if clicked outside
document.addEventListener('click', (e) => {
  if (!e.target.closest('.floating-contact')) {
    fcMenu.classList.remove('active');
    const icon = fcToggleBtn.querySelector('i');
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-phone');
  }
});

// Ensure clicking the quote button closes the floating menu
if (fcQuoteBtn) {
  fcQuoteBtn.addEventListener('click', () => {
    fcMenu.classList.remove('active');
    const icon = fcToggleBtn.querySelector('i');
    icon.classList.remove('fa-xmark');
    icon.classList.add('fa-phone');
  });
}
