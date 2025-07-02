<div class="setup-container">
    <div class="setup-box">
        <div class="setup-header">
            <h1>🚀 FA-shion Database Setup</h1>
            <p>Khởi tạo cơ sở dữ liệu cho website FA-shion</p>
        </div>
        
        <div class="setup-content">
            <?php if ($status === 'success'): ?>
                <div class="success-message">
                    <i class="fa fa-check-circle"></i>
                    <h3>Setup thành công!</h3>
                    <p><?php echo $message; ?></p>
                </div>
                
                <div class="setup-info">
                    <h4>📋 Thông tin database:</h4>
                    <ul>
                        <li>✅ Bảng <strong>users</strong> - Quản lý người dùng</li>
                        <li>✅ Bảng <strong>categories</strong> - Danh mục sản phẩm</li>
                        <li>✅ Bảng <strong>products</strong> - Sản phẩm</li>
                        <li>✅ Bảng <strong>orders</strong> - Đơn hàng</li>
                        <li>✅ Bảng <strong>order_items</strong> - Chi tiết đơn hàng</li>
                    </ul>
                    
                    <h4>👤 Tài khoản admin mặc định:</h4>
                    <div class="admin-info">
                        <p><strong>Username:</strong> admin</p>
                        <p><strong>Password:</strong> admin</p>
                    </div>
                </div>
                
                <div class="setup-actions">
                    <a href="index.php" class="btn btn-primary">
                        <i class="fa fa-home"></i> Về trang chủ
                    </a>
                    <a href="index.php?url=login" class="btn btn-secondary">
                        <i class="fa fa-sign-in-alt"></i> Đăng nhập Admin
                    </a>
                </div>
                
            <?php else: ?>
                <div class="error-message">
                    <i class="fa fa-exclamation-triangle"></i>
                    <h3>Lỗi setup!</h3>
                    <p><?php echo $message; ?></p>
                </div>
                
                <div class="setup-actions">
                    <a href="index.php?url=setup" class="btn btn-primary">
                        <i class="fa fa-refresh"></i> Thử lại
                    </a>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fa fa-home"></i> Về trang chủ
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.setup-container {
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.setup-box {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 40px;
    max-width: 600px;
    width: 100%;
    text-align: center;
}

.setup-header h1 {
    color: #333;
    margin-bottom: 10px;
    font-size: 2.5rem;
}

.setup-header p {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 30px;
}

.success-message, .error-message {
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.success-message {
    background: linear-gradient(135deg, #d4edda, #c3e6cb);
    border: 2px solid #b8daff;
    color: #155724;
}

.error-message {
    background: linear-gradient(135deg, #f8d7da, #f5c6cb);
    border: 2px solid #f5c6cb;
    color: #721c24;
}

.success-message i, .error-message i {
    font-size: 3rem;
    margin-bottom: 15px;
    display: block;
}

.setup-info {
    text-align: left;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
}

.setup-info h4 {
    color: #333;
    margin-bottom: 15px;
}

.setup-info ul {
    list-style: none;
    padding: 0;
}

.setup-info li {
    padding: 5px 0;
    color: #555;
}

.admin-info {
    background: #e9ecef;
    padding: 15px;
    border-radius: 8px;
    border-left: 4px solid #007bff;
}

.setup-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    padding: 12px 24px;
    border: none;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
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
    transform: translateY(-2px);
}

.btn-secondary {
    background: linear-gradient(45deg, #6c757d, #545b62);
    color: white;
}

.btn-secondary:hover {
    background: linear-gradient(45deg, #545b62, #383d41);
    transform: translateY(-2px);
}
</style>
