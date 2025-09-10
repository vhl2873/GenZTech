/**
 * BambooStudy Main JavaScript
 * Handles interactive features and animations
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    
    if (mobileMenuToggle && navMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            mobileMenuOverlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
        
        // Close menu when clicking overlay
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener('click', function() {
                navMenu.classList.remove('active');
                mobileMenuOverlay.classList.remove('active');
                document.body.classList.remove('menu-open');
            });
        }
    }
    
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Close mobile menu if open
                if (navMenu && navMenu.classList.contains('active')) {
                    navMenu.classList.remove('active');
                    mobileMenuOverlay.classList.remove('active');
                    document.body.classList.remove('menu-open');
                }
            }
        });
    });
    
    // Header scroll effect
    const header = document.querySelector('.site-header');
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        
        if (currentScrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Hide/show header on scroll
        if (currentScrollY > lastScrollY && currentScrollY > 200) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollY = currentScrollY;
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animateElements = document.querySelectorAll('.course-card, .feature-card, .hero-content, .hero-image');
    animateElements.forEach(el => {
        observer.observe(el);
    });
    
    // Search form enhancement
    const searchForm = document.querySelector('.main-search-form');
    const searchField = document.querySelector('.search-field');
    
    if (searchForm && searchField) {
        searchForm.addEventListener('submit', function(e) {
            const query = searchField.value.trim();
            if (!query) {
                e.preventDefault();
                searchField.focus();
                return false;
            }
        });
        
        // Add focus effects
        searchField.addEventListener('focus', function() {
            searchForm.classList.add('focused');
        });
        
        searchField.addEventListener('blur', function() {
            searchForm.classList.remove('focused');
        });
    }
    
    // Button hover effects
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Course card hover effects
    const courseCards = document.querySelectorAll('.course-card');
    courseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Feature card animations
    const featureCards = document.querySelectorAll('.feature-card');
    featureCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Lazy loading for images (if any are added later)
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Add loading states for forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"], input[type="submit"]');
            if (submitBtn) {
                submitBtn.style.opacity = '0.7';
                submitBtn.style.pointerEvents = 'none';
            }
        });
    });
    
    // Console welcome message
    console.log('%c🐼 Welcome to BambooStudy!', 'color: #2d5a27; font-size: 20px; font-weight: bold;');
    console.log('%cLet The Panda Do The Prep!', 'color: #6b7280; font-size: 14px;');
});

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    .nav-menu.active {
        display: flex !important;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        gap: 30px;
    }
    
    .mobile-menu-overlay.active {
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9998;
    }
    
    .site-header {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    
    .site-header.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }
    
    .animate-in {
        animation: slideInUp 0.6s ease forwards;
    }
    
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .course-card, .feature-card {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .course-card.animate-in, .feature-card.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    .hero-content, .hero-image {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    
    .hero-content.animate-in, .hero-image.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    .main-search-form.focused {
        box-shadow: 0 4px 16px rgba(45, 90, 39, 0.2) !important;
    }
    
    .btn {
        transition: all 0.3s ease !important;
    }
    
    .course-card {
        transition: all 0.3s ease !important;
    }
    
    .feature-card {
        transition: all 0.3s ease !important;
    }
    
    body.menu-open {
        overflow: hidden;
    }
    
    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }
    }
`;
document.head.appendChild(style);
