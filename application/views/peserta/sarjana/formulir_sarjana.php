<script type="text/javascript">
$(document).ready(function() { 

	  	$('#sel_lokasi').change(function(){
      	var city = $(this).val();
      	var akademik = $('#akademik').val();

		// AJAX request
		$.ajax({
			url:'<?=base_url()?>index.php/peserta/User/getCityDepartment',
			method: 'post',
			data: {city: city, akademik:akademik},
			dataType: 'json',
			success: function(response){

				// Remove options 
				$('#sel_waktu').find('option').not(':first').remove();
				$('#sel_prodi').find('option').not(':first').remove();
				$('#sel_prodi2').find('option').not(':first').remove();

				// Add options
				$.each(response,function(index,data){
					$('#sel_prodi').append('<option value="'+data['sing']+'">'+data['jur_baru']+'</option>');
					$('#sel_prodi2').append('<option value="'+data['sing']+'">'+data['jur_baru']+'</option>');
				});
        	}
      	});
  	});
 
   // Department change
   $('#sel_prodi').change(function(){
		var department = $(this).val();
		var city = $("#sel_lokasi").val();

		// AJAX request
		$.ajax({
			url:'<?=base_url()?>index.php/peserta/User/getDepartmentUsers',
			method: 'post',
			data: {department: department, city:city},
			dataType: 'json',
			success: function(response){
	
				// Remove options
				$('#sel_waktu').find('option').not(':first').remove();

				// Add options
				$.each(response,function(index,data){
					$('#sel_waktu').append('<option value="'+data['waktu']+'">'+data['waktu']+'</option>');
				});
			}
    	});
  	});
   $('#sel_prodi2').change(function(){
		var department = $(this).val();
		var city = $("#sel_lokasi").val();

		// AJAX request
		$.ajax({
			url:'<?=base_url()?>index.php/peserta/User/getDepartmentUsers',
			method: 'post',
			data: {department: department, city:city},
			dataType: 'json',
			success: function(response){
	
				// Remove options
				$('#sel_waktu2').find('option').not(':first').remove();

				// Add options
				$.each(response,function(index,data){
					$('#sel_waktu2').append('<option value="'+data['waktu']+'">'+data['waktu']+'</option>');
				});
			}
    	});
  	});

   
	// $("#Nama").focus();
	
	$("#TglLhr").datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "-50:+0",
	});
    $( "#anim" ).change(function() {
      $( "#TglLhr" ).datepicker( "option", "showAnim", "slideDown" );
    });
	
	
	$("#simpan").click(function(){
		var Nama	= $("#Nama").val();
		var TmptLhr	= $("#TmptLhr").val();
		var TglLhr	= $("#TglLhr").val();
		var Alamat1	= $("#Alamat1").val();
		var Kota	= $("#Kota").val();
		var Telp	= $("#Telp").val();
		var AsalSek	= $("#AsalSek").val();
		var NmAyah	= $("#NmAyah").val();
		var NmIbu	= $("#NmIbu").val();
		
		var string = $("#my-form").serialize();
			
		if(Nama.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Nama Lengkap tidak boleh kosong'},type:'info'
			}).show();
			$("#Nama").focus();
			return false();
		}
		if(TmptLhr.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Tempat Lahir tidak boleh kosong'},type:'info'
			}).show();
			$("#TmptLhr").focus();
			return false();
		}
		if(TglLhr.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Tanggal Lahir tidak boleh kosong'},type:'info'
			}).show();
			$("#TglLhr").focus();
			return false();
		}
		if(Alamat1.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Alamat tidak boleh kosong'},type:'info'
			}).show();
			$("#Alamat1").focus();
			return false();
		}
		if(Kota.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Kota tidak boleh kosong'},type:'info'
			}).show();
			$("#Kota").focus();
			return false();
		}
		if(Telp.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Telepon tidak boleh kosong'},type:'info'
			}).show();
			$("#Telp").focus();
			return false();
		}
		if(AsalSek.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Asal Sekolah tidak boleh kosong'},type:'info'
			}).show();
			$("#AsalSek").focus();
			return false();
		}
		if(NmAyah.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Nama Ayah tidak boleh kosong'},type:'info'
			}).show();
			$("#NmAyah").focus();
			return false();
		}
		if(NmIbu.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Nama Ibu tidak boleh kosong'},type:'info'
			}).show();
			$("#NmIbu").focus();
			return false();
		}

		var lokasi = $("#sel_lokasi").val();
		var prodi = $("#sel_prodi").val();
		var waktu = $("#sel_waktu").val();
		var prodi2 = $("#sel_prodi2").val();
		var waktu2 = $("#sel_waktu2").val();
    
    	var string = $("#my-form").serialize();
      
		if(lokasi.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Lokasi tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_lokasi").focus();
			return false();
		}
		if(prodi.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Program Studi Ke-1 tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_prodi").focus();
			return false();
		}
		if(waktu.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Waktu Perkuliahan Ke-1 tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_waktu").focus();
			return false();
		}
		if(prodi2.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Program Studi Ke-2 tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_prodi2").focus();
			return false();
		}
		if(waktu2.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Waktu Perkuliahan Ke-2 tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_waktu2").focus();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/peserta/home/simpan_biodata_sarjana",  // load controller
			data	: string,
			cache	: false,
			dataType  : 'json',
			success	: function(data){
				if(data.status != 'error'){
			   		window.location.assign("<?php echo site_url();?>/peserta/home/foto_sarjana")  // load controller
            	}
            	alert(data.msg);
			}
		});
		//return false();
		
	});
	
});
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
	<td colspan="2"><h4>A. Data Pribadi</h4></td>
</tr>    
<tr>
	<td class="span4">Nama Lengkap</td>
	<td>
		<input type="text" name="Nama" id="Nama" class="span4" value="<?php echo $this->session->userdata('nama');?>" disabled>
		<input type="hidden" name="Nama" id="Nama" class="span4" value="<?php echo $this->session->userdata('nama');?>">
	</td>
</tr>
<tr>
	<td>NISN</td>
	<td><input type="text" name="nisn" id="nisn" class="span5" autofocus></td>
</tr>
<tr>
	<td>Tempat Lahir</td>
	<td><input type="text" name="TmptLhr" id="TmptLhr" class="span5"></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td><input type="text" name="TglLhr" id="TglLhr" class="span2"> *) Format : tgl-bln-thn</td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td><input type="radio" name="JK" Value="L" checked> Laki-laki <input type="radio" name="JK" value="P"> Perempuan</td>
</tr>
<tr>	
	<td>Alamat</td>
	<td><input type="text" name="Alamat1" id="Alamat1" class="span6">
		<input type="text" name="Alamat2" id="Alamat2" class="span6">
	</td>
</tr>

<tr>	
	<td>Kota</td>
	<td>
		<input type="text" name="Kota" id="Kota" class="span6">
	</td>
</tr>
<tr>
	<td>Telepon/HP</td>
	<td><input type="text" name="Telp" id="Telp" class="span3"></td>
</tr>
<tr>	
	<td>Email</td>
	<td><input type="text" name="EMail" id="EMail" class="span4"></td>
</tr>
<tr>	
	<td>Warga Negara</td>
	<td>
		<select name="WN" id="WN" class="span2">
			<option value="WNI">WNI</option>
			<option value="WNA">WNA</option>
		</select>
	</td>
</tr>
<!-- <tr>	
	<td>Golongan Darah</td>
	<td>
		<select name="GolDarah" id="GolDarah" class="span2">
			<option value="">-PILIH-</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
			<option value="O">O</option>
            <option value="-">Tidak Tahu</option>
		</select>
	</td>
</tr> -->
<!-- <tr>	
	<td>Hobby</td>
	<td><input type="text" name="Hobby" id="Hobby" class="span5"></td>
</tr> -->
<!-- <tr>	
	<td>Penyakit Yang Derita</td>
	<td><input type="text" name="Penyakit" id="Penyakit" class="span5"></td>
</tr> -->
<tr>	
	<td>Asal Sekolah</td>
	<td>
		<select name="AsalSek" id="AsalSek" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_sekolah->result() as $t) {
		?>
		<option value="<?php echo $t->AsalSek;?>"><?php echo $t->AsalSek;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Sekolah</td>
	<td><input type="text" name="NmAsalSek" id="NmAsalSek" class="span5"></td>
</tr>
<tr>	
	<td>No Ijazah</td>
	<td><input type="text" name="NoIjazah" id="NoIjazah" class="span3"></td>
</tr>
<tr>	
	<td>Tahun Ijazah</td>
	<td><input type="text" name="IjTh" id="IjTh" class="span1"></td>
</tr>
<!-- <tr>	
	<td>Jumlah Mata Pelajaran dalam Ijazah</td>
	<td><input type="text" name="IjJmlMP" id="IjJmlMP" class="span1"></td>
</tr> -->
<!-- <tr>	
	<td>Jumlah Nilai dalam Ijazah</td>
	<td><input type="text" name="IjJmlNilai" id="IjJmlNilai" class="span1"></td>
</tr> -->
<tr>
	<td colspan="2"><h4>B. Pilihan Program Studi</h4></td>
</tr>

<input type="hidden" name="akademik" id="akademik" value="<?php echo $this->session->userdata('akademik');?>" />
<input type="hidden" name="jalur" id="jalur" value="<?php echo $this->session->userdata('jalur');?>" />
			<tr>
				<td>Lokasi Kampus</td>
				<?php if($this->session->userdata('jalur')=="prestasi") { ?>
				<td>
					<select id='sel_lokasi' name="sel_lokasi">
					<option value="">-- Pilih Lokasi Kuliah --</option>
					<option value="2">Kampus B (Parung)</option>

					</select>
				</td>
			<?php } else {?>
			<td>
					<select id='sel_lokasi' name="sel_lokasi">
					<option value="">-- Pilih Lokasi Kuliah --</option>
					<option value="1">Kampus A (Menteng)</option>
					<option value="2">Kampus B (Parung)</option>
					<option value="3">Kampus C (Kedoya)</option>

					</select>
				</td>
				<?php } ?>

			</tr>

			<tr>
				<td colspan="2"><h4>Pilihan Program Studi Ke-1</h4></td>
			</tr> 

			<!-- Department -->
			<tr>
				<td>Program Studi 1</td>
				<td>
					<select id='sel_prodi' name="sel_prodi">
					<option value="">-- Pilih Prodi --</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Waktu Perkuliahan 1</td>
				<td>
					<select id='sel_waktu' name="sel_waktu">
					<option value="">-- Pilih Waktu Kuliah --</option>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2"><h4>Pilihan Program Studi Ke-2</h4></td>
			</tr> 
			<tr>
				<td>Program Studi 2</td>
				<td>
					<select id='sel_prodi2' name="sel_prodi2">
					<option value="">-- Pilih Prodi --</option>
					</select>
				</td>
			</tr>

			<!-- User -->
			<tr>
				<td>Waktu Perkuliahan2</td>
				<td>
					<select id='sel_waktu2' name="sel_waktu2">
					<option value="">-- Pilih Waktu Kuliah --</option>
					</select>
				</td>
			</tr>


<tr>
	<td colspan="2"><h4>C. Data Orang Tua</h4></td>
</tr>    
<tr>	
	<td>Nama Ayah</td>
	<td><input type="text" name="NmAyah" id="NmAyah" class="span5"></td>
</tr>
<tr>	
	<td>Pekerjaan Ayah</td>
	<td>
		<select name="KerjaAyah" id="KerjaAyah" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_pekerjaan->result() as $t) {
		?>
		<option value="<?php echo $t->KerjaOrtu;?>"><?php echo $t->KerjaOrtu;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ayah</td>
	<td>
		<select name="HasilAyah" id="HasilAyah" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_penghasilan->result() as $t) {
		?>
		<option value="<?php echo $t->Penghasilan;?>"><?php echo $t->Penghasilan;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ayah</td>
	<td>
		<select name="PendAyah" id="PendAyah" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_pendidikan->result() as $t) {
		?>
		<option value="<?php echo $t->Pendidikan;?>"><?php echo $t->Pendidikan;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Ibu</td>
	<td><input type="text" name="NmIbu" id="NmIbu" class="span5"></td>
</tr>
<tr>	
	<td>Pekerjaan Ibu</td>
	<td>
		<select name="KerjaIbu" id="KerjaIbu" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_pekerjaan->result() as $t) {
		?>
		<option value="<?php echo $t->KerjaOrtu;?>"><?php echo $t->KerjaOrtu;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ibu</td>
	<td>
		<select name="HasilIbu" id="HasilIbu" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_penghasilan->result() as $t) {
		?>
		<option value="<?php echo $t->Penghasilan;?>"><?php echo $t->Penghasilan;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ibu</td>
	<td>
		<select name="PendIbu" id="PendIbu" class="span3">
		<option value="">-PILIH-</option>
		<?php
		foreach ($l_pendidikan->result() as $t) {
		?>
		<option value="<?php echo $t->Pendidikan;?>"><?php echo $t->Pendidikan;?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Wali</td>
	<td><input type="text" name="NmWali" id="NmWali" class="span5"></td>
</tr
><tr>	
	<td>Alamat Wali</td>
	<td><input type="text" name="AlamatWali" id="AlamatWali" class="span5"></td>
</tr>	
<tr>	
	<td>Hubungan Wali</td>
	<td><input type="text" name="HubWali" id="HubWali" class="span5"></td>
</tr>
<tr>
	<td colspan="2">Silahkan Klik Lanjut !!! 
		<input type="hidden" id="akademik" name="akademik" value="<?php echo $this->session->userdata('akademik'); ?>">
	</td>
</tr>    
<tr>
	<td colspan="2">
		<center>
    		<a href="<?php echo base_url();?>index.php/home/logout" class="btn btn-danger"><i class="icon-off icon-white"></i> Batal</a> 
			&nbsp;&nbsp;||&nbsp;&nbsp;
    		<button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="return();"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
    	</center>
	</td>
</tbody>
</table>
</form>