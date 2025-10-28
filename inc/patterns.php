<?php
/**
 * Block Patterns
 * 
 * Block Patterns on eelnevalt konfigureeritud blokide kombinatsioonid,
 * mida kasutajad saavad kiiresti lisada oma lehele.
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Block Pattern Categories
 */
add_action('init', function() {
    // Registreeri oma pattern kategooriad
    register_block_pattern_category('sharks-landing', [
        'label' => __('Landing Pages', 'sharks2025'),
    ]);

    register_block_pattern_category('sharks-sections', [
        'label' => __('Sections', 'sharks2025'),
    ]);
}, 9); // Priority 9 - enne patterns'te registreerimist

/**
 * Register Block Patterns
 */
add_action('init', function() {
    // Check if ACF blocks are registered
    if (!function_exists('acf_register_block_type')) {
        return;
    }
    
    // Pattern 1: Hero + Services
    register_block_pattern('sharks2025/hero-services', [
        'title'       => __('Hero + Services Section', 'sharks2025'),
        'description' => __('Hero banner followed by services grid', 'sharks2025'),
        'categories'  => ['sharks-landing'],
        'keywords'    => ['hero', 'services', 'landing'],
        'blockTypes'  => ['acf/hero', 'acf/services'],
        'content'     => '
            <!-- wp:acf/hero {"name":"acf/hero","align":"full","data":{"headline":"Transform Your Business Today","subheadline":"We provide innovative solutions that drive growth and success","primary_cta_text":"Get Started","primary_cta_url":"#contact","secondary_cta_text":"Learn More","secondary_cta_url":"#services","style_variant":"default"}} /-->
            
            <!-- wp:acf/services {"name":"acf/services","align":"full","data":{"section_title":"What We Offer","section_text":"Comprehensive solutions tailored to your needs"}} /-->
        ',
    ]);

    // Pattern 2: Full Landing Page
    register_block_pattern('sharks2025/complete-landing', [
        'title'       => __('Complete Landing Page', 'sharks2025'),
        'description' => __('Full landing page with all sections', 'sharks2025'),
        'categories'  => ['sharks-landing'],
        'keywords'    => ['landing', 'homepage', 'complete'],
        'blockTypes'  => ['acf/hero', 'acf/services', 'acf/pricing', 'acf/cta', 'acf/contact-form'],
        'content'     => '
            <!-- wp:acf/hero {"name":"acf/hero","align":"full","data":{"headline":"Welcome to Sharks 2025","subheadline":"Your trusted partner in digital transformation","primary_cta_text":"Get Started","primary_cta_url":"#contact","secondary_cta_text":"View Services","secondary_cta_url":"#services"}} /-->
            
            <!-- wp:acf/services {"name":"acf/services","align":"full","data":{"section_title":"Our Services","section_text":"Everything you need to succeed online"}} /-->
            
            <!-- wp:acf/pricing {"name":"acf/pricing","align":"full","data":{"section_title":"Simple Pricing","section_text":"Choose the plan that fits your needs"}} /-->
            
            <!-- wp:acf/cta {"name":"acf/cta","align":"full","data":{"title":"Ready to Get Started?","text":"Join hundreds of satisfied customers today","primary_button_text":"Start Free Trial","primary_button_url":"/signup","style_variant":"gradient"}} /-->
            
            <!-- wp:acf/contact-form {"name":"acf/contact-form","align":"full","data":{"title":"Get In Touch","text":"We\'d love to hear from you","show_contact_info":true}} /-->
        ',
    ]);

    // Pattern 3: Pricing + CTA
    register_block_pattern('sharks2025/pricing-cta', [
        'title'       => __('Pricing + CTA', 'sharks2025'),
        'description' => __('Pricing table with call to action', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['pricing', 'cta', 'call to action'],
        'blockTypes'  => ['acf/pricing', 'acf/cta'],
        'content'     => '
            <!-- wp:acf/pricing {"name":"acf/pricing","align":"full","data":{"section_title":"Choose Your Plan","section_text":"Flexible pricing for businesses of all sizes"}} /-->
            
            <!-- wp:acf/cta {"name":"acf/cta","align":"full","data":{"title":"Not Sure Which Plan to Choose?","text":"Contact our team for a personalized recommendation","primary_button_text":"Talk to Sales","primary_button_url":"#contact","style_variant":"accent"}} /-->
        ',
    ]);

    // Pattern 4: Services + Contact
    register_block_pattern('sharks2025/services-contact', [
        'title'       => __('Services + Contact Form', 'sharks2025'),
        'description' => __('Services grid followed by contact section', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['services', 'contact', 'form'],
        'blockTypes'  => ['acf/services', 'acf/contact-form'],
        'content'     => '
            <!-- wp:acf/services {"name":"acf/services","align":"full","data":{"section_title":"How We Can Help","section_text":"Explore our range of professional services"}} /-->
            
            <!-- wp:acf/contact-form {"name":"acf/contact-form","align":"full","data":{"title":"Let\'s Work Together","text":"Tell us about your project and we\'ll get back to you within 24 hours","show_contact_info":true}} /-->
        ',
    ]);

    // Pattern 5: Two Column Hero (Centered)
    register_block_pattern('sharks2025/hero-centered', [
        'title'       => __('Centered Hero', 'sharks2025'),
        'description' => __('Hero with centered content and large headline', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['hero', 'banner', 'centered'],
        'blockTypes'  => ['acf/hero'],
        'content'     => '
            <!-- wp:acf/hero {"name":"acf/hero","align":"full","data":{"headline":"Make Your Vision a Reality","subheadline":"Join thousands of companies that trust us with their digital presence","primary_cta_text":"Start Now","primary_cta_url":"#","secondary_cta_text":"Watch Demo","secondary_cta_url":"#","style_variant":"centered"}} /-->
        ',
    ]);

    // Pattern 6: Dark CTA
    register_block_pattern('sharks2025/cta-dark', [
        'title'       => __('Dark CTA Section', 'sharks2025'),
        'description' => __('Call to action with dark background', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['cta', 'dark', 'call to action'],
        'blockTypes'  => ['acf/cta'],
        'content'     => '
            <!-- wp:acf/cta {"name":"acf/cta","align":"full","data":{"title":"Transform Your Business Today","text":"Don\'t miss out on the opportunity to take your business to the next level","primary_button_text":"Get Started Free","primary_button_url":"#signup","secondary_button_text":"Schedule a Demo","secondary_button_url":"#demo","style_variant":"dark"}} /-->
        ',
    ]);

    // Pattern 7: Case Studies Grid
    register_block_pattern('sharks2025/case-studies-3col', [
        'title'       => __('Case Studies Grid (3 Columns)', 'sharks2025'),
        'description' => __('Display case studies in a 3-column grid', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['case study', 'portfolio', 'work', 'projects'],
        'blockTypes'  => ['acf/case-studies-grid'],
        'content'     => '
            <!-- wp:acf/case-studies-grid {"name":"acf/case-studies-grid","align":"full","data":{"section_title":"Our Work","section_subtitle":"Explore our latest projects and success stories","posts_to_show":"6","grid_layout":"3-col","show_excerpt":"1","show_cta":"1"}} /-->
        ',
    ]);

    // Pattern 8: Case Studies Portfolio (2 Columns)
    register_block_pattern('sharks2025/case-studies-2col', [
        'title'       => __('Case Studies Portfolio (2 Columns)', 'sharks2025'),
        'description' => __('Display case studies in a 2-column layout with more detail', 'sharks2025'),
        'categories'  => ['sharks-sections'],
        'keywords'    => ['case study', 'portfolio', 'work', 'projects'],
        'blockTypes'  => ['acf/case-studies-grid'],
        'content'     => '
            <!-- wp:acf/case-studies-grid {"name":"acf/case-studies-grid","align":"full","data":{"section_title":"Featured Projects","section_subtitle":"See how we\'ve helped our clients achieve their goals","posts_to_show":"4","grid_layout":"2-col","show_excerpt":"1","show_cta":"1"}} /-->
        ',
    ]);

    // Pattern 9: Portfolio Landing Page
    register_block_pattern('sharks2025/portfolio-landing', [
        'title'       => __('Portfolio Landing Page', 'sharks2025'),
        'description' => __('Complete portfolio landing page with hero and case studies', 'sharks2025'),
        'categories'  => ['sharks-landing'],
        'keywords'    => ['portfolio', 'landing', 'case study', 'work'],
        'blockTypes'  => ['acf/hero', 'acf/case-studies-grid'],
        'content'     => '
            <!-- wp:acf/hero {"name":"acf/hero","align":"full","data":{"headline":"Our Work Speaks for Itself","subheadline":"We\'ve helped hundreds of companies transform their digital presence and achieve remarkable results","primary_cta_text":"View All Projects","primary_cta_url":"/case-studies","secondary_cta_text":"Get in Touch","secondary_cta_url":"#contact"}} /-->
            
            <!-- wp:acf/case-studies-grid {"name":"acf/case-studies-grid","align":"full","data":{"section_title":"Featured Case Studies","section_subtitle":"Discover how we solve real business challenges","posts_to_show":"6","grid_layout":"3-col","show_excerpt":"1","show_cta":"1"}} /-->
            
            <!-- wp:acf/cta {"name":"acf/cta","align":"full","data":{"title":"Ready to Start Your Project?","text":"Let\'s discuss how we can help you achieve your business goals","primary_button_text":"Schedule a Call","primary_button_url":"#contact","secondary_button_text":"View Services","secondary_button_url":"/services"}} /-->
        ',
    ]);
}, 10); // Priority 10 - pärast kategooriate registreerimist

