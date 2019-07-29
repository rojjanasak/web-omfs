<!doctype html>
<html lang="en">
<?php
include('../../libs/config_omfs.php');

session_start();
$strpg = "SELECT * FROM user_profile  WHERE iden_number = '".$_SESSION['iden_number']."'   ";
    $objQuery = pg_query($db,$strpg);
    $objResult = pg_fetch_array($objQuery);

    $status = $objResult[status_user];


    if($_SESSION['iden_number'] == "")
    {
        header('Location: ../');
        exit();
    }

    else if( $status != "register_web"  && $status != "register_app" && $status != "super_admin"   )
    {
        header('Location: ../');
        exit();
    }


?>
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/icon_top.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>O M F S</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
 <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} 
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
           try { return new XMLHttpRequest();          } catch(e) {}
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; 
                       } 
                  }
             };
             req.open("GET", "location.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('prov_name', -1);  
    </script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="./" class="simple-text">
                   <img src="../img/logo5.png" alt="" width="100%">
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="./">
                        <i class="pe-7s-home"></i>
                        <p>หน้าหลัก</p>
                    </a>
                </li>
                <li>
                    <a href="p-gis.php">
                        <i class="pe-7s-global"></i>
                        <p>ระบบภูมิสารสนเทศ</p>
                    </a>
                </li>
                <li>
                    <a href="p-fire.php">
                        <i class="pe-7s-speaker"></i>
                        <p>ระบบรายงานจุดความร้อน</p>
                    </a>
                </li>
                <li>
                    <a href="p-survey.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>OMFS Mobile Survey</p>
                    </a>
                </li>
                <li>
                    <a href="p-table.php">
                        <i class="pe-7s-note2"></i>
                        <p>ตารางข้อมูลจุดความร้อน</p>
                    </a>
                </li>
                <li>
                    <a href="p-status-fire.php">
                        <i class="pe-7s-settings"></i>
                        <p>สถานะแจ้งเตือนจุดความร้อน</p>
                    </a>
                </li>
                <li>
                    <a href="p-npp.php">
                        <i class="pe-7s-sun"></i>
                        <p>Suomi NPP</p>
                    </a>
                </li>
                <li>
                    <a href="p-upload.php">
                        <i class="pe-7s-cloud-upload"></i>
                        <p>อัพโหลดข้อมูล </p>
                    </a>
                </li>
                <li>
                    <a href="p-download.php">
                        <i class="pe-7s-cloud-download"></i>
                        <p>ดาวน์โหลดข้อมูล </p>
                    </a>
                </li>
                <li>
                    <a href="p-user.php">
                        <i class="pe-7s-user"></i>
                        <p>ข้อมูลผู้ใช้งาน </p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../">
                               ออกจากระบบ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                               <!-- .row -->
                <div class="row">
                
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-pills">
                              <li class="active"><a data-toggle="pill" href="#home">รายชื่อรอยืนยันสิทธิ์</a></li>
                              <li><a data-toggle="pill" href="#menu4">ระดับผู้ใช้ทั่วไป</a></li>
                              <li><a data-toggle="pill" href="#menu1">ระดับปฏิบัติการ</a></li>
                              <li><a data-toggle="pill" href="#menu2">ระดับผู้วิเคราะห์</a></li>
                              <li><a data-toggle="pill" href="#menu3">ระดับผู้บริหาร</a></li>
                            </ul>

                            <div class="tab-content">










                              <div id="home" class="tab-pane fade in active">
                                <table id="example1" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result1 = pg_query("SELECT * FROM user_profile where status_user = 'register_web' or status_user = 'register_app' ; ");
while ($arr1 = pg_fetch_array($result1)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr1[name_user]; ?></td>
                                            <td><?php echo $arr1[lname_user]; ?></td>
                                            <td><?php echo $arr1[prov_user]; ?></td>
                                            <td><?php echo $arr1[email_user]; ?></td>
                                            <td><?php echo $arr1[tel_user]; ?></td>
                                            <td><?php echo $arr1[level_user]; ?></td>
                                            <td><center>
                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $arr1[status_user]; ?> <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_level.php?status_user=user&id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > user / ผู้ใช้ทั่วไป</a>
                                                </li>
                                                <li><a href="assets/update_level.php?status_user=staff&id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > staff / ผู้ปฏับิติการ</a></li>
                                                <li><a href="assets/update_level.php?status_user=analytical&id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Analytical / นักวิเคราะห์</a>
                                                </li>
                                                <li><a href="assets/update_level.php?status_user=executive&id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Executive / ผู้บริหาร</a>
                                                </li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                            
                                            <td><center>
                                             <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                              แก้ไข <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/delete_user.php?id=<?php echo $arr1[id_user]; ?>" 
                                                    onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i> ลบข้อมูล</a></li>
                                                <li><a href="assets/reset_pass.php?id=<?php echo $arr1[id_user]; ?>" onclick="return confirm('ยืนยันการรีเซ็ตรหัสผ่านของ <?php echo $arr1[name_user] ,' ',$arr1[lname_user] ; ?>?')" ><i class="fa fa-history"></i> รีเซ็ตรหัสผ่าน</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>
















                              <div id="menu1" class="tab-pane fade">
                                <table id="example2" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result2 = pg_query("SELECT * FROM user_profile where status_user = 'staff' ; ");
while ($arr2 = pg_fetch_array($result2)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr2[name_user]; ?></td>
                                            <td><?php echo $arr2[lname_user]; ?></td>
                                            <td><?php echo $arr2[prov_user]; ?></td>
                                            <td><?php echo $arr2[email_user]; ?></td>
                                            <td><?php echo $arr2[tel_user]; ?></td>
                                            <td><?php echo $arr2[level_user]; ?></td>
                                            <td><center>
                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $arr2[status_user]; ?> <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_level.php?status_user=user&id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > user / ผู้ใช้ทั่วไป</a></li>
                                                <li><a href="assets/update_level.php?status_user=staff&id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > staff / ผู้ปฏับิติการ</a></li>
                                                <li><a href="assets/update_level.php?status_user=analytical&id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Analytical / นักวิเคราะห์</a></li>
                                                <li><a href="assets/update_level.php?status_user=executive&id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Executive / ผู้บริหาร</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                            <td><center>
                                             <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                              แก้ไข <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/delete_user.php?id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i> ลบข้อมูล</a></li>
                                                <li><a href="assets/reset_pass.php?id=<?php echo $arr2[id_user]; ?>" onclick="return confirm('ยืนยันการรีเซ็ตรหัสผ่านของ <?php echo $arr2[name_user] ,' ',$arr2[lname_user] ; ?>?')" ><i class="fa fa-history"></i> รีเซ็ตรหัสผ่าน</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>










                              <div id="menu2" class="tab-pane fade">
                                <table id="example3" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result3 = pg_query("SELECT * FROM user_profile where status_user = 'analytical' ; ");
while ($arr3 = pg_fetch_array($result3)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr3[name_user]; ?></td>
                                            <td><?php echo $arr3[lname_user]; ?></td>
                                            <td><?php echo $arr3[prov_user]; ?></td>
                                            <td><?php echo $arr3[email_user]; ?></td>
                                            <td><?php echo $arr3[tel_user]; ?></td>
                                            <td><?php echo $arr3[level_user]; ?></td>
                                            <td><center>
                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $arr3[status_user]; ?> <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_level.php?status_user=user&id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > user / ผู้ใช้ทั่วไป</a></li>
                                                <li><a href="assets/update_level.php?status_user=staff&id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > staff / ผู้ปฏับิติการ</a></li>
                                                <li><a href="assets/update_level.php?status_user=analytical&id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Analytical / นักวิเคราะห์</a></li>
                                                <li><a href="assets/update_level.php?status_user=executive&id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Executive / ผู้บริหาร</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                            <td><center>
                                             <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                              แก้ไข <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/delete_user.php?id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i> ลบข้อมูล</a></li>
                                                <li><a href="assets/reset_pass.php?id=<?php echo $arr3[id_user]; ?>" onclick="return confirm('ยืนยันการรีเซ็ตรหัสผ่านของ <?php echo $arr3[name_user] ,' ',$arr3[lname_user] ; ?>?')" ><i class="fa fa-history"></i> รีเซ็ตรหัสผ่าน</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>








                              <div id="menu3" class="tab-pane fade">
                                <table id="example4" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result4 = pg_query("SELECT * FROM user_profile where status_user = 'executive' ; ");
while ($arr4 = pg_fetch_array($result4)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr4[name_user]; ?></td>
                                            <td><?php echo $arr4[lname_user]; ?></td>
                                            <td><?php echo $arr4[prov_user]; ?></td>
                                            <td><?php echo $arr4[email_user]; ?></td>
                                            <td><?php echo $arr4[tel_user]; ?></td>
                                            <td><?php echo $arr4[level_user]; ?></td>
                                            <td><center>
                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $arr4[status_user]; ?> <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_level.php?status_user=user&id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > user / ผู้ใช้ทั่วไป</a></li>
                                                <li><a href="assets/update_level.php?status_user=staff&id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > staff / ผู้ปฏับิติการ</a></li>
                                                <li><a href="assets/update_level.php?status_user=analytical&id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Analytical / นักวิเคราะห์</a></li>
                                                <li><a href="assets/update_level.php?status_user=executive&id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Executive / ผู้บริหาร</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                            <td><center>
                                             <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                              แก้ไข <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/delete_user.php?id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i> ลบข้อมูล</a></li>
                                                <li><a href="assets/reset_pass.php?id=<?php echo $arr4[id_user]; ?>" onclick="return confirm('ยืนยันการรีเซ็ตรหัสผ่านของ <?php echo $arr4[name_user] ,' ',$arr4[lname_user] ; ?>?')" ><i class="fa fa-history"></i> รีเซ็ตรหัสผ่าน</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>

                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>








                                <div id="menu4" class="tab-pane fade">
                                <table id="example5" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>จังหวัด</th>
                                            <th>E-mail</th>
                                            <th>เบอร์โทร</th>
                                            <th>ระดับการสมัคร</th>
                                            <th>เลือกระดับผู้ใช้</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$result5 = pg_query("SELECT * FROM user_profile where status_user = 'user' ; ");
while ($arr5 = pg_fetch_array($result5)) { 
?>                                        
                                        <tr>
                                            <td><?php echo $arr5[name_user]; ?></td>
                                            <td><?php echo $arr5[lname_user]; ?></td>
                                            <td><?php echo $arr5[prov_user]; ?></td>
                                            <td><?php echo $arr5[email_user]; ?></td>
                                            <td><?php echo $arr5[tel_user]; ?></td>
                                            <td><?php echo $arr5[level_user]; ?></td>
                                            <td><center>
                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $arr5[status_user]; ?> <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_level.php?status_user=user&id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > user / ผู้ใช้ทั่วไป</a></li>
                                                <li><a href="assets/update_level.php?status_user=staff&id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > staff / ผู้ปฏับิติการ</a></li>
                                                <li><a href="assets/update_level.php?status_user=analytical&id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Analytical / นักวิเคราะห์</a></li>
                                                <li><a href="assets/update_level.php?status_user=executive&id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > Executive / ผู้บริหาร</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                            <td><center>
                                             <div class="btn-group">
                                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                              แก้ไข <span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/delete_user.php?id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการลบ?')" ><i class="fa fa-close"></i> ลบข้อมูล</a></li>
                                                <li><a href="assets/reset_pass.php?id=<?php echo $arr5[id_user]; ?>" onclick="return confirm('ยืนยันการรีเซ็ตรหัสผ่านของ <?php echo $arr5[name_user] ,' ',$arr2[lname_user] ; ?>?')" ><i class="fa fa-history"></i> รีเซ็ตรหัสผ่าน</a></li>
                                              </ul>
                                            </div>
                                             </center>
                                            </td>
                                        </tr>
<?php } ?>                                        
                                    </tbody>
                                </table>
                              </div>








                            </div>
                        </div>
                    </div>



                </div>
                <!-- /.row -->
                            </div>
                        </div>
                </div>

            </div>
        </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                           
                        </li>
                        <li>
                            <a href=""><img src="../img/logo_footer.png" width="80px" alt=""></a>
                            
                        </li>
                       
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;  2018 | สำนักงานทรัพยากรธรรมชาติและสิ่งแวดล้อมจังหวัดเชียงราย
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- <script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "ยินดีต้อนรับ <b>เข้าสู่ระบบ OMFS </b> <br> ท่านเข้าใช้งานในส่วนของผู้ใช้งานทั่วไป"

            },{
                type: 'danger',
                timer: 4000
            });

    	});
	</script> -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>-->
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>



<script>
    $(document).ready(function() {


    $('#example1').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example2').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example3').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example4').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );

    $('#example5').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );



} );

</script>

</html>
