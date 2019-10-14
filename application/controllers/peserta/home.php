<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		session_start();
	}

	public function index() {
		$cek = $this->session->userdata('logged_in'); 
		// $d['judul'] = 'Isi Biodata Pendaftaran'; 
		$id['nik'] = $this->session->userdata('nik');
		$id['akademik'] = $this->session->userdata('akademik');

		if($id['akademik'] == "D3"){
			$this->diploma();
		}
		if($id['akademik'] == "S1"){
			$this->sarjana();
		} 
		if($id['akademik'] == "S2"){
			$this->magister();
		}
		if($id['akademik'] == "S3"){
			$this->doktor();
		} 
	}

	public function indexBACKUPASLI() {
				
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Isi Biodata Pendaftaran';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['Jur1'] = $t->Jur1;
					$d['Jur2'] = $t->Jur2;
					$d['Jur3'] = $t->Jur3;
					
					$d['content']= $this->load->view('peserta/formulir_isi',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}



// ----------------------------  START FUNCTION INPUT DATA DIPLOMA -------------------------- //

	public function diploma() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Form Data Diri Pendaftaran D3';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['nisn'] = $t->nisn;
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}					
					// $d['content']= $this->load->view('peserta/formulir_isi',$d,true);
					$d['content']= $this->load->view('peserta/diploma/formulir_isi_diploma',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				// $d['content']= $this->load->view('peserta/formulir_diploma',$d,true);
				$d['content']= $this->load->view('peserta/diploma/formulir_diploma',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_biodata_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			$d['nisn'] = $this->input->post('nisn');;
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			$d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';

			$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "3";


			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row==0){
				//$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				$this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_formulir_diploma() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Form Data Diri Pendaftaran D3';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');

			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// echo "<pre>";
			// print_r($data);exit();

			foreach($data->result()as $t){
				$d['nik'] = $t->nik;
				$d['ThAjaran'] = $t->ThAjaran;
				$d['Angkatan'] = $t->Angkatan;
				$d['nisn'] = $t->nisn;
				$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
				$d['Nama'] = $t->Nama;
				$d['TmptLhr'] = $t->TmptLhr;
				$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
				$d['lokasi'] = $t->lokasi;
				$d['prodi'] = $t->prodi;
				$d['waktu'] = $t->waktu;
				$d['prodi2'] = $t->prodi2;
				$d['waktu2'] = $t->waktu2;
				
				// $d['content']= $this->load->view('peserta/formulir_isi',$d,true);
				$d['content']= $this->load->view('peserta/diploma/edit_formulir_diploma',$d,true);
				$this->load->view('peserta/home',$d);
				//redirect('/peserta/home/foto/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function simpan_edit_formulir_diploma() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			$d['nisn'] = $this->input->post('nisn');;
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			$d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// print_r($data);exit();
			$row = $data->num_rows();
			if($row!==0){
				$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				// $this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function foto_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Foto Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/foto_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_foto_diploma(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Foto Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_foto_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_foto_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			// $nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/foto/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['foto'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '300';
					$config['height']	= '150';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ktp_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/ktp_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ktp_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_ktp_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ktp_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ktp/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['ktp'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ktp/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function kk_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KK Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/kk_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_kk_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KK Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_kk_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_kk_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/kk/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['kk'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/kk/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ijazah_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/ijazah_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ijazah_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_ijazah_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_ijazah_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ijazah/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['file_ijazah'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ijazah/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function skhun_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload SKHUN Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/skhun_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_skhun_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload SKHUN Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_skhun_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_skhun_diploma() {		
		$cek = $this->session->userdata('logged_in');
		$jalur = $_POST['jalur'];
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/skhun/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['skhun'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/skhun/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg, 'jalur' => $jalur));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function nilai_rapot_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Scan Nilai Rapot Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/nilai_rapot_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_nilai_rapot_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Scan Nilai Rapot Pendaftaran D3';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_nilai_rapot_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_nilai_rapot_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/nilai_rapot/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['nilai_rapot'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/nilai_rapot/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function prodi_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			if(empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi Pendaftaran D3';
				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				$data = $this->app_model->getSelectedData("mspcmb",$id);

				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}
	
				/* content */	
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/diploma/prodi_diploma',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				redirect('/peserta/home/survey_diploma/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_prodi_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['gelombang'] = "2";

				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Input Data tidak dapat diulangi, File Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/survey_diploma/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_prodi_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNik($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// print_r($r_ujian);exit();
			// if(empty($no_ujian)){ //BACKUP
			if(!empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi Pendaftaran D3';

				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				// print_r($id['akademik']);exit();
				$data = $this->app_model->getSelectedData("mspcmb",$id);
				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}

				/* content */
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/diploma/edit_prodi_diploma',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				// print_r($no_ujian);exit();
				redirect('/peserta/home/edit_survey_diploma/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_edit_prodi_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian = $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian = $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// if(empty($no_ujian) && empty($r_ujian)){
			if(!empty($no_ujian) && !empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['gelombang'] = "2";
				
				$id['nik'] = $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else if(empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "2";

				/*print_r($_POST);
				echo $d['prodi2'];
				exit();*/
				
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil Disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/edit_survey_diploma/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function survey_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran D3';
			
			$d['content']= $this->load->view('peserta/diploma/survey_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_survey_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran D3';
			
			$d['content']= $this->load->view('peserta/diploma/edit_survey_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_survey_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));

			if(empty($r_ujian)){
				$thak = $this->config->item('thak');
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
			
			$hasil = "";
			for($i=1;$i<=9;$i++){
				$data = $this->input->post('cek'.$i);
				if(isset($data)){
					$hasil .= $this->input->post('cek'.$i);
				}
			}
			
			$d['Survey'] = $hasil;
			$d['nm_alumni'] = $this->input->post('nm_mhs');
			$id['nik']= $this->session->userdata('nik');
			$this->app_model->updateData("mspcmb",$d,$id);

			$status = "success";
			$msg = "Silahkan Lanjutkan ke Pembayaran";
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
				redirect('/peserta/home/selesai_diploma/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function selesai_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta D3';
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['nisn'] = $t->nisn;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
				}
			}
			
			$d['content']= $this->load->view('peserta/diploma/formulir_isi_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function pembayaran_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Bukti Pembayaran';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/pembayaran_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_pembayaran_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'bukti_pembayaran';
			$nik = $_POST['nik'];
			$nm_bank_pengirim = $_POST['nm_bank_pengirim'];
			$nm_pengirim = $_POST['nm_pengirim'];
			$norek_pengirim = $_POST['norek_pengirim'];
			$tgl_bayar = date('Y-m-d');

			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }elseif(empty($nm_bank_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Bank Pengirim Kosong";
		   }elseif(empty($nm_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Pengirim Kosong";
		   }elseif(empty($norek_pengirim)){
		   	  $status = "error";
			  $msg = "Nomor Rekening Pengirim Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/pembayaran/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nik');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['slip_pembayaran'] = $ori;
					$id['nik']= $this->session->userdata('nik');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/pembayaran/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();

					$f['nik'] = $this->session->userdata('nik');
					$f['nm_bank_pengirim'] = $nm_bank_pengirim;
					$f['nm_pengirim'] = $nm_pengirim;
					$f['norek_pengirim'] = $norek_pengirim;
					$f['file'] = $ori;
					$f['tanggal_upload'] = $tgl_bayar;



					$this->app_model->insertData("tbl_bayar",$f);
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function status_pembayaran_diploma() {
				
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Status Pembayaran';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = "";
					if($t->lokasi == 1){
						$d['lokasi'] = "Kampus A (Matraman)";
					}elseif($t->lokasi == 2){
						$d['lokasi'] = "Kampus B (Parung)";
					}else{
						$d['lokasi'] = "Kampus C (Kedoya)";
					}
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					
					$d['content']= $this->load->view('peserta/diploma/status_pembayaran_diploma',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir_diploma',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}


	public function sertifikat_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Sertifikat Prestasi';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/sertifikat_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_sertifikat_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Sertifikat Prestasi';

			/* content */	
			$d['content']= $this->load->view('peserta/diploma/edit_sertifikat_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_sertifikat_diploma() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/sertifikat_diploma/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['sertifikat'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/sertifikat_diploma/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

// ----------------------------  FINISH FUNCTION INPUT DATA DIPLOMA -------------------------- //



// ----------------------------  START FUNCTION INPUT DATA SARJANA -------------------------- //

	public function sarjana() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Form Data Diri Pendaftaran S1';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['nisn'] = $t->nisn;
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['prodi2'] = $t->prodi2;
					$d['waktu2'] = $t->waktu2;
					$d['slip_pembayaran'] = $t->slip_pembayaran;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					
					$d['content']= $this->load->view('peserta/sarjana/formulir_isi_sarjana',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/sarjana/formulir_sarjana',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_biodata_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
			$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			$d['nisn'] = $this->input->post('nisn');;
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			$d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			//$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "3";
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row==0){
				//$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				$this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_formulir_sarjana() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Form Data Diri Pendaftaran S1';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');

			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// echo "<pre>";
			// print_r($data);exit();

			foreach($data->result()as $t){
				$d['nik'] = $t->nik;
				$d['ThAjaran'] = $t->ThAjaran;
				$d['Angkatan'] = $t->Angkatan;
				$d['nisn'] = $t->nisn;
				$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
				$d['Nama'] = $t->Nama;
				$d['TmptLhr'] = $t->TmptLhr;
				$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
				$d['lokasi'] = $t->lokasi;
				$d['prodi'] = $t->prodi;
				$d['waktu'] = $t->waktu;
				$d['prodi2'] = $t->prodi2;
				$d['waktu2'] = $t->waktu2;
				
				// $d['content']= $this->load->view('peserta/formulir_isi',$d,true);
				$d['content']= $this->load->view('peserta/sarjana/edit_formulir_sarjana',$d,true);
				$this->load->view('peserta/home',$d);
				//redirect('/peserta/home/foto/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function simpan_edit_formulir_sarjana() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			$d['nisn'] = $this->input->post('nisn');;
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			$d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// print_r($data);exit();
			$row = $data->num_rows();
			if($row!==0){
				$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				// $this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function foto_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Foto Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/foto_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_foto_sarjana(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Foto Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_foto_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_foto_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			// $nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/foto/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['foto'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '300';
					$config['height']	= '150';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ktp_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/ktp_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ktp_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_ktp_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ktp_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ktp/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['ktp'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ktp/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function kk_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KK Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/kk_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_kk_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KK Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_kk_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_kk_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/kk/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['kk'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/kk/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ijazah_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/ijazah_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ijazah_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_ijazah_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ijazah_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ijazah/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['file_ijazah'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ijazah/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function skhun_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload SKHUN Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/skhun_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_skhun_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload SKHUN Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_skhun_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_skhun_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		$jalur = $_POST['jalur'];
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/skhun/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['skhun'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/skhun/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg, 'jalur' => $jalur));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function nilai_rapot_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Scan Nilai Rapot Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/nilai_rapot_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_nilai_rapot_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Scan Nilai Rapot Pendaftaran S1';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_nilai_rapot_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_nilai_rapot_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/nilai_rapot/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['nilai_rapot'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/nilai_rapot/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function prodi_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			if(empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi Pendaftaran S1';

				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				$data = $this->app_model->getSelectedData("mspcmb",$id);

				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}

				/* content */	
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/sarjana/prodi_sarjana',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				redirect('/peserta/home/survey_sarjana/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_prodi_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "2";

				/*print_r($_POST);
				echo $d['prodi2'];
				exit();*/
				
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil Disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/survey_sarjana/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_prodi_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNik($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// print_r($r_ujian);exit();
			// if(empty($no_ujian)){ //BACKUP
			if(!empty($no_ujian)){
				$d['judul'] = 'Pilih Kembali Program Studi Pendaftaran S1';
				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				// print_r($id['akademik']);exit();
				$data = $this->app_model->getSelectedData("mspcmb",$id);
				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
						$d['prodi2'] = $t->prodi2;
						$d['waktu2'] = $t->waktu2;
					}
				}

				/* content */
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/sarjana/edit_prodi_sarjana',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				// print_r($no_ujian);exit();
				redirect('/peserta/home/edit_survey_sarjana/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_edit_prodi_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian = $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian = $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// if(empty($no_ujian) && empty($r_ujian)){
			if(!empty($no_ujian) && !empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "2";

				//$d['Jur3'] = $this->input->post('');
				$id['nik'] = $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);

				$status = "success";
				$msg = "Data Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));

			}else if(empty($r_ujian)){
				$thak = $this->config->item('thak');
				//$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');
				$d['gelombang'] = "2";

				/*print_r($_POST);
				echo $d['prodi2'];
				exit();*/
				
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil Disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/edit_survey_sarjana/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function survey_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran S1';
			
			$d['content']= $this->load->view('peserta/sarjana/survey_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_survey_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PMB Pendaftaran S1';
			
			$d['content']= $this->load->view('peserta/sarjana/edit_survey_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_survey_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));

			if(empty($r_ujian)){
				$thak = $this->config->item('thak');
				$ruangujian = $this->app_model->RuangUjian($thak);
				//$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
			
			$hasil = "";
			for($i=1;$i<=9;$i++){
				$data = $this->input->post('cek'.$i);
				if(isset($data)){
					$hasil .= $this->input->post('cek'.$i);
				}
			}
			
			$d['Survey'] = $hasil;
			$d['nm_alumni'] = $this->input->post('nm_mhs');
			$id['nik']= $this->session->userdata('nik');
			$this->app_model->updateData("mspcmb",$d,$id);

			$status = "success";
			$msg = "Silahkan Lanjutkan ke Pembayaran";
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
				redirect('/peserta/home/selesai_sarjana/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function selesai_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta S1';
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['nisn'] = $t->nisn;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['prodi2'] = $t->prodi2;
					$d['waktu2'] = $t->waktu2;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
				}
			}
			$d['content']= $this->load->view('peserta/sarjana/formulir_isi_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function pembayaran_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Bukti Pembayaran';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/pembayaran_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_pembayaran_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'bukti_pembayaran';
			$nik = $_POST['nik'];
			$nm_bank_pengirim = $_POST['nm_bank_pengirim'];
			$nm_pengirim = $_POST['nm_pengirim'];
			$norek_pengirim = $_POST['norek_pengirim'];
			$tgl_bayar = date('Y-m-d');
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }elseif(empty($nm_bank_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Bank Pengirim Kosong";
		   }elseif(empty($nm_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Pengirim Kosong";
		   }elseif(empty($norek_pengirim)){
		   	  $status = "error";
			  $msg = "Nomor Rekening Pengirim Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/pembayaran/';
			$config['allowed_types'] = '*';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nik');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['slip_pembayaran'] = $ori;
					$id['nik']= $this->session->userdata('nik');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/pembayaran/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();

					$f['nik'] = $this->session->userdata('nik');
					$f['nm_bank_pengirim'] = $nm_bank_pengirim;
					$f['nm_pengirim'] = $nm_pengirim;
					$f['norek_pengirim'] = $norek_pengirim;
					$f['file'] = $ori;
					$f['tanggal_upload'] = $tgl_bayar;

					$this->app_model->insertData("tbl_bayar",$f);
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function status_pembayaran_sarjana() {
				
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Status Pembayaran';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = "";
					if($t->lokasi == 1){
						$d['lokasi'] = "Kampus A (Matraman)";
					}elseif($t->lokasi == 2){
						$d['lokasi'] = "Kampus B (Parung)";
					}else{
						$d['lokasi'] = "Kampus C (Kedoya)";
					}
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					
					$d['content']= $this->load->view('peserta/sarjana/status_pembayaran_sarjana',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir_sarjana',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}



	public function sertifikat_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Sertifikat Prestasi';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/sertifikat_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_sertifikat_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Sertifikat Prestasi';

			/* content */	
			$d['content']= $this->load->view('peserta/sarjana/edit_sertifikat_sarjana',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_sertifikat_sarjana() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/sertifikat_sarjana/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['sertifikat'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/sertifikat_sarjana/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

// ----------------------------  FINISH FUNCTION INPUT DATA SARJANA -------------------------- //



// ----------------------------  START FUNCTION INPUT DATA MAGISTER -------------------------- //

	public function magister() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Form Data Diri Pendaftaran S2';
			$id['nik'] = $this->session->userdata('nik');
			$id['nama'] = $this->session->userdata('nama');
			$id['akademik'] = $this->session->userdata('akademik');
			// echo "<pre>";
			// print_r($id);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['slip_pembayaran'] = $t->slip_pembayaran;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					// echo "<pre>";
					// print_r($d);exit();
					$d['content']= $this->load->view('peserta/magister/formulir_isi_magister',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	

				// echo "<pre>";
				// print_r($id);exit();
				$d['content']= $this->load->view('peserta/magister/formulir_magister',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_biodata_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
			$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			// $d['KdPS'] = 'S2';
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			// $d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row==0){
				//$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				$this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_formulir_magister() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Form Data Diri Pendaftaran S2';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');

			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// echo "<pre>";
			// print_r($data);exit();

			foreach($data->result()as $t){
				$d['nik'] = $t->nik;
				$d['ThAjaran'] = $t->ThAjaran;
				$d['Angkatan'] = $t->Angkatan;
				// $d['KdPS'] = 'S2';
				$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
				$d['Nama'] = $t->Nama;
				$d['TmptLhr'] = $t->TmptLhr;
				$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
				// $d['AsalSek'] = $t->AsalSek;
				$d['NmAsalSek'] = $t->NmAsalSek;
				$d['NoIjazah'] = $t->NoIjazah;
				$d['IjTh'] = $t->IjTh;
				// $d['IjJmlMP'] = $t->IjJmlMP;
				// $d['IjJmlNilai'] = $t->IjJmlNilai;
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
				$d['lokasi'] = $t->lokasi;
				$d['prodi'] = $t->prodi;
				$d['waktu'] = $t->waktu;
				
				// $d['content']= $this->load->view('peserta/formulir_isi',$d,true);
				$d['content']= $this->load->view('peserta/magister/edit_formulir_magister',$d,true);
				$this->load->view('peserta/home',$d);
				//redirect('/peserta/home/foto/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function simpan_edit_formulir_magister() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			// $d['KdPS'] = 'S2';
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			// $d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			// $d['IjJmlMP'] = $this->input->post('IjJmlMP');
			// $d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// print_r($data);exit();
			$row = $data->num_rows();
			if($row!==0){
				$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				// $this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function foto_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Foto Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/foto_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_foto_magister(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Foto Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_foto_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_foto_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			// $nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/foto/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['foto'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '300';
					$config['height']	= '150';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ktp_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/ktp_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ktp_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_ktp_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ktp_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ktp/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['ktp'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ktp/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ijazah_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/ijazah_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ijazah_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_ijazah_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ijazah_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ijazah_magister/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['file_ijazah_magister'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ijazah_magister/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function transkip_nilai_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Transkip Nilai Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/transkip_nilai_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_transkip_nilai_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Transkip Nilai Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_transkip_nilai_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_transkip_nilai_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/transkip_nilai_magister/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['transkip_nilai_magister'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/transkip_nilai_magister/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function proposal_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Proposal Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/proposal_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_proposal_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Proposal Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_proposal_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_proposal_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/proposal_magister/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			// $config['file_name'] = $this->session->userdata('nik');
			$config['file_name'] = $this->session->userdata('nama');			
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['proposal_magister'] = $ori;
					// $id['nik']= $this->session->userdata('nik');
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/proposal_magister/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function surat_pernyataan_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Surat Pernyataan Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/surat_pernyataan_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_surat_pernyataan_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Surat Pernyataan Pendaftaran S2';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/edit_surat_pernyataan_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_surat_pernyataan_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/surat_pernyataan/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['surat_pernyataan'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					 $config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/surat_pernyataan/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function prodi_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			if(empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi Pendaftaran S2';
				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				$data = $this->app_model->getSelectedData("mspcmb",$id);

				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}
	
				/* content */	
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/magister/prodi_magister',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				redirect('/peserta/home/survey_magister/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function simpan_prodi_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjianPasca($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['gelombang'] = "1";
				//$d['Jur3'] = $this->input->post('');
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Input Data tidak dapat diulangi, File Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/survey_magister/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_prodi_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNik($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// print_r($r_ujian);exit();
			// if(empty($no_ujian)){ //BACKUP
			if(!empty($no_ujian)){
				$d['judul'] = 'Pilih Kembali Program Studi Pendaftaran S2';

				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				// print_r($id['akademik']);exit();
				$data = $this->app_model->getSelectedData("mspcmb",$id);
				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}

				/* content */
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/magister/edit_prodi_magister',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				// print_r($no_ujian);exit();
				redirect('/peserta/home/edit_survey_magister/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_edit_prodi_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian = $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian = $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// if(empty($no_ujian) && empty($r_ujian)){
			if(!empty($no_ujian) && !empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				//$d['Jur3'] = $this->input->post('');
				$id['nik'] = $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Daata Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');

				/*print_r($_POST);
				echo $d['prodi2'];
				exit();*/
				
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil Disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/edit_survey_magister/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function survey_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran S2';
			
			$d['content']= $this->load->view('peserta/magister/survey_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_survey_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran S2';
			
			$d['content']= $this->load->view('peserta/magister/edit_survey_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_survey_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$hasil = "";
			for($i=1;$i<=9;$i++){
				$data = $this->input->post('cek'.$i);
				if(isset($data)){
					$hasil .= $this->input->post('cek'.$i);
				}
			}
			
			$d['Survey'] = $hasil;
			$id['nik']= $this->session->userdata('nik');
			$this->app_model->updateData("mspcmb",$d,$id);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function selesai_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta S2';
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
				}
			}
			
			$d['content']= $this->load->view('peserta/magister/formulir_isi_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function pembayaran_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Bukti Pembayaran';

			/* content */	
			$d['content']= $this->load->view('peserta/magister/pembayaran_magister',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_pembayaran_magister() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'bukti_pembayaran';
			$nik = $_POST['nik'];
			$nm_bank_pengirim = $_POST['nm_bank_pengirim'];
			$nm_pengirim = $_POST['nm_pengirim'];
			$norek_pengirim = $_POST['norek_pengirim'];
			$tgl_bayar = date('Y-m-d'); 
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }elseif(empty($nm_bank_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Bank Pengirim Kosong";
		   }elseif(empty($nm_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Pengirim Kosong";
		   }elseif(empty($norek_pengirim)){
		   	  $status = "error";
			  $msg = "Nomor Rekening Pengirim Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/pembayaran/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nik');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['slip_pembayaran'] = $ori;
					$id['nik']= $this->session->userdata('nik');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/pembayaran/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();

					$f['nik'] = $this->session->userdata('nik');
					$f['nm_bank_pengirim'] = $nm_bank_pengirim;
					$f['nm_pengirim'] = $nm_pengirim;
					$f['norek_pengirim'] = $norek_pengirim;
					$f['file'] = $ori;
					$f['tanggal_upload'] = $tgl_bayar;

					$this->app_model->insertData("tbl_bayar",$f);
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function status_pembayaran_magister() {
				
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Status Pembayaran';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = "";
					if($t->lokasi == 1){
						$d['lokasi'] = "Kampus A (Matraman)";
					}elseif($t->lokasi == 2){
						$d['lokasi'] = "Kampus B (Parung)";
					}else{
						$d['lokasi'] = "Kampus C (Kedoya)";
					}
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					
					$d['content']= $this->load->view('peserta/magister/status_pembayaran_magister',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir_magister',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

// ----------------------------  FINISH FUNCTION INPUT DATA MAGISTER -------------------------- //



// ----------------------------  START FUNCTION INPUT DATA DOKTOR -------------------------- //

	public function doktor() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Form Data Diri Pendaftaran S3';
			$id['nik'] = $this->session->userdata('nik');
			$id['nama'] = $this->session->userdata('nama');
			$id['akademik'] = $this->session->userdata('akademik');
			// echo "<pre>";
			// print_r($id);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['slip_pembayaran'] = $t->slip_pembayaran;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					// echo "<pre>";
					// print_r($d);exit();
					
					$d['content']= $this->load->view('peserta/doktor/formulir_isi_doktor',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	

				// echo "<pre>";
				// print_r($id);exit();
				$d['content']= $this->load->view('peserta/doktor/formulir_doktor',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_biodata_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
			$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			// $d['KdPS'] = 'S2';
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			// $d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			$d['IjJmlMP'] = $this->input->post('IjJmlMP');
			$d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row==0){
				//$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				$this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_formulir_doktor() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Form Data Diri Pendaftaran S3';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');

			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// echo "<pre>";
			// print_r($data);exit();

			foreach($data->result()as $t){
				$d['nik'] = $t->nik;
				$d['ThAjaran'] = $t->ThAjaran;
				$d['Angkatan'] = $t->Angkatan;
				// $d['KdPS'] = 'S2';
				$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
				$d['Nama'] = $t->Nama;
				$d['TmptLhr'] = $t->TmptLhr;
				$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
				// $d['AsalSek'] = $t->AsalSek;
				$d['NmAsalSek'] = $t->NmAsalSek;
				$d['NoIjazah'] = $t->NoIjazah;
				$d['IjTh'] = $t->IjTh;
				// $d['IjJmlMP'] = $t->IjJmlMP;
				// $d['IjJmlNilai'] = $t->IjJmlNilai;
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
				$d['lokasi'] = $t->lokasi;
				$d['prodi'] = $t->prodi;
				$d['waktu'] = $t->waktu;
				
				// $d['content']= $this->load->view('peserta/formulir_isi',$d,true);
				$d['content']= $this->load->view('peserta/doktor/edit_formulir_doktor',$d,true);
				$this->load->view('peserta/home',$d);
				//redirect('/peserta/home/foto/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function simpan_edit_formulir_doktor() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			date_default_timezone_set('Asia/Jakarta');
			$status = "";
		   	$msg = "";
			$tgllhr = $this->app_model->tgl_sql($this->input->post('TglLhr'));
						
			$d['nik'] = $this->session->userdata('nik');
			$d['akademik'] = $this->session->userdata('akademik');
			$d['Nama'] = $this->session->userdata('Nama');
			$d['ThAjaran'] = $this->config->item('thak');
			$d['Angkatan'] = $this->config->item('angkatan');
			// $d['KdPS'] = 'S2';
			$d['TglDaftar'] = date('Y-m-d');//$this->input->post('');
			$d['Nama'] = $this->input->post('Nama');
			$d['TmptLhr'] = $this->input->post('TmptLhr');
			$d['TglLhr'] = $tgllhr;
			$d['JK'] = $this->input->post('JK');
			$d['Alamat1'] = $this->input->post('Alamat1');
			$d['Alamat2'] = $this->input->post('Alamat2');
			$d['Telp'] = $this->input->post('Telp');
			$d['EMail'] = $this->input->post('EMail');
			$d['Kota'] = $this->input->post('Kota');
			$d['WN'] = $this->input->post('WN');
			$d['BB'] = $this->input->post('BB');
			$d['TB'] = $this->input->post('TB');
			$d['GolDarah'] = $this->input->post('GolDarah');
			$d['Hobby'] = $this->input->post('Hobby');
			$d['Penyakit'] = $this->input->post('Penyakit');
			// $d['AsalSek'] = $this->input->post('AsalSek');
			$d['NmAsalSek'] = $this->input->post('NmAsalSek');
			$d['NoIjazah'] = $this->input->post('NoIjazah');
			$d['IjTh'] = $this->input->post('IjTh');
			// $d['IjJmlMP'] = $this->input->post('IjJmlMP');
			// $d['IjJmlNilai'] = $this->input->post('IjJmlNilai');
			$d['NmAyah'] = $this->input->post('NmAyah');
			$d['KerjaAyah'] = $this->input->post('KerjaAyah');
			$d['HasilAyah'] = $this->input->post('HasilAyah');
			$d['PendAyah'] = $this->input->post('PendAyah');
			$d['NmIbu'] = $this->input->post('NmIbu');
			$d['KerjaIbu'] = $this->input->post('KerjaIbu');
			$d['HasilIbu'] = $this->input->post('HasilIbu');
			$d['PendIbu'] = $this->input->post('PendIbu');
			$d['NmWali'] = $this->input->post('NmWali');
			$d['AlamatWali'] = $this->input->post('AlamatWali');
			$d['HubWali'] = $this->input->post('HubWali');
			$d['ipaddress'] = $_SERVER['REMOTE_ADDR'];
			$d['online'] = 'Online';
			
			//$id['nik'] = $this->input->post('nik');
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			// print_r($data);exit();
			$row = $data->num_rows();
			if($row!==0){
				$this->app_model->updateData("mspcmb",$d,$id);
			//}else{
				// $this->app_model->insertData("mspcmb",$d);
				$status="sukses";
				$msg="Data Sukses disimpan";
			}else{
				$status="Info";
				$msg="Data sudah ada silahkan dilanjutkan!!";
			}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function foto_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Foto Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/foto_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_foto_doktor(){
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Edit Foto Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_foto_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_foto_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			// $nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/foto/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['foto'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '300';
					$config['height']	= '150';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ktp_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/ktp_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ktp_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload KTP/SIM/PASPORT Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_ktp_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ktp_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ktp/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['ktp'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ktp/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function ijazah_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/ijazah_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_ijazah_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Ijazah Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_ijazah_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_ijazah_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/ijazah_doktor/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['file_ijazah_doktor'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/ijazah_doktor/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function transkip_nilai_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Transkip Nilai Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/transkip_nilai_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_transkip_nilai_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Transkip Nilai Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_transkip_nilai_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_transkip_nilai_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/transkip_nilai_doktor/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['transkip_nilai_doktor'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/transkip_nilai_doktor/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function proposal_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Proposal Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/proposal_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_proposal_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Proposal Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_proposal_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_proposal_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/proposal_doktor/';
			// $config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['allowed_types'] = 'doc|pdf';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			// $config['file_name'] = $this->session->userdata('nik');
			$config['file_name'] = $this->session->userdata('nama');			
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['proposal_doktor'] = $ori;
					// $id['nik']= $this->session->userdata('nik');
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/proposal_doktor/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function surat_pernyataan_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Surat Pernyataan Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/surat_pernyataan_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_surat_pernyataan_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Surat Pernyataan Pendaftaran S3';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/edit_surat_pernyataan_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_surat_pernyataan_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
			$msg = "";
			$file_element_name = 'Foto';
			$nik = $_POST['nik'];
			if (empty($nik)){
			$status = "error";
			$msg = "Nomor Daftar Kosong";
		}
		
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/surat_pernyataan/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nama');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
					$ori = $aa['file_name'];
					$d['surat_pernyataan'] = $ori;
					$id['nama']= $this->session->userdata('nama');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/surat_pernyataan/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
				
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();
					
					$status = "success";
					$msg = "File Berhasil diupload";
					@unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function prodi_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			if(empty($no_ujian)){
				$d['judul'] = 'Pilih Program Studi Pendaftaran S3';
				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				$data = $this->app_model->getSelectedData("mspcmb",$id);

				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}

				/* content */	
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/doktor/prodi_doktor',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				redirect('/peserta/home/survey_doktor/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_prodi_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjianPasca($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['gelombang'] = "1";
				//$d['Jur3'] = $this->input->post('');
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Input Data tidak dapat diulangi, File Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/survey_doktor/');
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_prodi_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian= $this->app_model->CariNik($this->session->userdata('nik'));
			$r_ujian= $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// print_r($r_ujian);exit();
			// if(empty($no_ujian)){ //BACKUP
			if(!empty($no_ujian)){
				$d['judul'] = 'Pilih Kembali Program Studi Pendaftaran S3';

				$id['nik'] = $this->session->userdata('nik');
				$id['akademik'] = $this->session->userdata('akademik');
				// print_r($id['akademik']);exit();
				$data = $this->app_model->getSelectedData("mspcmb",$id);
				$row = $data->num_rows();
				if($row>0){
					foreach($data->result()as $t){
						$d['lokasi'] = $t->lokasi;
						$d['prodi'] = $t->prodi;
						$d['waktu'] = $t->waktu;
					}
				}

				/* content */
				$d['l_prodi'] = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' ORDER BY Fak");
				$d['content']= $this->load->view('peserta/doktor/edit_prodi_doktor',$d,true);
				$this->load->view('peserta/home',$d);
			}else{
				// print_r($no_ujian);exit();
				redirect('/peserta/home/edit_survey_doktor/');
			}	
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_edit_prodi_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$no_ujian = $this->app_model->CariNoUjian($this->session->userdata('nik'));
			$r_ujian = $this->app_model->CariRuangUjian($this->session->userdata('nik'));
			// if(empty($no_ujian) && empty($r_ujian)){
			if(!empty($no_ujian) && !empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				//$d['Jur3'] = $this->input->post('');
				$id['nik'] = $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else if(empty($no_ujian) && empty($r_ujian)){
				$thak = $this->config->item('thak');
				$noujian = $this->app_model->MaxNoUjian($thak);
				$ruangujian = $this->app_model->RuangUjian($thak);
				$d['NoUjian'] = $noujian;
				$d['RUjian'] = $ruangujian;
				$d['lokasi'] = $this->input->post('sel_lokasi');
				$d['prodi'] = $this->input->post('sel_prodi');
				$d['waktu'] = $this->input->post('sel_waktu');
				$d['prodi2'] = $this->input->post('sel_prodi2');
				$d['waktu2'] = $this->input->post('sel_waktu2');

				/*print_r($_POST);
				echo $d['prodi2'];
				exit();*/
				
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
				$status = "success";
				$msg = "Data Berhasil Disimpan";
				echo json_encode(array('status' => $status, 'msg' => $msg));
			}else{
				redirect('/peserta/home/edit_survey_doktor/');
			}
			/* tes data */
			/*
			$d['NoUjian'] = '';
				$d['RUjian'] = '';
				$id['nik']= $this->session->userdata('nik');
				$this->app_model->updateData("mspcmb",$d,$id);
			*/
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function survey_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran S3';
			
			$d['content']= $this->load->view('peserta/doktor/survey_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function edit_survey_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Survey PCMB Pendaftaran S3';
			
			$d['content']= $this->load->view('peserta/doktor/edit_survey_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_survey_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			
			$hasil = "";
			for($i=1;$i<=9;$i++){
				$data = $this->input->post('cek'.$i);
				if(isset($data)){
					$hasil .= $this->input->post('cek'.$i);
				}
			}
			
			$d['Survey'] = $hasil;
			$id['nik']= $this->session->userdata('nik');
			$this->app_model->updateData("mspcmb",$d,$id);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function selesai_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta S3';
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
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
					$d['lokasi'] = $t->lokasi;
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
				}
			}
			
			$d['content']= $this->load->view('peserta/doktor/formulir_isi_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function pembayaran_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Upload Bukti Pembayaran';

			/* content */	
			$d['content']= $this->load->view('peserta/doktor/pembayaran_doktor',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function simpan_pembayaran_doktor() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$status = "";
		   	$msg = "";
		   	$file_element_name = 'bukti_pembayaran';
			$nik = $_POST['nik'];
			$nm_bank_pengirim = $_POST['nm_bank_pengirim'];
			$nm_pengirim = $_POST['nm_pengirim'];
			$norek_pengirim = $_POST['norek_pengirim'];
			$tgl_bayar = date('Y-m-d');
			if (empty($nik)){
			  $status = "error";
			  $msg = "Nomor Daftar Kosong";
		   }elseif(empty($nm_bank_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Bank Pengirim Kosong";
		   }elseif(empty($nm_pengirim)){
		   	  $status = "error";
			  $msg = "Nama Pengirim Kosong";
		   }elseif(empty($norek_pengirim)){
		   	  $status = "error";
			  $msg = "Nomor Rekening Pengirim Kosong";
		   }
		   
		if ($status != "error"){   
			
			$config['upload_path'] = './peserta/pembayaran/';
			$config['allowed_types'] = 'jpg|jpeg|png|jp2';
			$config['max_size'] = '2000';
			$config['max_width'] = '2400';
			$config['max_height'] = '2400';	
			$config['overwrite'] = TRUE;	
			$config['file_name'] = $this->session->userdata('nik');		
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload($file_element_name)){
					$aa = $this->upload->data();
			 		$ori = $aa['file_name'];
					$d['slip_pembayaran'] = $ori;
					$id['nik']= $this->session->userdata('nik');
					$file_id = $this->app_model->updateData("mspcmb",$d,$id);
					 
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/pembayaran/'.$ori;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = '800';
					$config['height']	= '600';
	 			
					$this->load->library('image_lib', $config); 
					$this->image_lib->resize();

					$f['nik'] = $this->session->userdata('nik');
					$f['nm_bank_pengirim'] = $nm_bank_pengirim;
					$f['nm_pengirim'] = $nm_pengirim;
					$f['norek_pengirim'] = $norek_pengirim;
					$f['file'] = $ori;
					$f['tanggal_upload'] = $tgl_bayar;

					$this->app_model->insertData("tbl_bayar",$f);
					
					$status = "success";
					$msg = "File Berhasil diupload";
					 @unlink($_FILES[$file_element_name]);
			}else{
					$status = 'error';
					$msg = $this->upload->display_errors('', '');
			}
		}
			echo json_encode(array('status' => $status, 'msg' => $msg));
		
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

	public function status_pembayaran_doktor() {
				
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Status Pembayaran';
			$id['nik'] = $this->session->userdata('nik');
			$id['akademik'] = $this->session->userdata('akademik');
			// print_r($id['akademik']);exit();
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					// $d['KdPS'] = 'S1';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
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
					$d['lokasi'] = "";
					if($t->lokasi == 1){
						$d['lokasi'] = "Kampus A (Matraman)";
					}elseif($t->lokasi == 2){
						$d['lokasi'] = "Kampus B (Parung)";
					}else{
						$d['lokasi'] = "Kampus C (Kedoya)";
					}
					$d['prodi'] = $t->prodi;
					$d['waktu'] = $t->waktu;
					$d['status_bayar'] = $t->status_bayar;
					$d['status'] = "";
					if($d['status_bayar'] != ""){
						$d['status'] = "Approved";
					}else{
						$d['status'] = "Menunggu Validasi";
					}
					
					$d['content']= $this->load->view('peserta/doktor/status_pembayaran_doktor',$d,true);
					$this->load->view('peserta/home',$d);
					//redirect('/peserta/home/foto/');
				}
			}else{
				$d['l_prov'] = $this->app_model->manualQuery("SELECT * FROM provinsi");
				$d['l_sekolah'] = $this->app_model->manualQuery("SELECT * FROM tbasalsekolah");
				$d['l_pekerjaan'] = $this->app_model->manualQuery("SELECT * FROM tbkerjaortu");
				$d['l_penghasilan'] = $this->app_model->manualQuery("SELECT * FROM tbpenghasilanortu");
				$d['l_pendidikan'] = $this->app_model->manualQuery("SELECT * FROM tbpendidikanortu");
				/* content */	
				$d['content']= $this->load->view('peserta/formulir_doktor',$d,true);
				$this->load->view('peserta/home',$d);
			}
		}else{
			redirect('/peserta/home/logout/');
		}	
	}

// ----------------------------  FINISH FUNCTION INPUT DATA DOKTOR -------------------------- //



	public function list_jur() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$jur = $this->input->post('jur');
			$data = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' AND sing_baru<>'$jur' ORDER BY Fak");
			foreach($data->result()as $t){
				echo "<option value=$t->sing_baru>$t->Fak - $t->jur_baru</option>";
			}
			
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function list_jur2() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$jur1 = $this->input->post('jur1');
			$jur2 = $this->input->post('jur2');
			$data = $this->app_model->manualQuery("SELECT Fak,sing_baru,jur_baru FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' AND sing_baru<>'$jur1' AND sing_baru<>'$jur2' ORDER BY Fak");
			foreach($data->result()as $t){
				echo "<option value=$t->sing_baru>$t->Fak - $t->jur_baru</option>";
			}
			
		}else{
			redirect('/peserta/home/logout/');
		}
	}
	
	public function selesaiBACKUP() {		
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = 'Biodata Lengkap Peserta';
			$id['nik'] = $this->session->userdata('nik');
			$data = $this->app_model->getSelectedData("mspcmb",$id);
			$row = $data->num_rows();
			if($row>0){
				foreach($data->result()as $t){
					$d['nik'] = $t->nik;
					$d['ThAjaran'] = $t->ThAjaran;
					$d['Angkatan'] = $t->Angkatan;
					$d['KdPS'] = 'S2';
					$d['TglDaftar'] = $this->app_model->tgl_str($t->TglDaftar);
					$d['Nama'] = $t->Nama;
					$d['TmptLhr'] = $t->TmptLhr;
					$d['TglLhr'] = $this->app_model->tgl_str($t->TglLhr);
					$d['JK'] = $t->JK;
					$d['Alamat1'] = $t->Alamat1;
					$d['Alamat2'] = $t->Alamat2;
					$d['Telp'] = $t->Telp;
					$d['EMail'] = $t->EMail;
					$d['Prov'] = $this->app_model->Cari_Prov($t->Kota);
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
					$d['Jur1'] = $t->Jur1;
					$d['Jur2'] = $t->Jur2;
					$d['Jur3'] = $t->Jur3;
				}
			}
			
			$d['content']= $this->load->view('peserta/diploma/formulir_isi_diploma',$d,true);
			$this->load->view('peserta/home',$d);
		}else{
			redirect('/peserta/home/logout/');
		}	
	}
	
	public function cetak_sarjana() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$NoDaftar = $this->session->userdata('nik');
			$NoUjian = $this->app_model->CariNoUjian($NoDaftar);
			$d['nik'] = $this->session->userdata('nik');
			$d['NoUjian'] = $NoUjian;
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("mspcmb",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
			  $pdf=new reportProduct();
			  // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
			  // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
			  $pdf->setKriteria("transaksi");
			  // judul report
			  $pdf->setNama("DATA TRANSAKSI UNTUK BARANG ".$NoDaftar);
			  // buat halaman
			  $pdf->AliasNbPages();
			  // Potrait ukuran A4
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					$lokasi = "";
					if($t->lokasi == 1){
						$lokasi = "Kampus A (Menteng)";
					}elseif($t->lokasi == 2){
						$lokasi = "Kampus B (Parung)";
					}else{
						$lokasi = "Kampus C (Kedoya)";
					}
					//Instanciation of inherited class
					$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetTitle('KARTU UJIAN CALON MAHASISWA BARU'.$thA);
					$pdf->SetCreator('puskom.unu.ac.id with fpdf');
					$pdf->SetLineWidth(.3);
					$pdf->SetXY(6,6);
					$pdf->Cell(96,120,'',1,0,'C');
					$pdf->Cell(6,120,'',0,0,'C');
					$pdf->Cell(96,120,'',1,1,'C');
					$pdf->Image(base_url().'asset/images/logo_unusia2.png',8,8,15,15);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',9);
					$pdf->Cell(96,4,'KARTU UJIAN',0,1,'C');
					$pdf->Ln();
					$pdf->SetFont('Times','B',8);
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Universitas Nahdatul Ulama Indonesia (UNUSIA)',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Jl. Taman Amir Hamzah No. 5, Jakarta Pusat 10320',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Tahun Akademik '.$thA,0,1,'C');
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					
					$pdf->Cell(30,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(10,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(10,5,'Pilihan Prodi Ke-1',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi).' / '.$t->waktu,0,1,'L',false);
					// $pdf->Cell(61,5,$t->prodi,0,1,'L',false);
					
					$pdf->Cell(10,5,'Pilihan Prodi Ke-2',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi2.'-'.$this->app_model->cari_jurusan($t->prodi2).' / '.$t->waktu2,0,1,'L',false);
					

					$pdf->Cell(10,5,'Lokasi Ujian',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,"Kampus A (Menteng)",0,1,'L',false);
					/*
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$Jur3,0,1,'L',false);
					*/
					$pdf->Ln(10);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Peserta,',0,1,'C');
					$pdf->Ln(20);
					$pdf->SetFont('','B');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					/*
					$pdf->SetXY(12,77);
					$pdf->SetLineWidth(.1);
					$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					*/
					/*
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$t->foto;//'/path/to/image/mypic.jpg';
					//$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	= 320;
					$config['height']	= 150;
					$this->load->library('image_lib', $config); 
					$foto = $this->image_lib->resize();
					*/
					$pdf->SetXY(12,77);
					$foto=$t->foto;
					if(empty($foto)){
						$pdf->SetLineWidth(.1);
						$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					}else{
						$pdf->Image(base_url().'peserta/foto/'.$foto);
					}
					
					$pdf->SetXY(108,8);
					$pdf->SetFont('','B');
					$pdf->Cell(96,3,'JADWAL UJIAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFont('Arial','B',8);
					$pdf->SetX(108);
					$pdf->Cell(96,3,'TES TULIS',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFillColor(229,229,229);
					$pdf->SetFont('Helvetica','',7);
					$pdf->SetX(113);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(35,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(27,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					/*$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Agama (Tafsir, Hadits, ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LR',0,'C');
					$pdf->Cell(45,3,'Tauhid, Fiqh dan Sejarah ','LR',0,'L');
					$pdf->Cell(17,3,'','LR',0,'L');
					$pdf->Cell(19,3,'','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Kebudayaan Islam)','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');*/
					$pdf->SetX(114);
					$pdf->Cell(5,5,'1.','LR',0,'C');
					$pdf->Cell(35,5,'Tes Tulis ','LR',0,'L');
					$pdf->Cell(27,5,'12 September 2019','LR',0,'L');
					$pdf->Cell(19,5,'10.00 s/d 12.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,5,'','LBR',0,'C');
					$pdf->Cell(35,5,'','LBR',0,'L');
					$pdf->Cell(27,5,'','LBR',0,'L');
					$pdf->Cell(19,5,'','LBR',1,'C');
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'3.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Arab','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LBR',1,'C');*/
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'4.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Inggris','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LBR',1,'C');*/
					
					/*$pdf->Ln(10);
					$pdf->SetX(108);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(96,3,'TES LISAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetX(113);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetFillColor(229,229,229);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LBR',0,'C');
					$pdf->Cell(45,3,"Baca Tulis Al-Qur'an",'LBR',0,'L');
					$pdf->Cell(17,3,'01 Agst 2013','LBR',0,'L');
					$pdf->Cell(19,3,'09.00 s/d 11.00','LBR',1,'C');*/
					
					$pdf->Ln(12);
					
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ketua Panitia PMB 2019/2020',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ttd,',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','BU',7);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Fuadul Umam, M.Hum',0,1,'C');
					
					$pdf->Ln(55);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,140);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,120,'',1,1);
					//$pdf->Image('../../images/logo-unusia.jpg',8,142,20,20);
					$pdf->SetXY(6,142);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'TANDA BUKTI PENDAFTARAN',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Universitas Nahdatul Ulama Indonesia',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,164,200,164);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					$pdf->Cell(35,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'Tempat/Tgl Lahir',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->TmptLhr.", ".$this->app_model->tgl_indo($t->TglLhr),0,1,'L',false);
					
					$pdf->Cell(35,5,'Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->AsalSek,0,1,'L',false);
					
					$pdf->Cell(35,5,'Nama Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->NmAsalSek,0,1,'L',false);
					
					$pdf->Cell(15,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(15,5,'Pilihan Prodi Ke-1',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi).' / '.$t->waktu,0,1,'L',false);
					
					$pdf->Cell(15,5,'Pilihan Prodi Ke-2',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi2.'-'.$this->app_model->cari_jurusan($t->prodi2).' / '.$t->waktu2,0,1,'L',false);
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Peserta,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KARTU_UJIAN_'.$NoDaftar.'.pdf','D');
			}else{
			  redirect('/peserta/home/selesai_sarjana/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function cetak_diploma() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$NoDaftar = $this->session->userdata('nik');
			$NoUjian = $this->app_model->CariNoUjian($NoDaftar);
			$d['nik'] = $this->session->userdata('nik');
			$d['NoUjian'] = $NoUjian;
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("mspcmb",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
			  $pdf=new reportProduct();
			  // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
			  // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
			  $pdf->setKriteria("transaksi");
			  // judul report
			  $pdf->setNama("DATA TRANSAKSI UNTUK BARANG ".$NoDaftar);
			  // buat halaman
			  $pdf->AliasNbPages();
			  // Potrait ukuran A4
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					$lokasi = "";
					if($t->lokasi == 1){
						$lokasi = "Kampus A (Menteng)";
					}elseif($t->lokasi == 2){
						$lokasi = "Kampus B (Parung)";
					}else{
						$lokasi = "Kampus C (Kedoya)";
					}
					//Instanciation of inherited class
					$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetTitle('KARTU UJIAN CALON MAHASISWA BARU'.$thA);
					$pdf->SetCreator('puskom.unu.ac.id with fpdf');
					$pdf->SetLineWidth(.3);
					$pdf->SetXY(6,6);
					$pdf->Cell(96,120,'',1,0,'C');
					$pdf->Cell(6,120,'',0,0,'C');
					$pdf->Cell(96,120,'',1,1,'C');
					$pdf->Image(base_url().'asset/images/logo_unusia2.png',8,8,15,15);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',9);
					$pdf->Cell(96,4,'KARTU UJIAN',0,1,'C');
					$pdf->Ln();
					$pdf->SetFont('Times','B',8);
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Universitas Nahdatul Ulama Indonesia (UNUSIA)',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Jl. Taman Amir Hamzah No. 5, Jakarta Pusat 10320',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Tahun Akademik '.$thA,0,1,'C');
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					
					$pdf->Cell(30,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(10,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(10,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(10,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);

					$pdf->Cell(10,5,'Lokasi Ujian',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,"Kampus A (Menteng)",0,1,'L',false);
					/*
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$Jur3,0,1,'L',false);
					*/
					$pdf->Ln(10);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Peserta,',0,1,'C');
					$pdf->Ln(20);
					$pdf->SetFont('','B');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					/*
					$pdf->SetXY(12,77);
					$pdf->SetLineWidth(.1);
					$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					*/
					/*
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$t->foto;//'/path/to/image/mypic.jpg';
					//$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	= 320;
					$config['height']	= 150;
					$this->load->library('image_lib', $config); 
					$foto = $this->image_lib->resize();
					*/
					$pdf->SetXY(12,77);
					$foto=$t->foto;
					if(empty($foto)){
						$pdf->SetLineWidth(.1);
						$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					}else{
						$pdf->Image(base_url().'peserta/foto/'.$foto);
					}
					
					$pdf->SetXY(108,8);
					$pdf->SetFont('','B');
					$pdf->Cell(96,3,'JADWAL UJIAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFont('Arial','B',8);
					$pdf->SetX(108);
					$pdf->Cell(96,3,'TES TULIS',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFillColor(229,229,229);
					$pdf->SetFont('Helvetica','',7);
					$pdf->SetX(113);
					$pdf->Cell(84,3,'PROGRAM DIPLOMA 3 (D3)',0,1,'L');
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					/*$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Agama (Tafsir, Hadits, ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LR',0,'C');
					$pdf->Cell(45,3,'Tauhid, Fiqh dan Sejarah ','LR',0,'L');
					$pdf->Cell(17,3,'','LR',0,'L');
					$pdf->Cell(19,3,'','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Kebudayaan Islam)','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');*/
					$pdf->SetX(114);
					$pdf->Cell(5,5,'1.','LR',0,'C');
					$pdf->Cell(45,5,'Tes Tulis ','LR',0,'L');
					$pdf->Cell(17,5,'12 September 2019','LR',0,'L');
					$pdf->Cell(19,5,'10.00 s/d 12.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,5,'','LBR',0,'C');
					$pdf->Cell(45,5,'','LBR',0,'L');
					$pdf->Cell(17,5,'','LBR',0,'L');
					$pdf->Cell(19,5,'','LBR',1,'C');
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'3.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Arab','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LBR',1,'C');*/
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'4.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Inggris','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LBR',1,'C');*/
					
					/*$pdf->Ln(10);
					$pdf->SetX(108);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(96,3,'TES LISAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetX(113);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetFillColor(229,229,229);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LBR',0,'C');
					$pdf->Cell(45,3,"Baca Tulis Al-Qur'an",'LBR',0,'L');
					$pdf->Cell(17,3,'01 Agst 2013','LBR',0,'L');
					$pdf->Cell(19,3,'09.00 s/d 11.00','LBR',1,'C');*/
					
					$pdf->Ln(12);
					
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ketua Panitia PMB 2019/2020',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ttd,',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','BU',7);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Fuadul Umam, M.Hum',0,1,'C');
					
					$pdf->Ln(55);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,140);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,120,'',1,1);
					//$pdf->Image('../../images/logo-unusia.jpg',8,142,20,20);
					$pdf->SetXY(6,142);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'TANDA BUKTI PENDAFTARAN',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Universitas Nahdatul Ulama Indonesia',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,164,200,164);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					$pdf->Cell(35,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'Tempat/Tgl Lahir',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->TmptLhr.", ".$this->app_model->tgl_indo($t->TglLhr),0,1,'L',false);
					
					$pdf->Cell(35,5,'Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->AsalSek,0,1,'L',false);
					
					$pdf->Cell(35,5,'Nama Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->NmAsalSek,0,1,'L',false);
					
					$pdf->Cell(15,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(15,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(15,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Peserta,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KARTU_UJIAN_'.$NoDaftar.'.pdf','D');
			}else{
			  redirect('/peserta/home/selesai_diploma/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function cetak_magister() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$NoDaftar = $this->session->userdata('nik');
			$NoUjian = $this->app_model->CariNoUjian($NoDaftar);
			$d['nik'] = $this->session->userdata('nik');
			$d['NoUjian'] = $NoUjian;
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("mspcmb",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
			  $pdf=new reportProduct();
			  // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
			  // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
			  $pdf->setKriteria("transaksi");
			  // judul report
			  $pdf->setNama("DATA TRANSAKSI UNTUK BARANG ".$NoDaftar);
			  // buat halaman
			  $pdf->AliasNbPages();
			  // Potrait ukuran A4
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					$lokasi = "";
					if($t->lokasi == 1){
						$lokasi = "Kampus A (Menteng)";
					}elseif($t->lokasi == 2){
						$lokasi = "Kampus B (Parung)";
					}else{
						$lokasi = "Kampus C (Kedoya)";
					}
					//Instanciation of inherited class
					$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetTitle('KARTU UJIAN CALON MAHASISWA BARU'.$thA);
					$pdf->SetCreator('puskom.unu.ac.id with fpdf');
					$pdf->SetLineWidth(.3);
					$pdf->SetXY(6,6);
					$pdf->Cell(96,120,'',1,0,'C');
					$pdf->Cell(6,120,'',0,0,'C');
					$pdf->Cell(96,120,'',1,1,'C');
					$pdf->Image(base_url().'asset/images/logo_unusia2.png',8,8,15,15);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',9);
					$pdf->Cell(96,4,'KARTU UJIAN',0,1,'C');
					$pdf->Ln();
					$pdf->SetFont('Times','B',8);
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Universitas Nahdatul Ulama Indonesia (UNUSIA)',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Jl. Taman Amir Hamzah No. 5, Jakarta Pusat 10320',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Tahun Akademik '.$thA,0,1,'C');
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					
					$pdf->Cell(30,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(10,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(10,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(10,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);

					$pdf->Cell(10,5,'Lokasi Ujian',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,"Kampus A (Menteng)",0,1,'L',false);
					/*
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$Jur3,0,1,'L',false);
					*/
					$pdf->Ln(10);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Peserta,',0,1,'C');
					$pdf->Ln(20);
					$pdf->SetFont('','B');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					/*
					$pdf->SetXY(12,77);
					$pdf->SetLineWidth(.1);
					$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					*/
					/*
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$t->foto;//'/path/to/image/mypic.jpg';
					//$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	= 320;
					$config['height']	= 150;
					$this->load->library('image_lib', $config); 
					$foto = $this->image_lib->resize();
					*/
					$pdf->SetXY(12,77);
					$foto=$t->foto;
					if(empty($foto)){
						$pdf->SetLineWidth(.1);
						$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					}else{
						$pdf->Image(base_url().'peserta/foto/'.$foto);
					}
					
					$pdf->SetXY(108,8);
					$pdf->SetFont('','B');
					$pdf->Cell(96,3,'JADWAL UJIAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFont('Arial','B',8);
					$pdf->SetX(108);
					$pdf->Cell(96,3,'TES TULIS',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFillColor(229,229,229);
					$pdf->SetFont('Helvetica','',7);
					$pdf->SetX(113);
					$pdf->Cell(84,3,'PROGRAM STRATA 2 (S2)',0,1,'L');
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					/*$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Agama (Tafsir, Hadits, ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LR',0,'C');
					$pdf->Cell(45,3,'Tauhid, Fiqh dan Sejarah ','LR',0,'L');
					$pdf->Cell(17,3,'','LR',0,'L');
					$pdf->Cell(19,3,'','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Kebudayaan Islam)','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');*/
					$pdf->SetX(114);
					$pdf->Cell(5,5,'1.','LR',0,'C');
					$pdf->Cell(45,5,'Tes Tulis ','LR',0,'L');
					$pdf->Cell(17,5,'07 September 2019','LR',0,'L');
					$pdf->Cell(19,5,'09.00 s/d Selesai','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,5,'','LBR',0,'C');
					$pdf->Cell(45,5,'','LBR',0,'L');
					$pdf->Cell(17,5,'','LBR',0,'L');
					$pdf->Cell(19,5,'','LBR',1,'C');

					$pdf->SetX(114);
					$pdf->Cell(84,5,'** Jadwal Wawancara akan diinformasika pada saat Test Tulis',0,1,'L');
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'3.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Arab','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LBR',1,'C');*/
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'4.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Inggris','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LBR',1,'C');*/
					
					/*$pdf->Ln(10);
					$pdf->SetX(108);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(96,3,'TES LISAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetX(113);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetFillColor(229,229,229);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LBR',0,'C');
					$pdf->Cell(45,3,"Baca Tulis Al-Qur'an",'LBR',0,'L');
					$pdf->Cell(17,3,'01 Agst 2013','LBR',0,'L');
					$pdf->Cell(19,3,'09.00 s/d 11.00','LBR',1,'C');*/
					
					$pdf->Ln(12);
					
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ketua Panitia PMB 2019/2020',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ttd,',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','BU',7);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Fuadul Umam, M.Hum',0,1,'C');
					
					$pdf->Ln(50);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,140);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,120,'',1,1);
					//$pdf->Image('../../images/logo-unusia.jpg',8,142,20,20);
					$pdf->SetXY(6,142);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'TANDA BUKTI PENDAFTARAN',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Universitas Nahdatul Ulama Indonesia',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,164,200,164);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					$pdf->Cell(35,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'Tempat/Tgl Lahir',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->TmptLhr.", ".$this->app_model->tgl_indo($t->TglLhr),0,1,'L',false);
					
					$pdf->Cell(35,5,'Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->AsalSek,0,1,'L',false);
					
					$pdf->Cell(35,5,'Nama Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->NmAsalSek,0,1,'L',false);
					
					$pdf->Cell(15,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(15,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(15,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Peserta,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KARTU_UJIAN_'.$NoDaftar.'.pdf','D');
			}else{
			  redirect('/peserta/home/selesai_magister/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/peserta/home/logout/');
		}
	}

	public function cetak_doktor() {
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$NoDaftar = $this->session->userdata('nik');
			$NoUjian = $this->app_model->CariNoUjian($NoDaftar);
			$d['nik'] = $this->session->userdata('nik');
			$d['NoUjian'] = $NoUjian;
			// ambil data dengan memanggil fungsi di model
			$data = $this->app_model->getSelectedData("mspcmb",$d);
			$num_rows = $data->num_rows();
		
			if($num_rows > 0) {
			  // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
			  $pdf=new reportProduct();
			  // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
			  // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
			  $pdf->setKriteria("transaksi");
			  // judul report
			  $pdf->setNama("DATA TRANSAKSI UNTUK BARANG ".$NoDaftar);
			  // buat halaman
			  $pdf->AliasNbPages();
			  // Potrait ukuran A4
			  $pdf->AddPage("P","A4");
				foreach($data->result() as $t){
					$lokasi = "";
					if($t->lokasi == 1){
						$lokasi = "Kampus A (Menteng)";
					}elseif($t->lokasi == 2){
						$lokasi = "Kampus B (Parung)";
					}else{
						$lokasi = "Kampus C (Kedoya)";
					}
					//Instanciation of inherited class
					$thA = $t->ThAjaran;
					//$th = $thA.'/'.$thA+1;
					$A4[0]=210;
					$A4[1]=297;
					$Q[0]=216;
					$Q[1]=279;
					//$pdf=new PDF('P','mm',$A4);
					//$pdf->Open();
					//$pdf->AliasNbPages();
					//$pdf->AddPage();
					$pdf->SetTitle('KARTU UJIAN CALON MAHASISWA BARU'.$thA);
					$pdf->SetCreator('puskom.unu.ac.id with fpdf');
					$pdf->SetLineWidth(.3);
					$pdf->SetXY(6,6);
					$pdf->Cell(96,120,'',1,0,'C');
					$pdf->Cell(6,120,'',0,0,'C');
					$pdf->Cell(96,120,'',1,1,'C');
					$pdf->Image(base_url().'asset/images/logo_unusia2.png',8,8,15,15);
					$pdf->SetXY(6,8);
					$pdf->SetFont('Times','B',9);
					$pdf->Cell(96,4,'KARTU UJIAN',0,1,'C');
					$pdf->Ln();
					$pdf->SetFont('Times','B',8);
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Universitas Nahdatul Ulama Indonesia (UNUSIA)',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Jl. Taman Amir Hamzah No. 5, Jakarta Pusat 10320',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(96,3,'Tahun Akademik '.$thA,0,1,'C');
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					
					$pdf->Cell(30,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',8);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',8);
					$pdf->Cell(30,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(10,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(10,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(10,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);

					$pdf->Cell(10,5,'Lokasi Ujian',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,"Kampus A (Menteng)",0,1,'L',false);
					/*
					$pdf->Cell(10,5,'',0,0,'L',false);
					$pdf->Cell(20,5,'PIL.3',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$Jur3,0,1,'L',false);
					*/
					$pdf->Ln(10);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(56,3,'Peserta,',0,1,'C');
					$pdf->Ln(20);
					$pdf->SetFont('','B');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(40,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
					/*
					$pdf->SetXY(12,77);
					$pdf->SetLineWidth(.1);
					$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					*/
					/*
					$config['image_library'] = 'gd2';
					$config['source_image']	= './peserta/foto/'.$t->foto;//'/path/to/image/mypic.jpg';
					//$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	= 320;
					$config['height']	= 150;
					$this->load->library('image_lib', $config); 
					$foto = $this->image_lib->resize();
					*/
					$pdf->SetXY(12,77);
					$foto=$t->foto;
					if(empty($foto)){
						$pdf->SetLineWidth(.1);
						$pdf->Cell(35,43,'Pas Foto 4 x 6',1,1,'C');
					}else{
						$pdf->Image(base_url().'peserta/foto/'.$foto);
					}
					
					$pdf->SetXY(108,8);
					$pdf->SetFont('','B');
					$pdf->Cell(96,3,'JADWAL UJIAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFont('Arial','B',8);
					$pdf->SetX(108);
					$pdf->Cell(96,3,'TES TULIS',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetFillColor(229,229,229);
					$pdf->SetFont('Helvetica','',7);
					$pdf->SetX(113);
					$pdf->Cell(84,3,'PROGRAM STRATA 3 (S3)',0,1,'L');
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					/*$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LR',0,'C');
					$pdf->Cell(45,3,'Pengetahuan Agama (Tafsir, Hadits, ','LR',0,'L');
					$pdf->Cell(17,3,'30 Juli 2013','LR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LR',0,'C');
					$pdf->Cell(45,3,'Tauhid, Fiqh dan Sejarah ','LR',0,'L');
					$pdf->Cell(17,3,'','LR',0,'L');
					$pdf->Cell(19,3,'','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,3,'','LBR',0,'C');
					$pdf->Cell(45,3,'Kebudayaan Islam)','LBR',0,'L');
					$pdf->Cell(17,3,'','LBR',0,'L');
					$pdf->Cell(19,3,'','LBR',1,'C');*/
					$pdf->SetX(114);
					$pdf->Cell(5,5,'1.','LR',0,'C');
					$pdf->Cell(45,5,'Tes Tulis ','LR',0,'L');
					$pdf->Cell(17,5,'07 September 2019','LR',0,'L');
					$pdf->Cell(19,5,'09.00 s/d 10.30','LR',1,'C');
					$pdf->SetX(114);
					$pdf->Cell(5,5,'','LBR',0,'C');
					$pdf->Cell(45,5,'','LBR',0,'L');
					$pdf->Cell(17,5,'','LBR',0,'L');
					$pdf->Cell(19,5,'','LBR',1,'C');

					$pdf->SetX(114);
					$pdf->Cell(84,5,'** Jadwal Wawancara akan diinformasika pada saat Test Tulis',0,1,'L');
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'3.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Arab','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'08.00 s/d 10.00','LBR',1,'C');*/
					
					/*$pdf->SetX(114);
					$pdf->Cell(5,3,'4.','LBR',0,'C');
					$pdf->Cell(45,3,'Bahasa Inggris','LBR',0,'L');
					$pdf->Cell(17,3,'31 Juli 2013','LBR',0,'L');
					$pdf->Cell(19,3,'10.30 s/d 12.30','LBR',1,'C');*/
					
					/*$pdf->Ln(10);
					$pdf->SetX(108);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(96,3,'TES LISAN',0,1,'C');
					$pdf->Ln(4);
					$pdf->SetX(113);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(84,3,'PROGRAM STRATA 1 (S1)',0,1,'L');
					$pdf->SetFillColor(229,229,229);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','B',7);
					$pdf->Cell(5,5,'No',1,0,'C',true);
					$pdf->Cell(45,5,'Mata Ujian',1,0,'C',true);
					$pdf->Cell(17,5,'Tanggal',1,0,'C',true);
					$pdf->Cell(19,5,'Waktu',1,1,'C',true);
					
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','',7);
					$pdf->Cell(5,3,'1.','LBR',0,'C');
					$pdf->Cell(45,3,"Baca Tulis Al-Qur'an",'LBR',0,'L');
					$pdf->Cell(17,3,'01 Agst 2013','LBR',0,'L');
					$pdf->Cell(19,3,'09.00 s/d 11.00','LBR',1,'C');*/
					
					$pdf->Ln(12);
					
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ketua Panitia PMB 2019/2020',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Ttd,',0,1,'C');
					$pdf->Ln(8);
					$pdf->SetX(114);
					$pdf->SetFont('Helvetica','BU',7);
					$pdf->Cell(40,3,'',0,0);
					$pdf->Cell(44,3,'Fuadul Umam, M.Hum',0,1,'C');
					
					$pdf->Ln(50);
					$pdf->SetX(0);
					$pdf->SetFont('Times','I',7);
					$pdf->MultiCell(210,4,'--------------------------------------------------------------------------------------------------------------------- potong di sini ---------------------------------------------------------------------------------------------------------------------');
					
					$pdf->SetXY(6,140);
					$pdf->SetLineWidth(.3);
					$pdf->Cell(198,120,'',1,1);
					//$pdf->Image('../../images/logo-unusia.jpg',8,142,20,20);
					$pdf->SetXY(6,142);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(198,5,'TANDA BUKTI PENDAFTARAN',0,1,'C');
					$pdf->Ln(2);
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Penerimaan Mahasiswa Baru',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Universitas Nahdatul Ulama Indonesia',0,1,'C');
					$pdf->SetX(6);
					$pdf->Cell(198,4,'Tahun Akademik '.$thA,0,1,'C');
					$pdf->SetLineWidth(.2);
					$pdf->Line(8,164,200,164);
					
					$pdf->Ln(10);
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Ruang Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->RUjian,0,1,'L',false);
					$pdf->Cell(35,5,'Nomor Ujian',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(61,5,$t->NoUjian,0,1,'L',false);
					
					$pdf->SetFont('Times','',10);
					$pdf->Cell(35,5,'Nama',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->Nama,0,1,'L',false);
					
					$pdf->Cell(35,5,'Tempat/Tgl Lahir',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->TmptLhr.", ".$this->app_model->tgl_indo($t->TglLhr),0,1,'L',false);
					
					$pdf->Cell(35,5,'Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->AsalSek,0,1,'L',false);
					
					$pdf->Cell(35,5,'Nama Asal Sekolah',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->NmAsalSek,0,1,'L',false);
					
					$pdf->Cell(15,5,'Lokasi Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$lokasi,0,1,'L',false);
					
					$pdf->Cell(15,5,'Program Studi',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->prodi.'-'.$this->app_model->cari_jurusan($t->prodi),0,1,'L',false);
					
					$pdf->Cell(15,5,'Waktu Perkuliahan',0,0,'L',false);
					$pdf->Cell(20,5,'',0,0,'L',false);
					$pdf->Cell(5,5,':',0,0,'C',false);
					$pdf->Cell(61,5,$t->waktu,0,1,'L',false);
					
					$pdf->Ln(10);
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Jakarta, '.$this->app_model->tgl_indo($t->TglDaftar),0,1,'C');
					$pdf->Cell(140,4,'',0,0);
					$pdf->Cell(56,4,'Peserta,',0,1,'C');
					$pdf->Ln(15);
					$pdf->SetFont('','B');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,$t->Nama,0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->Cell(56,2,'-------------------------------------',0,1,'C');
					$pdf->Cell(140,2,'',0,0);
					$pdf->SetFont('','I');
					$pdf->Cell(56,2,'Nama Jelas & Tanda Tangan',0,1,'C');
				}
			  //$a->Output();
			  //$a->Image($file_foto,160,173,$new_w,$new_h);
	  			$pdf->Output('KARTU_UJIAN_'.$NoDaftar.'.pdf','D');
			}else{
			  redirect('/peserta/home/selesai_doktor/');
			  //echo "data ewehan";
			}
			exit();
		}else{
			redirect('/peserta/home/logout/');
		}
	}
	
	public function logout() {
		$id['nik'] = $this->session->userdata('nik');
		$d['online'] = 'Offline';
		$this->app_model->updateData("mspcmb",$d,$id);
		$this->session->sess_destroy();
		redirect('/home/');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */