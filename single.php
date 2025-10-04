<?php
/**
 * The template for displaying all single posts
 */

get_header();

get_template_part('sidebar');

get_template_part('mobile-sidebar'); ?>

<section class="section-content single-post-content">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?> " <?php post_class('single-post-article'); ?>>
            <header class="single-post-header">
                <div class="title-post">
                    <a href="<?= get_home_url() ?>">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M469.333 234.667H94.1653L207.083 121.749C209.12 119.782 210.745 117.427 211.864 114.825C212.982 112.222 213.57 109.423 213.595 106.59C213.619 103.757 213.08 100.948 212.007 98.3264C210.934 95.7046 209.35 93.3227 207.347 91.3197C205.344 89.3166 202.962 87.7326 200.34 86.6599C197.719 85.5872 194.909 85.0475 192.077 85.0721C189.244 85.0967 186.445 85.6852 183.842 86.8033C181.239 87.9213 178.885 89.5466 176.917 91.5841L27.584 240.917C23.5846 244.918 21.3379 250.343 21.3379 256C21.3379 261.657 23.5846 267.082 27.584 271.083L176.917 420.416C180.941 424.302 186.33 426.452 191.923 426.404C197.517 426.355 202.867 424.112 206.823 420.156C210.778 416.201 213.022 410.85 213.07 405.257C213.119 399.663 210.969 394.274 207.083 390.251L94.1653 277.333H469.333C474.991 277.333 480.418 275.086 484.418 271.085C488.419 267.084 490.667 261.658 490.667 256C490.667 250.342 488.419 244.916 484.418 240.915C480.418 236.914 474.991 234.667 469.333 234.667Z"
                                  fill="currentColor"/>
                        </svg>
                    </a>
                    <h1 class="title single-post-title"><?php the_title(); ?></h1>
                </div>
                <div class="single-post-meta">
                    <?php if (has_category()) : ?>
                        <div class="single-post-categories">
                            <?php the_category(', '); ?>
                        </div>
                    <?php endif; ?>
                    <time class="single-post-date" datetime="<?php echo get_the_date('c'); ?>">
                        <?= get_the_date('j F Y'); ?>
                    </time>
                </div>

                <?php if (has_excerpt()) : ?>
                    <div class="single-post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="single-post-thumbnail">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                </div>
            <?php endif; ?>

            <div class="single-post-content-wrapper">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'resume-theme'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        </article>
    <?php endwhile; ?>
</section>

<?php get_footer(); ?>
