/**
 * Max Accordion JavaScript
 * Handles accordion expand/collapse functionality
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  let initialized = false;

  // DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMaxAccordion);
  } else {
    initMaxAccordion();
  }

  /**
   * Initialize all max accordion blocks
   */
  function initMaxAccordion() {
    if (initialized) {
      return;
    }
    initialized = true;

    const accordions = document.querySelectorAll('.block-max-accordion');
    
    if (accordions.length === 0) {
      return;
    }

    accordions.forEach((accordion, index) => {
      setupAccordion(accordion, index);
    });
  }

  /**
   * Setup single accordion block
   */
  function setupAccordion(accordion, accordionIndex) {
    const items = accordion.querySelectorAll('.block-max-accordion__item');
    
    items.forEach((item, itemIndex) => {
      // Add unique data attribute
      item.setAttribute('data-accordion-id', `${accordionIndex}-${itemIndex}`);
      
      const titleWrapper = item.querySelector('.block-max-accordion__header-title-wrapper');
      const iconWrapper = item.querySelector('.block-max-accordion__icon-wrapper');
      
      // Remove any existing click listeners by cloning
      if (titleWrapper) {
        const newTitleWrapper = titleWrapper.cloneNode(true);
        titleWrapper.parentNode.replaceChild(newTitleWrapper, titleWrapper);
        newTitleWrapper.style.cursor = 'pointer';
        newTitleWrapper.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          toggleAccordionItem(item);
        }, { once: false });
      }
      
      if (iconWrapper) {
        const newIconWrapper = iconWrapper.cloneNode(true);
        iconWrapper.parentNode.replaceChild(newIconWrapper, iconWrapper);
        newIconWrapper.style.cursor = 'pointer';
        newIconWrapper.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          toggleAccordionItem(item);
        }, { once: false });
      }
    });
  }

  /**
   * Toggle accordion item
   */
  function toggleAccordionItem(item) {
    const isExpanded = item.classList.contains('is-expanded');
    
    // Toggle current item
    if (isExpanded) {
      item.classList.remove('is-expanded');
    } else {
      item.classList.add('is-expanded');
    }
  }

})();

