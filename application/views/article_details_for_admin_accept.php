<?php
$this->method_call = & get_instance();
$data = $this->method_call->Get_ResultSet('article_id', $id, 'all_articles_details');

foreach ($data['result'] as $newrow) {
    $rows = $newrow;
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
            <img  class="img-circle span1" src="userimages/<?php echo $rows->photo ?>" width="100px" height="100px">
        </div>
        <div class="col-md-2">
            <dd class="createdby">
                <i class="fa fa-user"></i>
                <span data-toggle="tooltip" title="" data-original-title="Written by"><?php echo $rows->name ?></span> 
            </dd>

        </div>

        <div class="col-md-2">
            <dd class="createdby">
                <i class="fa fa-folder-open-o"></i>
                <a href="#" data-toggle="tooltip" title="" data-original-title="Article Category"><?php echo $rows->art_type ?></a> 
            </dd>

        </div>
        <div class="col-md-3">
            <dd class="published">
                <i class="fa fa-calendar-o"></i>
                <time datetime="2015-02-02T20:29:50+00:00" data-toggle="tooltip" title="Publish Date" data-original-title="Published Date">
                    <?php echo $newrow->published_date_time ?>
                </time>
            </dd>
        </div>
    </div>
</div>
<p></p>
<div class="row">

    <div class="col-md-12">
        <dd class="createdby">
            <i class="fa fa-envelope"></i>
            <a href="#" data-toggle="tooltip" title="" data-original-title="Email"><?php echo $rows->user_name ?></a> 
        </dd>
    </div>


</div>

<p></p>
<div class="row">
    <div class="col-md-12">
        <?php echo $rows->article_title; ?>
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-12">
        <p class="text-justify"><?php echo $rows->description; ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php
        $this->method_call = & get_instance();
        $data = $this->method_call->Get_ResultSet('article_id', $id, 'article_with_all_attachments');

        foreach ($data['result'] as $rows) {
            if ($rows->file_type == "image") {
                ?>
                <div class="img img-responsive">
                    <span class="row full-image">
                        <div class="itemImageBlock full-image">
                            <span class="itemImage">

                                <img src="articles/<?php echo $rows->source ?>" class="img img-responsive" alt="<?php echo $rows->article_title ?>"  />

                            </span>
                            <div class="clr"></div>
                        </div>
                    </span>
                </div>
                <?php
            }

            if ($rows->file_type == "video") {
                ?>
                <div class="itemImageBlock">
                    <span class="itemImage">
                        <div class="videoisplaying">
                            <video src="articles/<?php echo $rows->source ?>" alt="<?php echo $rows->article_title ?>"  controls />
                        </div>

                    </span>
                    <div class="clr"></div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-6">

        <a href="#"  id="<?php echo $rows->article_id; ?>"  data-dismiss="modal"  onclick="Update_Article_Status(this.id, '1')" class="btn btn-success fa fa-check-circle-o <?php
        if ($newrow->status == 1) {
            echo 'disabled';
        }
        ?>" > Publish </a> <i class="separator"></i> <a href="#" data-dismiss="modal" id="<?php echo $rows->article_id; ?>" class="btn btn-danger fa fa-times-circle-o <?php
           if ($newrow->status != 1) {
               echo 'disabled';
           }
           ?> " onclick="Update_Article_Status(this.id, '2')" > Block</a>


        <i class="separator"></i> <a href="#" data-dismiss="modal" id="<?php echo $rows->article_id; ?>" class="btn btn-danger fa fa-remove" onclick="Remove_article(<?php echo $rows->article_id; ?>)" > Remove</a>


    </div>
</div>

