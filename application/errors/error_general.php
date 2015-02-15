<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="utf-8" />
<title><?php echo $status_code; ?> | CRDB FAO</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?php echo base_url();?>admin/css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="<?php echo base_url();?>admin/js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style>
  #message-btn:hover{
    background-color: #00d51e !important;
    border-color: #00d51e !important;
  }  
</style>
</head>
<body class="">
<section id="content">
  <div class="row m-n">
    <div class="col-sm-4 col-sm-offset-4">
      <div class="text-center m-b-lg">
        <h1 class="h text-white animated fadeInDownBig"><?php echo $status_code ?></h1>
      </div>
      <div class="list-group bg-info auto m-b-sm m-b-lg" > 
      <a href="#" class="list-group-item btn btn-primary" id="message-btn" style="background-color: #00b91e; border-color: #00b91e !important;"> 
      <i class="fa fa-fw fa-lock icon-muted" style="color:white !important;"></i> <?php echo $message ?> </a> 
     </div>
    </div>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder clearfix">
    <p> <small>CRDB Bank PLC. All Rights Reserved<br>
      &copy; 2014</small> </p>
  </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="<?php echo base_url();?>admin/js/app.v1.js"></script>
<script src="<?php echo base_url();?>admin/js/app.plugin.js"></script>
</body>
</html>