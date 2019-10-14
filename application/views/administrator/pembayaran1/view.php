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
		window.location.assign("<?php echo base_url();?>index.php/administrator/data_iain/edit/"+kode);
	}
}
function Cari_Ijazah(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.file_ijazah;
	$("#images").attr('src','<?php echo base_url();?>peserta/ijazah/'+file);
}

function Cari_Bukti(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var file = row.pembayaran;
	$("#images").attr('src','<?php echo base_url();?>peserta/pembayaran1/'+file);
}

function cari_data(){
	var row = $('#datagrid-crud').datagrid('getSelected');
	var noujian = row.NoUjian;
	//alert(noujian);
	
	$.ajax({
		type	: "POST",
		url		: "<?php echo site_url('administrator/pembayaran1/cari_data'); ?>",
		data	: "noujian="+noujian,
		success	: function(data){
			$("#b").html(data);
		}
		
	});
}

function update_valid(){
    var row = $('#datagrid-crud').datagrid('getSelected');
    var nik = row.nik;
    // alert(nik);
 
	if (row){  
		$.messager.confirm('Confirm','Apakah Pembayaran Valid???',function(r){  
			if (r){  
				$.ajax({
					type	: "POST",
					url		: "<?php echo site_url('administrator/pembayaran1/update_valid'); ?>",
                    data	: 'nik='+nik,
					success	: function(data){
						$.messager.show({
							title:'Info',
							msg:data,
							timeout:2000,
							showType:'slide'
						});
						$('#datagrid-crud').datagrid('reload');
					}
				});  
			}  
		});  
	}  
}

function update_tidak_valid(){
    var row = $('#datagrid-crud').datagrid('getSelected');
    var nik = row.nik;
    // alert(nik);
 
	if (row){  
		$.messager.confirm('Confirm','Apakah Pelunasan Akan Dihapuskan???',function(r){  
			if (r){  
				$.ajax({
					type	: "POST",
					url		: "<?php echo site_url('administrator/pembayaran1/update_tidak_valid'); ?>",
                    data	: 'nik='+nik,
					success	: function(data){
						$.messager.show({
							title:'Info',
							msg:data,
							timeout:2000,
							showType:'slide'
						});
						$('#datagrid-crud').datagrid('reload');
					}
				});  
			}  
		});  
	}  
}

</script>


<!-- Data Grid -->
<!-- Toolbar -->
<div id="toolbar" style="padding:5px;height:auto">

    <table cellpadding="0" cellspacing="0" style="width:100%" border="0">
        <tr height="35px">
            <td width="30%">
                Cari Tanggal : <input id="cari_tgl" style="width:100px">  
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearchTgl()">Cari Tanggal</a>&nbsp;|
            </td>
            <td width="25%">
                Prodi 
                <select name="prodi" id="prodi">
                    <option value="">-PILIH-</option>
                    <?php
                        $data = $this->admin_model->list_prodi();
                        foreach($data->result() as $t){
                    ?>
                        <option value="<?php echo $t->sing;?>"><?php echo $t->sing;?></option>
                    <?php } ?>
                </select>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearchProdi()">Cari Prodi</a>&nbsp;|
            </td>
            <td width="25%">
                Ruang 
                <select name="ruang" id="ruang">
                    <option value="">-PILIH-</option>
                    <?php
                        $data = $this->admin_model->list_ruang();
                        foreach($data->result() as $t) {
                    ?>
                        <option value="<?php echo $t->RUjian;?>"><?php echo $t->RUjian;?></option>
                    <?php } ?>
                </select>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="cariRuang()">Cari Ruang</a>
            </td>
            <td width="20%" align="right">
                <input id="cari" class="easyui-searchbox" data-options="prompt:'Pencarian No Ujian dan Nama ..',searcher:doSearch" style="width:250px">         
            </td>
        </tr>
        <tr>
            <td width="70%" colspan="3">
                <a href="<?php echo base_url();?>index.php/administrator/generate" class="easyui-linkbutton" iconCls="icon-reload" plain="true">Refresh</a> | 
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="cari_data();$('#b').window('open')">Lihat Biodata </a> | 
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="Cari_Bukti();$('#w').window('open')">Lihat Bukti Bayar</a>
            </td>
            <td width="30%" align="right">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update_valid()">Valid</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="update_tidak_valid()">Tidak Valid </a>
            </td>
        </tr>
    </table>

</div> 
    
<table id="datagrid-crud" title="Daftar <?php echo $judul;?>" class="easyui-datagrid" style="width:auto;height:auto;" url="<?php echo site_url('administrator/pembayaran1/view'); ?>?grid=true" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">
	<thead>
		<tr>
			<th field="nik" width="30" sortable="true" align="center">Username</th>
			<th field="NoUjian" width="20" sortable="true" align="center">No Ujian</th>
            <th field="TglDaftar" width="25" sortable="true">TglDaftar</th>
            <th field="Nama" width="50" sortable="true">Nama</th>
			<th field="akademik" width="20" sortable="true">Jenjang</th>
            <th field="Jur1" width="15" sortable="true">Jurusan</th>
            <th field="pembayaran" width="30" sortable="true">Bukti Pembayaran</th>
            <th field="nm_bank_pengirim" width="30" sortable="true">Nama Bank Pengirim</th>
            <th field="nm_pengirim" width="30" sortable="true">Nama Pengirim</th>
            <th field="norek_pengirim" width="30" sortable="true">No Rekening Pengirim</th>
            <th field="status_bayar" width="30" sortable="true" align="center">Status Validasi</th>
		</tr>
	</thead>
</table>       

<div id="w" class="easyui-window" title="File Bukti Transfer" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:300px;padding:10px;">
	<img id="images" />
</div>

<div id="b" class="easyui-window" title="Biodata Peserta" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:600px;padding:10px;">
	<?php /* echo $this->load->view('administrator/data_formulir/formulir_isi') */ ;?>
</div>