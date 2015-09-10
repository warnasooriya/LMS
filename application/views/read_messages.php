<?php
$this->method_call = & get_instance();

if ($ib == 1) {
    $d1 = $this->method_call->Update_Message_Read_Status($msgid, '1');

    $data = $this->method_call->Get_ResultSet('messages_id', $msgid, 'my_messages');
} else {
    $data = $this->method_call->Get_ResultSet('sent_messages_id', $msgid, 'qry_sent_message');
}

foreach ($data['result'] as $newrow) {
    
}
?>
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Read Mail

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
                            <li><a href="#" onclick="Load_Page('pages/messages', 'MainCtrl')"><i class="fa fa-inbox"></i> Inbox </a></li>
                            <li><a href="#" onclick="Load_Page('pages/sentMessages', 'MainCtrl')"><i class="fa fa-envelope-o"></i> Sent</a></li>
   
                        </ul>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
                <!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Mail</h3>
                        <div class="box-tools pull-right">
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?php echo $newrow->subject; ?></h3>
                            <h5>From: <?php echo $newrow->fromUser_email ?> <span class="mailbox-read-time pull-right">15 Feb. 2015 11:03 PM</span></h5>
                        </div><!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                        </div><!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <?php echo $newrow->message_description; ?>
                        </div><!-- /.mailbox-read-message -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <ul class="mailbox-attachments clearfix">
                            <li>
                                <span class="mailbox-attachment-icon"><i class="fa fa-files-o"></i></span>
                                <div class="mailbox-attachment-info">
                                    <a href="<?php if(isset($newrow->file_source)){ echo 'messages/' . $newrow->file_source;}else{    echo '#';} ?>" class="mailbox-attachment-name"><i class="fa fa-files-o"></i> <?php  if(isset($newrow->file_source)){echo $newrow->file_source;}else{    } ?></a>
                                    <span class="mailbox-attachment-size">

                                        <a href="<?php if(isset($newrow->file_source)){ echo 'messages/' . $newrow->file_source;}else{    echo '#';} ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                                    </span>
                                </div>
                            </li>



                        </ul>
                    </div><!-- /.box-footer -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                            <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                        </div>
                        <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                        <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                    </div><!-- /.box-footer -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->