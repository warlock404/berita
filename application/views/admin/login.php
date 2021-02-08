<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
  $sql = $this->db->get('instansi');
  foreach($sql->result() as $row){
    echo $row->nama;
  }
  ?> | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" type="image/x-icon" href="<?php
  $sql = $this->db->get('instansi');
  foreach($sql->result() as $row){
    echo base_url().'upload/image/'.$row->logo;
  }
  ?>">
  
  <script type="text/javascript">
  function ceklogin(){
      var username = $('#username').val();
      var password = $('#password').val();

      if(username.length == 0){
        $('#alert').html("<div class='callout callout-danger'>Anda Belum Memasukan Username!</div>").hide().fadeIn().fadeOut(4000);
        $('#username').focus();
        return false;
      }
      if(password.length == 0){
        $('#alert').html("<div class='callout callout-danger'>Anda Belum Memasukan Password!</div>").hide().fadeIn().fadeOut(4000);
        $('#password').focus();
        return false;
      }
      return true;
  }
  </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><?php
  $sql = $this->db->get('instansi');
  foreach($sql->result() as $row){
    echo $row->nama;
  }
  ?></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login Ke Admin Panel</p>
        <div id="alert">
          <?php
          $info = $this->session->flashdata('info');
          if(!empty($info)){
            echo $info;
          }
          ?>
        </div>

    <form method="POST" action="<?php echo base_url('index.php/login/getlogin');?>" onsubmit="return ceklogin();">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-md-12">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="MASUK"><br>
          <a href="<?php echo base_url()?>">Kembali ke Home</a>
        </div>
      </div>
    </form><br>
  </div>
  </div>
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootbox.js"></script>
</body>
</html>
