<?php
class Map_lima extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_kepegawaian');
		$this->load->model('m_maplima');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_maplima->get_all_maplima();
		$this->load->view('admin/v_maplima',$x);
	}
	
	function viewdatamap_lima(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_view_mapslima',$x);
	}
	function ubah_maplima(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_maplima->get_maplima_by_id($kode);
		$this->load->view('admin/v_ubah_maplima',$x);
	}
	function add_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_add_data_maplima',$x);
	}
	function simpan_maplima(){
				$config['upload_path'] = './assets/map_lima/'; //path folder
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
	
							$this->m_maplima->simpan_maplima($idpegawai,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
	                }
	                 
	            }else{
					redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
				}
				
	}
	
	function update_maplima(){
				
	           $config['upload_path'] = './assets/map_lima/'; //path folder
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
							$path='./assets/map_lima/'.$data;
							unlink($path);
							$this->m_maplima->update_maplima($kode,$namaberkas,$tanggalmaps,$file);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
	                }
	                
	            }else{
						$kode=$this->input->post('kode');
	                    $idpegawai=strip_tags($this->input->post('x_idpegawai'));
	                    $namaberkas=$this->input->post('xnamaberkas');
						$tanggalmaps=strip_tags($this->input->post('xtanggalmaps'));
						$this->m_maplima->update_maplima_tanpa_file($kode,$namaberkas,$tanggalmaps);
						echo $this->session->set_flashdata('msg','info');
						redirect('admin/map_lima/viewdatamap_lima/'.$idpegawai);
	            } 

	}

	function hapus_maplima(){
		$kode=$this->input->post('kode');
		$idpegawai=strip_tags($this->input->post('x_idpegawai'));
		$data=$this->input->post('file');
		$path='./assets/map_lima/'.$data;
		unlink($path);
		$this->m_maplima->hapus_maplima($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/map_lima');
	}

}