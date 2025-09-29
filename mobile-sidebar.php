<!-- Offcanvas Sidebar for Mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas"
     aria-labelledby="sidebarOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <aside class="sidebar mobile-sidebar">
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
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/me.jpg" alt="profile">
                <div class="name">
                    <h1><?php echo get_theme_mod('profile_name', 'Hossein Nahali'); ?></h1>
                    <p><?php echo get_theme_mod('profile_title', 'Front-End Developer'); ?></p>
                </div>
            </div>
            <ul class="information">
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/mail.svg" alt="mail">
                    </div>
                    <div class="content">
                        <span>Email</span>
                        <a href="mailto:<?php echo get_theme_mod('contact_email', 'nahali.dev@gmail.com'); ?>"><?php echo get_theme_mod('contact_email', 'nahali.dev@gmail.com'); ?></a>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/phone.svg" alt="phone">
                    </div>
                    <div class="content">
                        <span>Phone</span>
                        <a href="tel:<?php echo get_theme_mod('contact_phone', '(+98) 936 907 9925'); ?>"><?php echo get_theme_mod('contact_phone', '(+98) 936 907 9925'); ?></a>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/img/location.svg" alt="location">
                    </div>
                    <div class="content">
                        <span>Address</span>
                        <p><?php echo get_theme_mod('contact_address', 'Iran, Esfahan'); ?></p>
                    </div>
                </li>
            </ul>
            <div class="socials">
                <h3>Socials</h3>
                <ul>
                    <?php if(get_theme_mod('linkedin_url')): ?>
                    <li>
                        <a href="<?php echo get_theme_mod('linkedin_url'); ?>">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/src/img/linkedin.svg" alt="linkedin">
                            </div>
                            <div class="content">
                                <span>Linkedin</span>
                                <p><?php echo get_theme_mod('linkedin_username', 'nahali'); ?></p>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('telegram_url')): ?>
                    <li>
                        <a href="<?php echo get_theme_mod('telegram_url'); ?>">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/src/img/telegram.svg" alt="telegram">
                            </div>
                            <div class="content">
                                <span>Telegram</span>
                                <p><?php echo get_theme_mod('telegram_username', '@nahali_dev2'); ?></p>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('instagram_url')): ?>
                    <li>
                        <a href="<?php echo get_theme_mod('instagram_url'); ?>">
                            <div class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/src/img/instagram.svg" alt="instagram">
                            </div>
                            <div class="content">
                                <span>Instagram</span>
                                <p><?php echo get_theme_mod('instagram_username', '@hosseinNahali'); ?></p>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="languages">
                <h3>Languages</h3>
                <ul>
                    <li>
                        <div class="icon">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/img/en.svg" alt="en">
                        </div>
                        <div class="content">
                            <span>English</span>
                            <p>Professional working</p>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</div>
