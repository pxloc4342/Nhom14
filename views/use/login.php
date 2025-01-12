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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra email có tồn tại không
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy dữ liệu người dùng
        $user = $result->fetch_assoc();

        // So sánh mật khẩu
        if (password_verify($password, $user['password'])) {
            // Khởi tạo session sau khi đăng nhập thành công
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: /dashboard.php"); // Điều hướng đến trang dashboard
            exit;
        } else {
            echo "<script>alert('Sai mật khẩu!');</script>";
        }
    } else {
        echo "<script>alert('Email không tồn tại!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
