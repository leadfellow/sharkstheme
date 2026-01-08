<?php
/**
 * Why Sharks Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$section_title = get_field('section_title') ?: 'meist';
$main_heading_line1 = get_field('main_heading_line1') ?: 'Marketing Sharks on piisavalt suur,';
$main_heading_line2 = get_field('main_heading_line2') ?: 'et võtta vastu mistahes väljakutse ja piisavalt väike, et klientidest hoolida.';
$description = get_field('description') ?: 'Hea koostöö üheks aluseks on ühiste eesmärkide seadmine ning selle elluviimine. Mõtleme kliendiga kaasa ja lähtume tema eesmärkidest. Uurides klientidelt tagasisidet siis paljud kliendid valivad Marketing Sharksi, sest:';
$cards = get_field('cards');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'why-sharks-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-why-sharks<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-why-sharks__container">
        <div class="block-why-sharks__header">
            <p class="block-why-sharks__section-title"><?php echo esc_html($section_title); ?></p>
            <div class="block-why-sharks__content-wrapper">
                <div class="block-why-sharks__main-heading">
                    <p><?php echo esc_html($main_heading_line1); ?></p>
                    <p><?php echo esc_html($main_heading_line2); ?></p>
                </div>
                <div class="block-why-sharks__description">
                    <p><?php echo esc_html($description); ?></p>
                </div>
            </div>
        </div>

        <div class="block-why-sharks__cards">
            <?php if ($cards && is_array($cards) && count($cards) > 0): ?>
                <?php foreach ($cards as $index => $card): 
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                ?>
                    <div class="block-why-sharks__card">
                        <p class="block-why-sharks__card-number">(<?php echo esc_html($number); ?>)</p>
                        <div class="block-why-sharks__card-divider">
                            <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                                <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                            </svg>
                        </div>
                        <div class="block-why-sharks__card-text">
                            <p><?php echo esc_html($card['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default cards -->
                <div class="block-why-sharks__card">
                    <p class="block-why-sharks__card-number">(01)</p>
                    <div class="block-why-sharks__card-divider">
                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                            <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                        </svg>
                    </div>
                    <div class="block-why-sharks__card-text">
                        <p>lähtume kliendist ja tema vajadustest</p>
                    </div>
                </div>

                <div class="block-why-sharks__card">
                    <p class="block-why-sharks__card-number">(02)</p>
                    <div class="block-why-sharks__card-divider">
                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                            <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                        </svg>
                    </div>
                    <div class="block-why-sharks__card-text">
                        <p>meie töö- ja reageerimiskiirus on väga head</p>
                    </div>
                </div>

                <div class="block-why-sharks__card">
                    <p class="block-why-sharks__card-number">(03)</p>
                    <div class="block-why-sharks__card-divider">
                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                            <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                        </svg>
                    </div>
                    <div class="block-why-sharks__card-text">
                        <p>meeskonna kogemus ja teadmistepagas on kõrge</p>
                    </div>
                </div>

                <div class="block-why-sharks__card">
                    <p class="block-why-sharks__card-number">(04)</p>
                    <div class="block-why-sharks__card-divider">
                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                            <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                        </svg>
                    </div>
                    <div class="block-why-sharks__card-text">
                        <p>perefirma, millel on pikaajalised strateegiad</p>
                    </div>
                </div>

                <div class="block-why-sharks__card">
                    <p class="block-why-sharks__card-number">(05)</p>
                    <div class="block-why-sharks__card-divider">
                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 248.8 1">
                            <path d="M0 0.5H248.8" stroke="#BBBAB6" />
                        </svg>
                    </div>
                    <div class="block-why-sharks__card-text">
                        <p>järeltugi ja garantii oma töödele</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
