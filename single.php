<?php
/**
 * The template for displaying all single posts
 */

get_header();

get_template_part('sidebar');

get_template_part('mobile-sidebar'); ?>

<section class="section-content single-post-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>

                <header class="single-post-header">
                    <h1 class="single-post-title"><?php the_title(); ?></h1>

                    <div class="single-post-meta">
                        <time class="single-post-date" datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date('j F Y'); ?>
                        </time>
                        <?php if (has_category()) : ?>
                            <div class="single-post-categories">
                                <?php the_category(', '); ?>
                            </div>
                        <?php endif; ?>
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
    </div>
</section>

<?php get_footer(); ?>
