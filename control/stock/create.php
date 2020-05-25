<?php
session_start();
include '../../condb.php';
$name = $_POST["pname"];
$quantity = $_POST["amount"];
$price = $_POST["price"];
$img = $_POST["fileToUpload"];

$target_dir = "../../pic/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // $err = "File is an image - " . $check["mime"] . ".";
    // echo "<script>";
    // echo "alert('$err');";
    // echo "window.location='../../ManageStock/Main.php';";
    // echo "</script>";
    $uploadOk = 1;
  } else {
    $err1 = "File is not an image.";
    echo "<script>";
    echo "alert('$err1');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $err2 =  "Sorry, file already exists.";
  echo "<script>";
  echo "alert('$err2');";
  echo "window.location='../../ManageStock/Main.php';";
  echo "</script>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $err3 = "Sorry, your file is too large.";
  echo "<script>";
  echo "alert('$err3');";
  echo "window.location='../../ManageStock/Main.php';";
  echo "</script>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $err4 = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<script>";
  echo "alert('$err4');";
  echo "window.location='../../ManageStock/Main.php';";
  echo "</script>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $err5 = "Sorry, your file was not uploaded.";
  echo "<script>";
  echo "alert('$err5');";
  echo "window.location='../../ManageStock/Main.php';";
  echo "</script>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $mSg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    echo "<script>";
    echo "alert('$mSg');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
  } else {
    $err6 = "Sorry, there was an error uploading your file.";
    echo "<script>";
    echo "alert('$err6');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
  }
}
$check = "SELECT * FROM stock_product";
$qcheck = $condb->query($check);
while( $result = mysqli_fetch_array($qcheck,MYSQLI_ASSOC)){
    if($img == $result["P_Image"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            exit;
    }
    else if($name == $result["P_name"]){
            echo "<script>";
            echo "alert('ข้อมูลนี้มีอยู่ในระบบแล้ว');";
            echo "window.location='../../ManageStock/Main.php';";
            echo "</script>";
            exit;
    }
}
$sql = "INSERT INTO `stock_product`(`id`, `name`, `unit`, `price`, `P_add_history_date`, `Image`) VALUES (null, '".$name."', '".$quantity."', '".$price."', CURDATE(), '".$img."')";
// echo $sql;
// echo $_SESSION["status"];
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('เพิ่มสินค้าเสร็จสิ้น');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มสินค้าได้');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}

?>