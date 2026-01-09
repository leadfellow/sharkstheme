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
                // Add new mega menu class
                submenu.classList.add('sharks-mega-menu');
                
                // Wrap existing items in container
                const items = Array.from(submenu.children);
                const container = document.createElement('ul');
                container.className = 'sharks-mega-menu__items';
                
                items.forEach(function(li, index) {
                    // Add item class
                    li.classList.add('sharks-mega-menu__item');
                    
                    // Add arrow icon to each link
                    const link = li.querySelector('a');
                    if (link) {
                        link.classList.add('sharks-mega-menu__link');
                        const arrow = document.createElement('span');
                        arrow.className = 'sharks-mega-menu__arrow';
                        arrow.innerHTML = '<svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5352 22.8143L35 22.8143" stroke="black" stroke-width="2.8592" stroke-linecap="round" stroke-linejoin="round"/><path d="M25.2148 13.0284L35.0008 22.8143L25.2148 32.6002" stroke="black" stroke-width="2.8592" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                        link.insertBefore(arrow, link.firstChild);
                    }
                    container.appendChild(li);
                    
                    // Add HR separator after each item
                    const separator = document.createElement('li');
                    separator.className = 'sharks-mega-menu__separator';
                    separator.innerHTML = `<svg width="946" height="1" viewBox="0 0 946 1" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M0 0.5H946" stroke="#BBBAB6"/>
                    </svg>`;
                    container.appendChild(separator);
                });
                
                submenu.innerHTML = '';
                submenu.appendChild(container);
                
                // Add asterisk with new SVG design
                const asterisk = document.createElement('div');
                asterisk.className = 'sharks-mega-menu__asterisk';
                asterisk.innerHTML = `
                    <svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="316" height="316" fill="black"/>
                        <mask id="path-2-inside-1_474_634" fill="white">
                            <path d="M185.375 93.6172L215.511 63.4814L253.518 101.488L223.381 131.625H266V185.375H226.93L255.558 211.963L218.98 251.347L185.375 220.136V266H131.625V223.381L101.49 253.517L63.4824 215.51L93.6172 185.375H51V131.625H90.0713L61.4424 105.036L98.0205 65.6523L131.625 96.8613V51H185.375V93.6172Z"/>
                        </mask>
                        <path d="M185.375 93.6172H184.375V96.0314L186.082 94.3243L185.375 93.6172ZM215.511 63.4814L216.218 62.7743L215.511 62.0672L214.804 62.7743L215.511 63.4814ZM253.518 101.488L254.225 102.195L254.932 101.488L254.225 100.781L253.518 101.488ZM223.381 131.625L222.674 130.918L220.967 132.625H223.381V131.625ZM266 131.625H267V130.625H266V131.625ZM266 185.375V186.375H267V185.375H266ZM226.93 185.375V184.375H224.383L226.249 186.108L226.93 185.375ZM255.558 211.963L256.29 212.643L256.971 211.911L256.238 211.23L255.558 211.963ZM218.98 251.347L218.3 252.079L219.033 252.76L219.713 252.027L218.98 251.347ZM185.375 220.136L186.056 219.403L184.375 217.842V220.136H185.375ZM185.375 266V267H186.375V266H185.375ZM131.625 266H130.625V267H131.625V266ZM131.625 223.381H132.625V220.967L130.918 222.674L131.625 223.381ZM101.49 253.517L100.783 254.224L101.49 254.931L102.197 254.224L101.49 253.517ZM63.4824 215.51L62.7753 214.803L62.0682 215.51L62.7753 216.217L63.4824 215.51ZM93.6172 185.375L94.3243 186.082L96.0314 184.375H93.6172V185.375ZM51 185.375H50V186.375H51V185.375ZM51 131.625V130.625H50V131.625H51ZM90.0713 131.625V132.625H92.6175L90.7518 130.892L90.0713 131.625ZM61.4424 105.036L60.7097 104.356L60.0291 105.088L60.7619 105.769L61.4424 105.036ZM98.0205 65.6523L98.701 64.9196L97.9683 64.2391L97.2878 64.9718L98.0205 65.6523ZM131.625 96.8613L130.944 97.5941L132.625 99.1548V96.8613H131.625ZM131.625 51V50H130.625V51H131.625ZM185.375 51H186.375V50H185.375V51ZM185.375 93.6172L186.082 94.3243L216.218 64.1886L215.511 63.4814L214.804 62.7743L184.668 92.9101L185.375 93.6172ZM215.511 63.4814L214.804 64.1886L252.81 102.195L253.518 101.488L254.225 100.781L216.218 62.7743L215.511 63.4814ZM253.518 101.488L252.81 100.781L222.674 130.918L223.381 131.625L224.088 132.332L254.225 102.195L253.518 101.488ZM223.381 131.625V132.625H266V131.625V130.625H223.381V131.625ZM266 131.625H265V185.375H266H267V131.625H266ZM266 185.375V184.375H226.93V185.375V186.375H266V185.375ZM226.93 185.375L226.249 186.108L254.877 212.696L255.558 211.963L256.238 211.23L227.61 184.642L226.93 185.375ZM255.558 211.963L254.825 211.282L218.248 250.666L218.98 251.347L219.713 252.027L256.29 212.643L255.558 211.963ZM218.98 251.347L219.661 250.614L186.056 219.403L185.375 220.136L184.694 220.868L218.3 252.079L218.98 251.347ZM185.375 220.136H184.375V266H185.375H186.375V220.136H185.375ZM185.375 266V265H131.625V266V267H185.375V266ZM131.625 266H132.625V223.381H131.625H130.625V266H131.625ZM131.625 223.381L130.918 222.674L100.783 252.81L101.49 253.517L102.197 254.224L132.332 224.088L131.625 223.381ZM101.49 253.517L102.197 252.809L64.1895 214.803L63.4824 215.51L62.7753 216.217L100.783 254.224L101.49 253.517ZM63.4824 215.51L64.1895 216.217L94.3243 186.082L93.6172 185.375L92.9101 184.668L62.7753 214.803L63.4824 215.51ZM93.6172 185.375V184.375H51V185.375V186.375H93.6172V185.375ZM51 185.375H52V131.625H51H50V185.375H51ZM51 131.625V132.625H90.0713V131.625V130.625H51V131.625ZM90.0713 131.625L90.7518 130.892L62.1229 104.303L61.4424 105.036L60.7619 105.769L89.3908 132.358L90.0713 131.625ZM61.4424 105.036L62.1751 105.717L98.7532 66.3329L98.0205 65.6523L97.2878 64.9718L60.7097 104.356L61.4424 105.036ZM98.0205 65.6523L97.34 66.3851L130.944 97.5941L131.625 96.8613L132.306 96.1286L98.701 64.9196L98.0205 65.6523ZM131.625 96.8613H132.625V51H131.625H130.625V96.8613H131.625ZM131.625 51V52H185.375V51V50H131.625V51ZM185.375 51H184.375V93.6172H185.375H186.375V51H185.375Z" fill="#757472" mask="url(#path-2-inside-1_474_634)"/>
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
                        e.stopPropagation();
                        
                        const isOpen = item.classList.contains('is-open');
                        
                        // Close all other open menus
                        menuItems.forEach(function(otherItem) {
                            if (otherItem !== item) {
                                otherItem.classList.remove('is-open');
                            }
                        });
                        
                        // Toggle current menu
                        item.classList.toggle('is-open');
                    }
                    // Desktop: link is clickable, hover opens dropdown
                });
                
                // Also handle touch events for better mobile experience
                link.addEventListener('touchstart', function(e) {
                    if (window.innerWidth <= 900) {
                        // Add visual feedback
                        link.style.opacity = '0.7';
                        setTimeout(function() {
                            link.style.opacity = '';
                        }, 150);
                    }
                }, { passive: true });
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

