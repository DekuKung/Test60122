<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการซื้อขายหน้าร้านของท่าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Ptable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>รหัสซื้อขาย</th>
								<th>จำนวนรวม</th>
           						<th>ราคารวม</th>
                                <th>วันที่มีการซื้อขาย</th>
								<th>รายละเอียด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($bo = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td><?php echo $bo["B_id"]; ?></td>
						<td><?php echo $bo['B_total_amount']." แก้ว";?></td>
            			<td><?php echo $bo['B_total_price']." บาท"; ?></td>
                        <td><?php echo $bo['B_date']; ?></td>
						<td align="center"><a href="#" data-target="#buydataModal<?php echo $bo['B_id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
                    </tr>

					<div id="buydataModal<?php echo $bo['B_id']; ?>" name="buydetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT * FROM buy_detail AS A
                                        INNER JOIN stock_product AS B
                                        ON A.P_id = B.id WHERE A.B_id = '".$bo["B_id"]."'";
                                $detailq = $condb->query($detail);
                                while ($redetail = mysqli_fetch_array($detailq)){ 
                                ?>     
                                <p><?php echo $redetail["name"] ?> ---------- <?php echo $redetail["B_amount"] ?> แก้ว</p></tr>
                                <?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>

	<!--End Delete Modal -->
	<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->
<br>
<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการส่งสินค้าและรับเงินของท่าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="billtable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>รหัสการจอง</th>
                                <th>ชื่อผู้จอง</th>
								<th>จำนวนรวม</th>
           						<th>ราคารวม</th>
                                <th>วันที่มีการจองสินค้า</th>
                                <th>วันที่มีการส่ง/รับสินค้า</th>
                                <th>ประเภทการจัดส่ง</th>
                                <th>สถานะการจัดส่งและรับเงิน</th>
								<th>รายละเอียด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query3,MYSQLI_ASSOC)) { ?>
        			<tr>
					<td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["C_name"]; ?></td>
						<td><?php echo $row['total_amount']." แก้ว";?></td>
            			<td><?php echo $row['total_price']." บาท"; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['get_date']; ?></td>
                        <td><?php echo $row['get_name']; ?></td>
                        <td><?php echo $row['bill_name']; ?></td>
						<td align="center"><a href="#" data-target="#bodataModal<?php echo $row['id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
                    </tr>

					<div id="bodataModal<?php echo $row['id']; ?>" name="bodetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT * FROM booking_detail AS A
                                        INNER JOIN stock_product AS B
                                        ON A.P_id = B.id WHERE A.id = '".$row["id"]."'";
                                $qdetail = $condb->query($detail);
                                while ($rowdetail = mysqli_fetch_array($qdetail)){ 
                                ?>     
                                <p><?php echo $rowdetail["name"] ?> ---------- <?php echo $rowdetail["Bo_amount"] ?> แก้ว</p></tr>
                                <?php } ?>
					</div>
				</form>
			</div>
		</div>
	</div>
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>

	<!--End Delete Modal -->