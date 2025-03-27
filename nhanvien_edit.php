<?php
include 'config.php';

if (isset($_GET['Ma_NV'])) {
    $Ma_NV = $_GET['Ma_NV'];
    $stmt = $conn->prepare("SELECT * FROM NHANVIEN WHERE Ma_NV = ?");
    $stmt->execute([$Ma_NV]);
    $nhanvien = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Nhân Viên</title>
    <link rel="stylesheet" href="styles.css"> <!-- Kết nối với CSS -->
</head>
<body>

<div class="edit-container">
    <h2>Chỉnh Sửa Nhân Viên</h2>

    <form action="nhanvien_action.php" method="POST">
        <input type="hidden" name="Ma_NV" value="<?= $nhanvien['Ma_NV'] ?>">

        <label>Tên Nhân Viên:</label>
        <input type="text" name="Ten_NV" value="<?= $nhanvien['Ten_NV'] ?>" required>

        <label>Giới tính:</label>
        <select name="Phai">
            <option value="NAM" <?= $nhanvien['Phai'] == 'NAM' ? 'selected' : '' ?>>Nam</option>
            <option value="NU" <?= $nhanvien['Phai'] == 'NU' ? 'selected' : '' ?>>Nữ</option>
        </select>

        <label>Nơi Sinh:</label>
        <input type="text" name="Noi_Sinh" value="<?= $nhanvien['Noi_Sinh'] ?>" required>

        <label>Tên Phòng:</label>
        <input type="text" name="Ma_Phong" value="<?= $nhanvien['Ma_Phong'] ?>" required>

        <label>Lương:</label>
        <input type="number" name="Luong" value="<?= $nhanvien['Luong'] ?>" required>

        <button type="submit" name="edit">Cập Nhật</button>
        <a href="nhanvien_list.php" class="btn-back">Quay Lại</a>
    </form>
</div>

</body>
</html>
