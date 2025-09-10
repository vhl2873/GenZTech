<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package BambooStudy
 * @since 1.0.0
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="logo">
                        <div class="panda-icon">🐼</div>
                        <span class="brand-name">BambooStudy</span>
                    </div>
                    <p class="footer-description">
                        <?php _e('Nền tảng học ngoại ngữ hàng đầu với tài liệu chuẩn quốc tế. Học IELTS, Business English, JLPT dễ dàng và hiệu quả.', 'bamboostudy'); ?>
                    </p>
                </div>
                
                <div class="footer-widgets">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-widget-area">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="site-info">
                <div class="footer-bottom">
                    <p class="copyright">
                        &copy; <?php echo date('Y'); ?> 
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>. 
                        <?php _e('All rights reserved.', 'bamboostudy'); ?>
                    </p>
                    
                    <div class="social-links">
                        <a href="#" aria-label="<?php _e('Facebook', 'bamboostudy'); ?>">📘</a>
                        <a href="#" aria-label="<?php _e('Instagram', 'bamboostudy'); ?>">📷</a>
                        <a href="#" aria-label="<?php _e('YouTube', 'bamboostudy'); ?>">📺</a>
                        <a href="#" aria-label="<?php _e('LinkedIn', 'bamboostudy'); ?>">💼</a>
                    </div>
                </div>
            </div><!-- .site-info -->
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
