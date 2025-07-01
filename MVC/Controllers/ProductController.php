<?php
require_once './MVC/Models/ProductModel.php';

class ProductController
{
    public function index()
    {
        // Lấy danh sách sản phẩm từ model
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();

        // Tạo nội dung cho view
        ob_start();
        include './MVC/Views/product.php';
        $content = ob_get_clean();

        // Bao gồm layout để hiển thị nội dung
        include './MVC/Views/layout.php';
    }
}
