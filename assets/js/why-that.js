/**
 * Why That Block - Animation on scroll into view
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  /**
   * Initialize all Why That blocks
   */
  function initWhyThatAnimations() {
    const blocks = document.querySelectorAll('.block-why-that');
    
    if (blocks.length === 0) return;

    // Intersection Observer options
    const options = {
      root: null, // viewport
      rootMargin: '0px',
      threshold: 0.2 // Trigger when 20% of block is visible
    };

    // Callback when block enters/exits viewport
    const handleIntersection = (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Add animated class when block is visible
          entry.target.classList.add('is-animated');
        } else {
          // Remove class when block leaves viewport - cards return to original position
          entry.target.classList.remove('is-animated');
        }
      });
    };

    // Create observer
    const observer = new IntersectionObserver(handleIntersection, options);

    // Observe each block
    blocks.forEach(block => {
      observer.observe(block);
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initWhyThatAnimations);
  } else {
    initWhyThatAnimations();
  }

  // Re-initialize for Gutenberg editor (when blocks are added/updated)
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=why-that', initWhyThatAnimations);
  }

})();

