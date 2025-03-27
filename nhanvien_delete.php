<?php
include 'config.php';

session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Bạn không có quyền truy cập!'); window.location.href='page=nhanvien_list';</script>";
    exit();
}


if (isset($_GET['Ma_NV'])) {
    $Ma_NV = $_GET['Ma_NV'];
    $stmt = $conn->prepare("DELETE FROM NHANVIEN WHERE Ma_NV = ?");
    $stmt->execute([$Ma_NV]);
    header("Location: nhanvien_list.php");
}
?>
