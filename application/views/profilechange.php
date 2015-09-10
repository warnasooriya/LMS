<?php
$data = $this->session->all_userdata();
$username = $data['email'];

$this->method_call = & get_instance();
$userid = $this->method_call->Get_Field_value_Given_Field_Noprint('users', 'user_id', 'user_name', $username);
$data = $this->method_call->Get_ResultSet('user_id', $userid, 'qry_user_details');

foreach ($data['result'] as $newrow) {
    $row = $newrow;
}
?>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo 'userimages/' . $newrow->photo ?>" alt="User profile picture">
                    <h5 class="profile-username text-center small"><?php echo $row->name  ?></h5>
                    <p class="text-muted text-center"><?php echo $row->class_description;?></p>
                    <p class="text-muted text-center"><?php echo $row->Description; ?></p>



                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i>  </strong>
                    <p class="text-muted">
                        <?php echo $row->info; ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                    <p class="text-muted"><?php echo $row->address; ?></p>

                    <hr>

                    <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                    <p>
                        <?php echo $row->user_name; ?>
                    </p>

                    <hr>

                    <strong><i class="fa fa-phone margin-r-5"></i> Contact Number</strong>
                    <p><?php echo $row->contact_no; ?></p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab" >Edit Profile</a></li>

                </ul>
                <div class="tab-content">




                    <form class="form-horizontal" action="update_profile" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="usertype" id="usertype" value="<?php echo $row->user_type_id; ?>">
                        <input type="hidden" name="stteacherid" id="stteacherid" value="<?php echo $row->stTeacherId; ?>">
                             <input type="hidden" name="uid" id="uid" value="<?php echo $row->user_id; ?>">
                             <input type="hidden" name="user_img" id="user_img" value="<?php echo $row->photo ?>"   >
                        <?php
                        if ($row->Description == "Students") {
                            ?>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" id="class">
                                        
                                        <option value="<?php echo $row->class_id ?>"><?php echo $row->class_description ?> </option>
                                        <?php
                                        $d = $this->method_call->Get_Summery('clases');
                                        foreach ($d['result'] as $newrow) {
                                            ?>
                                        <option value="<?php echo $newrow->class_id ?>"><?php echo $newrow->class_description ?> </option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" placeholder=" Student Name" class="span8 form-control" required value="<?php echo $row->name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Email Address</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" placeholder=" Email Address" class="span8 email form-control" required disabled value="<?php echo $row->user_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Contact Number</label>
                                <div class="col-sm-10">
                                    <input type="text" id="contactno" name="contactno" class="input-large span2 form-control" placeholder="+9612345678" required value="<?php echo $row->contact_no; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea  name="address" id="address" placeholder="Address" class="span8 form-control" ><?php echo $row->address; ?></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">About Me</label>
                                <div class="col-sm-10">
                                    <textarea class="span8 form-control" name="info" id="info" placeholder="Description About Student"><?php echo $row->info; ?></textarea>

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-10">
                                    <div class="span4">
                                        <input type="file" class="fileupload" id="photo" name="photo"  accept="image/*" class="form-control"   onchange="showMyImage(this, 'userphoto')" >
                                    </div>
                                    <div class="span2">
                                        <div class="thumbnail">
                                            <img src="<?php echo 'userimages/' . $row->photo; ?>" id="userphoto">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </form>


                </div><!-- /.tab-pane -->


                <!-- /.tab-content -->
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div><!-- /.row -->

</section>