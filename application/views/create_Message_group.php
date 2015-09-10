<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Message Groups
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Message Groups</li>
        </ol>
    </section>
    <p></p>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <p></p>
                        <form>

                            <section>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="progress"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2">
                                            Group Name
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="mgroup" id="mgroup" placeholder="Group Title" class="span4 form-control">
                                        </div>

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary fa fa-plus " onclick="Create_Group();
                                                    Load_Page('pages/nmessage_groups', 'msg_group_details')"> Create Group</a>
                                        </div>

                                    </div>
                                </div>
                            </section>
                        </form>
                        <p></p>
                        <section>
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="msg_group_details">
                                        <div class="col-md-12">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped">
                                                        <tbody>
                                                            <?php
                                                            $this->method_call = & get_instance();
                                                            $data = $this->method_call->Get_Summery('message_groups');
                                                            foreach ($data['result'] as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $row->group_title; ?>
                                                                    </td>
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

                    <!-- /.box-tools -->
                </div><!-- /.box-header -->


            </div><!-- /. box -->
        </div><!-- /.col -->
</div><!-- /.row -->



</section><!-- /.content -->



</div>