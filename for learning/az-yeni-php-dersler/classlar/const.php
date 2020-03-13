<?php
class file{
    const  directory=__DIR__;
    public function getDirectory(){
        //return self:: directory;
    }
}
class m extends file{
     
    public function getDirectory(){
        return parent:: directory;
    }
}
/* $file= new file;
echo $file->getDirectory(); */
$m= new m;
echo $m::getDirectory();

?>