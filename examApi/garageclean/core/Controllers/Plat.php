<?php

namespace Controllers;


class Plat extends Controller {


        protected $modelName = \Model\Plat::class;




public function supprApi() :void {


        $plat_id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $plat_id = $_POST['id'];

        }
      $plat = $this->model->find($plat_id, $this->modelName);

      if(!$plat){
          die("Je ne trouve pas ce plat");
      }


      	header("Access-Control-Allow-Origin: *");


      $this->model->delete($plat_id);

    echo json_encode("suppression réussi");
    }


    public function createApi() {

        if(!empty($_POST['namePlat']) && !empty($_POST['descriptionPlat']) && !empty($_POST['pricePlat']) && ctype_digit($_POST['pricePlat']) && !empty($_POST['restaurant_id']) && ctype_digit($_POST['restaurant_id'])){

            $name = htmlspecialchars($_POST['namePlat']);
            $description = htmlspecialchars($_POST['descriptionPlat']);
            $price = $_POST['pricePlat'];
            $restaurant_id = $_POST['restaurant_id'];

        }

        if(!$name || !$description || !$price || !$restaurant_id){

            echo "Le formulaire a pas été rempli entièrement";
        }

        header("Access-Control-Allow-Origin: *");


        $this->model->insert($name, $description, $price, $restaurant_id);

        
        echo json_encode("Création de plat réussie");
    }
        
}