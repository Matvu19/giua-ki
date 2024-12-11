<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group_id = $_POST['group_id'];

    $sql = "INSERT INTO table_students (fullname, dob, gender, hometown, level, group_id)
            VALUES ('$fullname', '$dob', $gender, '$hometown', $level, $group_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Thêm sinh viên mới</h1>
    <form method="POST">
        <label>Họ và tên:
            <input type="text" name="fullname" required>
        </label><br>
        <label>Ngày sinh:
            <input type="date" name="dob" required>
        </label><br>
        <label>Giới tính:
            <input type="radio" name="gender" value="1" required> Nam
            <input type="radio" name="gender" value="0" required> Nữ
        </label><br>
        <label>Quê quán:
            <input type="text" name="hometown" required>
        </label><br>
        <label>Trình độ:
            <select name="level" required>
                <option value="0">Tiến sĩ</option>
                <option value="1">Thạc sĩ</option>
                <option value="2">Kỹ sư</option>
                <option value="3">Khác</option>
            </select>
        </label><br>
        <label>Nhóm:
            <input type="number" name="group_id" min="1" required>
        </label><br>
        <button type="submit">Lưu</button>
    </form>
    <a href="index.php">Quay lại danh sách</a>
</div>
</body>
</html>
