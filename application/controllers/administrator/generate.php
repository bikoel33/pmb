<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller {

	public function index() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Generate Kelulusan";
			
			$d['content']= $this->load->view('administrator/generate/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function view() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_data_PMB_Lulus();
			else
				$this->load->view('administrator/data_beli/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function update_lulus() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "mspcmb_gel_3";

				// $id['nik'] = "$nik";
				$id['nik'] = $this->input->post('nik');
				// print_r($id);exit();

				// $up['kelulusan'] = $this->input->post('kelulusan');
				// print_r($up);exit();
				// $nik['nik'] = $this->input->post('nik');
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				// print_r($hasil);exit();
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->update_lulus($id);
					echo "Calon Mahasiswa telah LULUS";
				}else{
					$this->app_model->insertData($table,$up);
					echo "Data sukses disimpan";
				}
				
				//echo "Maaf, Kode belum ada";
		}else{
				redirect('/administrator/login/login/');
		}
		// print_r($id);exit();
	}

	public function update_tidak_lulus() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "mspcmb_gel_3";

				// $id['nik'] = "$nik";
				$id['nik'] = $this->input->post('nik');
				// print_r($id);exit();

				// $up['kelulusan'] = $this->input->post('kelulusan');
				// print_r($up);exit();
				// $nik['nik'] = $this->input->post('nik');
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				// print_r($hasil);exit();
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->update_tidak_lulus($id);
					echo "Calon Mahasiswa TIDAK LULUS";
				}else{
					$this->app_model->insertData($table,$up);
					echo "Data sukses disimpan";
				}
				
				//echo "Maaf, Kode belum ada";
		}else{
				redirect('/administrator/login/login/');
		}
		// print_r($id);exit();
	}


	
}