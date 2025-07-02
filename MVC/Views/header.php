<div class="header">
    <div class="logo">
        <a href="index.php"><img src="././Public/img/logo.png"></a>
    </div>
    <div class="menu">
        <li><a href="index.php">Trang chủ</a></li>
        <li>
            <div class="dropdown">
                <a href="index.php?url=product">Sản phẩm</a>
                <i class="fa-solid fa-chevron-down"></i>
                <div class="dropdown-menu">
                    <div class="columns">
                        <div class="column">
                            <div class="tag">Áo</div>
                            <a href="index.php?url=product&category=ao-polo" class="dropdown-item">Áo Polo</a>
                            <a href="index.php?url=product&category=ao-thun" class="dropdown-item">Áo Thun</a>
                            <a href="index.php?url=product&category=ao-somi" class="dropdown-item">Áo Sơ mi</a>
                            <a href="index.php?url=product&category=ao-khoac" class="dropdown-item">Áo Khoác</a>
                            <a href="index.php?url=product&category=ao-tanktop" class="dropdown-item">Áo Tanktop</a>
                            <a href="index.php?url=product&category=ao-hoodies" class="dropdown-item">Áo Hoodies</a>
                        </div>
                        <div class="column">
                            <div class="tag">Quần</div>
                            <a href="index.php?url=product&category=quan-jean" class="dropdown-item">Quần Jean</a>
                            <a href="index.php?url=product&category=quan-tay" class="dropdown-item">Quần Tây</a>
                            <a href="index.php?url=product&category=quan-short" class="dropdown-item">Quần Short</a>
                            <a href="index.php?url=product&category=quan-jogger" class="dropdown-item">Quần Jogger - Quần dài</a>
                            <a href="index.php?url=product&category=quan-boxer" class="dropdown-item">Quần Boxer</a>
                        </div>
                        <div class="column">
                            <div class="tag">Giày & phụ kiện</div>
                            <a href="index.php?url=product&category=giay" class="dropdown-item">Giày</a>
                            <a href="index.php?url=product&category=balo-tui" class="dropdown-item">Balo & túi</a>
                            <a href="index.php?url=product&category=non" class="dropdown-item">Nón</a>
                            <a href="index.php?url=product&category=that-lung" class="dropdown-item">Thắt lưng</a>
                            <a href="index.php?url=product&category=kinh-mat" class="dropdown-item">Kính mắt</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="index.php?url=promo">Khuyến mãi</a></li>
        <li>
            <div class="dropdown">
                <a href="index.php?url=info">Thông tin</a>
                <i class="fa-solid fa-chevron-down"></i>
                <div class="dropdown-menu">
                    <a href="index.php?url=about" class="dropdown-item">Giới thiệu</a>
                    <a href="index.php?url=chinhsach" class="dropdown-item">Chính sách</a>
                </div>
            </div>
        </li>
    </div>
    <div class="others">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- User đã đăng nhập -->
            <li class="user-menu">
                <div class="dropdown">
                    <a href="#" class="user-info">
                        <i class="fa-solid fa-user-circle"></i>
                        <span><?php echo htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['username']); ?></span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu user-dropdown" style="font-size: 16px;">
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                            <a href="index.php?url=admin" class="dropdown-item info">
                                <i class="fa fa-cogs"></i>
                                Quản trị hệ thống
                            </a>
                        <?php endif; ?>
                        <a href="index.php?url=login/profile" class="dropdown-item info">
                            <i class="fa fa-info-circle"></i>
                            Hồ sơ cá nhân
                        </a>
                        <a href="index.php?url=login/logout" class="dropdown-item logout">
                            <i class="fa fa-sign-out-alt"></i>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </li>
        <?php else: ?>
            <!-- User chưa đăng nhập -->
            <li><a class="fa fa-user" href="index.php?url=login" title="Đăng nhập"></a></li>
        <?php endif; ?>
        <?php if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')): ?>
        <li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="fa-solid fa-bag-shopping" href="index.php?url=cart" title="Giỏ hàng"></a>
            <?php else: ?>
                <a class="fa-solid fa-bag-shopping" href="index.php?url=login" title="Giỏ hàng"></a>
            <?php endif; ?>
        </li>
        <?php endif; ?>
    </div>
</div>