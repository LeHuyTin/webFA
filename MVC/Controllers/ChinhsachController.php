<?php
class ChinhsachController {
    public function index() {
        ob_start();
        echo '<link rel="stylesheet" href="././Public/css/chinhsach.css?v=' . time() . '">';
        include __DIR__ . '/../Views/chinhsach.php';
        $content = ob_get_clean();
        include __DIR__ . '/../Views/layout.php';
    }
}
