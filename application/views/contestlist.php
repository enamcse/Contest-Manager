<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Contest Manager - Existing Contests</title>

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
            <!--logo start-->
            <a href="<?php echo site_url('contestlist');?>" class="logo"><b>Contest Manager</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url('signin/signout');?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      <!-- ********************************************************************************************************** -->
        <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Existing Contests</h4>
                            <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bookmark"></i> Contest Name</th>
                                  <th><i class="fa fa-bullhorn"></i> Start Time</th>
                                  <th><i class="fa fa-bullhorn"></i> End Time</th>
                                  <th><i class="fa fa-bullhorn"></i> Duration</th>
                                  <th><i class=" fa fa-question-circle"></i> Status</th>
                                  
                              </tr>
                              </thead>
                              <tbody>

                              <?php  foreach ($contests as $contest): ?>
                              
                              <tr >
                                  
                                  <td><a method="post" href="<?php echo site_url('dashboard/index/'.$contest->contest_id.'/');?>"><?=$contest->contest_name?></a></td>
                                  
                                  <td><?=unix_to_human(human_to_unix($contest->start_time));?> </td>
                                  <td><?php $starts = human_to_unix($contest->start_time); $ends = $starts + (int)$contest->duration/1000; echo unix_to_human($ends);?> </td>
                                  <td><?php $starts = human_to_unix($contest->start_time); $ends = $starts + (int)$contest->duration/1000; echo timespan($starts, $ends);?> </td>
                                  <td><span class="label 
                                  <?php 
                                    $starts = human_to_unix($contest->start_time); 
                                    $ends = $starts + (int)$contest->duration/1000; 
                                    if($ends<now('Asia/Dhaka')) echo 'label-warning'; 
                                    elseif($starts<now('Asia/Dhaka')) echo'label-success'; 
                                    else echo 'label-info';  
                                  ?> label-mini"> 
                                  <?php 
                                    $starts = human_to_unix($contest->start_time);  
                                    $ends = $starts + (int)$contest->duration/1000; 
                                    if($ends<now('Asia/Dhaka')) echo 'Finished'; 
                                    elseif($starts<now('Asia/Dhaka')) echo'Running'; 
                                    else echo 'Scheduled';  
                                  ?> </span></td>
                                  <?php if($this->session->userdata('role')==='Judge'){
                                    ob_start(); //Start output buffer
                                    echo site_url('contestlist/delete/'.$contest->contest_id.'/');
                                    $output = ob_get_contents(); //Grab output
                                    ob_end_clean();
                                    echo '<td><a method="post" href="'.$output.'"><button type="button"  class="btn btn-danger btn-xs">Delete</button></a></td>';
                                  }
                                  ?>
                                  
                              </tr>
                              
                              <?php endforeach; ?>
                              
                              </tbody>
                          </table>

                          <?php if($this->session->userdata('role')==='Judge'){
                            ob_start(); //Start output buffer
                            echo site_url('addnewcontest');
                            $output = ob_get_contents(); //Grab output
                            ob_end_clean();
                            echo '<td><a method="post" href="'.$output.'"><button type="button"  class="btn btn-primary btn-lg">Create New Contest</button></a></td>';
                          }
                          ?>
                         
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row --> 

    </section><! --/wrapper -->
      

      <!--main content end-->
      <!-- ********************************************************************************************************** -->
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

    <!-- js placed at the end of the document so the pages load faster -->
     <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?> "></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js') ?> "></script>
    <!-- <script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?> " type="text/javascript"></script> -->
    <script src="<?php echo base_url('assets/js/jquery.sparkline.js') ?> "></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url('assets/js/common-scripts.js') ?> "></script>
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/gritter/js/jquery.gritter.js') ?> "></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/gritter-conf.js') ?> "></script>

    <!--script for this page-->
    <script src="<?php echo base_url('assets/js/sparkline-chart.js') ?> "></script>    
  <script src="<?php echo base_url('assets/js/zabuto_calendar.js') ?> "></script> 
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
    </script>
  

  </body>
</html>
