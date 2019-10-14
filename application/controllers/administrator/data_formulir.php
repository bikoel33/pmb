<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_formulir extends CI_Controller {

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Calon Mahasiswa";
			
			$d['content']= $this->load->view('administrator/data_formulir/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function view() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB();
			else
				$this->load->view('administrator/data_formulir/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function view_diploma(){ // Load Halaman
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Calon Mahasiswa Diploma III (D3)";
			
			$d['content']= $this->load->view('administrator/data_formulir/view_diploma',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function load_isi_diploma() { // Load Isi Table
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB_diploma();
			else
				$this->load->view('administrator/data_formulir/view_diploma');
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function view_sarjana(){ // Load Halaman
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Calon Mahasiswa Strata I (S1)";
			
			$d['content']= $this->load->view('administrator/data_formulir/view_sarjana',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function load_isi_sarjana() { // Load Isi Table
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB_sarjana();
			else
				$this->load->view('administrator/data_formulir/view_sarjana');
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function view_magister(){ // Load Halaman
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Calon Mahasiswa Strata II (S2)";
			
			$d['content']= $this->load->view('administrator/data_formulir/view_magister',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function load_isi_magister() { // Load Isi Table
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB_magister();
			else
				$this->load->view('administrator/data_formulir/view_magister');
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function view_doktor(){ // Load Halaman
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Calon Mahasiswa Strata III (S3)";
			
			$d['content']= $this->load->view('administrator/data_formulir/view_doktor',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function load_isi_doktor() { // Load Isi Table
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB_doktor();
			else
				$this->load->view('administrator/data_formulir/view_doktor');
		}else{
			redirect('/administrator/login/login/');
		}
	}


	// public function data(){
	// 	echo "Data";
	// }
	
	public function cari_data(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Detail Calon Mahasiswa";
			//$nim = '';
			$id['nik']  = $this->input->post('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);

			foreach($data->result() as $t){
				$d['nik'] = $t->nik;
				$d['NoUjian'] = $t->NoUjian;
				$d['lokasi'] = $t->lokasi;
				$d['prodi'] = $t->prodi;
				$d['waktu'] = $t->waktu;
				$d['Nama'] = $t->Nama;
				$d['TmptLhr'] = $t->TmptLhr;
				$d['TglLhr'] = $this->app_model->tgl_indo($t->TglLhr);
				$d['JK'] = $t->JK;
				$d['Alamat1'] = $t->Alamat1;
				$d['Alamat2'] = $t->Alamat2;
				$d['Telp'] = $t->Telp;
				$d['EMail'] = $t->EMail;
				$d['Kota'] = $t->Kota;
				$d['WN'] = $t->WN;
				$d['BB'] = $t->BB;
				$d['TB'] = $t->TB;
				$d['GolDarah'] = $t->GolDarah;
				$d['Hobby'] = $t->Hobby;
				$d['Penyakit'] = $t->Penyakit;
				$d['AsalSek'] = $t->AsalSek;
				$d['NmAsalSek'] = $t->NmAsalSek;
				$d['NoIjazah'] = $t->NoIjazah;
				$d['IjTh'] = $t->IjTh;
				$d['IjJmlMP'] = $t->IjJmlMP;
				$d['IjJmlNilai'] = $t->IjJmlNilai;
				$d['NmAyah'] = $t->NmAyah;
				$d['KerjaAyah'] = $t->KerjaAyah;
				$d['HasilAyah'] = $t->HasilAyah;
				$d['PendAyah'] = $t->PendAyah;
				$d['NmIbu'] = $t->NmIbu;
				$d['KerjaIbu'] = $t->KerjaIbu;
				$d['HasilIbu'] = $t->HasilIbu;
				$d['PendIbu'] = $t->PendIbu;
				$d['NmWali'] = $t->NmWali;
				$d['AlamatWali'] = $t->AlamatWali;
				$d['HubWali'] = $t->HubWali;
				$d['Survey'] = $t->Survey;
				$d['foto'] = $t->foto;
			}

							  
			$d['content']= $this->load->view('administrator/data_formulir/formulir_isi',$d,true);
			echo $this->load->view('administrator/data_formulir/formulir_isi',$d);
			
		}else{
			redirect('/home/logout');
		}
	}
	

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */