<?php 

namespace Controllers;

class Exemple extends Controller
{

    protected $modelName = \Model\Exemple::class;


    public function indexApi(){

        // $modelUser = new \Model\User();

        // $user = $modelUser->getUser();

        // $donneesExemple = $this->model->findAll($this->modelName);

        $donneesExemple = ["item1" => "valeur1", 
                            "item2" => "valeur2"
    ];


header("Access-Control-Allow-Origin: *");


        echo json_encode($donneesExemple);

    }



    /**
     * 
     * affiche la liste des gateaux
     */
    public function index()
    
    {

        // $modelUser = new \model\User();

        // $user = $modelUser->getUser();

        // $donneesExemple = $this->model->findAll($this->modelName);
        
            
        // $titreDeLaPage = "Le titre de la page";

        // \Rendering::render('exemples/exemple', compact('donneesExemple','user', 'titreDeLaPage'));
    }


    /**
     * 
     * affiche un gateau
     * 
     */
    public function show()
    {
        // $modelUser = new \model\User();

        // $user = $modelUser->getUser();
           
        
        
        // $exemple_id= null;

        //     if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
        //         $exemple_id = $_GET['id'];
        //     }

        
        // $unObjetExemple = $this->model->find($exemple_id, $this->modelName);
        
        // $titreDeLaPage = $unObjetExemple->name;

        // $modelAutreExemple = new \Model\AutreExemple();


        // $autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id);
        


        \Rendering::render('exemples/exemple', compact('unObjetExemple','user', 'autresDonnees', 'titreDeLaPage'));

    }


public function showApi()
    {

        // $userModel = new \Model\User();
        // $user = $userModel->getUser();


    //         $exemple_id= null;

    //         if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
    //             $exemple_id = $_GET['id'];
    //         }

       
    //     $exemple = $this->model->find($exemple_id, $this->modelName);
    //     $modelAutreExemple = new \Model\AutreExemple();
    //     $autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id);

	// header("Access-Control-Allow-Origin: *");


    //     echo json_encode([
    //         "exemple" => $exemple, 
    //         "autresDonnees" => $autresDonnees]);

    }


    /**
     * 
     * supprimer un gateau
     */
    public function suppr()
    {

        
    //     $exemple_id = null;

    //     if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


    //         $exemple_id = $_GET['id'];
    //     }

    //     if(!$exemple_id){
    //         die("pas d'id de exemple donné");
    //     }


    //     //verifier si le exemple existe
    //     $exemple = $this->model->find($exemple_id, $this->modelName);

    //     if(!$exemple){
    //         die("exemple inexistant");
    //     }

    //     $this->model->delete($exemple_id);

    //     \Http::redirect("index.php");
    // }



    