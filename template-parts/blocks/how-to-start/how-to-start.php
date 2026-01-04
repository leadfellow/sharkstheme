<?php
/**
 * How to Start Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$left_title = get_field('left_title');
$left_description = get_field('left_description');
$left_icons = get_field('left_icons');
$right_top_icon = get_field('right_top_icon');
$right_main_title = get_field('right_main_title');
$right_text_content = get_field('right_text_content');
$tabs = get_field('tabs');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'how-to-start-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="black"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62.0004 62.0004" fill="none"><path d="M31.0002 0.000200214L31.0062 30.9697L42.8635 2.35993L31.0175 30.9745L52.9205 9.0799L31.0259 30.983L59.6405 19.1369L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.0259 31.0175L52.9205 52.9205L31.0175 31.0259L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.1369 59.6405L30.983 31.0259L9.0799 52.9205L30.9745 31.0175L2.35993 42.8635L30.9697 31.0062L0.000200214 31.0002L30.9697 30.9942L2.35993 19.1369L30.9745 30.983L9.0799 9.0799L30.983 30.9745L19.1369 2.35993L30.9942 30.9697L31.0002 0.000200214Z" stroke="black" stroke-width="2.06667"/></svg>',
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'star-white' => '<svg width="42" height="42" viewBox="0 0 42.0003 42.0003" fill="none"><path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="white" stroke-width="1.4"/></svg>',
];
?>

<div id="<?php echo esc_attr($anchor); ?>" class="how-to-start<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="how-to-start__container">
        
        <!-- Left Section (Light) -->
        <div class="how-to-start__section how-to-start__section--light">
            <div class="how-to-start__content-light">
                <div class="how-to-start__hero-text">
                    <h2 class="how-to-start__title">
                        <?php if ($left_title): ?>
                            <?php echo wp_kses_post($left_title); ?>
                        <?php else: ?>
                            <span class="how-to-start__title-part how-to-start__title-part--light">Millest </span><span class="how-to-start__title-part how-to-start__title-part--dark">alustada?</span>
                        <?php endif; ?>
                    </h2>
                    
                    <?php if ($left_description): ?>
                        <p class="how-to-start__description"><?php echo esc_html($left_description); ?></p>
                    <?php else: ?>
                        <p class="how-to-start__description">Meie disainiteenus keskendub kolmele aspektile: UX/UI, bränding ja graafiline disain.</p>
                    <?php endif; ?>
                </div>
                
                <div class="how-to-start__icons">
                    <?php if ($left_icons): ?>
                        <?php foreach ($left_icons as $icon_item): 
                            $icon_type = $icon_item['icon_type'];
                            $icon_svg = isset($icon_map[$icon_type]) ? $icon_map[$icon_type] : $icon_map['asterisk'];
                            ?>
                            <div class="how-to-start__icon">
                                <?php echo $icon_svg; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default 3 icons -->
                        <div class="how-to-start__icon"><?php echo $icon_map['asterisk']; ?></div>
                        <div class="how-to-start__icon"><?php echo $icon_map['star']; ?></div>
                        <div class="how-to-start__icon"><?php echo $icon_map['x']; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Right Section (Dark) -->
        <div class="how-to-start__section how-to-start__section--dark">
            <div class="how-to-start__content-dark">
                
                <!-- Top Icon -->
                <?php if ($right_top_icon): ?>
                    <div class="how-to-start__top-icon">
                        <?php echo $icon_map['star-white']; ?>
                    </div>
                <?php else: ?>
                    <div class="how-to-start__top-icon">
                        <?php echo $icon_map['star-white']; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Main Content -->
                <div class="how-to-start__main-content">
                    <?php if ($right_main_title): ?>
                        <h3 class="how-to-start__main-title"><?php echo esc_html($right_main_title); ?></h3>
                    <?php else: ?>
                        <h3 class="how-to-start__main-title">Silm haarab seda, mis on atraktiivne</h3>
                    <?php endif; ?>
                    
                    <div class="how-to-start__text-content">
                        <?php if ($right_text_content): ?>
                            <?php echo wpautop($right_text_content); ?>
                        <?php else: ?>
                            <p><strong>UX</strong> ehk user experience on kasutajakogemus. Kas koduleht on kliendi jaoks mugav ja loogiline? Tekitab see segadust või kutsub hoopis edasi avastama? Meie eesmärk on luua lehel intuitiivne teekond, kus kasutaja liigub sujuvalt punktist punkti, muretsemata, mis järgmine samm on.</p>
                            <p><strong>UI </strong>ehk user interface on kasutajaliides. Kui kodulehele on ehituskivid laotud ja müürid juba püsti, on aeg mõelda visuaalsele väljanägemisele. Milline kujundus brändi paremini esindab ja kui värviline peaks olema esmamulje? Kuidas olla omanäoline, jäädes samas maitsekaks?</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Navigation Tabs -->
                <div class="how-to-start__tabs">
                    <?php if ($tabs): ?>
                        <?php foreach ($tabs as $index => $tab): ?>
                            <div class="how-to-start__tab <?php echo $tab['is_active'] ? 'how-to-start__tab--active' : ''; ?>">
                                <?php if ($tab['is_active']): ?>
                                    <div class="how-to-start__tab-dot"></div>
                                <?php endif; ?>
                                <span class="how-to-start__tab-label"><?php echo esc_html($tab['label']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default tabs -->
                        <div class="how-to-start__tab how-to-start__tab--active">
                            <div class="how-to-start__tab-dot"></div>
                            <span class="how-to-start__tab-label">UX/UI</span>
                        </div>
                        <div class="how-to-start__tab">
                            <span class="how-to-start__tab-label">Bränding</span>
                        </div>
                        <div class="how-to-start__tab">
                            <span class="how-to-start__tab-label">Graafiline disain</span>
                        </div>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

