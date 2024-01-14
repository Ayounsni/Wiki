<?php
class Tag {

    private $db;
    public function __construct() {

        $this->db = Database::getInstance();
        $this->db->getConnection();
    }

    public function displayTag(){
        $this->db->query('SELECT * FROM tags');
        $this->db->execute();

       $resultat= $this->db->resultSet();

       return $resultat;
    }
    public function addTag($data){

        $this->db->query('INSERT INTO tags (tag_name) Value (:name)');
        $this->db->bind(':name', $data['nameTag']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
    public function updateTag($data){

        $this->db->query('UPDATE tags SET tag_name = :name WHERE id_tag = :id');
        $this->db->bind(':name', $data['nameTag']);
        $this->db->bind(':id', $data['id']);

        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }
    public function checkTag($tag) {
        $this->db->query('SELECT * FROM tags WHERE tag_name = :tag ');
        $this->db->bind(':tag',$tag);
        $row = $this->db->single();
        if($this->db->rowCount()> 0){
            return true; 
        } else{
            return false;
        }
    }
    public function getTagById($id){

        $this->db->query('SELECT * FROM tags WHERE id_tag = :id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();
  
        return $row;
    }
    public function deleteTag($id){
        $this->db->query('DELETE FROM tags WHERE id_tag = :id');
        
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }  
    }

    public function totalTag(){
      $this->db->query('SELECT COUNT(*) AS total_tag FROM tags');
      $this->db->execute();
      $resultat = $this->db->single();

      return $resultat;
    }

    public function totalTagWiki(){
      $this->db->query('SELECT tags.tag_name , COUNT(wikis.id_wiki) AS total_tag FROM tags
       LEFT JOIN wikis_tags ON tags.id_tag= wikis_tags.tag_id  INNER JOIN wikis ON
        wikis_tags.wiki_id = wikis.id_wiki AND wikis.archive=0 GROUP BY tags.id_tag ORDER BY total_tag DESC LIMIT 3');
      $this->db->execute();
      $resultat = $this->db->resultSet();
        return $resultat;
    }




}