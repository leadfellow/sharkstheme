<?php
/**
 * Team Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading_parts = get_field('heading_parts');
$team_members = get_field('team_members');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'team');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping for heading
$icon_map = [
    'circle' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M31 62C48.1208 62 62 48.1208 62 31C62 13.8792 48.1208 0 31 0C13.8792 0 0 13.8792 0 31C0 48.1208 13.8792 62 31 62Z" fill="black"/></svg>',
    'cross' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M31 0C31 0 31 20.5 31 31C31 20.5 31 0 31 0Z M31 62C31 62 31 41.5 31 31C31 41.5 31 62 31 62Z M0 31C0 31 20.5 31 31 31C20.5 31 0 31 0 31Z M62 31C62 31 41.5 31 31 31C41.5 31 62 31 62 31Z" fill="black"/></svg>',
    'x' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'asterisk' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0467L61.0458 38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1337L15.0653 57.5565L4.44323 46.9335L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.04968L23.4882 13.7723V0.953974H38.5116V12.8651Z" fill="black"/></svg>',
    'star' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M31.0002 0.000244141L31.0062 30.9697L42.8635 2.35997L31.0175 30.9745L52.9205 9.07994L31.026 30.983L59.6405 19.137L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.026 31.0175L52.9205 52.9205L31.0175 31.026L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.137 59.6405L30.983 31.026L9.07994 52.9205L30.9745 31.0175L2.35997 42.8635L30.9697 31.0062L0.000244141 31.0002L30.9697 30.9942L2.35997 19.137L30.9745 30.983L9.07994 9.07994L30.983 30.9745L19.137 2.35997L30.9942 30.9697L31.0002 0.000244141Z" stroke="black" stroke-width="2.06667"/></svg>'
];

// Corner icon mapping for hover cards
$corner_icon_map = [
    'x' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M1 1L41 41M41 1L1 41" stroke="white" stroke-width="1.4"/></svg>',
    'star' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21 0.00012207L21.0041 20.9795L29.0364 1.59865L21.0117 20.9827L35.8492 6.15089L21.0174 20.9884L40.4015 12.9637L21.0207 20.9961L42 21.0001L21.0207 21.0042L40.4015 29.0365L21.0174 21.0118L35.8492 35.8493L21.0117 21.0176L29.0364 40.4016L21.0041 21.0208L21 42.0001L20.9959 21.0208L12.9636 40.4016L20.9883 21.0176L6.15076 35.8493L20.9826 21.0118L1.59852 29.0365L20.9793 21.0042L0 21.0001L20.9793 20.9961L1.59852 12.9637L20.9826 20.9884L6.15076 6.15089L20.9883 20.9827L12.9636 1.59865L20.9959 20.9795L21 0.00012207Z" stroke="white" stroke-width="1.4"/></svg>',
    'cross' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21 0C21 0 21 13.86 21 21C21 13.86 21 0 21 0Z M21 42C21 42 21 28.14 21 21C21 28.14 21 42 21 42Z M0 21C0 21 13.86 21 21 21C13.86 21 0 21 0 21Z M42 21C42 21 28.14 21 21 21C28.14 21 42 21 42 21Z" stroke="white" stroke-width="1.4"/></svg>',
    'circle' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="21" cy="21" r="20" stroke="white" stroke-width="1.4"/></svg>',
    'asterisk' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M26.0627 8.70346L31.7814 3.00153L39.0039 10.2241L33.3019 15.9261H41.3168L41.3161 26.0627H33.9175L39.3858 31.1193L32.4028 38.5946L26.0627 32.6986V41.3168H15.9261V33.3009L10.2241 39.0029L3.00252 31.7803L8.70346 26.0627H0.688477V15.9261H8.0861L2.61792 10.8705L9.60095 3.39517L15.9261 9.29125V0.688477H26.0627V8.70346Z" stroke="white" stroke-width="1.4"/></svg>',
    'none' => ''
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-team<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-team__container">
        <!-- Header Section -->
        <?php if ($heading_parts && is_array($heading_parts)): ?>
            <div class="block-team__header">
                <div class="block-team__title-wrapper">
                    <?php 
                    $current_row = [];
                    $rows = [];
                    
                    foreach ($heading_parts as $part): 
                        if ($part['part_type'] === 'line_break') {
                            if (!empty($current_row)) {
                                $rows[] = $current_row;
                                $current_row = [];
                            }
                        } else {
                            $current_row[] = $part;
                        }
                    endforeach;
                    
                    if (!empty($current_row)) {
                        $rows[] = $current_row;
                    }
                    
                    foreach ($rows as $row_index => $row): 
                        $row_class = ($row_index === 0) ? 'block-team__title-row' : 'block-team__title-row-main';
                    ?>
                        <div class="<?php echo esc_attr($row_class); ?>">
                            <?php foreach ($row as $part): ?>
                                <?php if ($part['part_type'] === 'text' && !empty($part['text'])): ?>
                                    <p class="block-team__title-<?php echo esc_attr($part['color'] ?: 'black'); ?>">
                                        <?php echo esc_html($part['text']); ?>
                                    </p>
                                <?php elseif ($part['part_type'] === 'icon' && !empty($part['icon'])): ?>
                                    <div class="block-team__icon-frame">
                                        <?php echo isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['circle']; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Team Members Grid -->
        <?php if ($team_members && is_array($team_members)): ?>
            <?php 
            $members_by_row = [];
            foreach ($team_members as $member) {
                $row = $member['row_number'] ?: 1;
                if (!isset($members_by_row[$row])) {
                    $members_by_row[$row] = [];
                }
                $members_by_row[$row][] = $member;
            }
            ksort($members_by_row);
            ?>
            
            <?php foreach ($members_by_row as $row_num => $members): ?>
                <div class="block-team__row <?php echo ($row_num == 2) ? 'block-team__row--justify-end' : ''; ?>">
                    <?php foreach ($members as $member): 
                        $image = $member['image'];
                        $has_hover = !empty($member['hover_text']);
                        $hover_image = $member['hover_small_image'];
                        $corner_icon = $member['corner_icon'];
                        $name = $member['name'];
                        $position = $member['position'];
                        $phone = $member['phone'];
                        $email = $member['email'];
                    ?>
                        <div class="block-team__card">
                            <div class="block-team__image-container <?php echo $has_hover ? 'block-team__image-container--hover' : ''; ?>">
                                <?php if ($image && !empty($image['url'])): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" 
                                         alt="<?php echo esc_attr($image['alt'] ?: $name); ?>"
                                         class="block-team__image">
                                <?php endif; ?>
                                
                                <?php if ($has_hover): ?>
                                    <!-- Corner Icon -->
                                    <?php if ($corner_icon && $corner_icon !== 'none' && isset($corner_icon_map[$corner_icon])): ?>
                                        <div class="block-team__corner-icon">
                                            <?php echo $corner_icon_map[$corner_icon]; ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <!-- Small Hover Image -->
                                    <?php if ($hover_image && !empty($hover_image['url'])): ?>
                                        <img src="<?php echo esc_url($hover_image['url']); ?>" 
                                             alt="<?php echo esc_attr($hover_image['alt']); ?>"
                                             class="block-team__hover-small-image">
                                    <?php endif; ?>
                                    
                                    <!-- Hover Text Overlay -->
                                    <div class="block-team__overlay-text">
                                        <p><?php echo esc_html($member['hover_text']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="block-team__info">
                                <?php if ($name): ?>
                                    <p class="block-team__name"><?php echo esc_html($name); ?></p>
                                <?php endif; ?>
                                <?php if ($position): ?>
                                    <p class="block-team__position"><?php echo esc_html($position); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ($phone || $email): ?>
                                <div class="block-team__contact">
                                    <p>
                                        <?php if ($phone): ?>
                                            <span class="block-team__contact-bold">Telefon:</span> <?php echo esc_html($phone); ?>
                                        <?php endif; ?>
                                        <?php if ($phone && $email): ?><br><?php endif; ?>
                                        <?php if ($email): ?>
                                            <span class="block-team__contact-bold">E-mail:</span> <?php echo esc_html($email); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
