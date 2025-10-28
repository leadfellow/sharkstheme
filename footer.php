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
        <div class="container">
            <div class="site-footer__main">
                <!-- Column 1: About -->
                <div class="footer-column">
                    <h3 class="footer-column__title">
                        <?php bloginfo('name'); ?>
                    </h3>
                    <p class="footer-column__text">
                        <?php
                        $description = get_bloginfo('description', 'display');
                        echo $description ? esc_html($description) : 'Your trusted partner in success.';
                        ?>
                    </p>
                    <?php
                    // Social links (you can customize these)
                    $social_links = [
                        'facebook' => '#',
                        'twitter' => '#',
                        'linkedin' => '#',
                        'instagram' => '#',
                    ];
                    ?>
                    <ul class="social-links">
                        <?php foreach ($social_links as $network => $url): ?>
                            <li>
                                <a href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr(ucfirst($network)); ?>" target="_blank" rel="noopener">
                                    <?php if ($network === 'facebook'): ?>
                                        <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                                    <?php elseif ($network === 'twitter'): ?>
                                        <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                                    <?php elseif ($network === 'linkedin'): ?>
                                        <svg viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                                    <?php elseif ($network === 'instagram'): ?>
                                        <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Column 2: Navigation menu -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-1')): ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else: ?>
                        <h3 class="footer-column__title">Quick Links</h3>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-1',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Column 3: Services menu -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-2')): ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else: ?>
                        <h3 class="footer-column__title">Services</h3>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-2',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Column 4: Contact or additional menu -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-3')): ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else: ?>
                        <h3 class="footer-column__title">Contact</h3>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-3',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="site-footer__bottom">
                <p class="site-footer__copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
                </p>
                <ul class="site-footer__links">
                    <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">Terms of Service</a></li>
                </ul>
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

