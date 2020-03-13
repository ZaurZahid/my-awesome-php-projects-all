 
 
<footer>
   <div class="footer-area-top">
      <div class="container">
         <div class="row" id="f-row"> 
            <div class="box3">
               <div class="footer-box">
                  <img src="<?=setting('footer_logo')?>">
                  <div class="corporate-address1">
                     <h4>Is vaxtlarimiz</h4> 
                     <ul class="corporate-ul" style="height:22px;">
                        <li class="li-1"><?=setting('footer_is_vaxtlar')?></li> 
                        <li class="li-2"><?=setting('footer_is_saatlari')?></li>
                     </ul>
                     <ul class="corporate-ul" style="height:22px;"> 
                        <li class="li-1"><?=setting('footer_is_vaxtlar1')?></li> 
                        <li class="li-2">Istirahet</li>
                     </ul> 
                    <ul class="corporate-ul" style="height:22px;">
                        <li class="li-1"><?=setting('footer_is_vaxtlar2')?></li> 
                        <li class="li-2">Istirahet</li>
                     </ul>  
                  </div> 
               </div> 
            </div>
            <div class="box4">
               <div class="footer-box">
                  <h3 class="title-bar-left title-bar-footer">Çevik Keçidler</h3> 
                  <ul class="corporate-address">
                  <?php foreach(menu(19) as $key=>$menu):if ($key === 0)  continue;?>
                        <li> <a href="<?=$menu['url']?>"><?=$menu['title']?></a></li> 
                        <?php if(isset($menu['submenu'])):?>  
                           <?php foreach($menu['submenu'] as $key2=>$submenu):if ($key2 === 1)  continue;?>
                              <li><a href="<?=$submenu['url']?>"><?=$submenu['title']?></a></li> 
                           <?php endforeach?>
                        <?php endif;?>
               <?php endforeach?>     
                  </ul>   
               </div> 
            </div> 
         </div>
      </div>
   </div>
    <div class="footer-area-bottom">
        <div class="container">
            <p>@ <?= setting('footer_copyright')?></p>
        </div>
    </div>
</footer>
  
</body>
</html>
