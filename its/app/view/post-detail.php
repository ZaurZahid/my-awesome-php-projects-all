<?php require_once view('static/header')?>
    
<div class="content4">
        <div class="container4 row"> 
             <?php require view('sidebar')?>
             <div class="column width-9">
                <small><?=$row['post_date']?></small>
                <h1><?=$row['post_title']?></h1>  
                 <div class="fancy">
                     <?=htmlspecialchars_decode($row['post_short_content']) ?> 
                     <?=htmlspecialchars_decode($row['post_content']) ?>   
                 </div> 
				 <div class="clear"></div>
				</div>
            </div>
        </div>
        
    </div>
<?php require_once view('static/footer')?>
<script>

$(function(){
 /*    if('.fancybox-item-container img'){
        var  $ele=$('.fancybox-item-container img').attr('src')  
        $('.fancybox-item-container img').attr('src','../'+$ele) ;
    }  */
    if('.fancy'){
        $(".fancy img").each(function() {  
            imgsrc = $(this).attr('src') 
            $(this).attr('src','../'+imgsrc) ; 
        });  
    }
})

</script>