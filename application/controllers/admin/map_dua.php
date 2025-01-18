<?php
class Map_dua extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kepegawaian');
		$this->load->model('m_mapdua');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_mapdua->get_all_mapdua();
		$this->load->view('admin/v_mapdua',$x);
	}
	
	function viewdatamap_dua(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_view_mapsdua',$x);
	}
	function ubah_mapdua(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_mapdua->get_mapdua_by_id($kode);
		$this->load->view('admin/v_ubah_mapdua',$x);
	}
	function add_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_add_data_mapdua',$x);
	}
	function simpan_mapdua(){
				$config['upload_path'] = './assets/map_dua/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $file=$gbr['file_name'];
							$idpegawai=strip_tags($this->input->post('x_idpegawai'));
							$namaberkas=$this->input->post('xnamaberkas');
							$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
	
							$this->m_mapdua->simpan_mapdua($idpegawai,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
	                }
	                 
	            }else{
					redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
				}
				
	}
	
	function update_mapdua(){
				
	           $config['upload_path'] = './assets/map_dua/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $file=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
	                        $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                        $namaberkas=$this->input->post('xnamaberkas');
							$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
							$data=$this->input->post('file');
							$path='./assets/map_dua/'.$data;
							unlink($path);
							$this->m_mapdua->update_mapdua($kode,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                    $namaberkas=$this->input->post('xnamaberkas');
						$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
						$this->m_mapdua->update_mapdua_tanpa_file($kode,$namaberkas,$tanggalmaps);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/map_dua/viewdatamap_dua/'.$idpegawai);
	            } 

	}

	function hapus_mapdua(){
		$kode=$this->input->post('kode');
		$idpegawai=strip_tags($this->input->post('x_idpegawai'));
		$data=$this->input->post('file');
		$path='./assets/map_dua/'.$data;
		unlink($path);
		$this->m_mapdua->hapus_mapdua($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/map_dua');
	}

}