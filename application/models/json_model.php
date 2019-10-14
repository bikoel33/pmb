<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json_Model extends CI_Model {
	/**
	 * @author : 
	 * @keterangan : Model untuk menangani semua query database aplikasi
	 **/
	public function getJson_pengguna()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'username'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE username LIKE '%$cari%' OR nama_lengkap LIKE '%$cari%'"; 
		$text = "SELECT * FROM users
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM users $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'username'=>$data['username'],
				'passwrod'=>$data['password'],
				'nama_lengkap'=>$data['nama_lengkap']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	public function getJson_provinsi()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'provinsi'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE provinsi LIKE '%$cari%'"; 
		$text = "SELECT * FROM provinsi
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM provinsi $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id_provinsi'=>$data['id_provinsi'],
				'provinsi'=>$data['provinsi']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_prodi()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdJur'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Jur LIKE '%$cari%' AND sing LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbjurusan
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbjurusan $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdJur'=>$data['KdJur'],
				'sing'=>$data['sing'],
				'Jur'=>$data['Jur'],
				'Fak'=>$data['Fak']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_kota()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_provinsi'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE kab_kota LIKE '%$cari%' AND id_provinsi LIKE '%$cari%'"; 
		$text = "SELECT * FROM kab_kota
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM kab_kota $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id_kab_kota'=>$data['id_kab_kota'],
				'id_provinsi'=>$data['id_provinsi'],
				'kab_kota'=>$data['kab_kota']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_Pekerjaan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdKerjaOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE KerjaOrtu LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbkerjaortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbkerjaortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdKerjaOrtu'=>$data['KdKerjaOrtu'],
				'KerjaOrtu'=>$data['KerjaOrtu']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_Penghasilan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdHasilOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Penghasilan LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbpenghasilanortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbpenghasilanortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdHasilOrtu'=>$data['KdHasilOrtu'],
				'Penghasilan'=>$data['Penghasilan']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_jenjangAkademik()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'akademik'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE akademik LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbakademik
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbakademik $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'id'		=> $data['id'],
				'akademik'	=> $data['akademik'],
				'deskripsi'	=> $data['deskripsi'],
				'gelar' 	=> $data['gelar']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_Pendidikan()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'KdPendOrtu'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		$where = " WHERE Pendidikan LIKE '%$cari%'"; 
		$text = "SELECT * FROM tbpendidikanortu
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tbpendidikanortu $where ")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'KdPendOrtu'=>$data['KdPendOrtu'],
				'Pendidikan'=>$data['Pendidikan']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_KODEBAYAR()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		
		$offset = ($page-1) * $rows;
		
		$where = " WHERE kode_bayar LIKE '%$cari%' OR nama_bayar LIKE '%$cari%'"; //
		
		$text = "SELECT * FROM kode_bayar
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM kode_bayar")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'kode_bayar'=>$data['kode_bayar'],
				'nama_bayar'=>$data['nama_bayar']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_data_beli() {
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tgl_daftar'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		
		$offset = ($page-1) * $rows;
		
		$tahun = date('Y');
		
		$where = "WHERE tahun='$tahun'";
		if(!empty($cari)){
			$where .= "  AND nik LIKE '%$cari%' OR nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where .= " AND tgl_daftar ='$tgl'"; //
		}
		
		$text = "SELECT * FROM beli_formulir
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM beli_formulir $where")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$tgl = $this->app_model->tgl_sql($data['tgl_daftar']);
			$row[] = array(
				// 'tgl_daftar'=>$tgl_daftar,
				'tgl_daftar' => $data['tgl_daftar'],
				'akademik' => $data['akademik'],
				'formasi' => $data['jalur'],
				'nik'=>$data['nik'],
				'nama'=>$data['nama'],
				'no_hp'=>$data['no_hp'],
				'password'=>$data['password'],
				'tahun'=>$data['tahun']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}
	
	public function getJson_data_PMB()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " WHERE nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " WHERE TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " WHERE Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " WHERE RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT * FROM mspcmb
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah'	=>$data['file_ijazah'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'online'		=>$data['online'],
				'prodi'			=>$data['prodi'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_data_PMB_Lulus()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';

		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " AND nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " AND TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " AND Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " AND RUjian ='$cari_ruang'"; //		
		}else{
			$where = ""; //
		}
		
		$text = "SELECT * FROM mspcmb
			where status_bayar = 'LUNAS' $where   
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb where status_bayar = 'LUNAS' $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah'	=>$data['file_ijazah'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'online'		=>$data['online'],
				'prodi'			=>$data['prodi'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_data_PMB_diploma()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		// $cari_akademik = isset($_POST['cari_akademik']) ? $_POST['cari_akademik'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " WHERE nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " WHERE TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " WHERE Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " WHERE RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT * FROM mspcmb
			-- $where 
			WHERE akademik='D3'
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'prodi'			=>$data['prodi'],
				'waktu'			=>$data['waktu'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah'	=>$data['file_ijazah'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'online'		=>$data['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_data_PMB_sarjana()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		// $cari_akademik = isset($_POST['cari_akademik']) ? $_POST['cari_akademik'] : '';
		
		$offset = ($page-1) * $rows;
		$where = "where akademik = 'S1'";
		if(!empty($cari)){
			$where .= " AND nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where .= " AND TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where .= " AND prodi ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where .= " AND RUjian ='$cari_ruang'"; //		
		}
		
		$text = "SELECT * FROM mspcmb
			$where
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'prodi'			=>$data['prodi'],
				'waktu'			=>$data['waktu'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah'	=>$data['file_ijazah'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'online'		=>$data['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_data_PMB_magister()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		// $cari_akademik = isset($_POST['cari_akademik']) ? $_POST['cari_akademik'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " WHERE nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " WHERE TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " WHERE Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " WHERE RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT * FROM mspcmb
			WHERE akademik='S2'
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'prodi'			=>$data['prodi'],
				'waktu'			=>$data['waktu'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah_magister'	=>$data['file_ijazah_magister'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'telp'		    =>$data['Telp'],
				'online'		=>$data['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=$row;

		$text2 = "SELECT * FROM mspcmb_gel_1
			WHERE akademik='S2'
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result2 = array();
		$result2['total'] = $this->db->query("SELECT * FROM mspcmb_gel_1 $where")->num_rows();
		$row2 = array();	
		$criteria2 = $this->db->query($text2);
		foreach($criteria2->result_array() as $data2)
		{	
			$row2[] = array(
				'nik'			=>$data2['nik'],
				'NoUjian'		=>$data2['NoUjian'],
				'ThAjaran'		=>$data2['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data2['TglDaftar']),
				'Nama'			=>$data2['Nama'],
				'JK'			=>$data2['JK'],
				'lokasi'		=>$data2['lokasi'],
				'prodi'			=>$data2['prodi'],
				'waktu'			=>$data2['waktu'],
				'RUjian'		=>$data2['RUjian'],
				'foto'			=>$data2['foto'],
				'file_ijazah_magister'	=>$data2['file_ijazah_magister'],
				'ktp'			=>$data2['ktp'],
				'kk'			=>$data2['kk'],
				'skhun'			=>$data2['skhun'],
				'nilai_rapot'	=>$data2['nilai_rapot'],
				'kelulusan'		=>$data2['kelulusan'],
				'akademik'		=>$data2['akademik'],
				'telp'		=>$data2['Telp'],
				'online'		=>$data2['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result2=$row2;
		//print_r($result2);exit();

		$gabung = array();
		$gabung = array_merge($result2, $result);
		/*print_r($gabung);
		exit();*/
		/*$hasil = array();
		$hasil=array_merge($hasil,array('rows'=>$gabung));*/

		return json_encode($gabung);
		// print_r($hasil);
		// exit();
	}

	public function getJson_data_PMB_doktor()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		// $cari_akademik = isset($_POST['cari_akademik']) ? $_POST['cari_akademik'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " WHERE nik LIKE '%$cari%' OR Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " WHERE TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " WHERE Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " WHERE RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT * FROM mspcmb
			-- $where 
			WHERE akademik='S3'
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM mspcmb $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'ThAjaran'		=>$data['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'JK'			=>$data['JK'],
				'lokasi'		=>$data['lokasi'],
				'prodi'			=>$data['prodi'],
				'waktu'			=>$data['waktu'],
				'RUjian'		=>$data['RUjian'],
				'foto'			=>$data['foto'],
				'file_ijazah'	=>$data['file_ijazah'],
				'ktp'			=>$data['ktp'],
				'kk'			=>$data['kk'],
				'skhun'			=>$data['skhun'],
				'nilai_rapot'	=>$data['nilai_rapot'],
				'kelulusan'		=>$data['kelulusan'],
				'akademik'		=>$data['akademik'],
				'telp'		=>$data['Telp'],
				'online'		=>$data['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result=$row;

		$text2 = "SELECT * FROM mspcmb_gel_1
			-- $where 
			WHERE akademik='S3'
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result2 = array();
		$result2['total'] = $this->db->query("SELECT * FROM mspcmb_gel_1 $where")->num_rows();
		$row2 = array();	
		$criteria2 = $this->db->query($text2);
		foreach($criteria2->result_array() as $data2)
		{	
			$row2[] = array(
				'nik'			=>$data2['nik'],
				'NoUjian'		=>$data2['NoUjian'],
				'ThAjaran'		=>$data2['ThAjaran'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data2['TglDaftar']),
				'Nama'			=>$data2['Nama'],
				'JK'			=>$data2['JK'],
				'lokasi'		=>$data2['lokasi'],
				'prodi'			=>$data2['prodi'],
				'waktu'			=>$data2['waktu'],
				'RUjian'		=>$data2['RUjian'],
				'foto'			=>$data2['foto'],
				'file_ijazah'	=>$data2['file_ijazah'],
				'ktp'			=>$data2['ktp'],
				'kk'			=>$data2['kk'],
				'skhun'			=>$data2['skhun'],
				'nilai_rapot'	=>$data2['nilai_rapot'],
				'kelulusan'		=>$data2['kelulusan'],
				'akademik'		=>$data2['akademik'],
				'telp'			=>$data2['Telp'],
				'online'		=>$data2['online'],
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
		}
		$result2=$row2;

		$gabung = array();
		$gabung = array_merge($result2, $result);
		return json_encode($gabung);
	}
	
	public function getJson_singkron()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'tanggal_bayar'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? $_POST['cari'] : '';
		
		$offset = ($page-1) * $rows;
		//$where = " WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'"; 
		//$cari = '24-05-2013';
		$tgl = $this->app_model->tgl_sql($cari);
		$where = " WHERE tanggal_bayar ='$tgl'"; //
		
		$text = "SELECT * FROM tagihan_mhs_btn
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		
		$result = array();
		$result['total'] = $this->db->query("SELECT * FROM tagihan_mhs_btn $where")->num_rows();
		$row = array();	
		
		$criteria = $this->db->query($text);
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nim'=>$data['nim'],
				'nama'=>$data['nama'],
				'angkatan'=>$data['angkatan'],
				'kode_bayar'=>$data['kode_bayar'],
				'pin'=>$data['pin'],
				'tahun'=>$data['tahun'],
				'jml_tarif'=>number_format($data['jml_tarif']),
				'flag_status'=>$data['flag_status'],
				'flag_status_H2H'=>$data['flag_status_H2H'],
				'tanggal_bayar'=>$this->app_model->tgl_indo($data['tanggal_bayar'])
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_bayar()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " AND a.nik LIKE '%$cari%' OR a.Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " AND a.TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " AND a.Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " AND RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!=''
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!='' $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			if($data['lokasi'] == 1){
						$lokasi = "Kampus Matraman";
					}elseif($data['lokasi'] == 2){
						$lokasi = "Kampus Parung";
					}else{
						$lokasi = "Kampus Kedoya";
					}

			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'Jur1'			=>$data['prodi'],
				'lokasi' 		=> $lokasi,
				'akademik'		=>$data['akademik'],
				'pembayaran'	=>$data['slip_pembayaran'],
				'nm_bank_pengirim'=>$data['nm_bank_pengirim'],
				'nm_pengirim'=>$data['nm_pengirim'],
				'norek_pengirim'=>$data['norek_pengirim'],
				'status_bayar'=>$data['status_bayar']
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
			//var_dump($data);exit();
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_bayar_gel_1()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " AND a.nik LIKE '%$cari%' OR a.Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " AND TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " AND Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " AND RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb_gel_1 a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!=''
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb_gel_1 a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!='' $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			if($data['lokasi'] == 1){
						$lokasi = "Kampus Matraman";
					}elseif($data['lokasi'] == 2){
						$lokasi = "Kampus Parung";
					}else{
						$lokasi = "Kampus Kedoya";
					}

			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'Jur1'			=>$data['prodi'],
				'lokasi' 		=> $lokasi,
				'akademik'		=>$data['akademik'],
				'pembayaran'	=>$data['slip_pembayaran'],
				'nm_bank_pengirim'=>$data['nm_bank_pengirim'],
				'nm_pengirim'=>$data['nm_pengirim'],
				'norek_pengirim'=>$data['norek_pengirim'],
				'status_bayar'=>$data['status_bayar']
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
			//var_dump($data);exit();
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

	public function getJson_bayar_gel_2()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'NoUjian'; //ieu ku field
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$cari = isset($_POST['cari']) ? mysql_real_escape_string($_POST['cari']) : '';
		$cari_tgl = isset($_POST['cari_tgl']) ? $_POST['cari_tgl'] : '';
		$cari_prodi = isset($_POST['cari_prodi']) ? $_POST['cari_prodi'] : '';
		$cari_ruang = isset($_POST['cari_ruang']) ? $_POST['cari_ruang'] : '';
		
		$offset = ($page-1) * $rows;
		if(!empty($cari)){
			$where = " AND a.nik LIKE '%$cari%' OR a.Nama LIKE '%$cari%'"; //
		}elseif(!empty($cari_tgl)){
			$tgl = $this->app_model->tgl_sql($cari_tgl);
			$where = " AND TglDaftar ='$tgl'"; //
		}elseif(!empty($cari_prodi)){
			$where = " AND Jur1 ='$cari_prodi'"; //
		}elseif(!empty($cari_ruang)){
			$where = " AND RUjian ='$cari_ruang'"; //		
		}else{
			$where = " "; //
		}
		
		$text = "SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb_gel_2 a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!=''
			$where 
			ORDER BY $sort $order
			LIMIT $rows OFFSET $offset";
		$result = array();
		$result['total'] = $this->db->query("SELECT a.nik,a.NoUjian,a.TglDaftar,a.Nama,a.lokasi, b.nik,b.nm_bank_pengirim,b.nm_pengirim,b.norek_pengirim,a.akademik,a.prodi, a.slip_pembayaran, a.status_bayar FROM mspcmb_gel_2 a INNER JOIN tbl_bayar AS b ON a.nik = b.nik WHERE a.slip_pembayaran!='' $where")->num_rows();
		$row = array();	
		$criteria = $this->db->query($text);
		foreach($criteria->result_array() as $data)
		{	
			if($data['lokasi'] == 1){
						$lokasi = "Kampus Matraman";
					}elseif($data['lokasi'] == 2){
						$lokasi = "Kampus Parung";
					}else{
						$lokasi = "Kampus Kedoya";
					}

			$row[] = array(
				'nik'			=>$data['nik'],
				'NoUjian'		=>$data['NoUjian'],
				'TglDaftar'		=>$this->app_model->tgl_indo($data['TglDaftar']),
				'Nama'			=>$data['Nama'],
				'Jur1'			=>$data['prodi'],
				'lokasi' 		=> $lokasi,
				'akademik'		=>$data['akademik'],
				'pembayaran'	=>$data['slip_pembayaran'],
				'nm_bank_pengirim'=>$data['nm_bank_pengirim'],
				'nm_pengirim'=>$data['nm_pengirim'],
				'norek_pengirim'=>$data['norek_pengirim'],
				'status_bayar'=>$data['status_bayar']
				// 'aksi' 			=> '<button id="lulus" name="lulus" class="easyui-linkbutton" onClick="javascript:lulus()">Lulus</button>
				// 		  			&nbsp;&nbsp;||
				// 					<button id="tidak_lulus" name="tidak_lulus" class="easyui-linkbutton" onClick="javascript:tidak_lulus()">Tidak</button>'
			);
			//var_dump($data);exit();
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}


		
	
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */