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
$id = $_SESSION["id"];
$sql = "SELECT DISTINCT COUNT(B.id) AS totalbuy, A.M_id, A.M_Fname, A.M_Lname, SUM(B.total_amount) AS total_amount, SUM(B.total_price) AS total_price, B.date FROM member AS A
INNER JOIN buy AS B 
ON A.M_id = B.M_id";
$query = $condb->query($sql);
$sqlstock = "SELECT * FROM stock_product";
$qchecks = $condb->query($sqlstock);
while ($rows = mysqli_fetch_array($qchecks,MYSQLI_ASSOC)){
    if($rows["amount"] == 0){
        $alert = "ตอนนี้ ".$rows["name"]." หมดแล้ว ";
        echo "<script>";
        echo "alert('$alert');";
        echo "</script>";
}else if($rows["amount"] < 10){
        $alert = "ตอนนี้ ".$rows["name"]." เหลือแค่ ".$rows["amount"]." แก้ว กรุณาเติมสินค้า";
        echo "<script>";
        echo "alert('$alert');";
        echo "</script>";
}
}
// totalBuy
$sqltotalcus = "SELECT COUNT(A.C_id) AS Totalcus FROM customer AS A";
$totalcus = $condb->query($sqltotalcus);
//totalbooking
$sqltotalbo = "SELECT COUNT(A.id) AS Totalbooking FROM booking AS A";
$totalbo = $condb->query($sqltotalbo);
//totalmember
$sqltotalm = "SELECT COUNT(A.M_id) AS Total FROM member AS A WHERE A.M_Status = 2";
$totalm = $condb->query($sqltotalm);
//totalstock
$sqltotalst = "SELECT SUM(A.amount) AS Totalstock FROM stock_product AS A";
$totalst = $condb->query($sqltotalst);
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
<style>
    .fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
</style>
<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>
<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <?php include './Card.php'; ?>
  <!-- Table Member -->
    <?php include './pageStatus.php'; ?>
    <!-- END Page Content  -->
    </div>
    <!-- JQuery -->
  <script src="../../../js/jquery.min.js"></script>
  <script src="../../../DataTables/datatables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/popper.js"></script>
  <script src="../../../js/main.js"></script>
  <script>
    //   $('#buytable').dataTable(); 
  </script>
</body>
</html>
<?php }?>