<?php

namespace Controllers;

class User extends Controller {

    protected $modelName = \Model\User::class;

    

    /**
     * 
     * Permet de connecter un utilisateur
     * 
     * 
     */


    public function signIn(){




        if(!empty($_POST['username']) && !empty($_POST['password'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $this->model->logIn($username, $password);

            \Http::redirect("index.php");


        } else {
            $user = null;
            $titreDeLaPage = "Connexion";
            \Rendering::render("users/log", compact('user','titreDeLaPage'));
        }
    }
    /***
     * 
     * 
     * Déconnecte un user
     * 
     */
    public function signOut(){

        $this->model->logOut();
        \Http::redirect("index.php");

    }


    /**
     * 
     * Inscrit un user
     * 
     * 
     * 
     */

    public function signUp(){

        if( !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['retypePassword']) && !empty($_POST['email'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $retypePassword = $_POST['retypePassword'];
            $email = $_POST['email'];


            if($this->model->findByUsername($username)){
                
                die("Cet username n'est pas disponible, prenez en un autre");

            }
            if($password == $retypePassword){
                $user = new \Model\User();
                $user->username = $username;
                $user->setPassword($password);
                $user->email = $email;
                $this->model->register($user);
                \Http::redirect("index.php");

            }
         
        
        } else {
            $user = $this->model->getUser();
            $titreDeLaPage = "Inscription";
            \Rendering::render("users/signup", compact("titreDeLaPage", "user"));
        }

    }

}