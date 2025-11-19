/**
 * 10 Steps Carousel Navigation
 * Handles carousel navigation with arrow buttons
 */

(function() {
  'use strict';

  // Initialize all carousels on the page
  function initTenStepsCarousels() {
    const carousels = document.querySelectorAll('.block-ten-steps');
    
    carousels.forEach(carousel => {
      new TenStepsCarousel(carousel);
    });
  }

  // TenStepsCarousel class
  class TenStepsCarousel {
    constructor(element) {
      this.wrapper = element;
      this.carousel = element.querySelector('.ten-steps__carousel');
      this.cards = Array.from(element.querySelectorAll('.ten-steps__card'));
      this.prevBtn = element.querySelector('.ten-steps__nav-btn--prev');
      this.nextBtn = element.querySelector('.ten-steps__nav-btn--next');
      
      if (!this.carousel || !this.cards.length || !this.prevBtn || !this.nextBtn) {
        return;
      }

      this.currentIndex = 0;
      this.cardsPerView = this.getCardsPerView();
      this.totalSteps = this.cards.length;
      
      this.init();
    }

    init() {
      // Bind events
      this.prevBtn.addEventListener('click', () => this.prev());
      this.nextBtn.addEventListener('click', () => this.next());
      
      // Update on window resize
      let resizeTimer;
      window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
          this.cardsPerView = this.getCardsPerView();
          this.updateCarousel();
        }, 250);
      });
      
      // Initial update
      this.updateCarousel();
    }

    getCardsPerView() {
      const width = window.innerWidth;
      if (width >= 768) {
        return 3; // Show 3 cards on desktop
      }
      return 1; // Show 1 card on mobile
    }

    prev() {
      if (this.currentIndex > 0) {
        this.currentIndex -= this.cardsPerView;
        if (this.currentIndex < 0) {
          this.currentIndex = 0;
        }
        this.updateCarousel();
      }
    }

    next() {
      const maxIndex = Math.max(0, this.totalSteps - this.cardsPerView);
      if (this.currentIndex < maxIndex) {
        this.currentIndex += this.cardsPerView;
        if (this.currentIndex > maxIndex) {
          this.currentIndex = maxIndex;
        }
        this.updateCarousel();
      }
    }

    updateCarousel() {
      // Show/hide cards based on current index
      this.cards.forEach((card, index) => {
        if (this.cardsPerView >= 3) {
          // Desktop: show 3 cards at a time
          if (index >= this.currentIndex && index < this.currentIndex + this.cardsPerView) {
            card.style.display = 'flex';
            card.style.opacity = '1';
          } else {
            card.style.display = 'none';
            card.style.opacity = '0';
          }
        } else {
          // Mobile: all cards visible in grid
          card.style.display = 'flex';
          card.style.opacity = '1';
        }
      });

      // Update button states
      this.updateButtons();
    }

    updateButtons() {
      const maxIndex = Math.max(0, this.totalSteps - this.cardsPerView);
      
      // Disable prev button at start
      if (this.currentIndex === 0) {
        this.prevBtn.disabled = true;
        this.prevBtn.setAttribute('aria-disabled', 'true');
      } else {
        this.prevBtn.disabled = false;
        this.prevBtn.setAttribute('aria-disabled', 'false');
      }
      
      // Disable next button at end
      if (this.currentIndex >= maxIndex) {
        this.nextBtn.disabled = true;
        this.nextBtn.setAttribute('aria-disabled', 'true');
      } else {
        this.nextBtn.disabled = false;
        this.nextBtn.setAttribute('aria-disabled', 'false');
      }

      // Hide navigation on mobile if all cards fit
      if (this.cardsPerView === 1 && this.totalSteps <= 1) {
        this.wrapper.querySelector('.ten-steps__navigation').style.display = 'none';
      } else {
        this.wrapper.querySelector('.ten-steps__navigation').style.display = 'flex';
      }
    }
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTenStepsCarousels);
  } else {
    initTenStepsCarousels();
  }

  // Re-initialize for Gutenberg editor (when blocks are added/updated)
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=ten-steps', initTenStepsCarousels);
  }
})();

