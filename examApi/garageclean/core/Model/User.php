<?php 


namespace Model;


class User extends Model {

    protected $table = "users";
    
    private $password;
    
    public $id, $username,  $email;
    

    /**
     * 
     * Permet de réutiliser la propriété privée password hors de la classe User
     * @param string $param
     */
    public function setPassword(string $param) {
        $this->password = $param;
    } 




  /**
   * 
   * 
   * Trouve un user en fonction de son username
   * @param string $username
   * @param string $class
   * 
   */

    public function findByUsername(string $username){

        $requete = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $requete->execute(["username" => $username]);
        $item = $requete->fetchObject(\Model\User::class);
        return $item;
        
    }


    /**
     * 
     * Permet à l'utilisateur de se connecter
     * @param string $username
     * @param string $password
     * @return bool
     */

    public function logIn(string $username, string $password){

        $user = $this->findByUsername($username);

        if(!$user){
            die("Cet utilisateur n'existe pas");
        } else {


        if($password == $user->password){

            $_SESSION['user'] = array(
                'userId' =>$user->id,
                'username' => $user->username,
                'email' => $user->email);
            return true;
        } else {
            return false;
        }
    }
    }


    /**
     * 
     * Permet de vérifier si l'utilisateur est connecté
     * @return bool
     * 
     */

    function isLoggedIn(){

        if(!empty($_SESSION['user'])){
            return true;
        }
        return false;
    }


    /**
     * 
     * Récupère un user
     * @param string username
     * @return object
     */


    public function getUser(){

        if($this->isLoggedIn()){

            $user = $this->find($_SESSION['user']['userId'], \Model\User::class);
            return $user;
        } else {
            return false;
        }

    }

    /**
     * 
     * Déconnecte un utilisateur 
     * 
     */

    public function logOut(){

        if($this->isLoggedIn()){
            session_unset();
        }

    }

    // public function register(string $username, string $password, string $email){

        /**
         * 
         * Inscrit un utilisateur
         * @param User $user
         * 
         */
        public function register(User $user){
        $requete = $this->pdo->prepare("INSERT INTO users(username, password, email) VALUES (:username, :password, :email)");
        $requete->execute([
            'username' => $user->username,
            'password' => $user->password,
            'email' => $user->email
        ]);
    }

        /**
         * 
         * Suis-je l'auteur de l'objet passé en paramètre ?
         * @param object $gateauOuRecette
         */


        public function isAuthor(object $gateauOuRecette){


            if  ($this->id == $gateauOuRecette->user_id){
                return true;
            } else {
                return false;
            }
        }

        /**
         * 
         * Vérifie si l'utilisateur a réalisé l'objet passé en paramètre
         * @param object $gateauOuRecette
         * 
         */


        public function hasMade(object $gateauOuRecette){

            $makeModel = new \Model\Make();

            if($makeModel->findByUser($this, $gateauOuRecette)){
                return true;
            } else {
                return false;
            }

        }
}