<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM table_students WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không tìm thấy sinh viên cần xóa.";
}
?>
