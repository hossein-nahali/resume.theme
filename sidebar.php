<aside class="sidebar d-none d-lg-block">
    <div class="bg-sidebar">
        <span class="rectangle-1"></span>
        <span class="rectangle-2"></span>
        <span class="rectangle-3"></span>
        <span class="rectangle-4"></span>
        <span class="rectangle-5"></span>
        <span class="rectangle-6"></span>
        <span class="rectangle-7"></span>
    </div>

    <?php
    $profile_image = get_theme_mod('profile_image');
    $profile_name = get_theme_mod('profile_name');
    $profile_title = get_theme_mod('profile_title');

    if ($profile_image || $profile_name || $profile_title):
        ?>
        <div class="profile">
            <?php if ($profile_image): ?>
                <img src="<?php echo esc_url($profile_image); ?>" alt="profile">
            <?php endif; ?>
            <div class="name">
                <?php if ($profile_name): ?>
                    <h1><?php echo esc_html($profile_name); ?></h1>
                <?php endif; ?>
                <?php if ($profile_title): ?>
                    <p><?php echo esc_html($profile_title); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $info_query = new WP_Query([
        'post_type' => 'information',
        'posts_per_page' => -1,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    ]);

    if ($info_query->have_posts()):
        ?>
        <ul class="information">
            <?php while ($info_query->have_posts()): $info_query->the_post();
                $label = get_the_title();
                $value_text = has_excerpt() ? get_the_excerpt() : '';
                $link = get_post_meta(get_the_ID(), 'link', true);
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                ?>
                <?php if ($label || $value_text || $link || $thumb): ?>
                    <li>
                        <?php if ($thumb): ?>
                            <div class="icon">
                                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($label); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="content">
                            <?php if ($label): ?>
                                <span><?php echo esc_html($label); ?></span>
                            <?php endif; ?>
                            <?php if ($value_text && $link): ?>
                                <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($value_text); ?></a>
                            <?php elseif ($value_text): ?>
                                <p><?php echo esc_html($value_text); ?></p>
                            <?php elseif ($link): ?>
                                <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($link); ?></a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php endif; ?>

    <?php
    $social_query = new WP_Query([
        'post_type' => 'social',
        'posts_per_page' => -1,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    ]);

    if ($social_query->have_posts()):
        ?>
        <div class="socials">
            <h3>Socials</h3>
            <ul>
                <?php while ($social_query->have_posts()): $social_query->the_post();
                    $network = get_the_title();
                    $username = has_excerpt() ? get_the_excerpt() : '';
                    $url = get_post_meta(get_the_ID(), 'link', true);
                    if (!$url) {
                        $content_url = trim(wp_strip_all_tags(get_the_content()));
                        $url = filter_var($content_url, FILTER_VALIDATE_URL) ? $content_url : '';
                    }
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    ?>
                    <?php if ($network || $username || $url || $thumb): ?>
                        <li>
                            <a href="<?php echo esc_url($url ?: '#'); ?>">
                                <?php if ($thumb): ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url($thumb); ?>"
                                             alt="<?php echo esc_attr($network); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="content">
                                    <?php if ($network): ?>
                                        <span><?php echo esc_html($network); ?></span>
                                    <?php endif; ?>
                                    <?php if ($username): ?>
                                        <p><?php echo esc_html($username); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php
    $lang_query = new WP_Query([
        'post_type' => 'language',
        'posts_per_page' => -1,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
    ]);

    if ($lang_query->have_posts()):
        ?>
        <div class="languages">
            <h3>Languages</h3>
            <ul>
                <?php while ($lang_query->have_posts()): $lang_query->the_post();
                    $lang_name = get_the_title();
                    $proficiency = has_excerpt() ? get_the_excerpt() : '';
                    $flag = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    ?>
                    <?php if ($lang_name || $proficiency || $flag): ?>
                        <li>
                            <?php if ($flag): ?>
                                <div class="icon">
                                    <img src="<?php echo esc_url($flag); ?>" alt="<?php echo esc_attr($lang_name); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="content">
                                <?php if ($lang_name): ?>
                                    <span><?php echo esc_html($lang_name); ?></span>
                                <?php endif; ?>
                                <?php if ($proficiency): ?>
                                    <p><?php echo esc_html($proficiency); ?></p>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php endif; ?>
</aside>
