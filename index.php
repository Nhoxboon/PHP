<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<?php include 'header.php'; ?>

<?php
// Đọc danh sách sản phẩm từ file JSON
$file = 'products.json';
$products = [];
if (file_exists($file)) {
    $products = json_decode(file_get_contents($file), true);
}

// Kiểm tra yêu cầu xóa sản phẩm
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    // Lọc bỏ sản phẩm có id bằng với delete_id
    $products = array_filter($products, function ($product) use ($delete_id) {
        return $product['id'] !== $delete_id;
    });
    // Lưu danh sách sản phẩm mới vào file JSON
    file_put_contents($file, json_encode(array_values($products), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    // Chuyển hướng lại trang index để tránh lỗi khi reload
    header('Location: index.php');
    exit();
}
?>

<!-- Quản lý sản phẩm -->
<div class="container my-4">
    <h1 class="mb-3">Quản lý sản phẩm</h1>
    <a href="./add_product.php" class="btn btn-success mb-3">Thêm mới</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Giá thành</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo number_format($product['price'], 0, ',', '.') . ' VND'; ?></td>
                <td>
                    <a href="edit_product.php?edit_id=<?php echo $product['id']; ?>" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>

                <td>
                    <!-- Gửi yêu cầu xóa với id của sản phẩm -->
                    <a href="index.php?delete_id=<?php echo $product['id']; ?>"
                       class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
