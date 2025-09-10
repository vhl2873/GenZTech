<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package BambooStudy
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('Skip to content', 'bamboostudy'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <div class="site-branding-text">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <div class="logo">
                                    <div class="panda-icon">🐼</div>
                                    <span class="brand-name">BambooStudy</span>
                                </div>
                            </a>
                        </h1>
                        <?php
                        $bamboostudy_description = get_bloginfo('description', 'display');
                        if ($bamboostudy_description || is_customize_preview()) :
                            ?>
                            <p class="site-description"><?php echo $bamboostudy_description; ?></p>
                        <?php endif; ?>
                    </div>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="hamburger"></span>
                    <span class="hamburger"></span>
                    <span class="hamburger"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'fallback_cb'    => 'bamboostudy_fallback_menu',
                    'walker'         => new BambooStudy_Walker_Nav_Menu(),
                ));
                ?>
            </nav><!-- #site-navigation -->

            <div class="search-bar">
                <?php get_search_form(); ?>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
