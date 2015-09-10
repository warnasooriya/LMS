<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Article

        </h1>
        <ol class="breadcrumb">
            <li><a href="#" onclick="Load_Page('usermanage', 'MainCtrl')"><i class="fa fa-dashboard"></i> C Panel</a></li>
            <li class="active">Manage Article</li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">ARTICLE MANAGEMENT</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive" >
                                    <table class="table-primary table-hover table-thead-simple table-vertical-center " width="100%" id="users">

                                        <tbody>
                                            <?php
                                            $this->method_call = & get_instance();
                                            $data = $this->method_call->Get_Summery('qry_article_for_manage');
                                            foreach ($data['result'] as $newrow) {
                                                $p = $newrow->photo;
                                                if ($p == null) {
                                                    $photo = "dist/img/user1-128x128.jpg";
                                                } else {
                                                    $photo = "userimages/" . $p;
                                                }
                                                ?>

                                                <tr data-toggle="modal" data-target="#myModal" onclick="Load_modal_for_article_details_admin(<?php echo $newrow->article_id ?>)">


                                                    <td><img src="<?php echo $photo; ?>" class="img-circle" alt="User Image" width="60px" height="60px"></td>
                                                    <td><?php echo $newrow->name; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($newrow->status == 1) {
                                                            echo '<span class="label label-success"><i class="fa fa-check-circle-o"></i> Active</span>';
                                                        } else if ($newrow->status == 0) {
                                                            echo '<span class="label label-warning"><i class="fa fa-check-circle-o"></i> Pending</span>';
                                                        } else if ($newrow->status == 2) {
                                                            echo '<span class="label label-danger"><i class="fa fa-check-circle-o"></i> Blocked</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $newrow->user_name ?>
                                                    </td>
                                                    <td><?php echo $newrow->article_title ?></td>
                                                    <td><span class="label label-success"><i class="fa fa-book   ">  </i> <?php echo $newrow->articleType ?></span> </td>
                                                    <td></td>
                                                    <td><span class="label label-info"><i class="fa fa-calendar-o ">  </i>  <?php echo $newrow->published_date_time ?> </span></td>

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




    <!-- Modal -->

    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Article Details</h4>
                </div>
                <div class="modal-body">
                    <div id="modal_data">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>





</div><!-- /.content-wrapper -->




