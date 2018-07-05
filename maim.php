<?php include "header.php" ?>


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AgroDSS | Home</title>
     <style>
       #world-map-markers {
        height: 700px;
        width: 100%;
       }
    </style>
    
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="CSS/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="CSS/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="CSS/bower_components/Ionicons/css/ionicons.min.css">
  <!--    jvectormap-->
    <link rel="stylesheet" href="CSS/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="CSS/dist/css/AdminLTE.min.css">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="CSS/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
<!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!--
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
-->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">About Us</a></li>
        <li class="active">Contacts</li>
      </ol>
    </section>

    <!-- Main content -->
   
            
    
            
    <!-- MAP & BOX PANE -->
    
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">A map showing areas favourable for particular crops to grow</h3>
              <div class="row no-print">
              <div class="box-tools pull-right">
                
              
   <!-- <button class="printButton" onclick="myFunction()">print</button> -->
   

   <a onclick="myFunction()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          </div>
          </div>
              
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
<!--                     <div style="height: 325px;" id="world-map-markers"> <img src="Images/tz.svg" style="height: 325px; position: absolete; align: center;"> </div> -->
                    <div >
        
                     
<div style="margin: auto;text-align: center;" id="world-map-markers" >
  
</div>
<div class="row1">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Legend</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><img src="Images/plantIcons/banana.png" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banana</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><img src="Images/plantIcons/beans.png" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beans</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><img src="Images/plantIcons/maize.png" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maize</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><img src="Images/plantIcons/rice.png"class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rice</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings"><img src="Images/plantIcons/tobacco.png" class="image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tobacco</a>
    </div>
  </div>
  
  </div>
</div>
                        
                      </div>
                      
                      
                  </div>
                </div>
                <!-- /.col -->
<!--                <div class="col-md-3 col-sm-4">-->
<!--
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
-->
                    <!-- /.description-block -->
<!--
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
-->
                    <!-- /.description-block -->
<!--
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
-->
<!--                    </div>-->
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>      
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include "footer.php" ?>