// Dynamic Modal Injection
const modalHTML = `
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
`;

// Inject into body
document.body.insertAdjacentHTML('beforeend', modalHTML);

const modal = document.getElementById('quoteModal');
const closeBtn = document.getElementById('closeModalBtn');
const serviceSelect = document.getElementById('m-service');

function openModal(serviceType = null) {
  modal.classList.add('active');
  if (serviceType && serviceSelect) {
    const options = Array.from(serviceSelect.options).map(opt => opt.value);
    if (options.includes(serviceType)) {
      serviceSelect.value = serviceType;
    } else {
      serviceSelect.value = 'other';
    }
  } else if (serviceSelect) {
    serviceSelect.value = "";
  }
}

function closeModal() {
  modal.classList.remove('active');
}

closeBtn.addEventListener('click', closeModal);
modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    closeModal();
  }
});

// Bind to quote-trigger buttons
document.addEventListener('click', (e) => {
  const trigger = e.target.closest('.quote-trigger');
  if (trigger) {
    e.preventDefault();
    const serviceType = trigger.getAttribute('data-service');
    openModal(serviceType);
  }
});

// Handle form submission via AJAX
const quoteForm = document.getElementById('quoteForm');
if (quoteForm) {
  quoteForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    if (typeof concrete_ajax === 'undefined') {
      alert('Error: AJAX URL not found.');
      return;
    }
    
    const submitBtn = quoteForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = 'Submitting...';
    submitBtn.disabled = true;

    const formData = new URLSearchParams();
    formData.append('action', 'submit_quote_request');
    formData.append('nonce', concrete_ajax.nonce);
    formData.append('first_name', document.getElementById('m-firstName').value);
    formData.append('last_name', document.getElementById('m-lastName').value);
    formData.append('email', document.getElementById('m-email').value);
    formData.append('service', document.getElementById('m-service').value);
    formData.append('message', document.getElementById('m-message').value);

    try {
      const response = await fetch(concrete_ajax.ajax_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: formData.toString()
      });
      const result = await response.json();
      
      if (result.success) {
        alert('Thank you! Your quote request has been submitted.');
        quoteForm.reset();
        closeModal();
      } else {
        alert(result.data.message || 'Something went wrong. Please try again.');
      }
    } catch (err) {
      console.error(err);
      alert('A network error occurred. Please try again.');
    } finally {
      submitBtn.innerHTML = originalText;
      submitBtn.disabled = false;
    }
  });
}
