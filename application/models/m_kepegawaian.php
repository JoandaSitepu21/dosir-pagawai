<?php 
class M_kepegawaian extends CI_Model{

	function get_all_kepegawaian(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}
	function simpan_kepegawaian($nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_kepegawaian (kepegawaian_nama,kepegawaian_pangkat,kepegawaian_jabatan,kepegawaian_nip,kepegawaian_nrp,kepegawaian_tempatlahir,kepegawaian_tanggallahir,kepegawaian_jk,kepegawaian_agama,kepegawaian_goldarah,kepegawaian_alamat,kepegawaian_notelp,kepegawaian_email,kepegawaian_unitkerja,kepegawaian_foto) VALUES ('$nama','$pangkat','$jabatan','$nip','$nrp','$tematlahir','$tanggallahir','$jeniskelamin','$agama','$golongandarah','$alamat','$notel','$email','$unitkerja','$photo')");
		return $hsl;
	}

	function simpan_kepegawaian_tanpa_img($nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja){
		$hsl=$this->db->query("INSERT INTO tbl_kepegawaian (kepegawaian_nama,kepegawaian_pangkat,kepegawaian_jabatan,kepegawaian_nip,kepegawaian_nrp,kepegawaian_tempatlahir,kepegawaian_tanggallahir,kepegawaian_jk,kepegawaian_agama,kepegawaian_goldarah,kepegawaian_alamat,kepegawaian_notelp,kepegawaian_email,kepegawaian_unitkerja) VALUES ('$nama','$pangkat','$jabatan','$nip','$nrp','$tematlahir','$tanggallahir','$jeniskelamin','$agama','$golongandarah','$alamat','$notel','$email','$unitkerja')");
		return $hsl;
	}

	function update_kepegawaian($kode,$nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja,$photo){
		$hsl=$this->db->query("UPDATE tbl_kepegawaian SET kepegawaian_nama='$nama',kepegawaian_pangkat='$pangkat',kepegawaian_jabatan='$jabatan',kepegawaian_nip='$nip',kepegawaian_nrp='$nrp',kepegawaian_tempatlahir='$tematlahir',kepegawaian_tanggallahir='$tanggallahir',kepegawaian_jk='$jeniskelamin',kepegawaian_agama='$agama',kepegawaian_goldarah='$golongandarah',kepegawaian_alamat='$alamat',kepegawaian_notelp='$notel',kepegawaian_email='$email',kepegawaian_unitkerja='$unitkerja',kepegawaian_foto='$photo' WHERE kepegawaian_id='$kode'");
		return $hsl;
	}
	function update_kepegawaian_tanpa_img($kode,$nama,$pangkat,$jabatan,$nip,$nrp,$tematlahir,$tanggallahir,$jeniskelamin,$agama,$golongandarah,$alamat,$notel,$email,$unitkerja){
		$hsl=$this->db->query("UPDATE tbl_kepegawaian SET kepegawaian_nama='$nama',kepegawaian_pangkat='$pangkat',kepegawaian_jabatan='$jabatan',kepegawaian_nip='$nip',kepegawaian_nrp='$nrp',kepegawaian_tempatlahir='$tematlahir',kepegawaian_tanggallahir='$tanggallahir',kepegawaian_jk='$jeniskelamin',kepegawaian_agama='$agama',kepegawaian_goldarah='$golongandarah',kepegawaian_alamat='$alamat',kepegawaian_notelp='$notel',kepegawaian_email='$email',kepegawaian_unitkerja='$unitkerja' WHERE kepegawaian_id='$kode'");
		return $hsl;
	}
	
	function hapus_kepegawaian($kode){
		$hsl=$this->db->query("DELETE FROM tbl_kepegawaian WHERE kepegawaian_id='$kode'");
		return $hsl;
	}

	//front-end
	function kepegawaian(){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian");
		return $hsl;
	}
	function kepegawaian_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_kepegawaian limit $offset,$limit");
		return $hsl;
	}
	
	function get_kepegawaian_by_kode($kode){
		$hsl=$this->db->query("SELECT tbl_kepegawaian.*,DATE_FORMAT(kepegawaian_tanngal,'%d/%m/%Y') AS tanggal FROM tbl_kepegawaian where kepegawaian_id='$kode'");
		return $hsl;
	}
}