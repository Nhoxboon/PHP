<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Đọc danh sách sản phẩm từ file JSON
$file = 'products.json';
$products = [];
if (file_exists($file)) {
    $products = json_decode(file_get_contents($file), true);
}

// Lấy thông tin sản phẩm cần sửa từ URL
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $product = array_filter($products, fn($p) => $p['id'] === $edit_id);
    $product = reset($product); // Lấy sản phẩm đầu tiên trong kết quả
    if (!$product) {
        die('Sản phẩm không tồn tại.');
    }
} else {
    die('Không tìm thấy ID sản phẩm.');
}

// Cập nhật sản phẩm khi gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = intval($_POST['price'] ?? 0);

    // Tìm và cập nhật sản phẩm trong danh sách
    foreach ($products as &$p) {
        if ($p['id'] === $edit_id) {
            $p['name'] = $name;
            $p['price'] = $price;
            break;
        }
    }

    // Lưu lại danh sách sản phẩm vào file JSON
    file_put_contents($file, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: index.php');
    exit();
}
?>

<div class="container my-5">
    <h1 class="mb-4">Sửa sản phẩm</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price"
                   value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="index.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
