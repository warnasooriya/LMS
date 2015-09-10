
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
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-red"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Create a nice theme
                                                        <small class="pull-right">40%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Some task I need to do
                                                        <small class="pull-right">60%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

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
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>

                        </li>


                        <li class="treeview">
                            <a href="#" onclick="Load_Page('pages/create_class', 'MainCtrl')">
                                <i class="fa fa-book"></i>
                                <span> Create New Class</span>
                                <span class="label label-danger pull-right "></span>
                            </a>

                        </li>

                        <li class="treeview">
                            <a href="#" onclick="Load_Page('usermanage', 'MainCtrl')">
                                <i class="fa fa-users"></i>
                                <span> Manage Users</span>
                                <span class="label label-danger pull-right ">3</span>
                            </a>

                        </li>

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

                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-cloud-upload"></i> <span>Articles</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu menu-open" style="display: block;">
                                <li><a href="#" onclick="Load_Page('pages/upload_article', 'MainCtrl')">Upload Article </a></li>

                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
