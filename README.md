# WebFA - Fashion E-commerce Website

## Mô tả dự án
WebFA là một trang web thương mại điện tử chuyên về thời trang, được xây dựng bằng PHP và MySQL với kiến trúc MVC.

## Công nghệ sử dụng
- **Backend**: PHP (MVC Pattern)
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Framework CSS**: Bootstrap
- **Icons**: FontAwesome
- **Additional**: React.js (trong thư mục begin/)

## Cấu trúc dự án
```
webFA/
├── begin/                  # React application
├── Entities/              # Entity classes
├── Font/                  # FontAwesome assets
├── MVC/                   # MVC architecture
│   ├── Controllers/       # Controllers
│   ├── Models/           # Models & Database connection
│   └── Views/            # Views
├── Public/               # Static assets
│   ├── css/             # Stylesheets
│   ├── img/             # Images
│   └── js/              # JavaScript files
├── index.html           # Main page
├── index.php           # PHP entry point
├── login.html          # Login page
└── product.html        # Product page
```

## Tính năng
- Trang chủ hiển thị sản phẩm
- Đăng nhập/Đăng ký người dùng
- Quản lý sản phẩm
- Giao diện responsive
- Slider hình ảnh
- Tìm kiếm sản phẩm

## Cài đặt và chạy
1. Clone repository này
2. Đặt vào thư mục `htdocs` của XAMPP
3. Khởi động Apache và MySQL trong XAMPP
4. Truy cập `http://localhost/webFA`

## Tác giả
Lê Huy Tín

## License
This project is licensed under the MIT License.
