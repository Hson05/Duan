<?php
session_start();
include "../models/config.php";
include "../models/sanpham.php";
include "../models/danhmuc.php";
    include "header.php";

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch ($act) {
            case 'themdm':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $ten_danh_muc=$_POST['ten_danh_muc'];
                    them_danh_muc($ten_danh_muc);
                    $thongbao='Thêm thành công';
                }
                include "danhmuc/themdm.php";
                break;
            case 'hienthidm':
                $listdanh_muc=loadall_danh_muc();
                include "danhmuc/hienthidm.php";
                break;


            // Khoa làm Sản Phẩm //
            case 'themsp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $id_danh_muc = $_POST['id_danh_muc'];
                    $ten_san_pham = $_POST['ten_san_pham'];
                    $hinh = $_FILES['hinh']['name'];
                    $mo_ta = $_POST['mo_ta'];
                    $gia = $_POST['gia'];
                    $target_dir = "../images/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
            
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        them_san_pham($ten_san_pham, $hinh, $mo_ta, $gia, $id_danh_muc);
                        $thongbao = 'Thêm thành công';
                    } else {
                        $thongbao = 'Lỗi khi tải ảnh lên.';
                    }
                }
                $listdanh_muc = loadall_danh_muc();
                include "sanpham/themsp.php";
                break;
            case 'hienthisp':
                if(isset($_POST['listok'])&&($_POST['listok'])){
                    $kyw=$_POST['kyw'];
                    $id_danh_muc=$_POST['id_danh_muc'];
                }
                else{
                    $kyw='';
                    $id_danh_muc=0;
                }
                $listdanh_muc=loadall_danh_muc();
                $listsan_pham=loadall_san_pham($kyw,$id_danh_muc);
                include "sanpham/hienthisp.php";
                break;
                case 'xoasp':
                    if (isset($_GET['id_san_pham']) && ($_GET['id_san_pham'] > 0)) {
                        delete_san_pham($_GET['id_san_pham']);
                        $thongbao = "Xóa thành công!";
                    } else {
                        $thongbao = "ID sản phẩm không hợp lệ!";
                    }
                    $listsan_pham = loadall_san_pham();
                    include "sanpham/hienthisp.php";
                    break;
                
            case 'suasp':
                    if(isset($_GET['id_san_pham'])&&($_GET['id_san_pham']>0)){
                    $sanpham=loadone_san_pham($_GET['id_san_pham']);
                    }
                    $listdanh_muc=loadall_danh_muc();
                    include "sanpham/suasp.php";
                    break;
            case 'sua':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                $id_san_pham = $_POST['id_san_pham'];
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $mo_ta = $_POST['mo_ta'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'],$target_file)) {
                    echo "Cập nhật thành công";
                }
                else{
                }
                    update_san_pham($id_san_pham,$id_danh_muc,$ten_san_pham,$gia,$mo_ta,$hinh);
                    $thongbao='Cập nhật thành công';
                }
                $listsan_pham=loadall_san_pham();
                $listdanh_muc=loadall_danh_muc();
                include "sanpham/hienthisp.php";
                break;
                
                    
                    
            default:
                include "home.php";
                break;
        }
    }
    else{
        include "home.php";
    }
    include "footer.php"
?>