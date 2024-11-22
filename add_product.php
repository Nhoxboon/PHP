<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    // Đọc danh sách sản phẩm từ file JSON
    $file = 'products.json';
    $products = [];
    if (file_exists($file)) {
        $products = json_decode(file_get_contents($file), true);
    }

    // Tạo ID tự động cho sản phẩm mới
    $newId = end($products)['id'] ?? 0;
    $newId++;

    // Thêm sản phẩm mới vào danh sách
    $products[] = [
        'id' => $newId,
        'name' => $name,
        'price' => (int)$price,
    ];

    // Ghi lại danh sách sản phẩm vào file JSON
    file_put_contents($file, json_encode($products));

    // Chuyển hướng về trang index
    header('Location: index.php');
    exit();
}
?>

<div class="container my-4">
    <h1>Thêm sản phẩm mới</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá tiền</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        <a href="index.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
