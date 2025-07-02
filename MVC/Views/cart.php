<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="./Public/css/cart.css">
</head>
<body>
<div class="cart-container">
    <h2>Giỏ hàng của bạn</h2>
    <div class="cart-main">
        <!-- Cột trái: Danh sách sản phẩm -->
        <div class="cart-list">
            <!-- Danh sách sản phẩm, mỗi sản phẩm là 1 hàng -->
            <!-- Demo 10 sản phẩm, khi nhiều hơn sẽ có scroll -->
            <div class="cart-item">
                <input type="checkbox" class="cart-check" checked>
                <img src="./Public/img/aokhoac.jpg" alt="Sản phẩm" class="cart-thumb">
                <div class="cart-info">
                    <div class="cart-title">Áo khoác bomber nam</div>
                    <div class="cart-size">Size: <select><option>M</option><option>L</option><option>XL</option></select></div>
                </div>
                <div class="cart-qty">
                    <button class="qty-btn minus">-</button>
                    <input type="number" value="1" min="1" max="99">
                    <button class="qty-btn plus">+</button>
                </div>
                <div class="cart-price">350.000đ</div>
                <button class="cart-remove">Xóa</button>
            </div>
            <!-- ...9 sản phẩm demo nữa... -->
        </div>
        <!-- Cột phải: Thông tin thanh toán -->
        <div class="cart-summary">
            <h3>Thông tin thanh toán</h3>
            <div class="summary-list">
                <!-- Danh sách sản phẩm đã chọn, chỉ hiện tên, tối đa 5, có scroll -->
                <div class="summary-item">Áo khoác bomber nam</div>
                <!-- ... -->
            </div>
            <div class="summary-total">
                Tổng tiền: <span class="total-price">350.000đ</span>
            </div>
            <button class="checkout-btn">Mua ngay</button>
        </div>
    </div>
</div>
<script src="./Public/js/cart.js"></script>
</body>
</html>
