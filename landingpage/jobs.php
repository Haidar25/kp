<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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
  <link rel="stylesheet" href="../css/style1.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
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
    <a href="../index.php" class="logo logo-bg">
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
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Masuk</a>
          </li>
          <li>
            <a href="sign-up.php">Daftar</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="../dashboard/pencaker/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="../dashboard/umkm/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Keluar</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Temukan Lowongan Disini</h1>  <br>
            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Cari Lowongan">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Temukan!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Kecamatan <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                    <li><a href=""  class="citySearch" data-target="Ampelgading"><i class="fa fa-circle-o text-yellow"></i> Ampelgading</a></li>
                    <li><a href=""  class="citySearch" data-target="Bantur"><i class="fa fa-circle-o text-yellow"></i> Bantur</a></li>
                    <li><a href=""  class="citySearch" data-target="Bululawang"><i class="fa fa-circle-o text-yellow"></i> Bululawang</a></li>
                    <li><a href=""  class="citySearch" data-target="Dampit"><i class="fa fa-circle-o text-yellow"></i> Dampit</a></li>
                    <li><a href=""  class="citySearch" data-target="Dau"><i class="fa fa-circle-o text-yellow"></i> Dau</a></li>
                    <li><a href=""  class="citySearch" data-target="Donomulyo"><i class="fa fa-circle-o text-yellow"></i> Donomulyo</a></li>
                    <li><a href=""  class="citySearch" data-target="Gedangan"><i class="fa fa-circle-o text-yellow"></i> Gedangan</a></li>
                    <li><a href=""  class="citySearch" data-target="Gondanglegi"><i class="fa fa-circle-o text-yellow"></i> Gondanglegi</a></li>
                    <li><a href=""  class="citySearch" data-target="Jabung"><i class="fa fa-circle-o text-yellow"></i> Jabung</a></li>
                    <li><a href=""  class="citySearch" data-target="Kalipare"><i class="fa fa-circle-o text-yellow"></i> Kalipare</a></li>
                    <li><a href=""  class="citySearch" data-target="Karangploso"><i class="fa fa-circle-o text-yellow"></i> Karangploso</a></li>
                    <li><a href=""  class="citySearch" data-target="Kasembon"><i class="fa fa-circle-o text-yellow"></i> Kasembon</a></li>
                    <li><a href=""  class="citySearch" data-target="Kepanjen"><i class="fa fa-circle-o text-yellow"></i> Kepanjen</a></li>
                    <li><a href=""  class="citySearch" data-target="Kromengan"><i class="fa fa-circle-o text-yellow"></i> Kromengan</a></li>
                    <li><a href=""  class="citySearch" data-target="Lawang"><i class="fa fa-circle-o text-yellow"></i> Lawang</a></li>
                    <li><a href=""  class="citySearch" data-target="Ngajum"><i class="fa fa-circle-o text-yellow"></i> Ngajum</a></li>
                    <li><a href=""  class="citySearch" data-target="Ngantang"><i class="fa fa-circle-o text-yellow"></i> Ngantang</a></li>
                    <li><a href=""  class="citySearch" data-target="Pagak"><i class="fa fa-circle-o text-yellow"></i> Pagak</a></li>
                    <li><a href=""  class="citySearch" data-target="Pagelaran"><i class="fa fa-circle-o text-yellow"></i> Pagelaran</a></li>
                    <li><a href=""  class="citySearch" data-target="Pakis"><i class="fa fa-circle-o text-yellow"></i> Pakis</a></li>
                    <li><a href=""  class="citySearch" data-target="Pakisaji"><i class="fa fa-circle-o text-yellow"></i> Pakisaji</a></li>
                    <li><a href=""  class="citySearch" data-target="Poncokusumo"><i class="fa fa-circle-o text-yellow"></i> Poncokusumo</a></li>
                    <li><a href=""  class="citySearch" data-target="Pujon"><i class="fa fa-circle-o text-yellow"></i> Pujon</a></li>
                    <li><a href=""  class="citySearch" data-target="Singosari"><i class="fa fa-circle-o text-yellow"></i> Singosari</a></li>
                    <li><a href=""  class="citySearch" data-target="Sumbermanjing Wetan"><i class="fa fa-circle-o text-yellow"></i> Sumbermanjing Wetan</a></li>
                    <li><a href=""  class="citySearch" data-target="Sumberpucung"><i class="fa fa-circle-o text-yellow"></i> Sumberpucung</a></li>
                    <li><a href=""  class="citySearch" data-target="Tajinan"><i class="fa fa-circle-o text-yellow"></i> Tajinan</a></li>
                    <li><a href=""  class="citySearch" data-target="Tirtoyudo"><i class="fa fa-circle-o text-yellow"></i> Tirtoyudo</a></li>
                    <li><a href=""  class="citySearch" data-target="Tumpang"><i class="fa fa-circle-o text-yellow"></i> Tumpang</a></li>
                    <li><a href=""  class="citySearch" data-target="Turen"><i class="fa fa-circle-o text-yellow"></i> Turen</a></li>
                    <li><a href=""  class="citySearch" data-target="Wagir"><i class="fa fa-circle-o text-yellow"></i> Wagir</a></li>
                    <li><a href=""  class="citySearch" data-target="Wajak"><i class="fa fa-circle-o text-yellow"></i> Wajak</a></li>
                    <li><a href="" class="citySearch" data-target="Wonosari"><i class="fa fa-circle-o text-yellow"></i> Wonosari</a></li>
                    </ul>
                  </li>
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Pengalaman Kerja <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Tahun</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Tahun</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Tahun</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Tahun</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Tahun</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">

          <?php

          $limit = 4;

          $sql = "SELECT COUNT(id_jobpost) AS id FROM buat_lowongan";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }

          ?>

          
            <div id="target-content">
              
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div> 



          </div>
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

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<script src="../js/jquery.twbsPagination.min.js"></script>

<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobpagination.php?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>