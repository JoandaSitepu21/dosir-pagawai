<?php
        $b=$data->row_array();
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>E-Dosir Kejati Papua | Ubah Data Kepegawaian</title>
  <!-- Tell the browser to be responsive to screen width -->
 <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/Ionicons/css/ionicons.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php 
    $this->load->view('admin/v_header');
  ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="user-image" alt="">
              
        </div>
        <div class="pull-left info">
         <p ><?php echo $c['pengguna_nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
        <li class="active ">
          <a href="<?php echo base_url().'admin/kepegawaian'?>">
            <i class="fa fa-users"></i> <span>Kepegawaian</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/map_satu'?>">
            <i class="fa fa-file-pdf-o"></i> <span>Map Satu</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/map_dua'?>">
            <i class="fa fa-file-pdf-o"></i> <span>Map Dua</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/map_tiga'?>">
            <i class="fa fa-file-pdf-o"></i> <span>Map Tiga</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/map_empat'?>">
            <i class="fa fa-file-pdf-o"></i> <span>Map Empat</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/map_lima'?>">
            <i class="fa fa-file-pdf-o"></i> <span>Map Lima</span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-file-pdf-o"></i> <span>User</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kepegawaian
        <small>Data Pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/kepegawaian'?>">Kepegawaian</a></li>
        <li class="active">Ubah Data Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ubah Data Pegawai</h3>
              <a href="<?php echo base_url().'admin/kepegawaian'?>" class="btn btn-warning btn-flat btn-sm pull-right">Kembali</a>
            </div>
            <!-- /.box-header -->
              <form  action="<?php echo base_url().'admin/kepegawaian/update_kepegawaian'?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-text-width"></i></span>
                    <input type="hidden" name="kode" value="<?php echo $b['kepegawaian_id'];?>">
                    <input type="hidden" name="gambar" value="<?php echo $b['kepegawaian_foto'];?>">
                    <input type="text" name="xnama" class="form-control" value="<?php echo $b['kepegawaian_nama'];?>" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NIP</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-text-width"></i></span>
                        <input type="text" name="xnip" class="form-control" value="<?php echo $b['kepegawaian_nip'];?>"  placeholder="Nomor Induk Pegawai">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NRP</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-text-width"></i></span>
                        <input type="text" name="xnrp" class="form-control" value="<?php echo $b['kepegawaian_nrp'];?>"  placeholder="NRP">
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                  <label>Pangkat</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                    <input type="text" name="xjabatan" class="form-control" value="<?php echo $b['kepegawaian_pangkat'];?>"  placeholder="Jabatan">
                  </div>
                </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                  <label>Jabatan</label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                    <input type="text" name="xpangkat" class="form-control" value="<?php echo $b['kepegawaian_jabatan'];?>"  placeholder="Jabatan">
                  </div>
                </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" name="xtematlahir" class="form-control" value="<?php echo $b['kepegawaian_tempatlahir'];?>"  placeholder="Tempat Lahir">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="xtanggallahir" class="form-control" value="<?php echo $b['kepegawaian_tanggallahir'];?>"  placeholder="Tanggal Lahir">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select name="xjeniskelamin" class="form-control">
                          <option value="<?php echo $b['kepegawaian_jk'];?>"><?php echo $b['kepegawaian_jk'];?></option>
                          <option>Laki-Laki</option>
                          <option>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Agama</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <select name="xagama" class="form-control">
                          <option value="<?php echo $b['kepegawaian_agama'];?>"><?php echo $b['kepegawaian_agama'];?></option>
                          <option>Protestan</option>
                          <option>Islam</option>
                          <option>Katolik</option>
                          <option>Hindu</option>
                          <option>Budha</option>
                          <option>Kong Hu Chu</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Golongan Darah</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
                        <select name="xgolongandarah" class="form-control">
                          <option value="<?php echo $b['kepegawaian_nama'];?>"><?php echo $b['kepegawaian_nama'];?></option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <textarea name="xalamat" class="form-control" name="xalamat"><?php echo $b['kepegawaian_alamat'];?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nomor Telpon</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="xnotel" class="form-control" value="<?php echo $b['kepegawaian_notelp'];?>" >
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat Email</label>
                       <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mail"></i></span>
                         <input type="text" name="xemail" class="form-control" value="<?php echo $b['kepegawaian_email'];?>" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Unit Kerja</label>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                         <input type="text" name="xunitkerja" class="form-control" value="<?php echo $b['kepegawaian_unitkerja'];?>" >
                      </div>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file-picture-o"></i></span>
                         <input type="file"  name="filefoto" class="form-control"  >
                      </div>
                  

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php 
    $this->load->view('admin/v_footer');
  ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.min.js'?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/bower_components/datatables.net/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/bower_components/fastclick/lib/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
