<div class="col-md-3" align="center">
	<img class="img-rounded" width="200" height="auto"  alt="User Pic" src="<?php echo $f8?>">
</div>
<div class=" col-md-9">
	<table class="table table-user-information">
		<tbody>
			<tr>
				<div class="form-group">
					<td><label><strong>ชื่อที่ใช้ล็อกอิน</strong></label></td>
					<td><center><label><?php echo $f1?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong>ชื่อ-นามสกุล</strong></label></td>
					<td><center><label><?php if($f3==''){echo 'ไม่ระบุ';}else{echo $f3;} ?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong>อีเมล</strong></label></td>
					<td><center><label><?php echo $f4?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong>เบอร์โทร</strong></label></td>
					<td><center><label><?php echo $f6?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group" >
					<td><label><strong>เพศ</strong></label></td>
					<td><center><label><?php if($f5==''){echo 'ไม่ระบุ';}else{echo $f5;} ?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong>สถานะ</strong></label></td>
					<td><center><label><?php echo $f7?></label></center></td>
				</div>
			</tr>
		</tbody>
	</table>

	<td><a  data-toggle="tooltip" title="แก้ไขข้อมูล" type="button" class="btn btn-warning" href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&ID=<?php echo $f0?>">แก้ไขข้อมูล <span class="glyphicon glyphicon-edit"></span></a></td>
	<td></td>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>