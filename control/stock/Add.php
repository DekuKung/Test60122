<?php

include '../connect/condb.php';
$pname = $_POST["pname"];
$amount = $_POST["amount"];
$price = $_POST["price"];
$img = $_FILES["img"]["name"];

// echo $pname;
// echo $amount;
// echo $price;
// echo $img;

// $target_dir = "../../pic/";
// $target_file = $target_dir . basename($_FILES["img"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) 
// {
//     $check = getimagesize($_FILES["img"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// if (file_exists($target_file)) 
// {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["img"]["size"] > 500000) 
// {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
// {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) 
// {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } 
// else 
// {
//     if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) 
//     {
//         echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
//     } 
//     else 
//     {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

$sql = "INSERT INTO `stock_product`(`id`, `P_name`, `P_amount`, `P_price`, `P_add_date`, `P_image`) 
                            VALUES (null, '".$pname."', '".$amount."', '".$price."', CURDATE(), '".$img."')";
$query = $condb->query($sql);
if($query)
{
    echo "<script>";
    echo "alert('เพิ่มสินค้าหน้าร้านเสร็จสิ้น');";
    echo "window.location='../../page/admin/stock/Main.php';";
    echo "</script>";
}
else
{
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มสินค้าหน้าร้านได้');";
    echo "window.location='../../page/admin/stock/Main.php';";
    echo "</script>";
}

?>