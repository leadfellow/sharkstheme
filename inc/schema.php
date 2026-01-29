<?php
/**
 * Schema.org JSON-LD Implementation
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Author Schema to the head of single posts
 */
function sharks_add_author_schema()
{
    if (!is_single()) {
        return;
    }

    $author_id = get_post_field('post_author', get_queried_object_id());

    if (!$author_id) {
        return;
    }

    $author_name = get_the_author_meta('display_name', $author_id);
    $author_url = get_author_posts_url($author_id);
    $author_description = get_the_author_meta('description', $author_id);
    $author_avatar = get_avatar_url($author_id);

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => $author_name,
        'url' => $author_url,
    ];

    if ($author_description) {
        $schema['description'] = $author_description;
    }

    if ($author_avatar) {
        $schema['image'] = $author_avatar;
    }

    // Add job title if available (common in business sites)
    $job_title = get_the_author_meta('job_title', $author_id); // Custom meta if exists
    if ($job_title) {
        $schema['jobTitle'] = $job_title;
    }

    // Add social links if available
    $social_links = [];
    $platforms = ['facebook', 'twitter', 'linkedin', 'instagram'];
    foreach ($platforms as $platform) {
        $link = get_the_author_meta($platform, $author_id);
        if ($link) {
            $social_links[] = $link;
        }
    }

    if (!empty($social_links)) {
        $schema['sameAs'] = $social_links;
    }

    echo "\n<!-- Author Schema -->\n";
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'sharks_add_author_schema');
