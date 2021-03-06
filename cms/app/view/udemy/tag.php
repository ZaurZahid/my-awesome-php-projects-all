
   <?php require view('static/header')?>
  
 
    <!-- Start blog-posts Area -->
    <section class="blog-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list"> 
                <?php if($query):?>
                    <?php foreach($query as $row):?>
                        <div class="single-post">
                            <img class="img-fluid" src="assets/images/p2.jpg" alt="">
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
                            <div> 
                            <?=htmlspecialchars_decode($row['post_short_content'])?>
                            </div>
                            <a href="<?=site_url('blog/'.$row['post_url'])?>" class="btn btn-primary">Goruntule</a>
                            <!-- <div class="bottom-meta">
                                <div class="user-details row align-items-center">
                                    <div class="comment-wrap col-lg-6">
                                        <ul>
                                            <li><a href="#"><span class="lnr lnr-heart"></span>	4 likes</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span> 06 Comments</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div> 
                    <?php endforeach?>
                <?php else:?> 
                <div class="alert alert-warning">
                    Hele bu tag ucun blog yuklenmeyib ,daha sonra ziyaret edin.
                </div> 
                <?php endif?>
                </div>
             
            </div>
            <?php if($totalRecord > $pageLimit):?>
            <div class="pagination2">
                <ul>
                   <?=$db->showPagination(site_url(route(0)).'/'.route(1).'?'.$pageParam.'=[page]');?>
                </ul>
            </div>
            <?php endif?>  
        </div>
    </section>
    <!-- End blog-posts Area -->
 
   <?php require view('static/footer')?>