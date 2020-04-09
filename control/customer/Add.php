<?php
include '../connect/condb.php';

$name = $_POST["name"];
$add = $_POST["add"];
$tel = $_POST["tel"];

// echo $name;
// echo $add;
// echo $tel;

$sql = "INSERT INTO `customer`(`id`, `C_name`, `C_add`, `C_tel`) 
                       VALUES (null, '".$name."', '".$add."', '".$tel."')";
// echo $sql;
$query = $condb->query($sql);
if($query)
{
    echo "";
    echo "<script>";
    echo "alert('เพิ่มข้อมูลลูกค้าเสร็จสิ้น');";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}
else
{
    echo "";
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มข้อมูลลูกค้าได้');";
    echo "window.location='../../page/admin/customer/Main.php';";
    echo "</script>";
}

?>