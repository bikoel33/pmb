<script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#my-form').submit(function(e) {
		e.preventDefault();
      $.ajaxFileUpload({
         url         	:'<?php echo site_url(); ?>/peserta/home/simpan_ijazah_sarjana', 
         secureuri      :false,
         fileElementId  :'Foto',
         dataType    	: 'json',
		   data        	: {
            'nik'  : $('#nik').val()
         },
         success  : function (data,status){
			if(data.status != 'error'){
            window.location.assign("<?php echo site_url();?>/peserta/home/edit_skhun_sarjana");
			   // window.location.assign("<?php echo site_url();?>/peserta/home/prodi");
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
	<td colspan="2"><h4>E. Silahkan Upload File (JPG) Ijazah / Surat Keterangan Lulus Anda ukuran File tidak lebih dari 1Mb.</h4></td>
</tr>    
<tr>
	<td class="span4">Ulangi Upload File</td>
	<td><input type="file" name="Foto" id="Foto" class="span4"></td>
</tr>
<tr>
   <td colspan="2">Ijazah Yang Telah di Upload <br />
      <?php 
         $file_ijazah = $this->app_model->cek_ijazah($this->session->userdata('nik'));
         if(empty($file_ijazah)){
      ?>
      <img src="<?php echo base_url();?>peserta/ijazah/kosong.png" class="img-rounded"></center>
      <?php }else{ ?>
      <img src="<?php echo base_url();?>peserta/ijazah/<?php echo $file_ijazah;?>" class="img-rounded"></center>
      <?php } ?>
   </td>
</tr>
<tr>
	<td colspan="2">Jika Tidak Ingin Merubah Silahkan Klik Abaikan !!!</td>
</tr>  
<tr>
	<td colspan="2"><center>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_kk_sarjana" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
    <button type="submit" name="simpan" id="simpan" class="btn btn-success"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
    <a href="<?php echo base_url();?>index.php/peserta/home/edit_skhun_sarjana" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a>
    </center>
</tbody>
</table>
</form>
<div id="files"></div>