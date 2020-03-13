<?php
/* class test{
    public static $a="zaur";
    public  $b="lalalalal";
    public static function hello(){
        //self
        //parent -le olar,     staticin icinde this olmur
        //staticin icinde ancaq satic method ve ozelliklere elise bilinir
        return "Salam ". self::$a ;
    }

    
}
/* $test=new test;
echo $test->hello();  //bunun yerine static ucun bele yaziriq
 echo test::hello(); */
 class File{
     public static $filename; 
     public static function create($filename,$text){
         self::$filename=$filename;
         $file=fopen($filename , 'w+');
         fwrite($file,$text);
         fclose($file);
     }
     public static function read($val=null){
         if(!$val){ $val = self::$filename;}
        return file_get_contents($val);
     }
 }
 File::create("file2.txt","it is the first example for static method, for example");
 echo File::read('file.txt');
?>