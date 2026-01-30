/**
 * Certificates Block - Image Lightbox
 * Adds floating animation and click-to-enlarge functionality
 */
(function() {
  'use strict';

  // Create lightbox modal
  function createLightbox() {
    let lightbox = document.getElementById('certificates-lightbox');
    
    if (!lightbox) {
      lightbox = document.createElement('div');
      lightbox.id = 'certificates-lightbox';
      lightbox.className = 'certificates-lightbox';
      lightbox.innerHTML = `
        <div class="certificates-lightbox__overlay"></div>
        <div class="certificates-lightbox__container">
          <button class="certificates-lightbox__close" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </button>
          <div class="certificates-lightbox__content">
            <img class="certificates-lightbox__image" src="" alt="">
          </div>
        </div>
      `;
      document.body.appendChild(lightbox);
      
      // Close button
      const closeBtn = lightbox.querySelector('.certificates-lightbox__close');
      closeBtn.addEventListener('click', closeLightbox);
      
      // Click overlay to close
      const overlay = lightbox.querySelector('.certificates-lightbox__overlay');
      overlay.addEventListener('click', closeLightbox);
      
      // Escape key to close
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('is-active')) {
          closeLightbox();
        }
      });
    }
    
    return lightbox;
  }

  // Open lightbox with image
  function openLightbox(imageSrc, imageAlt) {
    const lightbox = createLightbox();
    const image = lightbox.querySelector('.certificates-lightbox__image');
    
    image.src = imageSrc;
    image.alt = imageAlt || '';
    
    lightbox.classList.add('is-active');
    document.body.style.overflow = 'hidden';
  }

  // Close lightbox
  function closeLightbox() {
    const lightbox = document.getElementById('certificates-lightbox');
    if (lightbox) {
      lightbox.classList.remove('is-active');
      document.body.style.overflow = '';
    }
  }

  // Initialize certificate image clicks
  function initCertificateImages() {
    const certificateImages = document.querySelectorAll('.certificates-box-image');
    
    certificateImages.forEach(function(img) {
      // Make clickable
      img.style.cursor = 'pointer';
      img.setAttribute('role', 'button');
      img.setAttribute('tabindex', '0');
      
      // Click event
      img.addEventListener('click', function() {
        openLightbox(this.src, this.alt);
      });
      
      // Keyboard support
      img.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openLightbox(this.src, this.alt);
        }
      });
    });
  }

  // Add floating animation to certificate boxes
  function initFloatingAnimation() {
    const certificateBoxes = document.querySelectorAll('.certificates-box');
    
    certificateBoxes.forEach(function(box, index) {
      // Add staggered animation delay
      const delay = index * 0.1;
      box.style.animationDelay = delay + 's';
    });
  }

  // Initialize on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      initCertificateImages();
      initFloatingAnimation();
    });
  } else {
    initCertificateImages();
    initFloatingAnimation();
  }

  // Re-initialize after Gutenberg block updates
  if (window.acf) {
    window.acf.addAction('render_block_preview', function() {
      initCertificateImages();
      initFloatingAnimation();
    });
  }

  // Expose functions globally
  window.CertificatesLightbox = {
    open: openLightbox,
    close: closeLightbox
  };
})();
