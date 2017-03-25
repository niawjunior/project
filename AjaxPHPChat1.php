<?php
session_start();
require_once("config_home.php")
?>
<html>
<head>
<script language="JavaScript">
     var HttPRequest = false;

     function doCallAjax() {
      HttPRequest = false;
      if (window.XMLHttpRequest) { // Mozilla, Safari,...
       HttPRequest = new XMLHttpRequest();
       if (HttPRequest.overrideMimeType) {
        HttPRequest.overrideMimeType('text/html');
       }
      } else if (window.ActiveXObject) { // IE
       try {
        HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (e) {
        try {
           HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {}
       }
      } 
      
      if (!HttPRequest) {
       alert('Cannot create XMLHTTP instance');
       return false;
      }
  
      var url = 'AjaxPHPChat2.php';
      var pmeters = "tName=" + encodeURI( document.getElementById("txtName").value) +
            "&tMessage=" + encodeURI( document.getElementById("txtMessage").value );

      HttPRequest.open('POST',url,true);

      HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      HttPRequest.setRequestHeader("Content-length", pmeters.length);
      HttPRequest.setRequestHeader("Connection", "close");
      HttPRequest.send(pmeters);
      
      
      HttPRequest.onreadystatechange = function()
      {

         if(HttPRequest.readyState == 3)  // Loading Request
          {
           document.getElementById("mySpan").innerHTML = "Now is Loading...";
          }

         if(HttPRequest.readyState == 4) // Return Request
          {       
            document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
            
            //  focus //
            var el = document.getElementById('mydiv');
            el.tabIndex = 32456;
            el.focus();
  
          }       
      }

     }
  </script>
</head>
    <link href="css/all.css" rel="stylesheet">
<body Onload="JavaScript:doCallAjax()">
    <td width="500" height="280" valign="top">
	<div style="width:570;height:210;overflow:auto"> 
	<span id="mySpan"></span>
	</div>
	</td>
    <form class="form-horizontal" method="post" name="frmMain" id="frmMain">
      <div >
        <label for="name" class="col-sm-2 control-label">ชื่อ</label>
        <input name="txtName" type="text" id="txtName" size="10" value="<?php echo $_SESSION["USER"];?>" disabled>
       <label for="name" class="col-sm-2 control-label" >ข้อความ</label>
        <input name="txtMessage" type="text" id="txtMessage" size="18"  required>
        <button  class="btn btn-primary" name="btnSend"  id="btnSend" onClick="JavaScript:doCallAjax();">ส่งข้อความ</button>
      </div>
    </form>
</body>
</html>