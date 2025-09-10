<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="BambooStudy - Học IELTS, Business English, JLPT dễ dàng với tài liệu chuẩn quốc tế">
  <title>BambooStudy - Let The Panda Do The Prep</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <!-- Logo/Brand -->
    <div class="site-branding">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
        <div class="logo">
          <div class="panda-icon">🐼</div>
          <span class="brand-name">BambooStudy</span>
        </div>
      </a>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
      <span class="hamburger"></span>
      <span class="hamburger"></span>
      <span class="hamburger"></span>
    </button>

    <!-- Main Navigation -->
    <nav class="main-navigation" role="navigation">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'nav-menu',
        'fallback_cb'    => 'bamboostudy_fallback_menu',
        'walker'         => new BambooStudy_Walker_Nav_Menu(),
      ));
      ?>
    </nav>

    <!-- Search Bar -->
    <div class="search-bar">
      <?php get_search_form(); ?>
    </div>
  </div>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu-overlay"></div>
</header>



<main class="site-main">
