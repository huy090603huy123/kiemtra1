<?php
include 'config.php';



if (isset($_POST['add'])) {
    $stmt = $conn->prepare("INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['Ma_NV'], $_POST['Ten_NV'], $_POST['Phai'], $_POST['Noi_Sinh'], $_POST['Ma_Phong'], $_POST['Luong']]);
    header("Location: nhanvien_list.php");
}

if (isset($_POST['edit'])) {
    $stmt = $conn->prepare("UPDATE NHANVIEN SET Ten_NV=?, Phai=?, Noi_Sinh=?, Ma_Phong=?, Luong=? WHERE Ma_NV=?");
    $stmt->execute([$_POST['Ten_NV'], $_POST['Phai'], $_POST['Noi_Sinh'], $_POST['Ma_Phong'], $_POST['Luong'], $_POST['Ma_NV']]);
    header("Location: nhanvien_list.php");
}
?>
