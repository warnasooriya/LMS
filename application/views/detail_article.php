<?php
$this->method_call = & get_instance();
$data = $this->method_call->Get_ResultSet('article_id', $id, 'article');

foreach ($data['result'] as $newrow) {
    $row = $newrow;
}
?>
<section id="sp-page-title">
    <div class="row">
        <div id="sp-title" class="col-sm-12 col-md-12">
            <div class="sp-column "></div>
        </div>
    </div>
</section>
<section id="sp-breadcrumbs">
    <div class="container">
        <div class="row">
            <div id="sp-breadcrumb" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div class="sp-module ">
                        <div class="sp-module-content">
                            <div class="lan_page_title">
                            </div>
                            <div class="lan_breadcrumb">
                                <ol class="breadcrumb">
                                    <li><a href="../front"><i class="fa fa-home">Home</i></a></li>
                                    <li class="active">Article Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="sp-main-body">
    <div class="container">





        <div class="row">
            <div id="sp-component" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div id="system-message-container">
                    </div>
                    <!-- Start K2 Item Layout -->
                    <span id="startOfPageId7"></span>
                    <div id="k2Container" class="lan_event_details itemView">
                        <!-- Plugins: BeforeDisplay -->
                        <!-- K2 Plugins: K2BeforeDisplay -->
                        <div class="itemHeader">
                            <!-- Item category -->


                        </div>
                        <!-- Plugins: AfterDisplayTitle -->
                        <!-- K2 Plugins: K2AfterDisplayTitle -->
                        <p></p><br>


                        <!-- Plugins: BeforeDisplayContent -->
                        <!-- K2 Plugins: K2BeforeDisplayContent -->
                        <!-- Item Image -->
                        <div class="row">
                            <div class="col-md-12">


                                <?php
                                $this->method_call = & get_instance();
                                $data = $this->method_call->Get_ResultSet('article_id', $id, 'article_with_all_attachments');

                                foreach ($data['result'] as $rows) {
                                    if ($rows->file_type == "image") {
                                        ?>
                                        <span class="row full-image">
                                            <div class="itemImageBlock full-image">
                                                <span class="itemImage">
                                                    <img src="../articles/<?php echo $rows->source ?>" alt="<?php echo $rows->article_title ?>"  />
                                                </span>
                                                <div class="clr"></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                    }

                                    if ($rows->file_type == "video") {
                                        ?>
                                        <p></p><br>
                                        <div class="itemImageBlock">
                                            <span class="itemImage">
                                                <video src="../articles/<?php echo $rows->source ?>" alt="<?php echo $rows->article_title ?>"  controls />
                                            </span>
                                            <div class="clr"></div>
                                        </div>
                                        <p></p><br>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <p></p><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="entry-header has-post-format">
                                    <span class="post-format"><i class="fa fa-thumb-tack"></i></span>
                                    <dl class="article-info">
                                        <dt class="article-info-term"></dt>
                                        <dd class="createdby">
                                            <i class="fa fa-user"></i>
                                            <span data-toggle="tooltip" title="" data-original-title="Written by"><?php echo $rows->name ?></span> 
                                        </dd>
                                        <dd class="category-name">
                                            <i class="fa fa-folder-open-o"></i>
                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Article Category"><?php echo $rows->articletype ?></a> 
                                        </dd>
                                        <dd class="published">
                                            <i class="fa fa-calendar-o"></i>
                                            <time datetime="2015-02-02T20:29:50+00:00" data-toggle="tooltip" title="Publish Date" data-original-title="Published Date">
                                                <?php echo $newrow->published_date_time ?>
                                            </time>
                                        </dd>
                                     
                                        <dd class="hits">
                                            <span class="fa fa-comments-o"data-toggle="tooltip" title="comments" data-original-title="Comments"></span>
                                            <?php
                                            $this->method_call = & get_instance();
                                            $d = $this->method_call->Get_ResultSet('article_id', $id, 'qry_number_of_comments');

                                            foreach ($d['result'] as $nr) {
                                                $comments = $nr->comments;
                                                echo $comments;
                                                }
                                                
                                                ?>
                                            
                                                
                                            </dd>

                                        </dl>
                                        <h2>
                                            <?php echo $newrow->article_title ?>					
                                        </h2>
                                    </div>
                                </div>
                            </div>


                            <!-- Item introtext -->

                            <!-- Item fulltext -->
                            <div class="itemFullText">
                                <p class="text-justify">
                                    <?php echo $newrow->description ?>
                                </p>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <strong>Leave a Comment</strong> <div id="progress" class="pull-right col-md-6" ></div>
                                            </div>
                                            <p></p>
                                            <div class="panel-body">
                                                <p></p>
                                                <div class="input-group col-md-6">
                                                    <span class="input-group-addon" id="basic-addon1"><li class="fa fa-envelope"></li></span>
                                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                                    <input type="email" id="email" name="email" class="form-control span5" placeholder="Email" >

                                                </div>
                                                <p></p>
                                                <div class="input-group col-md-6">
                                                    <span class="input-group-addon" id="basic-addon1"><li class="fa fa-user"></li></span>
                                                    <input type="text" name="name" id="name" class="form-control span5" placeholder="Name" >

                                                </div>
                                                <p></p>
                                                <div class="input-group ">
                                                    <span class="input-group-addon" id="basic-addon1"><li class="fa fa-comments-o"></li></span>
                                                    <textarea class="form-control span5" placeholder="Write a Comment" name="comment" id="comment"></textarea>

                                                </div>
                                                <p></p>

                                            </div>
                                            <div class="panel-footer">
                                                <a class="btn  btn-default fa fa-comments-o" onclick="Create_Comment();"> Post Comment</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <p></p>
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Comments</strong></div>
                                <div class="panel-body">
                                    <?php
                                    $this->method_call = & get_instance();
                                    $data = $this->method_call->Get_ResultSet('article_id', $id, 'qry_comments');

                                    foreach ($data['result'] as $row) {
                                        ?>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <dl class="article-info">
                                                        <dt class="article-info-term"></dt>
                                                        <dd class="createdby">
                                                            <i class="fa fa-user"></i>
                                                            <span data-toggle="tooltip" title="" data-original-title="Comment by"><?php echo $row->commenter_name; ?> </span> 
                                                        </dd>

                                                        <dd class="published">
                                                            <i class="fa fa-calendar-o"></i>
                                                            <time datetime="2015-02-02T20:29:50+00:00" data-toggle="tooltip" title="" data-original-title="Comment Date">
                                                                <?php echo $row->comment_date; ?>                                  </time>
                                                        </dd>


                                                    </dl>
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="row">
                                                <div class="col-md-12"><?php echo $row->comment; ?>      </div>
                                            </div>
                                            <p></p>

                                            <hr>
                                        </div>

                                        <?php
                                    }
                                    ?>



                            </div>
                        </div>



                        <div>




                            <div class="clr"></div>
                            <!-- Plugins: AfterDisplayContent -->
                            <!-- K2 Plugins: K2AfterDisplayContent -->
                            <div class="clr"></div>
                        </div>
                        <div class="itemLinks">
                            <div class="clr">


                            </div>
                        </div>
                        <p></p>
                        <div class="clr"></div>
                        <!-- Plugins: AfterDisplay -->
                        <!-- K2 Plugins: K2AfterDisplay -->
                        <div class="itemBackToTop">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <!-- End K2 Item Layout -->
                </div>
            </div>
        </div>
    </div>
</section>

