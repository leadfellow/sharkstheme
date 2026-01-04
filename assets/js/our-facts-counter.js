/**
 * Our Facts Counter Animation
 * Animates numbers from 0 to target value when section scrolls into view
 * 
 * @package sharks2025
 */

(function() {
  'use strict';

  let initialized = false;

  // DOM Ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initOurFactsCounter);
  } else {
    initOurFactsCounter();
  }

  /**
   * Initialize all our-facts blocks
   */
  function initOurFactsCounter() {
    if (initialized) {
      return;
    }
    initialized = true;

    const factBlocks = document.querySelectorAll('.block-our-facts');
    
    if (factBlocks.length === 0) {
      return;
    }

    factBlocks.forEach(block => {
      setupCounterAnimation(block);
    });
  }

  /**
   * Setup counter animation for a block
   */
  function setupCounterAnimation(block) {
    const statNumbers = block.querySelectorAll('.block-our-facts__stat-number');
    
    if (statNumbers.length === 0) {
      return;
    }

    // Store original values
    const originalValues = [];
    statNumbers.forEach(element => {
      const text = element.textContent.trim();
      originalValues.push({
        element: element,
        originalText: text,
        value: parseNumberFromText(text),
        suffix: extractSuffix(text),
        prefix: extractPrefix(text)
      });
    });

    // Create Intersection Observer
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !block.hasAttribute('data-animated')) {
          block.setAttribute('data-animated', 'true');
          animateCounters(originalValues);
        }
      });
    }, {
      threshold: 0.3, // Trigger when 30% of the block is visible
      rootMargin: '0px'
    });

    observer.observe(block);
  }

  /**
   * Parse number from text (e.g., "95%" -> 95, "250+" -> 250)
   */
  function parseNumberFromText(text) {
    const match = text.match(/[\d.,]+/);
    if (!match) return 0;
    
    // Remove commas and parse
    const numberStr = match[0].replace(/,/g, '');
    return parseFloat(numberStr);
  }

  /**
   * Extract suffix from text (e.g., "95%" -> "%", "250+" -> "+")
   */
  function extractSuffix(text) {
    const match = text.match(/[\d.,]+(.*)$/);
    return match && match[1] ? match[1].trim() : '';
  }

  /**
   * Extract prefix from text (e.g., "$100" -> "$")
   */
  function extractPrefix(text) {
    const match = text.match(/^([^\d.,]+)/);
    return match && match[1] ? match[1].trim() : '';
  }

  /**
   * Animate all counters
   */
  function animateCounters(originalValues) {
    originalValues.forEach(item => {
      animateCounter(item);
    });
  }

  /**
   * Animate single counter
   */
  function animateCounter(item) {
    const duration = 2000; // 2 seconds
    const startTime = performance.now();
    const startValue = 0;
    const endValue = item.value;
    const hasDecimals = endValue % 1 !== 0;

    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      // Easing function (easeOutCubic for smooth deceleration)
      const easeProgress = 1 - Math.pow(1 - progress, 3);
      
      const currentValue = startValue + (endValue - startValue) * easeProgress;
      
      // Format the number
      let displayValue;
      if (hasDecimals) {
        displayValue = currentValue.toFixed(1);
      } else {
        displayValue = Math.round(currentValue).toString();
      }
      
      // Add prefix and suffix
      const displayText = item.prefix + displayValue + item.suffix;
      item.element.textContent = displayText;
      
      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        // Ensure final value is exact
        item.element.textContent = item.originalText;
      }
    }
    
    requestAnimationFrame(update);
  }

})();

