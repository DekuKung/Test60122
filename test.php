<?php

include './control/connect/condb.php';

$sql = "SELECT * FROM booking";
$qubooking = $condb->query($sql);
while ($res = mysqli_fetch_array($qubooking, MYSQLI_ASSOC)){
if($res["Bo_id"] == null){
    $count = $count + 1;
    echo $count;
}
}
?>