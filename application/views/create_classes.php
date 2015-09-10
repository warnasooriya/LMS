<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create New Class
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New Class</li>
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
                                            Class Name
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="classname" id="classname" placeholder="Class Name" class="span4 form-control">
                                        </div>

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2">
                                            Class Location
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="location" id="location" placeholder="Class Location" class="span4 form-control">
                                        </div>

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary fa fa-plus " onclick="Create_class();
                                                    Load_Page('pages/classes_details', 'class_details')"> Create Class</a>
                                        </div>

                                    </div>
                                </div>
                            </section>
                        </form>
                        <p></p>
                        <section>
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="class_details">
                                        <div class="col-md-12">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive mailbox-messages">
                                                    <table class="table table-hover table-striped">
                                                        <tbody>
                                                            <?php
                                                            $this->method_call = & get_instance();
                                                            $data = $this->method_call->Get_Summery('clases');
                                                            foreach ($data['result'] as $row) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $row->class_description; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row->class_location; ?>
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