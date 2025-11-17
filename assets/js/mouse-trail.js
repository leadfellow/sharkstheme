/**
 * Ripple Cursor Effect
 * Creates expanding ripple circles on mouse movement
 */

class RippleCursor {
  constructor(options = {}) {
    this.maxSize = options.maxSize || 50;
    this.duration = options.duration || 1000;
    this.blur = options.blur !== false;
    this.container = null;
    this.ripples = [];
    this.maxRipples = 30;
    
    this.init();
  }
  
  init() {
    this.createContainer();
    this.bindEvents();
    this.createStyles();
  }
  
  createContainer() {
    // Create container for ripples
    this.container = document.createElement('div');
    this.container.classList.add('ripple-cursor-container');
    this.container.style.position = 'fixed';
    this.container.style.top = '0';
    this.container.style.left = '0';
    this.container.style.width = '100vw';
    this.container.style.height = '100vh';
    this.container.style.pointerEvents = 'none';
    this.container.style.overflow = 'hidden';
    this.container.style.zIndex = '9999';
    
    document.body.appendChild(this.container);
  }
  
  createStyles() {
    // Check if styles already exist
    if (document.getElementById('ripple-cursor-styles')) return;
    
    const style = document.createElement('style');
    style.id = 'ripple-cursor-styles';
    style.textContent = `
      @keyframes ripple-expand {
        0% {
          transform: translate(-50%, -50%) scale(0);
          opacity: 1;
        }
        100% {
          transform: translate(-50%, -50%) scale(1);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  }
  
  bindEvents() {
    this.handleMouseMove = this.handleMouseMove.bind(this);
    window.addEventListener('mousemove', this.handleMouseMove);
  }
  
  handleMouseMove(e) {
    this.addRipple(e.clientX, e.clientY);
  }
  
  addRipple(x, y) {
    const ripple = {
      id: `${Date.now()}-${Math.random()}`,
      x: x,
      y: y
    };
    
    // Create ripple element
    const rippleEl = document.createElement('div');
    rippleEl.className = 'ripple';
    rippleEl.dataset.id = ripple.id;
    rippleEl.style.position = 'absolute';
    rippleEl.style.left = `${x}px`;
    rippleEl.style.top = `${y}px`;
    rippleEl.style.width = `${this.maxSize}px`;
    rippleEl.style.height = `${this.maxSize}px`;
    rippleEl.style.borderRadius = '50%';
    rippleEl.style.background = 'radial-gradient(circle, rgba(0, 150, 255, 0.5) 0%, rgba(0, 150, 255, 0.3) 50%, transparent 100%)';
    rippleEl.style.transform = 'translate(-50%, -50%) scale(0)';
    rippleEl.style.opacity = '1';
    rippleEl.style.pointerEvents = 'none';
    rippleEl.style.boxShadow = '0 0 10px rgba(0, 150, 255, 0.7), 0 0 20px rgba(0, 150, 255, 0.4)';
    
    if (this.blur) {
      rippleEl.style.filter = 'blur(4px)';
    }
    
    // Add animation
    rippleEl.style.animation = `ripple-expand ${this.duration}ms ease-out forwards`;
    
    this.container.appendChild(rippleEl);
    this.ripples.push(ripple);
    
    // Limit ripples
    if (this.ripples.length > this.maxRipples) {
      const oldRipple = this.ripples.shift();
      const oldEl = this.container.querySelector(`[data-id="${oldRipple.id}"]`);
      if (oldEl) {
        oldEl.remove();
      }
    }
    
    // Remove after duration
    setTimeout(() => {
      rippleEl.remove();
      this.ripples = this.ripples.filter(r => r.id !== ripple.id);
    }, this.duration);
  }
  
  destroy() {
    window.removeEventListener('mousemove', this.handleMouseMove);
    if (this.container && this.container.parentNode) {
      this.container.parentNode.removeChild(this.container);
    }
  }
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    new RippleCursor({
      maxSize: 50,
      duration: 1000,
      blur: true
    });
  });
} else {
  // DOM already loaded
  new RippleCursor({
    maxSize: 50,
    duration: 1000,
    blur: true
  });
}
