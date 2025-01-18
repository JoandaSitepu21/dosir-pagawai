<?php
class Map_tiga extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kepegawaian');
		$this->load->model('m_maptiga');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_maptiga->get_all_maptiga();
		$this->load->view('admin/v_maptiga',$x);
	}
	
	function viewdatamap_tiga(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_view_mapstiga',$x);
	}
	function ubah_maptiga(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_maptiga->get_maptiga_by_id($kode);
		$this->load->view('admin/v_ubah_maptiga',$x);
	}
	function add_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_add_data_maptiga',$x);
	}
	function simpan_maptiga(){
				$config['upload_path'] = './assets/map_tiga/'; //path folder
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
	
							$this->m_maptiga->simpan_maptiga($idpegawai,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
	                }
	                 
	            }else{
					redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
				}
				
	}
	
	function update_maptiga(){
				
	           $config['upload_path'] = './assets/map_tiga/'; //path folder
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
							$path='./assets/map_tiga/'.$data;
							unlink($path);
							$this->m_maptiga->update_maptiga($kode,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                    $namaberkas=$this->input->post('xnamaberkas');
						$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
						$this->m_maptiga->update_maptiga_tanpa_file($kode,$namaberkas,$tanggalmaps);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/map_tiga/viewdatamap_tiga/'.$idpegawai);
	            } 

	}

	function hapus_maptiga(){
		$kode=$this->input->post('kode');
		$idpegawai=strip_tags($this->input->post('x_idpegawai'));
		$data=$this->input->post('file');
		$path='./assets/map_tiga/'.$data;
		unlink($path);
		$this->m_maptiga->hapus_maptiga($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/map_tiga');
	}

}