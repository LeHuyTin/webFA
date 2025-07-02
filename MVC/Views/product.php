<div class="product-page">
    <!-- Thanh sắp xếp và tìm kiếm -->
    <div class="product-header">
        <div class="product-controls">
            <div class="sort-section">
                <div class="dropdown">
                    <label for="sort-select">Sắp xếp: Mặc định</label>
                    <i class="fa-solid fa-chevron-down"></i>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-value="default">Mặc định</a>
                        <a class="dropdown-item" data-value="price-asc">Giá tăng dần</a>
                        <a class="dropdown-item" data-value="price-desc">Giá giảm dần</a>
                        <a class="dropdown-item" data-value="name-asc">Tên A-Z</a>
                        <a class="dropdown-item" data-value="name-desc">Tên Z-A</a>
                    </div>
                </div>
            </div>
            <div class="search-section">
                <input type="text" id="product-search" placeholder="Tìm kiếm sản phẩm..." class="search-input">
                <button class="search-btn"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>

    <!-- Bộ lọc và danh sách sản phẩm -->
    <div class="product-content">
        <!-- Bộ lọc -->
        <div class="filter-sidebar">
            <div class="filter-section">
                <div class="filter-header">
                    <h3>Danh mục sản phẩm</h3>
                    <button class="reset-btn" id="reset-categories" title="Reset tất cả bộ lọc">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>
                <div class="category-filters">
                    <div class="category-section-title clickable" data-category="quan-ao">
                        Quần Áo <i class="fa fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="category-items collapsed" id="quan-ao-items">
                        <div class="category-columns">
                            <div class="category-column">
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-polo"> Áo Polo
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-thun"> Áo Thun
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-somi"> Áo Sơ mi
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-khoac"> Áo Khoác
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-tanktop"> Áo Tanktop
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ao-hoodies"> Áo Hoodies
                                </label>
                            </div>
                            <div class="category-column">
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="quan-jean"> Quần Jean
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="quan-tay"> Quần Tây
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="quan-short"> Quần Short
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="quan-jogger"> Quần Jogger
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="quan-boxer"> Quần Boxer
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="ban-chay"> Bán chạy
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="category-section-title clickable" data-category="phu-kien">
                        Phụ Kiện <i class="fa fa-chevron-down toggle-icon"></i>
                    </div>
                    <div class="category-items collapsed" id="phu-kien-items">
                        <div class="category-columns">
                            <div class="category-column">
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="giay"> Giày
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="balo-tui"> Balo & Túi
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="non"> Nón
                                </label>
                            </div>
                            <div class="category-column">
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="that-lung"> Thắt Lưng
                                </label>
                                <label class="filter-checkbox">
                                    <input type="checkbox" value="kinh-mat"> Kính Mắt
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-section">
                <h3>Khoảng giá</h3>
                <div class="price-range">
                    <div class="price-slider-container">
                        <input type="range" id="price-max" min="100000" max="2500000" step="100000" value="2500000" class="price-slider">
                    </div>
                    <div class="price-values">
                        <span id="price-range-display">100.000 VND - <span id="price-max-value">2.500.000 VND</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="product-main">
            <div class="products-grid">
                <!-- Sản phẩm mẫu - sẽ được thay thế bằng dữ liệu thực -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/polo1.webp" alt="Áo Polo">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Áo Polo Nam Cao Cấp</h4>
                        <p class="product-price">299.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/polo2.webp" alt="Áo Polo">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Áo Polo Thể Thao</h4>
                        <p class="product-price">259.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/polo3.webp" alt="Áo Polo">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Áo Polo Basic</h4>
                        <p class="product-price">199.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/tay1.webp" alt="Quần Tây">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Quần Tây Slim Fit</h4>
                        <p class="product-price">399.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/tay2.webp" alt="Quần Tây">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Quần Tây Classic</h4>
                        <p class="product-price">349.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">
                        <img src="././Public/img/tay3.webp" alt="Quần Tây">
                    </div>
                    <div class="product-info">
                        <h4 class="product-name">Quần Tây Công Sở</h4>
                        <p class="product-price">449.000 VND</p>
                        <button class="add-to-cart-btn">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <!-- Phân trang -->
            <div class="pagination">
                <button class="pagination-btn prev-btn" disabled><i class="fa fa-chevron-left"></i></button>
                <button class="pagination-btn page-btn active">1</button>
                <button class="pagination-btn page-btn">2</button>
                <button class="pagination-btn page-btn">3</button>
                <button class="pagination-btn page-btn">...</button>
                <button class="pagination-btn page-btn">10</button>
                <button class="pagination-btn next-btn"><i class="fa fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>