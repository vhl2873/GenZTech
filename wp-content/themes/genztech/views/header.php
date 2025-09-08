<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <!-- Logo/Brand -->
    <div class="site-branding">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <h1 class="site-title"><?php bloginfo('name'); ?></h1>
          <?php if (get_bloginfo('description')) : ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
          <?php endif; ?>
        <?php endif; ?>
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
      $args = [
        'container'   => false,
        'menu_class'  => 'nav-menu',
        'fallback_cb' => 'genztech_fallback_menu',
        'depth'       => 2,
      ];

      $locations = get_nav_menu_locations();
      if (isset($locations['primary']) && $locations['primary']) {
        $args['theme_location'] = 'primary';
      } else {
        $menus = wp_get_nav_menus();
        if (!empty($menus)) {
          $args['menu'] = $menus[0]->term_id; // Fallback: menu đầu tiên
        }
      }

      wp_nav_menu($args);
      ?>
    </nav>

    <!-- Search Bar -->
    <div class="search-bar">
      <form role="search" method="get" class="main-search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="search-input-wrapper">
          <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.35-4.35"></path>
          </svg>
          <input type="search" class="search-field" placeholder="Want to learn?" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
        <button type="submit" class="explore-btn">
          Explore
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6,9 12,15 18,9"></polyline>
          </svg>
        </button>
      </form>
    </div>
  </div>

  <!-- Mobile Menu Overlay -->
  <div class="mobile-menu-overlay"></div>
</header>

<!-- Search Overlay -->
<div class="search-overlay">
  <div class="search-overlay-content">
    <button class="search-close" aria-label="Close search">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
    <div class="search-overlay-form">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>

<main class="site-main">
