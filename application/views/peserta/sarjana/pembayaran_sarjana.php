<script src="<?php echo base_url();?>peserta/assets/js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#my-form').submit(function(e) {
		e.preventDefault();
      $.ajaxFileUpload({
         url         	:'<?php echo site_url(); ?>/peserta/home/simpan_pembayaran_sarjana', 
         secureuri      :false,
         fileElementId  :'bukti_pembayaran',
         dataType    	: 'json',
		   data        	: {
            'nik'  : $('#nik').val(),
            'nm_bank_pengirim': $('#nm_bank_pengirim').val(),
            'nm_pengirim': $('#nm_pengirim').val(),
            'norek_pengirim': $('#norek_pengirim').val()
         },
         success  : function (data,status){
			if(data.status != 'error'){
			   window.location.assign("<?php echo site_url();?>/peserta/home");
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
  <td colspan="2"><h4>Silahkan melakukan pembayaran uang pendaftaran sebesar Rp. 400.000,-</h4></td>
</tr>
<tr>
  <td><h5>Bank</h4></td>
  <td><h5>: Bank Syariah Mandiri (BSM)</h4></td>
</tr>
<tr>
  <td><h5>No. Rekening</h4></td>
  <td><h5>: 7130090038</h4></td>
</tr>
<tr>
  <td><h5>Atas Nama</h4></td>
  <td><h5>: Universitas NU Indonesia</h4></td>
</tr>
<tr>
	<td colspan="2"><h4>Silahkan Upload Bukti Pembayaran Pendaftaran Mahasiswa Baru (JPG), Ukuran File tidak lebih dari 1Mb.</h4></td>
</tr>
<tr>
  <td class="span4">Nama Bank Pengirim</td>
  <td><input type="text" name="nm_bank_pengirim" id="nm_bank_pengirim" class="span4"></td>
</tr>
<tr>
  <td class="span4">Nama Pengirim</td>
  <td><input type="text" name="nm_pengirim" id="nm_pengirim" class="span4"></td>
</tr>
<tr>
  <td class="span4">Nomor Rekening Pengirim</td>
  <td><input type="text" name="norek_pengirim" id="norek_pengirim" class="span4"></td>
</tr>    
<tr>
	<td class="span4">Upload Bukti Pembayaran</td>
	<td><input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="span4"></td>
</tr>
<tr>
	<td colspan="2">Silahkan Klik Upload !!!</td>
</tr>  
<tr>
	<td colspan="2"><center>
    <button type="submit" name="simpan" id="simpan" class="btn btn-primary"><i class="icon-hand-right icon-white"></i> Upload Bukti Pembayaran</button>
    </center>
</tbody>
</table>
</form>
<div id="files"></div>