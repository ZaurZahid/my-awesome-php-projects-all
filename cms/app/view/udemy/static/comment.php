
<div class="single-comment justify-content-between d-flex"> 
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img style="border-radius: 25px;height:60px;" src="<?=get_gravatar($comment['comment_email'])?>" >
                </div>
                <div class="desc">
                    <h5><a href="#"><?=$comment['comment_name']?></a></h5>
                    <p class="date"><?=timeConvert($comment['comment_date'])?></p>
                    <p class="comment" >
                    <?=$comment['comment_content']?>
                    </p>
                </div>
            </div> 
</div><hr>