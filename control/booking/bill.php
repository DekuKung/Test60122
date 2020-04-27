<?php
session_start();
include '../connect/condb.php';

$id = $_POST["id"];
$sql = "UPDATE `booking` SET `bill_id`= 2 WHERE Bo_id = '".$id."' ";
$sqlcheck = "SELECT * FROM booking_detail WHERE Bo_id = '".$id."' ";
$querycheck = $condb->query($sqlcheck);
while ($resultcheck = mysqli_fetch_array($querycheck, MYSQLI_ASSOC)){
$sqlstck = "SELECT * FROM stock_product WHERE id = '".$resultcheck["P_id"]."' ";
$querystck = $condb->query($sqlstck);
$rowstck = mysqli_fetch_array($querystck, MYSQLI_ASSOC);
if($resultcheck["Bo_amount"] > $rowstck["amount"]){
    $msg = $rowstck["name"]." จำนวนสินค้าในระบบไม่เพียงพอ";
    echo "<script>";
    echo "alert('$msg');";
    echo "window.location='../../page/member/bill/Main.php';";
    echo "</script>";
    exit();
}
else {
    $update = "UPDATE `stock_product` SET `amount`= (`amount` - '".$resultcheck["Bo_amount"]."') WHERE id = '".$resultcheck["P_id"]."' ";
    $qupdate = $condb->query($qupdate);
}
}
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