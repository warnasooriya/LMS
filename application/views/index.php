<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Zono LMS | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="frontend/images/presets/preset1/logo.png" rel="shortcut icon"  />
        <!-- fullCalendar 2.2.5-->
        <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
        <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">

        <!-- Theme style -->
      
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <script src="uploads/jquery.uploadfile.js"></script>
        <link href="uploads/uploadfile.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->




    </head>

    <?php
    $data = $this->session->all_userdata();
    if (isset($data['message'])) {
        $msg = $data['message'];
        $stst = $data['stst'];


        $this->session->unset_userdata('message');
        $this->session->unset_userdata('stst');
    }
    ?>

    <body class="hold-transition skin-blue sidebar-mini" onload="
    <?php
    if (isset($data['message'])) {
        echo "Load_Message_indexpage('" . $msg . "','" . $stst . "')";
    }
    ?>" >
        <div class="wrapper">

            <header class="main-header">
                 
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">LMS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Zono</b>LMS</span>
                </a>
               
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            
                            <li class="dropdown notifications-menu">
                                 <div id="google_translate_element"></div>
                            </li>
                            
                            
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success"><div id="msg1"></div></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">
                                        <table>
                                            <tr><td> You have </td><td width='5px'>  </td><td><div id="msg4"> <span style="width:2px"> </span>0 <span style="width:2px"></span> </div></td><td width='5px'></td><td> Messages</td></tr>
                                        </table>
                                    </li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div id="messagebar">

                                        </div>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <?php
                            $notifications = 0;
                            $this->method_call = & get_instance();
                            $data = $this->method_call->Get_Summery('qry_notifications');
                            foreach ($data['result'] as $newrow) {
                                if ($newrow->count > 0) {
                                    $notifications++;
                                }
                            }
                            ?>
                            <!-- Notifications: style can be found in dropdown.less -->


                            <?php
                            $data = $this->session->all_userdata();

                            $username = $data['email'];


                            $this->method_call = & get_instance();
                            $data = $this->method_call->Get_ResultSet('user_name', $username, 'user_permision_module_load');
                            foreach ($data['result'] as $newrow) {
                                $utype = $newrow->user_type;
                            }
                            if ($utype == 1) {
                                ?>
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-warning"><?php echo $notifications; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">Notifications</li>
                                        <li>
                                            <ul class="menu">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $data = $this->method_call->Get_Summery('qry_notifications');
                                                foreach ($data['result'] as $newrow) {
                                                    if ($newrow->count > 0) {
                                                        ?>
                                                        <li>
                                                            <a href="#" onclick="Load_Page('<?php echo $newrow->link ?>', 'MainCtrl')" >
                                                                <i class="<?php echo $newrow->class; ?>"></i> <?php echo $newrow->count . ' ' . $newrow->Description ?> 
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">View all</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                            <!-- Tasks: style can be found in dropdown.less -->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#"  class="dropdown-toggle" data-toggle="dropdown">

                                    <?php
                                    $data = $this->session->all_userdata();
                                    if (!isset($data['photo'])) {
                                        ?>
                                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                        <?php
                                    } else {
                                        $ur = $data['photo'];
                                        ?>
                                        <img src = "<?php echo "userimages/" . $ur; ?>" alt = "<?php echo $data['email']; ?>"  class="user-image">
                                        <?php
                                    }
                                    ?>





                                    <span class="hidden-xs">                         <?php
                                        if (!isset($data['email'])) {
                                            //$ur = base_url() . 'login';
                                            // header('Location:' . $ur);
                                        } else {
                                            echo $data['email'];
                                        }
                                        ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->


                                    <li class="user-header">


                                        <?php
                                        $data = $this->session->all_userdata();
                                        if (!isset($data['photo'])) {
                                            ?>
                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            <?php
                                        } else {
                                            $ur = $data['photo'];
                                            ?>
                                            <img src = "<?php echo "userimages/" . $ur; ?>" alt = "<?php echo $data['email']; ?>"  class="img-circle">
                                            <?php
                                        }
                                        ?>

                                        <p>
                                            <?php
                                            if (!isset($data['email'])) {
                                                //$ur = base_url() . 'login';
                                                // header('Location:' . $ur);
                                            } else {
                                                echo $data['email'];
                                            }
                                            ?>

                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>

                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat" onclick="Load_Page('pages/profile', 'MainCtrl')">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="logout" class="btn btn-default btn-flat"  >Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">

                            <?php
                            if (!isset($data['photo'])) {
                                ?>
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <?php
                            } else {
                                $ur = $data['photo'];
                                ?>
                                <img src = "<?php echo "userimages/" . $ur ?>" alt = "<?php echo $data['email']; ?>"  class="img-circle" width="20px">
                                <?php
                            }
                            ?>



                        </div>
                        <div class="pull-left info">
                            <p><?php
                                if (!isset($data['email'])) {
                                    // $ur = base_url() . 'login';
                                    //  header('Location:' . $ur);
                                } else {
                                    echo $data['email'];
                                }
                                ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <a href="main">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="pull-right"></i>
                            </a>

                        </li>

                        <li class="active treeview">
                            <a href="front">
                                <i class="fa fa-home"></i> <span>Visit Web Site </span> <i class="pull-right"></i>
                            </a>

                        </li>

                        <?php
                        $data = $this->session->all_userdata();

                        $username = $data['email'];


                        $this->method_call = & get_instance();
                        $data = $this->method_call->Get_ResultSet('user_name', $username, 'user_permision_module_load');
                        foreach ($data['result'] as $newrow) {
                            if ($newrow->software_module == 3) {
                                ?>
                                <li class="treeview active">
                                    <a href="#">
                                        <i class="fa fa-envelope"></i> <span>Messages</span>
                                        <i class="fa fa-angle-left pull-right msgs"></i>
                                    </a>
                                    <ul class="treeview-menu menu-open" style="display: block;">
                                        <li><a href="#" onclick="Load_Page('pages/messages', 'MainCtrl')">Inbox <span class="label label-primary pull-right msgs"><div id="msgs">2</div></span></a></li>
                                        <li><a href="#" onclick="Load_Page('pages/compose', 'MainCtrl')" >Compose</a></li>
                                        <li><a href="#" onclick="Load_Page('pages/message_groups', 'MainCtrl')" >Create User Groups</a></li>
                                        <li><a href="#" onclick="Load_Page('pages/user_groups', 'MainCtrl')" >Add Users to Groups</a></li>
                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="treeview">
                                    <a href="#" onclick="Load_Page('<?php echo $newrow->url; ?>', 'MainCtrl')">
                                        <i class="<?php echo $newrow->class ?>"></i>
                                        <span> <?php echo $newrow->description ?></span>
                                        <span class="label label-danger pull-right "></span>
                                    </a>

                                </li>
                                <?php
                            }
                            ?>

                            <?php
                        }
                        ?>




                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="MainCtrl">

                <div class="content">
                    <div class="row">
                        <div class="span2" id="msgsPb">

                        </div>
                        <div class="span2" id="msgsPb"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">




                            <!-- Cpanel -->


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <h1>
                                    Dashboard
                                    <small>Control panel</small>
                                </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </section>




                            <section class="content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>
                                            <div class="info-box-content">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $sql = "select count(*) as count from article where article_type=1";
                                                $data = $this->method_call->Execute($sql);
                                                foreach ($data['result'] as $newrow) {
                                                    $row = $newrow;
                                                }
                                                ?>
                                                <span class="info-box-text">News</span>
                                                <span class="info-box-number"><?php echo $row->count; ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green"><i class="fa fa-calendar-o"></i></span>
                                            <div class="info-box-content">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $sql = "select count(*) as count from article where article_type=2";
                                                $data = $this->method_call->Execute($sql);
                                                foreach ($data['result'] as $newrow) {
                                                    $row = $newrow;
                                                }
                                                ?>
                                                <span class="info-box-text">Events</span>
                                                <span class="info-box-number"><?php echo $row->count; ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                                            <div class="info-box-content">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $sql = "select count(*) as count from article where article_type=3";
                                                $data = $this->method_call->Execute($sql);
                                                foreach ($data['result'] as $newrow) {
                                                    $row = $newrow;
                                                }
                                                ?>
                                                <span class="info-box-text">Result</span>
                                                <span class="info-box-number"><?php echo $row->count; ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                                            <div class="info-box-content">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $sql = "select count(*) as count from users";
                                                $data = $this->method_call->Execute($sql);
                                                foreach ($data['result'] as $newrow) {
                                                    $row = $newrow;
                                                }
                                                ?>
                                                <span class="info-box-text">Users</span>
                                                <span class="info-box-number"><?php echo $row->count; ?></span>
                                            </div><!-- /.info-box-content -->
                                        </div><!-- /.info-box -->
                                    </div><!-- /.col -->
                                </div>

                                <div class="row">
    <!-- Main content -->
                           
                                <!-- Small boxes (Stat box) -->


                                <?php
                                $data = $this->session->all_userdata();

                                $username = $data['email'];


                                $this->method_call = & get_instance();
                                $data = $this->method_call->Get_ResultSet('user_name', $username, 'user_permision_module_load');
                                foreach ($data['result'] as $newrow) {
                                    if ($newrow->software_module == 3) {
                                        ?>


                                        <div class="col-lg-3 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-blue">
                                                <div class="inner">

                                                    <h3><li class="fa fa-calendar-check-o"></li></h3>

                                                    <p>Inbox</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </div>
                                                <a href="#" class="small-box-footer" onclick="Load_Page('pages/messages', 'MainCtrl')">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-3 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-light-blue-gradient">
                                                <div class="inner">

                                                    <h3><li class="fa fa-industry"></li></h3>
                                                    <p>Sent</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-industry"></i>
                                                </div>
                                                <a href="#" class="small-box-footer" onclick="Load_Page('pages/sentMessages', 'MainCtrl')">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div><!-- ./col -->
                                        <div class="col-lg-3 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-red-gradient">
                                                <div class="inner">

                                                    <h3><li class="fa fa-plus"></li></h3>
                                                    <p> Create Message Group</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <a href="#" class="small-box-footer" onclick="Load_Page('pages/message_groups', 'MainCtrl')">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box bg-green-gradient">
                                                <div class="inner">

                                                    <h3><li class="fa fa-users"></li></h3>
                                                    <p> Add to Message Group</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-users"></i>
                                                </div>
                                                <a href="#" class="small-box-footer" onclick="Load_Page('pages/user_groups', 'MainCtrl')">More info <i class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div><?php
                                    } else {
                                        
                                        ?>
                                        <div class="col-lg-3 col-xs-6">
                                            <!-- small box -->
                                            <div class="small-box <?php echo $newrow->bgcolor ?>">
                                                <div class="inner">

                                                    <h3><li class="fa <?php echo $newrow->class ?>"></li></h3>

                                                    <p><?php echo $newrow->description; ?></p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa <?php echo $newrow->class ?>"></i>
                                                </div>
                                                <a href="#" class="small-box-footer" onclick="Load_Page('<?php echo $newrow->url; ?>', 'MainCtrl')">More info <i class="fa fa-arrow-circle-right" ></i></a>
                                            </div>
                                        </div>
                                        
                                        <?php
                                        
                                        
                                    }
                                }
                                ?>
                                <!-- ./col -->

                                <!-- Main row -->
                                </div>
                            </section>
                          <!-- /.content -->
                        </div><!-- /.content-wrapper -->

                    </div>       



                    <!--  cpanel -->















                </div>

            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2015 <a href="http://zonocloud.com" target="_blank">Zono Cloud Technologies</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                       
     <!-- /.control-sidebar-menu -->

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
            
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->


        <!-- jQuery 2.1.4 -->

        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
                                $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="plugins/input-mask/jquery.inputmask.js"></script>
        <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

        <!-- Morris.js charts -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <script src="plugins/morris/morris.min.js"></script>

        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <!-- bootstrap time picker -->
        <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>

        <script src="dist/js/demo.js"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script src="js/notify.js" type="text/javascript"></script>




        <script>
                                $(function () {
                                    //Initialize Select2 Elements
                                    $(".select2").select2();

                                    //Datemask dd/mm/yyyy
                                    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                                    //Datemask2 mm/dd/yyyy
                                    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                                    //Money Euro
                                    $("[data-mask]").inputmask();

                                    //Date range picker
                                    $('#reservation').daterangepicker();
                                    //Date range picker with time picker
                                    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                                    //Date range as a button
                                    $('#daterange-btn').daterangepicker(
                                            {
                                                ranges: {
                                                    'Today': [moment(), moment()],
                                                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                                },
                                                startDate: moment().subtract(29, 'days'),
                                                endDate: moment()
                                            },
                                    function (start, end) {
                                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                    }
                                    );

                                    //iCheck for checkbox and radio inputs
                                    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                                        checkboxClass: 'icheckbox_minimal-blue',
                                        radioClass: 'iradio_minimal-blue'
                                    });
                                    //Red color scheme for iCheck
                                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                                        checkboxClass: 'icheckbox_minimal-red',
                                        radioClass: 'iradio_minimal-red'
                                    });
                                    //Flat red color scheme for iCheck
                                    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                                        checkboxClass: 'icheckbox_flat-green',
                                        radioClass: 'iradio_flat-green'
                                    });

                                    //Colorpicker
                                    $(".my-colorpicker1").colorpicker();
                                    //color picker with addon
                                    $(".my-colorpicker2").colorpicker();

                                    //Timepicker
                                    $(".timepicker").timepicker({
                                        showInputs: false
                                    });
                                });
        </script>


    </body>
</html>
