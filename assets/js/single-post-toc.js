/**
 * Single Post Table of Contents Generator
 * Automatically generates a TOC from H2 headings in the post content
 */

document.addEventListener('DOMContentLoaded', function() {
    const tocContainer = document.getElementById('post-toc');
    const postContent = document.querySelector('.single-post-content');
    
    if (!tocContainer || !postContent) {
        return;
    }
    
    // Find all H2 headings in the content
    const headings = postContent.querySelectorAll('h2');
    
    if (headings.length === 0) {
        // Hide TOC if no headings found
        tocContainer.style.display = 'none';
        return;
    }
    
    // Generate TOC items
    headings.forEach((heading, index) => {
        const headingText = heading.textContent.trim();
        const headingId = 'heading-' + (index + 1);
        
        // Add ID to heading for anchor linking
        heading.id = headingId;
        
        // Create TOC item
        const tocItem = document.createElement('div');
        tocItem.className = 'toc-item';
        
        const tocItemBorder = document.createElement('div');
        tocItemBorder.className = 'toc-item-border';
        
        const tocItemContent = document.createElement('a');
        tocItemContent.className = 'toc-item-content';
        tocItemContent.href = '#' + headingId;
        
        const tocNumber = document.createElement('p');
        tocNumber.className = 'toc-number';
        tocNumber.textContent = '(' + String(index + 1).padStart(2, '0') + ')';
        
        const tocText = document.createElement('p');
        tocText.className = 'toc-text';
        tocText.textContent = headingText;
        
        // Assemble TOC item
        tocItemContent.appendChild(tocNumber);
        tocItemContent.appendChild(tocText);
        tocItemBorder.appendChild(tocItemContent);
        tocItem.appendChild(tocItemBorder);
        tocContainer.appendChild(tocItem);
        
        // Smooth scroll on click
        tocItemContent.addEventListener('click', function(e) {
            e.preventDefault();
            const targetHeading = document.getElementById(headingId);
            if (targetHeading) {
                const offset = 120; // Account for sticky header
                const targetPosition = targetHeading.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update active state
                updateActiveItem(tocItem);
            }
        });
    });
    
    // Highlight active section on scroll
    let ticking = false;
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                highlightActiveSection();
                ticking = false;
            });
            ticking = true;
        }
    });
    
    function highlightActiveSection() {
        const scrollPosition = window.scrollY + 200; // Offset for better UX
        
        let currentActiveHeading = null;
        
        headings.forEach((heading) => {
            const headingPosition = heading.offsetTop;
            if (scrollPosition >= headingPosition) {
                currentActiveHeading = heading;
            }
        });
        
        if (currentActiveHeading) {
            const headingId = currentActiveHeading.id;
            const activeLink = tocContainer.querySelector('a[href="#' + headingId + '"]');
            if (activeLink) {
                const activeTocItem = activeLink.closest('.toc-item');
                updateActiveItem(activeTocItem);
            }
        }
    }
    
    function updateActiveItem(activeItem) {
        // Remove active class from all items
        const allTocItems = tocContainer.querySelectorAll('.toc-item');
        allTocItems.forEach(item => item.classList.remove('active'));
        
        // Add active class to current item
        if (activeItem) {
            activeItem.classList.add('active');
        }
    }
    
    // Initial highlight
    highlightActiveSection();
});
