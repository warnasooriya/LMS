<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage  Article Comments

        </h1>
        <ol class="breadcrumb">
            <li><a href="#" onclick="Load_Page('usermanage', 'MainCtrl')"><i class="fa fa-dashboard"></i> C Panel</a></li>
            <li class="active">Manage  Article Comments</li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">COMMENT MANAGEMENT
                        <div id="progress"></div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive" >
                                    <table class="table-primary table-hover table-thead-simple table-vertical-center " width="100%" id="users">

                                        <tbody>
                                            <?php
                                            $this->method_call = & get_instance();
                                            $data = $this->method_call->Get_Summery('qry_comment_details_for_admin');
                                            foreach ($data['result'] as $newrow) {
                                                ?>

                                                <tr >


                                                    <td><li class="comment fa fa-comments-o fa-3x"></li></td>
                                            <td><?php echo $newrow->article_title; ?></td>

                                            <td>
                                                <?php echo $newrow->commenter_name ?>
                                            </td>
                                            <td><?php echo $newrow->commenter_email ?></td>
                                            <td>

                                                <?php echo $newrow->comment ?></td>


                                            <td><span class="label label-info"><i class="fa fa-calendar-o ">  </i>  <?php echo $newrow->comment_date ?> </span></td>

                                            <td align="right"><a href="#"  id="<?php echo $newrow->comments_id; ?>"  onclick="Update_Comment_Status(this.id, '1')" class="btn btn-success fa fa-check-circle-o <?php
                                                if ($newrow->comment_status == 1) {
                                                    echo 'disabled';
                                                }
                                                ?>" > Activate </a> <i class="separator"></i> <a href="#" id="<?php echo $newrow->comments_id; ?>" class="btn btn-danger fa fa-times-circle-o <?php
                                                                 if ($newrow->comment_status != 1) {
                                                                     echo 'disabled';
                                                                 }
                                                                 ?> " onclick="Update_Comment_Status(this.id, '2')" > Reject</a>

                                                <a href="#" id="<?php echo $newrow->comments_id; ?>" class="btn btn-danger fa fa-remove <?php
                                                  
                                                   ?> " onclick="Remove_comment(this.id)" > Remove</a>

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





</div><!-- /.content-wrapper -->




