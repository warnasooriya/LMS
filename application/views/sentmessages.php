
<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sent Mails
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sent Mails</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="#" onclick="Load_Page('pages/compose', 'MainCtrl')" class="btn btn-primary btn-block margin-bottom">Compose</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Folders</h3>
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li ><a href="#" onclick="Load_Page('pages/messages', 'MainCtrl')"><i class="fa fa-inbox"></i> Inbox </a></li>
                            <li class="active"><a href="#" onclick="Load_Page('pages/sentMessages', 'MainCtrl')"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->

            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sent Mails</h3>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                 <!--  1-50/200 -->
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped" id="sent_box">
                                <tbody>
                                    <?php
                                    $data = $this->session->all_userdata();
                                    $username = $data['email'];
                                    $this->method_call = & get_instance();
                                    $userid = $this->method_call->Get_Field_value_Given_Field_Noprint('users', 'user_id', 'user_name', $username);
                                   
                                    $data1 = $this->method_call->Get_ResultSet('from_user', $userid, 'qry_sent_message');
                                    foreach ($data1['result'] as $newrow) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" id="<?php echo $newrow->sent_messages_id ?>"></td>
                                            
                                            <td class="mailbox-name"><a href="#" id="<?php echo $newrow->sent_messages_id ?>" onclick="Load_Message(this.id,0)" > <?php echo $newrow->name.'  '.$newrow->group_title; ?></a></td>
                                            <td class="mailbox-subject"><b><?php echo $newrow->subject ?></b> <?php echo ' > ' . strip_tags(substr($newrow->message_description,0, 20)) . '.....'; ?></td>
                                            <td class="mailbox-attachment"> <?php if ($newrow->file_source) {
                                                                                    ?>
                                                <a class="fa fa-paperclip" href="messages/<?php echo $newrow->file_source; ?>"></a>
                                                <?php
                                                                                }
                                                    ?></td>
                                            <td class="mailbox-date"><?php echo $newrow->createdatetime; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>




                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm" onclick="Delete_Sent_Messages();"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                              <!--  1-50/200 -->
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
