<?php

function Get_Text_Trim($text) {
    $ans = $text;
    if (strlen($text) > 100) {
        $text_su = substr($text, 0, 100);
        $pos = strrpos($text_su, " ");
        $otext = substr($text_su, 0, $pos);
        $ans = $otext;
    }
    return $ans;
}

$slide_images[] = "slide1.png";
$slide_images[] = "slide2.png";
$slide_images[] = "slide1.png";

$slide_images[] = "slide2.png";
$slide_images[] = "slide1.png";

$x = 0;
$this->method_call = & get_instance();
$data = $this->method_call->Get_Summery('Qry_Front_animated_articles_latest_5');
?>
<section id="sp-main-body">
    <div class="row">
        <div id="sp-component" class="col-sm-12 col-md-12">
            <div class="sp-column ">
                <div id="system-message-container">
                </div>
                <div id="sp-page-builder" class="sp-page-builder  page-7">
                    <div class="page-content">
                        <section class="sppb-section" style="background-color:#ffffff;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container" style="">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <!-- START REVOLUTION SLIDER 4.3.6 b3 fullwidth mode -->
                                                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:530px;">
                                                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:530px;height:530;">
                                                            <ul>
                                                                <!-- SLIDE  -->
                                                                <?php
                                                                foreach ($data['result'] as $newrow) {
                                                                    ?>
                                                                    <li data-transition="random-premium" data-slotamount="7" data-masterspeed="300" data-fstransition="notselectable1" data-fsmasterspeed="300" data-fsslotamount="7">
                                                                        <!-- MAIN IMAGE -->
                                                                        <img src="images/slide/<?php echo $slide_images[$x]; ?>" alt="slide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                                                        <!-- LAYERS -->
                                                                        <!-- LAYER NR. 1 -->
                                                                        <div class="tp-caption large_bold_white sfl tp-resizeme" data-x="0" data-y="150" data-speed="800" data-start="500" data-easing="Power3.easeInOut" data-splitin="words" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><?php echo strtoupper($newrow->article_title) ?>
                                                                        </div>
                                                                        <!-- LAYER NR. 2 -->
                                                                        <div class="tp-caption medium_light_white sfr tp-resizeme" data-x="0" data-y="230" data-speed="800" data-start="800" data-easing="Power3.easeInOut" data-splitin="words" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">
                                                                        </div>
                                                                        <!-- LAYER NR. 3 -->
                                                                        <div class="tp-caption large_bold_white sfl tp-resizeme" data-x="0" data-y="290" data-speed="1500" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><a href='article_details/<?php echo $newrow->article_id ?>' class='slide_button btn btn-primary'>Read More</a>
                                                                        </div>
                                                                    </li>
                                                                    <?php
                                                                    $x++;
                                                                }
                                                                ?>
                                                            </ul>
                                                            <div class="tp-bannertimer tp-bottom" style="display:none; visibility: hidden !important;"></div>
                                                        </div>
                                                    </div>
                                                    <!-- END REVOLUTION SLIDER -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                        $this->method_call = & get_instance();
                        $data = $this->method_call->Get_Summery('latest_upcomment_events');
                        $i = 0;
                        foreach ($data['result'] as $newrow) {
                            if ($i == 0) {
                                $row = $newrow;
                            }
                            $i++;
                        }
                        $data['result'];
                        ?>
                        <section id="lan_countdown" class="sppb-section">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-8">
                                        <div class="sppb-addon-container sppb-wow fadeInLeft">
                                            <div class="sppb-addon sppb-addon-text-block sppb-text-left ">
                                                <h3 class="sppb-addon-title"><?php echo $row->article_title; ?></h3>
                                                <div class="sppb-addon-content"> <?php echo $row->description; ?></div>
                                            </div>
                                            <div class="sppb-empty-space  clearfix" style="margin-bottom:30px;"></div>
                                            <a target="_blank" href="article_details/<?php echo $row->article_id; ?>" class="sppb-btn sppb-btn-info sppb-btn- " style="margin:0 15px 0 0;" role="button">Get Information</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                        <section class="sppb-section " style="padding:50px 0 0 0;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container sppb-wow fadeInUp">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <div id="k2ModuleBox112" class="k2ItemsBlock">
                                                        <div class="lan_accordian">
                                                            <ul>

                                                                <?php
                                                                $this->method_call = & get_instance();
                                                                $data = $this->method_call->Get_Summery('latest_news_3');

                                                                foreach ($data['result'] as $newrow) {
                                                                    ?>


                                                                    <li class="even">
                                                                        <div class="lan_acc_content">
                                                                            <!-- itemImage -->
                                                                            <a class="moduleItemImage lan_img lan_border" href="article_details/<?php echo $newrow->article_id ?>" title="Continue reading;">
                                                                                <img src="articles/<?php echo $newrow->source; ?>" alt="" style="height:250px" />
                                                                            </a>
                                                                            <div class="content">
                                                                                <!-- itemTitle -->
                                                                                <a class="moduleItemTitle" href="article_details/<?php echo $newrow->article_id ?>"><?php echo $newrow->article_title; ?></a>
                                                                                <!-- itemDateCreated -->
                                                                                <span class="moduleItemDateCreated"><?php echo $newrow->published_date_time; ?></span>
                                                                                <!-- itemCategory -->
                                                                                |
                                                                                <a class="moduleItemCategory" href="6-charity.html"><?php echo $newrow->username ?></a>
                                                                                <!-- itemIntroText -->
                                                                                <p class="text-justify">
                                                                                    <?php echo strip_tags(Get_Text_Trim($newrow->description)); ?>
                                                                                </p>

                                                                                <!-- itemReadMore -->
                                                                                <a class="moduleItemReadMore btn btn-primary" href="article_details/<?php echo $newrow->article_id ?>">
                                                                                    Read More					
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <?php
                                                                }
                                                                ?>



                                                                <li class="clearList"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="sppb-section " style="padding:30px 0 0 0;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container sppb-wow fadeInRight">
                                            <div class="sppb-addon sppb-addon-text-block sppb-text-left lan_title">
                                                <h3 class="sppb-addon-title">Latest News</h3>
                                                <div class="sppb-addon-content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="sppb-section" style="padding:55px 0 35px 0;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-8">
                                        <div class="sppb-addon-container sppb-wow fadeInLeft">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <div class="module">
                                                        <div class="lan_vertical_timeline">
                                                            <div class="lan_vertical_left">
                                                                <ul class="nav nav-tabs" role="tablist" id="myTab">
                                                                    <?php
                                                                    $this->method_call = & get_instance();
                                                                    $data = $this->method_call->Get_Summery('qry_latest_news_5');
                                                                    $active = 0;
                                                                    foreach ($data['result'] as $newrow) {
                                                                        ?>
                                                                        <li role="presentation" class="<?php
                                                                        if ($active == 0) {
                                                                            echo 'active';
                                                                        } else {
                                                                            echo 'cbp_tmicon';
                                                                        }
                                                                        ?>">
                                                                            <a href="#<?php echo $newrow->article_id ?>" aria-controls="<?php echo $newrow->article_id ?>" role="tab" data-toggle="tab">
                                                                                <ul class="cbp_tmtimeline">
                                                                                    <li>
                                                                                        <div class="cbp_tmicon"></div>
                                                                                        <div class="cbp_tmlabel">
                                                                                            <h3><?php echo $newrow->article_title ?></h3>
                                                                                            <p class="text-justify"><?php echo strip_tags(Get_Text_Trim($newrow->description)); ?>.</p>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </a>
                                                                        </li>

                                                                        <?php
                                                                        $active = $active + 1;
                                                                    }
                                                                    ?>




                                                                </ul>
                                                            </div>
                                                            <div class="lan_vertical_right tab-content">

                                                                <?php
                                                                $this->method_call = & get_instance();
                                                                $data = $this->method_call->Get_Summery('qry_latest_news_5');
                                                                $active = 0;

                                                                foreach ($data['result'] as $newrow) {
                                                                    if ($active == 0) {
                                                                        $a = "active";
                                                                    }
                                                                    ?>
                                                                    <div role="tabpanel" class="tab-pane <?php echo $a; ?>" id="<?php echo $newrow->article_id; ?>">
                                                                        <div class="tab_img">
                                                                            <img src="articles/<?php echo $newrow->source; ?>" alt="<?php echo $newrow->article_title; ?>" />
                                                                        </div>
                                                                        <div class="tab_contain">
                                                                            <h3><?php echo $newrow->article_title; ?></h3>
                                                                            <p><?php echo strip_tags(Get_Text_Trim($newrow->description)) . '....'; ?></p>
                                                                            <a class="btn btn-primary" href="article_details/<?php echo $newrow->article_id ?>">Read More</a>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $a = "";
                                                                    $active++;
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sppb-col-sm-4">
                                        <div class="sppb-addon-containerlatest_news sppb-wow fadeInUp">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <div id="ns2-110" class="nssp2 ns2-110">
                                                        <div class="ns2-wrap">
                                                            <div id="ns2-art-wrap110" class="ns2-art-wrap nssp2-slide nssp2-fade nssp2-default ">
                                                                <div class="ns2-art-pages nss2-inner">
                                                                    <div class="ns2-page item active">
                                                                        <div class="ns2-page-inner">

                                                                            <?php
                                                                            $this->method_call = & get_instance();
                                                                            $data = $this->method_call->Get_Summery('qry_latest_events_5');
                                                                            $a = 1;
                                                                            $x = 0;
                                                                            $odd = "ns2-odd";
                                                                            foreach ($data['result'] as $newrow) {

                                                                                if ($a % 2 == 0) {
                                                                                    $odd = "ns2-even";
                                                                                }

                                                                                $date = strtotime($newrow->event_date);
                                                                                $dd = date('d', $date);
                                                                                $mm = date('M', $date);
                                                                                $yy = date('Y', $date);
                                                                                ?>


                                                                                <div class="ns2-row  <?php if ($x == 0) echo 'ns2-first'; ?>  <?php echo $odd; ?>">
                                                                                    <div class="ns2-row-inner">
                                                                                        <div class="ns2-column flt-left col-1">
                                                                                            <div style="padding:3px 3px 3px 3px">
                                                                                                <div class="ns2-inner">
                                                                                                    <div class="ns2-date-blog">
                                                                                                        <span class="ns2_date_day"><?php echo $dd; ?></span>
                                                                                                        <div class="ns2_date_month_year"><span class="ns2_date_month"><?php echo $mm; ?></span><span class="ns2_date_year"><?php echo $yy; ?></span></div>
                                                                                                    </div>
                                                                                                    <h4 class="ns2-title">
                                                                                                        <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                            <?php echo $newrow->article_title; ?>
                                                                                                        </a>
                                                                                                    </h4>
                                                                                                    <div class="ns2-tools">
                                                                                                    </div>
                                                                                                    <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                        <img class="ns2-image" style="float:left;margin:0 10px 0 0" src="articles/<?php echo $newrow->source ?>" alt="<?php echo $newrow->article_title; ?>" width="75px" height="75px" title="<?php echo $newrow->article_title; ?>" />
                                                                                                    </a>
                                                                                                    <p class="ns2-introtext"><?php echo strip_tags(Get_Text_Trim($newrow->description)); ?></p>
                                                                                                    <div class="ns2-social">
                                                                                                    </div>
                                                                                                    <div class="clear"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                    <div class="clear"></div>
                                                                                </div>

                                                                                <?php
                                                                                $x++;
                                                                            }
                                                                            ?>


                                                                            <div class="clear"></div>
                                                                        </div>
                                                                        <!--end ns2-page-inner-->
                                                                    </div>
                                                                    <div class="ns2-page item">
                                                                        <div class="ns2-page-inner">
                                                                            <?php
                                                                            $this->method_call = & get_instance();
                                                                            $data = $this->method_call->Get_Summery('qry_latest_news_6_10');
                                                                            $a = 1;
                                                                            $x = 0;
                                                                            $odd = "ns2-odd";
                                                                            foreach ($data['result'] as $newrow) {

                                                                                if ($a % 2 == 0) {
                                                                                    $odd = "ns2-even";
                                                                                }

                                                                                $date = strtotime($newrow->event_date);
                                                                                $dd = date('d', $date);
                                                                                $mm = date('M', $date);
                                                                                $yy = date('Y', $date);
                                                                                ?>



                                                                                <div class="ns2-row <?php if ($x == 0) echo 'ns2-first'; ?>  <?php echo $odd; ?>">
                                                                                    <div class="ns2-row-inner">
                                                                                        <div class="ns2-column flt-left col-1">
                                                                                            <div style="padding:3px 3px 3px 3px">
                                                                                                <div class="ns2-inner">
                                                                                                    <div class="ns2-date-blog">
                                                                                                        <span class="ns2_date_day"><?php echo $dd; ?></span>
                                                                                                        <div class="ns2_date_month_year"><span class="ns2_date_month"><?php echo $mm; ?></span><span class="ns2_date_year"><?php echo $yy; ?></span></div>
                                                                                                    </div>
                                                                                                    <h4 class="ns2-title">
                                                                                                        <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                            <?php echo $newrow->article_title; ?>
                                                                                                        </a>
                                                                                                    </h4>
                                                                                                    <div class="ns2-tools">
                                                                                                    </div>
                                                                                                    <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                        <img class="ns2-image" style="float:left;margin:0 10px 0 0" src="articles/<?php echo $newrow->source ?>" width="75px" height="75px" alt="<?php echo $newrow->article_title; ?>" title="<?php echo $newrow->article_title; ?>" />
                                                                                                    </a>
                                                                                                    <p class="ns2-introtext text-justify"><?php echo strip_tags(Get_Text_Trim($newrow->description)); ?></p>
                                                                                                    <div class="ns2-social">
                                                                                                    </div>
                                                                                                    <div class="clear"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="clear"></div>
                                                                                    </div>
                                                                                    <div class="clear"></div>
                                                                                </div>

                                                                                <?php
                                                                                $x++;
                                                                            }
                                                                            ?>



                                                                            <div class="clear"></div>
                                                                        </div>
                                                                        <!--end ns2-page-inner-->
                                                                    </div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <div class="ns2-art-controllers">
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <!--End article layout-->
                                                            <!--Links Layout-->
                                                            <!--End Links Layout-->
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>




                        <section class="sppb-section " style="padding:30px 0 0 0;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container sppb-wow fadeInRight">
                                            <div class="sppb-addon sppb-addon-text-block sppb-text-left lan_title">
                                                <h3 class="sppb-addon-title">Latest Articles</h3>
                                                <div class="sppb-addon-content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="lan_events" class="sppb-section" style="padding:45px 0 55px 0;">
                            <div class="sppb-container">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-12">
                                        <div class="sppb-addon-container sppb-wow fadeInUp">
                                            <div class="sppb-addon sppb-addon-module ">
                                                <div class="sppb-addon-content">
                                                    <div id="ns2-123" class="nssp2 ns2-123">
                                                        <div class="ns2-wrap">
                                                            <div id="ns2-art-wrap123" class="ns2-art-wrap nssp2-slide nssp2-default ">
                                                                <div class="ns2-art-pages nss2-inner">

                                                                    <div class="ns2-page item active">
                                                                        <div class="ns2-page-inner">
                                                                            <div class="ns2-row ns2-first ns2-odd">
                                                                                <div class="ns2-row-inner">


                                                                                    <?php
                                                                                    $this->method_call = & get_instance();
                                                                                    $data = $this->method_call->Get_Summery('latest_article_without_news_and_events_8');
                                                                                    $a = 1;
                                                                                    $x = 0;
                                                                                    $odd = "ns2-odd";
                                                                                    foreach ($data['result'] as $newrow) {

                                                                                        if ($a % 2 == 0) {
                                                                                            $odd = "ns2-even";
                                                                                        }
                                                                                        if ($x < 4) {
                                                                                            ?>

                                                                                            <div class="ns2-column flt-left col-4">
                                                                                                <div style="padding:0 15px">
                                                                                                    <div class="ns2-inner">
                                                                                                        <div class="img img-responsive">
                                                                                                        <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                            <img class="ns2-image" style="float:left;margin:0 0 20px 0;width:100% ;height: 180px;" src="articles/<?php echo $newrow->source ?>" alt="<?php echo $newrow->article_title; ?>" title="<?php echo $newrow->article_title; ?>" />
                                                                                                        </a>
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <h4 class="ns2-title">
                                                                                                                <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                                    <p><?php echo $newrow->article_title; ?></p>
                                                                                                                </a>
                                                                                                            </h4>
                                                                                                        </div>

                                                                                                        <div class="ns2-tools">
                                                                                                            <div class="ns2-created">
                                                                                                                <?php echo $newrow->published_date_time; ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <p class="ns2-introtext text-justify" style="height:80px;"><?php echo strip_tags(Get_Text_Trim($newrow->description)); ?></p>
                                                                                                        <div class="ns2-social">
                                                                                                        </div>
                                                                                                        <div class="ns2-links">
                                                                                                            <a class="sppb-btn sppb-btn-primary ns2-readmore" href="article_details/<?php echo $newrow->article_id ?>"><span>Read More</span></a>
                                                                                                        </div>
                                                                                                        <div class="clear"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <?php
                                                                                        }
                                                                                        $x++;
                                                                                    }
                                                                                    ?>

                                                                                    <div class="clear"></div>
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>
                                                                        <!--end ns2-page-inner-->
                                                                    </div>







                                                                    <div class="ns2-page item">
                                                                        <div class="ns2-page-inner">


                                                                            <div class="ns2-row ns2-first ns2-odd">
                                                                                <div class="ns2-row-inner">

                                                                                    <?php
                                                                                    $this->method_call = & get_instance();
                                                                                    $data = $this->method_call->Get_Summery('latest_article_without_news_and_events_8');
                                                                                    $a = 1;
                                                                                    $x = 0;
                                                                                    $odd = "ns2-odd";
                                                                                    foreach ($data['result'] as $newrow) {

                                                                                        if ($a % 2 == 0) {
                                                                                            $odd = "ns2-even";
                                                                                        }
                                                                                        if ($x >= 4) {
                                                                                            ?>


                                                                                            <div class="ns2-column flt-left col-4">
                                                                                                <div style="padding:0 15px">
                                                                                                    <div class="ns2-inner">
                                                                                                        <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                            <img class="ns2-image" style="float:left;margin:0 0 20px 0;width:100% ;height: 180px;" src="articles/<?php echo $newrow->source ?>"  alt="<?php echo $newrow->article_title; ?>" title="<?php echo $newrow->article_title; ?>" />
                                                                                                        </a>
                                                                                                        <div class="ns2-tools">
                                                                                                        <h4 class="ns2-title text-justify">
                                                                                                            <a href="article_details/<?php echo $newrow->article_id ?>">
                                                                                                                <p class="text-justify">  <?php echo $newrow->article_title; ?> </p>
                                                                                                            </a>
                                                                                                        </h4>
                                                                                                        </div>
                                                                                                        <div class="ns2-tools">
                                                                                                            <div class="ns2-created">
                                                                                                                <?php echo $newrow->published_date_time; ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <p class="ns2-introtext text-justify"><?php echo strip_tags(Get_Text_Trim($newrow->description)); ?></p>
                                                                                                        <div class="ns2-social">
                                                                                                        </div>
                                                                                                        <div class="ns2-links">
                                                                                                            <a class="sppb-btn sppb-btn-primary ns2-readmore" href="article_details/<?php echo $newrow->article_id ?>"><span>Read More</span></a>
                                                                                                        </div>
                                                                                                        <div class="clear"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <?php
                                                                                        }
                                                                                        $x++;
                                                                                    }
                                                                                    ?>

                                                                                    <div class="clear"></div>
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>
                                                                        <!--end ns2-page-inner-->
                                                                    </div>



                                                                </div>
                                                                <div class="clear"></div>
                                                                <div class="ns2-art-controllers">
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <!--End article layout-->
                                                            <!--Links Layout-->
                                                            <!--End Links Layout-->
                                                            <div class="clear"></div>
                                                        </div>
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
<!-- end main body -->
<!-- start bottom area -->
