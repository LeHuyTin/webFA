<?php

?>

<div class="policy-container">
    <div class="policy-sidebar">
        <button class="active" onclick="showPolicy('baomat', this)">Chính sách bảo mật</button>
        <button onclick="showPolicy('doitra', this)">Chính sách đổi trả</button>
        <button onclick="showPolicy('vanchuyen', this)">Chính sách vận chuyển</button>
    </div>
    <div class="policy-content">
        <div id="baomat" class="policy-section">
            <h2>Chính sách bảo mật</h2>
            <p>FA-shion shop cam kết bảo mật tuyệt đối thông tin cá nhân của khách hàng. Mọi thông tin thu thập chỉ dùng cho mục đích giao dịch, chăm sóc khách hàng và nâng cao chất lượng dịch vụ. Chúng tôi không chia sẻ, bán hoặc trao đổi thông tin cá nhân của bạn cho bên thứ ba vì mục đích thương mại.</p>
            <ul>
                <li>Thông tin khách hàng được mã hóa và lưu trữ an toàn.</li>
                <li>Chỉ sử dụng thông tin cho các hoạt động liên quan đến mua bán, giao hàng, chăm sóc khách hàng.</li>
                <li>Khách hàng có quyền yêu cầu chỉnh sửa hoặc xóa thông tin cá nhân bất cứ lúc nào.</li>
            </ul>
        </div>
        <div id="doitra" class="policy-section" style="display:none;">
            <h2>Chính sách đổi trả</h2>
            <p>Khách hàng có thể đổi trả sản phẩm trong vòng 7 ngày kể từ khi nhận hàng nếu sản phẩm bị lỗi do nhà sản xuất hoặc giao nhầm. Sản phẩm đổi trả phải còn nguyên tem, nhãn mác, chưa qua sử dụng và có hóa đơn mua hàng.</p>
            <ul>
                <li>Liên hệ bộ phận CSKH để được hướng dẫn đổi trả.</li>
                <li>Không áp dụng đổi trả với sản phẩm giảm giá, quà tặng.</li>
                <li>Phí vận chuyển đổi trả sẽ do FA-shion shop hoặc khách hàng chịu tùy trường hợp cụ thể.</li>
            </ul>
        </div>
        <div id="vanchuyen" class="policy-section" style="display:none;">
            <h2>Chính sách vận chuyển</h2>
            <p>FA-shion shop giao hàng toàn quốc với nhiều lựa chọn đơn vị vận chuyển. Thời gian giao hàng từ 2-5 ngày làm việc tùy khu vực. Phí vận chuyển sẽ được thông báo trước khi xác nhận đơn hàng.</p>
            <ul>
                <li>Miễn phí vận chuyển cho đơn hàng từ 500.000đ trở lên.</li>
                <li>Hỗ trợ kiểm tra hàng trước khi thanh toán.</li>
                <li>Khách hàng vui lòng cung cấp địa chỉ, số điện thoại chính xác để nhận hàng nhanh chóng.</li>
            </ul>
        </div>
    </div>
</div>
<script>
function showPolicy(id, btn) {
    document.querySelectorAll('.policy-section').forEach(e => e.style.display = 'none');
    document.getElementById(id).style.display = 'block';
    document.querySelectorAll('.policy-sidebar button').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
}
</script>
