<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Zono LMS | Registration Page</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                <link href="frontend/images/presets/preset1/logo.png" rel="shortcut icon"  />
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            function Load()
            {
            Load_Page('pages/student_register', 'data');
        }
        </script>
    </head>
    <body class="hold-transition register-page" onload="Load()">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="content">
            <div class="register-logo">
                <a href="#"><b>User</b>Registration</a>
            </div>
                    <div class="row">
                        <div class="col-md-10">
            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <div id="progress"></div>

            </ul>
            <div class="separator"></div>

            <?php echo form_open_multipart('userregistration'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label>User Type</label>
                    </div>
                    <div class="col-md-9">

                        <select class="form-control" onchange="Register_Load(this.value, 'data')" name="usertype" id="usertype"  >
                            <option>Student</option>
                            <option>Teacher</option>

                        </select>
                    </div>
                </div>
            </div>
            <p></p>
            <div id="data">


            </div>

            </form>





                <a href="login" class="text-center">I already have a membership</a>
            </div>
                    </div>
                        </div>
                </div></div>
            <div class="col-md-3"></div>
                <!-- /.form-box -->
        </div><!-- /.register-box -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js"></script>
 
        <script src="js/notify.js" type="text/javascript"></script>
        <script src="js/jquery-1.11.0.js" type="text/javascript"></script>
        <script src="js/regjs.js" type="text/javascript"></script>
        <script>

            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
