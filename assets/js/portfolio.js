/**
 * Portfolio Block JavaScript
 * Handles category filtering
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  let initialized = false;

  // DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPortfolio);
  } else {
    initPortfolio();
  }

  /**
   * Initialize all portfolio blocks
   */
  function initPortfolio() {
    if (initialized) {
      return;
    }
    initialized = true;

    const portfolioBlocks = document.querySelectorAll('.block-portfolio');
    
    if (portfolioBlocks.length === 0) {
      return;
    }

    portfolioBlocks.forEach(block => {
      setupPortfolio(block);
    });
  }

  /**
   * Setup single portfolio block
   */
  function setupPortfolio(block) {
    const navItems = block.querySelectorAll('.block-portfolio__nav-item');
    const portfolioItems = block.querySelectorAll('.block-portfolio__item');
    
    navItems.forEach(navItem => {
      navItem.addEventListener('click', function(e) {
        e.preventDefault();
        
        const category = navItem.getAttribute('data-category');
        
        // Update active state
        navItems.forEach(item => {
          item.classList.remove('active');
          // Remove dot from all items
          const dot = item.querySelector('.block-portfolio__nav-dot');
          if (dot) {
            dot.remove();
          }
        });
        
        navItem.classList.add('active');
        
        // Add dot to active item
        if (!navItem.querySelector('.block-portfolio__nav-dot')) {
          const dot = document.createElement('div');
          dot.className = 'block-portfolio__nav-dot';
          navItem.insertBefore(dot, navItem.firstChild);
        }
        
        // Filter portfolio items
        filterPortfolio(portfolioItems, category);
      });
    });
  }

  /**
   * Filter portfolio items by category
   */
  function filterPortfolio(items, category) {
    const firstCategoryName = document.querySelector('.block-portfolio__nav-item')?.getAttribute('data-category') || 'Kõik tööd';
    const isShowAll = category === firstCategoryName;
    
    items.forEach(item => {
      const itemCategory = item.getAttribute('data-category');
      
      if (isShowAll || itemCategory === category) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    });
    
    // Re-organize rows after filtering
    reorganizeRows(items);
  }

  /**
   * Reorganize portfolio items into rows
   */
  function reorganizeRows(items) {
    const visibleItems = Array.from(items).filter(item => !item.classList.contains('hidden'));
    const rows = [];
    
    // Group visible items into rows of 2
    for (let i = 0; i < visibleItems.length; i += 2) {
      rows.push(visibleItems.slice(i, i + 2));
    }
    
    // Clear all rows
    const grid = items[0]?.closest('.block-portfolio__grid');
    if (!grid) return;
    
    grid.innerHTML = '';
    
    // Create new rows
    rows.forEach(rowItems => {
      const row = document.createElement('div');
      row.className = 'block-portfolio__row';
      
      rowItems.forEach(item => {
        row.appendChild(item);
      });
      
      grid.appendChild(row);
    });
  }

})();

