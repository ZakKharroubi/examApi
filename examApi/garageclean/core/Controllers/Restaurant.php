<?php

namespace Controllers;


class Restaurant extends Controller {


    protected $modelName = \Model\Restaurant::class;


    public function indexApi(){


        // $modelUser = new \Model\User();

        // $user = $modelUser->getUser();

        $restaurants = $this->model->findAll($this->modelName);

        header("Access-Control-Allow-Origin: *");

        echo json_encode($restaurants);

    }

    public function showApi()
    {

        // $userModel = new \Model\User();
        // $user = $userModel->getUser();


            $restaurant_id= null;

            if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
                $restaurant_id = $_GET['id'];
            }

       
        $restaurant = $this->model->find($restaurant_id, $this->modelName);
        $modelPlat = new \Model\Plat();
        $plats = $modelPlat->findAllByRestaurant($restaurant_id);

	header("Access-Control-Allow-Origin: *");


        echo json_encode([
            "restaurant" => $restaurant, 
            "plats" => $plats]);

    }

}