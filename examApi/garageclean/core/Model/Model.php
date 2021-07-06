<?php 
namespace Model;

use PDO;

abstract class Model {
    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }


public function find(int $id, string $className, ? string $table = null){


$requete = "SELECT * FROM {$this->table} WHERE id =:id";

if(!empty($table)){
    $requete = "SELECT * FROM $table WHERE id =:id";
    
}


$resultat = $this->pdo->prepare($requete);
$resultat->execute([':id' => $id]);

$item = $resultat->fetchObject($className);

return $item;
}

/**
 * 
 * Récupère tous les items présents dans la table
 * @return array
 * 
 */

public function findAll(string $className):array{

// $pdo = getPdo();

$requete = "SELECT * FROM {$this->table}";

$resultat = $this->pdo->query($requete);

$items = $resultat->fetchAll(PDO::FETCH_CLASS, $className);

return $items;
}




/**
 * Supprime un item de la BDD selon son ID
 * @param integer $id
 * @return void 
 */

public function delete(int $id):void{
    
    // $pdo = getPdo();
    $requeteDelete =$this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
    $requeteDelete->execute([':id' => $id]);
}


}