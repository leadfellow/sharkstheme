<?php
/**
 * Footer Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

    </main><!-- #main -->

    <footer class="site-footer">
        <!-- Watermark Background -->
        <div class="site-footer__watermark" aria-hidden="true">
            marketing sharks
        </div>
        
        <div class="container">
            <!-- Footer Top: Logo + Nav + CTA -->
            <div class="site-footer__top">
                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-footer__logo" rel="home">
                    <?php
                    $logo = get_field('site_logo', 'option');
                    if ($logo && !empty($logo['url'])):
                    ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" 
                             alt="<?php echo esc_attr($logo['alt'] ?: get_bloginfo('name')); ?>">
                    <?php else: ?>
                        <span class="site-footer__logo-text"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>

                <!-- Navigation + CTA -->
                <nav class="site-footer__nav" aria-label="Footer Navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'site-footer__menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                    
                    <!-- CTA Button -->
                    <a href="#contact" class="site-footer__cta btn btn--outline">
                        Küsi pakkumist
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor">
                            <path d="M1 8h14M9 2l6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </nav>
            </div>

            <!-- Divider -->
            <div class="site-footer__divider"></div>

            <!-- Footer Bottom: Social + Copyright -->
            <div class="site-footer__bottom">
                <!-- Social Links -->
                <ul class="site-footer__social">
                    <li>
                        <a href="#" target="_blank" rel="noopener" class="site-footer__social-link">
                            <span>INSTAGRAM</span>
                            <div class="site-footer__social-icon">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M1 6H11M6 1L11 6L6 11" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="noopener" class="site-footer__social-link">
                            <span>FACEBOOK</span>
                            <div class="site-footer__social-icon">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M1 6H11M6 1L11 6L6 11" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank" rel="noopener" class="site-footer__social-link">
                            <span>LINKEDIN</span>
                            <div class="site-footer__social-icon">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M1 6H11M6 1L11 6L6 11" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    </li>
                </ul>

                <!-- Copyright -->
                <p class="site-footer__copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
// Simple mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.querySelector('.site-nav__toggle');
    const nav = document.querySelector('.site-nav');
    const close = document.querySelector('.site-nav__close');
    
    if (toggle && nav) {
        toggle.addEventListener('click', function() {
            nav.classList.add('is-active');
            toggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (close && nav) {
        close.addEventListener('click', function() {
            nav.classList.remove('is-active');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    }
    
    // Close menu when clicking outside
    if (nav) {
        nav.addEventListener('click', function(e) {
            if (e.target === nav) {
                nav.classList.remove('is-active');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    }
});
</script>

</body>
</html>

