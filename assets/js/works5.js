/**
 * Works5 Block - Hover Color Handler
 */
document.addEventListener('DOMContentLoaded', function() {
    const projects = document.querySelectorAll('.block-works5__project[data-hover-color]');
    
    projects.forEach(project => {
        const hoverColor = project.getAttribute('data-hover-color');
        const imageWrapper = project.querySelector('.block-works5__project-image-wrapper');
        
        if (hoverColor && imageWrapper) {
            // Set CSS custom property for this specific project
            project.style.setProperty('--hover-bg-color', hoverColor);
            
            // Add hover event listeners
            project.addEventListener('mouseenter', function() {
                imageWrapper.style.backgroundColor = hoverColor;
            });
            
            project.addEventListener('mouseleave', function() {
                imageWrapper.style.backgroundColor = '';
            });
        }
    });
});

