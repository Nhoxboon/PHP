<main>
    <div class="linear-gradient" style="background: linear-gradient(0,#ffffff,gray); height: 2rem;"></div>
    <div class="container-header">
        <div class="content-header d-flex justify-content-between p-3 mb-2 bg-primary text-white">
            <h3 class="text-uppercase">quản lý <strong>nhân viên</strong></h3>
            <div class="button-option">
                <button class="btn btn-danger" type="button"><i class="bi bi-dash-circle me-2"></i>Xóa</button>
                <button type="button" class="btn btn-success"><i class="bi bi-plus-square-fill me-2"></i>Thêm nhân viên</button>
            </div>
        </div>
    </div>
    <div class="p-3">
        <div class="row border-top border-bottom pb-3 pt-3 mb-2">
            <div class="col"><input type="checkbox" id="main-checkbox"></div>
            <div class="col"><label for="">Ho và Tên</label></div>
            <div class="col"><label for="">Thư điện tử</label></div>
            <div class="col"><label for="">Địa chỉ</label></div>
            <div class="col"><label for="">Số điện thoại</label></div>
            <div class="col"><label for="">Hành động</label></div>
        </div>
        <div>
            <?php
            $employees = [
                ['name' => 'Nguyễn Văn Ánh', 'email' => 'ngvana@example.com', 'address' => 'Hà Nội, Việt Nam', 'phone' => '0123456789'],
                ['name' => 'Trần Thị Bảo', 'email' => 'tranthib@example.com', 'address' => 'Hồ Chí Minh, Việt Nam', 'phone' => '0987654321'],
                ['name' => 'Lê Văn Luyện', 'email' => 'levanc@example.com', 'address' => 'Đà Nẵng, Việt Nam', 'phone' => '0123456789'],
                ['name' => 'Phạm Thị Dung', 'email' => 'phamthid@example.com', 'address' => 'Cần Thơ, Việt Nam', 'phone' => '0987654321'],
                ['name' => 'Đặng Văn Dũng', 'email' => 'dangvane@example.com', 'address' => 'Hải Phòng, Việt Nam', 'phone' => '0123456789'],
            ];
            ?>
            <?php foreach ($employees as $employee): ?>
                <div class="row border-top border-bottom pb-2 pt-2">
                    <div class="col"><input type="checkbox"></div>
                    <div class="col"><label><?= htmlspecialchars($employee['name']) ?></label></div>
                    <div class="col"><label><?= htmlspecialchars($employee['email']) ?></label></div>
                    <div class="col"><label><?= htmlspecialchars($employee['address']) ?></label></div>
                    <div class="col"><label><?= htmlspecialchars($employee['phone']) ?></label></div>
                    <div class="col">
                        <i class="bi bi-pencil" style="cursor: pointer;" title="Chỉnh sửa"></i>
                        <i class="bi bi-trash3" style="cursor: pointer;" title="Xóa"></i>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
