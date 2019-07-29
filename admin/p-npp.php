<!doctype html>
<html lang="en">
<?php
include('../libs/config_omfs.php');

/* session_start();
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
    } */


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
             req.open("GET", "assets/location.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('prov_name', -1);  
    </script>
<style>
td,
th {
  padding: 0;
  font-size: 12px;
}
</style>
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
                <li>
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
                <li class="active">
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
                                <small> ออกจากระบบ</small>    
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
				<ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">จุดความร้อนรายวัน</a></li>
									<li><a data-toggle="tab" href="#fire2">จุดความร้อนย้อนหลัง 2 วัน</a></li>
									<li><a data-toggle="tab" href="#fire7">จุดความร้อนย้อนหลัง 7 วัน</a></li>
                                    <li><a data-toggle="tab" href="#menu1">จุดความร้อนทั้งหมด</a></li>
                </ul>
				
				<div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
									<br/>
                                          <div class="card">
                               <iframe src="fire_modis24.php" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                            
                        </div>
                                    </div>
									
									<div id="fire2" class="tab-pane fade">
									<br/>
                                          <div class="card">
                               <iframe src="fire_modis48.php" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                            
                        </div>
                                    </div>
									
									<div id="fire7" class="tab-pane fade">
									<br/>
                                          <div class="card">
                               <iframe src="fire_modis7.php" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                            
                        </div>
                                    </div>
									
									
                <div id="menu1" class="tab-pane fade">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">เลือกข้อมูล</h4>
                            </div>
                            <div class="content">
                                <form action="map_viirs.php" target="map_fire" name="form1">
                                 <div class="form-group">
                                                <label class="col-md-12">จังหวัด</label>
                                            <span id="prov_name">
                                                <select class="form-control" id="select" name="prov_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                                <label class="col-md-12">อำเภอ</label>
                                            <span id="amphoe_name">
                                                <select class="form-control" id="select" name="amphoe_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                                <label for="exampleInputPassword1">ตำบล</label>
                                            <span id="tambon_name">
                                                <select class="form-control" id="select" name="tambon_name" >
                                                   <option value=''>- - เลือกทั้งหมด - - </option>
                                                </select>
                                            </span>
                                            </div>
                                 <div class="form-group">
                                      <label for="exampleSelect2">ช่วงเวลาเริ่มต้น</label>
                                            <input type="date" class="form-control" id="myDate1" value="2018-03-01" onChange="this.form.submit();" name="date_start">
                                    </div>
                                 <div class="form-group">
                                      <label for="exampleSelect2">ช่วงเวลาสิ้นสุด</label>
                                            <input type="date" class="form-control" id="myDate2" value="2018-04-01" onChange="this.form.submit();" name="date_end">
                                    </div>


                                 <div class="form-group">
                                      <label for="exampleSelect2">ประเภทป่า</label>
                                      <select  class="form-control" id="exampleSelect2" name="fr_desc" onChange="this.form.submit();">
                                        <option value="%">ป่าทุกประเภท</option>
                                        <option>ป่าอนุรักษ์</option>
                                        <option>ป่าสงวนแห่งชาติ</option>
                                        <option>ป่าสงวนแห่งชาติและป่าอนุรักษ์</option>
                                      </select>
                                    </div> <hr> 
                                 <label class="checkbox">
                                   <input type="checkbox" data-toggle="checkbox" value="1" name="show_point"  onChange="this.form.submit();"  checked="">
                                        แสดงจุดตำแหน่งการเผา
                                 </label>
                                </form>
                            </div>
                        </div>
                    </div>
					

                    <div class="col-md-8">
                        <div class="card">
                             <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home">แผนที่แสดงจุดความร้อน</a></li>
                         <li><a data-toggle="tab" href="#menu1">ตารางข้อมูล Suomi NPP</a></li>
                         </ul>
                              
                            <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                          <iframe src="map_viirs.php?show_point=1" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
   
                                         <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>ละติจูด</th>
                                            <th>ลองจิจูด</th>
                                            <th>วันที่</th>
											<th>เวลา</th>
											<th>ค่าความเชื่อมั่น</th>
                                            <th>ตำบล</th>
                                            <th>อำเภอ</th>
                                            <th>จังหวัด</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
											$date =  date("Y-m-d") ;
											$sql = pg_query("SELECT * from fire_viirs
											where acq_date = '$date'
											order by acq_date desc");
											while ( $objQuery = pg_fetch_array($sql) ) {
										?>                                        
                                        <tr>
                                            <td><?php echo $objQuery[latitude]; ?></td>
                                            <td><?php echo $objQuery[longitude]; ?></td>
                                            <td><?php echo $objQuery[acq_date]; ?></td>
											<td><?php echo $objQuery[acq_time]; ?></td>
											<td><?php echo $objQuery[confidence]; ?></td>
                                            <td><?php echo $objQuery[tb_tn]; ?></td>
                                            <td><?php echo $objQuery[ap_tn]; ?></td>
                                            <td><?php echo $objQuery[pv_tn]; ?></td>
                                            
                                        </tr>   
							<?php } ?>										
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            
                        </div>
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

	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
function myFunction() {
    document.getElementById("myDate1").defaultValue = "2018-03-01";
    document.getElementById("myDate2").defaultValue = "2018-04-01";
}
</script>
<script>

    $(document).ready(function() {

    $('#example').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );


} );
</script>
</html>
