<?php
//bu abstract
/* abstract class CRUD{
    const dir=__DIR__;
    public $a=5;
    public function a(){
        return $this->a;
    }
    abstract  public function create();
    abstract  public function read();
    abstract  public function update();
    abstract  public function delete();
}
class DB extends CRUD{
      public function create(){}
      public function read(){}
      public function update(){}
      public function delete(){}
} */

//bu da interface
//ancaq public
//normal metodlar ve ozellikler olmur 
//ayni sinifda birfazla interface ola biler
interface CRUD{
     
    public function create($tabloAdi,$id);
    public function read($tabloAdi,$id);
    public function update($tabloAdi,$data,$id);
    public function delete($tabloAdi,$id);
}
interface database{
    public function connection($host,$dbName,$user,$pass);
}
class DB implements CRUD,database{
    public function create($tabloAdi,$id){}
    public function read($tabloAdi,$id){}
    public function update($tabloAdi,$data,$id){}
    public function delete($tabloAdi,$id){}
    public function connection($host,$dbName,$user,$pass){}
}

?>