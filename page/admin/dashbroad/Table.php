<div class="card mb-4">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางจัดการข้อมูล สินค้าหน้าร้าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Btable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
								<th>ชื่อผู้พนักงาน</th>
								<th>จำนวนรวม</th>
								<th>ราคารวม</th>
                                <th>วันที่มีการจำหน่ายสินค้า</th>
                                <th>รายละเอียด</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
						<td class="bid" hidden="true"><?php echo $row['B_id']; ?></td>
                        <td class="Mid" hidden="true"><?php echo $row['M_id']; ?></td>
						<td><?php echo $row["M_Fname"]." ".$row["M_Lname"]; ?></td>
						<td><?php echo $row['total_amount'].' แก้ว'; ?></td>
						<td><?php echo $row['total_price'].' บาท'; ?></td>
                        <td><?php echo $row['B_date']; ?></td>
                        <td align="center"><a href="#" data-target="#buydataModal<?php echo $row['B_id']; ?>" class="btn btn btn-warning" data-toggle="modal" >รายละเอียด</a></td>
					</tr>
		<div id="buydataModal<?php echo $row['B_id']; ?>" name="buydetail" class="modal w-100 fade " >
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">
						<h4 class="modal-title">รายละเอียดประวัติการจองสินค้า</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body" id="detail_body">
                        <p>สินค้า  ----------  จำนวน</p>
                        <?php 	$detail = "SELECT DISTINCT * FROM buy_detail AS A
                                        INNER JOIN stock_product AS B
                                        ON A.P_id = B.id WHERE A.B_id = '".$row["B_id"]."'";
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