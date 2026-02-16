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
        justify-content: flex-start !important;
        text-align: left !important;
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
        menuItems.forEach(function(item, menuIndex) {
            const submenu = item.querySelector('.sub-menu');
            if (submenu) {
                // Get menu item text for icon matching
                const menuLink = item.querySelector('a');
                const menuText = menuLink ? menuLink.textContent.trim() : '';
                
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
                
                // Add icon - get from PHP function
                const asterisk = document.createElement('div');
                asterisk.className = 'sharks-mega-menu__asterisk';
                asterisk.setAttribute('data-menu-text', menuText);
                asterisk.setAttribute('data-menu-index', menuIndex);
                
                // The icon SVG will be inserted by PHP
                <?php
                // Output all menu icons as JavaScript data
                $menu_locations = get_nav_menu_locations();
                if (isset($menu_locations['primary'])) {
                    $menu = wp_get_nav_menu_object($menu_locations['primary']);
                    if ($menu) {
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        $parent_items = array();
                        foreach ($menu_items as $menu_item) {
                            if ($menu_item->menu_item_parent == 0) {
                                // Check if this item has children
                                $has_children = false;
                                foreach ($menu_items as $potential_child) {
                                    if ($potential_child->menu_item_parent == $menu_item->ID) {
                                        $has_children = true;
                                        break;
                                    }
                                }
                                if ($has_children) {
                                    $parent_items[] = array(
                                        'text' => $menu_item->title,
                                        'icon' => sharks_get_menu_icon($menu_item->title, count($parent_items))
                                    );
                                }
                            }
                        }
                        echo 'const menuIcons = ' . json_encode($parent_items) . ';';
                    }
                }
                ?>
                
                // Find matching icon
                if (typeof menuIcons !== 'undefined') {
                    const matchingIcon = menuIcons.find(icon => icon.text.toLowerCase() === menuText.toLowerCase());
                    if (matchingIcon) {
                        asterisk.innerHTML = matchingIcon.icon;
                    } else if (menuIcons[menuIndex]) {
                        asterisk.innerHTML = menuIcons[menuIndex].icon;
                    }
                }
                
                submenu.appendChild(asterisk);
            }
        });
        
        // Desktop: add/remove submenu-open class on hover
        if (window.innerWidth > 900) {
            let hoverTimeout;
            const nav = document.querySelector('.site-nav');
            const logo = document.querySelector('.site-logo');
            const cta = document.querySelector('.site-cta');
            
            // Function to check if mouse is in the active area (20px after logo, 20px before CTA)
            function isInActiveArea(e) {
                if (!logo || !cta) return false;
                
                const logoRect = logo.getBoundingClientRect();
                const ctaRect = cta.getBoundingClientRect();
                const mouseX = e.clientX;
                
                // Active area: 20px after logo ends, 20px before CTA starts
                const activeStart = logoRect.right + 20;
                const activeEnd = ctaRect.left - 20;
                
                return mouseX >= activeStart && mouseX <= activeEnd;
            }
            
            // Add submenu-open when hovering the navigation area (with margins)
            if (nav) {
                nav.addEventListener('mouseenter', function(e) {
                    if (isInActiveArea(e)) {
                        clearTimeout(hoverTimeout);
                        header.classList.add('submenu-open');
                    }
                });
                
                // Track mouse movement to handle the margins
                header.addEventListener('mousemove', function(e) {
                    if (isInActiveArea(e)) {
                        clearTimeout(hoverTimeout);
                        header.classList.add('submenu-open');
                    } else {
                        // If mouse is outside active area, remove the class
                        if (header.classList.contains('submenu-open')) {
                            // Check if mouse is not over submenu
                            const isOverSubmenu = e.target.closest('.sharks-mega-menu, .sub-menu');
                            if (!isOverSubmenu) {
                                hoverTimeout = setTimeout(function() {
                                    header.classList.remove('submenu-open');
                                }, 100);
                            }
                        }
                    }
                });
            }
            
            // Remove submenu-open when leaving the header
            header.addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(function() {
                    header.classList.remove('submenu-open');
                }, 100);
            });
            
            // Keep submenu-open when hovering any submenu
            menuItems.forEach(function(item) {
                const submenu = item.querySelector('.sharks-mega-menu, .sub-menu');
                if (submenu) {
                    submenu.addEventListener('mouseenter', function() {
                        clearTimeout(hoverTimeout);
                        header.classList.add('submenu-open');
                    });
                    
                    submenu.addEventListener('mouseleave', function() {
                        hoverTimeout = setTimeout(function() {
                            header.classList.remove('submenu-open');
                        }, 100);
                    });
                }
            });
        }
        
        // Mobile only: separate link click and submenu toggle
        menuItems.forEach(function(item) {
            const link = item.querySelector('a');
            
            if (link) {
                // Create a clickable area for the chevron/arrow
                const chevronArea = document.createElement('span');
                chevronArea.className = 'submenu-toggle';
                chevronArea.setAttribute('aria-label', 'Toggle submenu');
                chevronArea.setAttribute('role', 'button');
                chevronArea.setAttribute('tabindex', '0');
                
                // Append chevron area to the menu item (not after link)
                item.appendChild(chevronArea);
                
                // Chevron click - toggle submenu (mobile only)
                chevronArea.addEventListener('click', function(e) {
                    if (window.innerWidth <= 900) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        // Close all other open menus
                        menuItems.forEach(function(otherItem) {
                            if (otherItem !== item) {
                                otherItem.classList.remove('is-open');
                            }
                        });
                        
                        // Toggle current menu
                        item.classList.toggle('is-open');
                    }
                });
                
                // Prevent touch events on chevron from bubbling to link
                chevronArea.addEventListener('touchstart', function(e) {
                    if (window.innerWidth <= 900) {
                        e.stopPropagation();
                    }
                }, { passive: true });
                
                chevronArea.addEventListener('touchend', function(e) {
                    if (window.innerWidth <= 900) {
                        e.stopPropagation();
                    }
                }, { passive: true });
                
                // Link click - navigate to page (mobile: allow navigation)
                link.addEventListener('click', function(e) {
                    // On mobile, allow navigation when clicking the link text
                    if (window.innerWidth <= 900) {
                        // Check if click is on the link itself (not on chevron area)
                        const rect = link.getBoundingClientRect();
                        const clickX = e.clientX;
                        
                        // If click is in the rightmost 50px, it might be chevron
                        if (clickX > rect.right - 50) {
                            // This is likely the chevron area, don't navigate
                            return;
                        }
                        
                        // Allow navigation and close menu
                        setTimeout(function() {
                            const nav = document.querySelector('.site-nav');
                            const toggle = document.querySelector('.site-nav__toggle');
                            if (nav) {
                                nav.classList.remove('is-active');
                                document.body.style.overflow = '';
                            }
                            if (toggle) {
                                toggle.setAttribute('aria-expanded', 'false');
                            }
                        }, 100);
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

