<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Dosir Kejati Papua | Kepegawaian</title>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kepegawaian</a></li>
        <li class="active">Data Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pegawai</h3>
              <a href="<?php echo base_url().'admin/kepegawaian/add_data'?>" class="btn btn-primary btn-flat btn-sm pull-right">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:10px;">No</th>
                  <th>Nama Lengkap</th>
                  <th>Nip</th>
                  <th>Pangkat</th>
                  <th>Jabatan</th>
                  <th>Bidang</th>
                  <th>Foto</th>
                  <th style="width:100px;">Options</th>
                  <th style="width:80px;">Dosir</th>
                </tr>
                </thead>
                <tbody>
                <?php     $no=0;
            foreach ($data->result_array() as $i) :
               $no++;
                       $kepegawaian_id=$i['kepegawaian_id'];
                       $kepegawaian_nip=$i['kepegawaian_nip'];
                       $kepegawaian_nrp=$i['kepegawaian_nrp'];
                       $kepegawaian_jabatan=$i['kepegawaian_jabatan'];
                       $kepegawaian_pangkat=$i['kepegawaian_pangkat'];
                       $kepegawaian_tempatlahir=$i['kepegawaian_tempatlahir'];
                       $kepegawaian_tanggallahir=$i['kepegawaian_tanggallahir'];
                       $kepegawaian_nama=$i['kepegawaian_nama'];
                       $kepegawaian_agama=$i['kepegawaian_agama'];
                       $kepegawaian_jk=$i['kepegawaian_jk'];
                       $kepegawaian_goldarah=$i['kepegawaian_goldarah'];
                       $kepegawaian_alamat=$i['kepegawaian_alamat'];
                       $kepegawaian_notelp=$i['kepegawaian_notelp'];
                       $kepegawaian_email=$i['kepegawaian_email'];
                       $kepegawaian_unitkerja=$i['kepegawaian_unitkerja'];
                       $kepegawaian_foto=$i['kepegawaian_foto'];
                       $kepegawaian_author=$i['kepegawaian_author'];
                       $kepegawaian_tanngal=$i['kepegawaian_tanngal'];
                    ?>
                <tr>
                 
                  <td><?php echo $no;?></td>
                   <td><?php echo $kepegawaian_nama;?></td>
                   <td><?php echo $kepegawaian_nip;?></td>
                   <td><?php echo $kepegawaian_pangkat;?></td>
                   <td><?php echo $kepegawaian_jabatan;?></td>
                   <td><?php echo $kepegawaian_unitkerja;?></td>
                   <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/pegawai/'.$kepegawaian_foto;?>"></td>
                  <td style="text-align:center;">
                    <a class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $kepegawaian_id;?>"><span class="fa fa-eye"></span></a>
                    <a href="<?php echo base_url().'admin/kepegawaian/ubah_data/'.$kepegawaian_id;?>" class="btn btn-primary btn-flat btn-sm" ><span class="fa fa-pencil"></span></a>
                    <a class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $kepegawaian_id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                  <td><div class="btn-group">
                  <button type="button" class="btn btn-info">MAP</button>
                  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url().'admin/map_satu/add_data/'.$kepegawaian_id;?>">Map 1 </a></li>
                    <li><a href="<?php echo base_url().'admin/map_dua/add_data/'.$kepegawaian_id;?>">Map 2</a></li>
                    <li><a href="<?php echo base_url().'admin/map_tiga/add_data/'.$kepegawaian_id;?>">Map 3</a></li>
                    <li><a href="<?php echo base_url().'admin/map_empat/add_data/'.$kepegawaian_id;?>">Map 4</a></li>
                    <li><a href="<?php echo base_url().'admin/map_lima/add_data/'.$kepegawaian_id;?>">Map 5</a></li>
                  </ul>
                </div></td>
                  
                </tr>
        <?php endforeach;?>
                
                </tbody>
                
              </table>
            </div>
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

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php foreach ($data->result_array() as $i) :
              $kepegawaian_id=$i['kepegawaian_id'];
                       $kepegawaian_nip=$i['kepegawaian_nip'];
                       $kepegawaian_nrp=$i['kepegawaian_nrp'];
                       $kepegawaian_jabatan=$i['kepegawaian_jabatan'];
                       $kepegawaian_pangkat=$i['kepegawaian_pangkat'];
                       $kepegawaian_tempatlahir=$i['kepegawaian_tempatlahir'];
                       $kepegawaian_tanggallahir=$i['kepegawaian_tanggallahir'];
                       $kepegawaian_nama=$i['kepegawaian_nama'];
                       $kepegawaian_agama=$i['kepegawaian_agama'];
                       $kepegawaian_jk=$i['kepegawaian_jk'];
                       $kepegawaian_goldarah=$i['kepegawaian_goldarah'];
                       $kepegawaian_alamat=$i['kepegawaian_alamat'];
                       $kepegawaian_notelp=$i['kepegawaian_notelp'];
                       $kepegawaian_email=$i['kepegawaian_email'];
                       $kepegawaian_unitkerja=$i['kepegawaian_unitkerja'];
                       $kepegawaian_foto=$i['kepegawaian_foto'];
                       $kepegawaian_author=$i['kepegawaian_author'];
                       $kepegawaian_tanngal=$i['kepegawaian_tanngal'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $kepegawaian_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pegawai</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/kepegawaian/hapus_kepegawaian'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
              <input type="hidden" name="kode" value="<?php echo $kepegawaian_id;?>"/> 
              <input type="hidden" name="gambar" value="<?php echo $kepegawaian_foto;?>"/> 
                            <p>Apakah Anda yakin mau menghapus Data pegawai An <b><?php echo $kepegawaian_nama;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
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
