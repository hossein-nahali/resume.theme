<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/src/img/favicon.svg">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <!-- Mobile Scroll Navbar (visible on mobile after scrolling) -->
    <nav class="mobile-scroll-navbar" aria-label="mobile scroll navbar">
        <div class="msn-container">
            <div class="msn-left">
                <?php if (is_single()) : ?>
                    <a href="javascript:history.back()" class="msn-back-btn" aria-label="back">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
                <img class="msn-avatar" src="<?php echo esc_url( get_theme_mod('profile_image') ?: ( get_template_directory_uri() . '/src/img/me.jpg' ) ); ?>" alt="profile"/>
                <div class="msn-text">
                    <span class="msn-name"><?php echo esc_html( get_theme_mod('profile_name', 'Hossein Nahali') ); ?></span>
                    <span class="msn-title"><?php echo esc_html( get_theme_mod('profile_title', 'Front-End Developer') ); ?></span>
                </div>
            </div>
            <div class="msn-right">
                <?php $__phone = get_theme_mod('contact_phone', '(+98) 936 907 9925'); ?>
                <?php $__email = get_theme_mod('contact_email', 'nahali.dev@gmail.com'); ?>
                <a class="msn-btn msn-call" href="tel:<?php echo esc_attr($__phone); ?>" aria-label="call">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/phone.svg" alt="call"/>
                </a>
                <a class="msn-btn msn-mail" href="mailto:<?php echo esc_attr($__email); ?>" aria-label="email">
                    <img src="<?php echo get_template_directory_uri(); ?>/src/img/mail.svg" alt="email"/>
                </a>
            </div>
        </div>
    </nav>
<main>
    <section class="content">
        <div class="container">
            <div class="content-container">