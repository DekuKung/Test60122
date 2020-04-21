<?php
session_start();
error_reporting(0);
include '../connect/condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;

$cid = "SELECT * FROM buy";
$q = $condb->query($cid);
$result = mysqli_fetch_array($q, MYSQLI_ASSOC);
echo $result["id"];
if($result["id"] == 0){
  $count = 1;
  // echo $count;
}else{
  $count = $result["id"]+1;
  // echo $count;
}

if(isset($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                $total_buy += $item["price"];
                $id = $item["id"];
$pname = $item["name"];
$quantity = $item["quantity"];
$price = $item["price"];
$total_amount += $item["quantity"];
$total_price += ($item["price"] * $item["quantity"]);
$seller = $_SESSION["id"];
$check = "SELECT * FROM stock_product WHERE id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["amount"];

// echo " id :".$id."<br>";
// echo " name :".$pname."<br>";
// echo " quantity :".$quantity."<br>";
// echo "price :".$price."<br>";
// echo "item price :".$item_price."<br>";
// echo "total_price :".$total_price."<br>";
// echo "total amount : ".$total_amount."<br>";
// echo "<br>";

if($quantity > $unit){
        $alert =  "ไม่สามารถทำรายการได้เนื่องจาก"." ".$result["name"]." ไม่พอจำหน่าย";
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('$alert');";
        echo "window.location='../../page/member/Cart/Main.php';";
        echo "</script>";
        exit();
}
else{
$sql2 = "INSERT INTO `buy_detail`(`B_id`, `P_id`, `B_amount`, `B_price`) 
                          VALUES ('".$count."', '".$id."', '".$quantity."', '".$item_price."')";
// echo $sql2;
// echo "<br>";
$query2 = $condb->query($sql2);
$update = "UPDATE `stock_product` SET `amount`=(`amount` - '".$quantity."') WHERE `id` = '".$id."' ";
$updatestock = $condb->query($update);
if($query2){
    // unset($_SESSION["cart_item"]);
    // echo "<script>";
    // echo "alert('ไม่สามารถทำรายการได้');";
    // echo "window.location='../../page/member/Cart/Main.php';";
    // echo "</script>"; 
}
else{
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>"; 
} 
    }
   }
 }
 $sql = "INSERT INTO `buy`(`B_id`, `M_id`, `B_total_amount`, `B_total_price`, `B_date`) 
        VALUES ('".$count."', '".$seller."', '".$total_amount."', '".$total_price."', CURDATE())";
//  echo $sql;
//  echo "<br>";
$query = $condb->query($sql);
if($query){
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ทำรายการเสร็จสิ้น');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>";     
    }
else{
    unset($_SESSION["cart_item"]);
    echo "<script>";
    echo "alert('ไม่สามารถทำรายการได้');";
    echo "window.location='../../page/member/Cart/Main.php';";
    echo "</script>";
}
?>