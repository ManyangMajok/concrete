import './modal.js';
import './floating.js';

// Navbar Scroll Effect
const navbar = document.querySelector('.navbar');

if (navbar) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

// Intersection Observer for Scroll Animations
const observerOptions = {
  root: null,
  rootMargin: '0px',
  threshold: 0.15
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    }
  });
}, observerOptions);

const animatedElements = document.querySelectorAll('.fade-in-up, .fade-in-left, .slide-in-left, .slide-in-right');
animatedElements.forEach(el => observer.observe(el));


// Mobile Navigation Logic
const mobileNavHTML = `
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
`;
document.body.insertAdjacentHTML('beforeend', mobileNavHTML);

const mobileNav = document.getElementById('mobileNav');
const mobileNavClose = document.getElementById('mobileNavClose');
const mobileMenuBtns = document.querySelectorAll('.mobile-menu-btn');

mobileMenuBtns.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    mobileNav.classList.add('open');
  });
});

if (mobileNavClose) {
  mobileNavClose.addEventListener('click', () => {
    mobileNav.classList.remove('open');
  });
}

// FAQ Accordion Logic
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
  const question = item.querySelector('.faq-question');
  const answer = item.querySelector('.faq-answer');
  
  if (question && answer) {
    question.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      
      // Close all other FAQs
      faqItems.forEach(otherItem => {
        otherItem.classList.remove('active');
        const otherAnswer = otherItem.querySelector('.faq-answer');
        if (otherAnswer) otherAnswer.style.maxHeight = null;
      });
      
      if (!isActive) {
        item.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  }
});
