<!-- <div id="content" class="p-4 p-md-5 pt-5"> -->

<!-- <div class="form-group">
    <a href="#addModal" data-toggle="modal" class="btn btn btn-primary">เพิ่มสินค้าหน้าร้าน</a>
</div> -->
<div class="col col-12">
    <div class="card">
    	<div class="card-header"><i class="fa fa-table mr-1"></i>ตารางยอดการจองสินค้าของท่าน</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered DataTable" id="Ptable" width="100%" cellspacing="0">
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
                                <th>การจัดการ</th>
          					</tr>
                		</thead>
                	<tbody>
						<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
        			<tr>
                        <td id="bid" class="boid"><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["C_name"]; ?></td>
						<td><?php echo $row['total_amount']." แก้ว";?></td>
            			<td><?php echo $row['total_price']." บาท"; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['get_date']; ?></td>
                        <td><?php echo $row['get_name']; ?></td>
                        <td><?php echo $row['bill_name']; ?></td>
                        <td align="center">
							<a href="#" data-target="#billModal<?php  echo $row["id"]; ?>" class="btn btn-sm btn-success" data-toggle="modal">แจ้งชำระเงิน</a>
              <a href="#" data-target="#cancelModal<?php  echo $row["id"]; ?>" class="btn btn-sm btn-danger" data-toggle="modal">ยกเลิก</a>
                        </td>
                    </tr>
										    <!-- Modal -->
<div class="modal fade" id="billModal<?php  echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
<form  method="POST" action="../../../control/booking/bill.php">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ยืนยันการชำระเงินและส่งมอบเสร็จสิ้น</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<p>รหัส : <?php  echo $row["id"]; ?></p>
        <p>ชื่อลูกค้า : <?php echo $row["C_name"]; ?></p>
        <p>ที่อยู่ลูกค้า : <?php echo $row["C_add"]; ?></p>
        <p>เบอร์โทรลูกค้า : <?php echo $row["C_tel"]; ?></p>
        <p>วันที่รับ-ส่ง : <?php echo $row['get_date']; ?></p>
        <p>ประเภทการส่ง : <?php echo $row['get_name']; ?></p>
        <input type="hidden" value="<?php  echo $row["id"]; ?>" id="id" name="id">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="ยืนยันการชำระเงินส่งมอบ"></input>
      </div>
    </div>
  </div>
</div>
</form>

<form  method="POST" action="../../../control/booking/Add.php">
<div class="modal fade" id="cancelModal<?php  echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">รายการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<p>รหัส : <?php  echo $row["id"]; ?></p>
        <p>ชื่อลูกค้า : <?php echo $row["C_name"]; ?></p>
        <p>ที่อยู่ลูกค้า : <?php echo $row["C_add"]; ?></p>
        <p>เบอร์โทรลูกค้า : <?php echo $row["C_tel"]; ?></p>
        <p>วันที่รับ-ส่ง : <?php echo $row['get_date']; ?></p>
        <p>ประเภทการส่ง : <?php echo $row['get_name']; ?></p>
        <input type="text" value="<?php  echo $row["id"]; ?>" id="id" name="id">
        <input type="hidden" value="" id="name" name="name">
        <input type="hidden" value="" id="add" name="add">
        <input type="hidden" value="" id="phone" name="phone">
        <input type="hidden" value="" id="getdate" name="getdate">
        <input type="hidden" value="" id="gettype" name="gettype">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">ยืนยันการส่งมอบ</button>
      </div>
    </div>
  </div>
</div>
</form>
	<!--End Delete Modal -->
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>