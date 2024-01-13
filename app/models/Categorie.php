<?php
class Categorie {

    private $db;
    public function __construct() {

        $this->db = Database::getInstance();
        $this->db->getConnection();
    }

    public function displayCat(){
        $this->db->query('SELECT * FROM categories ORDER BY creation_date DESC');
        $this->db->execute();

       $resultat= $this->db->resultSet();

       return $resultat;
    }

    public function addCat($data){

        $this->db->query('INSERT INTO categories (categorie_name) Value (:name)');
        $this->db->bind(':name', $data['nameCat']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
    public function updateCat($data){

        $this->db->query('UPDATE categories SET categorie_name = :name WHERE id_categorie = :id');
        $this->db->bind(':name', $data['nameCat']);
        $this->db->bind(':id', $data['id']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    public function checkCat($cat) {
        $this->db->query('SELECT * FROM categories WHERE categorie_name = :cat ');
        $this->db->bind(':cat',$cat);
        $row = $this->db->single();
        if($this->db->rowCount()> 0){
            return true; 
        } else{
            return false;
        }
    }
    public function getCatById($id){

        $this->db->query('SELECT * FROM categories WHERE id_categorie = :id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();
  
        return $row;
    }
    public function deleteCat($id){
        $this->db->query('DELETE FROM categories WHERE id_categorie = :id');
        
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        } 
    }
}