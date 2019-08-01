<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_pengusaha'])) {
  header("Location: ../../index.php");
  exit();
}

require_once("../../landingpage/db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bursa Kerja Malang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../css/style1.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Bursa Kerja</b> Malang</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                  
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Selamat Datang <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="list-company.php"><i class="fa fa-tv"></i> UMKM Saya</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-tv"></i> Buat Lowongan</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-tv"></i> Lowongan Saya</a></li>
                  <li class="active"><a href="job-applications.php"><i class="fa fa-tv"></i> Pelamar di UMKM Saya</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Kotak Pesan</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Pengaturan</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Data Pelamar</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Data Pencaker Yang Melamar</i></h2>

            <?php
             $sql = "SELECT *, pencaker.nama, lowongan.id_company, lowongan.status FROM buat_lowongan INNER JOIN lowongan ON buat_lowongan.id_jobpost=lowongan.id_jobpost  INNER JOIN users ON users.id_user=lowongan.id_user JOIN pencaker ON pencaker.id_user = users.id_user WHERE lowongan.id_company IN (SELECT id_company from company WHERE id_pengusaha = '$_SESSION[id_pengusaha]')";
                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>
            <div class="attachment-block clearfix padding-2">
                <h4 class="attachment-heading"><a href="user-application.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>&id_company=<?php echo $row['id_company']; ?>"><?php echo $row['jobtitle'].' @ ('.$row['nama'].')'; ?></a></h4>
                <div class="attachment-text padding-2">
                  <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>  
                  <?php 

                  if($row['status'] == 0) {
                    echo '<div class="pull-right"><strong class="text-orange">Belum Diseleksi</strong></div>';
                  } else if ($row['status'] == 1) {
                    echo '<div class="pull-right"><strong class="text-red">Ditolak</strong></div>';
                  } else if ($row['status'] == 2) {
                    echo '<div class="pull-right"><strong class="text-green">Sedang Diseleksi</strong></div> ';
                  }
                  ?>
                                
                </div>
            </div>

            <?php
              }
            }
            ?>
            
          </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
    <strong>Bismillah &copy; KP <a href="http://kominfo.malangkab.go.id/">Kominfo Kabupaten Malang</a>.</strong> 2019

    </div>
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>
</body>
</html>
