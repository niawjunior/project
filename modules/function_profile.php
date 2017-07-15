<div class="col-md-3" align="center">
	<img class="img-rounded" width="200" height="auto"  alt="User Pic" src="<?php echo $f8?>">
</div>
<div class=" col-md-9">
	<table class="table table-user-information">
		<tbody>
			<tr>
				<div class="form-group">
					<td><label><strong><?php echo $_SESSION["strh43"];?></strong></label></td>
					<td><center><label><?php echo $f1?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong><?php echo $_SESSION["strh44"];?></strong></label></td>
					<td><center><label><?php if($f3==''){echo 'N/A';}else{echo $f3;} ?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong><?php echo $_SESSION["strh45"];?></strong></label></td>
					<td><center><label><?php echo $f4?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong><?php echo $_SESSION["strh47"];?></strong></label></td>
					<td><center><label><?php if($f6==''){echo 'N/A';}else{echo $f6;} ?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group" >
					<td><label><strong><?php echo $_SESSION["strh46"];?></strong></label></td>
					<td><center><label><?php if($f5==''){echo 'N/A';}else{echo $f5;} ?></label></center></td>
				</div>
			</tr>
			<tr>
				<div class="form-group">
					<td><label><strong><?php echo $_SESSION["strh39"];?></strong></label></td>
					<td><center><label><?php echo $f7?></label></center></td>
				</div>
			</tr>
		</tbody>
	</table>

	<td><a  data-toggle="tooltip" title="แก้ไขข้อมูล" type="button" class="btn btn-warning" href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&ID=<?php echo $f0?>"><?php echo $_SESSION["strh55"];?> <span class="glyphicon glyphicon-edit"></span></a></td>
	<td></td>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>