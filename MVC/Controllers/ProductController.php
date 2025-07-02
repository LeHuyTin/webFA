<?php
require_once './MVC/Models/ProductModel.php';

class ProductController
{
    public function index()
    {
        // Lấy danh sách sản phẩm từ model
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        
        // Lấy search term và category từ URL nếu có
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';

        // Tạo nội dung cho view
        ob_start();
        include './MVC/Views/product.php';
        $content = ob_get_clean();

        // Bao gồm layout để hiển thị nội dung
        include './MVC/Views/layout.php';
    }
}
