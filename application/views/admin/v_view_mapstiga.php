<?php
        $b=$data->row_array();
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>E-Dosir Kejati Papua | View Data Map Tiga</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'?>"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js'?>"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
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
        <li>
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
        <li class="active">
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
        Dosir 
        <small>Dosir Map tiga</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kepegawaian</a></li>
        <li class="active">Dosir Map tiga</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Dosir Map tiga</h3>
              <a href="<?php echo base_url().'admin/map_tiga/add_data/'.$b['kepegawaian_id'];?>" class="btn btn-primary btn-flat btn-sm pull-right">Tambah data</a>
              <div class="row">
                <div class="col-sm-5">
                  <?php 
              $kepegawaian_id=$b['kepegawaian_id'];
                    $inbox=$this->db->query("SELECT * FROM tbl_kepegawaian WHERE kepegawaian_id='$kepegawaian_id' ");
                    foreach ($inbox->result_array() as $in) :
                        $kepegawaian_id=$in['kepegawaian_id'];
                        $kepegawaian_nama=$in['kepegawaian_nama'];
                        $kepegawaian_nip=$in['kepegawaian_nip'];
                        $kepegawaian_jabatan=$in['kepegawaian_jabatan'];
                ?>
                 <table class="table table-striped">
                   <tr>
                     <td>Nama</td>
                     <td>:</td>
                     <td><?php echo $kepegawaian_nama;?></td>
                   </tr>
                   <tr>
                     <td>Nip</td>
                     <td>:</td>
                     <td><?php echo $kepegawaian_nip;?></td>
                   </tr>
                   <tr>
                     <td>Jabatan</td>
                     <td>:</td>
                     <td><?php echo $kepegawaian_jabatan;?></td>
                   </tr>
                 </table>
                  <!-- end message -->
                  <?php endforeach;?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width:10px;">No</th>
                  <th>Nama Berkas</th>
                  <th>Nama Tanggal</th>
                  <th>Berkas</th>
                  <th style="width:200px">Options</th>
                </tr>
                </thead>
                <tbody>
                <?php     $no=0;
           
               $no++;
                      $kepegawaian_id=$b['kepegawaian_id'];
                    $inbox=$this->db->query("SELECT * FROM tbl_maptiga WHERE maptiga_pegawai_id='$kepegawaian_id' ");
                    foreach ($inbox->result_array() as $in) :
                        $maptiga_id=$in['maptiga_id'];
                        $maptiga_pegawai_id=$in['maptiga_pegawai_id'];
                        $maptiga_namaberkas=$in['maptiga_namaberkas'];
                        $maptiga_fileberkas=$in['maptiga_fileberkas'];
                        $maptiga_tanggalberkas=$in['maptiga_tanggalberkas'];
                        $maptiga_author=$in['maptiga_author'];
                        $maptiga_tanggal=$in['maptiga_tanggal'];
                       
                    ?>
               <tr>
                  <td><?php echo $no;?></td>
                   <td><?php echo $maptiga_namaberkas;?></td>
                   <td><?php echo $maptiga_tanggalberkas;?></td>
                   <td class="center"><a href="<?php echo base_url().'assets/map_tiga/'.$maptiga_fileberkas;?>" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-download"></i> Download</a></td>
                   <td class="center">
                    <a class="btn btn-primary btn-flat btn-sm" href="<?php echo base_url().'admin/map_tiga/ubah_maptiga/'.$maptiga_id;?>"><span class="fa fa-pencil"></span></a>
                    <a class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#ModalHapus<?php echo $maptiga_id;?>"><span class="fa fa-trash"></span></a>
                  </td>
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
<?php     $no=0;
           
               $no++;
                      $kepegawaian_id=$b['kepegawaian_id'];
                    $inbox=$this->db->query("SELECT * FROM tbl_maptiga WHERE maptiga_pegawai_id='$kepegawaian_id' ");
                    foreach ($inbox->result_array() as $in) :
                        $maptiga_id=$in['maptiga_id'];
                        $maptiga_pegawai_id=$in['maptiga_pegawai_id'];
                        $maptiga_namaberkas=$in['maptiga_namaberkas'];
                        $maptiga_fileberkas=$in['maptiga_fileberkas'];
                        $maptiga_tanggalberkas=$in['maptiga_tanggalberkas'];
                        $maptiga_author=$in['maptiga_author'];
                        $maptiga_tanggal=$in['maptiga_tanggal'];
                       
                    ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $maptiga_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus File</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/map_tiga/hapus_maptiga'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                           <input type="hidden" name="kode" value="<?php echo $maptiga_id;?>"/> 
                           <input type="hidden" name="file" value="<?php echo $maptiga_fileberkas;?>">
                            <p>Apakah Anda yakin mau menghapus file <b><?php echo $maptiga_namaberkas;?></b> ?</p>
                               
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
