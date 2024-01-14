<?php
  class Admins extends Controller {

    public function __construct(){
      $this->catModal = $this->model('categorie');
      $this->tagModal = $this->model('tag');
      $this->wikiModal = $this->model('wiki');
      $this->userModal = $this->model('user');
    }

    public function index(){

        $categories=$this->catModal->displayCat();
        $tags=$this->tagModal->displayTag();
        $data = [
            'categories'=> $categories,
            'tags'=> $tags,
        ];
    
        $this->view('admin/management',$data);
      }
    public function addCat(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'nameCat' => trim($_POST['nameCat']),
          
          'nameCat_err'=> '',       
        ];
    
      
        if(empty($data['nameCat'])){
          $data['nameCat_err'] = 'Veuillez entrer le nom du catégorie';
        }elseif($this->catModal->checkCat($data['nameCat'])){
          $data['nameCat_err'] = 'Catégorie existe déja!';
        }

        // Make sure errors are empty
        if(empty($data['nameCat_err'])){
          // Validated  
            if($this->catModal->addCat($data)){
              flash('catégorie','Catégorie ajouter!');
                redirect('admins/index');
              
            }else{
              
              $this->view('admin/addCat',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('admin/addCat', $data);
        }
        }else{
            $data =[
                'nameCat' => '',
                'nameCat_err'=> '',           
            ];
        
        
        $this->view('admin/addCat',$data);

    }             
    }
    public function editCat($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'id' => $id,
          'nameCat' => trim($_POST['nameCat']),
          'nameCat_err'=> '',       
        ];

       
    
        
        // Validate Email
        if(empty($data['nameCat'])){
          $data['nameCat_err'] = 'Veuillez entrer le nom du catégorie';
        }elseif($this->catModal->checkCat($data['nameCat'])){
          $data['nameCat_err'] = 'Catégorie existe déja!';
        }

        // Make sure errors are empty
        if(empty($data['nameCat_err'])){
          // Validated  
            if($this->catModal->updateCat($data)){
              flash('catégorie','Catégorie mise a jour!');
                redirect('admins/index');
              
            }else{
              
              $this->view('admin/editCat',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('admin/editCat', $data);
        }
        }else{
            if ($id === '' ) {
                redirect('admins/index');
            }
            $cat=$this->catModal->getCatById($id);
            $data =[
                'id'=> $id,
                'nameCat' => $cat->categorie_name,
                'nameCat_err'=> '',           
            ];
            
        
        
        $this->view('admin/editCat',$data);

    }             
    }
    public function addTag(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'nameTag' => trim($_POST['nameTag']),
          
          'nameTag_err'=> '',       
        ];
    
        // Validate Email
        if(empty($data['nameTag'])){
          $data['nameTag_err'] = 'Veuillez entrer le nom du catégorie';
        }elseif(preg_match('/\s/', $data['nameTag'])){
          $data['nameTag_err'] = "Tags ne doivent pas contenir d'espaces.";
        }elseif($this->tagModal->checkTag($data['nameTag'])){
            $data['nameTag_err'] = 'Tag existe déja!';
          }

        // Make sure errors are empty
        if(empty($data['nameTag_err'])){
          // Validated  
            if($this->tagModal->addTag($data)){
              flash('tag','Tag ajouter!');
                redirect('admins/index');
              
            }else{
              
              $this->view('admin/addTag',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('admin/addTag', $data);
        }
        }else{
            $data =[
                'nameTag' => '',
                'nameTag_err'=> '',           
            ];
        
        
        $this->view('admin/addTag',$data);

    }           
    }
    public function editTag($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'id' => $id,
          'nameTag' => trim($_POST['nameTag']),
          'nameTag_err'=> '',       
        ];
    
        // Validate Email
        if(empty($data['nameTag'])){
            $data['nameTag_err'] = 'Veuillez entrer le nom du catégorie';
          }elseif(preg_match('/\s/', $data['nameTag'])){
            $data['nameTag_err'] = "Tags ne doivent pas contenir d'espaces.";
          }elseif($this->tagModal->checkTag($data['nameTag'])){
              $data['nameTag_err'] = 'Tag existe déja!';
            }
        // Make sure errors are empty
        if(empty($data['nameTag_err'])){
          // Validated  
            if($this->tagModal->updateTag($data)){
              flash('tag','Tag mise a jour!');
                redirect('admins/index');
              
            }else{
              
              $this->view('admin/editTag',$data);
            
          }
        } else {
          // Load view with errors
          $this->view('admin/editTag', $data);
           
        }
        }else{
           
            $tag=$this->tagModal->getTagById($id);
            $data =[
                'id'=> $id,
                'nameTag' => $tag->tag_name,
                'nameTag_err'=> '',           
            ];       
        $this->view('admin/editTag',$data);

    }             
    }
    public function deleteCat($id){

        
            $cat = $this->catModal->getCatById($id);

            // if($post->user_id != $_SESSION['user_id']){
            //     redirect('projets/index');
            // }

        if($this->catModal->deleteCat($id)){
          flash('catégorie','Catégorie suprimmée!');
            redirect('admins/index');

        }else{
            die('error');
        }
    }
    public function deleteTag($id){

        
        $cat = $this->tagModal->getTagById($id);

        // if($post->user_id != $_SESSION['user_id']){
        //     redirect('projets/index');
        // }

    if($this->tagModal->deleteTag($id)){
        flash('tag','Tag suprimmée!');
        redirect('admins/index');

    }else{
        die('error');
    }
  }

   public function archive($id){

    if($this->wikiModal->archiveWiki($id)){
      flash('wiki','Wiki archivée!');
      redirect('users/index');

        }else{
          die('error');
        }
   }
   public function dashboard(){

    $wikis = $this->wikiModal->totalWiki();
    $users = $this->userModal->totalUser();
    $tags = $this->tagModal->totalTag();
    $cat = $this->catModal->totalCat();
    $userWikis = $this->userModal->totalUserWiki();
    $catWikis = $this->catModal->totalCatWiki();
    $tagWikis = $this->tagModal->totalTagWiki();

    $data = [
      'users' => $users,
      'wikis' => $wikis,
      'tags' => $tags,
      'cat' => $cat,
      'userWikis'=> $userWikis,
      'catWikis' =>$catWikis,
      'tagWikis' => $tagWikis,
    ];

    $this->view('admin/dashboard',$data);
   }

   
    }
    