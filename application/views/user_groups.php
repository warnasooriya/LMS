
<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Groups
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create User Groups</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">



                        <h3 class="box-title">
                            <select class="form-control " id="usergroupid" onchange="get_messages_group_id(this.value)">

                                <option> --- Select Group ---</option>
                                <?php
                                $this->method_call = & get_instance();
                                $data = $this->method_call->Get_Summery('message_groups');
                                foreach ($data['result'] as $row) {
                                    ?>
                                    <option><?php echo $row->group_title ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="hidden" name="ugid" id="ugid">
                        </h3>
                        <!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">

                        <div class="table-responsive mailbox-messages">

                            <div class="box-tools pull-left">
                                <div class="has-feedback">




                                </div>
                            </div>


                            <div id="message_group_users_table">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <?php
                                        $this->method_call = & get_instance();
                                        $data1 = $this->method_call->Get_Summery('qry_user_details');
                                        foreach ($data1['result'] as $newrow) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" id="<?php echo $newrow->user_id ?>" onchange="Update_User_Group(this.id)"></td>
                                                <td><?php echo $newrow->account_status ?></td>
                                                <td> <?php if ($newrow->account_status == 1) { ?><i class="fa fa-circle text-green"></i> <?php } else {
                                                ?>
                                                        <i class="fa fa-circle text-red"></i>
                                                        <?php }
                                                    ?></td>
                                                <td><img src="<?php echo 'userimages/' . $newrow->photo; ?>" class="img-circle" width="50px"> <?php echo $newrow->Description ?> </td>
                                                <td class="mailbox-name"><a href="#"  > <?php echo $newrow->name; ?></a></td>
                                                <td class="mailbox-subject"><b><?php echo $newrow->user_name ?></b> </td>
                                                <td class="mailbox-attachment"> </td>
                                                <td class="mailbox-date"><?php echo $newrow->contact_no; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>




                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">

                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
