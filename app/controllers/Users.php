<?php
  class Users extends Controller {

    public function __construct(){
      $this->userModal = $this->model('user');
      $this->wikiModal = $this->model('wiki');
    }

    public function index(){

      $wikis = $this->wikiModal->displayWiki();
      $wikitags = [];
      foreach ($wikis as $wiki) {
          $wikitags[$wiki->id_wiki] = $this->wikiModal->displayWikiTag($wiki->id_wiki);
      }

      $data=[
        "wikis" => $wikis,
        "wikitags"=>$wikitags,
      ];
   
      
        $this->view('users/index',$data);
      }

    public function login(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];
        $pattern_mot_de_passe =  '/^.{8,}$/';

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Veuillez entrer email';
        }elseif($this->userModal->checkEmail($data['email'])){
    
        }else{
          $data['email_err'] = 'Aucun utilisateur trouvé';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = ' Veuillez entrer le mot de passe';
        }elseif(!preg_match($pattern_mot_de_passe,$data['password'])){
            $data['password_err'] = 'Veuillez entrer un mot de passe valide (au moins 8 caractères)';
          }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          $logedInUser= $this->userModal->login($data['email'],$data['password']);
            if($logedInUser){
              $this->createUserSession($logedInUser);
              
            }else{
              $data['password_err'] = 'le mot de passe est invalide';
              $this->view('users/login',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
      }
    public function register(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
    
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          // Init data
          $data =[
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'name_err' => '',
            'prenom_err' => '',
            'email_err' => '',
            'password_err' => '',
          ];
          $pattern_nom_prenom = '/^[a-zA-ZÀ-ÖØ-öø-ÿ\s]{3,}$/u';
          $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
          $pattern_mot_de_passe =  '/^.{8,}$/';
  
          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Veuillez entrer email';
          }elseif(!preg_match($pattern_email, $data['email'])){
              $data['email_err'] = 'Veuillez entrer un email valide';
            }elseif($this->userModal->checkEmail($data['email'])){
              $data['email_err'] = 'Email déjà utilisé';
            }
  
          // Validate Name
          if(empty($data['nom'])){
            $data['name_err'] = 'Veuillez entrer un nom';
          }elseif(!preg_match($pattern_nom_prenom, $data['nom'])){
              $data['name_err'] = 'Veuillez entrer un nom valide (au moins 3 caractères)';
            }
  
          if(empty($data['prenom'])){
             $data['prenom_err'] = 'Veuillez entrer un prenom';
           }elseif(!preg_match($pattern_nom_prenom, $data['prenom'])){
             $data['prenom_err'] = 'Veuillez entrer un nom valide (au moins 3 caractères)';
            }
  
          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Veuillez enter le mot de passe';
          } elseif(!preg_match($pattern_mot_de_passe,$data['password'])){
            $data['password_err'] = 'Veuillez entrer un mot de passe valide (au moins 8 caractères)';
          }
  
          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['prenom_err'])){
            
              // Hash Password
              $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
  
              // Register User
              if($this->userModal->register($data)){
                redirect('users/valid');
              } else {
                die('Something went wrong');
              }
          } else {
            // Load view with errors
            $this->view('users/register', $data);
          }
  
        } else {
          // Init data
          $data =[
            'nom' => '',
            'prenom' => '',
            'email' => '',
            'password' => '',
            'name_err' => '',
            'prenom_err'  => '',
            'email_err' => '',
            'password_err' => '',
          ];
  
          // Load view
          $this->view('users/register', $data);
        }
      }
      public function createUserSession($user){
        $_SESSION['user_id'] = $user->id_user;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_prenom'] = $user->prenom;
        $_SESSION['role'] = $user->role;
        if($_SESSION['role']== 'admin'){
          redirect('admins/dashboard');
        }else{
          redirect('users/index');
        }
        
      }
  
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_nom']);
        unset( $_SESSION['user_prenom']);
        unset( $_SESSION['role']);
        session_destroy();
        redirect('users/login');
      }
    public function valid(){
      $this->view('users/valid');
    }
    public function contenu($id){
      $wikis = $this->wikiModal->displayWikiById($id);
          $wikitags = $this->wikiModal->displayWikiTag($wikis->id_wiki);
      

      $data=[
        "wikis" => $wikis,
        "wikitags"=>$wikitags,
      ];
   

      $this->view('users/contenu',$data);
    }

    // Dans votre contrôleur (Users.php)
    public function searchAjax(){
      if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['term'])) {
        $term = $_GET['term'];
        
        // Appelez votre modèle pour effectuer la recherche
        $results = $this->wikiModal->searchWiki($term);

        

        // Retournez les résultats au format JSON
        header('Content-Type: application/json');
        echo json_encode($results);
        exit;
        }
    }

 }
    
