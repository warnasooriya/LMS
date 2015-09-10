<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create New Admin
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New Admin</li>
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
                                            Select User
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="user" id="user">
                                                <?php
                                                $this->method_call = & get_instance();
                                                $data = $this->method_call->Get_Summery('qry_support_add_new_admin');
                                                foreach ($data['result'] as $rows) {
                                                    ?>
                                                <option value="<?php echo $rows->user_id ?>"><?php echo $rows->name . ' - ' . $rows->user_name.' - '.$rows->Description; ?>  </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2"></div>
                                            <div class="col-md-2">
                                                <input type="radio"  name="type" value="1" id="admin" />
                                                <label for="admin">Admin</label>
                                                </div>
                                          <div class="col-md-2">
                                                <input type="radio"  name="type" value="2" id="Teacher" />
                                                <label for="Teacher">Teacher</label>
                                          </div>
                                       

                                    </div>
                                </div>
                                <p></p>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-success" onclick="Update_User_Types(document.getElementById('user').value);">Change User Type</a>

                                        </div>

                                    </div>
                                </div>
                            </section>
                        </form>
                        <p></p>


                        <!-- /.box-tools -->
                    </div><!-- /.box-header -->


                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->



    </section><!-- /.content -->



</div>