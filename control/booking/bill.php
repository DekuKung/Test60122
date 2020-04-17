<?php
session_start();
include '../connect/condb.php';

$id = $_POST["id"];
$sql = "UPDATE `booking` SET `bill_id`= 2 WHERE id = '".$id."' ";
// echo $sql;
$query = $condb->query($sql);
if($query){
    $mes = "พนักงานแจ้งชำระเงิน รหัส นี้เสร็จสิ้น";
    echo "<script>";
    echo "alert('$mes');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>"; 
}
else {
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>"; 
}

?>