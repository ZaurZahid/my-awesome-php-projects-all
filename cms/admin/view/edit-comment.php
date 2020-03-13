<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
           Yorum duzenle(#<?=$id?>)
        </h1>
</div>  
    <div class="clear" style="height: 10px;"></div> 
    <div class="box-" tab> 
        <div style="background:rgba(13,136,193,0.07);border:2px solid blue;box-shadow: 0 0 10px 0 rgba(0,0,0,.10);margin-bottom:10px;padding:20px; ">
          <a href="<?=site_url('blog/'.$row['post_url'])?>" target="_blank"><strong style="color:red"><?=$row['post_title']?></strong></a> movzusu ucun <?=timeConvert($row['comment_date'])?> <strong style="color:green"><?=$row['user_name'] ? $row['user_name'] : $row['comment_name']?></strong> terefinden yazildi.
        </div>

        <form action="" method="POST" class="form label">  
            <ul> 
                <li>
                    <label>Yorumu yazan</label>
                    <div class="form-content">
                        <input type="text" name="comment_name" value="<?=post('comment_name') ? post('comment_name') : $row['comment_name']?>">
                    </div>
                </li>
                <li>
                    <label>Yorumu email</label>
                    <div class="form-content">
                        <input type="text" value="<?=post('comment_email') ? post('comment_email') : $row['comment_email']?>">
                    </div>
                </li>  
                <li>
                    <label>Yorum</label>
                    <div class="form-content">
                       <textarea name="comment_content"  cols="10" rows="5"> <?= post('comment_content')? post('comment_content') : $row['comment_content'] ?> </textarea> 
                    </div>
                </li> 
                <li>
                    <label>Status</label>
                    <div class="form-content">
                         <select name="comment_status">
                            <option value="1"<?=$row['comment_status']==1?'selected':null?>>Onayli</option>
                            <option value="2"<?=$row['comment_status']==2?'selected':null?>>Onayli deyil</option> 
                         </select>
                     </div>
                </li>
                <input type="hidden" name="submit" value="1"> 
                <li class="submit">
                    <button type="submit">Duzenle</button>
                </li> 
           </ul> 
        </form>
    </div>   
 
<?php require_once admin_view('static/footer')?>