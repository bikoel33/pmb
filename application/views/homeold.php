<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $this->config->item('nama_aplikasi_full');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $this->config->item('deskripsi');?>">
<meta name="author" content="deddy rusdiansyah">
<meta name="robots" content="index, follow">
<meta name="keywords" content="<?php echo $this->config->item('keyword');?>">
<meta http-equiv="Copyright" content="<?php echo $this->config->item('nama_instansi');?>">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/logo_unusia.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>asset/images/logo_unusia.png" type="image/x-icon">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-notify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/styles/alert-notification-animations.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
    <link type="text/css" href="<?php echo base_url(); ?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>asset/css/font-awesome-ie7.min.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>asset/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />

        <script src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
        <!-- <script src="<//?php echo base_url(); ?>asset/js/jquery-1.8.2.min.js" type="text/javascript"></script> -->
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.10.2.custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap-tab.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/clock.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/app.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/ui.datepicker-id.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.newsTicker-2.2.js"></script>
        <script src="<?php echo base_url();?>asset/js/docs.js" type="text/javascript"></script>
        <!--Polling-->
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/exporting.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.totemticker.js"></script>
        <!--notif-->
        <script src="<?php echo base_url(); ?>asset/js/bootstrap-notify.js"></script>
        <!--bread-->
        <link href="<?php echo base_url();?>asset/css/breadcrumb.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(document).ready(function(){  
    $('.carousel').carousel({
        interval: 3000
    }); 
    $().newsTicker({
        newsList: ".ticker",
        startDelay: 10,
        tickerRate: 80,
        loopDelay: 5000,
        controls: false,
        ownControls: false,
        stopOnHover: false,
        resumeOffHover: true
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("area[rel^='prettyPhoto']").prettyPhoto();
  
    $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:10000, autoplay_slideshow: true});
    $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

    $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
        custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
        changepicturecallback: function(){ initialize(); }
    });

    $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
        custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
        changepicturecallback: function(){ _bsap.exec(); }
    });
});

function FormatAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}
</script>

<style type="text/css">
.table tr th {
    text-align:center;
}
.error {
    color: red;
    line-height: 10px;
    font-size: 11px;
}
</style>

</head>

<body onLoad="goforit()">
    <div class='notifications bottom-left'></div>
        <div class="navbar navbar-inverse navbar-fixed-top">

            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <span class="span6" style="padding:15px 2px; color:#fff;"><?php echo $this->load->view('alert');?></span>
                    
                    <div class="nav-collapse collapse">
                        <div class="pull-right" style="padding:10px 2px; color:#fff;">
                            <!-- <button class="btn"> -->
                                <!-- <i class="icon-time icon-white"></i>  -->
                                <span id="clock"></span>&nbsp;&nbsp;
                            <!-- </button> -->
                            <a href="<?php echo base_url();?>index.php/administrator/login">
                                <button class="btn btn-success btn-xs"><i class="icon-user icon-white"></i> Admin </button>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=6281295797275&text=Assalaamualaikum%20Admin%20Universitas%20Nahdlatul%20Ulama%20Indonesia">
                                <img src="<?php echo base_url();?>asset/images/whatsapp.png"> <font color="#FFFFFF">Whatsapp</font>
                            </a>
                        </div>
                    </div>
                    <!--/.nav-collapse -->
                    
                </div>
            </div>
   
            <div class="row">
                <div class="alert" style="width:100%;">
                    <div class="container">
                        <div class="pull-left">
                            <img src="<?php echo base_url();?>asset/images/logo_unusia.png" width="52" height="42" style="padding:7px;">
                        </div>
                        <h4 class="alert-heading" style="color:#000; line-height:15px;margin-top:10px;">
                            <font color="#069355" size="3">
                                <?php echo $this->config->item('nama_aplikasi_full');?>
                            </font>
                        </h4>
                        <h3 class="alert-heading" style="color:#000; line-height:15px;">
                            <font face="Times New Roman, serif" color="#069355" size="5">
                                <strong><?php echo $this->config->item('nama_instansi');?></strong>
                            </font>
                        </h3>
                    </div>
                </div>
            </div>

        </div>

        <div style="padding:45px;"></div>
        <div class="container">
            <div class="span12 bs-docs-sidenav-header">
                <table align="center" border="0" width="100%">
                    <tr align="center">
                        <td width="2%">&nbsp;</td>
                        <td width="30%">
                            <div class="progress progress-striped active">
                                <div class="bar bar-success" style="width:50%;">Pendaftaran Gelombang I</div>
                                <div class="bar bar-danger" style="width: 50%;">20 Maret- 12 Mei 2019</div>
                            </div>
                        </td>
                        <td width="2%">&nbsp;</td>
                        <td width="30%">
                            <div class="progress progress-striped active">
                                <div class="bar bar-success"" style="width: 50%;">Pendaftaran Gelombang II</div>
                                <div class="bar bar-danger" style="width: 50%;">13 Mei - 01 Juli 2019</div>
                            </div>
                        </td>
                        <td width="2%">&nbsp;</td>
                        <td width="30%">
                            <div class="progress progress-striped active">
                                <div class="bar bar-success"" style="width: 50%;">Pendaftaran Gelombang III</div>
                                <div class="bar bar-danger" style="width: 50%;">03 Juli - 31 Agustus 2019</div>
                            </div>
                        </td>
                        <td width="2%">&nbsp;</td>
                    </tr>
                </table>
                <!-- <div class="row span4">
                    <div class="progress progress-striped active">
                        <div class="bar" style="width:40%;">Pendaftaran Gelombang I</div>
                        <div class="bar bar-success" style="width: 60%;">12 Februari - 31 Maret 2019</div>
                    </div>
                </div>
                <div class="row span4">
                    <div class="progress progress-striped active">
                        <div class="bar" style="width: 40%;">Pendaftaran Gelombang II</div>
                        <div class="bar bar-success" style="width: 60%;">15 April - 30 Mei 2019</div>
                    </div>
                </div>
                <div class="row span4">
                    <div class="progress progress-striped active">
                        <div class="bar" style="width: 40%;">Pendaftaran Gelombang III</div>
                        <div class="bar bar-success" style="width: 60%;">16 Juni - 30 Juli 2019</div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="span3 kotak">

                    <div class="bs-docs-sidenav-kotak" display="none">

                        <div class="error">
                            <?php echo validation_errors(); ?>
                            <?php if($this->session->flashdata('result_login')) { ?>
                                <?php echo $this->session->flashdata('result_login'); ?>
                            <?php } ?>
                        </div>

                        <form method="POST" action="<?php echo base_url();?>index.php/home/login">
                            <fieldset>
                                <label><strong>NIK KTP</strong></label>
                                <input type="text" name="nik" placeholder="NIK KTP" onkeypress="return FormatAngka(event)" />

                                <label><strong>Password</strong></label>
                                <input type="password" name="password" placeholder="Password">
                                <table width="100%" align="center" border="0">
                                    <tr>
                                        <td align="left" width="50%"><button type="submit" class="btn btn-success"><i class="icon-ok-sign"></i> Login User</button></td>
                                        <td align="right" width="50%">
                                            <a href="<?php echo base_url();?>index.php/home/register_user">    
                                                <u>Register</u>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                
                                <!-- <button type="submit" class="btn btn-success"><i class="icon-ok-sign"></i> Login</button> -->
                            </fieldset>
                        </form>

                    </div>

                    <ul class="nav nav-list bs-docs-sidenav">
                        <li><a href="<?php echo base_url();?>"><i class="icon-home"></i> <i class="icon-chevron-right"></i> Home</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/alur"><i class="icon-road"></i> <i class="icon-chevron-right"></i> Alur Pendaftaran</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/panduan"><i class="icon-book"></i> <i class="icon-chevron-right"></i> Fasilitas</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/prodi"><i class="icon-th-list"></i> <i class="icon-chevron-right"></i> Program Studi</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/grafik_survey"><i class="icon-signal"></i> <i class="icon-chevron-right"></i> Grafik Survey</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/pengumuman"><i class="icon-check"></i> <i class="icon-chevron-right"></i> Pengumuman Kelulusan</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/panitia"><i class="icon-user"></i> <i class="icon-chevron-right"></i> Kontak Panitia</a></li>
                    </ul>
                    
                    <div class="bs-docs-sidenav-kotak">
                        <h5>Pengunjung</h5>
                        <ul class="unstyled">
                            <?php 
                                $total = $this->psb_model->pengunjung();
                                $online = $this->psb_model->online();
                                $hari_ini = $this->psb_model->pengunjung_hari_ini();
                            ?>
                            <li><img src="<?php echo base_url();?>asset/images/counter/hariini.png"> Pengunjung Hari ini : <b><?php echo $hari_ini;?> </b></li>
                            <li><img src="<?php echo base_url();?>asset/images/counter/total.png"> Total Pengunjung : <b><?php echo $total;?> </b></li>
                            <li><img src="<?php echo base_url();?>asset/images/counter/online.png"> Pengunjung Online : <b><?php echo $online;?></b></li>
                            <li><i class="icon-globe"></i> Browser : <?php echo $this->agent->browser();?></li>
                            <li><i class="icon-qrcode"></i> OS : <?php echo $this->agent->platform();?></li>
                            <li><i class="icon-eye-open"></i> IP Address : <?php echo $this->input->ip_address();?></li>
                        </ul>                
                    </div>
                </div>
		
                <div class="span9 bs-docs-sidenav-content">
                    <?php echo $content;?>
                </div>

            </div>
		
        </div>
    </div>
    <!-- /container -->
     
    <footer class="footer">
        <div class="footer-inner">	
            <div class="container">
                <div class="span12">
                    <font color="#fff">
                        <?php echo $this->config->item('credit_aplikasi');?>
                        <br>
                        <?php echo $this->config->item('alamat_instansi');?>  
                    </font>          
                </div>      
            </div>
        </div>
    </footer> 
    
    <!-- Start Modal Kontak Bantuan -->
    <div class="modal fade " id="myModal_register" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Daftar User Login</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Finish Modal Kontak Bantuan -->

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

    $('.btn_register_user').on("click", function(){
        $('#myModal_register').find(".modal-body").html('');
        $('#myModal_register').find(".modal-body").load('<?php echo base_url('index.php/home/register_user'); ?>');
        $('#myModal_register').modal({keyboard: true, backdrop: "static"});
    });

    // $("#btnSimpan").click(function(){
    // insert_daftar_login();
    // });

    // function insert_daftar_login(){
    //     var data3 = JSON.stringify({
    //         nama:$('#nama').val(),
    //         no_hp:$('#no_hp').val(),
    //         nisn:$('#nisn').val(),
    //         pin:$('#pin').val()
    //     });
    //     // alert(data3);
    //     // ajax adding data to database
    //     $.ajax({
    //         type:"POST",
    //         url:"<?php echo base_url('index.php/home/insert_daftar_login'); ?>",
    //         data:"<?=$this->security->get_csrf_token_name()?>=<?=$this->security->get_csrf_hash()?>&datanya2="+data3,
    //         // data: data3,
    //         success:function(data3){
    //             // alert(data3);
    //             swal("-| SUKSES |-", "Pendaftaran User Login Berhasil");
    //         },
    //         error:function(data3) {
    //             swal("- PERINGATAN -", "Data Pendaftaran Eror");
    //         },
    //     });
    // }

});

// $("#btnSimpan").click(function(){
//     insert_daftar_login();
// });

// function insert_daftar_login(){
//     var data3 = JSON.stringify({
//         nama:$('#nama').val(),
//         no_hp:$('#no_hp').val(),
//         nisn:$('#nisn').val(),
//         pin:$('#pin').val()
//     });
//     // alert(data3);
//     // ajax adding data to database
//     $.ajax({
//         type:"POST",
//         url:"<?php echo base_url('index.php/home/insert_daftar_login'); ?>",
//         data:"<?=$this->security->get_csrf_token_name()?>=<?=$this->security->get_csrf_hash()?>&datanya2="+data3,
//         // data: data3,
//         success:function(data3){
//             // alert(data3);
//             swal("-| SUKSES |-", "Pendaftaran User Login Berhasil");
//         },
//         error:function(data3) {
//             swal("- PERINGATAN -", "Data Pendaftaran Eror");
//         },
//     });
// }
</script>