<?php
require_once './Database/DatabaseMigration.php';

class SetupController
{
    public function index()
    {
        $migration = new DatabaseMigration();
        
        // Kiểm tra xem các bảng đã tồn tại chưa
        if ($migration->checkTables()) {
            $message = "Database đã được setup thành công! Tất cả bảng đã tồn tại.";
            $status = "success";
        } else {
            // Chạy migration
            try {
                $migration->runMigrations();
                $message = "Database setup thành công! Tất cả bảng và dữ liệu mẫu đã được tạo.";
                $status = "success";
            } catch (Exception $e) {
                $message = "Lỗi khi setup database: " . $e->getMessage();
                $status = "error";
            }
        }

        // Tạo nội dung cho view
        ob_start();
        include './MVC/Views/setup.php';
        $content = ob_get_clean();

        // Bao gồm layout để hiển thị nội dung
        include './MVC/Views/layout.php';
    }
}
