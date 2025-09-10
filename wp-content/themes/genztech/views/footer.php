</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-brand">
        <div class="logo">
          <div class="panda-icon">🐼</div>
          <span class="brand-name">BambooStudy</span>
        </div>
        <p class="footer-description">
          Nền tảng học ngoại ngữ hàng đầu với tài liệu chuẩn quốc tế. 
          Học IELTS, Business English, JLPT dễ dàng và hiệu quả.
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
    
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> BambooStudy. All rights reserved.</p>
      <div class="social-links">
        <a href="#" aria-label="Facebook">📘</a>
        <a href="#" aria-label="Instagram">📷</a>
        <a href="#" aria-label="YouTube">📺</a>
        <a href="#" aria-label="LinkedIn">💼</a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
