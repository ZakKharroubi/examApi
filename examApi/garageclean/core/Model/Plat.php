<?php

namespace Model;

class Plat extends Model {

        protected $table = "plats";

        public $id;

        public $name;

        public $price;

        public $description;

        public $restaurant_id;

    /**
     * 
     * 
     * Trouve tous les plats d'un resto selon son id
     * @param int $id
     * @return array|bool
     */
    public function findAllByRestaurant(int $id){

        $requete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE restaurant_id = :id");
        $requete->execute(["id" => $id]);
        $items = $requete->fetchAll();
        return $items;
    }


public function insert(string $name, string $description, int $price, int $restaurant_id) {

        $maRequette = $this->pdo->prepare("INSERT INTO plats (name, description, price, restaurant_id)VALUES(:name, :description, :price, :restaurant_id)");
        $maRequette->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'restaurant_id' => $restaurant_id
        ]);

    }

}