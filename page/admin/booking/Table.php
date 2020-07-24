<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการรอส่งสินค้าและรับเงินของพนักงาน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="botable" width="100%" cellspacing="0">
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
						<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
					<td><?php echo $row["Bo_id"]; ?></td>
                        <td><?php echo $row["C_name"]; ?></td>
						<td><?php echo $row['Bo_total_amount']." แก้ว";?></td>
            			<td><?php echo $row['Bo_total_price']." บาท"; ?></td>
                        <td><?php echo $row['Bo_date']; ?></td>
                        <td><?php echo $row['Bo_getdate']; ?></td>
                        <td><?php echo $row['get_name']; ?></td>
                        <td><?php echo $row['bill_name']; ?></td>
                        <td align="center"><a href="#" data-target="#dataModal<?php echo $row['Bo_id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
                    </tr>

                    <div id="dataModal<?php echo $row['Bo_id']; ?>" name="detail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT * FROM booking_detail AS A 
                                            INNER JOIN stock_product AS C
                                            ON A.P_id = C.id WHERE A.Bo_id = '".$row["Bo_id"]."'";
                                $detailq = $condb->query($detail);
                                while ($redetail = mysqli_fetch_array($detailq)){ 
                                ?>     
                                <p><?php echo $redetail["name"] ?> ---------- <?php echo $redetail["Bo_amount"] ?> แก้ว</p></tr>
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
<br>
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการส่งสินค้าและรับเงินที่เสร็จสิ้นของพนักงาน</div>
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
						<?php while($result = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
        			<tr>
					    <td><?php echo $result["id"]; ?></td>
                        <td><?php echo $result["C_name"]; ?></td>
						<td><?php echo $result['Bo_total_amount']." แก้ว";?></td>
            			<td><?php echo $result['Bo_total_price']." บาท"; ?></td>
                        <td><?php echo $result['Bo_date']; ?></td>
                        <td><?php echo $result['Bo_getdate']; ?></td>
                        <td><?php echo $result['get_name']; ?></td>
                        <td><?php echo $result['bill_name']; ?></td>
                        <td align="center"><a href="#" data-target="#billdataModal<?php echo $result['id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
                    </tr>

        <div id="billdataModal<?php echo $result['id']; ?>" name="billdetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการซื้อขาย</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT A.id, A.M_id, A.total_amount, B.amount, A.total_price, C.name FROM booking AS A 
                                        INNER JOIN booking_detail AS B
                                        ON A.id = B.id
                                        INNER JOIN stock_product AS C
                                        ON B.P_id = C.id WHERE A.id = '".$result["id"]."'";
                                $detailq = $condb->query($detail);
                                while ($redetail = mysqli_fetch_array($detailq)){ 
                                ?>     
                                <p><?php echo $redetail["name"] ?> ---------- <?php echo $redetail["amount"] ?> แก้ว</p></tr>
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

