<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('captcha','date','text_helper'));
		session_start();
	}
	
	public function index() {		
		/*
		$id = $this->session->userdata('nim');
		if(!empty($id)){
			$id['NoDaftar'] = $this->session->userdata('nim');
			$d['online'] = 'Offline';
			$this->app_model->updateData("mspcmb",$d,$id);
			$this->session->sess_destroy();
		}
		*/
		$d['judul'] = 'Home';
		/* content */	
		$d['content']= $this->load->view('alur',$d,true);
		
		$this->load->view('home',$d);	
	}
	
	public function panduan() {		
		$d['judul'] = 'panduan';
		/* content */	
		$d['content']= $this->load->view('panduan',$d,true);
		
		$this->load->view('home',$d);	
	}
	
	public function visimisi() {		
		$d['judul'] = 'Visi dan Misi';
		/* content */	
		$d['content']= $this->load->view('content',$d,true);
		
		$this->load->view('home',$d);	
	}

	public function panitia() {		
		$d['judul'] = 'panduan';
		/* content */	
		$d['content']= $this->load->view('panitia',$d,true);
		
		$this->load->view('home',$d);	
	}

	public function prodi() {		
		$d['judul'] = 'panduan';
		// $d['l_fak'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' GROUP BY Fak");
		$d['l_fak'] = $this->app_model->manualQuery("SELECT * FROM tbjurusan WHERE tampil='Ya' AND fak_btn<>'PASCA' GROUP BY akademik");
		/* content */	
		$d['content']= $this->load->view('prodi',$d,true);
		
		$this->load->view('home',$d);	
	}
	
	public function simpan_survey() {		
		$this->db->empty_table('survey'); 
		$data = $this->app_model->manualQuery("SELECT Survey FROM mspcmb");
		foreach($data->result() as $t){
			$exp = explode(",",$t->Survey);
			$jml_array = count($exp)-1;
			for($i=0;$i<$jml_array;$i++){
				$dt = $exp[$i];
				
					$cari = $this->app_model->manualQuery("SELECT * FROM survey WHERE survey='$dt'");
					if($cari->num_rows>0){
						$this->app_model->manualQuery("UPDATE survey SET jml=jml+1 WHERE survey='$dt'");
					}else{
						//if(!empty($dt)){
						$this->app_model->manualQuery("INSERT INTO survey (survey,jml) VALUES ('$dt',1)");
						//}
					}
			}
		}
	}
	
	public function grafik_survey() {		
		$d['judul'] = 'Garfik Survey';
		$d['survey'] = $this->app_model->manualQuery("SELECT * FROM survey");
		$d['jml_survey'] = $this->app_model->manualQuery("SELECT Survey FROM mspcmb");
		/* content */	
		//$this->simpan_survey();
		$d['content']= $this->load->view('grafik_survey',$d,true);
		
		$this->load->view('home',$d);	
	}
	
	public function pengumuman() {		
		$d['judul'] = 'Pengumuman';
		/* content */	
		$d['content']= $this->load->view('pengumuman',$d,true);
		
		$this->load->view('home',$d);	
	}

	public function login(){
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('nik', 'NIK', 'user_check','Tess');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('user_check', 'Maaf, Tidak Boleh Ada Kosong');
		$this->form_validation->set_message('required', 'Maaf, NIK & Password Tidak Boleh Kosong');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$u = $this ->security->xss_clean($this->input->post('nik'));
			$p = $this ->security->xss_clean($this->input->post('password'));
			// $r = $this ->security->xss_clean($this->input->post('akademik'));
			// $u = $this ->security->xss_clean($this->input->post('noform'));
			// $p = $this ->security->xss_clean($this->input->post('kodeakses'));
			$this->app_model->getLoginPeserta($u,$p);
			// $this->app_model->getLoginPeserta($u,$p,$r);
		}				
	}

	public function register_user(){		
		$d['judul'] = 'Register User';
		$d['content']= $this->load->view('register_user',$d,true);
		
		$this->load->view('home',$d);	
	}

	public function add() {    
		$this->_set_rules();
		if ($this->form_validation->run() == true) {
			$cek = $this->db->query("SELECT * FROM tb_pengguna where nik='".$this->input->post('nik')."'")->num_rows();
			if ($cek<=0){
				$data = array(
					'id_pengguna' => $this->m_pengguna->kdotomatis(),
					'nik' => $this->input->post('nik'),
					'nama_pengguna' => $this->input->post('pengguna'),
					'id_jabatan' => $this->input->post('jabatan'),
					'id_cabang' => $this->input->post('cabang'),
					'id_dept' => $this->input->post('subdept'),
					'ruang_kantor' => $this->input->post('kantor')                
				);
				$this->m_pengguna->simpan($data);
			}
			redirect('pengguna');
		}else {  
			$data['jabatan'] = $this->m_pengguna->getjabatan()->result(); 
			$data['cabang'] = $this->m_pengguna->getcabang()->result();
			$data['departemen'] = $this->m_pengguna->getdepartemengid()->result();             
			$this->template->display('pengguna/tambah', $data);
		}
	}

	public function insert_daftar_login(){

		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
		$this->form_validation->set_rules('nik', 'nik', 'required');

		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$pnik = $this->input->post('nik');
		$nik = trim($pnik);
		$password = $this->input->post('password');
		$akademik = $this->input->post('akademik');
		$petugas = $this->input->post('petugas');
		$tahun = $this->input->post('tahun');
		$biaya = $this->input->post('biaya');
		$jalur = $this->input->post('jalur');

	   	$data_daftar_login =array(			
			'nama'		=> $nama,
			'no_hp'	 	=> $no_hp,
			'nik'		=> $nik,
			'password'	=> $password,
			'akademik'	=> $akademik,
			'petugas'	=> $petugas,
			'tahun'		=> $tahun,
			'biaya'		=> $biaya,
			'jalur'		=> $jalur,				
		);

		// $this->_set_rules();
		if($this->form_validation->run() == TRUE){
			$cek = $this->db->query("SELECT * FROM beli_formulir WHERE nik='".$nik."'")->num_rows();
			if ($cek<=0) {
				$this->app_model->InsertDaftarLogin($data_daftar_login,'beli_formulir'); 
				$this->session->set_flashdata('form_true',
					'<div class="alert-success">
						<br>
						<h4>&nbsp;&nbsp;&nbsp;Data Berhasil Disimpan.</h4>
						<p>&nbsp;&nbsp;&nbsp;Sekarang anda bisa login untuk melakukan pendaftaran!!!</p>
						<br>
					</div>');
			} else{
				$this->session->set_flashdata('form_true',
					'<div class="alert-danger">
						<br>
						<h4>&nbsp;&nbsp;&nbsp;Anda sudah pernah mendaftar.</h4>
						<p>&nbsp;&nbsp;&nbsp;Silahkan masukan data baru atau login untuk melakukan pengisian formulir!!!</p>
						<br>
					</div>');
				redirect ($this->agent->referrer());
			}
		}else{
			$this->session->set_flashdata('form_false',
			'<div class="alert-danger">
				<h4>Gagal.</h4>
				<p>Harap Periksa Form Anda.</p>
			</div>');
			redirect ($this->agent->referrer());
		}
		
		redirect ($this->agent->referrer());
	}

	// Backup Code Rizki
	// public function insert_daftar_login(){

	// 	$this->form_validation->set_rules('nama', 'nama', 'required');
	// 	$this->form_validation->set_rules('no_hp', 'no_hp', 'required');
	// 	$this->form_validation->set_rules('username', 'username', 'required');

	// 	$nama = $this->input->post('nama');
	// 	$no_hp = $this->input->post('no_hp');
	// 	$nisn = $this->input->post('username');
	// 	$pin = $this->input->post('password');
	// 	$petugas = $this->input->post('petugas');
	// 	$tahun = $this->input->post('tahun');
	// 	$biaya = $this->input->post('biaya');

	//    	$data_daftar_login =array(			
	// 		'nama'		=> $nama,
	// 		'no_hp'	 	=> $no_hp,
	// 		'username'	=> $username,
	// 		'password'	=> $password,
	// 		'petugas'	=> $petugas,
	// 		'tahun'		=> $tahun,
	// 		'biaya'		=> $biaya,				
	// 	);

	// 	if($this->form_validation->run() == TRUE){
	// 		$this->app_model->InsertDaftarLogin($data_daftar_login,'beli_formulir');
	// 		$this->session->set_flashdata('form_true',
	// 			'<div class="alert-success">
	// 				<br>
	// 				<h4>&nbsp;&nbsp;&nbsp;Data Berhasil Disimpan.</h4>
	// 				<p>&nbsp;&nbsp;&nbsp;Sekarang anda bisa login untuk melakukan pendaftaran!!!</p>
	// 				<br>
	// 			</div>');
	// 	}else{
	// 		$this->session->set_flashdata('form_false',
	// 		'<div class="alert-danger">
	// 			<h4>Gagal.</h4>
	// 			<p>Harap Periksa Form Anda.</p>
	// 		</div>');
	// 		redirect ($this->agent->referrer());
	// 	}
	// 	redirect ($this->agent->referrer());
	// }
	
}
