<?php
class CartController {
    public function index() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?url=login');
            exit();
        }
        // Sử dụng layout.php, truyền nội dung cart.php vào $content
        ob_start();
        include './MVC/Views/cart.php';
        $content = ob_get_clean();
        include './MVC/Views/layout.php';
    }
}
