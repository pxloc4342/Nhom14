<?php
session_start();
if (isset($_SESSION['fullname'])) {
    session_destroy();
    header("Location: /views/use/truyen.html"); // Chuyển hướng sau khi đăng xuất
    exit();
} else {
    header("Location: /views/use/truyen.html"); // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    exit();
}
?>
