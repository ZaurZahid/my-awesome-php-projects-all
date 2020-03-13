
   <?php require view('static/header')?>
  
 
  <!-- Start blog-posts Area -->
  <section class="blog-posts-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 post-list blog-post-list">
               <h1><?=$category['category_name']?></h1> 
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
                          
                      </div> 
                  <?php endforeach?>
              <?php else:?> 
              <div class="alert alert-warning">
                  Hele bu blog ucun ne ise yuklenmeyib ,daha sonra ziyaret edin.
              </div> 
              <?php endif?>
              </div>
              <div class="col-lg-4 sidebar"> 

                  <div class="single-widget category-widget">
                      <h4 class="title">Post Categories</h4>
                      <ul>
                         <?php foreach(Blog::Categories() as $category):?>
                              <li <?=$category['category_url']==route(2) ? "class='active'" : null?>>
                                  <a href="<?=site_url('blog/kategori/'.$category['category_url'])?>" class="justify-content-between align-items-center d-flex">
                                      <h6><?=$category['category_name']?></h6> <span style="color:blue"><?=$category['total']?> </span></a>
                              </li> 
                         <?php endforeach?>
                      </ul>
                  </div>  
                  <div class="single-widget tags-widget">
                      <h4 class="title">Tag Clouds</h4>
                      <ul>
                      <?php foreach($allTags as $allTag):?>
                            <li><a href="<?=site_url('tag/'.$allTag['tag_url'])?>"><?=$allTag['tag_name']?></a></li>
                        <?php endforeach?>
                      </ul>
                  </div> 
              </div>
          </div>
          <?php if($totalRecord > $pageLimit):?>
          <div class="pagination2">
              <ul>
                 <?=$db->showPagination(site_url(route(0)).'/kategori/'.route(2).'?'.$pageParam.'=[page]');?>
              </ul>
          </div>
          <?php endif?>
      </div>
  </section>
  <!-- End blog-posts Area -->

 <?php require view('static/footer')?>