<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage User

        </h1>
        <ol class="breadcrumb">
            <li><a href="#" onclick="Load_Page('usermanage', 'MainCtrl')"><i class="fa fa-dashboard"></i> C Panel</a></li>
            <li class="active">Manage User</li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">USER MANAGEMENT</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="span12">
                                <div class="span4" id="progress"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive" >
                                    <table class="table-primary table-hover table-thead-simple table-vertical-center " width="100%" id="users">
                                        <tbody>
                                            <?php
                                            $this->method_call = & get_instance();
                                            $data = $this->method_call->Get_Summery('qry_user_details');
                                            foreach ($data['result'] as $newrow) {
                                                $p = $newrow->photo;
                                                if ($p == null) {
                                                    $photo = "dist/img/user1-128x128.jpg";
                                                } else {
                                                    $photo = "userimages/" . $p;
                                                }
                                                ?>
                                                <tr>
                                                    <td><img src="<?php echo $photo; ?>" class="img-circle" alt="User Image" width="60px" height="60px"></td>
                                                    <td><?php echo $newrow->name; ?></td>
                                                    <td>
                                                        <small class="label <?php
                                                        if ($newrow->user_type_id == 1) {
                                                            echo 'label-danger';
                                                        } else if ($newrow->user_type_id == 2) {
                                                            echo 'label-warning';
                                                        } else {
                                                            echo 'label-success';
                                                        }
                                                        ?>"><i class="fa fa-user"></i> <?php echo $newrow->Description ?></small>
                                                    </td>
                                                    <td><?php echo $newrow->class_description ?></td>
                                                    <td><span class="label label-success"><i class="fa fa-envelope">  </i> <?php echo $newrow->user_name ?> </span> </td>
                                                    <td><span class="label label-success"><i class="fa fa-phone">  </i>  <?php echo $newrow->contact_no ?> </span></td>
                                                    <td><span class="label label-info"><i class="fa fa-calendar-o ">  </i>  <?php echo $newrow->create_date_time ?> </span></td>
                                                    <td align="right"><a href="#"  id="<?php echo $newrow->user_id; ?>"  onclick="Update_User_Account_Status(this.id, '1')" class="btn btn-success fa fa-check-circle-o <?php
                                                        if ($newrow->account_status == 1) {
                                                            echo 'disabled';
                                                        }
                                                        ?>" > Activate </a> <i class="separator"></i> <a href="#" id="<?php echo $newrow->user_id; ?>" class="btn btn-danger fa fa-times-circle-o <?php
                                                                         if ($newrow->account_status != 1) {
                                                                             echo 'disabled';
                                                                         }
                                                                         ?> " onclick="Update_User_Account_Status(this.id, '2')" > Reject</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div><!-- /.content-wrapper -->




