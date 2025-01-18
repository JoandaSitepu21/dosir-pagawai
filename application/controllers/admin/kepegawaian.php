<?php
class Kepegawaian extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kepegawaian');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_kepegawaian->get_all_kepegawaian();
		$this->load->view('admin/v_kepegawaian',$x);
	}
	function add_data(){
		$x['data']=$this->m_kepegawaian->get_all_kepegawaian();
		$this->load->view('admin/v_add_kepegawaian',$x);
	}
	function ubah_data(){
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_kepegawaian->get_kepegawaian_by_kode($kode);
		$this->load->view('admin/v_ubah_kepegawaian',$x);
	}
	function simpan_kepegawaian(){
				$config['upload_path'] = './assets/pegawai/'; //path folder
	            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|zip|gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/pegawai/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 600;
	                        $config['height']= auto;
	                        $config['new_image']= './assets/pegawai/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $photo=$gbr['file_name'];
							$nama=strip_tags($this->input->post('xnama'));
							$jabatan=strip_tags($this->input->post('xjabatan'));
	            			$pangkat=strip_tags($this->input->post('xpangkat'));
							$nip=strip_tags($this->input->post('xnip'));
							$nrp=strip_tags($this->input->post('xnrp'));
							$tematlahir=strip_tags($this->input->post('xtematlahir'));
							$tanggallahir=strip_tags($this->input->post('xtanggallahir'));
							$jeniskelamin=strip_tags($this->input->post('xjeniskelamin'));
							$agama=strip_tags($this->input->post('xagama'));
							$golongandarah=strip_tags($this->input->post('xgolongandarah'));
							$alamat=strip_tags($this->input->post('xalamat'));
							$notel=strip_tags($this->input->post('xnotel'));
							$email=strip_tags($this->input->post('xemail'));
							$unitkerja=strip_tags($this->input->post('xunitkerja'));
							$this->m_kepegawaian->simpan_kepegawaian($nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja,$photo);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/kepegawaian');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/kepegawaian');
	                }
	                 
	            }else{
	            	$nama=strip_tags($this->input->post('xnama'));
	            	$pangkat=strip_tags($this->input->post('xpangkat'));
							$jabatan=strip_tags($this->input->post('xjabatan'));
							$nip=strip_tags($this->input->post('xnip'));
							$nrp=strip_tags($this->input->post('xnrp'));
							$tematlahir=strip_tags($this->input->post('xtematlahir'));
							$tanggallahir=strip_tags($this->input->post('xtanggallahir'));
							$jeniskelamin=strip_tags($this->input->post('xjeniskelamin'));
							$agama=strip_tags($this->input->post('xagama'));
							$golongandarah=strip_tags($this->input->post('xgolongandarah'));
							$alamat=strip_tags($this->input->post('xalamat'));
							$notel=strip_tags($this->input->post('xnotel'));
							$email=strip_tags($this->input->post('xemail'));
							$unitkerja=strip_tags($this->input->post('xunitkerja'));
					$this->m_kepegawaian->simpan_kepegawaian_tanpa_img($nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja);
					echo $this->session->set_flashdata('msg','success');
					redirect('admin/kepegawaian');
				}
				
	}
	
	function update_kepegawaian(){
				
	            $config['upload_path'] = './assets/pegawai/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/pegawai/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/pegawai/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $gambar=$this->input->post('gambar');
							$path='./assets/pegawai/'.$gambar;
							unlink($path);

	                        $photo=$gbr['file_name'];
	                        $kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama'));
							$jabatan=strip_tags($this->input->post('xjabatan'));
	            			$pangkat=strip_tags($this->input->post('xpangkat'));
							$nip=strip_tags($this->input->post('xnip'));
							$nrp=strip_tags($this->input->post('xnrp'));
							$tematlahir=strip_tags($this->input->post('xtematlahir'));
							$tanggallahir=strip_tags($this->input->post('xtanggallahir'));
							$jeniskelamin=strip_tags($this->input->post('xjeniskelamin'));
							$agama=strip_tags($this->input->post('xagama'));
							$golongandarah=strip_tags($this->input->post('xgolongandarah'));
							$alamat=strip_tags($this->input->post('xalamat'));
							$notel=strip_tags($this->input->post('xnotel'));
							$email=strip_tags($this->input->post('xemail'));
							$unitkerja=strip_tags($this->input->post('xunitkerja'));

							$this->m_kepegawaian->update_kepegawaian($kode,$nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja,$photo);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/kepegawaian');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/kepegawaian');
	                }
	                
	            }else{
							$kode=$this->input->post('kode');
							$nama=strip_tags($this->input->post('xnama'));
							$jabatan=strip_tags($this->input->post('xjabatan'));
	            			$pangkat=strip_tags($this->input->post('xpangkat'));
							$nip=strip_tags($this->input->post('xnip'));
							$nrp=strip_tags($this->input->post('xnrp'));
							$tematlahir=strip_tags($this->input->post('xtematlahir'));
							$tanggallahir=strip_tags($this->input->post('xtanggallahir'));
							$jeniskelamin=strip_tags($this->input->post('xjeniskelamin'));
							$agama=strip_tags($this->input->post('xagama'));
							$golongandarah=strip_tags($this->input->post('xgolongandarah'));
							$alamat=strip_tags($this->input->post('xalamat'));
							$notel=strip_tags($this->input->post('xnotel'));
							$email=strip_tags($this->input->post('xemail'));
							$unitkerja=strip_tags($this->input->post('xunitkerja'));
							$this->m_kepegawaian->update_kepegawaian_tanpa_img($kode,$nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/kepegawaian');
	            } 

	}

	function hapus_kepegawaian(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/pegawai/'.$gambar;
		unlink($path);
		$this->m_kepegawaian->hapus_kepegawaian($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/kepegawaian');
	}

}