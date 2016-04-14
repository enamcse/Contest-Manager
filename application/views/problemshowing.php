<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Contest Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href=" <?php echo base_url('assets/font-awesome/css/font-awesome.css') ?> " rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/zabuto_calendar.css') ?>  ">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css') ?>  " />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineicons/style.css') ?>  ">    
    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/chart-master/Chart.js') ?>"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div  class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo site_url('contestlist');?>" class="logo"><b>Contest Manager</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url('signin/signout');?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?php echo site_url('dashboard/index/'.$contest_id.'/');?>"><img src="<?php echo base_url('assets/img/ui-sam.jpg') ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?=$contest_name?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="<?php echo site_url('dashboard/index/'.$contest_id.'/');?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                <li class="sub-menu">
                      <a href="<?php echo site_url('standings/index/'.$contest_id.'/');?>" >
                          <i class="fa fa-dashboard"></i>
                          <span>Standings</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="<?php echo site_url('submission/index/'.$contest_id.'/');?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Submissions</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo site_url('clarification/index/'.$contest_id.'/');?>" >
                          <i class="fa fa-dashboard"></i>
                          <span>Clarifications</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
     <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <div class="row">
              <div class="col-sm-8 content-panel">

                <?php  foreach ($problem as $prob): ?>

                <div style="position: relative;" class="panel-body">
                  <div class="h1"><?=$prob->problem_no;?>. <?=$prob->problem_name;?></div><br>
                  <p class="small">Time Limit: <?=$prob->time_limit/1000;?>s</p><br>
                  <div class="desc"><p><font size="4">
                    <?=$prob->description;?>
                  </div>
                  <div class="specs"><br>
                    <div class="spec">
                      <h3>Input</h3>
                      <div class="spec-body">
                        <?=$prob->input;?>
                      </div>
                    </div>
                    <br>
                      <div class="spec">
                        <h3>Output</h3>
                        <div class="spec-body">
                          <?=$prob->output;?>
                        </div>
                      </div>
                    </div><br>
                    <div class="samples">
                      <h3>Sample</h3>
                      <table class="table table-sample">
                        <thead>
                          <tr>
                            <th>Input</th>
                            <th>Output</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="sample-input">
                              <?=$prob->sample_input;?>
                            </td>
                            <td class="sample-output">
                              <?=$prob->sample_output;?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div> 
                  
                  <?php break;endforeach; ?>
                  <?php $fpath ='problemshowing/do_upload/'.$username.'/'.$prob->contest_id.'/'.$prob->problem_id.'/'; echo form_open_multipart($fpath);?>
                  
                 

                  <?php
                    $ok = false;

                    
                    $temp1 = $contest->start_time;
                    $starts = human_to_unix($temp1);  
                    $ends = $starts + (int)$contest->duration/1000;
                     
                    if($ends<now('Asia/Dhaka')) ; 
                    elseif($starts<now('Asia/Dhaka')) $ok = true; 
                    if($ok){echo '<label>Choose File to Submit:</label>';
                    echo '<input type="file" name="userfile" size="20">';
                    echo '<br>';
                    echo '<input class="btn btn-theme" type="submit" value="Submit" />';
                  }
                  ?>
                
                  </form>
                  </div>
                <div class="col-sm-4">
                <div id="content"><div class="panel panel-default panel-contest-timer"><div class="panel-body"><div class="text-center"><div class="h2" >Finished</div></div></div>
              </div>



              
            </div>
      
    </section><! --/wrapper -->
      </section>
      <!-- /MAIN CONTENT -->   
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - Developed by Enamul Hassan and Md. Khairullah Gaurab, CSE, SUST
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

  </body>
</html>
