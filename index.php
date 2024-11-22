<?php

session_start();
include "models/config.php";
include "models/taikhoan.php";
include "views/header.php"; // Đưa header vào đầu

// Xử lý đăng xuất
if (isset($_GET['act']) && $_GET['act'] == 'dangxuat') {
    session_unset();  // Xóa tất cả các biến session
    session_destroy(); // Hủy session
    header("Location: index.php"); // Chuyển hướng về trang chủ
    exit();
}

// Kiểm tra xem có hoạt động nào được truyền vào qua GET hay không
if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];

                try {
                    // Gọi hàm dangky để thêm tài khoản
                    dangky($ten_dang_nhap, $email, $mat_khau);
                    $thongbao = "Đăng ký thành công!";
                } catch (Exception $e) {
                    $thongbao = "Đăng ký thất bại: " . $e->getMessage();
                }
            }
            include "views/dangky.php"; // Hiển thị form đăng ký
            break;
            case 'home2':
                include "views/home2.php"; // Hiển thị trang chủ 2
                break;
            case 'nam':
                include "views/nam.php"; // Hiển thị san pham nam
                break;
            case 'nu':
                include "views/nu.php"; // Hiển thị san pham nữ
                break;
            
            
                // case 'dangnhap':
            //     if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
            //         $ten_dang_nhap=$_POST['ten_dang_nhap'];
            //         $mat_khau=$_POST['mat_khau'];
            //         $checkuser=check_user($ten_dang_nhap, $mat_khau);
            //         if(is_array($checkuser)){
            //             $_SESSION['ten_dang_nhap']=$checkuser;
            //             // $thongbao="Đăng nhập thành công !";
            //             header('Location:index.php');
            //     }else{
            //         $thongbao="Sai tài khoản hoặc mật khẩu ! <br> Bạn có thể đăng ký.";
                    
            //     }
            //     }
                
            //     include "views/dangnhap.php";
            //     break;
            // case 'thoat':
            // session_unset();
            // header('Location:index.php');
            // break;

        default:
            include "views/home.php"; // Hiển thị trang chủ khi không có hành động nào
            break;
    }
} else {
    include "views/home.php"; // Hiển thị trang chủ mặc định
}

include "views/footer.php"; // Đưa footer vào cuối trang
?>
