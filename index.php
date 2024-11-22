<?php
$products = [
    ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 1000],
    ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 2000],
    ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 3000],
];

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Thanh điều hướng -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Administration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang ngoài</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Thể loại</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tác giả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bài viết</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Phần quản lý sản phẩm -->
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
                <td><?php echo $product['name']; ?></td>
                <td><?php echo number_format($product['price'], 0, ',', '.') . ' VND'; ?></td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil"></i> <!-- Bootstrap icon for edit -->
                    </a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> <!-- Bootstrap icon for delete -->
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="text-center mt-4 ">
    <h3>TLU'S MUSIC GARDEN</h3>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
