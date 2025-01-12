<?php
// Kết nối tới cơ sở dữ liệu
$servername = "127.0.0.1:4306";
$username = "root"; // Thay bằng username của bạn
$password = ""; // Thay bằng mật khẩu của bạn
$dbname = "unitop-store-data"; // Tên database

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra mật khẩu và xác nhận mật khẩu
    if ($password !== $confirm_password) {
        echo "Mật khẩu xác nhận không khớp!";
        exit;
    }

    // Mã hóa mật khẩu trước khi lưu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Thêm dữ liệu vào bảng "users"
    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công!";
        // Điều hướng sau khi đăng ký thành công (tùy chỉnh URL)
        header("Location: /views/use/truyen.html");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
