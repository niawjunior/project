<div class="col-md-3" align="center">
	<img class="img-rounded" width="auto" height="200"  alt="User Pic" src="<?=$f8?>">
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
					<td><center><label><?php echo $f3?></label></center></td>
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
					<td><center><label><?php echo $f5?></label></center></td>
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

	<td><a  type="button" class="btn btn-warning" href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&ID=<?=$f0?>">แก้ไขข้อมูล <span class="glyphicon glyphicon-edit"></span></a></td>
	<td></td>
</div>