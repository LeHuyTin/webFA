<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="././Public/css/slider.css ?v <?php echo time(); ?>">
    <link rel="stylesheet" href=" ././Public/css/header.css  ?v <?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/style.css ?v <?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/footer.css ?v <?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/productHome.css ?v <?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/product.css ?v <?php echo time(); ?>">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="icon" href="././Public/img/icon.png" type="image/x-icon">
    <title>FA-shion shop</title>
</head>

<body>
    <div class="main">
        <!-- ------------------------------Header------------------------------ -->
        <div class="header">
            <div class="logo">
                <a href="index"><img src="././Public/img/logo.png"></a>
            </div>
            <div class="menu">
                <li><a href="index">Trang chủ</a></li>
                <li>
                    <div class="dropdown">
                        <a href="product">Sản phẩm</a>
                        <i class="fa-solid fa-chevron-down"></i>
                        <div class="dropdown-menu">
                            <div class="columns">
                                <div class="column">
                                    <div class="tag">Áo</div>
                                    <a href="product?category=ao-polo" class="dropdown-item">Áo Polo</a>
                                    <a href="product?category=ao-thun" class="dropdown-item">Áo Thun</a>
                                    <a href="product?category=ao-somi" class="dropdown-item">Áo Sơ mi</a>
                                    <a href="product?category=ao-khoac" class="dropdown-item">Áo Khoác</a>
                                    <a href="product?category=ao-tanktop" class="dropdown-item">Áo Tanktop</a>
                                    <a href="product?category=ao-hoodies" class="dropdown-item">Áo Hoodies</a>
                                </div>
                                <div class="column">
                                    <div class="tag">Quần</div>
                                    <a href="product?category=quan-jean" class="dropdown-item">Quần Jean</a>
                                    <a href="product?category=quan-tay" class="dropdown-item">Quần Tây</a>
                                    <a href="product?category=quan-short" class="dropdown-item">Quần Short</a>
                                    <a href="product?category=quan-jogger" class="dropdown-item">Quần Jogger - Quần dài</a>
                                    <a href="product?category=quan-boxer" class="dropdown-item">Quần Boxer</a>
                                </div>
                                <div class="column">
                                    <div class="tag">Giày & phụ kiện</div>
                                    <a href="product?category=giay" class="dropdown-item">Giày</a>
                                    <a href="product?category=balo-tui" class="dropdown-item">Balo & túi</a>
                                    <a href="product?category=non" class="dropdown-item">Nón</a>
                                    <a href="product?category=that-lung" class="dropdown-item">Thắt lưng</a>
                                    <a href="product?category=kinh-mat" class="dropdown-item">Kính mắt</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="promo">Khuyến mãi</a></li>
                <li>
                    <div class="dropdown">
                        <a href="info">Thông tin</a>
                        <i class="fa-solid fa-chevron-down"></i>
                        <div class="dropdown-menu">
                            <a asp-controller="Gioithieu" class="dropdown-item">Giới thiệu</a>
                            <a asp-controller="Chinhsach" class="dropdown-item">Chính sách</a>
                            <a asp-controller="about" class="dropdown-item">Về chúng tôi</a>
                        </div>
                    </div>
                </li>
            </div>
            <div class="others">
                <li>
                    <div class="search">
                        <input type="text" id="search-input" placeholder="Tìm kiếm">
                        <a class="fa fa-search" href></a>
                    </div>
                </li>
                <li><a class="fa fa-user" href="././login.html"></a></li>
                <li><a class="fa-solid fa-bag-shopping" href></a></li>
            </div>
        </div>