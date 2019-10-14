<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function index() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Data Pembayaran Pendaftaran";
			
			$d['content']= $this->load->view('administrator/pembayaran/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function view() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_bayar();
			else
				$this->load->view('administrator/pembayaran/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}

	public function update_valid() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "mspcmb";

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
					$this->app_model->update_valid($id);
					echo "Pembayaran Lunas";
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

	public function update_tidak_valid() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "mspcmb";

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
					$this->app_model->update_tidak_valid($id);
					echo "Pembayaran Dihapuskan";
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