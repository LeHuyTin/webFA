<?php
class AboutController {
    public function index() {
        ob_start();
        echo '<link rel="stylesheet" href="././Public/css/about.css?v=' . time() . '">';
        include __DIR__ . '/../Views/about.php';
        $content = ob_get_clean();
        include __DIR__ . '/../Views/layout.php';
    }
}
