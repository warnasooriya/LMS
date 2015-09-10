<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailbox
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="#" onclick="Load_Page('pages/messages', 'MainCtrl')" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#" onclick="Load_Page('pages/messages', 'MainCtrl')"><i class="fa fa-inbox"></i> Inbox </a></li>
                            <li><a href="#" onclick="Load_Page('pages/sentMessages', 'MainCtrl')"><i class="fa fa-envelope-o"></i> Sent</a></li>

                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
 <!-- /.box -->
            </div><!-- /.col -->
            <form method="post" id="messagesend" name="messagesend" action="messageSend" enctype="multipart/form-data">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Message</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group">

                                <input type="text" class="form-control" name="to" id="to" placeholder="To:" onblur="Get_User_ID();
                                        Get_From_ID();">
                                    <input type="hidden" name="userid" id="userid">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="from_id" id="from_id">
                                <input type="hidden" name="from" id="from" value="<?php
                                $data = $this->session->all_userdata();
                                if (isset($data['email'])) {
                                    echo $data['email'];
                                }
                                ?>">
                               


                                <select class="form-control" name="group" id="group" onchange="Get_From_ID();">
                                    <option>----Select-----</option>
                                    <?php
                                    $this->method_call = & get_instance();
                                    $data1 = $this->method_call->Get_Summery('message_groups');
                                    foreach ($data1['result'] as $newrow) {
                                        ?>
                                    <option value="<?php echo $newrow->group_id ?>"><?php echo $newrow->group_title ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>



                           
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" name="compose-textarea" class="form-control textarea" style="height: 250px" onfocus="Compose_Validation();Get_User_ID()"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Attachment
                                    <input type="file" name="attachment" id="attachment">
                                </div>

                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">


                                <input type="submit" name="btn" id="btn" class="btn btn-primary" value="Send">


                            </div>

                        </div><!-- /.box-footer -->
                    </div><!-- /. box -->
                </div><!-- /.col -->
            </form>
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



