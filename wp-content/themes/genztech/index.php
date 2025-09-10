<?php
/**
 * Index template (BambooStudy)
 * Main template file for the BambooStudy educational platform
 */
if (file_exists(get_template_directory() . '/views/header.php')) {
    include get_template_directory() . '/views/header.php';
} else {
    get_header();
}
?>

<?php
// Load homepage content
if (file_exists(get_template_directory() . '/views/home.php')) {
    include get_template_directory() . '/views/home.php';
} else {
    // Fallback content
    echo '<main class="site-main"><div class="container"><h1>Welcome to BambooStudy</h1><p>Let The Panda Do The Prep!</p></div></main>';
}
?>

<?php
if (file_exists(get_template_directory() . '/views/footer.php')) {
    include get_template_directory() . '/views/footer.php';
} else {
    get_footer();
}
?>
