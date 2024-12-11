<?php
// Kết nối cơ sở dữ liệu
include 'db_connection.php';

// Khởi tạo biến tìm kiếm
$search = '';

// Kiểm tra xem người dùng có nhập từ khóa tìm kiếm hay không
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Câu truy vấn SQL để tìm kiếm sinh viên theo tên hoặc quê quán
$sql = "SELECT * FROM table_Students WHERE fullname LIKE '%$search%' OR hometown LIKE '%$search%'";

// Thực hiện truy vấn
$result = $conn->query($sql);

// Kiểm tra nếu truy vấn gặp lỗi
if (!$result) {
    echo "Lỗi: " . $conn->error;
    exit;
}

// Hàm chuyển đổi giới tính
function genderToString($gender) {
    return $gender == 1 ? 'Nam' : 'Nữ';
}

// Hàm chuyển đổi trình độ
function levelToString($level) {
    switch ($level) {
        case 0: return 'Tiến sĩ';
        case 1: return 'Thạc sĩ';
        case 2: return 'Kỹ sư';
        case 3: return 'Khác';
        default: return 'Không xác định';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div class="container">
    <h1>Danh sách sinh viên</h1>

    <!-- Nút Thêm Sinh viên mới -->
    <a href="add_student.php" class="btn">Thêm sinh viên mới</a>

    <!-- Nút về trang chủ -->
    <a href="index.php" class="btn home-btn">Về trang chủ</a>

    <!-- Form tìm kiếm -->
    <form method="GET" action="index.php">
        <label for="search">Tìm kiếm:</label>
        <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Tìm</button>
    </form>

    <!-- Bảng danh sách sinh viên -->
    <table>
        <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ</th>
            <th>Nhóm</th>
            <th>Hành động</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['fullname']) ?></td>
                    <td><?= htmlspecialchars($row['dob']) ?></td>
                    <td><?= genderToString($row['gender']) ?></td>
                    <td><?= htmlspecialchars($row['hometown']) ?></td>
                    <td><?= levelToString($row['level']) ?></td>
                    <td>Nhóm <?= htmlspecialchars($row['group_id']) ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $row['id'] ?>">Sửa</a>
                        <a href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="no-results">Không tìm thấy sinh viên nào phù hợp.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>
