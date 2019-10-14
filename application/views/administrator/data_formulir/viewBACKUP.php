<script type="text/javascript">
$( "#cari_tgl" ).datepicker();

function doSearch(value){  
	$('#datagrid-crud').datagrid('load',{    
        cari: value //$('#productid').val()  
    });  
}  

function doSearchTgl(){  
	var value =$('#cari_tgl').val() ;
	if(value.length==0){
		alert('Maaf, Tanggal tidak boleh kosong');
		$("#cari_tgl").focus();
		return false();
	}
	$('#datagrid-crud').datagrid('load',{    
        cari_tgl: $('#cari_tgl').val()  
    });  
} 

function doSearchProdi(){  
	var prodi =$('#prodi').val() ;
	
	if(prodi.length==0){
		alert('Maaf, Program Studi tidak boleh kosong');
		$("#prodi").focus();
		return false();
	}
	$('#datagrid-crud').datagrid('load',{    
        cari_prodi: $('#prodi').val()	  
    });  
}  

function cariRuang(){  
	var ruang =$('#ruang').val() ;
	
	if(ruang.length==0){
		alert('Maaf, Ruang tidak boleh kosong');
		$("#ruang").focus();
		return false();
	}
	$('#datagrid-crud').datagrid('load',{    
        cari_ruang: $('#ruang').val()	  
    });  
}  

function doLihat(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	if(row){
		var kode = row.nik;
		window.location.assign("<?php echo base_url();?>index.php/administrator/data_iain/edit/"+nik);
	}
}

function Cari_Foto(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.foto;
	$("#imagesFoto").attr('src','<?php echo base_url();?>peserta/foto/'+file);
}

function Cari_Ktp(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.ktp;
	$("#imagesKtp").attr('src','<?php echo base_url();?>peserta/ktp/'+file);
}

function Cari_KK(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.kk;
	$("#imagesKk").attr('src','<?php echo base_url();?>peserta/kk/'+file);
}

function Cari_Ijazah(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.file_ijazah;
	$("#imagesIjazah").attr('src','<?php echo base_url();?>peserta/ijazah/'+file);
}

function Cari_skhun(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.skhun;
	$("#imagesSkhun").attr('src','<?php echo base_url();?>peserta/skhun/'+file);
}

function Cari_nilai_rapot(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.nilai_rapot;
	$("#imagesNilaiRapot").attr('src','<?php echo base_url();?>peserta/nilai_rapot/'+file);
}

function cari_data(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var noujian = row.NoUjian;
	//alert(noujian);
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('administrator/data_formulir/cari_data'); ?>",
		data	: "noujian="+noujian,
		success	: function(data){
			$("#b").html(data);
		}
		
	});
}
</script>
<!-- Data Grid -->
<!-- Toolbar -->
<div id="toolbar" style="padding:5px;height:auto">
<table cellpadding="0" cellspacing="0" style="width:100%">
<tr>
	<td style="padding-left:2px;"> 
	<input id="cari" class="easyui-searchbox" data-options="prompt:'Pencarian No Ujian dan Nama ..',searcher:doSearch" style="width:250px"></input> <br />
    Cari Tanggal : <input id="cari_tgl" style="width:100px">  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearchTgl()">Cari</a>
    
    Prodi <select name="prodi" id="prodi">
    <option value="">-PILIH-</option>
    <?php
	$data = $this->admin_model->list_prodi();
	foreach($data->result() as $t){
	?>
    <option value="<?php echo $t->sing;?>"><?php echo $t->sing;?></option>
    <?php
	}
	?>
    </select>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearchProdi()">Cari</a>
     <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doLihat()">Cari</a>
     Ruang <select name="ruang" id="ruang">
    <option value="">-PILIH-</option>
    <?php
	$data = $this->admin_model->list_ruang();
	foreach($data->result() as $t){
	?>
    <option value="<?php echo $t->RUjian;?>"><?php echo $t->RUjian;?></option>
    <?php
	}
	?>
    </select>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="cariRuang()">Cari Ruang</a>
    <br />
    <a href="<?php echo base_url();?>index.php/administrator/data_formulir" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Refresh</a> | 
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="cari_data();$('#b').window('open')">Lihat Biodata </a> | 
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-user" plain="true" onclick="Cari_Foto();$('#c').window('open')">Lihat File Foto</a> |
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-content" plain="true" onclick="Cari_Ktp();$('#d').window('open')">Lihat File KTP</a> |
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-master" plain="true" onclick="Cari_KK();$('#e').window('open')">Lihat File KK</a> |
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-report2" plain="true" onclick="Cari_Ijazah();$('#w').window('open')">Lihat File Ijazah</a> |
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-report_user" plain="true" onclick="Cari_skhun();$('#f').window('open')">Lihat File SKHUN </a> |
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-pesan" plain="true" onclick="Cari_nilai_rapot();$('#g').window('open')">Lihat File Nilai Rapot</a>
    </td>
    </td>
    
</tr> 
</table>
</div>     
<table id="datagrid-crud" title="Daftar <?php echo $judul;?>" class="easyui-datagrid" style="width:auto; height: auto;" url="<?php echo site_url('administrator/data_formulir/view'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="nik" width="30" sortable="true" align="center">No Daftar</th>
			<th field="NoUjian" width="30" sortable="true" align="center">No Ujian</th>
            <th field="ThAjaran" width="20" sortable="true" align="center">Th Ajaran</th>
            <th field="TglDaftar" width="30" sortable="true">TglDaftar</th>
            <th field="Nama" width="50" sortable="true">Nama</th>
            <th field="JK" width="10" sortable="true" align="center">L/P</th>
            <th field="Jur1" width="30" sortable="true">Pilih Jur 1</th>
            <th field="Jur2" width="30" sortable="true">Pilih Jur 2</th>
            <th field="RUjian" width="30" sortable="true" align="center">Ruang</th>
		</tr>
	</thead>
</table>           

<div id="b" class="easyui-window" title="Biodata Peserta" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:600px;padding:10px;">
	<?php /* echo $this->load->view('administrator/data_formulir/formulir_isi') */ ;?>
</div>

<div id="c" class="easyui-window" title="File Foto" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:300px;height:220px;padding:10px;">
	<img id="imagesFoto" />
</div>

<div id="d" class="easyui-window" title="File KTP" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:300px;height:300px;padding:10px;">
	<img id="imagesKtp" />
</div>

<div id="e" class="easyui-window" title="File KK" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:1000px;height:600px;padding:10px;">
	<img id="imagesKk" />
</div>

<div id="w" class="easyui-window" title="File Ijazah" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:800px;height:600px;padding:10px;">
	<img id="imagesIjazah" />
</div>

<div id="f" class="easyui-window" title="File SKHUN" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:300px;padding:10px;">
	<img id="imagesSkhun" />
</div>

<div id="g" class="easyui-window" title="File Nilai Rapot" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:300px;padding:10px;">
	<img id="imagesNilaiRapot" />
</div>

