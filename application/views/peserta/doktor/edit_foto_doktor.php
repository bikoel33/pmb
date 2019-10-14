<script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#my-form').submit(function(e) {
		e.preventDefault();
      $.ajaxFileUpload({
         url         	:'<?php echo site_url(); ?>/peserta/home/simpan_foto_doktor', 
         secureuri      :false,
         fileElementId  :'Foto',
         dataType    	: 'json',
		 data        	   : {
            'nik'  : $('#nik').val()
         },
         success  : function (data,status){
			if(data.status != 'error'){
			   window.location.assign("<?php echo site_url();?>/peserta/home/edit_ktp_doktor");
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
<table class="table table-bordered table-striped table-hover">
<tbody>
<tr>
	<td colspan="2"><h4>B. Silahkan Upload Foto Anda ukuran 4x6 tidak lebih dari 2Mb.</h4></td>
</tr>    
<tr>
	<td class="span4">Ulangi Upload Foto</td>
	<td><input type="file" name="Foto" id="Foto" class="span4"></td>
</tr>
<tr>
   <td colspan="2">Foto Yang Telah di Upload <br />
      <?php 
         $foto = $this->app_model->cek_foto($this->session->userdata('nik'));
         if(empty($foto)){
      ?>
      <img src="<?php echo base_url();?>peserta/foto/kosong.png" class="img-rounded"></center>
      <?php }else{ ?>
      <img src="<?php echo base_url();?>peserta/foto/<?php echo $foto;?>" class="img-rounded"></center>
      <?php } ?>
   </td>
</tr>
<tr>
	<td colspan="2">Jika Tidak Ingin Merubah Silahkan Klik Abaikan !!!</td>
</tr>  
<tr>
	<td colspan="2"><center>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_formulir_doktor" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
    <button type="submit" name="simpan" id="simpan" class="btn btn-success"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_ktp_doktor" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a>
    </center>
</tbody>
</table>
</form>
<div id="files"></div>