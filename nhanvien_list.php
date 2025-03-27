<?php
include 'config.php';


$query = "SELECT * FROM NHANVIEN";
$stmt = $conn->query($query);
$nhanviens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Nhân Viên</title>
    <link rel="stylesheet" href="styles.css"> <!-- Gọi file CSS -->
</head>
<body>

<div class="container">
    <h2>Danh Sách Nhân Viên</h2>
    <a href="nhanvien_add.php" class="btn-add">➕ Thêm Nhân Viên</a>

    <table>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
            <th>Action</th>
        </tr>
        <?php foreach ($nhanviens as $nv): ?>
            <tr>
                <td><?= $nv['Ma_NV'] ?></td>
                <td><?= $nv['Ten_NV'] ?></td>
                <td>
                    <img src="images/<?= ($nv['Phai'] == 'NU') ? 'woman.jpg' : 'man.jpg' ?>" class="avatar">
                </td>
                <td><?= $nv['Noi_Sinh'] ?></td>
                <td><?= $nv['Ma_Phong'] ?></td>
                <td><?= number_format($nv['Luong']) ?> VNĐ</td>
                <td>
                    <a href="nhanvien_edit.php?Ma_NV=<?= $nv['Ma_NV'] ?>" class="btn-edit">✏️</a>
                    <a href="nhanvien_delete.php?Ma_NV=<?= $nv['Ma_NV'] ?>" class="btn-delete" onclick="return confirm('Xác nhận xóa?')">🗑️</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
