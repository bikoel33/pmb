<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ref_json extends CI_Controller {

	public function tes(){
		$this->db = $this->load->database('iain',true);
		$text = "SELECT * FROM tagihan_mhs_btn WHERE kode_bayar='PMB' ";
		$data = $this->app_model->manualQuery($text);
		foreach($data->result()as $t){
			echo $t->nim."<br>";
		}
	}
	
	public function List_Jurusan() {
		$id = $this->input->post('id');
		// print_r($id);exit();
		
		// $text = "SELECT * FROM tbjurusan WHERE Fak='$id' AND tampil='Ya' ORDER BY kd_jur_baru";
		$text = "SELECT * FROM tbjurusan WHERE akademik='$id' AND tampil='Ya' ORDER BY kd_jur_baru";
		$d = $this->app_model->manualQuery($text);
		echo "
			<table class='table table-bordered table-striped table-hover'>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Program Studi</th>
					</tr>
				</thead>
				<tbody>
		";
					$no=1;
					foreach($d->result_array() as $t){
					echo "
					<tr>
						<td class='span1'><center>$no</center></td>
						<td>$t[Jur]</td>
					</tr>";
					$no++;
					}
		echo "
				</tbody>
			</table>
		";
	}

	public function List_Kota()
	{
			$id = $this->input->post('id');
			$text = "SELECT * FROM kab_kota WHERE id_provinsi='$id'";
			$d = $this->app_model->manualQuery($text);
			foreach($d->result_array() as $t){
			?>
				<option value="<?php echo $t['kab_kota'];?>"><?php echo $t['kab_kota'];?></option>";
			<?php
            }
	}
	
	public function cari_lulusan()
	{
			$id = $this->input->post('noujian');
			$text = "";
			$cek = "select * from mspcmb where kelulusan = 'LULUS' and nik = '$id'";
			$hcek = $this->app_model->manualQuery($cek);
			$baris = $hcek->num_rows();

			if($baris > 0 ){
				$text = "SELECT * FROM mspcmb WHERE kelulusan='LULUS' AND nik='$id'";
			}else{
				$text = "SELECT * FROM mspcmb_gel_3 WHERE kelulusan='LULUS' AND nik='$id'";
			}
			//$text = "SELECT * FROM mspcmb WHERE kelulusan='LULUS' AND nik='$id'";
			$data = $this->app_model->manualQuery($text);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result() as $t){
					echo "<div class='alert alert-success'>
					<center>NIK Anda : $id <br>
					Nama : ".$this->app_model->cari_nama($id)."<br><br>
					<strong>SELAMAT ANDA DINYATAKAN LULUS</strong><br>
					<strong>Silakan lakukan pendaftaran ulang untuk melengkapi syarat kelulusan Anda</strong><br>".
					"<br>
					</center></div>";
				}
			}else{
				$nama = $this->app_model->cari_nama($id);
				$status_bayar = $this->app_model->cari_bayar($id);
				if(empty($nama)){
				echo "<div class='alert alert-danger'>
					<center><strong>NIK Anda Salah</strong><br>
					Silahkan Cek Kembali NIK Anda.</center>
					</div>";	
				}elseif (!empty($status_bayar)){
					echo "<div class='alert alert-danger'>
					<center>NIK Anda : $id <br>
					<center><strong>Anda Tidak Hadir Pada Tes Gelombang Ke-3</strong><br>
					<center><strong>Silakan Untuk Menghubungi Panitia</strong><br>
					</div>";	
				}
				else{
				echo "<div class='alert alert-danger'>
					<center>NIK Anda : $id <br>
					Nama : ".$this->app_model->cari_nama($id)."</center><br><br>
					<center><strong>Anda TIDAK LULUS</strong></center><br>
					</div>";
				}
			}
	}

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */