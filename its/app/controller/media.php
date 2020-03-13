<?php  
$meta=[
    'title'=>"ITS-Media" 
];
if(!route(1)){ 
   require view('media');  
}  
 elseif(!file_exists(controller(route(1)))){
    header('location:'.site_url('404'));
    exit;
 }
 elseif(controller(route(1))){ 
    require controller(route(1)); 
 }  
 
?>