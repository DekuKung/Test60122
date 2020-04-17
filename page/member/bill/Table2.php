<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการแจ้งชำระเงินการจองของท่าน</div>
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
          					</tr>
                		</thead>
                	<tbody>
						<?php while($result = mysqli_fetch_array($query2,MYSQLI_ASSOC)) { ?>
        			<tr>
                        <td id="bid" class="boid"><?php echo $result["id"]; ?></td>
                        <td><?php echo $result["C_name"]; ?></td>
						<td><?php echo $result['total_amount']." แก้ว";?></td>
            			<td><?php echo $result['total_price']." บาท"; ?></td>
                        <td><?php echo $result['date']; ?></td>
                        <td><?php echo $result['get_date']; ?></td>
                        <td><?php echo $result['get_name']; ?></td>
                        <td><?php echo $result['bill_name']; ?></td>
                    </tr>
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>