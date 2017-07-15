<?php 
	if($_SESSION["lang"] == "th")
		{
			$_SESSION["strwater"] = "ระดับน้ำ";
		    $_SESSION["strmap"] = "แผนที่";
		    $_SESSION["strgraph"] = "กราฟ";
		    $_SESSION["strreport"] = "รายงาน";
		    $_SESSION["strmember"] = "สมาชิก";
		    $_SESSION["strprofile"] = "ข้อมูลส่วนตัว";
		    $_SESSION["stractivity"] = "บันทึก";
		    $_SESSION["strmore"] = "อื่นๆ";
		    $_SESSION["strh1"] = "ตั้งค่าระบบ";
		    $_SESSION["strh2"] = "เฉพาะผู้ดูและระบบเท่านั้น";
		    $_SESSION["strh3"] = "วันที่/เวลา";
		    $_SESSION["strh4"] = "ระบบล็อกอิน";
		    $_SESSION["strh5"] = "ระบบบันทึก&รายงาน";
		    $_SESSION["strh6"] = "ระบบเปลี่ยนภาษา";
		    $_SESSION["strh7"] = "ระบบสำรองข้อมูล";
		    $_SESSION["strh8"] = "ภาษาไทย";
		    $_SESSION["strh9"] = "ภาษาอังกฤษ";
		    $_SESSION["strh10"] = "บันทึกกิจกรรม";
		    $_SESSION["strh11"] = "รายงานระดับน้ำ";
		    $_SESSION["strh12"] = "สำรองข้อมูล";
		    $_SESSION["strh13"] = "สร้าง/ลบ ฐานข้อมูล";
		    $_SESSION["strh14"] = "รายละเอียด/สถานะต่างๆ";
		    $_SESSION["strh15"] = "ตกลง";
		    $_SESSION["strh16"] = "ออกจากระบบ";
		    $_SESSION["strh17"] = "ยินดีต้อนรับคุณ";
		    $_SESSION["strh18"] = "สมาชิก";
		    $_SESSION["strh19"] = "ผู้ดูแลระบบ";
			$_SESSION["strh20"] = "ที่มาและความสำคัญ";
			$_SESSION["strh21"] = "วิธีใช้งานเว็บไซต์";
			$_SESSION["strh23"] = "ลืมรหัสผ่าน";
			$_SESSION["strh24"] = "เข้าสู่ระบบ";
			$_SESSION["strh25"] = "สมัครสมาชิก";
			$_SESSION["strh26"] = "ปรับปรุงระดับน้ำทุกๆ (1-100 เซนติเมตร)";

			$_SESSION["strh27"] = "สถานที่";
			$_SESSION["strh28"] = "ระยะที่วัดได้ ม.";
			$_SESSION["strh29"] = "(ความลึก-ระยะที่วัดได้) ม.";
			$_SESSION["strh30"] = "เวลา";
			$_SESSION["strh31"] = "วันที่";
			$_SESSION["strh32"] = "แก้ไข";
			$_SESSION["strh33"] = "ลบ";

			$_SESSION["strh34"] = "คำอธิบาย";
			$_SESSION["strh35"] = "ละติจูด";
			$_SESSION["strh36"] = "ลองติจูด";
			$_SESSION["strh37"] = "ความลึก(ม)";
			$_SESSION["strh38"] = "เลือก";
			$_SESSION["strh39"] = "สถานะ";

		    $_SESSION["strh40"] = "เรื่อง/ข่าวสาร";
			$_SESSION["strh41"] = "ไฟล์ประกอบ (PDF)";
			$_SESSION["strh42"] = "โดย";

			$_SESSION["strh43"] = "ชื่อสมาชิก";
			$_SESSION["strh44"] = "ชื่อ-นามสกุล";
			$_SESSION["strh45"] = "อีเมล";
			$_SESSION["strh46"] = "เพศ";
			$_SESSION["strh47"] = "เบอร์โทย";
			$_SESSION["strh48"] = "รูปประจำตัว";

			$_SESSION["strh49"] = "รหัสผ่านใหม่";
			$_SESSION["strh50"] = "ยืนยันรหัสผ่านอีกครั้ง";

			$_SESSION["strh51"] = "ชาย";
			$_SESSION["strh52"] = "หญิง";

			$_SESSION["strh53"] = "บันทึกข้อมูล";
			$_SESSION["strh54"] = "ยกเลิก";
			$_SESSION["strh55"] = "แก้ไขข้อมูล";

			$_SESSION["strh56"] = "ออนไลน์/ออฟไลน์";
			$_SESSION["strh57"] = "เข้าสู่ระบบล่าสุด";
			$_SESSION["strh58"] = "กิจกรรมล่าสุด";

		}
	else if($_SESSION["lang"] == "en")
		{
			$_SESSION["strwater"] = "Level";
		    $_SESSION["strmap"] = "Map";
		    $_SESSION["strgraph"] = "Graph";
		    $_SESSION["strreport"] = "Report";
		    $_SESSION["strmember"] = "Member";
		    $_SESSION["strprofile"] = "Profile";
		    $_SESSION["stractivity"] = "Activity";
		    $_SESSION["strmore"] = "More";
		    $_SESSION["strh1"] = "Setting";
		    $_SESSION["strh2"] = "Admin Only";
		    $_SESSION["strh3"] = "Date/Time";
		    $_SESSION["strh4"] = "Login System";
		    $_SESSION["strh5"] = "Report System";
		    $_SESSION["strh6"] = "Language System";
		    $_SESSION["strh7"] = "Backup System";
		    $_SESSION["strh8"] = "Thai";
		    $_SESSION["strh9"] = "English";
		    $_SESSION["strh10"] = "Activity";
		    $_SESSION["strh11"] = "Report";
		    $_SESSION["strh12"] = "Backup data";
		    $_SESSION["strh13"] = "Create/delete database";
		    $_SESSION["strh14"] = "Detail/status";
		    $_SESSION["strh15"] = "Ok";
		    $_SESSION["strh16"] = "LOGOUT";
		    $_SESSION["strh17"] = "WELCOME";
		    $_SESSION["strh18"] = "MEMBER";
		    $_SESSION["strh19"] = "ADMIN";
			$_SESSION["strh20"] = "Signification";
			$_SESSION["strh21"] = "How to Use";
			$_SESSION["strh23"] = "Lost Password";
			$_SESSION["strh24"] = "Login";
			$_SESSION["strh25"] = "Register";
			$_SESSION["strh26"] = "Update Every  (1-100 Centimater)";

			
			$_SESSION["strh27"] = "Place";
			$_SESSION["strh28"] = "Distance M.";
			$_SESSION["strh29"] = "(Deep-Distance) M.";
			$_SESSION["strh30"] = "Time";
			$_SESSION["strh31"] = "Date";
			$_SESSION["strh32"] = "Edit";
			$_SESSION["strh33"] = "Delete";

			$_SESSION["strh34"] = "Decription";
			$_SESSION["strh35"] = "Latitude";
			$_SESSION["strh36"] = "Longitude";
			$_SESSION["strh37"] = "Deep M.";
			$_SESSION["strh38"] = "Use";
			$_SESSION["strh39"] = "Status";

			$_SESSION["strh40"] = "Story/News";
			$_SESSION["strh41"] = "File (PDF)";
			$_SESSION["strh42"] = "Post By";

			$_SESSION["strh43"] = "Username";
			$_SESSION["strh44"] = "Name-Lastname";
			$_SESSION["strh45"] = "Email";
			$_SESSION["strh46"] = "Sex";
			$_SESSION["strh47"] = "Tel";
			$_SESSION["strh48"] = "Images";

			$_SESSION["strh49"] = "New Password";
			$_SESSION["strh50"] = "Confirm Password";

			$_SESSION["strh51"] = "Male";
			$_SESSION["strh52"] = "Female";

			$_SESSION["strh53"] = "Save";
			$_SESSION["strh54"] = "Cancel";
		    $_SESSION["strh55"] = "Edit Profile";

			$_SESSION["strh56"] = "Online/Offline";
			$_SESSION["strh57"] = "Lasted Login";
			$_SESSION["strh58"] = "Lasted Activity";


		}
	else
	{
			$_SESSION["strwater"] = "ระดับน้ำ";
		    $_SESSION["strmap"] = "แผนที่";
		    $_SESSION["strgraph"] = "กราฟ";
		    $_SESSION["strreport"] = "รายงาน";
		    $_SESSION["strmember"] = "สมาชิก";
		    $_SESSION["strprofile"] = "ข้อมูลส่วนตัว";
		    $_SESSION["stractivity"] = "บันทึก";
		    $_SESSION["strmore"] = "อื่นๆ";
		    $_SESSION["strh1"] = "ตั้งค่าระบบ";
		    $_SESSION["strh2"] = "เฉพาะผู้ดูและระบบเท่านั้น";
		    $_SESSION["strh3"] = "วันที่/เวลา";
		    $_SESSION["strh4"] = "ระบบล็อกอิน";
		    $_SESSION["strh5"] = "ระบบบันทึก&รายงาน";
		    $_SESSION["strh6"] = "ระบบเปลี่ยนภาษา";
		    $_SESSION["strh7"] = "ระบบสำรองข้อมูล";
		    $_SESSION["strh8"] = "ภาษาไทย";
		    $_SESSION["strh9"] = "ภาษาอังกฤษ";
		    $_SESSION["strh10"] = "บันทึกกิจกรรม";
		    $_SESSION["strh11"] = "รายงานระดับน้ำ";
		    $_SESSION["strh12"] = "สำรองข้อมูล";
		    $_SESSION["strh13"] = "สร้าง/ลบ ฐานข้อมูล";
		    $_SESSION["strh14"] = "รายละเอียด/สถานะต่างๆ";
		    $_SESSION["strh15"] = "ตกลง";
		    $_SESSION["strh16"] = "ออกจากระบบ";
		    $_SESSION["strh17"] = "ยินดีต้อนรับคุณ";
		    $_SESSION["strh18"] = "สมาชิก";
		    $_SESSION["strh19"] = "ผู้ดูแลระบบ";
			$_SESSION["strh20"] = "ที่มาและความสำคัญ";
			$_SESSION["strh21"] = "วิธีใช้งานเว็บไซต์";
			$_SESSION["strh23"] = "ลืมรหัสผ่าน";
			$_SESSION["strh24"] = "เข้าสู่ระบบ";
			$_SESSION["strh25"] = "สมัครสมาชิก";
			$_SESSION["strh26"] = "ปรับปรุงระดับน้ำทุกๆ (1-100 เซนติเมตร)";

			
			$_SESSION["strh27"] = "สถานที่";
			$_SESSION["strh28"] = "ระยะที่วัดได้ ม.";
			$_SESSION["strh29"] = "(ความลึก-ระยะที่วัดได้) ม.";
			$_SESSION["strh30"] = "เวลา";
			$_SESSION["strh31"] = "วันที่";
			$_SESSION["strh32"] = "แก้ไข";
			$_SESSION["strh33"] = "ลบ";

			
			$_SESSION["strh34"] = "คำอธิบาย";
			$_SESSION["strh35"] = "ละติจูด";
			$_SESSION["strh36"] = "ลองติจูด";
			$_SESSION["strh37"] = "ความลึก(ม)";
			$_SESSION["strh38"] = "เลือก";
			$_SESSION["strh39"] = "สถานะ";

			$_SESSION["strh40"] = "เรื่อง/ข่าวสาร";
			$_SESSION["strh41"] = "ไฟล์ประกอบ (PDF)";
			$_SESSION["strh42"] = "โดย";

			$_SESSION["strh43"] = "ชื่อสมาชิก";
			$_SESSION["strh44"] = "ชื่อ-นามสกุล";
			$_SESSION["strh45"] = "อีเมล";
			$_SESSION["strh46"] = "เพศ";
			$_SESSION["strh47"] = "เบอร์โทร";
			$_SESSION["strh48"] = "รูปประจำตัว";

			$_SESSION["strh49"] = "รหัสผ่านใหม่";
			$_SESSION["strh50"] = "ยืนยันรหัสผ่านอีกครั้ง";

			$_SESSION["strh51"] = "ชาย";
			$_SESSION["strh52"] = "หญิง";

			$_SESSION["strh53"] = "บันทึกข้อมูล";
			$_SESSION["strh54"] = "ยกเลิก";
			$_SESSION["strh55"] = "แก้ไขข้อมูล";

			$_SESSION["strh56"] = "ออนไลน์/ออฟไลน์";
			$_SESSION["strh57"] = "เข้าสู่ระบบล่าสุด";
			$_SESSION["strh58"] = "กิจกรรมล่าสุด";


	}
    
?>