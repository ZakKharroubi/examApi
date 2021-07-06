<?php

class App {

    public static function process(){

        
        $controllerName = "home";
        $task = "index";
        $controller = ucfirst($controllerName);
        
        if(!empty($_GET['controller'])){
            $controllerName = $_GET['controller'];
        }
        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }
        
        $controllerName = "\Controllers\\".$controllerName;
        $controller = new $controllerName();
        $controller->$task();
        
    }

    

}