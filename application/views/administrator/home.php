<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Administrator</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyright" content="Rizki Achmadi">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>admin/images/logo_unusia.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>admin/images/logo_unusia.png" type="image/x-icon">
    <link href="<?php echo base_url();?>admin/css/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/themes/cupertino/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin/css/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/smoothness/jquery-ui-1.7.2.custom.css">

        <script type="text/javascript" src="<?php echo base_url();?>admin/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>admin/js/clock.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>admin/js/app.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/jquery.price_format.1.7.js"></script>
        <!--datepicker-->
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.core.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.datepicker-id.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/js/ui.datepicker.js"></script>
        <!--Polling-->
        <script type="text/javascript" src="<?php echo base_url();?>admin/js/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>admin/js/exporting.js"></script>

        <!-- notifikasi -->
        <!-- <script type="text/javascript" src="<?php echo base_url();?>admin/js/notifikasi.js"></script> -->

<script type="text/javascript">
$(function() {
    $("#dataTable tr:even").addClass("stripe1");
    $("#dataTable tr:odd").addClass("stripe2");
    $("#dataTable tr").hover(
        function() {
            $(this).toggleClass("highlight");
        },
        function() {
            $(this).toggleClass("highlight");
        }
    );
});
</script>

<style type="text/css">
body {
    background: #fff;
    color: #000;
    font-size: 11px;
    padding: 0 0 0px;
    font: 13px/20px "TitilliumText14L250wt","Helvetica Neue", Helvetica, Arial, sans-serif; 
    /* background-image:url(<?php echo base_url();?>admin/img/bg_1.png); */
	background-image:url(<?php echo base_url();?>admin/img/bg_2.gif);
	/* background-image:url(<?php echo base_url();?>admin/img/bg_dotted.png); */
}

a {
    text-decoration:none;
    color:#000;
}

.header {
    /* background: #9dd53a; 
    background: -moz-linear-gradient(top, #9dd53a 0%, #a1d54f 50%, #80c217 51%, #7cbc0a 100%); 
    background: -webkit-linear-gradient(top, #9dd53a 0%,#a1d54f 50%,#80c217 51%,#7cbc0a 100%); 
    background: linear-gradient(to bottom, #9dd53a 0%,#a1d54f 50%,#80c217 51%,#7cbc0a 100%); 
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#9dd53a', endColorstr='#7cbc0a',GradientType=0 ); */
    

    background: rgba(210,255,82,1);
    background: -moz-linear-gradient(-45deg, rgba(210,255,82,1) 0%, rgba(13,123,7,1) 0%, rgba(13,123,7,1) 100%);
    background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(210,255,82,1)), color-stop(0%, rgba(13,123,7,1)), color-stop(100%, rgba(13,123,7,1)));
    background: -webkit-linear-gradient(-45deg, rgba(210,255,82,1) 0%, rgba(13,123,7,1) 0%, rgba(13,123,7,1) 100%);
    background: -o-linear-gradient(-45deg, rgba(210,255,82,1) 0%, rgba(13,123,7,1) 0%, rgba(13,123,7,1) 100%);
    background: -ms-linear-gradient(-45deg, rgba(210,255,82,1) 0%, rgba(13,123,7,1) 0%, rgba(13,123,7,1) 100%);
    background: linear-gradient(to bottom, #ffffff 0%,#f6f6f6 47%,#ededed 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2ff52', endColorstr='#0d7b07', GradientType=1 );
    
    height : 70px;
    padding : 2px;
    margin : 0;
}

</style>

</head>
<body onLoad="goforit()" class="easyui-layout">

    <div class="atas" data-options="region:'north',border:false" style="height:105px;padding:0">

        <!-- <div class="header" style="height:70px;background:white;padding:2px;margin:0;">	 -->
        <!-- <div class="header" style="height:70px;padding:2px;margin:0;">	 -->
        <div class="header">
            <div style="float:left; padding:5px; margin:0px;">
                <img src='<?php echo base_url();?>asset/images/logo_unusia.png' style="padding:0; margin:0;" width="70" height="55">
            </div>
            <div class="judul" style="float:left; line-height:3px; margin-top:10px; margin-left:5px;">
                <font face="Times New Roman, serif" color="#069355" size="2">
                    <strong><h1><?php echo $this->config->item('nama_instansi');?></h1></strong>
                </font>
                <p>
                    <font face="Times New Roman, serif" color="#069355" size="2">
                        <?php echo $this->config->item('alamat_instansi');?>
                    </font>
                </p>
            </div>
            <div style="float:right; line-height:5px; text-align:center;margin-top:10px;">
                <font face="Times New Roman, serif" color="#069355" size="2">
                    <h1><?php echo $this->config->item('nama_aplikasi_pendek');?></h1>
                </font>
            </div>
        </div>	

        <div class="panel-header" fit="true" style="height:21px;padding-top:1px;padding-right:20px">
            <div style="float:left;">
                <a href="<?php echo base_url();?>index.php/home" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-home">Home</a>
                <a href="<?php echo base_url();?>index.php/administrator/login/logout" class="easyui-linkbutton" data-options="plain:true" iconCls="icon-logout">Logout</a>
            </div>
            <div style="float:right; padding-top:5px;">
                |&nbsp;&nbsp;<?php echo $this->session->userdata('username');?>&nbsp;&nbsp;| &nbsp;&nbsp; &nbsp;&nbsp; 
                |&nbsp;&nbsp; <span id="clock"></span> &nbsp;&nbsp;|	
            </div>
        </div>

    </div> 

    <div data-options="region:'west',split:true,title:'Menu Utama',iconCls:'icon-menu'" style="width:250px;padding:10px;">
        <?php echo $this->load->view('administrator/menu');?>
    </div>

    <div id="content" data-options="region:'center',iconCls:'icon-content'">     
        <div id="tt" class="easyui-tabs" style="height:auto;">
            <div title="<?php echo $judul;?>" style="padding:10px">
              <?php echo $content;?>	
            </div>
        </div>
    </div> 

    <div class="bawah" data-options="region:'south',border:false" style="height:45px;padding:2px;color:#000;">  
        <div style="padding:5px;background:#fafafa;border:1px solid #ccc; text-align:center;">
            <?php echo $this->config->item('credit_aplikasi');?>
        </div> 
    </div>
    
</body>
</html>

<!-- #007300 -->
