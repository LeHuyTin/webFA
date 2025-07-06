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
                        <i class="fa fa-user-circle"></i>
                        Thông tin cá nhân
                    </a>
                    <a href="#" class="menu-item" onclick="showSection('password')">
                        <i class="fa fa-lock"></i>
                        Đổi mật khẩu
                    </a>
                    <?php if (empty($user['role']) || $user['role'] !== 'admin'): ?>
                    <a href="#" class="menu-item" onclick="showSection('orders')">
                        <i class="fa fa-shopping-bag"></i>
                        Đơn hàng của tôi
                    </a>
                    <?php endif; ?>
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
                <?php if (empty($user['role']) || $user['role'] !== 'admin'): ?>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

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
