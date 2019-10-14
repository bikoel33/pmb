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
	<td colspan="2"><h4>A.Data Peserta Pendaftaran <?php echo $this->session->userdata('akademik'); ?></h4></td>
</tr>
<tr>
	<td class="span4">Nomor Ujian Anda</td>
    <td><strong><?php echo $this->app_model->CariNoUjian($this->session->userdata('nik'));?></strong></td>
</tr>     
<tr>
	<td class="span4">Lokasi Kampus</td>
    <td>
		<strong>
			<?php
				if($lokasi=="1"){
					echo "Kampus A (Menteng)";
				}
			?>
			<?php
				if($lokasi=="2"){
					echo "Kampus B (Parung)";
				}
			?>
			<?php
				if($lokasi=="3"){
					echo "Kampus C (Kedoya)";
				}
			?>
		</strong>
	</td>
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
	<td colspan="2"><h4>B. Data Pribadi</h4></td>
</tr>    
<tr>
	<td class="span4">Nama Lengkap</td>
	<td><?php echo $Nama;?></td>
</tr>
<tr>
	<td>Tempat Lahir</td>
	<td><?php echo $TmptLhr;?></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td><?php echo $TglLhr;?></td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td><?php if($JK=='L'){
				echo 'Laki-laki';
	}else{
		echo 'Perempuan';
	};?></td>
</tr>
<tr>	
	<td>Alamat</td>
	<td><?php echo $Alamat1;?><br />
		<?php echo $Alamat2;?>
	</td>
</tr>
<tr>	
	<td>Kota</td>
	<td><?php echo $Kota;?>
	</td>
</tr>
<tr>
	<td>Telepon/HP</td>
	<td><?php echo $Telp;?></td>
</tr>
<tr>	
	<td>Email</td>
	<td><?php echo $EMail;?></td>
</tr>
<tr>	
	<td>Warga Negara</td>
	<td><?php echo $WN;?>
	</td>
</tr>
<!-- <tr>	
	<td>Golongan Darah</td>
	<td><//?php echo $GolDarah;?>
	</td>
</tr> -->
<!-- <tr>	
	<td>Hobby</td>
	<td><//?php echo $Hobby;?></td>
</tr> -->
<!-- <tr>	
	<td>Penyakit Yang Derita</td>
	<td><//?php echo $Penyakit;?></td>
</tr> -->
<!-- <tr>	
	<td>Asal Sekolah</td>
	<td><//?php echo $AsalSek;?>
	</td>
</tr> -->
<tr>	
	<td>Nama Universitas / Perguruan Tinggi</td>
	<td><?php echo $NmAsalSek;?></td>
</tr>
<tr>	
	<td>No Ijazah</td>
	<td><?php echo $NoIjazah;?></td>
</tr>
<tr>	
	<td>Tahun Ijazah</td>
	<td><?php echo $IjTh;?></td>
</tr>
<!-- <tr>	
	<td>Jumlah Mata Pelajaran dalam Ijazah</td>
	<td><//?php echo $IjJmlMP;?></td>
</tr> -->
<!-- <tr>	
	<td>Jumlah Nilai dalam Ijazah</td>
	<td><//?php echo $IjJmlNilai;?></td>
</tr> -->
<tr>
	<td colspan="2"><h4>C. Data Orang Tua</h4></td>
</tr>    
<tr>	
	<td>Nama Ayah</td>
	<td><?php echo $NmAyah;?></td>
</tr>
<tr>	
	<td>Pekerjaan Ayah</td>
	<td><?php echo $KerjaAyah;?>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ayah</td>
	<td><?php echo $HasilAyah;?>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ayah</td>
	<td><?php echo $PendAyah;?>
	</td>
</tr>
<tr>	
	<td>Nama Ibu</td>
	<td><?php echo $NmIbu;?></td>
</tr>
<tr>	
	<td>Pekerjaan Ibu</td>
	<td><?php echo $KerjaIbu;?>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ibu</td>
	<td><?php echo $HasilIbu;?>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ibu</td>
	<td><?php echo $PendIbu;?>
	</td>
</tr>
<tr>	
	<td>Nama Wali</td>
	<td><?php echo $NmWali;?></td>
</tr
><tr>	
	<td>Alamat Wali</td>
	<td><?php echo $AlamatWali;?></td>
</tr>	
<tr>	
	<td>Hubungan Wali</td>
	<td><?php echo $HubWali;?></td>
</tr>
<tr>
	<td colspan="2" align="center"><center><strong>SELESAI</strong></center></td>
</tr>    
<tr>
	<td colspan="2">
		<center>
		
			<?php if($status_bayar == "LUNAS") {?>
				<a href="<?php echo base_url();?>index.php/peserta/home/cetak_doktor" class="btn btn-success"><i class="icon-print icon-white"></i> Download Kartu Ujian</a>
			<?php } ?>
			
			<?php if($status_bayar == "") {?>
				<a href="<?php echo base_url();?>index.php/peserta/home/edit_formulir_doktor" class="btn btn-info"><i class="icon-pencil icon-white"></i> Edit</a>
			<?php } ?>
			
			<a href="<?php echo base_url();?>index.php/peserta/home/logout" class="btn btn-danger"><i class="icon-off icon-white"></i> Tutup</a>
		</center>
	</td>
</tbody>
</table>
</form>