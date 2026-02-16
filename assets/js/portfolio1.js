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
            let isHovering = false;
            let lastMouseY = 0;

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

            // Start scrolling based on mouse position
            function startScrolling(mouseY) {
                // Clear any existing interval
                if (scrollInterval) {
                    clearInterval(scrollInterval);
                    scrollInterval = null;
                }

                const relativePosition = mouseY / containerHeight; // 0 to 1
                let scrollSpeed = 0;
                
                if (relativePosition < 0.2) {
                    // Top 20% - scroll up (faster at top)
                    scrollSpeed = -4 * (1 - relativePosition / 0.2); // -4 to 0
                } else {
                    // Bottom 80% - scroll down (faster at bottom)
                    scrollSpeed = 2 + (relativePosition - 0.2) * 3.75; // 2 to 5
                }

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

            // Wait for image to load
            if (image.complete && image.naturalHeight > 0) {
                setupScrolling();
            } else {
                image.addEventListener('load', function() {
                    setupScrolling();
                });
            }

            // Mouse enter - reset to top and start scrolling
            container.addEventListener('mouseenter', function(e) {
                // Recalculate dimensions on enter
                if (!setupScrolling()) return;
                
                isHovering = true;
                currentPosition = 0;
                image.style.top = '0px';

                // Get initial mouse position and start scrolling
                const rect = container.getBoundingClientRect();
                lastMouseY = e.clientY - rect.top;
                startScrolling(lastMouseY);
            });

            // Mouse move - update scroll based on position
            container.addEventListener('mousemove', function(e) {
                // Make sure we have valid dimensions
                if (maxScroll <= 0 || !isHovering) return;

                const rect = container.getBoundingClientRect();
                lastMouseY = e.clientY - rect.top;
                startScrolling(lastMouseY);
            });

            // Mouse leave - stop scrolling
            container.addEventListener('mouseleave', function() {
                isHovering = false;
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
