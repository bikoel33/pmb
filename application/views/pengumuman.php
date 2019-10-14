<script type="text/javascript">
$(document).ready(function(){
	$("#cek").click(function(){
		var noujian = $("#noujian").val();
		if(noujian.length==0){
			alert('Maaf, Anda belum mengisi NIK');
			$("#noujian").focus();
			return false();
		}
		$.ajax({
			type	: 'POST',
			url	: "<?php echo site_url(); ?>/ref_json/cari_lulusan",
			data	: "noujian="+noujian,
			cache	: false,
			success	: function(data){
			  	$("#tampil_data").html(data);
		  	}
	  });
	});
});
</script>

<ul id="crumbs">
	<li><a href="<?php echo base_url();?>index.php/home" class="home"><i class="icon-home icon-black"></i>Home</a></li>
	<li class="active">Pengumuman Kelulusan</li>
</ul>
<br>
<!-- <center>
	<h2>
		Pengumuman Kelulusan PMB Tahun 2019/2020
		<br>
		UNIVERSITAS NAHDLATUL ULAMA INDONESIA
	</h2>
</center> -->

<div align="center">
	<label><b>Masukan NIK Anda</b></label>
	<input type="text" name="noujian" id="noujian" class="span3"><br>
	<button type="button" class="btn btn-primary" name="cek" id="cek"><i class="icon-ok"></i> Cek Kelulusan</button>
</div>

<!-- <div align="center">
	<label><b><font style="color: red">Pengumuman Kelulusan Gelombang Ke-1 Dimulai Tanggal 25 Mei 2019</font></b></label>
	<input type="text" name="noujian" id="noujian" class="span3"><br>
	<button type="button" class="btn btn-primary" name="cek" id="cek"><i class="icon-ok"></i> Cek Kelulusan</button>
</div> -->
<br>

<div id="tampil_data"></div>
<div>
	<table align="center">
		<tr>
			<td colspan="2" style="text-align: center"><h2>PENGUMUMAN</h2></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><strong>Nomor: 800/Rek/100.01.11/V/2019</strong></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><strong>Surat Keputusan Tentang</strong></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center"><strong>Kelulusan Calon Mahasiswa Baru 2019-2020</strong></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: justify;">Bagi Calon Mahasiswa Baru Universitas Nahdlatul Ulama yang telah dinyatakan Lulus. Silakan melakukan <strong>pendaftaran ulang</strong> di kampus A Jl. Taman Amir Hamzah No 5 Pegangsaan Menteng Jakarta Pusat, dengan melengkapi pembayaran uang gedung ke rekening <strong>7130090038 a.n. Universitas NU Indonesia</strong>. </td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: justify;">Adapun berkas persyaratan yang perlu dibawa saat melakukan daftar ulang adalah sebagai berikut:</td>
		</tr>
		<tr>
			<td>1. </td>
			<td>Membawa Ijazah/SKL Asli</td>
		</tr>
		<tr>
			<td>2. </td>
			<td>Membawa SKHUN Asli</td>
		</tr>
		<tr>
			<td>3. </td>
			<td>Membawa KTP Asli</td>
		</tr>
		<tr>
			<td>4. </td>
			<td>Membawa Kartu Keluarga Asli</td>
		</tr>
		<tr>
			<td>5. </td>
			<td>Membawa tanda bukti pembayaran uang pembangunan Rp. 3.000.000,-</td>
		</tr>
	</table>
	<br>
<!-- <p align="justify">
Berdasarkan Rapat Kelulusan Penerimaan Calon Mahasiswa Baru (PCMB) Tahun Akademik 2013/2014 
pada Institut Agama Islam Negeri “Sultan Maulana Hasanuddin” Banten tanggal 2 Agustus 2013, 
dengan ini diumumkan Hasil Ujian Tulis dan Lisan Penerimaan Calon Mahasiswa Baru dengan perincian sebagai berikut:</p>
<ol>
<li>Peserta yang dinyatakan Lulus PCMB Berjumlah <b>578 orang</b> terdiri atas :</li>
A.	Fakultas Syariah dan Ekonomi Islam<br>
<ul>
<li>Jurusan Hukum Keluarga (Akhwal Syahsiyyah)		: 42 Orang</li>
<li>Hukum Tatanegara (Siyasah)				: 50 Orang</li>
<li>Hukum Ekonomi Syariah (Muamalah)			: 69 Orang</li>
<li>Ekonomi Syariah						: 80 Orang</li>
<li>Jumlah							: 241 Orang</li>
</ul>
B.	Fakultas Tarbiyah dan Keguruan<br>
<ul>
<li>Pendidikan Agama Islam					: 12 Orang</li>
<li>Pendidikan Bahasa Arab 					: 55 Orang</li>
<li>Pendidikan Bahasa Inggris					: 49 Orang</li>
<li>Pendidikan Guru Madrasah Ibtidaiyah			: 31 Orang</li>
<li>Jumlah							: 147 Orang</li>
</ul>
C.	Fakultas Ushuluddin, Dakwah dan Adab<br>
<ul>
<li>Filsafat Agama						:  4 Orang</li>
<li>Ilmu Al-Qur’an dan Tafsir					:  29 Orang</li>
<li>Komunikasi Penyiaran Islam				:  51 Orang</li>
<li>Bimbingan dan Konseling Islam				:  62 Orang</li>
<li>Sejarah Kebudayaan Islam					:  27 Orang</li>
<li>Bahasa dan Sastra Arab					: 17 Orang</li>
<li>Jumlah							: 190 Orang</li>
</ul>
D.	Jumlah Lulus Tidak Tertampung (LTT)			: 182 Orang<br>
<li>Bagi yang lulus tidak tertampung dipersilahkan untuk mendaftar pada jurusan dan kuota sebagai berikut:</li>
a.	Hukum Keluarga (Akhwal Syahsiyyah) = 30 Orang	<br>
b.	Sejarah dan Kebudayaan Islam = 27 Orang<br>
c.	Hukum Ekonomi Syariah (Muamalah) = 25 Orang<br>	
d.	Filsafat Agama = 29 Orang<br>
e.	Ilmu Al-Qur’an dan Tafsir = 19 Orang	<br>
f.	Komunikasi Penyiaran Islam = 10 Orang<br>
g.	Bahasa dan Sastra Arab	= 37 Orang<br>
<li>Peserta yang dinyatakan Lulus Tidak Tertampung jika kuota masih tersedia pada jurusan di poin 2</li>
<li>Peserta yang tidak tercantum dalam lampiran pengumuman ini dinyatakan TIDAK LULUS;</li>
<li>Peserta yang dinyatakan lulus agar melakukan registrasi dari tanggal 19 sampai dengan 23 Agustus 2013 di <strong>Bank BTN Seluruh Indonesia</strong>, 
Sebesar <b>Rp. 2.315.000</b> <i>(Dua Juta Tiga Ratus Lima Belas Ribu Rupiah)</i> ;</li>
<li>Apabila sampai dengan tanggal tersebut peserta tidak melakukan registrasi,  maka dianggap mengundurkan diri;</li>
<li>Hal-hal yang menyangkut pendaftaran PCMB dapat dikonfirmasikan kebagian Akademik dan Kemahasiswaan.</li>
</ol>

Demikian Pengumuman ini disampaikan untuk diketahui.<br>
Serang, 16 Agustus 2013<br>
Rektor, <br>
<br>
<br>
<br>
Prof. Dr. H.E. Syibli Syarjaya, L.M.L.,M.M. <br>
NIP. 19500705 198303 1 001<br>
<br> -->
</div>