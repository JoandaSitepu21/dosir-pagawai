<?php 
class M_maplima extends CI_Model{

	
	function get_all_maplima(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}

	function get_maplima_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_maplima.*,DATE_FORMAT(maplima_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_maplima where maplima_pegawai_id='$kode'");
		return $hsl;
	}
	function get_maplima_by_id($kode){
		$hsl=$this->db->query("SELECT tbl_maplima.*,DATE_FORMAT(maplima_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_maplima where maplima_id='$kode'");
		return $hsl;
	}
	function simpan_maplima($idpegawai,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("INSERT INTO tbl_maplima (maplima_pegawai_id,maplima_namaberkas,maplima_tanggalberkas,maplima_fileberkas) VALUES ('$idpegawai','$namaberkas','$tanggalmaps','$file')");
		return $hsl;
	}

	function update_maplima($kode,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("UPDATE tbl_maplima SET maplima_namaberkas='$namaberkas',maplima_tanggalberkas='$tanggalmaps',maplima_fileberkas='$file' WHERE maplima_id='$kode'");
		return $hsl;
	}
	function update_maplima_tanpa_file($kode,$namaberkas,$tanggalmaps){
		$hsl=$this->db->query("UPDATE tbl_maplima SET maplima_namaberkas='$namaberkas',maplima_tanggalberkas='$tanggalmaps' WHERE maplima_id='$kode'");
		return $hsl;
	}
	function hapus_maplima($kode){
		$hsl=$this->db->query("DELETE FROM tbl_maplima WHERE maplima_id='$kode'");
		return $hsl;
	}

	//front-end
	function maplima(){
		$hsl=$this->db->query("SELECT * FROM tbl_maplima");
		return $hsl;
	}
	function maplima_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_maplima limit $offset,$limit");
		return $hsl;
	}

}