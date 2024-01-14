<?php
class User {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->db->getConnection();
        
    }
    public function register($data){
        $this->db->query('INSERT INTO users (prenom, nom, email, password) VALUES(:prenom, :nom, :email, :password)');
        // Bind values
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

    public function login($email,$password){
        $this->db->query('SELECT * FROM users WHERE email = :email ');
        $this->db->bind(':email',$email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if(password_verify($password,$hashed_password)){
            return $row;
        }else{
            return false;
        }


    }
    public function checkEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email ');
        $this->db->bind(':email',$email);
        $row = $this->db->single();
        if($this->db->rowCount()> 0){
            return true; 
        } else{
            return false;
        }
    }

    public function totalUser(){
        $this->db->query('SELECT COUNT(*) AS total_user FROM users WHERE role="auteur"');
        $this->db->execute();
        $resultat = $this->db->single();

        return $resultat;
    }

    public function totalUserWiki(){
        $this->db->query('SELECT users.prenom, users.nom, COUNT(wikis.id_wiki) AS nombre_wikis FROM users
        LEFT JOIN wikis ON users.id_user = wikis.user_id AND wikis.archive = 0
        GROUP BY users.id_user
        ORDER BY nombre_wikis DESC
        LIMIT 3');
        $this->db->execute();
        $resultat = $this->db->resultSet();

        return $resultat;
    }

    

}

?>