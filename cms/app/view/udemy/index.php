
   <?php require view('static/header')?>
    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="container-fluid">      
            <div class="row">
                <div class="col-lg-6 px-0">
                    <div class="banner-bg"></div>
                </div> 
                <div class="col-lg-6 align-self-center">
                    <div class="banner-text">
                        <h1><span>( </span><?=setting('job_title')?><span> :)</span></h1>
                        <p class="py-3"><?=setting('job_description')?></p>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
 <?php

$sorgu=$db->from('posts')
->orderby('post_id','desc')
->limit(0,3)
->all();

 if(get('axtar')){ 
      $get=get('axtar');
      $query=$db->from('posts')
               ->like('post_title',$get) 
               ->all();
 }        
 ?>
   
    <!-- Search Area Starts -->
    <div class="search-area">
        <div class="search-bg">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-12">
                        <form action="" method="get" class="d-md-flex justify-content-between">
                            <input type="text" name="axtar" value="<?php echo isset($_GET['axtar'])?$_GET['axtar']:''?>" placeholder="<?=setting('arama_placeholder')?>">
                             
                            <button type="submit" class="template-btn">Axtar</button> 
                        </form>
                        <?php if(isset($get)):?>
                        <?php foreach($query as $row):?>
                            <a href="<?=site_url('blog/').$row['post_url']?>"><div  id="axtar" style="color:#ff9902;;font-size:20px; border:1px solid #ff9902; " ><?=$row['post_title']?></div></a>
                        <?php endforeach?>
                        <?php elseif($get==" "):?>
                        <div style="color:#ff9902;;font-size:20px; border:1px solid #ff9902; " >Axtardiginiz netice cixmadi.</div>
                       <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Area End --> 

    <!-- Feature Area Starts -->
    <section class="feature-area section-padding2">
        <div class="container">
            <div class="row">
            <?php foreach($sorgu as $sor):?>
                <div class="col-lg-4">
                    <div class="single-feature mb-4 mb-lg-0">
                        <h4><?=$sor['post_title']?></h4>
                        <p class="py-3"><?=cut_text($sor['post_content'],20)?></p>
                        <a href="<?=site_url('blog/').$sor['post_url']?>" class="secondary-btn">Indi kesf et<span class="flaticon-next"></span></a>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
    </section><br><br><hr>
    <!-- Feature Area End -->

 

   <?php require view('static/footer')?>