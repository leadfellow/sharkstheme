/**
 * Progress Block JavaScript
 * Handles accordion functionality
 */

(function() {
  'use strict';

  /**
   * Initialize progress accordion
   */
  function initProgressAccordion() {
    const accordionItems = document.querySelectorAll('.progress-accordion-item');

    if (!accordionItems.length) {
      return;
    }

    accordionItems.forEach(item => {
      const header = item.querySelector('.progress-accordion-header');
      
      if (!header) {
        return;
      }

      header.addEventListener('click', function() {
        const isExpanded = item.classList.contains('progress-accordion-item-expanded');
        
        // Close all accordion items
        accordionItems.forEach(otherItem => {
          otherItem.classList.remove('progress-accordion-item-expanded');
        });
        
        // If the clicked item wasn't expanded, expand it
        if (!isExpanded) {
          item.classList.add('progress-accordion-item-expanded');
        }
      });
    });
  }

  // Initialize on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initProgressAccordion);
  } else {
    initProgressAccordion();
  }

  // Re-initialize for Gutenberg editor
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=progress', initProgressAccordion);
  }
})();
