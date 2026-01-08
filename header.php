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
    <style>
    /* Submenu override styles - loaded last to ensure priority */
    .site-nav__menu .sub-menu a {
        font-family: 'Switzer', var(--font-heading) !important;
        font-size: 42px !important;
        color: #000000 !important;
    }
    </style>
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
                <?php
                // Get CTA settings from Sharks Settings
                $cta_type = get_field('header_cta_type', 'option') ?: 'link';
                $cta_text = get_field('header_cta_text', 'option') ?: 'Küsi pakkumist';
                $cta_link = get_field('header_cta_link', 'option') ?: '#contact';
                $cta_modal_title = get_field('header_cta_modal_title', 'option');
                $cta_modal_content = get_field('header_cta_modal_content', 'option');
                $cta_cf7_shortcode = get_field('header_cta_cf7_shortcode', 'option');
                $cta_cf7_title = get_field('header_cta_cf7_title', 'option');
                $cta_calendly_url = get_field('header_cta_calendly_url', 'option');
                $cta_calendly_inline = get_field('header_cta_calendly_inline', 'option');
                
                // Determine href and data attributes
                $href = '#';
                $data_attrs = '';
                $onclick = '';
                
                switch ($cta_type) {
                    case 'modal':
                        $href = '#';
                        $data_attrs = ' data-modal="header-cta"';
                        break;
                    case 'contact_form':
                        $href = '#';
                        $data_attrs = ' data-modal="header-cf7"';
                        break;
                    case 'calendly':
                        if ($cta_calendly_inline) {
                            $href = '#';
                            $data_attrs = ' data-calendly="' . esc_url($cta_calendly_url) . '"';
                        } else {
                            $href = esc_url($cta_calendly_url);
                            $data_attrs = ' target="_blank" rel="noopener"';
                        }
                        break;
                    case 'link':
                    default:
                        $href = esc_url($cta_link);
                        break;
                }
                ?>
                <a href="<?php echo $href; ?>" class="site-cta btn btn--primary"<?php echo $data_attrs; ?>>
                    <?php echo esc_html($cta_text); ?> 
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
    
    // Dropdown menu - hover opens, link is clickable
    (function() {
        const header = document.querySelector('.site-header');
        const menuItems = document.querySelectorAll('.site-nav__menu .menu-item-has-children');
        
        // Add asterisk SVG and arrow icons to each submenu
        menuItems.forEach(function(item) {
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                // Wrap existing items in container
                const items = Array.from(submenu.children);
                const container = document.createElement('ul');
                container.className = 'sub-menu-container';
                
                items.forEach(function(li) {
                    // Add arrow icon to each link
                    const link = li.querySelector('a');
                    if (link) {
                        const arrow = document.createElement('span');
                        arrow.className = 'submenu-arrow';
                        arrow.innerHTML = '<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M68.5352 174.814L93 174.814" stroke="black" stroke-width="2.8592" stroke-linecap="round" stroke-linejoin="round" transform="translate(-68.5, -165)"/><path d="M83.2148 165.028L93.0008 174.814L83.2148 184.6" stroke="black" stroke-width="2.8592" stroke-linecap="round" stroke-linejoin="round" transform="translate(-68.5, -165)"/></g></svg>';
                        link.insertBefore(arrow, link.firstChild);
                    }
                    container.appendChild(li);
                });
                
                submenu.innerHTML = '';
                submenu.appendChild(container);
                
                // Add asterisk with Sharks logo background
                const asterisk = document.createElement('div');
                asterisk.className = 'submenu-asterisk';
                asterisk.innerHTML = `
                    <div class="asterisk-bg"></div>
                    <svg class="asterisk-icon" width="23" height="35" viewBox="0 0 286 429" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M111.882 48.3398L111.547 47.7868L101.767 55.8829C100.271 57.1219 98.1359 57.1086 96.6561 55.851L92.5614 52.3759L92.6547 52.243L97.1511 51.5224L96.428 46.7551L96.4902 46.6647L101.023 45.9389L100.292 41.1317L100.326 41.0865L104.895 40.3553L104.159 35.5083L104.151 35.5189L100.359 29.2361L87.9302 41.9879C87.9302 41.9879 79.2899 38.8797 71.852 41.9879L79.8911 50.2355L69.6051 60.7884L58 62.4768L70.5744 67.8875L76.3095 81.2587L76.7553 69.0627L88.1272 69.1398L89.1301 75.3827C89.1301 75.3827 91.7424 72.2745 93.2041 69.177C99.1051 69.177 104.62 66.1672 107.917 61.1447L114.009 51.8654L111.882 48.3398ZM92.2011 41.9161C92.7998 41.3019 93.7691 41.3019 94.3651 41.9161C94.9638 42.5303 94.9638 43.522 94.3651 44.1362C93.7691 44.7504 92.7998 44.7504 92.2011 44.1362C91.6051 43.522 91.6051 42.5303 92.2011 41.9161Z" fill="white"/>
                    </svg>
                `;
                submenu.appendChild(asterisk);
            }
        });
        
        // Desktop: add/remove submenu-open class on hover
        if (window.innerWidth > 900) {
            menuItems.forEach(function(item) {
                item.addEventListener('mouseenter', function() {
                    header.classList.add('submenu-open');
                });
                
                item.addEventListener('mouseleave', function() {
                    header.classList.remove('submenu-open');
                });
            });
        }
        
        // Mobile only: toggle on click
        menuItems.forEach(function(item) {
            const link = item.querySelector('a');
            
            if (link) {
                link.addEventListener('click', function(e) {
                    // Mobile only: prevent default and toggle
                    if (window.innerWidth <= 900) {
                        e.preventDefault();
                        item.classList.toggle('is-open');
                    }
                    // Desktop: link is clickable, hover opens dropdown
                });
            }
        });
        
        // Close dropdown when clicking outside (mobile only)
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 900 && !e.target.closest('.menu-item-has-children')) {
                menuItems.forEach(function(item) {
                    item.classList.remove('is-open');
                });
            }
        });
    })();
    </script>

    <main id="main" class="site-main">

