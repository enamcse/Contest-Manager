<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Submissions</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href=" <?php echo base_url('assets/font-awesome/css/font-awesome.css') ?> " rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/zabuto_calendar.css') ?>  ">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css') ?>  " />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineicons/style.css') ?>  ">    
    
	<!-- For Nice Calender Starts-->
      
    <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url('assets/bootstrap-datetimepicker.min.css') ?>">
	<!-- For Nice Calender Ends-->
	
	
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
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo site_url('signin/signout');?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
    
	    <!-- **********************************************************************************************************************************************************
	       MAIN CONTENT
	       *********************************************************************************************************************************************************** -->
	       <!--main content start-->
         <section id="main-content">
	           <section class="wrapper">
	               <div class="row mt">
	                   <div class="col-md-8">
	                 <form method="post" action="<?php echo site_url('addnewcontest/save/');?>">
	 					  <div class="form-panel">
	 	                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Contest Information</h4>
	 	                      <form class="form-horizontal style-form">
	 	                          <div class="form-group">
	 	                              <label class="col-sm-1 control-label"> </label>
	 	                              <div class="col-sm-10">
                                      <div class="form-group">
                                    <label class="sr-only" for="durationsHours">Hours</label>
                                    <input name="contest_name" type="text" class="form-control" id="durationsHours" placeholder="Contest Name">
                                </div>
                                      <div class="well">
                 <!-- The Templete For The Nice Date and Time Picker Ends Here-->
                            <h5>Contest Duration:</h5>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="durationsHours">Hours</label>
                                    <input name="hours" type="text" class="form-control" id="durationsHours" placeholder="Hours">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="durationsMinutes">Minutes</label>
                                    <input name="mins" type="text" class="form-control" id="durationsMinutes" placeholder="Minutes">
                                </div>
                                 <div class="well">
                       <h5> Choose Start Time:</h5>
                     <div id="datetimepicker2" class="input-append">
                       <p><input name="dating" data-format="yyyy-MM-dd hh:mm:ss" type="text"></input><p>
                       <button class="add-on btn btn-theme">
                         <i data-time-icon="btn icon-time" data-date-icon="btn icon-calendar"></i>
                       </button>
                  </div>
                            </form>
                        </div>
	 	                              </div>
	 	                          </div>
	 	              			</form>
	 	   					 <!-- The Templete For The Nice Date and Time Picker Ends Here-->
                 <br>
                 <br>

                 <br>
	 	   					 	
                  <br>

                  
                    
	 	                  
					            
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                           <p > <input style="margin-left:22em" class="btn btn-theme" type="submit" value="Submit" /></div></p>
                    </form>
	                   </div><!-- /col-md-12 -->
	               </div><!-- /row -->

       </section><! --/wrapper -->
	     </section><! --/wrapper -->

	       <!--main content end-->

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
    <script src="<?php echo base_url('assets/js/jquery.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?> "></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?> "></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js') ?> "></script>
    <!-- <script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?> " type="text/javascript"></script> -->
    <script src="<?php echo base_url('assets/js/jquery.sparkline.js') ?> "></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url('assets/js/common-scripts.js') ?> "></script>
	
	<!-- For Nice Calender Starts-->
    <script type="text/javascript"
     src="<?php echo base_url('assets/jquery.min.js') ?>">
    </script> 
    <script type="text/javascript"
     src="<?php echo base_url('assets/bootstrap.min.js') ?>">
    </script>
    <script type="text/javascript"
     src="<?php echo base_url('assets/bootstrap-datetimepicker.min.js') ?>">
    </script>
    <script type="text/javascript"
     src="<?php echo base_url('assets/locales/bootstrap-datetimepicker.en.js') ?>">
    </script>
	<script type="text/javascript">
	  $(function() {
	    $('#datetimepicker2').datetimepicker({
	      language: 'en',
	      pick12HourFormat: true
	    });
	  });
	</script>
	  <!-- For Nice Calender Ends-->

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
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

  </body>
</html>
