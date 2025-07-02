// Demo: xác nhận xóa sản phẩm
const cartList = document.querySelector('.cart-list');
if (cartList) {
  cartList.addEventListener('click', function(e) {
    if (e.target.classList.contains('cart-remove')) {
      if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
        // Xóa sản phẩm (demo)
        e.target.closest('.cart-item').remove();
        // TODO: cập nhật lại tổng tiền và danh sách bên phải
      }
    }
  });
}
// Demo: cập nhật tổng tiền khi check/uncheck sản phẩm
const cartChecks = document.querySelectorAll('.cart-check');
cartChecks.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    // TODO: cập nhật lại tổng tiền và danh sách bên phải
  });
});
// Demo: cập nhật tổng tiền khi thay đổi số lượng
const qtyInputs = document.querySelectorAll('.cart-qty input[type="number"]');
qtyInputs.forEach(function(input) {
  input.addEventListener('change', function() {
    // TODO: cập nhật lại tổng tiền và danh sách bên phải
  });
});
// Demo: cập nhật tổng tiền khi thay đổi size
const sizeSelects = document.querySelectorAll('.cart-size select');
sizeSelects.forEach(function(select) {
  select.addEventListener('change', function() {
    // TODO: cập nhật lại tổng tiền và danh sách bên phải
  });
});
// Demo: nút Mua ngay
const checkoutBtn = document.querySelector('.checkout-btn');
if (checkoutBtn) {
  checkoutBtn.addEventListener('click', function() {
    alert('Chức năng mua hàng sẽ được xử lý ở backend!');
  });
}
