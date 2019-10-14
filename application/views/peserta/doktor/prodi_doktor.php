<!-- <script type="text/javascript">
$(document).ready(function() {
	$("#Jur1").change(function(){
		var jur = $("#Jur1").val();
		$.ajax({
			  type	: 'POST',
			  url	: "<//?php echo site_url(); ?>/peserta/home/list_jur",
			  data	: "jur="+jur,
			  cache	: false,
			  success	: function(data){
				 $("#Jur2").html(data);
			  }
		  });
	});
	
	$("#Jur2").change(function(){
		var jur1 = $("#Jur1").val();
		var jur2 = $("#Jur2").val();
		$.ajax({
			  type	: 'POST',
			  url	: "<//?php echo site_url(); ?>/peserta/home/list_jur2",
			  data	: "jur1="+jur1+"&jur2="+jur2,
			  cache	: false,
			  success	: function(data){
				 $("#Jur3").html(data);
			  }
		  });
	});
	
		
	$("#simpan").click(function(){
		var Jur1 = $("#Jur1").val();
		var Jur2 = $("#Jur2").val();
		var Jur3 = $("#Jur3").val();
		
		var string = $("#my-form").serialize();
			
		if(Jur1.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Pertama tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur1").focus();
			return false();
		}
		if(Jur2.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Kedua tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur2").focus();
			return false();
		}
		if(Jur3.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Jurusan Ketiga tidak boleh kosong'},type:'info'
			}).show();
			$("#Jur3").focus();
			return false();
		}
		/*
		if(Jur1==Jur2){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Anda tidak berhak memilih pilihan yang sama'},type:'info'
			}).show();
			$("#Jur2").focus();
			return false();
		}
		*/
		if (confirm('Pilihan Jurusan tidak dapat diulang, apakah yakin akan menyimpannya ?')){
			var link = $(this);
			$.ajax({
				type	: 'POST',
				url		: "<//?php echo site_url(); ?>/peserta/home/simpan_prodi_doktor",
				data	: string,
				cache	: false,
				dataType   : 'json',
				success	: function(data){
					if(data.status != 'error'){
						window.location.assign("<//?php echo site_url();?>/peserta/home/survey_doktor")
					}
					alert(data.msg);
				}
			});
		}
	});
	
});
</script> -->

<div class="ui-widget">
	<div class="ui-state-highlight ui-corner-all">
		<p><i class="icon-user"></i>
		<strong><?php echo $judul;?></strong></p>
	</div>
</div>
Untuk memilih Program Studi, Anda harus mengikuti aturan sebagai berikut
<form id="my-form" name="my-form" method="POST" action="#">
	<table class="table table-bordered table-striped table-hover">
		<tbody>
			<tr>
				<td colspan="2"><h4>H. Pilihlah Program Studi dibawah ini</h4></td>
			</tr>    
			<input type="hidden" name="akademik" id="akademik" value="<?php echo $this->session->userdata('akademik');?>" />
			<tr>
				<td>Lokasi Kampus</td>
				<td>
					<select id='sel_lokasi' name="sel_lokasi">
					<option value="">-- Pilih Lokasi Kuliah --</option>
					<option value="1">Kampus A (Menteng)</option>
					<option value="2">Kampus B (Parung)</option>
					<option value="3">Kampus C (Kedoya)</option>

					</select>
				</td>
			</tr>

			<!-- Department -->
			<tr>
				<td>Program Studi</td>
				<td>
					<select id='sel_prodi' name="sel_prodi">
					<option value="">-- Pilih Prodi --</option>
					</select>
				</td>
			</tr>

			<!-- User -->
			<tr>
				<td>Waktu Perkuliahan</td>
				<td>
					<select id='sel_waktu' name="sel_waktu">
					<option value="">-- Pilih Waktu Kuliah --</option>
					</select>
				</td>
			</tr>

			<tr>
				<td colspan="2">Silahkan Klik Lanjut !!!</td>
			</tr>    
			<tr>
				<td colspan="2">
					<center>
						<a href="<?php echo base_url();?>index.php/peserta/home/surat_pernyataan_doktor" class="btn btn-info"><i class="icon-hand-left icon-white"></i> Kembali</a>
						<button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="return();"><i class="icon-hand-right icon-white"></i> Selanjutnya</button>
					</center>
				</td>
			</tr>
		</tbody>
	</table>
</form>

<script type='text/javascript'>
// baseURL variable
var baseURL= "<?php echo base_url();?>";

$(document).ready(function(){
 
    // City change
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

				// Add options
				$.each(response,function(index,data){
					$('#sel_prodi').append('<option value="'+data['sing']+'">'+data['jur_baru']+'</option>');
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

   $("#simpan").click(function(){
		var lokasi = $("#sel_lokasi").val();
		var prodi = $("#sel_prodi").val();
		var waktu = $("#sel_waktu").val();
    
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
				message: {text: 'Maaf, Pilihan Program Studi tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_prodi").focus();
			return false();
		}
		if(waktu.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Pilihan Waktu Perkuliahan tidak boleh kosong'},type:'info'
			}).show();
			$("#sel_waktu").focus();
			return false();
		}

    	if (confirm('Pilihan Jurusan tidak dapat diulang, apakah yakin akan menyimpannya ?')){
        	var link = $(this);
       		$.ajax({
				type  : 'POST',
				url   : "<?php echo site_url(); ?>/peserta/home/simpan_prodi_doktor",
				data  : string,
				cache : false,
				dataType   : 'json',
				success : function(data){
          			if(data.status != 'error'){
            			window.location.assign("<?php echo site_url();?>/peserta/home/survey_doktor")
          			}
          			alert(data.msg);
        		}
      		});
    	}
    });
	
});

</script>