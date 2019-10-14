<script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#my-form').submit(function(e) {
		e.preventDefault();
      $.ajaxFileUpload({
         url         	:'<?php echo site_url(); ?>/peserta/home/simpan_skhun_diploma', 
         secureuri      :false,
         fileElementId  :'Foto',
         dataType    	: 'json',
		   data         : {
            'nik'  : $('#nik').val(),
            'jalur'  : $('#jalur').val()
         },
         success  : function (data,status,jalur){
      if(data.status != 'error' && data.jalur == "prestasi"){
         window.location.assign("<?php echo site_url();?>/peserta/home/nilai_rapot_diploma");
            }else if(data.status != 'error' && data.jalur != "prestasi"){
              window.location.assign("<?php echo site_url();?>/peserta/home/survey_diploma");
            }
            alert(data.msg);
         }
      });
      return false;
   });
   
});
</script>
<div class="ui-widget">
  <div class="ui-state-highlight ui-corner-all">
    <p><i class="icon-user"></i>
    <strong><?php echo $judul;?></strong></p>
  </div>
</div>
<form id="my-form" name="my-form" method="POST" action="" enctype="multipart/form-data">
<input type="hidden" name="nik" id="nik" value="<?php echo $this->session->userdata('nik');?>" />
<input type="hidden" name="jalur" id="jalur" value="<?php echo $this->session->userdata('jalur');?>" />
<table class="table table-bordered table-striped table-hover">
<tbody>
<tr>
	<td colspan="2"><h4>F. Silahkan Upload File (JPG) SKHUN Anda ukuran File tidak lebih dari 1Mb.</h4></td>
</tr>    
<tr>
	<td class="span4">Upload File</td>
	<td><input type="file" name="Foto" id="Foto" class="span4"></td>
</tr>
<tr>
	<td colspan="2">Silahkan Klik Lanjut !!!</td>
</tr>  
<tr>
	<td colspan="2"><center>
    <a href="<?php echo base_url();?>index.php/peserta/home/ijazah_diploma" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
    <button type="submit" name="simpan" id="simpan" class="btn btn-primary"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
    <?php if($this->session->userdata('jalur') == "prestasi"){ ?>
    <!--a href="<?php echo base_url();?>index.php/peserta/home/nilai_rapot_diploma" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a--> <?php }else{?>
    <!--a href="<?php echo base_url();?>index.php/peserta/home/survey_diploma" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a--><?php } ?>
    </center>
</tbody>
</table>
</form>
<div id="files"></div>