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
    <div class="profile">
        <?php
        $profile_image = get_theme_mod('profile_image');
        $profile_image_src = $profile_image ? esc_url($profile_image) : esc_url(get_template_directory_uri() . '/src/img/me.jpg');
        ?>
        <img src="<?php echo $profile_image_src; ?>" alt="profile">
        <div class="name">
            <h1><?php echo get_theme_mod('profile_name', 'Hossein Nahali'); ?></h1>
            <p><?php echo get_theme_mod('profile_title', 'Front-End Developer'); ?></p>
        </div>
    </div>
    <ul class="information">
        <?php
        $info_query = new WP_Query([
            'post_type' => 'information',
            'posts_per_page' => -1,
            'orderby' => 'menu_order title',
            'order' => 'ASC',
        ]);
        if ($info_query->have_posts()):
            while ($info_query->have_posts()): $info_query->the_post();
                $label = get_the_title();
                $value_text = has_excerpt() ? get_the_excerpt() : '';
                $meta_url = get_post_meta(get_the_ID(), 'url', true);
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                $icon_src = $thumb ? $thumb : '';
                $lower_label = strtolower(trim($label));
        ?>
        <li>
            <div class="icon">
                <?php if ($icon_src): ?>
                <img src="<?php echo esc_url($icon_src); ?>" alt="<?php echo esc_attr($lower_label); ?>">
                <?php else: ?>
                <?php if ($lower_label === 'email'): ?>
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/mail.svg" alt="mail">
                <?php elseif ($lower_label === 'phone'): ?>
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/phone.svg" alt="phone">
                <?php elseif ($lower_label === 'address'): ?>
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/location.svg" alt="location">
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="content">
                <span><?php echo esc_html($label); ?></span>
                <?php if ($lower_label === 'email' && $value_text): ?>
                    <a href="mailto:<?php echo esc_attr($value_text); ?>"><?php echo esc_html($value_text); ?></a>
                <?php elseif ($lower_label === 'phone' && $value_text): ?>
                    <a href="tel:<?php echo esc_attr($value_text); ?>"><?php echo esc_html($value_text); ?></a>
                <?php else: ?>
                    <p><?php echo esc_html($value_text); ?></p>
                <?php endif; ?>
            </div>
        </li>
        <?php
            endwhile; wp_reset_postdata();
        endif;
        ?>
    </ul>
    <div class="socials">
        <h3>Socials</h3>
        <ul>
            <?php
            $social_query = new WP_Query([
                'post_type' => 'social',
                'posts_per_page' => -1,
                'orderby' => 'menu_order title',
                'order' => 'ASC',
            ]);
            if ($social_query->have_posts()):
                while ($social_query->have_posts()): $social_query->the_post();
                    $network = get_the_title();
                    $username = has_excerpt() ? get_the_excerpt() : '';
                    $url = get_post_meta(get_the_ID(), 'url', true);
                    if (!$url) {
                        $content_url = trim(wp_strip_all_tags(get_the_content()));
                        $url = filter_var($content_url, FILTER_VALIDATE_URL) ? $content_url : '#';
                    }
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    $icon = $thumb ? $thumb : '';
            ?>
            <li>
                <a href="<?php echo esc_url($url); ?>">
                    <div class="icon">
                        <?php if ($icon): ?>
                        <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($network); ?>">
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/link.svg" alt="link">
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <span><?php echo esc_html($network); ?></span>
                        <p><?php echo esc_html($username); ?></p>
                    </div>
                </a>
            </li>
            <?php
                endwhile; wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
    <div class="languages">
        <h3>Languages</h3>
        <ul>
            <?php
            $lang_query = new WP_Query([
                'post_type' => 'language',
                'posts_per_page' => -1,
                'orderby' => 'menu_order title',
                'order' => 'ASC',
            ]);
            if ($lang_query->have_posts()):
                while ($lang_query->have_posts()): $lang_query->the_post();
                    $lang_name = get_the_title();
                    $proficiency = has_excerpt() ? get_the_excerpt() : '';
                    $flag = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            ?>
            <li>
                <div class="icon">
                    <?php if ($flag): ?>
                    <img src="<?php echo esc_url($flag); ?>" alt="<?php echo esc_attr($lang_name); ?>">
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/en.svg" alt="lang">
                    <?php endif; ?>
                </div>
                <div class="content">
                    <span><?php echo esc_html($lang_name); ?></span>
                    <p><?php echo esc_html($proficiency); ?></p>
                </div>
            </li>
            <?php
                endwhile; wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</aside>
