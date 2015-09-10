<link href="uploads/uploadfile.css" rel="stylesheet">
<div class="content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Publish Articles
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Publish Articles</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content ">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <form method="post" enctype="multipart/form-data" action="save_article/save">
                            <p></p>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-lg-1">Article Type</div>
                                    <div class="col-lg-5"><select class="form-control " name="articleType" id="articleType" required >


                                            <?php
                                            $this->method_call = & get_instance();
                                            $data = $this->method_call->Get_Summery('article_type');
                                            foreach ($data['result'] as $row) {
                                                ?>
                                                <option value="<?php echo $row->article_type_id ?>"><?php echo $row->Description ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select></div>
                                </div>
                            </div>

                            
                         

                            <p></p>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1">Title</div>
                                    <div class="col-lg-5"><input type="text" name="title" id="title" class="form-control span6" required></div>

                                </div>
                            </div>
                            <p></p>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1">Description</div>
                                    <div class="col-lg-11"> <textarea name="description" id="description" class="textarea" placeholder="Place Article Description here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" onclick="Load_editText()" required>
                            
                                        </textarea></div>

                                </div>
                            </div>
                            <p></p>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1">Image</div>
                                    <div class="col-lg-2"> 
                                        <input type="file" class="fileupload" required id="img" name="img"  accept="image/*"  onchange="showMyImage(this, 'articlaImage')">
                                    </div>


                                </div>
                            </div>
                            <p></p>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-3">
                                        <div class="thumbnail span3">
                                            <img src="images/placeholder.png" id="articlaImage">
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <p></p>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1">Video</div>
                                    <div class="col-lg-2"> 
                                        <input type="file" class="fileupload" id="video" name="video"  accept="video/*"  onchange="showMyVideo(this, 'articleVideo')">
                                    </div>


                                </div>
                            </div>
                            <p></p>
                               <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1">Event Date & Time</div>
                                    <div class="col-lg-2"> 
                                        <input type="date" class="date form-control" id="eventdate" name="eventdate"  >
                                    </div>
                                    <div class="col-lg-2"> 
                                        <input type="time" class="time form-control" id="eventtime" name="eventtime"  >
                                    </div>


                                </div>
                            </div>
                       
                            <p></p>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-2"> 
                                        <input type="submit" class="btn btn-success fa fa-cloud-upload" value="Publish Article">
                                    </div>


                                </div>
                            </div>
                        </form>


                        <!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">

                        <div class="table-responsive mailbox-messages">

                            <div class="box-tools pull-left">
                                <div class="has-feedback">




                                </div>
                            </div>



                            <!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">

                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->



        </div>


        <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
