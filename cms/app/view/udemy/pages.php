
   <?php require view('static/header')?> 
    <!-- Start blog-posts Area -->
    <section class="blog-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list"> 
                <?php if($query):?>
                    <?php foreach($query as $row):?>
                        <div class="single-post">
                             <ul class="tags">
                            <?=$row['category_name']?>
                                <li style="color:blue;">
                                    (Yayinlanma tarixi: <?= timeConvert($row['page_date'])?>)
                                </li>
                            </ul>  
                            <a href="blog-single.html">
                                <h2>
                                <?=$row['page_title']?>
                                </h2>
                            </a>
                            <div> 
                            <?=htmlspecialchars_decode($row['page_content'])?>
                            </div>
                            <a href="<?=site_url('sayfa/'.$row['page_url'])?>" class="btn btn-primary">Goruntule</a>
                        
                        </div> 
                    <?php endforeach?>
                <?php else:?> 
                <div class="alert alert-warning">
                    Hele bu sehife ucun ne ise yuklenmeyib ,daha sonra ziyaret edin.
                </div> 
                <?php endif?>
                </div> 
            </div>
            <?php if($totalRecord > $pageLimit):?>
            <div class="pagination2">
                <ul>
                   <?=$db->showPagination(site_url(route(0)).'?'.$pageParam.'=[page]');?>
                </ul>
            </div>
            <?php endif?>
        </div>
    </section>
    <!-- End blog-posts Area -->
 
   <?php require view('static/footer')?>