<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package BambooStudy
 * @since 1.0.0
 */

get_header(); ?>

<main id="primary" class="site-main">
    <?php
    // Load homepage content from views/home.php
    if (file_exists(get_template_directory() . '/views/home.php')) {
        include get_template_directory() . '/views/home.php';
    } else {
        // Fallback content
        ?>
        <div class="container">
            <section class="hero">
                <div class="hero-content">
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('bamboostudy_hero_title', 'Let The Panda Do The Prep<br>You Just <span class="highlight">Show Up!</span>'); ?>
                    </h1>
                    <p class="hero-subtitle">
                        <?php echo get_theme_mod('bamboostudy_hero_subtitle', 'Học IELTS, Business English, JLPT dễ dàng với BambooStudy.<br>Đầy đủ tài liệu – không áp lực – vẫn lên band.'); ?>
                    </p>
                    <div class="hero-buttons">
                        <a href="#courses" class="btn btn-primary">Get Started</a>
                        <a href="#guide" class="btn btn-outline">Hướng dẫn học</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="panda-illustration">
                        <div class="panda-main">🐼</div>
                        <div class="bamboo-bg"></div>
                    </div>
                </div>
            </section>
        </div>
        <?php
    }
    ?>
</main><!-- #primary -->

<?php
get_footer();
