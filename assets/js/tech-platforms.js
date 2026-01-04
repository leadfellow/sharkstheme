/**
 * Technology & Platforms Block JavaScript
 * Handles filter button functionality
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  let initialized = false;

  // DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTechPlatforms);
  } else {
    initTechPlatforms();
  }

  /**
   * Initialize all tech-platforms blocks
   */
  function initTechPlatforms() {
    if (initialized) {
      return;
    }
    initialized = true;

    const blocks = document.querySelectorAll('.block-tech-platforms');
    
    if (blocks.length === 0) {
      return;
    }

    blocks.forEach(block => {
      setupFilters(block);
    });
  }

  /**
   * Setup filter functionality for a block
   */
  function setupFilters(block) {
    const filterBtns = block.querySelectorAll('.block-tech-platforms__filter-btn');
    const rows = block.querySelectorAll('.block-tech-platforms__row');
    
    if (filterBtns.length === 0 || rows.length === 0) {
      return;
    }

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        // Remove active class from all buttons
        filterBtns.forEach(b => b.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');
        
        // Get filter value
        const filterValue = this.getAttribute('data-filter');
        
        // Filter rows
        filterRows(rows, filterValue);
      });
    });
  }

  /**
   * Filter table rows based on category
   */
  function filterRows(rows, filterValue) {
    rows.forEach(row => {
      const category = row.getAttribute('data-category');
      
      // Show all if filter is 'all' or 'molemale'
      if (filterValue === 'all' || filterValue === 'molemale') {
        row.classList.remove('hidden');
      }
      // Show matching rows
      else if (category === filterValue) {
        row.classList.remove('hidden');
      }
      // Hide non-matching rows
      else {
        row.classList.add('hidden');
      }
    });
  }

})();

