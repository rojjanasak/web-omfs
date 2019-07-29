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
             req.open("GET", "assets/location.php?data="+src+"&val="+val); 
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
                <li class="active">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">สถานะการแจ้งเตือนจุดความร้อน</h4>
                            </div>
                            <div class="content">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">แผนที่แสดงสถานะการแจ้งเตือน</a></li>
                                    <li><a data-toggle="tab" href="#menu1">ตารางแก้ไขสถานะ</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <hr>
                                          <iframe src="map_status_fire.php" name="map_fire" frameborder="0" width="100%" height="670px"></iframe>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <hr>    
                                         <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>ละติจูด</th>
                                            <th>ลองจิจูด</th>
                                            <th>วันที่</th>
                                            <th>ตำบล</th>
                                            <th>อำเภอ</th>
                                            <th>จังหวัด</th>
                                            <th>สถานะไฟ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
    $sql = pg_query("SELECT * from fire_status");
    while ( $objQuery = pg_fetch_array($sql) ) {
?>                                        
                                        <tr>
                                            <td><?php echo $objQuery[latitude]; ?></td>
                                            <td><?php echo $objQuery[longitude]; ?></td>
                                            <td><?php echo $objQuery[acq_date]; ?></td>
                                            <td><?php echo $objQuery[tb_tn]; ?></td>
                                            <td><?php echo $objQuery[ap_tn]; ?></td>
                                            <td><?php echo $objQuery[pv_tn]; ?></td>
                                            <td>
                                                <?php 
                                                    if ($objQuery[status] == 'type1') {
                                                        $status = "ไม่ใช่จุดที่เกิดไฟป่า";
                                                    }else if($objQuery[status] == 'type2'){
                                                        $status = "จุดไฟป่าที่ทำการดับแล้ว";
                                                    }else if($objQuery[status] == 'type3'){
                                                        $status = "ยังไม่ได้ดำเนินการ";
                                                    }else{
                                                        $status = "";
                                                    }
                                                ?>

                                             <div class="btn-group  ">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                              สถานะปัจจุบัน : <?php echo $status; ?><span class="caret"></span></button>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="assets/update_status_fire.php?status_fire=type1&id=<?php echo $objQuery[gid]; ?>" onclick="return confirm('ยืนยันการบันทึก?')" > ไม่ใช่จุดที่เกิดไฟป่า </a>
                                                </li>
                                                <li><a href="assets/update_status_fire.php?status_fire=type2&id=<?php echo $objQuery[gid]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > จุดไฟป่าที่ทำการดับแล้ว </a></li>
                                                <li><a href="assets/update_status_fire.php?status_fire=type3&id=<?php echo $objQuery[gid]; ?>" onclick="return confirm('ยืนยันการบันทึก ?')" > ยังไม่ได้ดำเนินการ </a>
                                                </li>
                                              </ul>
                                            </div>
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
<!--     <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>-->
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


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
