document.addEventListener("DOMContentLoaded", function () {
    // Price slider functionality
    const priceMaxSlider = document.getElementById('price-max');
    const priceMaxValue = document.getElementById('price-max-value');
    const priceRangeDisplay = document.getElementById('price-range-display');

    function formatPrice(price) {
        return new Intl.NumberFormat('vi-VN').format(price) + ' VND';
    }

    function updatePriceRange() {
        let maxVal = parseInt(priceMaxSlider.value);
        let minVal = parseInt(priceMaxSlider.min);
        let maxRange = parseInt(priceMaxSlider.max);
        
        // Update progress percentage
        let progress = ((maxVal - minVal) / (maxRange - minVal)) * 100;
        priceMaxSlider.style.setProperty('--progress', progress + '%');
        
        priceMaxValue.textContent = formatPrice(maxVal);
        priceRangeDisplay.innerHTML = `${formatPrice(minVal)} - <span id="price-max-value">${formatPrice(maxVal)}</span>`;
        
        // Auto apply price filter
        applyPriceFilter();
    }

    // Price filter function
    function applyPriceFilter() {
        const maxPrice = parseInt(priceMaxSlider.value);
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            const productPrice = parseInt(card.querySelector('.product-price').textContent.replace(/\D/g, ''));
            if (productPrice <= maxPrice) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Khởi tạo giá trị ban đầu
    updatePriceRange();

    priceMaxSlider.addEventListener('input', updatePriceRange);

    // Search functionality
    const searchInput = document.getElementById('product-search');
    const searchBtn = document.querySelector('.search-btn');
    
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            const productName = card.querySelector('.product-name').textContent.toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    searchBtn.addEventListener('click', performSearch);
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Sort functionality with dropdown
    const sortDropdownItems = document.querySelectorAll('.sort-section .dropdown-item');
    const sortLabel = document.querySelector('.sort-section label');
    let currentSortValue = 'default';
    
    sortDropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const sortValue = this.getAttribute('data-value');
            const sortText = this.textContent;
            currentSortValue = sortValue;
            
            // Update label text
            sortLabel.textContent = `Sắp xếp: ${sortText}`;
            
            // Apply sorting logic
            applySorting(sortValue);
        });
    });
    
    function applySorting(sortValue) {
        const productCards = Array.from(document.querySelectorAll('.product-card'));
        const productsGrid = document.querySelector('.products-grid');
        
        productCards.sort((a, b) => {
            const nameA = a.querySelector('.product-name').textContent;
            const nameB = b.querySelector('.product-name').textContent;
            const priceA = parseInt(a.querySelector('.product-price').textContent.replace(/\D/g, ''));
            const priceB = parseInt(b.querySelector('.product-price').textContent.replace(/\D/g, ''));
            
            switch(sortValue) {
                case 'price-asc':
                    return priceA - priceB;
                case 'price-desc':
                    return priceB - priceA;
                case 'name-asc':
                    return nameA.localeCompare(nameB);
                case 'name-desc':
                    return nameB.localeCompare(nameA);
                default:
                    return 0;
            }
        });
        
        // Clear and re-append sorted products
        productsGrid.innerHTML = '';
        productCards.forEach(card => productsGrid.appendChild(card));
    }

    // Category filter functionality
    const categoryCheckboxes = document.querySelectorAll('.filter-checkbox input[type="checkbox"]');
    
    // Danh sách mapping các danh mục với từ khóa
    const categoryKeywords = {
        'ao-polo': ['polo', 'áo polo'],
        'ao-thun': ['thun', 'áo thun', 't-shirt'],
        'ao-somi': ['sơ mi', 'áo sơ mi', 'shirt'],
        'ao-khoac': ['khoác', 'áo khoác', 'jacket'],
        'ao-tanktop': ['tanktop', 'áo tanktop', 'tank top'],
        'ao-hoodies': ['hoodies', 'áo hoodies', 'hoodie'],
        'quan-jean': ['jean', 'quần jean', 'jeans'],
        'quan-tay': ['tây', 'quần tây', 'pants'],
        'quan-short': ['short', 'quần short', 'shorts'],
        'quan-jogger': ['jogger', 'quần jogger', 'quần dài'],
        'quan-boxer': ['boxer', 'quần boxer'],
        'giay': ['giày', 'shoe', 'shoes'],
        'balo-tui': ['balo', 'túi', 'bag', 'backpack'],
        'non': ['nón', 'mũ', 'hat', 'cap'],
        'kinh-mat': ['kính', 'kính mắt', 'glasses'],
        'that-lung': ['thắt lưng', 'dây nịt', 'belt']
    };
    
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedCategories = Array.from(categoryCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
            
            const productCards = document.querySelectorAll('.product-card');
            
            if (selectedCategories.length === 0) {
                // Show all products if no category is selected
                productCards.forEach(card => card.style.display = 'block');
            } else {
                // Show only products matching selected categories
                productCards.forEach(card => {
                    const productName = card.querySelector('.product-name').textContent.toLowerCase();
                    let showProduct = false;
                    
                    selectedCategories.forEach(category => {
                        const keywords = categoryKeywords[category] || [];
                        if (keywords.some(keyword => productName.includes(keyword.toLowerCase()))) {
                            showProduct = true;
                        }
                    });
                    
                    card.style.display = showProduct ? 'block' : 'none';
                });
            }
        });
    });

    // Reset all filters functionality
    const resetCategoriesBtn = document.getElementById('reset-categories');
    resetCategoriesBtn.addEventListener('click', function() {
        // Reset category checkboxes
        const categoryCheckboxes = document.querySelectorAll('.filter-checkbox input[type="checkbox"]');
        categoryCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        
        // Reset price slider to default value
        priceMaxSlider.value = priceMaxSlider.max;
        updatePriceRange();
        
        // Reset search input
        searchInput.value = '';
        
        // Reset sort dropdown
        sortSelect.value = 'default';
        
        // Show all products
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.style.display = 'block';
        });
        
        // Add visual feedback
        resetCategoriesBtn.style.color = '#424141';
        resetCategoriesBtn.style.transform = 'rotate(360deg) scale(1.2)';
        setTimeout(() => {
            resetCategoriesBtn.style.color = '#666';
            resetCategoriesBtn.style.transform = 'rotate(0deg) scale(1)';
        }, 500);
    });

    // Pagination functionality
    const paginationBtns = document.querySelectorAll('.pagination-btn');
    paginationBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.classList.contains('page-btn')) {
                // Remove active class from all page buttons
                document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
            }
        });
    });

    // Add to cart functionality
    const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
    addToCartBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Add animation effect
            this.style.transform = 'scale(0.95)';
            this.textContent = 'Đã thêm!';
            
            setTimeout(() => {
                this.style.transform = 'scale(1)';
                this.textContent = 'Thêm vào giỏ';
            }, 1000);
        });
    });

    // Product card click functionality
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            // Navigate to product detail page
            console.log('Navigate to product detail');
        });
    });

    // Category section toggle functionality
    const categoryTitles = document.querySelectorAll('.category-section-title.clickable');
    categoryTitles.forEach(title => {
        title.addEventListener('click', function() {
            const categoryType = this.getAttribute('data-category');
            const categoryItems = document.getElementById(categoryType + '-items');
            const toggleIcon = this.querySelector('.toggle-icon');
            
            // Hide all category items first
            document.querySelectorAll('.category-items').forEach(item => {
                item.classList.remove('active');
                item.classList.add('collapsed');
            });
            
            // Reset all toggle icons
            document.querySelectorAll('.toggle-icon').forEach(icon => {
                icon.style.transform = 'rotate(0deg)';
            });
            
            // Reset all title states
            document.querySelectorAll('.category-section-title.clickable').forEach(t => {
                t.classList.remove('active');
            });
            
            // Toggle current category
            if (categoryItems.classList.contains('collapsed')) {
                categoryItems.classList.remove('collapsed');
                categoryItems.classList.add('active');
                this.classList.add('active');
                toggleIcon.style.transform = 'rotate(180deg)';
            } else {
                categoryItems.classList.add('collapsed');
                categoryItems.classList.remove('active');
                this.classList.remove('active');
                toggleIcon.style.transform = 'rotate(0deg)';
            }
        });
    });

    // Check URL parameters for category filter on page load
    function checkURLParameters() {
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        
        if (category) {
            // Find and check the corresponding checkbox
            const checkbox = document.querySelector(`input[value="${category}"]`);
            if (checkbox) {
                checkbox.checked = true;
                
                // Determine which category section this belongs to
                const categoryKeywords = {
                    'ao-polo': 'quan-ao', 'ao-thun': 'quan-ao', 'ao-somi': 'quan-ao', 
                    'ao-khoac': 'quan-ao', 'ao-tanktop': 'quan-ao', 'ao-hoodies': 'quan-ao',
                    'quan-jean': 'quan-ao', 'quan-tay': 'quan-ao', 'quan-short': 'quan-ao', 
                    'quan-jogger': 'quan-ao', 'quan-boxer': 'quan-ao',
                    'giay': 'phu-kien', 'balo-tui': 'phu-kien', 'non': 'phu-kien', 
                    'that-lung': 'phu-kien', 'kinh-mat': 'phu-kien'
                };
                
                const sectionType = categoryKeywords[category];
                if (sectionType) {
                    // Open the appropriate category section
                    const categoryItems = document.getElementById(sectionType + '-items');
                    const categoryTitle = document.querySelector(`[data-category="${sectionType}"]`);
                    const toggleIcon = categoryTitle.querySelector('.toggle-icon');
                    
                    if (categoryItems && categoryTitle) {
                        categoryItems.classList.remove('collapsed');
                        categoryItems.classList.add('active');
                        categoryTitle.classList.add('active');
                        toggleIcon.style.transform = 'rotate(180deg)';
                    }
                }
                
                // Trigger the category filter
                checkbox.dispatchEvent(new Event('change'));
            }
        }
    }

    // Call the function when page loads
    checkURLParameters();
});
