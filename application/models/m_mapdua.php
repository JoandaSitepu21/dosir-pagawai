<?php 
class M_mapdua extends CI_Model{

	
	function get_all_mapdua(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}

	function get_mapdua_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_mapdua.*,DATE_FORMAT(mapdua_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapdua where mapdua_pegawai_id='$kode'");
		return $hsl;
	}
	function get_mapdua_by_id($kode){
		$hsl=$this->db->query("SELECT tbl_mapdua.*,DATE_FORMAT(mapdua_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_mapdua where mapdua_id='$kode'");
		return $hsl;
	}
	function simpan_mapdua($idpegawai,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("INSERT INTO tbl_mapdua (mapdua_pegawai_id,mapdua_namaberkas,mapdua_tanggalberkas,mapdua_fileberkas) VALUES ('$idpegawai','$namaberkas','$tanggalmaps','$file')");
		return $hsl;
	}

	function update_mapdua($kode,$namaberkas,$tanggalmaps,$file){
		$hsl=$this->db->query("UPDATE tbl_mapdua SET mapdua_namaberkas='$namaberkas',mapdua_tanggalberkas='$tanggalmaps',mapdua_fileberkas='$file' WHERE mapdua_id='$kode'");
		return $hsl;
	}
	function update_mapdua_tanpa_file($kode,$namaberkas,$tanggalmaps){
		$hsl=$this->db->query("UPDATE tbl_mapdua SET mapdua_namaberkas='$namaberkas',mapdua_tanggalberkas='$tanggalmaps' WHERE mapdua_id='$kode'");
		return $hsl;
	}
	function hapus_mapdua($kode){
		$hsl=$this->db->query("DELETE FROM tbl_mapdua WHERE mapdua_id='$kode'");
		return $hsl;
	}

	//front-end
	function mapdua(){
		$hsl=$this->db->query("SELECT * FROM tbl_mapdua");
		return $hsl;
	}
	function mapdua_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_mapdua limit $offset,$limit");
		return $hsl;
	}

}