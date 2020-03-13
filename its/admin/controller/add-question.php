<?php
if(!permission('question','add')){
    permission_page();
} 
if(post('submit')){
   if($data=form_control()){ 
       $title=$data['question_title'];
       $content=nl2br($data['question_content']);
        //bele bir kategorinin olub olmadigni yoxla
        $query=$db->from('question')
                  ->where('question_title',$title)
                  ->first();
        if($query){
          $error='<strong style="color:white;font-weight:550">'.$title.'</strong> adinda bir sual onsuzda var ,basqa adda sual yazin';
        }else{
            $query=$db->insert('question')
                    ->set($data);
        if($query){
          header('location:'.admin_url('question'));
        }else{
            $error="Ne ise bir xeta oldu.";
        }          

      } 
    } 
   else{
       $error="Butun melumatlari yazin....";
   } 
 }  
require admin_view('add-question');

?>