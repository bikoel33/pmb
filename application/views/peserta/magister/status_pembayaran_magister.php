<script type="text/javascript">
</script>
<div class="ui-widget">
  <div class="ui-state-highlight ui-corner-all">
    <p><i class="icon-user"></i>
    <strong><?php echo $judul;?></strong></p>
  </div>
</div>
<form id="my-form" name="my-form" method="POST" action="#">
<table class="table table-bordered table-striped table-hover">
<tbody>
<tr>
	<td colspan="2"><h4>Konfirmasi Pembayaran</h4></td>
</tr>
<tr>
	<td class="span4">Nomor Ujian Anda </td>
    <td><strong><?php echo $this->app_model->CariNoUjian($this->session->userdata('nik'));?></strong></td>
</tr>     
<tr>
	<td class="span4">Ruang Ujian Anda </td>
    <td><strong><?php echo $this->app_model->CariRuangUjian($this->session->userdata('nik'));?></strong></td>
</tr> 
<tr>
	<td class="span4">Lokasi Kampus </td>
    <td><strong><?php echo $lokasi;?></strong></td>
</tr> 
<tr>
	<td class="span4">Program Studi </td>
    <td><strong><?php echo $prodi;?> - <?php echo $this->app_model->cari_jurusan($prodi);?></strong></td>
</tr> 
<tr>
	<td class="span4">Waktu Perkuliahan </td>
    <td><strong><?php echo $waktu;?></strong></td>
</tr>    
<tr>
	<td class="span4">Nama Lengkap</td>
	<td><strong><?php echo $Nama;?></strong></td>
</tr>
<tr>
	<td class="span4">Status Pembayaran</td>
	<td><strong><font style="color: red"><?php echo $status;?></font></strong></td>
</tr>
</tbody>
</table>
</form>