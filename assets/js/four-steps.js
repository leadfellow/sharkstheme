/**
 * Four Steps Interactive Logic
 * When clicking on a step, update the left card with corresponding icon, number, and description
 */

document.addEventListener('DOMContentLoaded', function() {
    const fourStepsBlocks = document.querySelectorAll('.block-four-steps');
    
    fourStepsBlocks.forEach(block => {
        const steps = block.querySelectorAll('.four-steps__step');
        const cardBackground = block.querySelector('.four-steps__card-background');
        const cardNumber = block.querySelector('.four-steps__card-number');
        const cardDescription = block.querySelector('.four-steps__card-description');
        
        if (!steps.length || !cardBackground || !cardNumber || !cardDescription) {
            return;
        }
        
        // Function to update card content
        function updateCard(step, animate = true) {
            // Remove active class from all steps
            steps.forEach(s => {
                s.classList.remove('four-steps__step--active');
                s.classList.remove('four-steps__step--highlighted');
            });
            
            // Add active class to current step
            step.classList.add('four-steps__step--active');
            
            // Get data attributes from the step
            const icon = step.dataset.icon;
            const number = step.dataset.number;
            const description = step.dataset.description;
            
            if (animate) {
                // Update card with fade effect
                cardBackground.style.opacity = '0';
                cardNumber.style.opacity = '0';
                cardDescription.style.opacity = '0';
                
                setTimeout(() => {
                    // Update icon
                    if (icon) {
                        cardBackground.innerHTML = icon;
                    }
                    
                    // Update number
                    if (number) {
                        cardNumber.textContent = number;
                    }
                    
                    // Update description
                    if (description) {
                        cardDescription.textContent = description;
                    }
                    
                    // Fade in
                    cardBackground.style.opacity = '1';
                    cardNumber.style.opacity = '1';
                    cardDescription.style.opacity = '1';
                }, 200);
            } else {
                // Update without animation (for initial load)
                if (icon) {
                    cardBackground.innerHTML = icon;
                }
                if (number) {
                    cardNumber.textContent = number;
                }
                if (description) {
                    cardDescription.textContent = description;
                }
            }
        }
        
        // Set first step as active on page load
        if (steps[0]) {
            updateCard(steps[0], false);
        }
        
        // Add click event listeners to all steps
        steps.forEach((step, index) => {
            // Make steps clickable
            step.style.cursor = 'pointer';
            
            step.addEventListener('click', function() {
                updateCard(this, true);
            });
        });
    });
});
