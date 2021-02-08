<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
  $sql = $this->db->get('instansi');
  foreach($sql->result() as $row){
    echo $row->nama;
  }
  ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="<?php
  $sql = $this->db->get('instansi');
  foreach($sql->result() as $row){
    echo base_url().'upload/image/'.$row->logo;
  }
  ?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url('index.php/admin/home');?>" class="logo">
      <span class="logo-lg"><b>Admin</b> PANEL</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php
              $key = $_SESSION['user_id'];
              $this->db->where('user_id',$key);
              $user = $this->db->get('users');
              foreach($user->result() as $row){
                $foto = $row->foto;
                if(empty($foto)){
                    echo base_url('upload/image/laki.png');
                }else{
                  echo base_url()."upload/image/".$row->foto;
                }
              }?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
              $key = $_SESSION['user_id'];
              $this->db->where('user_id',$key);
              $user = $this->db->get('users');
              foreach($user->result() as $row){
                echo $row->namalengkap;
              }
              ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php
                $key = $_SESSION['user_id'];
                $this->db->where('user_id',$key);
                $user = $this->db->get('users');
              foreach($user->result() as $row){
                $foto = $row->foto;
                if(empty($foto)){
                    echo base_url('upload/image/laki.png');
                }else{
                  echo base_url()."upload/image/".$row->foto;
                }
              }?>" class="img-circle" alt="User Image">

                <p>
                  <?php
                  $key = $_SESSION['user_id'];
                  $this->db->where('user_id',$key);
                  $user = $this->db->get('users');
                  foreach($user->result() as $row){
                    echo $row->namalengkap." - ". $row->level;
                  }
                  ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('index.php/admin/profile');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/admin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php
              $key = $_SESSION['user_id'];
              $this->db->where('user_id',$key);
              $user = $this->db->get('users');
              foreach($user->result() as $row){
                $foto = $row->foto;
                if(empty($foto)){
                    echo base_url('upload/image/laki.png');
                }else{
                  echo base_url()."upload/image/".$row->foto;
                }
              }?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
              $key = $_SESSION['user_id'];
              $this->db->where('user_id',$key);
              $user = $this->db->get('users');
              foreach($user->result() as $row){
                echo $row->namalengkap;
              }
              ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php
              $key = $_SESSION['user_id'];
              $this->db->where('user_id',$key);
              $user = $this->db->get('users');
              foreach($user->result() as $row){
                echo $row->level;
              }
              ?></a>
        </div>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu">
      <li class="active">
          <a href="<?php echo base_url().'index.php/admin/home'?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">MASTER</li>
        <li>
          <a href="<?php echo base_url().'index.php/admin/tambah_berita'?>">
            <i class="fa fa-th"></i> <span>Tambah Berita</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'index.php/admin/lihat_berita'?>">
            <i class="fa fa-th"></i> <span>Lihat Berita</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'index.php/admin/grafik'?>">
            <i class="fa fa-th"></i> <span>Grafik</span>
          </a>
        </li>
        <li class="header">SETTING</li>
        <li><a href="<?php echo base_url().'index.php/admin/lihat_report'?>"><i class="fa fa-circle-o text-danger"></i> <span>Report</span></a></li>
        <li><a href="<?php echo base_url().'index.php/admin/lihat_sumber'?>"><i class="fa fa-circle-o text-aqua"></i> <span>Sumber Berita</span></a></li>
        <?php
        if($_SESSION['level'] == 'Super Admin'){
        ?>
        <li><a href="<?php echo base_url().'index.php/admin/users'?>"><i class="fa fa-circle-o text-yellow"></i> <span>Manage Users</span></a></li>
        <li><a href="<?php echo base_url().'index.php/admin/setting'?>"><i class="fa fa-circle-o text-blue"></i> <span>Setting</span></a></li>
        <?php
        }
        ?>
      </ul>
    </section>
    </aside>

  <div class="content-wrapper">
     <section class="content-header">
      <h1>

        <?php echo $sub_judul;?>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"> <?php echo $judul;?></i></li>
        <li class="active"><?php echo $sub_judul;?></li>
      </ol>
    </section>
    <?php $this->load->view($content);?>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016 <a href="http://cyfo.cf" target="_blank">Cyber Forensics Team</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootbox.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

     $.ajax({
        type: 'GET',
        url: 'http://localhost/berita/index.php/admin/piechartapi',
        dataType: 'json',
        success: function (data){
          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $("#barChart").get(0).getContext("2d");
          var barChart = new Chart(barChartCanvas);
          var barChartData = data;
          barChartData.datasets.fillColor = "#00a65a";
          barChartData.datasets.strokeColor = "#00a65a";
          barChartData.datasets.pointColor = "#00a65a";
          var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
          };

          barChartOptions.datasetFill = false;
          barChart.Bar(barChartData, barChartOptions);
        }
     });

     $.ajax({
        type: 'GET',
        url: 'http://localhost/berita/index.php/admin/barchartapi',
        dataType: 'json',
        success: function (data){
          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
          var pieChart = new Chart(pieChartCanvas);
          var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
          };
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          pieChart.Doughnut(data, pieOptions);
        }
      });
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
  $(document).on("click", "#alertHapus", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    bootbox.confirm("Yakin Ingin Menghapus Data ?", function(confirmed){
      if(confirmed){
        window.location.href = link;
      }
    });
  });
</script>
</body>
</html>
