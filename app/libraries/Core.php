<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];


//---------------  ki9leb ela lclass f indice lewla f url ---------------

    public function __construct(){
      //  print_r($this->getUrl());
      $url = $this->getUrl();

    
       // ki9llb ela l controller f first value 
       if(isset($url)){
        if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
          // ila l9ah ki7ti f currentController :
          $this->currentController = ucwords($url[0]);
          // Unset 0 Index
          unset($url[0]);
        }
      }

      // require the controller 
      require_once '../app/controllers/' . $this->currentController .'.php';


      // instantiate controller class 
      $this->currentController = new $this->currentController;


      // daba ki9leb ela tani indice f l'url li huwa lméthode : 

    if(isset($url[1])){
      // daba an9lbo ela lmethode wach existe déja f lcontroller :
    if(method_exists($this->currentController, $url[1])){
       $this->currentMethod = $url[1];
       // hna ghadin khwiw dek array mn indice d méthode[1]: 
         unset($url[1]);
   }
  }
  // hadi bach kanjibu parametres : 
  $this -> params = $url  ? array_values($url) : [];

  // an3ytu 3la array diyal paramétres : 
  call_user_func_array([$this->currentController , $this->currentMethod], $this->params);
 }

 // hadi bach kanjibu l URL : 

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }
  //---------------  end code searching name class ---------------





  
  