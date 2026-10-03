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
// Build mobile nav from the desktop nav links (WordPress-aware)
const desktopNav = document.querySelector('.nav-links');
let mobileLinksHTML = '';
if (desktopNav) {
  const links = desktopNav.querySelectorAll('a');
  links.forEach(link => {
    mobileLinksHTML += `<li><a href="${link.href}">${link.textContent}</a></li>`;
  });
} else {
  // Fallback if no desktop nav found
  const baseUrl = window.location.origin;
  mobileLinksHTML = `
    <li><a href="${baseUrl}/">Home</a></li>
    <li><a href="${baseUrl}/about/">About Us</a></li>
    <li><a href="${baseUrl}/services/">Services</a></li>
    <li><a href="${baseUrl}/projects/">Projects</a></li>
    <li><a href="${baseUrl}/team/">Our Team</a></li>
  `;
}

const mobileNavHTML = `
  <div class="mobile-nav" id="mobileNav">
    <button class="mobile-nav-close" id="mobileNavClose"><i class="fa-solid fa-xmark"></i></button>
    <ul class="mobile-nav-links">
      ${mobileLinksHTML}
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

// Close mobile nav when a link inside it is clicked
if (mobileNav) {
  mobileNav.querySelectorAll('.mobile-nav-links a').forEach(link => {
    link.addEventListener('click', () => {
      mobileNav.classList.remove('open');
    });
  });

  // Close mobile nav when clicking the backdrop (::before area)
  mobileNav.addEventListener('click', (e) => {
    if (e.target === mobileNav) {
      mobileNav.classList.remove('open');
    }
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

// Testimonial Cards Logic
const testimonialCards = document.querySelectorAll('.t-card');
const tControls = document.querySelectorAll('.t-controls .control-btn');
let currentTestimonial = 0;
let testimonialInterval;

function initTestimonials() {
  const cards = document.querySelectorAll('.t-card');
  if(cards.length === 0) return;
  
  cards.forEach((card, index) => {
    card.className = 't-card hidden-card'; // reset all
    if (index === currentTestimonial) {
      card.className = 't-card front-card';
    } else if (index === (currentTestimonial + 1) % cards.length) {
      card.className = 't-card back-card';
    } else if (index === (currentTestimonial - 1 + cards.length) % cards.length) {
      card.className = 't-card leaving-card';
    }
  });
}

function nextTestimonial() {
  const cards = document.querySelectorAll('.t-card');
  if(cards.length === 0) return;
  currentTestimonial = (currentTestimonial + 1) % cards.length;
  initTestimonials();
  resetTestimonialInterval();
}

function prevTestimonial() {
  const cards = document.querySelectorAll('.t-card');
  if(cards.length === 0) return;
  currentTestimonial = (currentTestimonial - 1 + cards.length) % cards.length;
  initTestimonials();
  resetTestimonialInterval();
}

function resetTestimonialInterval() {
  clearInterval(testimonialInterval);
  testimonialInterval = setInterval(nextTestimonial, 3500);
}

if (testimonialCards.length > 0) {
  initTestimonials();
  resetTestimonialInterval();
  
  testimonialCards.forEach(card => {
    card.addEventListener('click', nextTestimonial);
  });
  
  if (tControls.length >= 2) {
    tControls[0].addEventListener('click', prevTestimonial);
    tControls[1].addEventListener('click', nextTestimonial);
  }
}
