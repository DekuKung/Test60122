<div class="row" align="center" >
<div class="col-md-6" method="POST" >
					<div class="form-header">
					<h4 class="form-title">รายละเอียด</h4>
          </div>
					<div class="form-group md-3">
            <div class="form-group">
							<label>ชื่อลูกค้า</label>
							<input type="text"  name="cname" id="cname" class="form-control" pattern="^[ก-๏\s]+$" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>ที่อยู่ลูกค้า</label>
							<input type="text"  name="address" id="address" class="form-control" oninvalid="this.setCustomValidity('กรุณากรอกข้อมูล ภาษาไทยเท่านั้น')" required>
						</div>
						<div class="form-group">
							<label>เบอร์โทรลูกค้า</label>
							<input type="tel" class="form-control"  name="tel" id="tel" class="form-control" pattern="^[0]{1}[689]{1}[0-9]{7,}" oninvalid="this.setCustomValidity('กรุณากรอกเบอร์โทรติดต่อ 10 ตัวเลข โดยขึ้นต้นด้วย 08 หรือ 06 หรือ 09')" required></input>
						</div>
						<div class="form-group">
							<label>วันที่รับ-ส่ง</label>
							<input type="Date"  name="date" id="date" class="form-control" oninvalid="this.setCustomValidity('กรุณาเลือกวันที่')" required>
                        </div>
                    <label>ประเภทการส่ง</label>
                    <select class="form-control" name="type" id="type" required oninvalid="this.setCustomValidity('กรุณาเลือก')">
                    
						<option value="" required><-- กรุณาเลือกการรับสินค้า --></option>
                    <?php while($productarray = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>
                        
                        <option value="<?php echo $productarray["id"];?>"><?php echo $productarray["id"]." - ".$productarray["Get_name"];?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success" data-target="#payModal" id="btn" data-toggle="modal">จองสินค้า</button>
                    </div>
                    <br>
                </div>
                </div>
                <br>
<div class="col-md-6">
        <h4 align="center">รายการที่จอง</h4>
        <?php
        echo $order_details;
        ?>
        <input type="hidden" name="total" id="total" value="<?php echo number_format($total_price, 2); ?>">
			</div>
        </div>
    </div>			
</div>
    <!-- Modal -->
<form  method="POST" action="../../control/booking/AddBooking.php">
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModal">รายการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>ชื่อลูกค้า : <p class="cusname"></p></p>
        <p>ที่อยู่ลูกค้า : <p class="address"></p></p>
        <p>เบอร์โทรลูกค้า : <p class="tel"></p></p>
        <p>วันที่รับ-ส่ง : <p class="date"></p></p>
        <p>ประเภทการส่ง : <p class="type"></p></p>
        <input type="hidden" value="" id="cusname" name="cusname">
        <input type="hidden" value="" id="caddress" name="caddress">
        <input type="hidden" value="" id="ctel" name="ctel">
        <input type="hidden" value="" id="getdate" name="getdate">
        <input type="hidden" value="" id="gettype" name="gettype">
        <?php echo $order_details; ?>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary">ใบเสร็จ</button> -->
        <button type="submit" class="btn btn-primary">เสร็ขสิ้น</button>
      </div>
    </div>
  </div>
</div>
</form>