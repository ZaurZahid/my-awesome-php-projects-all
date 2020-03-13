<?php
if(!permission('settings','show')){
    permission_page();
} 
if(post('settings')){
    if(!permission('settings','edit')){
        $error='Ayarlari duzenleme yetkiniz bulunmuyor';
    }else{
        $html='<?php ' .PHP_EOL.PHP_EOL;
        foreach(post('settings') as $key=>$value){
            $html.= '$settings["' . $key . '"] = "' . $value . '";'.PHP_EOL;
        }
        file_put_contents(PATH. '/app/settings.php' , $html);
        header("location:". admin_url('settings'));
    }

}
 require admin_view('settings');
?>