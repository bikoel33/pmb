<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administrator <?php echo $this->config->item('nama_aplikasi_pendek');?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyright" content="Deddy Rusdiansyah">
<meta name="author" content="Deddy Rusdiansyah">
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

<script type="text/javascript">
$(document).ready(function(){
	$('#win').window({  
		collapsible:false,  
		minimizable:false,  
		maximizable:false,
		closable:false
	}); 
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
</style>

</head>
<body onLoad="goforit()">

	<div id="win" iconCls="icon-home" class="easyui-window" title="<font face='Times New Roman, serif' color='#ffffff'> <?php echo $this->config->item('nama_instansi');?> </font>" style="width:550px;">  
		
		<div style="padding:2px;background-color:#7b560752; text-align:center">
			<font color="#FFFFFF">
				<strong>
					<?php if(validation_errors()) { ?>
						<p><?php echo validation_errors(); ?></p>
					<?php } ?>

					<?php if($this->session->flashdata('result_login')) { ?>
						<p><?php echo $this->session->flashdata('result_login'); ?></p>
					<?php } ?>
				</strong>
			</font>
		</div>
	
		<div id="kiri" style="float:left;">
			<div id="Profil" style="float:left;width:200px;height:160px;padding:5px; text-align:center;">
				<img src="<?php echo base_url();?>admin/images/logo_unusia.png" width="120" height="100" />
				<h3><font face="Times New Roman, serif" color="#FFFFFF"><?php echo $this->config->item('nama_aplikasi_full');?></font></h3>
			</div>
		</div>

		<div id="tt" class="easyui" style="height:180px;background-color:#7b560752;">
			
			<!-- <div title="Login System" style="padding:10px"> -->
				<form style="padding:20px 20px 10px 40px;" id="fm" method="post" action="<?php echo base_url();?>index.php/administrator/login">  
					<table border="0" align="center">
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
						<tr height="30px">
							<td><font color="#FFFFFF">Username</font></td>
							<td><font color="#FFFFFF">:</font></td>
							<td><input type="text" name="username" id="username" size="20" required="true" data-options="required:true,validType:'length[3,10]'" autofocus></td>
						</tr>
						<tr height="30px">              
							<td><font color="#FFFFFF">Password</font></td>
							<td><font color="#FFFFFF">:</font></td>
							<td><input type="password" name="password" id="password" size="20" required="true"></td>
						</tr>
						<tr height="40px">
							<td colspan="3" align="right"><button type="submit" name="submit" class="easyui-linkbutton" icon="icon-lock_open" >Login</button></td>
						</tr>
					</table>              
					<!-- <div style="padding:10px;text-align:center;">          	
						<button type="submit" name="submit" class="easyui-linkbutton" icon="icon-lock_open" >Login</button>
					</div>   -->
				</form>  
			<!-- </div> -->

		</div> 

		<div style="padding:5px;background:#79bd9a;border:1px solid #ccc; text-align:center">
			<strong>
				Copyright &copy; 2019 - <?php echo $this->config->item('nama_instansi');?>
				<br />
				Email : sekretariat@unusia.ac.id
				<br />
				Halaman ini dimuat selama {elapsed_time} detik 
			</strong>
		</div>   
	</div> 

</body>
</html>
