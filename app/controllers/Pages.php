<?php

class Pages extends Controller
{
    public function __construct(){

    }


    // / hna kanpassew data ela chkel array :
    public function index(){
        $data = [
            'title' => 'welcome'
        ];
        $this->view('pages/index', $data);

    }


    public function about(){
      $data = [
          'title' => 'About us'
              ];
        $this->view('pages/about', $data);
    }
}



  
