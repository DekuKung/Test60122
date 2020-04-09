<div class="row">
    <div class="col-xl-3 col-md-6 ">
        <div class="card bg-primary text-white mb-4 ">
            <div class="card-body">ยอดการขายทั้งหมด
            <div class="inner"><p><?php $ttb = mysqli_fetch_array($totalbuy,MYSQLI_ASSOC);
            echo $ttb["Totalbuy"] ?> การขาย</p>
            </div>
        </div>              
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="../buy/Main.php"> รายละเอียด</a>
                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">ยอดการจองทั้งหมด
            <div class="inner"><p><?php $ttbo = mysqli_fetch_array($totalbo,MYSQLI_ASSOC);
            echo $ttbo["Totalbooking"] ?> การจอง</p>
        </div>
    </div>              
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="../booking/Main.php"> รายละเอียด</a>
            <div class="small text-white"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">จำนวนสมาชิกทั้งหมด
            <div class="inner"><p><?php $ttm = mysqli_fetch_array($totalm,MYSQLI_ASSOC);
            echo $ttm["Total"] ?> คน</p>
        </div>
    </div>              
    <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="../member/Main.php"> รายละเอียด</a>
            <div class="small text-white"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">จำนวนสินค้าคงคลัง
            <div class="inner"><p><?php $ttst = mysqli_fetch_array($totalst,MYSQLI_ASSOC);
             if($ttst["Totalstock"] == null){
                $val = 0; echo $val." ชิ้น";}
                else{
                $val = $ttst["Totalstock"];
                echo $val." ชิ้น";
                } ?></p>
            </div>
        </div>              
        <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="../stock/Main.php"> รายละเอียด</a>
                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<br>
                        