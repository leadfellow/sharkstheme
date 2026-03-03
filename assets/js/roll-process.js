/**
 * Roll Process Block JavaScript
 * 
 * Handles interactive hover effects for process items
 * 
 * @package sharks2025
 */

(function() {
    'use strict';

    function initRollProcess() {
        const blocks = document.querySelectorAll('.block-roll-process');
        
        blocks.forEach(block => {
            const textItems = block.querySelectorAll('.roll-process__text');
            
            textItems.forEach(item => {
                const originalText = item.getAttribute('data-original');
                
                item.addEventListener('mouseenter', function() {
                    if (this.classList.contains('roll-process__text--gray')) {
                        this.textContent = originalText.toUpperCase();
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    if (this.classList.contains('roll-process__text--gray')) {
                        this.textContent = originalText;
                    }
                });
            });
        });
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initRollProcess);
    } else {
        initRollProcess();
    }

    // Re-initialize on Gutenberg block updates (for editor preview)
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=roll-process', initRollProcess);
    }
})();
