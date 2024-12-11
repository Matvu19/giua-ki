<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv_tms";

// Kết nối đến cơ sở dữ liệu MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

