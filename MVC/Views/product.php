<h1>Danh sách sản phẩm</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->getId(); ?></td>
                <td><?php echo $product->getName(); ?></td>
                <td><?php echo $product->getPrice(); ?></td>
                <td><?php echo $product->getDescription(); ?></td>
                <td><?php echo $product->getImage(); ?></td>
                <td><?php echo $product->getCategory()->getName(); ?></td>
                <td><?php echo $product->getCreatedAt(); ?></td>
                <td><?php echo $product->getUpdatedAt(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>