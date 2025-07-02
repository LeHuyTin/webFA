<div class="profile-container">
    <div class="profile-wrapper">
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="profile-info">
                <h2>Hồ sơ cá nhân</h2>
                <p>Quản lý thông tin tài khoản của bạn</p>
            </div>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <i class="fa fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <div class="profile-content">
            <div class="profile-sidebar">
                <div class="sidebar-menu">
                    <a href="#" class="menu-item active" onclick="showSection('info')">
                        <i class="fa fa-user"></i>
                        Thông tin cá nhân
                    </a>
                    <a href="#" class="menu-item" onclick="showSection('password')">
                        <i class="fa fa-lock"></i>
                        Đổi mật khẩu
                    </a>
                    <a href="#" class="menu-item" onclick="showSection('orders')">
                        <i class="fa fa-shopping-bag"></i>
                        Đơn hàng của tôi
                    </a>
                    <a href="index.php?url=login/logout" class="menu-item logout">
                        <i class="fa fa-sign-out-alt"></i>
                        Đăng xuất
                    </a>
                </div>
            </div>

            <div class="profile-main">
                <!-- Thông tin cá nhân -->
                <div id="info-section" class="profile-section active">
                    <div class="section-header">
                        <h3>Thông tin cá nhân</h3>
                        <p>Cập nhật thông tin tài khoản của bạn</p>
                    </div>

                    <form class="profile-form" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" disabled>
                                <small>Tên đăng nhập không thể thay đổi</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name">Họ và tên</label>
                            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea id="address" name="address" rows="3"><?php echo htmlspecialchars($user['address']); ?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Cập nhật thông tin
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Đổi mật khẩu -->
                <div id="password-section" class="profile-section">
                    <div class="section-header">
                        <h3>Đổi mật khẩu</h3>
                        <p>Thay đổi mật khẩu để bảo mật tài khoản</p>
                    </div>

                    <form class="profile-form" action="index.php?url=login/changePassword" method="POST">
                        <div class="form-group">
                            <label for="current_password">Mật khẩu hiện tại</label>
                            <input type="password" id="current_password" name="current_password" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới</label>
                                <input type="password" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Xác nhận mật khẩu mới</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-key"></i>
                                Đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Đơn hàng -->
                <div id="orders-section" class="profile-section">
                    <div class="section-header">
                        <h3>Đơn hàng của tôi</h3>
                        <p>Theo dõi trạng thái đơn hàng</p>
                    </div>

                    <div class="orders-list">
                        <div class="empty-state">
                            <i class="fa fa-shopping-bag"></i>
                            <h4>Chưa có đơn hàng nào</h4>
                            <p>Hãy mua sắm ngay để có đơn hàng đầu tiên!</p>
                            <a href="index.php?url=product" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>
                                Mua sắm ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-container {
    min-height: 70vh;
    padding: 20px;
}

.profile-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}

.profile-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 30px;
    display: flex;
    align-items: center;
    gap: 20px;
    color: white;
}

.profile-avatar {
    font-size: 4rem;
}

.profile-info h2 {
    margin: 0 0 5px 0;
    font-size: 2rem;
}

.profile-info p {
    margin: 0;
    opacity: 0.9;
}

.alert {
    padding: 15px 20px;
    margin: 20px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-error {
    background: #fee;
    color: #dc3545;
    border: 1px solid #fecaca;
}

.alert-success {
    background: #eff;
    color: #28a745;
    border: 1px solid #c3e6cb;
}

.profile-content {
    display: flex;
    min-height: 500px;
}

.profile-sidebar {
    width: 250px;
    background: #f8f9fa;
    border-right: 1px solid #e9ecef;
}

.sidebar-menu {
    padding: 20px 0;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 25px;
    color: #495057;
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.menu-item:hover, .menu-item.active {
    background: #e9ecef;
    color: #007bff;
    border-left-color: #007bff;
}

.menu-item.logout {
    color: #dc3545;
    margin-top: 20px;
}

.menu-item.logout:hover {
    background: #fff5f5;
    border-left-color: #dc3545;
}

.profile-main {
    flex: 1;
    padding: 30px;
}

.profile-section {
    display: none;
}

.profile-section.active {
    display: block;
}

.section-header {
    margin-bottom: 30px;
}

.section-header h3 {
    margin: 0 0 5px 0;
    color: #333;
    font-size: 1.5rem;
}

.section-header p {
    margin: 0;
    color: #666;
}

.profile-form {
    max-width: 600px;
}

.form-row {
    display: flex;
    gap: 20px;
}

.form-row .form-group {
    flex: 1;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 600;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.form-group input:focus, .form-group textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
}

.form-group input:disabled {
    background: #f8f9fa;
    color: #6c757d;
}

.form-group small {
    display: block;
    margin-top: 5px;
    color: #6c757d;
    font-size: 0.8rem;
}

.form-actions {
    margin-top: 30px;
}

.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #0056b3, #004085);
    transform: translateY(-1px);
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 20px;
    color: #ccc;
}

.empty-state h4 {
    margin: 0 0 10px 0;
    color: #333;
}

/* Responsive */
@media (max-width: 768px) {
    .profile-content {
        flex-direction: column;
    }
    
    .profile-sidebar {
        width: 100%;
    }
    
    .sidebar-menu {
        display: flex;
        overflow-x: auto;
        padding: 10px 0;
    }
    
    .menu-item {
        white-space: nowrap;
        padding: 10px 20px;
        border-left: none;
        border-bottom: 3px solid transparent;
    }
    
    .menu-item:hover, .menu-item.active {
        border-left: none;
        border-bottom-color: #007bff;
    }
    
    .profile-main {
        padding: 20px;
    }
    
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .profile-header {
        padding: 20px;
        flex-direction: column;
        text-align: center;
    }
    
    .profile-avatar {
        font-size: 3rem;
    }
    
    .profile-info h2 {
        font-size: 1.5rem;
    }
}
</style>

<script>
function showSection(sectionName) {
    // Hide all sections
    document.querySelectorAll('.profile-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Remove active class from all menu items
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Show selected section
    document.getElementById(sectionName + '-section').classList.add('active');
    
    // Add active class to clicked menu item
    event.target.classList.add('active');
}
</script>
