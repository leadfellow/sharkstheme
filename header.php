<?php
/**
 * Header Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header class="site-header">
        <div class="container">
            <div class="site-header__inner">
                <!-- Logo -->
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <?php
                    // Try Sharks Settings logo first
                    $sharks_logo = get_field('site_logo', 'option');
                    $logo_width = get_field('logo_width', 'option') ?: 160;
                    $logo_mobile_width = get_field('logo_mobile_width', 'option') ?: 120;
                    
                    if ($sharks_logo && !empty($sharks_logo['url'])):
                        ?>
                        <img src="<?php echo esc_url($sharks_logo['url']); ?>" 
                             alt="<?php echo esc_attr($sharks_logo['alt'] ?: get_bloginfo('name')); ?>"
                             width="<?php echo esc_attr($logo_width); ?>"
                             height="auto"
                             class="site-logo__image"
                             style="--logo-mobile-width: <?php echo esc_attr($logo_mobile_width); ?>px;">
                    <?php elseif (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <span class="site-logo__text"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>

                <!-- Mobile menu toggle -->
                <button class="site-nav__toggle" aria-label="Toggle navigation" aria-expanded="false">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Navigation -->
                <nav class="site-nav" aria-label="Primary Navigation">
                    <button class="site-nav__close" aria-label="Close navigation">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_class'     => 'site-nav__menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </nav>
                
                <!-- CTA Button -->
                <a href="#contact" class="site-cta btn btn--primary">
                    Küsi pakkumist 
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor">
                        <path d="M1 8h14M9 2l6 6-6 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <script>
    // Header scroll effect
    (function() {
        const header = document.querySelector('.site-header');
        
        function handleScroll() {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }
        
        window.addEventListener('scroll', handleScroll);
        handleScroll(); // Check initial state
    })();
    
    // Mobile menu toggle
    (function() {
        const toggle = document.querySelector('.site-nav__toggle');
        const close = document.querySelector('.site-nav__close');
        const nav = document.querySelector('.site-nav');
        
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
        
        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && nav.classList.contains('is-active')) {
                nav.classList.remove('is-active');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
        
        // Close on overlay click
        if (nav) {
            nav.addEventListener('click', function(e) {
                if (e.target === nav) {
                    nav.classList.remove('is-active');
                    toggle.setAttribute('aria-expanded', 'false');
                    document.body.style.overflow = '';
                }
            });
        }
    })();
    
    // Dropdown menu toggle on click
    (function() {
        const menuItems = document.querySelectorAll('.site-nav__menu .menu-item-has-children');
        
        menuItems.forEach(function(item) {
            const link = item.querySelector('a');
            
            if (link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Desktop: Close other dropdowns
                    if (window.innerWidth > 900) {
                        menuItems.forEach(function(otherItem) {
                            if (otherItem !== item) {
                                otherItem.classList.remove('is-open');
                            }
                        });
                    }
                    
                    // Toggle current dropdown
                    item.classList.toggle('is-open');
                });
            }
        });
        
        // Close dropdown when clicking outside (desktop only)
        document.addEventListener('click', function(e) {
            if (window.innerWidth > 900 && !e.target.closest('.menu-item-has-children')) {
                menuItems.forEach(function(item) {
                    item.classList.remove('is-open');
                });
            }
        });
    })();
    </script>

    <main id="main" class="site-main">

