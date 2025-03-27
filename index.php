<?php
session_start();
include 'config.php';

// Kiểm tra nếu người dùng nhấn logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Số nhân viên trên mỗi trang
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Lấy danh sách nhân viên với tên phòng ban
$query = "SELECT NHANVIEN.*, PHONGBAN.Ten_Phong FROM NHANVIEN 
          JOIN PHONGBAN ON NHANVIEN.Ma_Phong = PHONGBAN.Ma_Phong 
          LIMIT :start, :limit";
$stmt = $conn->prepare($query);
$stmt->bindValue(':start', $start, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$nhanviens = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Tính tổng số trang
$totalQuery = "SELECT COUNT(*) FROM NHANVIEN";
$totalStmt = $conn->query($totalQuery);
$totalRows = $totalStmt->fetchColumn();
$totalPages = ceil($totalRows / $limit);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            padding: 10px 15px;
            margin: 5px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách nhân viên</h2>
        <a href="?logout=true" class="logout">Đăng xuất</a>
        <table>
            <tr>
                <th>Mã NV</th>
                <th>Tên NV</th>
                <th>Giới tính</th>
                <th>Nơi sinh</th>
                <th>Phòng ban</th>
                <th>Lương</th>
            </tr>
            <?php foreach ($nhanviens as $nv): ?>
                <tr>
                    <td><?= $nv['Ma_NV'] ?></td>
                    <td><?= $nv['Ten_NV'] ?></td>
                    <td>
                        <img src="images/<?= ($nv['Phai'] == 'NU') ? 'woman.jpg' : 'man.jpg' ?>" alt="gender">
                    </td>
                    <td><?= $nv['Noi_Sinh'] ?></td>
                    <td><?= $nv['Ten_Phong'] ?></td>
                    <td><?= number_format($nv['Luong']) ?> VNĐ</td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>">Trang <?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>