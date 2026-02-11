/**
 * Portfolio1 Block JavaScript
 * Handles category filtering and accordion functionality
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    function init() {
        initCategoryFilters();
        initAccordions();
    }

    /**
     * Initialize category filtering
     */
    function initCategoryFilters() {
        const filterButtons = document.querySelectorAll('.portfolio1-filter-btn');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                const container = this.closest('.portfolio1-block');
                
                // Update active button
                filterButtons.forEach(btn => {
                    if (btn.closest('.portfolio1-block') === container) {
                        btn.classList.remove('active');
                    }
                });
                this.classList.add('active');
                
                // Filter items
                filterItems(container, category);
            });
        });
    }

    /**
     * Filter portfolio items by category
     */
    function filterItems(container, category) {
        const items = container.querySelectorAll('.portfolio1-item');
        
        items.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            
            // Show all if category is "all"
            if (category === 'all') {
                item.classList.remove('hidden');
                // Use setTimeout to trigger animation
                setTimeout(() => {
                    item.style.opacity = '1';
                }, 10);
            } 
            // Show matching category
            else if (itemCategory === category) {
                item.classList.remove('hidden');
                setTimeout(() => {
                    item.style.opacity = '1';
                }, 10);
            } 
            // Hide non-matching
            else {
                item.style.opacity = '0';
                setTimeout(() => {
                    item.classList.add('hidden');
                }, 300);
            }
        });
    }

    /**
     * Initialize accordion functionality
     */
    function initAccordions() {
        const readMoreButtons = document.querySelectorAll('.portfolio1-read-more-btn');
        
        readMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const contentSection = document.querySelector(`[data-content-id="${targetId}"]`);
                
                if (!contentSection) return;
                
                const isActive = this.classList.contains('active');
                
                if (isActive) {
                    // Close accordion
                    this.classList.remove('active');
                    contentSection.classList.remove('active');
                    
                    // Smooth scroll to top of item
                    setTimeout(() => {
                        const item = this.closest('.portfolio1-item');
                        if (item) {
                            const offset = 100;
                            const itemTop = item.getBoundingClientRect().top + window.pageYOffset - offset;
                            window.scrollTo({
                                top: itemTop,
                                behavior: 'smooth'
                            });
                        }
                    }, 100);
                } else {
                    // Close all other accordions in this block
                    const block = this.closest('.portfolio1-block');
                    const allButtons = block.querySelectorAll('.portfolio1-read-more-btn');
                    const allContents = block.querySelectorAll('.portfolio1-content-section');
                    
                    allButtons.forEach(btn => btn.classList.remove('active'));
                    allContents.forEach(content => content.classList.remove('active'));
                    
                    // Open this accordion
                    this.classList.add('active');
                    contentSection.classList.add('active');
                    
                    // Smooth scroll to content
                    setTimeout(() => {
                        const contentTop = contentSection.getBoundingClientRect().top + window.pageYOffset - 100;
                        window.scrollTo({
                            top: contentTop,
                            behavior: 'smooth'
                        });
                    }, 300);
                }
            });
        });
    }

    /**
     * Handle mobile visibility
     */
    function handleMobileVisibility() {
        const blocks = document.querySelectorAll('.portfolio1-block');
        
        blocks.forEach(block => {
            const showOnMobile = block.getAttribute('data-show-mobile') !== 'false';
            
            if (!showOnMobile && window.innerWidth < 768) {
                block.classList.add('hide-mobile');
            } else {
                block.classList.remove('hide-mobile');
            }
        });
    }

    // Handle resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleMobileVisibility, 250);
    });

    // Initial mobile visibility check
    handleMobileVisibility();

})();
