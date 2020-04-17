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
						<td><?php echo $bo["id"]; ?></td>
						<td><?php echo $bo['total_amount']." แก้ว";?></td>
            			<td><?php echo $bo['total_price']." บาท"; ?></td>
                        <td><?php echo $bo['date']; ?></td>
                        <td>รายละเอียด</td>
                    </tr>
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
                    </tr>
                        <?php }?>
			</tbody>
			</table>
			</div>
		</div>
		</div>
</div>

	<!--End Delete Modal -->