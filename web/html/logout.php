<?php
// Bắt đầu hoặc tiếp tục phiên làm việc
session_start();

$_SESSION = array();

session_destroy();

header("Location: login.php");
exit();
?>