<script type="text/javascript">
	$( "#cari_tgl" ).datepicker();
var url;
function cetak_html(){
	var th = $("#th").val();
	var jurusan = $("#jurusan").val();
	var tanggal = $("#cari_tgl").val();
	
	if(th.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tahun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#th").focus();
		return false();
	}
	if(jurusan.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Jurusan tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jurusan").focus();
		return false();
	}
	
	window.open('<?php echo site_url();?>/administrator/laporan/cetak_lap_pmb/'+th+'/'+jurusan+'/'+tanggal);
	return false();
}
function cetak_excel(){
	var th = $("#th").val();
	var jurusan = $("#jurusan").val();
	var tanggal = $("#cari_tgl").val();
	
	if(th.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Tahun tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#th").focus();
		return false();
	}
	if(jurusan.length==0){
		$.messager.show({
			title:'Info',
			msg:'Maaf, Jurusan tidak boleh kosong',
			timeout:2000,
			showType:'slide'
		});
		$("#jurusan").focus();
		return false();
	}
	
	window.open('<?php echo site_url();?>/administrator/laporan/cetak_lap_pmb_excel/'+th+'/'+jurusan+'/'+tanggal);
	return false();
}
</script>
<!-- Dialog Form -->
<div id="dialog-form">
	<form id="form" method="post" novalidate>
		<div class="form-item">
			<label for="type">Tahun Akademik</label><br />
			<select name="th" id="th">
            <option value="">-Pilih-</option>
            <?php
			foreach($th->result() as $t){
				echo "<option value=$t->ThAjaran>$t->ThAjaran</option>";
			} ?>
            </select>
		</div>
		<div class="form-item">
			<label for="type">Jurusan Pilihan 1</label><br />
			<select name="jurusan" id="jurusan">
            <option value="all">Semua Data</option>
             <?php
			foreach($jurusan->result() as $t){
				echo "<option value=$t->sing>$t->Jur</option>";
			} ?>
            </select>
		</div>
		<div class="form-item">
			<label for="type">Pilih Tanggal Daftar</label><br />
			<input id="cari_tgl" style="width:100px">
		</div>
	</form>
</div>
<!-- Dialog Button -->
<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak_html()">Cetak Ke HTML</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak_excel()">Cetak Ke Excel</a>
</div>
