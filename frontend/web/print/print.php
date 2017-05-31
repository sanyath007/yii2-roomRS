<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
        <title>แบบฟอร์มการขอจองห้องประชุม</title>
        <meta content="MSHTML 6.00.2900.5726" name=GENERATOR>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <link href="print_php_files/styles.css" type=text/css rel=stylesheet>
        
        <style type=text/css>
            body {
                PADDING-RIGHT: 0px; 
                PADDING-LEFT: 0px; 
                PADDING-BOTTOM: 0px; 
                MARGIN: 0px; 
                PADDING-TOP: 0px;
                background-color: #ffffff;
                height: 842px;
            }
            a:link {
                COLOR: #0000ff; 
                TEXT-DECORATION: none
            }
            a:visited {
                COLOR: #005ca2; 
                TEXT-DECORATION: none
            }
            a:active {
                COLOR: #0099ff; 
                TEXT-DECORATION: underline
            }
            a:hover {
                COLOR: #0099ff; 
                TEXT-DECORATION: underline
            }

            @media Print {
                div.page {
                    MARGIN: 0px; 
                    HEIGHT: 100%
                }
            }
            .UnderLine {
                FONT-WEIGHT: normal;
                MARGIN: 1px;
                COLOR: #0000ff;
                BORDER-TOP-STYLE: none;
                BORDER-BOTTOM: black 1px dotted;
                FONT-FAMILY: "TH SarabunPSK";
                BORDER-RIGHT-STYLE: none;
                BORDER-LEFT-STYLE: none;
                HEIGHT: 18px;
                TEXT-ALIGN: center
            }
            .UnderLineLeft {
                FONT-WEIGHT: normal; 
                MARGIN: 1px; 
                COLOR: #0000ff; 
                BORDER-TOP-STYLE: none; 
                BORDER-BOTTOM: black 1px dashed; 
                FONT-FAMILY: "TH SarabunPSK"; 
                BORDER-RIGHT-STYLE: none; 
                BORDER-LEFT-STYLE: none; 
                HEIGHT: 18px; 
                TEXT-ALIGN: left
            }
            .formthaitext {
                FONT-WEIGHT: bold; 
                FONT-SIZE: 15px; 
                COLOR: #000000; 
                FONT-FAMILY: "TH SarabunPSK";
            }
            .textform {
                FONT-SIZE: 11px; 
                COLOR: #000000; 
                FONT-FAMILY: Verdana
            }
            .thaitext {
                FONT-SIZE: 13px; 
                COLOR: #000000; 
                FONT-FAMILY: "TH SarabunPSK";
            }
            .thaitext_small {
                FONT-SIZE: 10px; 
                COLOR: #000000; 
                FONT-FAMILY: "TH SarabunPSK";
            }
            .headthaitext {
                FONT-SIZE: 15px; 
                COLOR: #000000; 
                FONT-FAMILY: "TH SarabunPSK";
            }
            .CordiaUPC {
                FONT-SIZE: 12px; 
                COLOR: #000000; 
                FONT-FAMILY: "TH SarabunPSK";
            }
            .buntuekkorkuam {
                font-size: 29pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight:bold;  
                margin-left: -100px;
            }
            .txt-content {
                font-size: 16pt; 
                color: #000000; 
                font-family: "TH SarabunPSK";
            }
            .trh1 {
                height: 30px;
            }
            .trh0 {
                height: 5px;
            }
            p {
                font-size: 16pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight: normal;
            }
            .p16 {
                font-size: 16pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight: bold;
            }
            .p18 {
                font-size: 18pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight: bold;
            }
            .p20 {
                font-size: 20pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight: bold;
            }
            .formnumber {
                font-size: 11pt; 
                color: #000000; 
                font-family: "TH SarabunPSK"; 
                font-weight: bold;
                text-align: center;
                border: 1px solid #000000;
                padding: 0 5 0 5px;
            }
            .indent {
                margin-left: 94px;
            }
            .indent2 {
                margin-left: 30px;
            }
            .hasborder { border:1px solid #F00;  }
            .table {
                border: 1px solid #000000;
                border-collapse: collapse;
            }

            p.MsoNormal, li.MsoNormal, div.MsoNormal,span.MsoNormal {
                border-bottom: 1px dashed #000000;
                margin-top:0cm;
                margin-right:0cm;
                margin-bottom:10.0pt;
                margin-left:0cm;
                line-height:115%;
                font-size:16pt;
                font-family:"TH SarabunPSK";
            }
            .UnderlineTagp {
                border-bottom: 1px dashed #000000; 
                padding: 0px; 
                margin:0px;
                height: 20px
            }
        </style>
        
        <script language=JavaScript src="print_php_files/script.js"></script>
        <script language=JavaScript>
            window.print();
        </script>
            
    </head>

    <body>
        <?php
        // Set connect db
        $db = new PDO("mysql:host=localhost; dbname=room_db; charset=utf8", 'root', '4621008811');
        $db->exec("set names utf8");
        $db->exec("COLLATE utf8_general_ci");
        
        // Set the PDO error mode to exception
        $sql = "select 
        DATE_FORMAT(r.reserve_sdate,'%d') AS date,
        DATE_FORMAT(r.reserve_sdate,'%m') AS month,
        DATE_FORMAT(r.reserve_sdate,'%Y')+543 AS year,
	DATE_FORMAT(r.reserve_stime,'%H:%i') AS start_time, 
	DATE_FORMAT(r.reserve_etime,'%H:%i') AS end_time, 
        r.reserve_id, r.reserve_topic, reserve_activity_type, r.reserve_room, r.reserve_tel, 
        reserve_layout, reserve_equipment, reserve_depart, reserve_user, reserve_budget, reserve_att_num,
        CONCAT(t.prefix_name, p.person_firstname, '  ', p.person_lastname) as person_name, 
        pos.position_name, ac.ac_name, p.person_tel, p.person_email, d.depart_name#, w.ward_name
        from reservation r
	left outer join db_ksh.personal p ON (r.reserve_user=p.person_id)
        left outer join db_ksh.prefix t ON (p.person_prefix = t.prefix_id)
        #left outer join db_ksh.ward w ON (w.ward_id = p.office_id)
        left outer join db_ksh.depart d ON (r.reserve_depart = d.depart_id)
        left outer join db_ksh.position pos ON (p.position_id = pos.position_id)
        left outer join db_ksh.academic ac ON (p.ac_id = ac.ac_id)
        where r.reserve_id=:id ";
        
//        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
//        try {
            $stmt->execute();
//            var_dump($stmt);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
//            var_dump($row);            
            $date = (int)$row['date'];
            $month = $row['month'];
            $year = $row['year'];            
            $start_time = $row['start_time'];
            $end_time = $row['end_time'];
            
            $equipments = explode(',', $row['reserve_equipment']);
//            var_dump($equipments);
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//        }
        ?>
        <div class="page" align="center">
            <div style="width: 660px; margin-left: 65px; margin-right: 15px; margin-top: 0px; padding: 5px;">
                <div style="padding: 0 5 0 5px;">

<!--                    <table width="100%">
                        <tr>
                            <td width="527"></td>
                            <td>
                                <p align="right" class="formnumber">QF-ICT-45 <br> updated 20/10/2559</p>
                            </td>
                        </tr>
                    </table>-->
                    
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <b class="p20"><center>แบบฟอร์มการขอจองห้องประชุม
                                    <br>โรงพยาบาลเทพรัตน์นครราชสีมา</center></b>
                                </td>
                            </tr>
                            
                            <tr class="trh1">
                                <td colspan="2">
                                    <p style="margin: -8 0 0 470px; padding: 2px;">
                                        วันที่
                                        <?php echo $date; ?>  <?php echo thaimonth($month); ?>  <?php echo $year; ?>
                                    </p>
                                </td>
                            </tr>
                            
                            <tr class="trh1">
                                <td colspan="2">
                                    <p>
                                        <b class="p18">เรื่อง</b>&nbsp;&nbsp;ขอจองใช้ห้องประชุม
                                    </p>
                                </td>
                            </tr>
                            
                            <tr class="trh1">
                                <td colspan="2">
                                    <p>
                                        เรียน&nbsp;&nbsp;หัวหน้ากลุ่มงานบริหารทั่วไป
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /HEADER -->
                
                <div style="padding: 0 5 5 5px;"><!-- DETAIL -->
                    <table width="100%">
                        <tr>
                            <td>                                
                                <p style="float: left; padding: 0px; margin:0px;">
                                    1. ข้อมูลผู้ขอใช้ห้องประชุม
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="indent">
                                    <p style="float: left; padding: 0px; margin:0px;">ข้าพเจ้า</p>
                                    <p class="UnderlineTagp" style="width: 477px; margin-left: 45px; ">
                                        &nbsp;&nbsp;<?php echo $row['person_name']; ?>
                                    </p>
                                </div>		 
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="margin: 2px">
                                    <p style="float: left; padding: 0px; margin: 0px;">ตำแหน่ง</p>
                                    <p class="UnderlineTagp" style="width: 220px; margin-left: 50px;">
                                        &nbsp;&nbsp;<?php echo $row['position_name'].$row['ac_name']; ?>
                                    </p>

                                    <p style="float: left; padding: 0; margin:-21 0 0 225px;">หน่วยงาน</p>
                                    <p class="UnderlineTagp" style="width: 285px; float: left; padding: 0px; margin:-25 0 0 330px;">
                                        &nbsp;&nbsp;<?php echo $row['depart_name']; ?>
                                    </p>
                                </div>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <div style="margin: 2px">
                                    <p style="float: left; padding: 0px; margin: 0px;">เบอร์ติดต่อภายใน</p>
                                    <p class="UnderlineTagp" style="width: 70px; margin-left: 105px;">
                                        &nbsp;&nbsp;<?php echo $row['reserve_tel']; ?>
                                    </p>

                                    <p style="float: left; padding: 0; margin:-21 0 0 80px;">อีเมล์</p>
                                    <p class="UnderlineTagp" style="width: 250px; float: left; padding: 0; margin:-22 0 0 0px;">
                                        &nbsp;&nbsp;<?php echo $row['person_email']; ?>
                                    </p>
                                    
                                    <p style="float: left; padding: 0; margin:-21 0 0 252px;">โทรศัพท์</p>
                                    <p class="UnderlineTagp" style="width: 105px; float: left; padding: 0; margin:-25 0 0 512px;">
                                        &nbsp;&nbsp;<?php echo $row['person_tel']; ?>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>                                
                                <p style="float: left; margin:0px; padding: 2px;">
                                    2. หัวข้อการประชุม
                                </p>
                                <p class="UnderlineTagp" style="width: 503px; margin-left: 115px;">
                                    &nbsp;&nbsp;<?php echo $row['reserve_topic']; ?>
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 0px; padding: 2px;">
                                    3. ประเภทกิจกรรม
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_activity_type'] == 1 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ประชุม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_activity_type'] == 2 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    อบรม 
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_activity_type'] == 3 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    สัมมนา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_activity_type'] == 4 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    VDO Conference&nbsp;&nbsp;&nbsp;
                                </p>

                            </td>
                        </tr>     
                       
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">                                    
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_activity_type'] == 5 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    อื่นๆ (โปรด ระบุ) <?php echo $row['others']; ?>
                                </p>
                            </td>
                        </tr>     
                        
                        <tr>
                            <td>
                                <div style="margin: 1px">
                                    <p style="float: left; padding: 0px; margin:0px;">4. วันที่ขอใช้</p>
                                    <p class="UnderlineTagp" style="width: 135px; margin-left: 72px;">
                                        &nbsp;&nbsp;<?php echo $date; ?>&nbsp;&nbsp;<?php echo thaimonth($month); ?> <?php echo $year; ?>
                                    </p>

                                    <p style="float: left; padding: 0px; margin:-21 0 0 138px;">ระหว่างเวลา</p>
                                    <p class="UnderlineTagp" style="width: 140px; float: left; padding: 0px; margin:-22 0 0 3px;">
                                        &nbsp;&nbsp;<?php echo $start_time; ?> ถึง <?php echo $end_time; ?> น.
                                    </p>
                                    
                                    <p style="float: left; padding: 0px; margin:-25 0 0 420px;">จำนวนผู้เข้าร่วมประชุม</p>
                                    <p class="UnderlineTagp" style="width: 65px; float: left; padding: 0px; margin:-25 0 0 550px;">
                                        &nbsp;&nbsp;<?= $row['reserve_att_num']; ?> ท่าน
                                    </p>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 0px; padding: 2px;">
                                    5. ห้องประชุมที่ขอใช้
                                </p>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_room'] == 2 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ห้องประชุมหลวงพ่อพุธ ฐานิโย &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_room'] == 1 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ห้องประชุมมงคล ณ สงขลา 
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_room'] == 5 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ห้องประชุม พญ.พวงเพ็ญ อ่ำบัว&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['room_id'] == 3 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ห้องประชุมศูนย์พัฒนาคุณภาพ
                                </p>

                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_room'] == 4 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ห้องประชุม Audit เวชระเบียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_room'] == 6 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    อื่นๆ (โปรด ระบุ) <?php echo $row['others']; ?>
                                </p>

                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 0px; padding: 2px;">
                                    <b>* หมายเหตุ</b> 
                                    สำหรับห้องประชุมที่จองไว้ทางเจ้าหน้าที่ห้องประชุมจะพิจารณาให้เหมาะสมกับจำนวนคนและลักษณะของการประชุม
                                    (ถ้ามีการเปลี่ยนแปลงเจ้าหน้าที่จะติดต่อหมายเลขโทรศัพท์ที่ผู้จองได้แจ้งไว้)
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 0px; padding: 2px;">
                                    6. อุปกรณ์โสตทัศนูปกรณ์
                                </p>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo(($equipments[0] == 1 || $equipments[1] == 1 || $equipments[2] == 1 || $equipments[3] == 1) ? 'R' : '&pound;'); ?>
                                    </span> 
                                    คอมพิวเตอร์ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo(($equipments[0] == 2 || $equipments[1] == 2 || $equipments[2] == 2 || $equipments[3] == 2) ? 'R' : '&pound;'); ?>
                                    </span> 
                                    Projector 
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo(($equipments[0] == 3 || $equipments[1] == 3 || $equipments[2] == 3 || $equipments[3] == 3) ? 'R' : '&pound;'); ?>
                                    </span> 
                                    Visualizer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo(($equipments[0] == 4 || $equipments[1] == 4 || $equipments[2] == 4 || $equipments[3] == 4) ? 'R' : '&pound;'); ?>
                                    </span> 
                                    ไมโครโฟน
                                </p>

                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 0px; padding: 2px;">
                                    7. รูปแบบการจัดห้องประชุม
                                </p>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 1 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบจัดงานเลี้ยง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 2 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบจัดงานเลี้ยงโต๊ะกลม 
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 3 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบห้องเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 4 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบห้องประชุม
                                </p>

                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -8 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 5 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบโรงภาพยนต์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                   
                                    
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo($row['reserve_layout'] == 6 ? 'R' : '&pound;'); ?>
                                    </span> 
                                    แบบตัว U
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <p style="margin: -5 0 0 0px; padding: 2px;">
                                    8. งบประมาณในการจัดการประชุม
                                </p>
                                <p style="margin: -5 0 0 49px; padding: 2px;">
                                    <span style='font-family:"Wingdings 2"'>
                                        <?php echo(((int)$row['reserve_budget']) > 0 ? 'R' : '&pound;'); ?>
                                    </span> มี&nbsp;&nbsp;งบประมาณ
                                    <span class="UnderlineTagp" style="width: 300px; margin: -10 0 0 0px;">
                                        <?php echo ($row['reserve_budget'] > 0 ? '&nbsp;&nbsp;'.$row['reserve_budget'].'&nbsp;&nbsp;' : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'); ?>
                                    </span> บาท&nbsp;&nbsp;&nbsp;
                                    <span style='font-family:"Wingdings 2";'>
                                        <?php echo($row['reserve_budget'] == 0 ? 'R' : '&pound;'); ?>
                                    </span> ไม่มี&nbsp;&nbsp;&nbsp; 
                                </p>
                            </td>
                        </tr>                    
                        
                        <tr>
                            <td>
                                <p class="indent" style="margin-top: 5px; padding: 2px;">
                                    จึงเรียนมาเพื่อโปรดพิจารณา
                                </p>
                            </td>
                        </tr>
                    </table>


                    <table width="100%" border=0>
                        <tbody>
                            <tr>
                                <td width="50%">
                                    <p style="margin: 5 0 0 15px; padding: 2px;">
                                        ลงชื่อ.....................................................ผู้ขอใช้บริการ
                                    </p>
                                    <p style="margin: -3 2 2 -40px; padding: 0px; text-align: center;">
                                        (&nbsp;&nbsp;&nbsp;<?php echo $row['person_name']; ?>&nbsp;&nbsp;&nbsp;)
                                    </p>
                                    
                                    <p style="float: left; padding: 0px; margin: -5 2 2 15px;">ตำแหน่ง</p>
                                    <p class="UnderlineTagp" style="width: 220px; margin: -5 0 0 70px;">
                                        &nbsp;&nbsp;&nbsp;<?php echo $row['position_name'].$row['ac_name']; ?>
                                    </p>
                                    
                                </td>
                                <td width="50%">
                                    <p style="margin: 5 0 0 15px; padding: 2px;">
                                        ลงชื่อ.....................................................ผู้รับจอง
                                    </p>
                                    <p style="margin: -3 2 2 -40px; padding: 0px; text-align: center;">
                                        (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                                    </p>
                                    <p style="margin: -3 2 2 15px; padding: 0px;">
                                        ตำแหน่ง...........................................................
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td width="50%"></td>
                                <td width="50%" style="padding-top: 15px;">
                                    <p style="margin: -5 2 2 15px;">
                                        <span style='font-family:"Wingdings 2"'>&pound</span> 
                                        อนุญาต&nbsp;&nbsp;&nbsp;
                                        <span style='font-family:"Wingdings 2"'>&pound</span> 
                                        ไม่อนุญาต&nbsp;&nbsp;&nbsp;
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td width="50%"></td>
                                <td width="50%">
                                    <p style="margin: 5 0 0 15px; padding: 2px;">
                                        ลงชื่อ.....................................................ผู้ควบคุม
                                    </p>
                                    <p style="margin: -3 2 2 60px; padding: 0px;">
                                        (...นางอุ่นเรือน..ศิรินาค...)
                                    </p>
                                    <p style="margin: -3 2 2 15px; padding: 0px;">
                                        ตำแหน่ง...นักจัดการงานทั่วไปชำนาญการ...
                                    </p>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" style="padding-top: 5px;">
                                    <p style="margin: -8 0 0 0px; padding: 0px; font-size: 16px;">
                                        <b>** หมายเหตุ</b> 
                                        กรณีที่จองห้องประชุมไว้ล่วงหน้าแล้วไม่ใช้กรณาแจ้งยกเลิกล่วงหน้าก่อน 1 วัน ที่เบอร์ภายใน 2501
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- /DETAIL -->

            </div> <!-- end page -->
        </div>	<!-- end page -->
        <?php
        function thainumDigit($num) {
            return str_replace(
                    array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9'), 
                    array("๐", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙"), 
                    $num
            );
        }

        function thaimonth($monthparam) {
            switch ($monthparam) {
                case 1:
                    $month = 'มกราคม';
                    return $month;
                    break;
                case 2:
                    $month = 'กุมภาพันธ์';
                    return $month;
                    break;
                case 3:
                    $month = 'มีนาคม';
                    return $month;
                    break;
                case 4:
                    $month = 'เมษายน';
                    return $month;
                    break;
                case 5:
                    $month = 'พฤษภาคม';
                    return $month;
                    break;
                case 6:
                    $month = 'มิถุนายน';
                    return $month;
                    break;
                case 7:
                    $month = 'กรกฎาคม';
                    return $month;
                    break;
                case 8:
                    $month = 'สิงหาคม';
                    return $month;
                    break;
                case 9:
                    $month = 'กันยายน';
                    return $month;
                    break;
                case 10:
                    $month = 'ตุลาคม';
                    return $month;
                    break;
                case 11:
                    $month = 'พฤศจิกายน';
                    return $month;
                    break;
                case 12:
                    $month = 'ธันวาคม';
                    return $month;
                    break;
            }
        }
        ?>

    </body>
</html>