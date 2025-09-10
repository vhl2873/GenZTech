<?php
/**
 * Template part for displaying posts
 *
 * @package BambooStudy
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                bamboostudy_posted_on();
                bamboostudy_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php bamboostudy_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        if (is_singular()) {
            the_content(sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bamboostudy'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'bamboostudy'),
                'after'  => '</div>',
            ));
        } else {
            the_excerpt();
        }
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php bamboostudy_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
