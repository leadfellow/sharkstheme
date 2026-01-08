/**
 * Why We Block - Animated Counter
 * Animeerib numbrid dünaamiliselt kasvavaks kui element on nähtav
 */

(function() {
    'use strict';

    /**
     * Eraldab numbri ja suffiksi (nt. "95%" -> {number: 95, suffix: "%"})
     */
    function parseNumberAndSuffix(str) {
        const match = str.match(/^([\d.,]+)(.*)$/);
        if (match) {
            return {
                number: parseFloat(match[1].replace(',', '.')),
                suffix: match[2].trim()
            };
        }
        return { number: 0, suffix: str };
    }

    /**
     * Formateerib numbri tagasi stringiks koos suffiksiga
     */
    function formatNumber(num, suffix, decimals = 0) {
        return num.toFixed(decimals) + suffix;
    }

    /**
     * Animeerib numbrit 0-st target väärtuseni
     */
    function animateCounter(element, targetStr, duration = 2000) {
        const parsed = parseNumberAndSuffix(targetStr);
        const targetNumber = parsed.number;
        const suffix = parsed.suffix;
        
        // Kontrolli kas on komakohad
        const decimalMatch = targetStr.match(/\.(\d+)/);
        const decimals = decimalMatch ? decimalMatch[1].length : 0;
        
        const startTime = performance.now();
        const startNumber = 0;

        function updateCounter(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Ease-out animatsioon
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            
            const currentNumber = startNumber + (targetNumber - startNumber) * easeProgress;
            element.textContent = formatNumber(currentNumber, suffix, decimals);

            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                // Veendu, et lõppväärtus on täpne
                element.textContent = targetStr;
            }
        }

        requestAnimationFrame(updateCounter);
    }

    /**
     * Intersection Observer callback
     */
    function handleIntersection(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const targetValue = element.getAttribute('data-target');
                
                if (targetValue && !element.classList.contains('animated')) {
                    element.classList.add('animated');
                    animateCounter(element, targetValue);
                    observer.unobserve(element);
                }
            }
        });
    }

    /**
     * Initsialiseerib kõik loendajad
     */
    function initCounters() {
        const counters = document.querySelectorAll('.why-we-stat-number[data-target]');
        
        if (counters.length === 0) {
            return;
        }

        // Loo Intersection Observer
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3 // Käivita kui 30% elemendist on nähtav
        };

        const observer = new IntersectionObserver(handleIntersection, observerOptions);

        // Jälgi kõiki loendajaid
        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    // Käivita kui DOM on valmis
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCounters);
    } else {
        initCounters();
    }

    // Gutenbergi eelvaate tugi
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=why-we', initCounters);
    }

})();
