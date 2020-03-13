<?php require_once view('static/header')?>
<main> 
   <section class="banner-area">
      <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="module_1">
                   <div class="mod-content">
                      <h2>Sığorta haqqının hesablanması üçün kalkulyator</h2>
                   </div>
                   <div class="sig-box">
                      <div class="footer-cta">
                         <h5>Statusumuz</h5>
                         <div class="row">
                            <div class="col-md-8"><input class="sig-input" type="text" placeholder="Mulki-huquqi xarakterli muqavileler esasen..."></div>
                            <div class="col-md-4"> <p>Siz icbari sigortadan azadsiniz.Sigorta dovlet budcesi terefinden odenilir.</p> </div>
                         </div>
                         <h5>Iscinin ayliq emek haqqi(tutulmasiz)</h5>
                         <div class="row">
                            <div class="col-md-8"><input class="sig-input" type="text" placeholder="680 Azn"></div>
                            <div class="col-md-4"><input id="sig-input2" type="submit" value="Hesabla" style="font-weight:600;color:rgb(68,86,108)"></div>
                         </div>
                      </div>
                   </div>
                </div>
            </div> 
            <div class="col-md-6 col-sm-12 col-xs-12" >
               <img src="<?=public_url('img/insu.png')?>"id="insu" alt=""> 
            </div>  
       </div> 
   </section>
   <section  class="ban-2">
     <div id="column1">
        <div class="row">
            <div class="col-md-4 midd" >
            <a href="">
               <div class="card1">
                  <div class="card-body">
                     <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                     <p class="card-p">İşəgötürənlər</p>
                  </div>
               </div>
            </a> 
            </div>
            <div class="col-md-4 midd" >
            <a href="">
               <div class="card1">
                 <div class="card-body">
                     <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                     <p class="card-p">Imtiyazli ehali</p>
                  </div>
              </div>
            </a> 
            </div>
            <div class="col-md-4 midd" >
               <a href="">
                  <div class="card1">
                     <div class="card-body">
                           <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                           <p class="card-p">Muzdlu Isciler</p>
                        </div>
                     </div>
                  </div> 
               </a> 
        </div> 
     </div>
     <div id="column2">
        <div class="row">
            <div class="col-md-4 midd" >
               <a href="">
                  <div class="card1">
                     <div class="card-body">
                        <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                        <p class="card-p">Mulki-huquqi xarakterli muqavileler esasinda isleri(xidmetleri) yerine yetiren fiziki sexsler</p>
                     </div>
                  </div> 
               </a>
            </div>
            <div class="col-md-4 midd" >
              <a href="">
                <div class="card1">
                  <div class="card-body">
                     <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                        <p class="card-p">Sahibkarliq fealiyyeti ile mesgul olan fiziki sexsler</p>
                  </div>
                </div>  
              </a>
            </div>
            <div class="col-md-4 midd" >
            <a href="">
               <div class="card1">
                  <div class="card-body">
                     <img class="avatar" src="<?=public_url('img/a.png')?>" alt="">
                     <p class="card-p">Diger ehali qruplari</p>
                  </div> 
              </div> 
            </a>  
            </div>
        </div>
       
       
     </div>
   </section>
   <section  class="banner-area2">
      <div class="box1"> 
         <div class="row">
            <div class="col-md-8">
               <div class="row">
                  <div class="col-md-6"> 
                        <div class="header-cta">
                           <h2>Xidmetler zerfi</h2>
                           <div class="content1">
                              <p>Xidmetler zerfi haqqinda qisa melumat</p>
                              <p>Xidmetler zerfi haqqinda qisa melumat</p>
                              <p>Xidmetler zerfi haqqinda qisa melumat</p> 
                           </div>
                        </div>   
                  </div>   
                  <div class="col-md-6"> 
                     <div class="pict">
                        <img src="<?=public_url('img/letter.png')?>" alt="">
                     </div>
                  </div>
              </div>  
               <div class="row">
                  <div class="col-md-6"> 
                     <div class="pict2">
                        <img src="<?=public_url('img/dots.png')?>" alt=""> 
                     </div>
                  </div>   
                  <div class="col-md-6"> 
                     <div class="header-cta" >
                              <h2>Istisnalar zerfi</h2>
                              <div class="content1">
                                 <p>Istisnalar zerfi haqqinda qisa melumat</p>
                                 <p>Istisnalar zerfi haqqinda qisa melumat</p>
                                 <p>Istisnalar zerfi haqqinda qisa melumat</p> 
                              </div>
                           </div>   
                     </div>
                  </div> 
               </div>
         <div class="col-md-4 col-4">
            <div>
                <img  class="image"  src="<?=public_url('img/doc.png')?>"  >
            </div>
              <div class="content2">
                  <div class="header-cta">
                     <h2 id="h2-ct">Tebib</h2>
                     <div>
                        <p id="p-ct">Tibbi Erazi Bolmelerinin Idareetme Birliyi</p> 
                     </div>
                  </div>  
            </div>  
         </div>
         </div>
      </div>
        <!-- =========================================== -->
      <div class="col-md-12">
        <h2 id="news"> Xeberler</h2>  
      </div>
       <div class="card-deck">
         <div class="row">
            <?php foreach($query4 as $post):?>
               <div class="col-md-4">
                  <div class="card" style="height:490px">
                     <img src="<?=public_url('img/1.png')?>" class="card-img-top" >
                     <div class="card-body">
                        <h3 class="card-title"><?=$post['post_title']?></h3>
                        <p class="card-text"><?=cut_text($post['post_short_content'],80)?></p>
                        <p class="card-text"><small class="text-muted"><?=$output = substr($post['post_date'], 5, 6);?>2019</small></p>
                        <a href="<?=$post['post_menu'].'/'.$post['post_url']?>" id="btn" class="btn btn-primary">Ətraflı</a>
                     </div>
                  </div> 
               </div>
            <?php endforeach?> 
         </div>
       </div>
     </div>
   </section>
   <section class="banner-area3">
      <div class="box2" style="background:rgb(102,138,244)"> 
         <div class="row">
            <div class="col-md-8 ">
               <img class="abo-img"  src="<?=public_url('img/about.png')?>" alt="">
            </div>
            <div class="col-md-4 about">
               <div class="first-about">
                    <img class="avatar2"  src="<?=public_url('img/building.png')?>" alt="">
                     <div class="melumat">
                        <h2>Umumi melumat</h2>
                        <div class="content1">
                           <p>Agentlik icbrari-tibbi sigortanin tetbigini...</p> 
                        </div>
                     </div>
               </div>
               <div class="first-about">
                    <img class="avatar2"  src="<?=public_url('img/building.png')?>" alt="">
                     <div class="melumat">
                        <h2>Umumi melumat</h2>
                        <div class="content1">
                           <p>Agentlik icbrari-tibbi sigortanin tetbigini...</p> 
                        </div>
                     </div>
               </div>
               <div class="first-about">
                    <img class="avatar2"  src="<?=public_url('img/building.png')?>" alt="">
                     <div class="melumat">
                        <h2>Umumi melumat</h2>
                        <div class="content1">
                           <p>Agentlik icbrari-tibbi sigortanin tetbigini...</p> 
                        </div>
                     </div>
               </div> 
            </div> 
         </div> 
      </div>
      <?php $arr=explode(';',setting('static1')); 
            $arr2=explode(';',setting('static2')); 
            $arr3=explode(';',setting('static3')); ?>
      <div class="contact" id="contact">
         <div class="contact-us">
            <h4>Bizimle Elaqe</h4>
            <div class="first-about2">
                <i class="<?=$arr[0]?>" ></i>
               <div class="melumat2">
                  <h2><?=$arr[1]?></h2>
                  <div class="content3">
                     <p><?=$arr[2]?></p> 
                  </div>  
               </div>   
            </div>
            <div class="first-about2">
                <i class="<?=$arr2[0]?>" ></i>
               <div class="melumat2">
                  <h2><?=$arr2[1]?></h2>
                  <div class="content3">
                     <p><?=$arr2[2]?></p> 
                  </div>  
               </div>   
            </div>
            <div class="first-about2">
                <i class="<?=$arr3[0]?>" ></i>
               <div class="melumat2">
                  <h2><?=$arr3[1]?></h2>
                  <div class="content3">
                     <p><?=$arr3[2]?></p> 
                  </div>  
               </div>   
            </div>
         </div>
         <div class="electron">
            <div class="apply"> 
               <h2>Elektron muraciet</h2> 
               <div class="alert alert-danger" id="contact-error-msg" style="display:none"><span><b> Danger - </b></span></div>
               <div class="alert alert-success" id="contact-success-msg" style="display:none"><span><b> Success - </b></span></div>
                  <form action="" onsubmit="return false;"  id="contact-form" >
                     <div class="apply1">
                        <input type="text" name="name" placeholder="Ad ve soyad">
                        <input type="email" name="email" placeholder="Emailiniz"> 
                     </div>
                     <div class="apply1">
                        <input type="text" name="phone" placeholder="Telefon">
                        <input type="text" name="movzu" placeholder="Movzu"> 
                     </div>
                     <div class="apply1">
                        <input id="mezmun" name="mezmun" type="text" placeholder="Mezmun">
                     </div>
                   <button class="btn btn-success" onclick="contact('#contact-form')" id="btn2" type="submit">Gonder</button> 
                  </form> 
            </div>
         </div>  
      </div>
   </section>
   <section class="banner-area4">
      <div class="col-md-12">
        <h2 id="news2">En cox verilen suallar</h2>
       </div>
      <div class="question">
         <!-- 5 dene olar ancaq -->
         <?php foreach(Question::Sual() as $key=>$sual):?>
            <div class="question1" id="question1">
               <h3><?=$sual['question_title']?></h3><i id="section<?=$key?>" class="fa fa-ellipsis-h fa-lg"></i> 
               <div id="z" style="display:none"><p><?=$sual['question_content']?></p></div>   
            </div>
         <?php endforeach?>
      </div> 
   </section> 
   <section class="banner-area5">
      <div class="partners">
        <div class="row">
        <?php foreach($query3 as $sekiller):?>
           <div class="col-md-3">
              <img src="<?=public_url('img/img/'.$sekiller['partners_img'])?>" alt="">
           </div>
       <?php endforeach?>    
        </div>
      </div>
   </section>  
</main> 
<?php require_once view('static/footer')?>
 