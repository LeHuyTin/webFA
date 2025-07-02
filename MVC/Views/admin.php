<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị hệ thống - FA-shion</title>
    <link rel="icon" href="./Public/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./Public/css/admin.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="admin-layout">
        <nav class="admin-sidebar">
            <ul>
                <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="#"><i class="fas fa-users"></i>Quản lý người dùng</a></li>
                <li><a href="#"><i class="fas fa-tshirt"></i>Quản lý sản phẩm</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i>Quản lý đơn hàng</a></li>
                <li><a href="#"><i class="fas fa-list"></i>Quản lý danh mục</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i>Thống kê</a></li>
                <li><a href="#"><i class="fas fa-cog"></i>Cài đặt</a></li>
            </ul>
        </nav>

        <main class="admin-content">
            <div class="welcome-section">
                <h2>Xin chào, Admin!</h2>
                <div class="admin-actions">
                    <a href="index.php">
                        <i class="fas fa-external-link-alt"></i>
                        Xem trang bán hàng
                    </a>
                    <a href="index.php?url=login/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Tổng người dùng</h3>
                    <div class="stat-value">1,234</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +12% so với tháng trước
                    </div>
                </div>

                <div class="stat-card">
                    <h3>Tổng sản phẩm</h3>
                    <div class="stat-value">856</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +8% so với tháng trước
                    </div>
                </div>

                <div class="stat-card">
                    <h3>Đơn hàng hôm nay</h3>
                    <div class="stat-value">94</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +15% so với hôm qua
                    </div>
                </div>

                <div class="stat-card">
                    <h3>Doanh thu tháng</h3>
                    <div class="stat-value">₫25.4M</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i>
                        +23% so với tháng trước
                    </div>
                </div>
            </div>

            <div class="content-grid">
                <div class="data-table">
                    <h3>Đơn hàng gần đây</h3>
                    <div class="table-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đặt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD001</td>
                                    <td>Nguyễn Văn A</td>
                                    <td>₫1,250,000</td>
                                    <td><span class="status-badge status-active">Hoàn thành</span></td>
                                    <td>02/07/2025</td>
                                </tr>
                                <tr>
                                    <td>#ORD002</td>
                                    <td>Trần Thị B</td>
                                    <td>₫890,000</td>
                                    <td><span class="status-badge status-pending">Đang xử lý</span></td>
                                    <td>02/07/2025</td>
                                </tr>
                                <tr>
                                    <td>#ORD003</td>
                                    <td>Lê Văn C</td>
                                    <td>₫2,100,000</td>
                                    <td><span class="status-badge status-active">Hoàn thành</span></td>
                                    <td>01/07/2025</td>
                                </tr>
                                <tr>
                                    <td>#ORD004</td>
                                    <td>Phạm Thị D</td>
                                    <td>₫750,000</td>
                                    <td><span class="status-badge status-inactive">Đã hủy</span></td>
                                    <td>01/07/2025</td>
                                </tr>
                                <tr>
                                    <td>#ORD005</td>
                                    <td>Hoàng Văn E</td>
                                    <td>₫1,680,000</td>
                                    <td><span class="status-badge status-pending">Đang giao</span></td>
                                    <td>30/06/2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div>
                    <div class="quick-actions">
                        <h3>Thao tác nhanh</h3>
                        <button class="action-button">
                            <i class="fas fa-plus"></i> Thêm sản phẩm mới
                        </button>
                        <button class="action-button">
                            <i class="fas fa-users"></i> Quản lý người dùng
                        </button>
                        <button class="action-button">
                            <i class="fas fa-chart-bar"></i> Xem báo cáo
                        </button>
                        <button class="action-button">
                            <i class="fas fa-cog"></i> Cài đặt hệ thống
                        </button>
                    </div>

                    <div class="recent-activity" style="margin-top: 1.5rem;">
                        <h3>Hoạt động gần đây</h3>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Người dùng mới đăng ký</h4>
                                <p>Nguyễn Văn A vừa tạo tài khoản - 5 phút trước</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Đơn hàng mới</h4>
                                <p>Đơn hàng #ORD006 đã được đặt - 12 phút trước</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Sản phẩm cập nhật</h4>
                                <p>Áo thun nam basic đã cập nhật giá - 1 giờ trước</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Thêm hiệu ứng smooth scroll và tương tác
        document.addEventListener('DOMContentLoaded', function() {
            // Animate numbers in stat cards
            const statValues = document.querySelectorAll('.stat-value');
            statValues.forEach(stat => {
                const value = stat.textContent;
                const numValue = parseInt(value.replace(/[^\d]/g, ''));
                if (numValue) {
                    animateNumber(stat, 0, numValue, 2000);
                }
            });

            // Sidebar navigation
            const sidebarLinks = document.querySelectorAll('.admin-sidebar a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebarLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        function animateNumber(element, start, end, duration) {
            const range = end - start;
            const startTime = performance.now();

            function updateNumber(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const current = Math.floor(start + (range * progress));

                if (element.textContent.includes('₫')) {
                    element.textContent = '₫' + current.toLocaleString() + (end >= 1000000 ? 'M' : 'K');
                } else {
                    element.textContent = current.toLocaleString();
                }

                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                }
            }

            requestAnimationFrame(updateNumber);
        }
    </script>
</body>

</html>