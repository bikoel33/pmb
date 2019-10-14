<script type="text/javascript">
$(document).ready(function() {
	$("#nm_mhs").hide();
		
	$("#simpan").click(function(){
		var cek = $(".cek:checked");
		
		var string = $("#my-form").serialize();
			
		if(cek.length==0){
			$('.bottom-right').notify({
				message: {text: 'Maaf, Anda harus memilih salah satunya'},type:'info'
			}).show();
			return false();
		}
		
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/peserta/home/simpan_survey_diploma",
			data	: string,
			cache	: false,
			dataType   : 'json',
				success : function(data){
          			if(data.status != 'error'){
            			window.location.assign("<?php echo site_url();?>/peserta/home/selesai_diploma")
          			}
          			alert(data.msg);
        		}
		});

	});
	
});
</script>
<script>
function myFunction() {
  var checkBox = document.getElementById("cek4");
  if (checkBox.checked == true){
    $("#nm_mhs").show();
  } else {
     $("#nm_mhs").hide();
  }
}
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
	<td colspan="2"><h4>Selamat data telah disimpan.</h4></td>
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
	<td colspan="2"><h4>Dari mana Anda tahu UNIVERSITAS NAHDLATUL ULAMA INDONESIA</h4></td>
</tr>    
<tr>	
	<td colspan="2">
    <ol>
    <li><input type="checkbox" class="cek" name="cek1" value="Koran," />Koran</li>
    <li><input type="checkbox" class="cek" name="cek2" value="Spanduk," />Spanduk</li>
    <li><input type="checkbox" class="cek" name="cek3" value="Brosur," />Brosur</li>
    <li><input type="checkbox" class="cek" name="cek4" id="cek4" onclick="myFunction()" value="Mahasiswa Unusia," />Mahasiswa Unusia</li>
    <input type="text" name="nm_mhs" id="nm_mhs" placeholder="Nama Mahasiswa">
    <li><input type="checkbox" class="cek" name="cek5" value="Alumni Unusia," />Alumni Unusia</li>
    <li><input type="checkbox" class="cek" name="cek6" value="Alumni SMA/MA/Pesantren," />Alumni SMA/MA/Pesantren</li>
    <li><input type="checkbox" class="cek" name="cek7" value="Website Unusia," />Website Unusia</li>
    <li><input type="checkbox" class="cek" name="cek8" value="Media Sosial," />Media Sosial</li>
    <li><input type="checkbox" class="cek" name="cek9" value="TV," />TV</li>
    <li><input type="checkbox" class="cek" name="cek10" value="Radio," />Radio</li>
    <li><input type="checkbox" class="cek" name="cek11" value="Alumni Unusia," />Rekomendasi Kyai/Ustadz</li>
    <li><input type="checkbox" class="cek" name="cek12" value="Sosialisasi," />Sosialisai di sekolah</li>
    </ol>
    </td>
</tr>

<tr>
	<td colspan="2"><h4>Selesai !!!</h4></td>
</tr>    
<tr>
	<td colspan="2"><center>
    <button type="button" name="simpan" id="simpan" class="btn btn-primary" onclick="return();"><i class="icon-hand-right icon-white"></i> Selesai</button>
    </center>
</tbody>
</table>
</form>