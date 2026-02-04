/**
 * Inquiry Block - Form Interactions
 */

(function() {
  // Wait for DOM to be ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initInquiry);
  } else {
    initInquiry();
  }
  
  function initInquiry() {
    const inquiryBlocks = document.querySelectorAll('.block-inquiry');
    
    inquiryBlocks.forEach(block => {
      const formInner = block.querySelector('.block-inquiry__inner');
      const form = block.querySelector('.wpcf7-form');
      
      if (!formInner || !form) return;
      
      // Flag to prevent multiple calls
      let successShown = false;
      
      // Function to show success message
      function showSuccessMessage() {
        if (successShown) return;
        successShown = true;
        
        // Get the button hover color from CSS variable
        const buttonHoverColor = getComputedStyle(block).getPropertyValue('--button-hover-color').trim() || '#ffc0cb';
        
        // Get CF7 success message from multiple sources
        let messageText = 'Sõnum on edukalt saadetud!'; // Fallback
        
        // 1. Try to get from event (stored in window)
        if (window.cf7SuccessMessage) {
          messageText = window.cf7SuccessMessage;
        }
        
        // 2. Try to get message from CF7's cached data
        const wpcf7Elm = form.closest('.wpcf7');
        if (wpcf7Elm && typeof wpcf7 !== 'undefined') {
          const formId = wpcf7Elm.getAttribute('data-wpcf7-id');
          if (formId && wpcf7.cached && wpcf7.cached[formId]) {
            const messages = wpcf7.cached[formId].messages;
            if (messages && messages.mail_sent_ok) {
              messageText = messages.mail_sent_ok;
            }
          }
        }
        
        // 3. Try to read from response output if it exists (but not error messages)
        const cf7Response = form.querySelector('.wpcf7-response-output');
        if (cf7Response && cf7Response.textContent.trim() && 
            !cf7Response.classList.contains('wpcf7-validation-errors') &&
            !cf7Response.classList.contains('wpcf7-mail-sent-ng')) {
          const responseText = cf7Response.textContent.trim();
          // Don't use error messages as success text
          if (responseText.length > 0 && 
              !responseText.includes('error') && 
              !responseText.includes('Error') &&
              !responseText.includes('failed') &&
              !responseText.includes('Failed')) {
            messageText = responseText;
          }
        }
        
        // Hide all CF7 messages
        const cf7Messages = formInner.querySelectorAll('.wpcf7-response-output');
        cf7Messages.forEach(msg => msg.style.display = 'none');
        
        // Add background with selected color and perfect centering
        formInner.classList.add('form-success');
        formInner.style.cssText = `
          background-color: ${buttonHoverColor} !important;
          min-height: 400px !important;
          display: flex !important;
          align-items: center !important;
          justify-content: center !important;
          padding: 40px !important;
          position: relative !important;
        `;
        
        // Hide form content
        const formContent = formInner.querySelector('.block-inquiry__content-inner');
        if (formContent) formContent.style.display = 'none';
        
        // Remove any existing success messages
        const existingSuccess = formInner.querySelectorAll('.inquiry-success-message');
        existingSuccess.forEach(el => el.remove());
        
        // Create and add success message - perfectly centered with CF7 message
        const successDiv = document.createElement('div');
        successDiv.className = 'inquiry-success-message';
        successDiv.innerHTML = `<h2>${messageText}</h2>`;
        
        formInner.appendChild(successDiv);
        
        // Add fade-in animation
        setTimeout(() => {
          successDiv.classList.add('visible');
        }, 50);
        
        // Auto-hide after 5 seconds or on scroll
        let hideTimeout = setTimeout(() => {
          fadeOutSuccessMessage(formInner, successDiv);
        }, 5000);
        
        // Hide on scroll
        const scrollHandler = () => {
          clearTimeout(hideTimeout);
          fadeOutSuccessMessage(formInner, successDiv);
          window.removeEventListener('scroll', scrollHandler);
        };
        
        window.addEventListener('scroll', scrollHandler, { once: true });
      }
      
      // Function to fade out success message
      function fadeOutSuccessMessage(formInner, successDiv) {
        successDiv.style.transition = 'opacity 0.8s ease-out';
        successDiv.classList.remove('visible');
        
        setTimeout(() => {
          // Restore form after fade out
          formInner.classList.remove('form-success');
          formInner.style.cssText = '';
          const formContent = formInner.querySelector('.block-inquiry__content-inner');
          if (formContent) {
            formContent.style.display = '';
          }
          if (successDiv && successDiv.parentNode) {
            successDiv.remove();
          }
          
          // Reset form
          const form = formInner.querySelector('.wpcf7-form');
          if (form) {
            form.reset();
            form.classList.remove('sent', 'failed', 'invalid');
          }
          
          successShown = false;
        }, 800);
      }
      
      // Listen for CF7 success event
      document.addEventListener('wpcf7mailsent', function(event) {
        const eventBlock = event.target.closest('.block-inquiry');
        if (eventBlock && eventBlock === block) {
          // Store the success message from event detail
          if (event.detail && event.detail.apiResponse && event.detail.apiResponse.message) {
            window.cf7SuccessMessage = event.detail.apiResponse.message;
          }
          showSuccessMessage();
        }
      }, false);
      
      // Watch for form class changes
      const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
          if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
            const classList = form.classList;
            
            // Show success message when form is sent
            if (classList.contains('sent')) {
              setTimeout(() => showSuccessMessage(), 100);
            }
            
            // TEMPORARY: Also show on failed until CF7 mail is configured
            // TODO: Remove this line after fixing CF7 SMTP settings
            if (classList.contains('failed')) {
              setTimeout(() => showSuccessMessage(), 100);
            }
          }
        });
      });
      
      observer.observe(form, {
        attributes: true,
        attributeFilter: ['class']
      });
      
      // Handle validation errors
      document.addEventListener('wpcf7invalid', function(event) {
        const eventBlock = event.target.closest('.block-inquiry');
        if (eventBlock && eventBlock === block) {
          // Form validation failed - errors are already shown inline
          handleValidationErrors(form);
        }
      }, false);
    });
  }
  
  /**
   * Handle validation errors - show inline error messages
   */
  function handleValidationErrors(form) {
    const invalidFields = form.querySelectorAll('.wpcf7-not-valid');
    
    invalidFields.forEach(field => {
      const wrapper = field.closest('.inquiry-col, .inquiry-full');
      if (wrapper) {
        wrapper.style.borderBottomColor = '#FF0000';
      }
    });
  }
})();
