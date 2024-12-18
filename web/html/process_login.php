<?php 
session_start(); 
include "ketnoi.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=Tài khoản không được để trống");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Mật khẩu không được để trống");
	    exit();
	}else{
		$sql = "SELECT * FROM taikhoannhanvien WHERE taikhoan='$uname' AND matkhau='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['taikhoan'] === $uname && $row['matkhau'] === $pass) {
            	$_SESSION['taikhoan'] = $row['taikhoan'];
            	$_SESSION['idnv'] = $row['idnv'];
				$_SESSION['logged_in'] = true;
            	header("Location: admin.php"); //sửa link dẫn admin.php ở đây 
		        exit();
            }else{
				header("Location: login.php?error=Tài khoản hoặc mật khẩu không đúng");
		        exit();
			}
		}else{
			header("Location: login.php?error=Tài khoản hoặc mật khẩu không đúng");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}