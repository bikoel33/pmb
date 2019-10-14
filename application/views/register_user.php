<ul id="crumbs">
	<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
	<li class="active">Form Daftar User Login</li>
</ul>
<br>

<?php if($this->session->flashdata('form_true')){?>
    <div id="notif">               
        <?php echo $this->session->flashdata('form_true');?>               
    </div>
    <?php } elseif($this->session->flashdata('form_false')){?>
    <div id="notif">               
        <?php echo $this->session->flashdata('form_false');?>               
    </div>
<?php } ?>

<div class="panel-body">

    <div class="table-responsive">
        <form method="POST" action="<?php echo base_url();?>index.php/home/insert_daftar_login">
            <table align="center" border="0" width="100%">
                <tr height="30px">
                    <td colspan="3"><h1><strong>Form Pendaftaran User Login</strong></h1></td>
                </tr>
                <tr height="30px">
                    <td colspan="3">
                        <!-- <hr> -->
                        <input type="hidden" name="petugas" id="petugas" value="Administrator"/>
                        <input type="hidden" name="tahun" id="tahun" value="2019"/>
                        <input type="hidden" name="biaya" id="biaya" value="200000"/>
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%">NIK KTP</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <input type="text" name="nik" id="nik" class="form-control input-sm" placeholder="NIK KTP" onkeypress="return FormatAngka(event)" autofocus required />  
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%">Nama Lengkap</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <input type="text" name="nama" id="nama" class="form-control input-sm" placeholder="Nama Lengkap" required />  
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%">No. Handphone</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <input type="text" name="no_hp" id="no_hp" class="form-control input-sm" placeholder="No. Handphone" required />  
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%">Password</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required />  
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%">Jenjang Akademik</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <select name="akademik" id="akademik" class="form-control input-sm" required>
                            <option value="">- JENJANG AKADEMIK -</option>
                            <option value="D3">D3 - Diploma III</option>
                            <option value="S1">S1 - Strata I</option>
                            <option value="S2">S2 - Strata II</option>
                            <option value="S3">S3 - Strata III</option>
                        </select>
                    </td>
                </tr>
                <tr height="30px">
                    <td width="25%"></td>
                    <td width="5%"></td>
                    <td width="70%">
                        <select name="jalur" id="jalur" class="form-control input-sm">
                            <option value="">- Pilih Jalur Pendaftaran -</option>
                            <option value="mandiri">Mandiri</option>
                            <option value="prestasi">Prestasi</option>
                        </select>
                    </td>
                </tr>
                <!-- <tr height="30px">
                    <td width="25%">Ulangi Password</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <input type="password" name="password2" id="password2" class="form-control input-sm" placeholder="Ulangi Password" required />  
                    </td>
                </tr> -->
                <tr height="30px">
                    <td colspan="3"><hr></td>
                </tr>
                <tr height="30px">
                    <td colspan="3" align="left">
                        <table align="center" border="0" width="100%">
                            <tr>
                                <td width="25%"></td>
                                <td width="30%" align="right">
                                    <button type="button" class="btn btn-danger btnSimpan"><i class="icon-remove-sign"></i>&nbsp; Batal</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-success"><i class="icon-ok-sign"></i>&nbsp; Simpan</button>
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>

        <table align="center" border="0" width="100%">
            <tr>
                <td>
                    <font color="red">*Catatan :</font>
                </td>
            </tr>
            <tr>
                <td height="40px">
                    <font color="red">
                        Harap di <strong>INGAT Nomor Induk KTP (NIK)</strong>. Karena pada saat login peserta menggunakan <strong>Nomor Induk KTP (NIK)</strong>
                    </font>
                </td>
            </tr>
        </table>

    </div>

</div>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function(){
$('#jalur').hide();

	$('#akademik').change(function(){
      	var akademik = $(this).val();

		// AJAX request
		if(akademik == "S1" || akademik == "D3"){
			$('#jalur').show();
		}else{
			$('#jalur').hide();
		}
  	});

    $(".btnSimpan").click(function(){
        // redirect('home');
        window.location.href = '<?php echo base_url();?>';
        return false;
    });

});

function FormatAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
}

// $(function () {
//     $("#btnSubmit").click(function () {
//         var password = $("#password").val();
//         var password2 = $("#password2").val();
//         if (password != password2) {
//             alert("Passwords tidak sama, silahkan ulangi dengan benar dan teliti!!!");
//             return false;
//         }
//         return true;
//     });
// });
</script>