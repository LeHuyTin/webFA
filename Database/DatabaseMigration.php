<?php
require_once './MVC/Models/Connect.php';

class DatabaseMigration 
{
    private $conn;
    
    public function __construct() 
    {
        $this->conn = conn();
        if (!$this->conn) {
            die("Database connection failed!");
        }
    }
    
    public function runMigrations() 
    {
        echo "<script>console.log('🚀 Starting database migrations...');</script>";
        
        // Tạo bảng migrations để track
        $this->createMigrationsTable();
        
        // Chạy các migration
        $this->createUsersTable();
        $this->createCategoriesTable();
        $this->createProductsTable();
        $this->createOrdersTable();
        $this->createOrderItemsTable();
        
        // Insert sample data
        $this->insertSampleData();
        
        echo "<script>console.log('✅ All migrations completed successfully!');</script>";
        return true;
    }
    
    private function createMigrationsTable() 
    {
        $sql = "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration_name VARCHAR(255) NOT NULL,
            executed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $this->executeQuery($sql, "migrations table");
    }
    
    private function createUsersTable() 
    {
        if ($this->tableExists('users')) {
            echo "<script>console.log('⏭️ Users table already exists, skipping...');</script>";
            return;
        }
        
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            full_name VARCHAR(100),
            phone VARCHAR(20),
            address TEXT,
            role ENUM('admin', 'customer') DEFAULT 'customer',
            status ENUM('active', 'inactive') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $this->executeQuery($sql, "users table");
        $this->recordMigration("create_users_table");
    }
    
    private function createCategoriesTable() 
    {
        if ($this->tableExists('categories')) {
            echo "<script>console.log('⏭️ Categories table already exists, skipping...');</script>";
            return;
        }
        
        $sql = "CREATE TABLE categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            slug VARCHAR(100) UNIQUE NOT NULL,
            description TEXT,
            image VARCHAR(255),
            status ENUM('active', 'inactive') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        $this->executeQuery($sql, "categories table");
        $this->recordMigration("create_categories_table");
    }
    
    private function createProductsTable() 
    {
        if ($this->tableExists('products')) {
            echo "<script>console.log('⏭️ Products table already exists, skipping...');</script>";
            return;
        }
        
        $sql = "CREATE TABLE products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(200) NOT NULL,
            slug VARCHAR(200) UNIQUE NOT NULL,
            description TEXT,
            short_description TEXT,
            price DECIMAL(10,2) NOT NULL,
            sale_price DECIMAL(10,2),
            image VARCHAR(255),
            gallery TEXT,
            category_id INT,
            stock_quantity INT DEFAULT 0,
            sku VARCHAR(50) UNIQUE,
            tags VARCHAR(255),
            is_featured BOOLEAN DEFAULT FALSE,
            status ENUM('active', 'inactive', 'draft') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
        )";
        
        $this->executeQuery($sql, "products table");
        $this->recordMigration("create_products_table");
    }
    
    private function createOrdersTable() 
    {
        if ($this->tableExists('orders')) {
            echo "<script>console.log('⏭️ Orders table already exists, skipping...');</script>";
            return;
        }
        
        $sql = "CREATE TABLE orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            order_number VARCHAR(20) UNIQUE NOT NULL,
            total_amount DECIMAL(10,2) NOT NULL,
            status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
            payment_method VARCHAR(50),
            payment_status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
            customer_name VARCHAR(100) NOT NULL,
            customer_email VARCHAR(100) NOT NULL,
            customer_phone VARCHAR(20),
            shipping_address TEXT NOT NULL,
            notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
        )";
        
        $this->executeQuery($sql, "orders table");
        $this->recordMigration("create_orders_table");
    }
    
    private function createOrderItemsTable() 
    {
        if ($this->tableExists('order_items')) {
            echo "<script>console.log('⏭️ Order items table already exists, skipping...');</script>";
            return;
        }
        
        $sql = "CREATE TABLE order_items (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT NOT NULL,
            product_id INT NOT NULL,
            product_name VARCHAR(200) NOT NULL,
            product_price DECIMAL(10,2) NOT NULL,
            quantity INT NOT NULL,
            total_price DECIMAL(10,2) NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
        )";
        
        $this->executeQuery($sql, "order_items table");
        $this->recordMigration("create_order_items_table");
    }
    
    private function insertSampleData() 
    {
        // Insert admin user
        $this->insertAdminUser();
        
        // Insert sample categories
        $this->insertSampleCategories();
        
        // Insert sample products
        $this->insertSampleProducts();
    }
    
    private function insertAdminUser() 
    {
        $checkUser = "SELECT COUNT(*) FROM users WHERE username = 'admin'";
        $stmt = $this->conn->prepare($checkUser);
        $stmt->execute();
        
        if ($stmt->fetchColumn() == 0) {
            $sql = "INSERT INTO users (username, email, password, full_name, role) VALUES 
                   ('admin', 'admin@fa-shion.com', :password, 'Administrator', 'admin')";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':password' => password_hash('admin', PASSWORD_DEFAULT)]);
            
            echo "<script>console.log('👤 Admin user created (admin/admin)');</script>";
        }
    }
    
    private function insertSampleCategories() 
    {
        $checkCat = "SELECT COUNT(*) FROM categories";
        $stmt = $this->conn->prepare($checkCat);
        $stmt->execute();
        
        if ($stmt->fetchColumn() == 0) {
            $categories = [
                ['Áo Polo', 'ao-polo', 'Áo polo nam cao cấp, nhiều màu sắc'],
                ['Áo Thun', 'ao-thun', 'Áo thun cotton, thoáng mát'],
                ['Quần Tây', 'quan-tay', 'Quần tây công sở, lịch sự'],
                ['Quần Jean', 'quan-jean', 'Quần jean thời trang, bền đẹp'],
                ['Phụ Kiện', 'phu-kien', 'Các phụ kiện thời trang']
            ];
            
            $sql = "INSERT INTO categories (name, slug, description) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            
            foreach ($categories as $cat) {
                $stmt->execute($cat);
            }
            
            echo "<script>console.log('📂 Sample categories inserted');</script>";
        }
    }
    
    private function insertSampleProducts() 
    {
        $checkProd = "SELECT COUNT(*) FROM products";
        $stmt = $this->conn->prepare($checkProd);
        $stmt->execute();
        
        if ($stmt->fetchColumn() == 0) {
            $products = [
                ['Áo Polo Nam Cao Cấp', 'ao-polo-nam-cao-cap', 'Áo polo nam chất liệu cotton cao cấp', 299000, 'polo1.webp', 1, 50, 'P001', 'polo,nam,cao-cap', 1],
                ['Áo Polo Thể Thao', 'ao-polo-the-thao', 'Áo polo thể thao, thoáng mát', 259000, 'polo2.webp', 1, 30, 'P002', 'polo,the-thao', 1],
                ['Áo Polo Basic', 'ao-polo-basic', 'Áo polo basic, phù hợp mọi hoàn cảnh', 199000, 'polo3.webp', 1, 40, 'P003', 'polo,basic', 0],
                ['Quần Tây Slim Fit', 'quan-tay-slim-fit', 'Quần tây slim fit, ôm dáng', 399000, 'tay1.webp', 3, 25, 'Q001', 'quan-tay,slim-fit', 1],
                ['Quần Tây Classic', 'quan-tay-classic', 'Quần tây classic, thanh lịch', 349000, 'tay2.webp', 3, 35, 'Q002', 'quan-tay,classic', 0],
                ['Quần Tây Công Sở', 'quan-tay-cong-so', 'Quần tây công sở, chuyên nghiệp', 449000, 'tay3.webp', 3, 20, 'Q003', 'quan-tay,cong-so', 1]
            ];
            
            $sql = "INSERT INTO products (name, slug, description, price, image, category_id, stock_quantity, sku, tags, is_featured) 
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            
            foreach ($products as $prod) {
                $stmt->execute($prod);
            }
            
            echo "<script>console.log('🛍️ Sample products inserted');</script>";
        }
    }
    
    private function tableExists($tableName) 
    {
        $sql = "SHOW TABLES LIKE :tableName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tableName' => $tableName]);
        return $stmt->rowCount() > 0;
    }
    
    private function executeQuery($sql, $description) 
    {
        try {
            $this->conn->exec($sql);
            echo "<script>console.log('✅ Created $description');</script>";
        } catch(PDOException $e) {
            echo "<script>console.log('❌ Error creating $description: " . $e->getMessage() . "');</script>";
        }
    }
    
    private function recordMigration($migrationName) 
    {
        $sql = "INSERT INTO migrations (migration_name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':name' => $migrationName]);
    }
    
    public function checkTables() 
    {
        $tables = ['users', 'categories', 'products', 'orders', 'order_items'];
        $allExist = true;
        
        foreach ($tables as $table) {
            if (!$this->tableExists($table)) {
                $allExist = false;
                break;
            }
        }
        
        return $allExist;
    }
}
?>
