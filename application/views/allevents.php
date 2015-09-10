
<!-- start breadcrumbs -->
<section id="sp-breadcrumbs">
    <div class="container">
        <div class="row">
            <div id="sp-breadcrumb" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div class="sp-module ">
                        <div class="sp-module-content">
                            <div class="lan_page_title">
                                <span>All Event</span>
                            </div>
                            <div class="lan_breadcrumb">
                                <ol class="breadcrumb">
                                    <li><i class="fa fa-home"></i></li>
                                    <li><a href="front" class="pathway">Home</a></li>

                                    <li class="active">All Event</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end breadcrumbs -->
<!-- start main body -->
<section id="sp-main-body">
    <div class="row">
        <div id="sp-component" class="col-sm-12 col-md-12">
            <div class="sp-column">
                <div id="system-message-container">
                </div>
                <div id="sp-page-builder" class="sp-page-builder  page-10">
                    <div class="page-content">
                        <section id="all_event" class="sppb-section">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container" data-sppb-wow-duration="300ms">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <div id="sp-portfolio-module-130" class="sp-portfolio maxima">
                                                        <ul class="sp-portfolio-filter">
                                                            <li><a class="btn active" href="#" data-filter="*">Show All</a></li>
                                                            <li>
                                                                <a class="btn" href="#" data-filter=".charity">
                                                                    News
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="btn" href="#" data-filter=".business">
                                                                    Results
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="btn" href="#" data-filter=".event">
                                                                    Events
                                                                </a>
                                                            </li>
                                                        </ul>


                                                        <ul class="sp-portfolio-items">
                                                            <?php
                                                            $this->method_call = & get_instance();
                                                            $data = $this->method_call->Get_Summery('all_articles_details');
                                                            $i = 0;
                                                            $type="";
                                                            foreach ($data['result'] as $newrow) {
                                                                
                                                                $tt=$newrow->art_type;
                                                                
                                                                if($tt=="NEWS"){
                                                                    $type="charity";
                                                                }
                                                                if($tt=="EVENTS"){
                                                                   $type="event"; 
                                                                }
                                                                if($tt=="RESULTS"){
                                                                     $type="business";  
                                                                }
                                                                
                                                                ?>



                                                            <li class="sp-portfolio-item col-4 <?php echo $type; ?> visible">
                                                                    <div class="sp-portfolio-item-inner">
                                                                        <div class="sp-portfolio-thumb">
                                                                            <img alt="<?php echo $newrow->article_title; ?>" src="articles/<?php echo $newrow->source; ?>">
                                                                            <a class="sp-portfolio-preview" rel="lightbox" title="<?php echo $newrow->article_title; ?>" href="articles/<?php echo $newrow->source; ?>"></a>
                                                                            <a class="sp-portfolio-link" href="article_details/<?php echo $newrow->article_id; ?>"></a>
                                                                        </div>
                                                                        <div class="sp-portfolio-item-details">
                                                                            <a href="article_details/<?php echo $newrow->article_id; ?>">
                                                                                <h4><?php echo $newrow->article_title; ?></h4>
                                                                            </a>
                                                                            <a class="sppb-btn sppb-btn-primary" href="article_details/<?php echo $newrow->article_id; ?>">Find out more</a>
                                                                        </div>
                                                                        <div class="clear"></div>
                                                                    </div>
                                                                </li>

                                                                <?php
                                                            }
                                                            ?>



                                
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>