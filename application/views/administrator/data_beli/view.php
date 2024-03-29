<script type="text/javascript">
var url;
$( "#cari_tgl" ).datepicker();
function doSearch(value){  
	$('#datagrid-crud').datagrid('load',{    
        cari: value 
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
function cetak_bukti(){
		//var nisn = $("#nisn").val();
		var row = $('#datagrid-crud').datagrid('getSelected'); 
		var nik = row.nik;
		//alert(nisn);
		
		window.open('<?php echo site_url();?>/administrator/data_beli/cetak/'+nik);
		return false();
	}
</script>
<!-- Data Grid -->
<!-- Toolbar -->
<div id="toolbar " style="padding:5px;height:auto">
	<table cellpadding="0" cellspacing="0" style="width:100%">
		<tr>
			<td style="padding-left:2px;" width="70%"> 
				<input id="cari" class="easyui-searchbox" data-options="prompt:'Pencarian NIK Nama Lengkap..',searcher:doSearch" style="width:250px"></input> 
				Cari Tanggal : <input id="cari_tgl" style="width:100px">  <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearchTgl()">Cari</a>
			
			
				<a href="<?php echo base_url();?>index.php/administrator/data_beli" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Refresh</a> |
				<a href="<?php echo base_url();?>index.php/administrator/data_beli/tambah" class="easyui-linkbutton" iconCls="icon-add" plain="true">Tambah</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="true" onclick="cetak_bukti()">Cetak Bukti</a>
			</td>
		</tr>     
	</table>
</div>    

<table id="datagrid-crud" title="Daftar <?php echo $judul;?>" class="easyui-datagrid" style="width:auto; height:auto;" url="<?php echo site_url('administrator/data_beli/view'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="nik" width="25" sortable="true">Nik</th>
			<th field="tgl_daftar" width="25" sortable="true">Tanggal Daftar</th>
			<th field="akademik" width="20" sortable="true" align="center">Akademik</th>
			<th field="formasi" width="20" sortable="true" align="center">Formasi</th>
			<th field="nama" width="50" sortable="true">Nama Lengkap</th>
            <th field="no_hp" width="20" sortable="true">No HP</th>
			<th field="password" width="25" sortable="true">Password</th>
		</tr>
	</thead>
</table>      