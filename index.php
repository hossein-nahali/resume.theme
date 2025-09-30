<?php get_header(); ?>

<?php get_template_part('sidebar'); ?>

<?php get_template_part('mobile-sidebar'); ?>

    <div class="section-content">
        <div class="responsive-header d-lg-none">
            <button class="btn btn-primary mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                <img src="<?php echo get_template_directory_uri(); ?>/src/img/menu.svg" alt="menu">
            </button>
        </div>
        <?= the_content(); ?>
    </div>

<?php get_footer(); ?>