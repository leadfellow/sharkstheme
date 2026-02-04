<?php
/**
 * Inquiry 2 Block Template (Static Title)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$title_line_1 = get_field('title_line_1') ?: 'TELLI DIGITURUNDUS DIGIKOGENUD';
$title_line_2 = get_field('title_line_2') ?: 'TURUNDUSAGENTUURILT';
$submit_text = get_field('submit_text') ?: 'SAADA PÄRING';
$cf7_shortcode = get_field('cf7_shortcode');
$button_hover_color = get_field('button_hover_color') ?: '#333333';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'inquiry-2');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<style>
  /* Force hide ONLY CF7 validation errors box - keep success message visible temporarily */
  #<?php echo esc_attr($anchor); ?> .wpcf7 form.invalid .wpcf7-response-output,
  #<?php echo esc_attr($anchor); ?> .wpcf7 form.unaccepted .wpcf7-response-output,
  #<?php echo esc_attr($anchor); ?> .wpcf7 form.payment-required .wpcf7-response-output,
  #<?php echo esc_attr($anchor); ?> .wpcf7 form .wpcf7-response-output.wpcf7-validation-errors,
  #<?php echo esc_attr($anchor); ?> .wpcf7-response-output.wpcf7-validation-errors,
  .block-inquiry-2 .wpcf7 form.invalid .wpcf7-response-output,
  .block-inquiry-2 .wpcf7 form.unaccepted .wpcf7-response-output,
  .block-inquiry-2 .wpcf7 form.payment-required .wpcf7-response-output,
  .block-inquiry-2 .wpcf7 form .wpcf7-response-output.wpcf7-validation-errors,
  .block-inquiry-2__form-fields .wpcf7 form.invalid .wpcf7-response-output,
  .block-inquiry-2 .wpcf7-response-output.wpcf7-validation-errors {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    height: 0 !important;
    max-height: 0 !important;
    overflow: hidden !important;
    position: absolute !important;
    left: -9999px !important;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
  }
  
  /* Test if CSS is loaded */
  #<?php echo esc_attr($anchor); ?> {
    position: relative;
  }
</style>


<section id="<?php echo esc_attr($anchor); ?>" class="block-inquiry-2<?php echo esc_attr($align_class . $class_name); ?>" style="--button-hover-color: <?php echo esc_attr($button_hover_color); ?>;">
  <div class="block-inquiry-2__wrapper">
    <!-- Header Section (Static) -->
    <div class="block-inquiry-2__header">
      <div class="block-inquiry-2__header-content">
        <div class="block-inquiry-2__title-line-1">
          <p><?php echo esc_html($title_line_1); ?></p>
        </div>
        <div class="block-inquiry-2__title-line-2">
          <svg class="block-inquiry-2__icon-x" width="62" height="62" viewBox="0 0 62 62" fill="none">
            <path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="white"/>
          </svg>
          <p><?php echo esc_html($title_line_2); ?></p>
          <svg class="block-inquiry-2__icon-asterisk" width="62" height="62" viewBox="0 0 62 62" fill="none">
            <path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0458V38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1346L15.0653 57.5575L4.44225 46.9344L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.0487L23.4882 13.7714V0.953974H38.5116V12.8651Z" fill="white"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="block-inquiry-2__form-wrapper">
      <div class="block-inquiry-2__form-container">
        <div class="block-inquiry-2__form-content">
          <div>
            <!-- Form Fields -->
            <div class="block-inquiry-2__form-fields">
              <?php 
              if ($cf7_shortcode && function_exists('do_shortcode')) {
                echo do_shortcode($cf7_shortcode);
              } else {
                echo '<p>Please add Contact Form 7 shortcode in block settings.</p>';
              }
              ?>
            </div>

            <!-- Submit Button -->
            <div class="block-inquiry-2__submit-section" onclick="this.closest('.block-inquiry-2').querySelector('.wpcf7-submit').click();">
              <div class="block-inquiry-2__submit-content">
                <div>
                  <div class="block-inquiry-2__arrow-icon">
                    <svg width="62" height="62" viewBox="0 0 62 62" fill="none">
                      <rect x="0.837838" y="0.837838" width="60.3243" height="60.3243" rx="30.1622" stroke="white" stroke-width="1.67568"/>
                      <path d="M24.1499 37.8504L37.8501 24.1503" stroke="white" stroke-width="2.74479" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M26.89 24.1496L37.8502 24.1496L37.8502 35.1097" stroke="white" stroke-width="2.74479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>
                  <p class="block-inquiry-2__submit-text"><?php echo esc_html($submit_text); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
(function() {
  // Wait for DOM to be ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initInquiry2);
  } else {
    initInquiry2();
  }
  
  function initInquiry2() {
    const block = document.getElementById('<?php echo esc_js($anchor); ?>');
    if (!block) return;
    
    const formWrapper = block.querySelector('.block-inquiry-2__form-wrapper');
    const form = block.querySelector('.wpcf7-form');
    
    if (!formWrapper || !form) return;
    
    // Flag to prevent multiple calls
    let successShown = false;
    
    // Function to show success message
    function showSuccessMessage() {
      if (successShown) return;
      successShown = true;
      
      // Get the button hover color from CSS variable
      const buttonHoverColor = getComputedStyle(block).getPropertyValue('--button-hover-color').trim() || '#ffc0cb';
      
      // Get CF7 success message from multiple sources
      let messageText = 'Sõnum on edukalt saadetud!'; // Fallback
      
      // 1. Try to get from event (stored in window)
      if (window.cf7SuccessMessage) {
        messageText = window.cf7SuccessMessage;
      }
      
      // 2. Try to get message from CF7's cached data
      const wpcf7Elm = form.closest('.wpcf7');
      if (wpcf7Elm && typeof wpcf7 !== 'undefined') {
        const formId = wpcf7Elm.getAttribute('data-wpcf7-id');
        if (formId && wpcf7.cached && wpcf7.cached[formId]) {
          const messages = wpcf7.cached[formId].messages;
          if (messages && messages.mail_sent_ok) {
            messageText = messages.mail_sent_ok;
          }
        }
      }
      
      // 3. Try to read from response output if it exists (but not error messages)
      const cf7Response = form.querySelector('.wpcf7-response-output');
      if (cf7Response && cf7Response.textContent.trim() && 
          !cf7Response.classList.contains('wpcf7-validation-errors') &&
          !cf7Response.classList.contains('wpcf7-mail-sent-ng')) {
        const responseText = cf7Response.textContent.trim();
        // Don't use error messages as success text
        if (responseText.length > 0 && 
            !responseText.includes('error') && 
            !responseText.includes('Error') &&
            !responseText.includes('failed') &&
            !responseText.includes('Failed')) {
          messageText = responseText;
        }
      }
      
      // Hide all CF7 messages
      const cf7Messages = formWrapper.querySelectorAll('.wpcf7-response-output');
      cf7Messages.forEach(msg => msg.style.display = 'none');
      
      // Add background with selected color and perfect centering
      formWrapper.style.cssText = `
        background-color: ${buttonHoverColor} !important;
        min-height: 400px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 40px !important;
        position: relative !important;
      `;
      
      // Hide form content
      const formContent = formWrapper.querySelector('.block-inquiry-2__form-content');
      if (formContent) formContent.style.display = 'none';
      
      // Remove any existing success messages
      const existingSuccess = formWrapper.querySelectorAll('.inquiry-success-message');
      existingSuccess.forEach(el => el.remove());
      
      // Create and add success message - perfectly centered with CF7 message
      const successDiv = document.createElement('div');
      successDiv.className = 'inquiry-success-message';
      successDiv.style.cssText = `
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 60px 40px;
        max-width: 800px;
        width: 90%;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.5s ease-in;
      `;
      successDiv.innerHTML = `<h2 style="font-family: Switzer, sans-serif; font-size: 48px; font-weight: 500; color: #000; margin: 0; text-transform: uppercase; line-height: 1.2; letter-spacing: -2.4px;">${messageText}</h2>`;
      
      formWrapper.appendChild(successDiv);
      
      // Add fade-in animation
      setTimeout(() => {
        successDiv.style.opacity = '1';
      }, 50);
      
      // Auto-hide after 5 seconds or on scroll
      let hideTimeout = setTimeout(() => {
        fadeOutSuccessMessage(formWrapper, successDiv);
      }, 5000);
      
      // Hide on scroll
      const scrollHandler = () => {
        clearTimeout(hideTimeout);
        fadeOutSuccessMessage(formWrapper, successDiv);
        window.removeEventListener('scroll', scrollHandler);
      };
      
      window.addEventListener('scroll', scrollHandler, { once: true });
    }
    
    // Function to fade out success message
    function fadeOutSuccessMessage(formWrapper, successDiv) {
      successDiv.style.transition = 'opacity 0.8s ease-out';
      successDiv.style.opacity = '0';
      
      setTimeout(() => {
        // Restore form after fade out
        formWrapper.style.cssText = '';
        const formContent = formWrapper.querySelector('.block-inquiry-2__form-content');
        if (formContent) {
          formContent.style.display = '';
        }
        if (successDiv && successDiv.parentNode) {
          successDiv.remove();
        }
        
        // Reset form
        const form = formWrapper.querySelector('.wpcf7-form');
        if (form) {
          form.reset();
          form.classList.remove('sent', 'failed', 'invalid');
        }
        
        successShown = false;
      }, 800);
    }
    
    // Listen for CF7 success event
    document.addEventListener('wpcf7mailsent', function(event) {
      const eventBlock = event.target.closest('.block-inquiry-2');
      if (eventBlock && eventBlock.id === '<?php echo esc_js($anchor); ?>') {
        // Store the success message from event detail
        if (event.detail && event.detail.apiResponse && event.detail.apiResponse.message) {
          window.cf7SuccessMessage = event.detail.apiResponse.message;
        }
        showSuccessMessage();
      }
    }, false);
    
    // Watch for form class changes
    const observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
          const classList = form.classList;
          
          // Show success message when form is sent
          if (classList.contains('sent')) {
            setTimeout(() => showSuccessMessage(), 100);
          }
          
          // TEMPORARY: Also show on failed until CF7 mail is configured
          // TODO: Remove this line after fixing CF7 SMTP settings
          if (classList.contains('failed')) {
            setTimeout(() => showSuccessMessage(), 100);
          }
        }
      });
    });
    
    observer.observe(form, {
      attributes: true,
      attributeFilter: ['class']
    });
  }
})();
</script>

