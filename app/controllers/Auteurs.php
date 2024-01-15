<?php
  class Auteurs extends Controller {

    public function __construct(){
      $this->catModal = $this->model('categorie');
      $this->tagModal = $this->model('tag');
      $this->wikiModal = $this->model('wiki');
      if(!isLoggedIn()){
        redirect('users/login');  
       } elseif($_SESSION['role']== 'admin'){
        redirect('admins/dashboard');  
       }
    }

    public function addWiki(){
        $categories=$this->catModal->displayCat();
        $tags=$this->tagModal->displayTag();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'nameCat' => trim($_POST['nameCat']),
          'nameWiki' => trim($_POST['nameWiki']),
          'contenu' => trim($_POST['contenu']),
          'tags' => $_POST['tags'],    
          'nameCat_err'=> '',  
          'tags_err' => '',
          'nameWiki_err' => '',
          'contenu_err' => '',
          'categories'=> $categories,
          'tagss'=> $tags, 
        ];
    
          if(empty($data['nameCat'])){
          $data['nameCat_err'] = 'Veuillez entrer le nom du catégorie';
         }
          if(empty($data['nameWiki'])){
          $data['nameWiki_err'] = 'Veuillez entrer le titre de wiki';
         }
          if(empty($data['tags'])){
          $data['tags_err'] = 'Veuillez entrer le nom du catégorie';
           }
          if(empty($data['contenu'])){
          $data['contenu_err'] = 'Veuillez entrer le contenu';
           }

        // Make sure errors are empty
        if(empty($data['nameCat_err']) && empty($data['nameWiki_err']) && empty($data['tags_err']) && empty($data['contenu_err']) ){
          // Validated  
            if($this->wikiModal->addWiki($data)){
              flash('wiki','Wiki ajouter!');
                redirect('auteurs/index');
              
            }else{
              
              $this->view('auteurs/addWiki',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('auteurs/addWiki', $data);
        }
        }else{
           
            $data =[
                'nameCat' => '',
                'nameWiki' => '',
                'contenu' => '',
                'tags' => '',    
                'nameCat_err'=> '',  
                'tags_err' => '',
                'nameWiki_err' => '',
                'contenu_err' => '', 
                'categories'=> $categories,
                'tagss'=> $tags,       
            ];

            $this->view('auteurs/addWiki', $data);
        }
      }

     public function index(){

        $wikis = $this->wikiModal->displayWikiAuteur();
        $wikitags = [];
        foreach ($wikis as $wiki) {
            $wikitags[$wiki->id_wiki] = $this->wikiModal->displayWikiTag($wiki->id_wiki);
        }
  
        $data=[
          "wikis" => $wikis,
          "wikitags"=>$wikitags,
  
        ];  
          $this->view('auteurs/mesWiki',$data);
        }
     public function categorie(){

        $categories=$this->catModal->displayCat();
        
        $data = [
            'categories'=> $categories,
        ];
              $this->view('auteurs/cat',$data);
            }

      public function deleteWiki($id){

        $wiki = $this->wikiModal->displayWikiById($id);
         if($wiki->user_id != $_SESSION['user_id']){
                redirect('auteurs/index');
            }

        if($this->wikiModal->deleteWiki($id)){
          flash('wiki','Wiki suprimmée!');
          redirect('auteurs/index');
        }else{
          die('error');
        }

      }

      public function editWiki($id){
        $categories=$this->catModal->displayCat();
        $tags=$this->tagModal->displayTag();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'nameCat' => trim($_POST['nameCat']),
          'nameWiki' => trim($_POST['nameWiki']),
          'contenu' => trim($_POST['contenu']),
          'tags' => $_POST['tags'],    
          'nameCat_err'=> '',  
          'tags_err' => '',
          'nameWiki_err' => '',
          'contenu_err' => '',
          'categories'=> $categories,
          'tagss'=> $tags, 
          'idW'=>$id
        ];
    
          if(empty($data['nameCat'])){
          $data['nameCat_err'] = 'Veuillez entrer le nom du catégorie';
         }
          if(empty($data['nameWiki'])){
          $data['nameWiki_err'] = 'Veuillez entrer le titre de wiki';
         }
          if(empty($data['tags'])){
          $data['tags_err'] = 'Veuillez entrer le nom du catégorie';
           }
          if(empty($data['contenu'])){
          $data['contenu_err'] = 'Veuillez entrer le contenu';
           }

        // Make sure errors are empty
        if(empty($data['nameCat_err']) && empty($data['nameWiki_err']) && empty($data['tags_err']) && empty($data['contenu_err']) ){
          // Validated  
            if($this->wikiModal->editWiki($data)){
              flash('wiki','Wiki modifier!');
                redirect('auteurs/index');
              
            }else{
              
              $this->view('auteurs/editWiki',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('auteurs/editWiki', $data);
        }
        }else{

          $wikis = $this->wikiModal->displayWikiById($id);
           if($wikis->user_id != $_SESSION['user_id']){
            redirect('auteurs/index');
          }
           
            $data =[
                'id' => $wikis->id_categorie,
                'nameCat' => $wikis->categorie_name,
                'nameWiki' => $wikis->titre,
                'contenu' => $wikis->contenu,
                'tags' => '',    
                'nameCat_err'=> '',  
                'tags_err' => '',
                'nameWiki_err' => '',
                'contenu_err' => '', 
                'categories'=> $categories,
                'tagss'=> $tags,       
            ];

            $this->view('auteurs/editWiki', $data);
        }

      }
 
    }
    