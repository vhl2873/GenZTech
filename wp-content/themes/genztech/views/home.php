<?php
/**
 * Template Name: Home Page
 * Mô tả: Giao diện trang chủ của BambooStudy
 */
?>

<!-- Hero Section -->
<section class="hero">
  <div class="container">
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
  </div>
</section>

<!-- Courses Section -->
<section id="courses" class="courses-section">
  <div class="container">
    <h2 class="section-title">Khóa học của chúng tôi</h2>
    
    <!-- IELTS Section -->
    <div id="ielts" class="course-card">
      <div class="course-content">
        <div class="course-icon">📚</div>
        <h3 class="course-title">IELTS</h3>
        <p class="course-description">Học IELTS cùng tài liệu Bamboo – Không áp lực, vẫn lên band.</p>
        <ul class="course-features">
          <li>✓ Tài liệu chuẩn Cambridge</li>
          <li>✓ Lộ trình học cá nhân hóa</li>
          <li>✓ Mock test thường xuyên</li>
        </ul>
        <a href="#" class="btn btn-course">Xem thêm</a>
      </div>
      <div class="course-image">
        <div class="course-visual ielts-visual"></div>
      </div>
    </div>

    <!-- Business English Section -->
    <div id="business-english" class="course-card reverse">
      <div class="course-content">
        <div class="course-icon">💼</div>
        <h3 class="course-title">Business English</h3>
        <p class="course-description">Giao tiếp, Viết Mail, Họp quốc tế – Chuẩn chỉ, Tự tin.</p>
        <ul class="course-features">
          <li>✓ Email writing chuyên nghiệp</li>
          <li>✓ Presentation skills</li>
          <li>✓ Meeting & negotiation</li>
        </ul>
        <a href="#" class="btn btn-course">Xem thêm</a>
      </div>
      <div class="course-image">
        <div class="course-visual business-visual"></div>
      </div>
    </div>

    <!-- JLPT Section -->
    <div id="jlpt" class="course-card">
      <div class="course-content">
        <div class="course-icon">🇯🇵</div>
        <h3 class="course-title">JLPT N5–N1</h3>
        <p class="course-description">JLPT không khó – Có BambooStudy ở đó.</p>
        <ul class="course-features">
          <li>✓ Từ N5 đến N1</li>
          <li>✓ Kanji, Grammar, Vocabulary</li>
          <li>✓ Listening & Reading practice</li>
        </ul>
        <a href="#" class="btn btn-course">Xem thêm</a>
      </div>
      <div class="course-image">
        <div class="course-visual jlpt-visual"></div>
      </div>
    </div>
  </div>
</section>

<!-- Why choose BambooStudy -->
<section class="why-choose">
  <div class="container">
    <h2 class="section-title">Tại sao nên chọn BambooStudy?</h2>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-number">01</div>
        <h3>Học liệu chuẩn quốc tế</h3>
        <p>Tài liệu được biên soạn bởi các chuyên gia hàng đầu</p>
      </div>
      <div class="feature-card">
        <div class="feature-number">02</div>
        <h3>Nội dung cập nhật thường xuyên</h3>
        <p>Luôn cập nhật những xu hướng và thay đổi mới nhất</p>
      </div>
      <div class="feature-card">
        <div class="feature-number">03</div>
        <h3>Giảng viên uy tín</h3>
        <p>Đội ngũ giảng viên có kinh nghiệm và chứng chỉ quốc tế</p>
      </div>
      <div class="feature-card">
        <div class="feature-number">04</div>
        <h3>Cộng đồng học tập sôi nổi</h3>
        <p>Tham gia cộng đồng học viên năng động và hỗ trợ lẫn nhau</p>
      </div>
      <div class="feature-card">
        <div class="feature-number">05</div>
        <h3>Tài liệu đa dạng</h3>
        <p>IELTS, JLPT, Business English - tất cả trong một nền tảng</p>
      </div>
      <div class="feature-card">
        <div class="feature-number">06</div>
        <h3>Lộ trình học rõ ràng</h3>
        <p>Lộ trình được thiết kế phù hợp với từng trình độ</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content">
      <h2>Sẵn sàng bắt đầu hành trình học tập?</h2>
      <p>Tham gia cùng hàng nghìn học viên đã thành công với BambooStudy</p>
      <a href="#signup" class="btn btn-primary btn-large">Đăng ký ngay</a>
    </div>
  </div>
</section>


