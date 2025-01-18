<?php
class Map_satu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kepegawaian');
		$this->load->model('m_mapsatu');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_mapsatu->get_all_mapsatu();
		$this->load->view('admin/v_mapsatu',$x);
	}
	
	function viewdatamap_satu(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_view_mapssatu',$x);
	}
	function ubah_mapsatu(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_mapsatu->get_mapsatu_by_id($kode);
		$this->load->view('admin/v_ubah_mapsatu',$x);
	}
	function add_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_add_data_mapsatu',$x);
	}
	function simpan_mapsatu(){
				$config['upload_path'] = './assets/map_satu/'; //path folder
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
	
							$this->m_mapsatu->simpan_mapsatu($idpegawai,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
	                }
	                 
	            }else{
					redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
				}
				
	}
	
	function update_mapsatu(){
				
	           $config['upload_path'] = './assets/map_satu/'; //path folder
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
							$path='./assets/map_satu/'.$data;
							unlink($path);
							$this->m_mapsatu->update_mapsatu($kode,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                    $namaberkas=$this->input->post('xnamaberkas');
						$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
						$this->m_mapsatu->update_mapsatu_tanpa_file($kode,$namaberkas,$tanggalmaps);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/map_satu/viewdatamap_satu/'.$idpegawai);
	            } 

	}

	function hapus_mapsatu(){
		$kode=$this->input->post('kode');
		$idpegawai=strip_tags($this->input->post('x_idpegawai'));
		$data=$this->input->post('file');
		$path='./assets/map_satu/'.$data;
		unlink($path);
		$this->m_mapsatu->hapus_mapsatu($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/map_satu');
	}

}