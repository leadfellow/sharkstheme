/**
 * Inquiry 2 Block - Form Interactions
 */

document.addEventListener('DOMContentLoaded', function() {
  const inquiryBlocks = document.querySelectorAll('.block-inquiry-2');
  
  inquiryBlocks.forEach(block => {
    const form = block.querySelector('.wpcf7-form');
    const formWrapper = block.querySelector('.block-inquiry-2__form-wrapper');
    const submitSection = block.querySelector('.block-inquiry-2__submit-section');
    
    if (!form || !formWrapper) return;
    
    // Handle form submission events - wpcf7mailsent
    document.addEventListener('wpcf7mailsent', function(event) {
      console.log('CF7 mail sent event triggered', event);
      // Check if this event is from our block
      const eventBlock = event.target.closest('.block-inquiry-2');
      if (eventBlock && eventBlock === block) {
        console.log('Showing success message for our form');
        // Form submitted successfully
        setTimeout(() => {
          showSuccessMessage(formWrapper);
        }, 100);
      }
    }, false);
    
    // Alternative: also listen for form class change
    const formObserver = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.attributeName === 'class') {
          const target = mutation.target;
          if (target.classList.contains('sent')) {
            console.log('Form has sent class, showing success');
            setTimeout(() => {
              showSuccessMessage(formWrapper);
            }, 100);
          }
        }
      });
    });
    
    if (form) {
      formObserver.observe(form, { attributes: true, attributeFilter: ['class'] });
    }
    
    document.addEventListener('wpcf7invalid', function(event) {
      if (form.contains(event.target)) {
        // Form validation failed - errors are already shown inline
        handleValidationErrors(form);
        // Force style the response output immediately
        setTimeout(() => {
          forceStyleResponseOutput(form);
        }, 10);
      }
    }, false);
    
    // Also listen for when CF7 adds the response output
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.addedNodes.length) {
          forceStyleResponseOutput(form);
        }
      });
    });
    
    // Observe the form for changes
    if (form) {
      observer.observe(form, { childList: true, subtree: true });
    }
    
    document.addEventListener('wpcf7mailfailed', function(event) {
      if (form.contains(event.target)) {
        // Mail sending failed
        showErrorMessage(formWrapper);
      }
    }, false);
    
    // Custom validation messages as placeholders
    setupCustomValidation(form);
    
    // Update submit button hover color based on ACF field
    updateSubmitHoverColor(block, submitSection);
  });
});

/**
 * Show success message - turn form area pink with centered message
 */
function showSuccessMessage(formWrapper) {
  console.log('showSuccessMessage called', formWrapper);
  
  // Hide all CF7 success messages
  const cf7Messages = formWrapper.querySelectorAll('.wpcf7-response-output');
  cf7Messages.forEach(msg => {
    msg.style.display = 'none';
  });
  
  // Add success class to wrapper
  formWrapper.classList.add('form-success');
  
  // Check if success message already exists
  let successMessage = formWrapper.querySelector('.block-inquiry-2__success-message');
  
  if (!successMessage) {
    // Create success message
    successMessage = document.createElement('div');
    successMessage.className = 'block-inquiry-2__success-message';
    successMessage.innerHTML = '<h2>Kiri on saadetud!</h2><p>Täname, et võtsite meiega ühendust. Vastame teile esimesel võimalusel.</p>';
    
    // Hide form content and show success message
    const formContent = formWrapper.querySelector('.block-inquiry-2__form-content');
    if (formContent) {
      formContent.style.display = 'none';
    }
    
    formWrapper.appendChild(successMessage);
    console.log('Success message added to DOM');
  }
}

/**
 * Show error message
 */
function showErrorMessage(formWrapper) {
  formWrapper.classList.add('form-error');
  
  // The error message from CF7 will be shown, but we style it better
  const responseOutput = formWrapper.querySelector('.wpcf7-response-output');
  if (responseOutput) {
    responseOutput.style.display = 'block';
  }
}

/**
 * Handle validation errors - show inline error messages under each field
 */
function handleValidationErrors(form) {
  const invalidFields = form.querySelectorAll('.wpcf7-not-valid');
  
  invalidFields.forEach(field => {
    const wrapper = field.closest('.inquiry-col, .inquiry-full');
    if (wrapper) {
      wrapper.classList.add('has-error');
    }
    
    // Style error message to appear below the input
    const errorTip = field.parentElement.querySelector('.wpcf7-not-valid-tip');
    if (errorTip) {
      errorTip.style.cssText = `
        display: block !important;
        position: relative !important;
        margin-top: 8px !important;
        padding-left: 10px !important;
        font-size: 13px !important;
        color: #dc2626 !important;
        font-weight: 500 !important;
        line-height: 1.4 !important;
      `;
    }
  });
  
  // Force hide the validation box
  forceStyleResponseOutput(form);
}

/**
 * Setup custom validation with better error display
 */
function setupCustomValidation(form) {
  const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea');
  
  inputs.forEach(input => {
    // Store original placeholder
    const originalPlaceholder = input.getAttribute('placeholder');
    
    // On invalid event, show custom message
    input.addEventListener('invalid', function(e) {
      e.preventDefault();
      
      // Set custom validation message as placeholder
      if (input.validity.valueMissing) {
        input.setAttribute('placeholder', 'Palun täitke see väli');
        input.classList.add('show-validation-placeholder');
      } else if (input.validity.typeMismatch) {
        input.setAttribute('placeholder', 'Palun sisestage korrektne väärtus');
        input.classList.add('show-validation-placeholder');
      }
    });
    
    // Restore original placeholder on focus
    input.addEventListener('focus', function() {
      if (input.classList.contains('show-validation-placeholder')) {
        input.setAttribute('placeholder', originalPlaceholder || '');
        input.classList.remove('show-validation-placeholder');
      }
    });
    
    // Clear validation state on input
    input.addEventListener('input', function() {
      const wrapper = input.closest('.inquiry-col, .inquiry-full');
      if (wrapper) {
        wrapper.classList.remove('has-error');
      }
      input.classList.remove('wpcf7-not-valid');
      
      // Remove error tip if exists
      const errorTip = input.parentElement.querySelector('.wpcf7-not-valid-tip');
      if (errorTip) {
        errorTip.remove();
      }
    });
  });
}

/**
 * Force hide the validation error box - we use inline errors instead
 */
function forceStyleResponseOutput(form) {
  const responseOutputs = form.querySelectorAll('.wpcf7-response-output');
  
  responseOutputs.forEach(output => {
    if (output.classList.contains('wpcf7-validation-errors')) {
      // Completely hide the validation box
      output.style.cssText = `
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        height: 0 !important;
        overflow: hidden !important;
        position: absolute !important;
        left: -9999px !important;
      `;
    }
  });
}

/**
 * Update submit button hover color based on ACF field
 */
function updateSubmitHoverColor(block, submitSection) {
  // The hover color is already set via CSS custom property from PHP
  // This function can be used for additional dynamic color changes if needed
  
  // Example: Change color on hover
  if (submitSection) {
    const hoverColor = getComputedStyle(block).getPropertyValue('--button-hover-color').trim();
    
    submitSection.addEventListener('mouseenter', function() {
      this.style.backgroundColor = hoverColor || '#333333';
    });
    
    submitSection.addEventListener('mouseleave', function() {
      this.style.backgroundColor = '#000000';
    });
  }
}
