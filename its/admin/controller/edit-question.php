<?php
if(!permission('question','edit')){
    permission_page();
} 

$id=get('id');
if(!$id){
    header('Location:'.admin_url('question'));
    exit;
}

$row=$db->from('question')
        ->where('question_id',$id)
        ->first();
if(!$row){
    header('Location:'.admin_url('question'));
    exit;

} 
if(post('submit')){
   if($data=form_control()){ 
       $title=$data['question_title'];
       $content=nl2br($data['question_content']);
        //bele bir kategorinin olub olmadigni yoxla
        $query=$db->from('question')
                  ->where('question_title',$title)
                  ->where('question_id',$id,"!=") 
                  ->first();
        if($query){
          $error='<strong style="color:white;font-weight:550">'.$title.'</strong> adinda bir sual onsuzda var ,basqa adda sual yazin';
        }else{
            $query=$db->update('question')
                      ->where('question_id',$id)
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
require admin_view('edit-question');

?>