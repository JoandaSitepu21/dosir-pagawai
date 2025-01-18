<?php 
class M_maptiga extends CI_Model{

	
	function get_all_maptiga(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}

	function get_maptiga_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_maptiga.*,DATE_FORMAT(maptiga_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_maptiga where maptiga_pegawai_id='$kode'");
		return $hsl;
	}
	function get_maptiga_by_id($kode){
		$hsl=$this->db->query("SELECT tbl_maptiga.*,DATE_FORMAT(maptiga_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_maptiga where maptiga_id='$kode'");
		return $hsl;
	}
	function simpan_maptiga($idpegawai,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("INSERT INTO tbl_maptiga (maptiga_pegawai_id,maptiga_namaberkas,maptiga_tanggalberkas,maptiga_fileberkas) VALUES ('$idpegawai','$namaberkas','$tanggalmaps','$file')");
		return $hsl;
	}

	function update_maptiga($kode,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("UPDATE tbl_maptiga SET maptiga_namaberkas='$namaberkas',maptiga_tanggalberkas='$tanggalmaps',maptiga_fileberkas='$file' WHERE maptiga_id='$kode'");
		return $hsl;
	}
	function update_maptiga_tanpa_file($kode,$namaberkas,$tanggalmaps){
		$hsl=$this->db->query("UPDATE tbl_maptiga SET maptiga_namaberkas='$namaberkas',maptiga_tanggalberkas='$tanggalmaps' WHERE maptiga_id='$kode'");
		return $hsl;
	}
	function hapus_maptiga($kode){
		$hsl=$this->db->query("DELETE FROM tbl_maptiga WHERE maptiga_id='$kode'");
		return $hsl;
	}

	//front-end
	function maptiga(){
		$hsl=$this->db->query("SELECT * FROM tbl_maptiga");
		return $hsl;
	}
	function maptiga_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_maptiga limit $offset,$limit");
		return $hsl;
	}

}