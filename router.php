
<?php
require 'middleware/CheckUser.php';
class Router{

     public $routes=[];
     
     public function addRoute($path,$method,$controller,$allowed_user_type)
     {
        $this->routes[]=[
            "path"=>$path,
            "controller"=>$controller,
            "method"=>$method,
            "allowed_user_type"=>$allowed_user_type
        ];
     }



     public function get($path,$controller,$allowed_user_type)
     {
        $this->addRoute($path,"GET",$controller,$allowed_user_type);
     }



     public function post($path,$controller,$allowed_user_type)
     {
        $this->addRoute($path,"POST",$controller,$allowed_user_type);
     }



     public function delete($path,$controller,$allowed_user_type)
     {
        $this->addRoute($path,"DELETE",$controller,$allowed_user_type);
     }



     public function route($path,$method)
     {              
        $found=false;
        foreach($this->routes as $route)
        {   
            if($route["path"]===$path && $route["method"]===strtoupper($method) )
            {
            // {   echo "Routing to: " . BASE_PATH . '/' . $route["controller"];
            //     die();
                $found=true;
                //echo "Routing to: " . BASE_PATH . '\\' . $route["controller"];     
                CheckUser::checkuser($route['allowed_user_type']);
                require BASE_PATH.'/'.$route["controller"];//check for errors
            }
            //echo "Routing to: " . BASE_PATH . '\\' . $route["controller"];
        }
        if(!$found)
        {   
            require 'views/404.php';
        }


    }

}

return new Router();