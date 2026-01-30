<?php
/**
 * Block Name: Certificates
 * Description: Kompetentside ja sertifikaatide blokk
 * Category: sharks-blocks
 * Icon: awards
 * Keywords: certificates sertifikaadid competence kompetents
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'certificates-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'certificates-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$header_title = get_field('header_title') ?: 'Marketing Sharksi kompetents ja asutajate sertifikaadid:';
$header_icon = get_field('header_icon') ?: 'star';
$competencies = get_field('competencies') ?: [];
$certificates = get_field('certificates') ?: [];

// Icon SVG library
function get_certificates_icon($icon_name) {
    $icons = [
        'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31.0001 0.000135629L31.0062 30.9695L42.9541 2.35866L31.0175 30.9727L53.0731 9.12109L31.0261 30.9885L59.6521 19.1637L31.0308 30.9961L62.0001 31.0001L31.0308 31.0062L59.6521 42.9541L31.0261 31.0175L53.0731 53.0731L31.0175 31.0261L42.9541 59.6521L31.0062 31.0308L31.0001 62.0001L30.9961 31.0308L19.1637 59.6521L30.9885 31.0261L9.12109 53.0731L30.9727 31.0175L2.35866 42.9541L30.9695 31.0062L0.000135629 31.0001L30.9695 30.9961L2.35866 19.1637L30.9727 30.9885L9.12109 9.12109L30.9885 30.9727L19.1637 2.35866L30.9961 30.9695L31.0001 0.000135629Z" stroke="black" stroke-width="1.4"/></svg>',
        
        'plus' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.8652L46.9336 4.44336L57.5566 15.0654L49.1338 23.4883H61.0469V38.5117H50.125L58.127 45.9434L47.9033 56.9512L38.5117 48.2285V61.0469H23.4883V49.1338L15.0645 57.5576L4.44238 46.9346L12.8652 38.5117H0.954102V23.4883H11.874L3.87207 16.0566L14.0957 5.04883L23.4883 13.7715V0.954102H38.5117V12.8652Z" fill="black"/></svg>',
        
        'wave' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.0969 2.90314C57.5906 1.39683 55.0969 1.39683 53.5906 2.90314L43.4969 13.0969C36.5042 20.0896 25.4958 20.0896 18.5031 13.0969L8.40941 2.90314C6.90311 1.39683 4.40944 1.39683 2.90314 2.90314C1.39683 4.40944 1.39683 6.90311 2.90314 8.40941L13.0969 18.5031C20.0896 25.4958 20.0896 36.5042 13.0969 43.4969L2.90314 53.5906C1.39683 55.0969 1.39683 57.5906 2.90314 59.0969C4.40944 60.6032 6.90311 60.6032 8.40941 59.0969L18.5031 48.9031C25.4958 41.9104 36.5042 41.9104 43.4969 48.9031L53.5906 59.0969C55.0969 60.6032 57.5906 60.6032 59.0969 59.0969C60.6032 57.5906 60.6032 55.0969 59.0969 53.5906L48.9031 43.4969C41.9104 36.5042 41.9104 25.4958 48.9031 18.5031L59.0969 8.40941C60.6032 6.90311 60.6032 4.40944 59.0969 2.90314Z" fill="black"/></svg>',
        
        'diamond' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M30.8916 61.7793L21.9189 40.6768L30.8906 44.8945L40.4229 40.4219L30.8916 61.7793ZM17.0439 30.8896L21.9189 40.6768L0.000976562 30.8906L21.6758 21.6748L17.0439 30.8896ZM61.7803 30.8906L40.4229 40.4219L44.8955 30.8896L40.6777 21.918L61.7803 30.8906ZM40.6777 21.918L30.8906 17.043L21.6758 21.6748L30.8916 0L40.6777 21.918Z" fill="black"/></svg>',
        
        'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="28" stroke="black" stroke-width="2"/><circle cx="31" cy="31" r="18" fill="black"/></svg>',
        
        'square' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><rect x="4" y="4" width="54" height="54" stroke="black" stroke-width="2"/><rect x="18" y="18" width="26" height="26" fill="black"/></svg>',
        
        'triangle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31 4L58.1244 54.75H3.87564L31 4Z" stroke="black" stroke-width="2"/><path d="M31 21L45.7942 45.75H16.2058L31 21Z" fill="black"/></svg>',
        
        'heart' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31 57C31 57 5 42 5 23.25C5 9.5 15.5 5 23.25 10.5C27.125 13 31 18 31 18C31 18 34.875 13 38.75 10.5C46.5 5 57 9.5 57 23.25C57 42 31 57 31 57Z" fill="black"/></svg>',
        
        'check' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M10 31L26 47L52 10" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        
        'arrow' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M10 31H52M52 31L37 16M52 31L37 46" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>'
    ];
    
    return isset($icons[$icon_name]) ? $icons[$icon_name] : $icons['plus'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="certificates-container">
        <!-- Header Section -->
        <div class="certificates-header">
            <p class="certificates-header-title"><?php echo esc_html($header_title); ?></p>
            <div class="certificates-icon">
                <?php echo get_certificates_icon($header_icon); ?>
            </div>
        </div>

        <!-- Competencies Grid -->
        <?php if ($competencies && count($competencies) > 0): ?>
            <div class="certificates-competencies-grid">
                <?php
                // Split competencies into two columns
                $total = count($competencies);
                $half = ceil($total / 2);
                $column1 = array_slice($competencies, 0, $half);
                $column2 = array_slice($competencies, $half);
                ?>

                <!-- Column 1 -->
                <div class="certificates-column">
                    <?php foreach ($column1 as $index => $competency): ?>
                        <div class="certificates-item">
                            <div class="certificates-item-content">
                                <p class="certificates-number">(<?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>)</p>
                                <p class="certificates-description"><?php echo esc_html($competency['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Column 2 -->
                <div class="certificates-column">
                    <?php foreach ($column2 as $index => $competency): ?>
                        <div class="certificates-item">
                            <div class="certificates-item-content">
                                <p class="certificates-number">(<?php echo str_pad($half + $index + 1, 2, '0', STR_PAD_LEFT); ?>)</p>
                                <p class="certificates-description"><?php echo esc_html($competency['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Certificates Section - Infinite Carousel -->
        <?php if ($certificates && count($certificates) > 0): ?>
            <div class="certificates-list">
                <div class="certificates-list-wrapper">
                    <?php 
                    // Display certificates twice for infinite loop
                    for ($i = 0; $i < 2; $i++): 
                        foreach ($certificates as $certificate): 
                    ?>
                        <div class="certificates-box">
                            <?php if (!empty($certificate['image'])): ?>
                                <img src="<?php echo esc_url($certificate['image']['url']); ?>" 
                                     alt="<?php echo esc_attr($certificate['image']['alt'] ?: 'Certificate'); ?>"
                                     class="certificates-box-image">
                            <?php endif; ?>
                        </div>
                    <?php 
                        endforeach; 
                    endfor; 
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
