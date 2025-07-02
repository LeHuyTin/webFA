<?php
// MVC/Controllers/AdminController.php
class AdminController {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Chuẩn hóa kiểm tra session cho role admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?url=login');
            exit();
        }
        require_once 'MVC/Views/admin.php';
    }
}
