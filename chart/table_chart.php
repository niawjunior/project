<?php
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$database_host 			= 'localhost';
	$database_username 		= 'root';
	$database_password 		= 'niaw2362537';
	$database_name 			= 'u220965490_water';

	$mysqli = new mysqli($database_host, $database_username, $database_password, $database_name);
	$mysqli->set_charset("utf8");

	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
		$get_data = $mysqli->query("SELECT * FROM water_table");
		
		while($data = $get_data->fetch_assoc()){
			
			$result[] = $data;
		}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
		<table class="table" id="datatable">
			<thead>
				<tr>
					<th></th>
					<th>ประชากรหญิง</th>
					<th>ประชากรชาย</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($result as $result_tb){
						echo"<tr>";
							echo "<td>".$result_tb['time']."</td>";
							echo "<td>".$result_tb['level']."</td>";
							echo "<td>".$result_tb['level']."</td>";
							
						echo"</tr>";
					}
				?>
			
			</tbody>
		</table>

		
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
	<script>
	
	$(function () {
				
		$('#container').highcharts({
			data: {
				//กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
				table: 'datatable'
			},
			chart: {
				type: 'column'
			},
			title: {
				text: ''
			},
			yAxis: {
				allowDecimals: false,
				title: {
					text: 'ระดับน้ำ (เมตร)'
				}
			},
			
			tooltip: {
				formatter: function () {
					return '<b>' + this.series.name + '</b><br/>' +
						this.point.y; + ' ' + this.point.name.toLowerCase();
				}
			}
		});
	});
	
	</script>
	
  </body>
</html>






