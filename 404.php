<?php 
require_once("config.php");
?>
<style>
body{height:100%;
width:100%;
background-image:url(img/wallpapers.jpeg);
background-repeat:no-repeat;
background-size:cover;
filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='.image.jpg',sizingMethod='scale');
-ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='image.jpg',sizingMethod='scale')";
}
</style>
<script>
$(window).load(function()
{
$('#myModal').modal('show');
setTimeout("location.href = 'home.php';",3000);
});
</script>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ขออภัย!! การร้องขอไม่สำเร็จ</h4>
        </div>
        <div class="modal-body">
          <p>กรุณาติดต่อผู้ดูแลระบบ</p>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>