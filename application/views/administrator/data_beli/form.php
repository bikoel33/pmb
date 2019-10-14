<script type="text/javascript">
$(document).ready(function(){
	$("#nik").focus();
	$("#nik").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
		cari_nik();
	});
	
	function cari_nik(){
		var nik = $("#nik").val();
		
		$.ajax({
			type	: "POST",
			url		: "<?php echo site_url('administrator/data_beli/cari_nik'); ?>",
			data	: "nik="+nik,
			dataType: "json",
			success	: function(data){
				$("#nama").val(data.nama);
				$("#no_hp").val(data.no_hp);
			}
		});
	}
	
	$("#semester").keypress(function(data){
		if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
			return false;
		}
	});

});
var url;
function simpan(){
	var nik = $("#nik").val();
	var nama = $("#nama").val();
	var no_hp = $("#no_hp").val();
	var password = $("#password").val();
	var akademik = $("#akademik").val();
	
	var string = $("#my-form").serialize();
	
	if(nik.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, NIK tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nik").focus();
		return false();
	}
	if(nama.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Nama tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#nama").focus();
		return false();
	}
	if(no_hp.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, No. Handphone tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#no_hp").focus();
		return false();
	}
	if(password.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Password tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#password").focus();
		return false();
	}
	if(akademik.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Akademik tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#akademik").focus();
		return false();
	}
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('administrator/data_beli/simpan'); ?>",
		data	: string,
		success	: function(data){
			$.messager.show({
				title:'Info',
				msg:data, //'Password Tidak Boleh Kosong.',
				timeout:2000,
				showType:'slide'
			});
		}
	});
	return false();
}
function cetak_bukti(){
		var nik = $('#nik').val(); 
		
		if(nik.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, NIK tidak boleh kosong', //'Password Tidak Boleh Kosong.',
				timeout:2000,
				showType:'slide'
			});
			return false();
		}
		
		window.open('<?php echo site_url();?>/administrator/data_beli/cetak/'+nik);
		return false();
	}
</script>
<style type="text/css">
textarea {
	width:350px;
}
</style>
<div style="padding:10px;">
	<form id="my-form" method="post" novalidate>
		<table width="100%">
			<tr>
				<td width="80%" valign="top">
					<div class="form-item">
						<label for="type">NIK</label><br />
						<input type="text" name="nik" id="nik" class="easyui-validatebox" required="true" size="20" maxlength="20"  />
						<input type="hidden" name="biaya" id="biaya" class="easyui-validatebox" value="200000" required="true" size="20" maxlength="10" />
					</div>
					<div class="form-item">
						<label for="type">Nama Lengkap</label><br />
						<input type="text" name="nama" id="nama" class="easyui-validatebox" required="true" size="50" maxlength="50"  />
					</div>
					<div class="form-item">
						<label for="type">No Handphone</label><br />
						<input type="text" name="no_hp" id="no_hp" class="easyui-validatebox" required="true" size="20" maxlength="12" />
					</div>
					<div class="form-item">
						<label for="type">Password</label><br />
						<input type="text" name="password" id="password" class="easyui-validatebox" required="true" size="20" maxlength="10" />
					</div>
					<div class="form-item">
						<label for="type">Jenjang Akademik</label><br />
						<select name="akademik" id="akademik" class="form-control input-sm" required>
                            <option value="">- JENJANG AKADEMIK -</option>
                            <option value="D3">D3 - Diploma III</option>
                            <option value="S1">S1 - Strata I</option>
                            <option value="S2">S2 - Strata II</option>
                            <option value="S3">S3 - Strata III</option>
                        </select>
					</div>
					<!-- <div class="form-item">
						<label for="type">Biaya</label><br />
						<input type="text" name="biaya" id="biaya" class="easyui-validatebox" value="200000" required="true" size="20" maxlength="10" />
					</div> -->
				</td>
			</tr>
			<tr>
				<td colspan="1" align="center">
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan()">Simpan</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak_bukti()">Cetak </a>
					<a href="<?php echo base_url();?>index.php/administrator/data_beli/tambah" class="easyui-linkbutton" iconCls="icon-ok" plain="true">Kosong Form</a>
					<a href="<?php echo base_url();?>index.php/administrator/data_beli" class="easyui-linkbutton" iconCls="icon-close" plain="true">Tutup </a>
				</td>
			</tr>
		</table>       
	</form>            
</div>
