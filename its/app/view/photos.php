<?php require_once view('static/header')?>
    
<div class="content4">
        <div class="container4 row"> 
             <?php require view('sidebar')?>
            <div class="column width-9 auto-width">
            <ul class="press-reliz load_content"> 	
                <?php foreach($query as $row):?>
                <li>
                    <a href="<?=site_url().$row['post_menu'].'/'.$row['post_url']?>">
                        <div class="container4 row">
                            <div class="column width-3"><span><?php echo $output = substr($row['post_date'], 5, 6);?></span><small>2019</small></div>
                            <span><?=htmlspecialchars_decode(cut_text($row['post_short_content'],80))?></span>
                            <div>
                               <?=htmlspecialchars_decode($row['post_content'])?> 
                            </div>
                        </div>
                    </a>
                </li>     <?php endforeach?>   
									</ul>
            </div>
        </div>
        
    </div>
<?php require_once view('static/footer')?>