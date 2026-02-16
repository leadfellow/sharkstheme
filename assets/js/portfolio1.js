/**
 * Portfolio1 Block JavaScript
 * Handles category filtering and auto-scroll on hover functionality
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
        initScrollableImages();
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
     * Initialize scrollable images with auto-scroll on hover
     */
    function initScrollableImages() {
        const imageContainers = document.querySelectorAll('.portfolio1-image-container');
        
        imageContainers.forEach(container => {
            const image = container.querySelector('.portfolio1-scroll-image');
            if (!image) return;

            let scrollInterval = null;
            let currentPosition = 0;
            let maxScroll = 0;
            let containerHeight = 0;

            // Setup function that recalculates dimensions
            function setupScrolling() {
                containerHeight = container.offsetHeight;
                const imageHeight = image.naturalHeight || image.offsetHeight;
                maxScroll = imageHeight - containerHeight;

                console.log('Portfolio1 scroll setup:', {
                    containerHeight: containerHeight,
                    imageHeight: imageHeight,
                    maxScroll: maxScroll
                });

                // Only enable scrolling if image is taller than container
                if (maxScroll <= 0) {
                    console.log('Image not tall enough for scrolling');
                    return false;
                }
                return true;
            }

            // Wait for image to load
            if (image.complete && image.naturalHeight > 0) {
                setupScrolling();
            } else {
                image.addEventListener('load', function() {
                    setupScrolling();
                });
            }

            // Mouse enter - reset to top
            container.addEventListener('mouseenter', function() {
                // Recalculate dimensions on enter
                if (!setupScrolling()) return;
                
                currentPosition = 0;
                image.style.top = '0px';
            });

            // Mouse move - scroll based on position
            container.addEventListener('mousemove', function(e) {
                // Make sure we have valid dimensions
                if (maxScroll <= 0) return;

                const rect = container.getBoundingClientRect();
                const mouseY = e.clientY - rect.top;
                const relativePosition = mouseY / containerHeight; // 0 to 1

                // Clear any existing interval
                if (scrollInterval) {
                    clearInterval(scrollInterval);
                    scrollInterval = null;
                }

                // Determine scroll direction and speed based on mouse position
                let scrollSpeed = 0;
                
                if (relativePosition < 0.3) {
                    // Top 30% - scroll up
                    scrollSpeed = -3 * (1 - relativePosition / 0.3); // -3 to 0
                } else if (relativePosition > 0.7) {
                    // Bottom 30% - scroll down
                    scrollSpeed = 3 * ((relativePosition - 0.7) / 0.3); // 0 to 3
                }

                if (scrollSpeed !== 0) {
                    scrollInterval = setInterval(function() {
                        currentPosition += scrollSpeed;
                        
                        // Clamp position
                        if (currentPosition < 0) {
                            currentPosition = 0;
                        } else if (currentPosition > maxScroll) {
                            currentPosition = maxScroll;
                        }

                        image.style.top = -currentPosition + 'px';
                    }, 16); // ~60fps
                }
            });

            // Mouse leave - stop scrolling
            container.addEventListener('mouseleave', function() {
                if (scrollInterval) {
                    clearInterval(scrollInterval);
                    scrollInterval = null;
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
