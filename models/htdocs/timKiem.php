<?php
$servername = "localhost";
$username = "root";
$password = "Loclocloc1@";
$database = "webtruyen";
$conn = new mysqli($servername, $username, $password, $database);

// Nhận giá trị từ form
if (isset($_GET['search'])) {
    $search = strtolower(trim($_GET['search'])); // Chuyển về chữ thường và bỏ khoảng trắng

    // Kiểm tra từ khóa và chuyển hướng
    if ($search === 'chí phèo'|| $search === 'nam cao'|| $search === 'chí ') {
        header("Location: /views/use/chi-pheo.html");
        exit();
    }elseif ($search === 'solo leveling') {
        header("Location: /views/use/solo-leveling.html");
        exit();
    }else {
        // Nếu không tìm thấy, chuyển hướng đến một trang thông báo
        header("Location: /views/use/khong-tim-thay.html");
        exit();
    }
    
} else {
    // Nếu không có từ khóa, quay lại trang tìm kiếm
    header("Location: /views/use/truyen.html");
    exit();
}
?>
