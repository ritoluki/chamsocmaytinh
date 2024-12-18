<?php
include "ketnoi.php";

if(isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE sudungdichvu SET thanhtoan=$status WHERE id_sudungdichvu=$id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }

    mysqli_close($conn);
}
?>
