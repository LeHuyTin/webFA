<?php

class IndexController
{
    public function index()
    {
        // Tạo nội dung cho view
        ob_start();
        include './MVC/Views/home.php';
        $content = ob_get_clean();

        // Bao gồm layout để hiển thị nội dung
        include './MVC/Views/layout.php';
    }
}
