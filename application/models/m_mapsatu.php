<?php 
class M_mapsatu extends CI_Model{

	
	function get_all_mapsatu(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}

	function get_mapsatu_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_mapsatu.*,DATE_FORMAT(mapsatu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapsatu where mapsatu_pegawai_id='$kode'");
		return $hsl;
	}
	function get_mapsatu_by_id($kode){
		$hsl=$this->db->query("SELECT tbl_mapsatu.*,DATE_FORMAT(mapsatu_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapsatu where mapsatu_id='$kode'");
		return $hsl;
	}
	function simpan_mapsatu($idpegawai,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("INSERT INTO tbl_mapsatu (mapsatu_pegawai_id,mapsatu_namaberkas,mapsatu_tanggalberkas,mapsatu_fileberkas) VALUES ('$idpegawai','$namaberkas','$tanggalmaps','$file')");
		return $hsl;
	}

	function update_mapsatu($kode,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("UPDATE tbl_mapsatu SET mapsatu_namaberkas='$namaberkas',mapsatu_tanggalberkas='$tanggalmaps',mapsatu_fileberkas='$file' WHERE mapsatu_id='$kode'");
		return $hsl;
	}
	function update_mapsatu_tanpa_file($kode,$namaberkas,$tanggalmaps){
		$hsl=$this->db->query("UPDATE tbl_mapsatu SET mapsatu_namaberkas='$namaberkas',mapsatu_tanggalberkas='$tanggalmaps' WHERE mapsatu_id='$kode'");
		return $hsl;
	}
	function hapus_mapsatu($kode){
		$hsl=$this->db->query("DELETE FROM tbl_mapsatu WHERE mapsatu_id='$kode'");
		return $hsl;
	}

	//front-end
	function mapsatu(){
		$hsl=$this->db->query("SELECT * FROM tbl_mapsatu");
		return $hsl;
	}
	function mapsatu_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_mapsatu limit $offset,$limit");
		return $hsl;
	}

}