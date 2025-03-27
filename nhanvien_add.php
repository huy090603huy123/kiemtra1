<!DOCTYPE html>
<html>
<head>
    <title>Thêm Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="nhanvien_action.php" method="POST">
            <label for="Ma_NV">Mã Nhân Viên:</label>
            <input type="text" id="Ma_NV" name="Ma_NV" required><br>

            <label for="Ten_NV">Tên Nhân Viên:</label>
            <input type="text" id="Ten_NV" name="Ten_NV" required><br>

            <label for="Phai">Giới tính:</label>
            <select id="Phai" name="Phai">
                <option value="NAM">Nam</option>
                <option value="NU">Nữ</option>
            </select><br>

            <label for="Noi_Sinh">Nơi Sinh:</label>
            <input type="text" id="Noi_Sinh" name="Noi_Sinh" required><br>

            <label for="Ma_Phong">Tên Phòng:</label>
            <input type="text" id="Ma_Phong" name="Ma_Phong" required><br>

            <label for="Luong">Lương:</label>
            <input type="number" id="Luong" name="Luong" required><br>

            <button type="submit" name="add">Thêm Nhân Viên</button>
            <a href="nhanvien_list.php" class="btn-back">Quay Lại</a>
        </form>
    </div>
</body>
</html>