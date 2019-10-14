<script type="text/javascript">
$(function() {
	$("#fak").change(function(){
		var id = $("#fak").val();
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>/ref_json/list_Jurusan",
			data	: "id="+id,
			cache	: false,
			success	: function(data){
				$("#jurusan").html(data);
			}
	  	});
	});
});
</script>

<ul id="crumbs">
		<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
		<li class="active">Program Studi</li>
</ul>
<br>
<label>Jenjang Akademik</label>
	<select name="fak" id="fak" class="span5">
		<option value="">- PILIHAN JENJANG AKADEMIK -</option>
			<!-- <option value="">- PILIH FAKULTAS -</option> -->
		<?php foreach ($l_fak->result() as $t) { ?>
			<option value="<?php echo $t->akademik;?>"><?php echo $t->akademik;?></option>
		<?php } ?>
	</select>
<div id="jurusan"></div>