<?php
/**
 * Why Sharks 2 Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$section_title = get_field('section_title') ?: 'MIKS MEIE';
$main_heading = get_field('main_heading') ?: 'Miks valida Marketing Sharks?';
$description = get_field('description') ?: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';
$features = get_field('features');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'why-sharks-2');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon SVG library
if (!function_exists('get_why_sharks_icon')) {
    function get_why_sharks_icon($icon_name) {
        $icons = [
            'star' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="white" stroke-width="1.4"/></svg>',
            
            'plus' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M26.0869 8.71484L31.793 3.00977L38.9893 10.2051L33.2822 15.9111L41.3516 15.9121V26.0889H33.9551L39.375 31.123L32.4492 38.5791L26.0869 32.6699V41.3545H15.9102V33.2842L10.2041 38.9902L3.00781 31.7939L8.71289 26.0889H0.643555V15.9111H8.04199L2.62109 10.877L9.54688 3.41992L15.9102 9.3291V0.646484H26.0869V8.71484Z" fill="white"/></svg>',
            
            'wave' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M39.9969 2.00314C38.8906 0.896835 37.0969 0.896835 35.9906 2.00314L29.4969 8.49687C24.8042 13.1896 17.1958 13.1896 12.5031 8.49686L6.00941 2.00314C4.90311 0.896834 3.10944 0.896835 2.00314 2.00314C0.896835 3.10944 0.896835 4.90311 2.00314 6.00941L8.49687 12.5031C13.1896 17.1958 13.1896 24.8042 8.49686 29.4969L2.00314 35.9906C0.896834 37.0969 0.896835 38.8906 2.00314 39.9969C3.10944 41.1032 4.90311 41.1032 6.00941 39.9969L12.5031 33.5031C17.1958 28.8104 24.8042 28.8104 29.4969 33.5031L35.9906 39.9969C37.0969 41.1032 38.8906 41.1032 39.9969 39.9969C41.1032 38.8906 41.1032 37.0969 39.9969 35.9906L33.5031 29.4969C28.8104 24.8042 28.8104 17.1958 33.5031 12.5031L39.9969 6.00941C41.1032 4.90311 41.1032 3.10944 39.9969 2.00314Z" fill="white"/></svg>',
            
            'diamond' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M20.8916 41.7793L14.9189 27.6768L20.8906 30.3945L27.4229 27.4219L20.8916 41.7793ZM12.0439 20.8896L14.9189 27.6768L0.000976562 20.8906L14.6758 14.6748L12.0439 20.8896ZM41.7803 20.8906L27.4229 27.4219L30.3955 20.8896L27.6777 14.918L41.7803 20.8906ZM27.6777 14.918L20.8906 12.043L14.6758 14.6748L20.8916 0L27.6777 14.918Z" fill="white"/></svg>',
            
            'circle' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="21" cy="21" r="19" stroke="white" stroke-width="2"/><circle cx="21" cy="21" r="12" fill="white"/></svg>',
            
            'square' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect x="3" y="3" width="36" height="36" stroke="white" stroke-width="2"/><rect x="12" y="12" width="18" height="18" fill="white"/></svg>',
            
            'triangle' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21 3L39.1244 36.75H2.87564L21 3Z" stroke="white" stroke-width="2"/><path d="M21 14L30.7942 30.75H11.2058L21 14Z" fill="white"/></svg>',
            
            'heart' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21 38.5C21 38.5 3.5 28 3.5 15.75C3.5 6.5 10.5 3.5 15.75 7C18.375 8.75 21 12.25 21 12.25C21 12.25 23.625 8.75 26.25 7C31.5 3.5 38.5 6.5 38.5 15.75C38.5 28 21 38.5 21 38.5Z" fill="white"/></svg>',
            
            'check' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M7 21L17.5 31.5L35 7" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            
            'arrow' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M7 21H35M35 21L25 11M35 21L25 31" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>'
        ];
        
        return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['star'];
    }
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-why-sharks-2<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-why-sharks-2__container">
        <div class="block-why-sharks-2__header">
            <p class="block-why-sharks-2__section-title"><?php echo esc_html($section_title); ?></p>
            <div class="block-why-sharks-2__header-content">
                <p class="block-why-sharks-2__title"><?php echo esc_html($main_heading); ?></p>
                <div class="block-why-sharks-2__description">
                    <p><?php echo esc_html($description); ?></p>
                </div>
            </div>
        </div>

        <div class="block-why-sharks-2__features">
            <?php if ($features && is_array($features) && count($features) > 0): ?>
                <?php foreach ($features as $index => $feature): 
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $icon = isset($feature['icon']) ? $feature['icon'] : 'star';
                    $text = isset($feature['text']) ? $feature['text'] : '';
                ?>
                    <div class="block-why-sharks-2__feature-card">
                        <div class="block-why-sharks-2__feature-number">(<?php echo esc_html($number); ?>)</div>
                        <div class="block-why-sharks-2__divider"></div>
                        <div class="block-why-sharks-2__feature-content">
                            <?php if (!empty($icon)): ?>
                                <div class="block-why-sharks-2__icon">
                                    <?php echo get_why_sharks_icon($icon); ?>
                                </div>
                            <?php endif; ?>
                            <p class="block-why-sharks-2__feature-text"><?php echo esc_html($text); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default features -->
                <div class="block-why-sharks-2__feature-card">
                    <div class="block-why-sharks-2__feature-number">(01)</div>
                    <div class="block-why-sharks-2__divider"></div>
                    <div class="block-why-sharks-2__feature-content">
                        <div class="block-why-sharks-2__icon">
                            <?php echo get_why_sharks_icon('star'); ?>
                        </div>
                        <p class="block-why-sharks-2__feature-text">Perefirma, millel on pikaajalised strateegiad.</p>
                    </div>
                </div>

                <div class="block-why-sharks-2__feature-card">
                    <div class="block-why-sharks-2__feature-number">(02)</div>
                    <div class="block-why-sharks-2__divider"></div>
                    <div class="block-why-sharks-2__feature-content">
                        <div class="block-why-sharks-2__icon">
                            <?php echo get_why_sharks_icon('plus'); ?>
                        </div>
                        <p class="block-why-sharks-2__feature-text">Selge ja läbipaistev eelarve. Meie eesmärk on, et iga investeeritud euro tooks ärile tagasi mitmekordselt.</p>
                    </div>
                </div>

                <div class="block-why-sharks-2__feature-card">
                    <div class="block-why-sharks-2__feature-number">(03)</div>
                    <div class="block-why-sharks-2__divider"></div>
                    <div class="block-why-sharks-2__feature-content">
                        <div class="block-why-sharks-2__icon">
                            <?php echo get_why_sharks_icon('wave'); ?>
                        </div>
                        <p class="block-why-sharks-2__feature-text">Me loome lahendusi, mis on esteetilised, funktsionaalsed ja konversioonidele suunatud.</p>
                    </div>
                </div>

                <div class="block-why-sharks-2__feature-card">
                    <div class="block-why-sharks-2__feature-number">(04)</div>
                    <div class="block-why-sharks-2__divider"></div>
                    <div class="block-why-sharks-2__feature-content">
                        <div class="block-why-sharks-2__icon">
                            <?php echo get_why_sharks_icon('diamond'); ?>
                        </div>
                        <p class="block-why-sharks-2__feature-text">Me ei seo kliente endaga kohustuslikus vormis, kui projekt on valmis, anname halduse ja täieliku kontrolli alati sulle. Nii säilib võim sinu käes, samal ajal kui meie oleme olemas, kui vajad professionaalset tuge.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
