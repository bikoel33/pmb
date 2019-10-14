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
			url		: "<?php echo site_url(); ?>/peserta/home/simpan_edit_formulir_sarjana",  // load controller
			data	: string,
			cache	: false,
			dataType  : 'json',
			success	: function(data){
				if(data.status != 'error'){
			   		window.location.assign("<?php echo site_url();?>/peserta/home/edit_foto_sarjana")  // load controller
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
	<td colspan="2"><h4>A. Data Peserta Pendaftaran <?php echo $this->session->userdata('akademik'); ?></h4></td>
</tr>
<tr>
	<td class="span4">Nomor Ujian Anda</td>
    <td>
		<strong><?php echo $this->app_model->CariNoUjian($this->session->userdata('nik'));?></strong>
		<input type="hidden" name="NoUjian" id="NoUjian" class="span2" value="<?php echo $this->app_model->CariNoUjian($this->session->userdata('nik'));?>">
	</td>
</tr>     
<tr>
	<td class="span4">Ruang Ujian Anda </td>
    <td>
		<strong><?php echo $this->app_model->CariRuangUjian($this->session->userdata('nik'));?></strong>
		<input type="hidden" name="NoUjian" id="NoUjian" class="span2" value="<?php echo $this->app_model->CariRuangUjian($this->session->userdata('nik'));?>">
	</td>
</tr> 
<!-- <tr>
	<td class="span4">Pilihan 1 </td>
    <td>
		<strong>
			<//?php echo $Jur1;?> - <//?php echo $this->app_model->cari_jurusan($Jur1);?>
			</strong>
	</td>
</tr> 
<tr>
	<td class="span4">Pilihan 2 </td>
    <td><strong><//?php echo $Jur2;?> - <//?php echo $this->app_model->cari_jurusan($Jur2);?></strong></td>
</tr> 
<tr>
	<td class="span4">Pilihan 3 </td>
    <td><strong><//?php echo $Jur3;?> - <//?php echo $this->app_model->cari_jurusan($Jur3);?></strong></td>
</tr> --> 
<tr>
	<td colspan="2"><h4>B. Data Pribadi</h4></td>
</tr>    
<tr>
	<td class="span4">Nama Lengkap</td>
	<td>
		<input type="text" name="Nama" id="Nama" class="span4" value="<?php echo $this->session->userdata('nama');?>" disabled>
		<input type="hidden" name="Nama" id="Nama" class="span4" value="<?php echo $Nama;?>" >
	</td>
</tr>
<tr>
	<td>NISN</td>
	<td><input type="text" name="nisn" id="nisn" class="span5" value="<?php echo $nisn;?>" autofocus></td>
</tr>
<tr>
	<td>Tempat Lahir</td>
	<td><input type="text" name="TmptLhr" id="TmptLhr" class="span5" value="<?php echo $TmptLhr;?>"></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td><input type="text" name="TglLhr" id="TglLhr" class="span2" value="<?php echo $TglLhr;?>"> *) Format : tgl-bln-thn</td>
</tr>
<tr>
	<td>Jenis Kelamin</td>
	<td>
		<select name="JK" id="JK" class="span2">
			<option value="<?php echo $JK;?>">
				<?php
					if($JK=='L'){
						echo 'Laki-laki';
					}else{
						echo 'Perempuan';
					};
				?>
			</option>
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Alamat</td>
	<td>
		<input type="text" name="Alamat1" id="Alamat1" class="span6" value="<?php echo $Alamat1;?>">
		<br />
		<input type="text" name="Alamat2" id="Alamat2" class="span6" value="<?php echo $Alamat2;?>">
	</td>
</tr>
<tr>	
	<td>Kota</td>
	<td><input type="text" name="Kota" id="Kota" class="span6" value="<?php echo $Kota;?>"></td>
</tr>
<tr>
	<td>Telepon/HP</td>
	<td><input type="text" name="Telp" id="Telp" class="span3" value="<?php echo $Telp;?>"></td>
</tr>
<tr>	
	<td>Email</td>
	<td><input type="text" name="EMail" id="EMail" class="span4" value="<?php echo $EMail;?>"></td>
</tr>
<tr>	
	<td>Warga Negara</td>
	<td>
		<select name="WN" id="WN" class="span2">
			<option value="<?php echo $WN;?>"><?php echo $WN;?></option>
			<option value="WNI">WNI</option>
			<option value="WNA">WNA</option>
		</select>
	</td>
</tr>
<!-- <tr>	
	<td>Golongan Darah</td>
	<td>
		<select name="GolDarah" id="GolDarah" class="span2">
			<option value="<//?php echo $GolDarah;?>"><//?php echo $GolDarah;?></option>
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
	<td><input type="text" name="Hobby" id="Hobby" class="span5" value="<//?php echo $Hobby;?>"></td>
</tr> -->
<!-- <tr>	
	<td>Penyakit Yang Derita</td>
	<td><input type="text" name="Penyakit" id="Penyakit" class="span5" value="<//?php echo $Penyakit;?>"></td>
</tr> -->
<tr>	
	<td>Asal Sekolah</td>
	<td>
		<select name="AsalSek" id="AsalSek" class="span2">
			<option value="<?php echo $AsalSek;?>"><?php echo $AsalSek;?></option>
			<option value="SMA Negeri">SMA Negeri</option>
			<option value="SMA Swasta">SMA Swasta</option>
			<option value="SMK Negeri">SMK Negeri</option>
			<option value="SMK Swasta">SMK Swasta</option>
			<option value="MA Negeri">MA Negeri</option>
			<option value="MA Swasta">MA Swasta</option>
            <option value="Lainnya">Lainnya</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Sekolah</td>
	<td><input type="text" name="NmAsalSek" id="NmAsalSek" class="span5" value="<?php echo $NmAsalSek;?>"></td>
</tr>
<tr>	
	<td>No Ijazah</td>
	<td><input type="text" name="NoIjazah" id="NoIjazah" class="span3" value="<?php echo $NoIjazah;?>"></td>
</tr>
<tr>	
	<td>Tahun Ijazah</td>
	<td><input type="text" name="IjTh" id="IjTh" class="span1" value="<?php echo $IjTh;?>"></td>
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
	<td colspan="2"><h4>C. Pilihan Program Studi</h4></td>
</tr>

<input type="hidden" name="akademik" id="akademik" value="<?php echo $this->session->userdata('akademik');?>" />
			<tr>
				<td class="span4">Lokasi Kampus</td>
				<td>
					<strong>
						<!-- <//?php echo $lokasi;?> -->
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
				<td class="span4">Pilihan Program Studi Ke-1  </td>
				<td><strong><?php echo $prodi;?> - <?php echo $this->app_model->cari_jurusan($prodi);?></strong></td>
			</tr> 
			<tr>
				<td class="span4">Waktu Perkuliahan </td>
				<td><strong><?php echo $waktu;?></strong></td>
			</tr>
			<tr>
				<td class="span4">Pilihan Program Studi Ke-2  </td>
				<td><strong><?php echo $prodi2;?> - <?php echo $this->app_model->cari_jurusan($prodi2);?></strong></td>
			</tr> 
			<tr>
				<td class="span4">Waktu Perkuliahan </td>
				<td><strong><?php echo $waktu2;?></strong></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr> 
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

			<!-- Department -->
			<tr>
				<td colspan="2"><h4>Pilihan Program Studi Ke-1</h4></td>
			</tr>
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

<tr>
	<td colspan="2"><h4>D. Data Orang Tua</h4></td>
</tr>    
<tr>	
	<td>Nama Ayah</td>
	<td><input type="text" name="NmAyah" id="NmAyah" class="span5" value="<?php echo $NmAyah;?>"></td>
</tr>
<tr>	
	<td>Pekerjaan Ayah</td>
	<td>
		<select name="KerjaAyah" id="KerjaAyah" class="span2">
			<option value="<?php echo $KerjaAyah;?>"><?php echo $KerjaAyah;?></option>
			<option value="PNS">PNS</option>
			<option value="TNI/POLRI">TNI/POLRI</option>
			<option value="WIRASWASTA">WIRASWASTA</option>
			<option value="SOPIR">SOPIR</option>
			<option value="PETANI">PETANI</option>
			<option value="NELAYAN">NELAYAN</option>
			<option value="BURUH">BURUH</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ayah</td>
	<td>
		<select name="HasilAyah" id="HasilAyah" class="span2">
			<option value="<?php echo $HasilAyah;?>"><?php echo $HasilAyah;?></option>
			<option value="0">0</option>
			<option value="<500,000">< 500,000</option>
			<option value="500,000 - 1 Juta">500,000 - 1 Juta</option>
			<option value="1 Juta - 2 Juta">1 Juta - 2 Juta</option>
			<option value="2 Juta - 3 Juta">2 Juta - 3 Juta</option>
			<option value="3 Juta - 4 Juta">3 Juta - 4 Juta</option>
			<option value="4 Juta - 5 Juta">4 Juta - 5 Juta</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ayah</td>
	<td>
		<select name="PendAyah" id="PendAyah" class="span2">
			<option value="<?php echo $PendAyah;?>"><?php echo $PendAyah;?></option>
			<option value="SD">SD</option>
			<option value="SLTP">SLTP</option>
			<option value="SLTA">SLTA</option>
			<option value="DIII">DIII</option>
			<option value="S.1">S.1</option>
			<option value="S.2">S.2</option>
			<option value="S.3">S.3</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Ibu</td>
	<td><input type="text" name="NmIbu" id="NmIbu" class="span5" value="<?php echo $NmIbu;?>"></td>
</tr>
<tr>	
	<td>Pekerjaan Ibu</td>
	<td>
		<select name="KerjaIbu" id="KerjaIbu" class="span2">
			<option value="<?php echo $KerjaIbu;?>"><?php echo $KerjaIbu;?></option>
			<option value="PNS">PNS</option>
			<option value="TNI/POLRI">TNI/POLRI</option>
			<option value="WIRASWASTA">WIRASWASTA</option>
			<option value="SOPIR">SOPIR</option>
			<option value="PETANI">PETANI</option>
			<option value="NELAYAN">NELAYAN</option>
			<option value="BURUH">BURUH</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Penghasilan Ibu</td>
	<td>
		<select name="HasilIbu" id="HasilIbu" class="span2">
			<option value="<?php echo $HasilIbu;?>"><?php echo $HasilIbu;?></option>
			<option value="0">0</option>
			<option value="<500,000">< 500,000</option>
			<option value="500,000 - 1 Juta">500,000 - 1 Juta</option>
			<option value="1 Juta - 2 Juta">1 Juta - 2 Juta</option>
			<option value="2 Juta - 3 Juta">2 Juta - 3 Juta</option>
			<option value="3 Juta - 4 Juta">3 Juta - 4 Juta</option>
			<option value="4 Juta - 5 Juta">4 Juta - 5 Juta</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Pendidikan Ibu</td>
	<td>
		<select name="PendIbu" id="PendIbu" class="span2">
			<option value="<?php echo $PendIbu;?>"><?php echo $PendIbu;?></option>
			<option value="SD">SD</option>
			<option value="SLTP">SLTP</option>
			<option value="SLTA">SLTA</option>
			<option value="DIII">DIII</option>
			<option value="S.1">S.1</option>
			<option value="S.2">S.2</option>
			<option value="S.3">S.3</option>
            <option value="LAINNYA">LAINNYA</option>
		</select>
	</td>
</tr>
<tr>	
	<td>Nama Wali</td>
	<td><input type="text" name="NmWali" id="NmWali" class="span5" value="<?php echo $NmWali;?>"></td>
</tr
><tr>	
	<td>Alamat Wali</td>
	<td><input type="text" name="AlamatWali" id="AlamatWali" class="span5" value="<?php echo $AlamatWali;?>"></td>
</tr>	
<tr>	
	<td>Hubungan Wali</td>
	<td><input type="text" name="HubWali" id="HubWali" class="span5" value="<?php echo $HubWali;?>"></td>
</tr>
<tr>
	<td colspan="2" align="center">Jika Tidak Ingin Merubah Silahkan Klik Abaikan !!!</td>
</tr>    
<tr>
	<td colspan="2">
		<center>
		
			<!-- <//?php if ($slip_pembayaran == "") { ?> -->
			<!-- <a href="<//?php echo base_url();?>index.php/peserta/home/cetak" class="btn btn-success"><i class="icon-print icon-white"></i> Upload Slip Pembayaran</a> -->
			<!-- <//?php } ?> -->

			<!-- <//?php if ($slip_pembayaran !== "") { ?> -->
			<!-- <a href="<//?php echo base_url();?>index.php/peserta/home/cetak" class="btn btn-success"><i class="icon-print icon-white"></i> Download Kartu Ujian</a> -->
			<!-- <//?php } ?> -->

			<!-- <a href="<//?php echo base_url();?>index.php/peserta/home/logout" class="btn btn-danger"><i class="icon-off icon-white"></i> Tutup</a> -->
			<a href="<?php echo base_url();?>index.php/peserta/home/sarjana" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
			<button type="button" name="simpan" id="simpan" class="btn btn-success" onclick="return();"> <i class="icon-hand-right icon-white"></i> Selanjutnya</button>
			<a href="<?php echo base_url();?>index.php/peserta/home/edit_foto_sarjana" class="btn btn-danger"><i class="icon-thumbs-up icon-white"></i> Abaikan</a>
		</center>
	</td>
</tbody>
</table>
</form>