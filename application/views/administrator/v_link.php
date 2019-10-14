<script type="text/javascript">
$(function() {
	$("#dataTable tr:even").addClass("stripe1");
	$("#dataTable tr:odd").addClass("stripe2");
	$("#dataTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
</script>
<p>
<form name="form" action="<?php echo base_url();?>index.php/administrator/link/tambah" method="post">
<button type="submit" name="tambah" id="tambah" class="easyui-linkbutton" data-options="iconCls:'icon-add'">Tambah Data</button>
</form>
</p>
<table id="dataTable" width="100%">
<tr>
	<th>No</th>
    <th>Lembaga</th>
    <th>Link</th>
    <th>Gambar</th>
    <th>Aksi</th>
</tr>
<?php
	if($data->num_rows()>0){
		$no =1+$hal;
		foreach($data->result_array() as $db){  
		$tgl = $this->app_model->tgl_indo($db['tgl_posting']); 
		?>    
    	<tr>
			<td align="center"><?php echo $no; ?></td>
            <td ><?php echo $db['judul']; ?></td>
            <td ><?php echo $db['url']; ?></td>
            <td align="center"><?php echo $db['gambar']; ?></td>
            <td align="center">
            <a href="<?php echo base_url();?>index.php/administrator/link/edit/<?php echo $db['id_banner'];?>">
			<img src="<?php echo base_url();?>asset/images/ed.png" title='Ubah'>
			</a>
            <a href="<?php echo base_url();?>index.php/administrator/link/hapus/<?php echo $db['id_banner'];?>"
            onClick="return confirm('Anda yakin ingin menghapus data ini?')">
			<img src="<?php echo base_url();?>asset/images/del.png" title='Hapus'>
			</a>
            </td>
    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="5" align="center" >Tidak Ada Data</td>
        </tr>
    <?php	
	}
?>
</table>
<?php echo "<table align='center'><tr><td>".$paginator."</td></tr></table>"; ?>