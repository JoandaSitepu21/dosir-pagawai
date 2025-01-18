<?php
class Map_empat extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kepegawaian');
		$this->load->model('m_mapempat');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_mapempat->get_all_mapempat();
		$this->load->view('admin/v_mapempat',$x);
	}
	
	function viewdatamap_empat(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_view_mapsempat',$x);
	}
	function ubah_mapempat(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_mapempat->get_mapempat_by_id($kode);
		$this->load->view('admin/v_ubah_mapempat',$x);
	}
	function add_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_add_data_mapempat',$x);
	}
	function simpan_mapempat(){
				$config['upload_path'] = './assets/map_empat/'; //path folder
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
	
							$this->m_mapempat->simpan_mapempat($idpegawai,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
	                }
	                 
	            }else{
					redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
				}
				
	}
	
	function update_mapempat(){
				
	           $config['upload_path'] = './assets/map_empat/'; //path folder
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
							$path='./assets/map_empat/'.$data;
							unlink($path);
							$this->m_mapempat->update_mapempat($kode,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                    $namaberkas=$this->input->post('xnamaberkas');
						$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
						$this->m_mapempat->update_mapempat_tanpa_file($kode,$namaberkas,$tanggalmaps);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/map_empat/viewdatamap_empat/'.$idpegawai);
	            } 

	}

	function hapus_mapempat(){
		$kode=$this->input->post('kode');
		$idpegawai=strip_tags($this->input->post('x_idpegawai'));
		$data=$this->input->post('file');
		$path='./assets/map_empat/'.$data;
		unlink($path);
		$this->m_mapempat->hapus_mapempat($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/map_empat');
	}

}