<?php
require_once 'Entities/ProductEntity.php';
require_once 'Entities/CategoryEntity.php';

use Entities\CategoryEntity;
use Entities\ProductEntity;

class ProductModel
{
    // Phương thức để lấy danh sách sản phẩm
    public function getAllProducts()
    {
        // Dữ liệu mẫu, bạn có thể thay thế bằng truy vấn cơ sở dữ liệu
        $category1 = new CategoryEntity(1, 'Danh mục 1', 'Mô tả danh mục 1');
        $category2 = new CategoryEntity(2, 'Danh mục 2', 'Mô tả danh mục 2');

        return [
            new ProductEntity(1, 'Sản phẩm 1', 100000, 'Mô tả sản phẩm 1', 'image1.jpg', $category1, '2023-01-01', '2023-01-01'),
            new ProductEntity(2, 'Sản phẩm 2', 200000, 'Mô tả sản phẩm 2', 'image2.jpg', $category2, '2023-01-02', '2023-01-02'),
            new ProductEntity(3, 'Sản phẩm 3', 300000, 'Mô tả sản phẩm 3', 'image3.jpg', $category1, '2023-01-03', '2023-01-03'),
        ];
    }
}
