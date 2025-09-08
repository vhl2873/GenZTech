<?php
/**
 * Index template (GenZTech)
 * Đây là file mặc định nếu không có template nào khác.
 */
get_header();
?>

<main id="site-content">
    <h1>Welcome to GenZTech Theme</h1>
    <p>Đây là file index.php - có thể thay bằng views/home.php để tách riêng giao diện.</p>

    <?php
    // Load nội dung từ views (ví dụ views/home.php)
    if (file_exists(get_template_directory() . '/views/home.php')) {
        include get_template_directory() . '/views/home.php';
    }
    ?>
</main>

<?php get_footer(); ?>
