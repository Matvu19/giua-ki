<?php
include 'db_connection.php';

if (!isset($_GET['id'])) {
    die("Không tìm thấy sinh viên cần sửa.");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM table_students WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Không tìm thấy sinh viên.");
}

$student = $result->fetch_assoc();

// Xử lý khi người dùng nhấn nút lưu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $group_id = $_POST['group_id'];

    $sql = "UPDATE table_students 
            SET fullname = '$fullname', dob = '$dob', gender = $gender, 
                hometown = '$hometown', level = $level, group_id = $group_id 
            WHERE id = $id";

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
    <title>Sửa thông tin sinh viên</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Sửa thông tin sinh viên</h1>
    <form method="POST">
        <label>Họ và tên:
            <input type="text" name="fullname" value="<?= htmlspecialchars($student['fullname']) ?>" required>
        </label><br>
        <label>Ngày sinh:
            <input type="date" name="dob" value="<?= htmlspecialchars(substr($student['dob'], 0, 10)) ?>" required>
        </label><br>
        <label>Giới tính:
            <input type="radio" name="gender" value="1" <?= $student['gender'] == 1 ? 'checked' : '' ?>> Nam
            <input type="radio" name="gender" value="0" <?= $student['gender'] == 0 ? 'checked' : '' ?>> Nữ
        </label><br>
        <label>Quê quán:
            <input type="text" name="hometown" value="<?= htmlspecialchars($student['hometown']) ?>" required>
        </label><br>
        <label>Trình độ:
            <select name="level">
                <option value="0" <?= $student['level'] == 0 ? 'selected' : '' ?>>Tiến sĩ</option>
                <option value="1" <?= $student['level'] == 1 ? 'selected' : '' ?>>Thạc sĩ</option>
                <option value="2" <?= $student['level'] == 2 ? 'selected' : '' ?>>Kỹ sư</option>
                <option value="3" <?= $student['level'] == 3 ? 'selected' : '' ?>>Khác</option>
            </select>
        </label><br>
        <label>Nhóm:
            <input type="number" name="group_id" value="<?= htmlspecialchars($student['group_id']) ?>" min="1" required>
        </label><br>
        <button type="submit">Lưu</button>
    </form>
    <a href="index.php">Quay lại danh sách</a>
</div>
</body>
</html>
