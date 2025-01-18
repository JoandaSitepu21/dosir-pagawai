<?php 
class M_mapempat extends CI_Model{

	
	function get_all_mapempat(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}

	function get_mapempat_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_mapempat.*,DATE_FORMAT(mapempat_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapempat where mapempat_pegawai_id='$kode'");
		return $hsl;
	}
	function get_mapempat_by_id($kode){
		$hsl=$this->db->query("SELECT tbl_mapempat.*,DATE_FORMAT(mapempat_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapempat where mapempat_id='$kode'");
		return $hsl;
	}
	function simpan_mapempat($idpegawai,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("INSERT INTO tbl_mapempat (mapempat_pegawai_id,mapempat_namaberkas,mapempat_tanggalberkas,mapempat_fileberkas) VALUES ('$idpegawai','$namaberkas','$tanggalmaps','$file')");
		return $hsl;
	}

	function update_mapempat($kode,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("UPDATE tbl_mapempat SET mapempat_namaberkas='$namaberkas',mapempat_tanggalberkas='$tanggalmaps',mapempat_fileberkas='$file' WHERE mapempat_id='$kode'");
		return $hsl;
	}
	function update_mapempat_tanpa_file($kode,$namaberkas,$tanggalmaps){
		$hsl=$this->db->query("UPDATE tbl_mapempat SET mapempat_namaberkas='$namaberkas',mapempat_tanggalberkas='$tanggalmaps' WHERE mapempat_id='$kode'");
		return $hsl;
	}
	function hapus_mapempat($kode){
		$hsl=$this->db->query("DELETE FROM tbl_mapempat WHERE mapempat_id='$kode'");
		return $hsl;
	}

	//front-end
	function mapempat(){
		$hsl=$this->db->query("SELECT * FROM tbl_mapempat");
		return $hsl;
	}
	function mapempat_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_mapempat limit $offset,$limit");
		return $hsl;
	}

}