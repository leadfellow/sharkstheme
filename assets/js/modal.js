/**
 * Modal Component
 * Universal modal system for CTA links and hero banners
 */
(function() {
  'use strict';

  // Create modal container if it doesn't exist
  function createModalContainer() {
    let modalContainer = document.getElementById('sharks-modal');
    
    if (!modalContainer) {
      modalContainer = document.createElement('div');
      modalContainer.id = 'sharks-modal';
      modalContainer.className = 'modal-overlay';
      modalContainer.innerHTML = `
        <div class="modal-content">
          <button class="modal-close" aria-label="Close modal">&times;</button>
          <div class="modal-header">
            <h2 class="modal-title"></h2>
            <p class="modal-description"></p>
          </div>
          <div class="modal-body"></div>
        </div>
      `;
      document.body.appendChild(modalContainer);
    }
    
    return modalContainer;
  }

  // Open modal with content
  function openModal(title, description, content) {
    const modal = createModalContainer();
    const modalTitle = modal.querySelector('.modal-title');
    const modalDescription = modal.querySelector('.modal-description');
    const modalBody = modal.querySelector('.modal-body');
    
    // Set content
    if (title) {
      modalTitle.textContent = title;
      modalTitle.style.display = 'block';
    } else {
      modalTitle.style.display = 'none';
    }
    
    if (description) {
      modalDescription.textContent = description;
      modalDescription.style.display = 'block';
    } else {
      modalDescription.style.display = 'none';
    }
    
    if (content) {
      modalBody.innerHTML = content;
    }
    
    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    
    // Mark forms as being in modal and initialize CF7
    setTimeout(function() {
      const forms = modalBody.querySelectorAll('.wpcf7-form');
      forms.forEach(function(form) {
        // Mark form as in modal
        form.setAttribute('data-in-modal', 'true');
        
        // Re-initialize Contact Form 7 if needed
        if (typeof wpcf7 !== 'undefined' && wpcf7.init) {
          wpcf7.init(form);
        }
      });
    }, 100);
  }

  // Close modal
  function closeModal() {
    const modal = document.getElementById('sharks-modal');
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  // Initialize modal event listeners
  function initModal() {
    const modal = createModalContainer();
    const closeBtn = modal.querySelector('.modal-close');
    
    // Close button
    closeBtn.addEventListener('click', closeModal);
    
    // Click outside to close
    modal.addEventListener('click', function(e) {
      if (e.target === modal) {
        closeModal();
      }
    });
    
    // Escape key to close
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
      }
    });
    
    // Listen for Contact Form 7 events
    document.addEventListener('wpcf7mailsent', function(event) {
      // Check if form is in modal
      const form = event.target;
      if (form && form.hasAttribute('data-in-modal')) {
        // Scroll to top of modal to show success message
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
          setTimeout(function() {
            modalContent.scrollTop = 0;
          }, 100);
        }
      }
    }, false);
    
    document.addEventListener('wpcf7invalid', function(event) {
      // Check if form is in modal
      const form = event.target;
      if (form && form.hasAttribute('data-in-modal')) {
        // Scroll to top of modal to show error message
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
          setTimeout(function() {
            modalContent.scrollTop = 0;
          }, 100);
        }
      }
    }, false);
    
    document.addEventListener('wpcf7spam', function(event) {
      // Check if form is in modal
      const form = event.target;
      if (form && form.hasAttribute('data-in-modal')) {
        // Scroll to top of modal to show error message
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
          setTimeout(function() {
            modalContent.scrollTop = 0;
          }, 100);
        }
      }
    }, false);
    
    document.addEventListener('wpcf7mailfailed', function(event) {
      // Check if form is in modal
      const form = event.target;
      if (form && form.hasAttribute('data-in-modal')) {
        // Scroll to top of modal to show error message
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
          setTimeout(function() {
            modalContent.scrollTop = 0;
          }, 100);
        }
      }
    }, false);
    
    // Prevent modal from closing when clicking on form elements
    modal.addEventListener('click', function(e) {
      // Don't close if clicking on form elements
      if (e.target.closest('.wpcf7-form')) {
        e.stopPropagation();
      }
    });
  }

  // Handle modal links
  function initModalLinks() {
    const modalLinks = document.querySelectorAll('[data-modal-trigger]');
    
    modalLinks.forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        
        const title = this.getAttribute('data-modal-title') || '';
        const description = this.getAttribute('data-modal-description') || '';
        const content = this.getAttribute('data-modal-content') || '';
        
        // If content is a selector, get the content from that element
        if (content.startsWith('#') || content.startsWith('.')) {
          const contentElement = document.querySelector(content);
          if (contentElement) {
            openModal(title, description, contentElement.innerHTML);
          } else {
            console.error('Modal content element not found:', content);
          }
        } else {
          openModal(title, description, content);
        }
      });
    });
  }

  // Initialize on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      initModal();
      initModalLinks();
    });
  } else {
    initModal();
    initModalLinks();
  }

  // Re-initialize after Gutenberg block updates
  if (window.acf) {
    window.acf.addAction('render_block_preview', function() {
      initModalLinks();
    });
  }

  // Expose functions globally for external use
  window.SharksModal = {
    open: openModal,
    close: closeModal
  };
})();

