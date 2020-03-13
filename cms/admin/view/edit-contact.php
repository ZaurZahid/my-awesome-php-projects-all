<?php require_once admin_view('static/header')?>
    
<div class="box-">
        <h1>
            Iletisim Mesaji Goruntule
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-container container-50">
        <?php if($row['contact_read']==1):?>
            <div class="message success box-">
                <strong style="color:red"><?=timeConvert($row['contact_date'])?> evvel gonderildi.</strong><br>
                <?=$row['user_name']?> terefinden <?=timeConvert($row['contact_read_date'])?>  oxundu. 
            </div>

        <?php endif ?>
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Gonderen</label>
                    <div class="form-content" style="padding-top:2px;">
                         <p style="color:red;"><?=$row['contact_name']?> 
                     </div>
                </li> 
                <li>
                    <label>Mail</label>
                    <div class="form-content" style="padding-top:2px;">
                         <p style="color:red;"><?=$row['contact_email']?></p> 
                     </div>
                </li> 
                <li>
                    <label>Telefon</label>
                    <div class="form-content" style="padding-top:2px;">
                         <p style="color:red;"><?=$row['contact_phone']?></p> 
                     </div>
                </li> 
                <li>
                    <label>Baslik</label>
                    <div class="form-content" style="padding-top:2px;">
                         <p style="color:green;"><?=$row['contact_subject']?> 
                     </div>
                </li> 
                <li>
                    <label>Mesaj</label>
                    <div class="form-content" style="padding-top:2px;">
                         <p style="color:blue;"><?=nl2br($row['contact_message'])?> 
                     </div>
                </li>  
            </ul>
        </form>
    </div>
    <div class="box-container container-50">
        <div class="box" id="div-1">
            <h3>
                Cavabla
            </h3>
            <div class="box-content">
            <div class="message success box-" style="display:none;" id="success"></div>
            <div class="message error box-" style="display:none;" id="error"></div> 
                <form action="" id="email-form" class="form"  onsubmit="return false;">
                     <input type="hidden" name='name' value="<?=$row['contact_name']?>">
                    <ul>
                        <li>
                            <input type="text" name="subject"  id="input" value="RE:<?=$row['contact_subject']?>" placeholder="Mesaj basligi">
                        </li>
                        <li>
                            <input type="text" name="email" value="<?=$row['contact_email']?>">
                        </li>
                        <li>
                            <textarea name="message"  cols="30" rows="15" placeholder="Mesajinizi yazin...."></textarea>
                        </li>
                        <li>
                            <button onclick="send_email('#email-form')" type="submit">Gonder</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

<?php require_once admin_view('static/footer')?>