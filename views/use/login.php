<?php
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "unitop-store-data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT fullname, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = $user['password']; // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
    
        // Kiểm tra mật khẩu người dùng nhập vào có đúng không
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: /views/use/truyenDaDangNhap.html");
            exit;
        } else {
            echo '<a href="/views/use/truyen.html">Trang Chủ</a> ';
            echo "<br> Sai mật khẩu!";  
        }
    } else {
        echo '<a href="/views/use/truyen.html">Trang Chủ</a> ';
        echo "<br> Email không tồn tại!";  
    }
    
    
    $stmt->close();
    
}

$conn->close();
?>
