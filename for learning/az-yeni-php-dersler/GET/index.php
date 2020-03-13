<?php 
 
        function filtrEle($val){
            return is_array($val) ? array_map('filtrEle',$val): htmlspecialchars(trim($val));
        }

        $x=array_map('filtrEle',$_GET);
        print_r($x) ; 

        function get($name){
            if(isset($_GET[$name])){
                return filtrEle($_GET[$name]);
            }
        }
        
?>  
    <form action="" method="get">
        <input  type="text" name="axtar" value="<?php echo get('axtar');?>" placeholder="bir sey yaziniz...." ><hr>
    </form> 