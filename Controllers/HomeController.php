<?php
class HomeController extends Controller {

    public function indexAction(){
      $this->View('home');
    }
    public function testAction($num = 0){
        echo "Home test page $num";
    }



}