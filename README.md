
# 🌐 GenZTech - WordPress Project

Dự án website học tiếng Anh với 3 giao diện chính:
- **Home**
- **IELTS**
- **Business English**

---

## 🚀 Mục tiêu
- Xây dựng website học tập với WordPress (custom theme).
- Tách phần code team phát triển (theme/plugin) ra khỏi WordPress core.
- Quản lý source code trên GitHub để dễ chia việc cho team.

---

## 📂 Cấu trúc dự án
GenZTech/                
├── wp-content/           
│   ├── themes/           
│   │   └── genztech/     
│   │       ├── models/          # Chứa lớp Model (truy vấn DB, WP_Query...)
│   │       ├── views/           # File hiển thị HTML/PHP
│   │       ├── controllers/     # Xử lý logic, gọi model, render view
│   │       ├── functions.php    # File khởi tạo theme (hooks, register menu…)
│   │       ├── index.php        # Entry point theme
│   │       └── style.css        # Khai báo theme (WordPress bắt buộc phải có)
│   │
│   ├── plugins/                 # Plugin tự viết (nếu cần chức năng riêng)
│   └── uploads/                 # Upload của user (không push GitHub)
│
├── .gitignore                   # Bỏ qua core WP, uploads, env...
└── README.md                    # Giới thiệu dự án, hướng dẫn setup


## 👨‍💻 Phân công
- **Home Page** → lien
- **IELTS Page** →  nghia
- **Business English Page** → lam
- **Quản lý GitHub & cấu hình** → Leader

---

## 🛠 Công nghệ
- laragon
- WordPress 6.x
- PHP 8+
- MySQL / MariaDB
- HTML, CSS, JS
- Git/GitHub

---

## ⚙️ Setup local
1. Clone repo:
   ```bash
   git clone https://github.com/vhl2873/GenZTech.git
   cd GenZTech