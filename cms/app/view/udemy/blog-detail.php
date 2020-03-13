<?php require view('static/header')?>
<section class="jumbotron text-center">
  <div class="container">
    <h1>Iletisim</h1>
    <div class="breadcrumb-custom">
        <a href="<?=site_url()?>" style="color:red">Anasayfa</a>/
        <a href="<?=site_url('blog')?>" class="active">Blog</a> // 
        <?php
        $category_url=explode(',',$row['category_url']);
        $x=explode(',',$row['category_name']);
        foreach($x as $index=> $category_name ):?>
           <a href="<?=site_url('blog/kategori/'.trim($category_url[$index]))?>" style="color:green"><?=$category_name?></a> //
        <?php endforeach?>
        <a href="<?=site_url('blog/'.$row['post_url'])?>" style="color:#ff0ba9"><?=$row['post_title']?></a>
    </div> 
 </div>
</section>
   <!-- Start blog-posts Area -->
			<section class="blog-posts-area ">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-lg-10 post-list blog-post-list">
                                 <div class="single-post">
                                     <ul class="tags">
                                        <?=$row['category_name']?>
                                        <li style="color:blue;">
                                            (Yayinlanma tarixi: <?= timeConvert($row['post_date'])?>)
                                        </li>
                                    </ul> 
                                    <a href="blog-single.html">
                                        <h2>
                                        <?=$row['post_title']?>
                                        </h2>
                                    </a>
                                    <div class="content-wrap">
                                       <div>
                                         <?=htmlspecialchars_decode($row['post_content'])?>
                                       </div>
                                    </div>
                                    <div class="bottom-meta">
                                        <div class="user-details row align-items-center">
                                        
                                            <div class="social-wrap col-lg-6">
                                                <ul>
                                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=site_url('blog/'.$row['post_url'])?>"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li> 
                                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Start comment-sec Area -->
                                 <?php if($comments):?>
                                    <section class="comment-sec-area py-5">
                                        <div class="container">
                                            <div class="row flex-column">
                                              <!--   <h5 class="text-uppercase pb-80">05 Comments</h5> -->
                                                <br> 
                                                <div id="comments">
                                                    <?php foreach($comments as $comment)  require view('static/comment')?> 
                                                </div>                                                                                                                                                              
                                            </div>
                                        </div>    
                                    </section>
                                 <?php else:?> 
                                 
                                <div id="no-comment">
                                    <section class="comment-sec-area py-5" style="border:solid 1px;" >
                                            <div class="container"> 
                                                    <div class="comment-list">
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex"> 
                                                                    <div class="desc" >
                                                                        <h4>Ilk yorumu sen yaz:) </h4> 
                                                                        <p class="comment">
                                                                            Bu movzuda hele yorum yazilmayib
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="reply-btn">
                                                                    <a href="#add-comment" class="btn-reply text-uppercase">Yorum yaz</a> 
                                                                </div>
                                                            </div>
                                                    </div>  
                                            </div>    
                                     </section>
                                </div> 
                                    <section class="comment-sec-area py-5">
                                        <div class="container">
                                           <div class="row flex-column">
                                              <div id="comments"></div> 
                                           </div> 
                                        </div>    
                                    </section>      
                                 <?php endif?>    
                                    <!-- End comment-sec Area -->
                                    
                                    <!-- Start commentform Area -->
                                    <div class="commentform-area py-5" id="add-comment">
                                            <div id='comment-msg' style="display:none;"></div> 
                                            <form id="comment-form" onsubmit="return false;" data-id="<?=$row['post_id']?>">
                                                    <div class="left">
                                                    <?php if(!session('user_id')):?>
                                                        <input type="text" name="name" placeholder="Adinizi yazin." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adinizi yazin.'"  >
                                                        <input type="email" name="email" placeholder="Emailinizi yazin." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Emailinizi yazin.'"  >
                                                    <?php else:?>
                                                        <div class="alert alert-warning">
                                                          <?=session('user_name')?> kullanici adi ile yorum yazirsiniz [<a href="<?=site_url('cixis')?>">Cixis ele</a>]
                                                        </div>
                                                    <?php endif?>
                                                     </div>
                                                    <div class="right">
                                                        <textarea name="comment" cols="20" rows="7"  placeholder="Yorum yazin" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Yorumu yaz'"  ></textarea>
                                                    </div>
                                                    <button type="submit" name="submit" onclick="add_comment('#comment-form')" class="template-btn">Gonder</button>
                                                </form> 
                                    </div>
                                    <!-- End commentform Area -->
        
    
                                 </div>																		
                            </div>
                             
                        </div>
                    </div>	
            </section> 
 <!-- End blog-posts Area --> 
 
<?php require view('static/footer')?>