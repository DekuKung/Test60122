<?php
session_start();
//error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='./index.php';";
        echo "</script>";
    }        
}else{
    include '../../../control/connect/condb.php';

    $id =  $_SESSION["id"];
    $sql = "SELECT * FROM `get_tb`";
    $query = $condb->query($sql);
    $total_price = 0;
    $total_buy = 0;
    $total_tel = 0;
    $item_details = '';
    $order_details = '
    <div class="table-responsive" id="order_table">
     <table class="table table-bordered table-striped">
     <thead>
     <tr>
      <th>รหัสสินค้า</th>
       <th>สินค้า</th>
       <th>จำนวน</th>
       <th>ราคาต่อหน่วย</th>
       <th>ราคารวม</th>
    
     </tr>
           </thead>
           <tbody>
    ';
    if(isset($_SESSION["cart_item"])) {
    foreach($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_buy += $item["price"];
        
      $order_details .= '
      <tr>
      <td>'. $item['id'] .'</td>
      <td>'. $item['name'] .'</td>
      <td>'.$item['quantity'].'</td>
      <td>'. $item['price'] .'</td>
      <td>'. number_format($total_buy, 2) .'</td>
      </tr>
      ';
      $total_tel += $item["quantity"];
      $total_price += ($item["price"] * $item["quantity"]);
    
        }
    
     $item_details .= $item["name"] . ', ';
     $item_details = substr($item_details, 0, -2);
     $order_details .= '
     <tr>
     <td><b>Total</b></td>
     <td>'.$total_tel.'</td>
     <td>'. number_format($total_price, 2) .'</td>
    </tr>
     ';
    }
    $order_details .= '</table>';
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <title>หน้า Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../../DataTables/datatables.css">
        <link rel="stylesheet" href="../../../css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="sb-nav-fixed">
    <?php include './Sidebar.php'; ?>
    <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
      <!-- Table Member -->
      <?php include './Page.php'; ?>
        <!-- END Page Content  -->
        </div>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="../../../js/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="../../../DataTables/datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../js/main.js"></script> 
        <script src="../../../js/popper.js"></script>
        <script src="../../../js/bootstrap.min.js"></script>
        <script>
$(document).ready(function(){
    $("#btn").click(function(){
        var cn = $("#cname").val();
        var add = $("#address").val();
        var tel = $("#tel").val();;
        var date = $("#date").val();
        var type = $("#type").val();
        $("p.cusname").text(cn);
        $("p.address").text(add);
        $("p.tel").text(tel);
        $("p.date").text(date);
        $("p.type").text(type);
        $("#cusname").val(cn);
        $("#caddress").val(add);
        $("#ctel").val(tel);
        $("#getdate").val(date);
        $("#gettype").val(type);
    });      
});
        </script>
    </body>
    
    </html>
    <?php
} 
?>