<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    
    <!-- Load Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Load custom CSS files -->
    <link rel="stylesheet" href="././Public/css/responsive.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/slider.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/footer.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="././Public/css/productHome.css?v=<?php echo time(); ?>">
    
    <?php
    // Load page-specific CSS files
    $currentPage = basename($_SERVER['REQUEST_URI']);
    $urlParams = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    parse_str($urlParams ?? '', $params);
    $page = $params['url'] ?? '';
    
    // Define CSS files for different pages
    $pageCssFiles = [
        'about' => 'about.css',
        'chinhsach' => 'chinhsach.css', 
        'product' => 'product.css',
        'login' => 'login.css'
    ];
    
    // Load CSS for specific pages
    if (isset($pageCssFiles[$page])) {
        echo '<link rel="stylesheet" href="././Public/css/' . $pageCssFiles[$page] . '?v=' . time() . '">';
    }
    
    // Also check for product page specifically
    if (strpos($currentPage, 'product') !== false || $page === 'product') {
        echo '<link rel="stylesheet" href="././Public/css/product.css?v=' . time() . '">';
    }
    ?>
    
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    
    <script src="././Public/js/slide.js"></script>
    <?php
    // Load page-specific JavaScript files
    if (isset($pageCssFiles[$page]) && $page === 'product') {
        echo '<script src="././Public/js/product.js?v=' . time() . '"></script>';
    }
    ?>
    
    <link rel="icon" href="././Public/img/icon.png" type="image/x-icon">
    <title>FA-shion shop</title>
</head>

<body>
    <div class="main">
        <!-- ------------------------------Header------------------------------ -->
        <?php include 'header.php'; ?>

        <!-- ------------------------------Content------------------------------ -->
        <div class="content">
            <?php echo $content; ?>
        </div>

        <!-- ------------------------------Footer------------------------------ -->
        <?php include 'footer.php'; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
