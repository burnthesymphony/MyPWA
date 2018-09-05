<?php include "header.php"; ?>
<ul class="nav main-menu">
    <li class="active"><a href="#">Terkini</a></li>
    <li><a href="<?php echo WAP.'/home/mobile_popular'?>">Terpopuler</a></li>
    <li><a href="<?php echo WAP.'/kanal/inpictures'?>">Inpictures</a></li>
    <li><a href="<?php echo WAP.'/kanal/video'?>">TV</a></li>

</ul>
      

       <div  class="row apps-box" stylexx="width: 320px; height: 50px;text-align: center; margin: 0px auto; position: inherit !important;background: none !important"><center>
                <?php 

            echo ' <div class="row" id="topframe">';
            echo dfp_mobile('home','home','topframe')
             ?>
      
             <div class="apps-close" ><a class="close-apps" ><img src="<?php echo CDN.'/files/images/close-image.png'?>" > </a></div>
 
            <?php 
            echo '</div>';
          
         ?>
         </center>
</div>   
<main>
    <div class="ads-top"> <?php //dfp_mobile($page_type,'home','topline');?></div>
    <div class="wrap-headline">
        <div class="headline">   
            <!-- Swiper Headline --> 
            <div class="swiper-container">
                    <div class="swiper-wrapper ">  
                          <?php   
                          $a=1;
                          foreach($headline as $i => $hl):   ?>
                            <div class="swiper-slide <?php echo $top.' '. $hl['channel'][0]?>"> 
                                <div class="width ratio16-9">
                                    <div class="content">
                                      <img  <?php echo($a==1)?'src="'.news_image($hl,'detailnews').'"':'class="swiper-lazy" data-src="'.news_image($hl,'detailnews').'"'?>>
                                      <?php if($a>1):?>
                                      <div class="swiper-lazy-preloader swiper-lazy-preloader-white" ></div>
                                      <?php endif;?>
                                    </div>
                                </div>
                                <div class="media-headline">  
                                    <div class="caption">

                               <div class="label-red"><span><?php echo $a?></span>/<span><?php echo count($headline)+1?></span></div>
                                        <h2>
                                            <a href="<?php echo news_link($hl)?>"><?php echo news_title($hl)?>

                                            </a>
                                        </h2>
                                        <a href="<?php echo WAP.'/kanal/'.$hl['channel'][0].'/'.$hl['channel'][1]?>" class="nm-kanal <?php echo $hl['channel'][0]?>"><?php echo rename_kanal(unslug($hl['channel'][1]))?></a> - <span class="date"><?php echo relative_time($hl['timestamp'])?></span>
                                    </div>
                                </div>
                            </div> 
                            <?php 
                                $a++;
                            endforeach;
                             $video_headline=array_shift($vi_headline);

                            ?>  

                            <div class="swiper-slide"> 
                                <div class="width ratio16-9">
                                    <div class="content"><img class="lazy" src="<?php echo news_image($video_headline,'detailnews')?>" ></div>
                                </div>
                                <div class="media-headline">  
                                    <div class="caption">

                             <div class="label-red"><span><?php echo count($headline)+1?></span>/<span><?php echo count($headline)+1?></span></div>
                                        <h2>
                                            <a href="<?php echo news_link($video_headline)?>"><?php echo news_title($video_headline)?>

                                            </a>
                                        </h2>
                                        <a href="<?php echo WAP.'/kanal/'.$video_headline['channel'][0].'/'.$video_headline['channel'][1]?>" class="nm-kanal <?php echo $video_headline['channel'][0]?>"><?php echo rename_kanal(unslug($video_headline['channel'][1]))?></a> - <span class="date"><?php echo relative_time($video_headline['timestamp'])?></span>
                                    </div>
                                </div>
                            </div> 
                            </div>  
                    </div> 
            
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
                <!-- Add Pagination -->
            </div>   
        </div> 
    </div>     
    <div class="wrap-unggulan"> 
        <!-- Swiper -->
          <div class="swiper-container-unggulan">
            

        <div class="title">
            <span>Unggulan</span>
        </div>
            <div class="swiper-wrapper" <?php echo count($top_stories);?>>
                 <?php $a=1; 
                  
                    foreach($top_stories as $top_storiess): ?>
                  <div class="swiper-slide">
                        <a href="<?php echo news_link($top_storiess)?>"> 
                            <div class="list-unggulan">
                                <div class="img-120">
                                  <img  class="swiper-lazy" <?php echo($a<=2)?'src="'.news_image($top_storiess,'widget_box').'"':'data-src="'.news_image($top_storiess,'widget_box').'"'?>>
                                  <?php if($a>2): ?>
                                  <div class="swiper-lazy-preloader swiper-lazy-preloader-white" style="height:135px"></div>
                                  <?php endif;?>
                                </div>
                                <p><?php echo news_title($top_storiess)?></p>
                            </div> 
                        </a>
                  </div>  
              <?php $a++;
              endforeach;?>
                  
            </div> 
              <div class="clear">&nbsp;</div>
          </div>
    </div>

    <div class="ads-top">        <div class="row col-md-12" align="center"> 
                          <?php dfp_mobile($page_type,'home','content_small');?>
                         </div> 
                    </div>

    <div class="wrap-terkini">
        <div class="pad-15">
            <div class="title">
                <span>Terkini</span>
            </div>
        </div>
        <div class="media-article">
      <div data-rfp-adspot-id="NTg4OjM1MTM" style="display:none"></div>

             <?php     
                $a=1;


                $ads_=file_get_contents('https://ncms.republika.co.id/uploads/terkini_3_mobile_aing.json');
                 $ads_terkini= (array) json_decode($ads_,true);
               
              //  echo '<!-- <pre>'.print_r($ads_terkini).'</pre>-->';

                 $news_terkini=reset($ads_terkini['news']);
                 $sekarang     = time();
                 $batas_awal   = ($ads_terkini['tanggal_awal']);
                  $batas_akhir  = ($ads_terkini['tanggal_akhir']);
                
                $terkini_all=$latest;
                
                foreach($terkini_all as $i => $n):
                    $exp        =explode('/',$n['url']);
                          
                  ?>
                <?php    if(($ads_terkini['aktif']=='YA') && ($ads_terkini['urutan']==$a) && ($sekarang >= $batas_awal) && ($sekarang <= $batas_akhir) ): ?> 
                      <div class="list-article article-item"> 
                          <article>
                                  <div class="media-image img-85">
                                      <img  class="lazy" data-original="<?php echo news_image($news_terkini, '110x80');?>">
                                  </div>
                                  <div class="media-text">
                                      <a href="<?php echo news_link($news_terkini);?>">
                                      <h2><?php echo $news_terkini['title'];?></h2>                             
                                      </a>

                                      <a href="#" class="nm-kanal"><?php echo rename_kanal(unslug($news_terkini['channel'][0]))?></a> - <span class="date"><?php echo relative_time($news_terkini['timestamp'])?></span>
                                  </div>
                          </article>  
                      </div>
                    <?php endif;?>
            <div class="list-article article-item"> 
                <article>
                        <div class="media-image img-85">
                            <img  class="lazy" data-original="<?php echo news_image($n, '110x80');?>">
                        </div>
                        <div class="media-text">
                            <a href="<?php echo news_link($n);?>">
                            <h2><?php echo $n['title'];?></h2>                             
                            </a>

                            <a href="#" class="nm-kanal"><?php echo rename_kanal(unslug($n['channel'][0]))?></a> - <span class="date"><?php echo relative_time($n['timestamp'])?></span>
                        </div>
                </article>  
            </div>
             
 <?php   
     switch ($a) {
            case 5:
              echo '<div  class="row col-md-12 list-article" align="center"> ';
                  dfp_mobile('home','home','content_1');
              echo '</div>';
             break;
             case 10:
              echo '<div  class="row col-md-12 list-article" align="center"> ';
              dfp_mobile('home','home','content_2');
              echo '</div>';
             break;
             case 13:
              echo '<div  class="row col-md-12 list-article" align="center"> ';
              dfp_mobile('home','home','content_3');
              echo '</div>';
             break;
             case 16:
              echo '<div  class="row col-md-12 list-article" align="center"> ';
              dfp_mobile('home','home','content_4');
              echo '</div>';
             break;
              case 19:
              echo '<div  class="row col-md-12 list-article" align="center"> ';
              dfp_mobile('home','home','content_5');
              echo '</div>';
             break;
         
     } ?>

              <?php if($a==5): ## CRITEO?>
                       

                    <div class="list-article media-article-big"> 
               
                <div class="analysis-news">

                <div class="swiper-container-analysis">

              
                        <div class="title">
                            <span><a href="<?php echo FRONTEND.'/kanal/news/news-analysis'?>">Analysis News</a></span>
                        </div>
                        <div class="swiper-wrapper">
                          <?php 
                          $j=1;
                          foreach($news_analysis as $info): ?>
                              <div class="swiper-slide">
                                    <article>
                                      <a href="<?php echo news_link($info)?>">
                                        <div class="media-image">
                                           <img  <?php echo($j==1)?'src="'.news_image($info,'inpicture_home').'"':'class="swiper-lazy" data-src="'.news_image($info,'inpicture_home').'"'?>>
                                           
                                     
                                        </div>
                                        <div class="media-text">
                                            <h2><?php echo news_title($info)?>    </h2>
                                                <span class="date"><?php echo relative_time($info['timestamp'])?></span>
                                        
                                        </div> 
                                      </a>
                                    </article>  
                              </div>  

                            <?php $j++;
                            endforeach;?>
                              </div> 
                              <div class="list-article" style="display: none"><a href="<?php echo WAP.'/kanal/jurnal-haji'?>"><img srcx="<?php echo CDN.'/files/ads/banner-ihram-mobile.jpg' ?>" class="lazy"></a></div>     
                        </div>
                </div>
                </div>


    
                    <?php endif;  

                    if($a==20): ?>
                               <!-- <div class="list-article media-article-big"> 
               
                <div class="infografis">

                <div class="swiper-container-infografis">

                        <div class="pagination-bullet">
                            <div class="swiper-pagination-infografis"></div>
                        </div>
                        <div class="title">
                            <span><a href="<?php echo WAP.'/kanal/infografis'?>">Infografis</a></span>
                        </div>
                        <div class="swiper-wrapper">
                          <?php 
                          $inf=1;
                          foreach($infografis as $info): ?>
                              <div class="swiper-slide">
                                    <article>
                                       <a href="<?php echo news_link($info)?>"> 
                                        <div class="media-image">
                                         <img  <?php echo($inf==1)?'src="'.news_image($info,'inpicture_home').'"':'class="swiper-lazy" data-src="'.news_image($info,'inpicture_home').'"'?>>
                                            <?php if($inf>1):?>
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white" ></div>
                                            <?php endif;?>
                                         
                                        </div>
                                        <div class="media-text">
                                            <h2><?php echo news_title($info)?>    </h2>
                                                <span class="date"><?php echo relative_time($info['timestamp'])?></span>
                                          
                                        </div> 
                                          </a>
                                    </article>  
                              </div>  

                            <?php $inf++;endforeach;?>
                              </div>     
                        </div>
                </div>
                </div>-->
               
                  
                    <?php
                    
                    endif;
                    if($a==30):
           
                     // $first_v=reset($video);  
                    ?>
              
                      <?php 
                      endif;
                       

                      if($a==16):?> 
                       <div class="list-article media-article-big foto">
               
                <div class="title">
                    <span><a href="<?php echo WAP.'/kanal/inpicture'?>">Infografis</a></span>
                </div>
                 <div class="swiper-container-foto"> 
                        <div class="swiper-wrapper">
                           <?php $i=0; foreach($infografis as $inp): ?>
                              <div class="swiper-slide">
                                <article>
                                  <a href="<?php echo news_link($inp)?>">
                                  <div class="media-image">
                                  <i class="fa fa-camera" aria-hidden="true"></i>
                                  <span class="sum-fa"><?php echo count($inp['image'])?> Foto</span>
                                  <img class="swiper-lazy" data-src="<?php echo news_image($inp,'inpicture_home')?>">
                                  <div class="swiper-lazy-preloader swiper-lazy-preloader-white" ></div>
                                  </div>
                                  <div class="media-text">
                                  
                                  <h2><?php echo str_replace('In Picture:','',news_title($inp))  ?></h2> 
                                  <span class="date"><?php echo relative_time($inp['timestamp'])?> </span>
                                  </div>
                                  </a>
                                </article> 
                            </div> 
                         <?php 
                          $i++;
                         endforeach;?>
                          </div> 
                    </div>
            </div>
            <?php 
          endif;
      if($a==13):?>
          <div class="list-article media-article-big"> 
               
                <div class="kolom">

                <div class="swiper-container-ht">
        
                        <div class="title">
                            <span>KOLOM</span>
                        </div> 
                        <div class="swiper-wrapper">
                               <?php 
         
               foreach($fokus as $fokusx): ?>
                              <div class="swiper-slide">
                                    <article>
                                            <div class="media-highlight">
                                                  <a href="<?php echo news_link($fokusx);?>" class="tag"><?php echo news_title($fokusx)?></a>
                                                </div>
                                            <div class="media-image">
                                               
                                                <img class="lazy" data-original="<?php echo news_image($fokusx, 'inpicture_home');?>">
                                            </div>
                                          
                                    </article>  
                              </div>
                              <?php endforeach;?> 
                         
                        </div>
                </div>
              </div>
            </div>
     <?php  endif;
            if($a==10):?>
              <div class="list-article media-article-big"> 
               
                <div class="hot-topik">
                	 <?php $first_hot=array_shift($hot_topic);  
                                ?>
                                <div class="media-highlight first-tag">
                                  <a class="tag" href="<?php echo FRONTEND.'/home/mobile_hot_topic/'.str_replace(' ', '_', $first_hot['nama'])?>">
                                    #<?php echo $first_hot['nama']?>
                                      
                                    </a>
                                </div>
                <div class="swiper-container-ht">
              			
                        <div class="title">
                            <span>Hot Topics</span>
                        </div> 
                        <div class="swiper-wrapper">
                             
                              <?php  foreach($first_hot['news'] as $ht): ?>
                              <div class="swiper-slide">
                                    <article>
                                            <div class="media-image">
                                                
                                                <img src="<?php echo CDN;?>/uploads/images/inpicture_widget/<?php echo $ht['image'][0]?>">
                                            </div>
                                            <div class="media-text">
                                          <a href="<?php echo FRONTEND.'/berita/'.$ht['url']?>"><h2><?php echo $ht['title']?></h2></a>
                                        </div> 
                                    </article>  
                              </div>
                              <?php endforeach;?> 
                             
                        </div>
                </div>
                <ul class="list-group">
                  <?php 
                  $i=1;
                  foreach ($hot_topic as $topic):?>
    <li class="list-group-item">
    <a href="<?php echo FRONTEND.'/home/mobile_hot_topic/'.str_replace(' ', '_', $topic['nama'])?>"><?php echo '#'. $topic['nama']?></a> 
    </li> 
  <?php 
  if($i==2) break;
  $i++;endforeach;?>
  
</ul>
                </div>
            </div>
                    <?php 
                  endif;
                    
                    if($a==19):     
                        $date = date("Y-m-d"); 
                        if(time() >= strtotime($date . " 09:00:00") && time() <= strtotime($date . " 15:00:00")) {
                         $first_v = array('timestamp'=>strtotime(date('Y-m-d H:i:s')),'title' => "","url" => "../page/livetv","image" => array( "0" => array("name" => "republika-tv-_180130181633-884.jpg")));
                          array_pop($video);     
                          //pre($first_v);
                        } else {
                          $first_v = reset($video);  
                          array_shift($video);
                        }
                      ?>
                      <div class="list-article media-article-big video"> 
                        <div class="title">
                            <span><a href="<?php echo FRONTEND.'/kanal/video'?>">REPUBLIKA TV</a></span>
                        </div>

                                <article><a href="<?php echo news_link($first_v)?>">
                                        <div class="media-image">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        <span class="sum-fa"><?php echo rename_kanal(unslug($first_v['channel'][1]));?></span>
                                           <img data-original="<?php echo news_image($first_v,'kanal_slide')?>" class="lazy">
                                        </div>
                                        <div class="media-text">
                                              <h2><?php echo (news_title($first_v)); ?></h2>
                                           <span class="date"><?php echo news_date_detail($first_v)?></span>
                                        </div>
                                        </a>
                                </article>  

                            <?php 
                              //array_shift($video);
                              foreach($video as $v):
                            ?>
                            
                                <div class="media-article-grid">
                                <article>
                                        <div class="media-image">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        <span class="sum-fa"><?php echo rename_kanal(unslug($v['channel'][1]))?></span>
                                            <img data-original="<?php echo news_image($v,'detailnews')?>" class="lazy">
                                        </div>
                                        <div class="media-text">
                                           <a href="<?php echo news_link($v)?>"><h2><?php echo (news_title($v)); ?></h2></a>
                                           <span class="date"><?php echo news_date_detail($v)?></span>
                                        </div>
                                </article>  
                                </div>
                              <?php endforeach;?>
                            
                    </div>
                    <?php
                    endif;
                    $a++;
                    
                    endforeach;?>

        
            

        </div>
         <div class="load-more">
                <div id="load_more" align="center"  style="display:none"><?php loading_bar()?></div>
                <a  class="load-more-btn" onclick="loadmore(false)">Load More</a>
            </div>
    </div>

            </div> 

    <span id="to_top" style="display: inline;">
        <a href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;"> 
        <i class="glyphicon glyphicon-chevron-up"></i>
        </a>
    </span>

<div id="adsframe" class="row col-md-12 adsframe-bottom" align="center" name="adsframe">  
                <div class="apps-close" stylexx="position: relative !important;right: 0;bottom: 0px;font-size: 14px;width: 320px;height: 20px;text-align: right;background: none;"><a class="close-apps-bottom" ><img src="<?php echo CDN.'/files/images/close-image.png'?>"  stylexx="width:70px;top:4px;background: none;"> </a></div>
      <?php dfp_mobile($page_type,'home','bottom_frame');?>
    </div> 
</main>

<?php include "footer.php"; ?>
<script>
  $(window).scroll(function (event) {
     var offset = $( ".headline" ).offset();
    var w = $(window);
    pos=offset.top - w.scrollTop();

    if(pos>=144){
      $('#topframe').animate({top:80});
    }
   if(pos<=98){
     $('#topframe').animate({top:50});
    }
    // Do something
  });
    $(function(){
     $('.close-apps').click(function(){
            $('.apps-box').fadeOut('fast');
        })
      $('.close-apps-bottom').click(function(){
            $('.adsframe-bottom').fadeOut('fast');
        })
  })
</script>