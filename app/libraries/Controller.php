<?php 

// base controller 
// loads the models and views 

class Controller {
    // --------------hadi l model-------------------
    public function model($model){
        // hna ghadi ndiro require file 
        require_once '../app/models/' . $model . '.php';

        // hna andiru instance l model 
        return new $model();
    }

    // ---------------w hadi l view---------------- :

   public function view($view, $data =[])
   {
    // anchekew dek file d view wach kayen
    if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
    }else {
        // dek file d view makaynch 
        die('View does not exist');
    }
   }
}