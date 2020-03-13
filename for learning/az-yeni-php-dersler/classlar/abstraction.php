<?php

abstract class Plugin{
    abstract  public function getTitle($title);
    abstract  public function setContent($content);
    public function show(){
        echo '<h1>' . $this-> title  . '</h1>';
        echo '<p>' . $this-> content  . '</p>';

    }
}

class lastComments extends Plugin{
    public function getTitle($title){
           $this->title=$title;
    }
    public function setContent($content){
        $this->content=$content;
    }
    
}

class sosialMedia extends Plugin{
    public function getTitle($title){
        $this->title=$title;
    } 
     public function setContent($content){
        $this->content=$content;
    }
}
 $lastComment=new lastComments;
 $lastComment->getTitle("son yorumlar");
 $lastComment->setContent("son yorumlar ucun  tsdfdsfsdfsfsfsvdsvsvssfsffsfsdfsdfs");

 $sosyalMedia=new sosialMedia;
 $sosyalMedia->getTitle("sosial medialar");
 $sosyalMedia->setContent("sosial ucun commentin tsdfdsfsdfsfsfsvdsvsvssfsffsfsdfsdfs");


 echo $sosyalMedia->show();
 echo $lastComment->show();

?>