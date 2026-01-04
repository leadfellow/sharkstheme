/**
 * Hero Title Color Wave Effect
 * Creates a dynamic color wave animation across title words
 */

(function() {
  'use strict';

  // Configuration
  const config = {
    waveSpeed: 0.15,       // Speed of the wave (lower = slower)
    colorIntensity: 0.7,   // How intense the colors are (0-1)
    baseColor: '#FFFFFF',  // Base white color
    hueShift: 60,          // How much the hue shifts (0-360)
    saturation: 70,        // Color saturation (0-100)
    lightness: 70,         // Color lightness (0-100)
  };

  let titleElement;
  let words = [];
  let animationFrame;
  let startTime;

  function init() {
    // Find the hero title element
    titleElement = document.querySelector('.block-frontpage-hero-banner__title');
    
    if (!titleElement) {
      return;
    }

    // Get all word spans
    words = Array.from(titleElement.querySelectorAll('.word'));
    
    if (words.length === 0) {
      return;
    }

    // Start animation
    startTime = Date.now();
    animate();
  }

  function animate() {
    const currentTime = Date.now();
    const elapsed = (currentTime - startTime) / 1000; // Convert to seconds

    words.forEach((word, index) => {
      // Calculate wave position for this word
      // Each word is offset in the wave based on its index
      const wavePosition = (elapsed * config.waveSpeed + index * 0.3) % (words.length * 0.5);
      
      // Calculate color intensity based on wave position
      // Creates a smooth wave that peaks at each word
      const distance = Math.abs(wavePosition - index * 0.5);
      const intensity = Math.max(0, 1 - distance * 0.8);
      
      // Calculate hue based on time and position
      const hue = (elapsed * 30 + index * config.hueShift) % 360;
      
      // Apply color with smooth transition
      if (intensity > 0.1) {
        const saturation = config.saturation * intensity;
        const lightness = 50 + (config.lightness - 50) * intensity;
        word.style.color = `hsl(${hue}, ${saturation}%, ${lightness}%)`;
        word.style.textShadow = `0 0 ${20 * intensity}px hsla(${hue}, ${saturation}%, ${lightness}%, ${intensity * 0.5})`;
      } else {
        word.style.color = config.baseColor;
        word.style.textShadow = 'none';
      }
    });

    animationFrame = requestAnimationFrame(animate);
  }

  function destroy() {
    if (animationFrame) {
      cancelAnimationFrame(animationFrame);
    }
    
    // Reset all word colors
    words.forEach(word => {
      word.style.color = '';
      word.style.textShadow = '';
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Cleanup on page unload
  window.addEventListener('beforeunload', destroy);

})();

