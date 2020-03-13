<?php require_once view('static/header')?>
<div class="content4">
        <div class="container4 row"> 
             <?php require view('sidebar')?>
            <div class="column width-9 auto-width">

                <h1><?=$row['page_title']?></h1> 
					<span class="width-5" style="float:right; font-style:italic; font-weight:500;"> 	</span>
                    <?=htmlspecialchars_decode($content)?>  
            </div>
        </div>
    </div>
<?php require_once view('static/footer')?>