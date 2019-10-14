<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenjang_akademik extends CI_Controller {
	
	public function index() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul']="Jenjang Akademik";
			
			$d['content']= $this->load->view('administrator/jenjang_akademik/view',$d,true);
			$this->load->view('administrator/home',$d);
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function view() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			if(isset($_GET['grid']))
				echo $this->json_model->getJson_jenjangAkademik();
			else
				$this->load->view('administrator/jenjang_akademik/view');
		}else{
			redirect('/administrator/login/login/');
		}
	}
	
	public function simpan() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$table = "tbakademik";
				$id['id'] = $this->input->post('id');
				
				$up['akademik'] = $this->input->post('akademik');
                $up['deskripsi'] = $this->input->post('deskripsi');
                $up['gelar'] = $this->input->post('gelar');
			
				$hasil = $this->app_model->getSelectedData($table,$id);
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->updateData($table,$up,$id);
					echo "Data sukses diubah";
				}else{
					$this->app_model->insertData($table,$up);
					echo "Data sukses disimpan";
				}
				
				//echo "Maaf, Belum ada script";
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
	public function hapus() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
				
				$id['id'] = $this->input->post('id'); //
				
				$hasil = $this->app_model->getSelectedData("tbakademik",$id); //
				$row = $hasil->num_rows();
				if($row>0){
					$this->app_model->deleteData("tbakademik",$id);
					echo "Data sukses dihapus";
				}
		}else{
				redirect('/administrator/login/login/');
		}
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */