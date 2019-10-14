<script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#my-form').submit(function(e) {
		e.preventDefault();
      $.ajaxFileUpload({
         url         	:'<?php echo site_url(); ?>/peserta/home/simpan_surat_pernyataan_magister', 
         secureuri      :false,
         fileElementId  :'Foto',
         dataType    	: 'json',
		   data        	: {
            'nik'  : $('#nik').val()
         },
         success  : function (data,status){
			if(data.status != 'error'){
			   window.location.assign("<?php echo site_url();?>/peserta/home/edit_prodi_magister");
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
	<td colspan="2"><h4>G. Silahkan Upload File (JPG) Surat Pernyataan Anda ukuran File tidak lebih dari 1Mb.</h4></td>
</tr>
<tr>
  <td class="span4"><u><font color="red">Download Template Surat Pernyataan</font></u></td>
  <td><a href="<?php echo base_url();?>peserta/template/SURAT PERNYATAAN MHS REGULER.pdf"><u><font color="red">Disini</font></u></td>
</tr>     
<tr>
	<td class="span4">Ulangi Upload File</td>
	<td><input type="file" name="Foto" id="Foto" class="span4"></td>
</tr>
<tr>
   <td colspan="2">Surat Pernyataan Yang Telah di Upload <br />
      <?php 
         $surat_pernyataan = $this->app_model->cek_surat_pernyataan($this->session->userdata('nik'));
         if(empty($surat_pernyataan)){
      ?>
      <img src="<?php echo base_url();?>peserta/surat_pernyataan/kosong.png" class="img-rounded"></center>
      <?php }else{ ?>
      <img src="<?php echo base_url();?>peserta/surat_pernyataan/<?php echo $surat_pernyataan;?>" class="img-rounded"></center>
      <?php } ?>
   </td>
</tr>
<tr>
	<td colspan="2">Jika Tidak Ingin Merubah Silahkan Klik Abaikan !!!</td>
</tr>  
<tr>
	<td colspan="2"><center>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_proposal_magister" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
    <button type="submit" name="simpan" id="simpan" class="btn btn-success"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_prodi_magister" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a>
    </center>
</tbody>
</table>
</form>
<div id="files"></div>