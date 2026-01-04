/**
 * Works3 Block - Hover Color Inversion Handler
 */
document.addEventListener('DOMContentLoaded', function() {
    const works3Blocks = document.querySelectorAll('.block-works3');
    
    works3Blocks.forEach(block => {
        const backgroundColor = getComputedStyle(block).backgroundColor;
        const textColor = getComputedStyle(block).color;
        
        // Convert RGB to check if it's black or white
        const rgbMatch = backgroundColor.match(/rgb\((\d+),\s*(\d+),\s*(\d+)\)/);
        
        if (rgbMatch) {
            const r = parseInt(rgbMatch[1]);
            const g = parseInt(rgbMatch[2]);
            const b = parseInt(rgbMatch[3]);
            
            // If background is dark (black), hover should be white
            // If background is light (white), hover should be dark
            const isDark = (r + g + b) / 3 < 128;
            
            if (isDark) {
                // Dark background -> hover to white background with black text
                block.style.setProperty('--hover-bg-color', '#FFFFFF');
                block.style.setProperty('--hover-text-color', '#000000');
                block.style.setProperty('--hover-link-text-color', '#000000');
                block.style.setProperty('--hover-link-icon-bg', '#000000');
                block.style.setProperty('--hover-link-icon-stroke', '#FFFFFF');
            } else {
                // Light background -> hover to black background with white text
                block.style.setProperty('--hover-bg-color', '#000000');
                block.style.setProperty('--hover-text-color', '#FFFFFF');
                block.style.setProperty('--hover-link-text-color', '#FFFFFF');
                block.style.setProperty('--hover-link-icon-bg', '#FFFFFF');
                block.style.setProperty('--hover-link-icon-stroke', '#000000');
            }
        }
    });
});

