<?php

class Wiki {

    private $db;

    public function __construct(){

        $this->db = Database::getInstance();
        $this->db->getConnection();
    }

    public function addWiki($data){
        
        // Insérer le wiki
        $this->db->query('INSERT INTO wikis (titre, contenu, user_id, categorie_id) VALUES (:titre, :contenu, :user, :cat)');
        $this->db->bind(':titre', $data['nameWiki']);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':user', $_SESSION['user_id']);
        $this->db->bind(':cat', $data['nameCat']);
        if($this->db->execute()){
            $idWiki = $this->db->lastInsertId();
       
        // Insérer les associations wiki-tag
        $this->db->query('INSERT INTO wikis_tags (wiki_id, tag_id) VALUES (:wiki, :tag)');
        foreach ($data['tags'] as $tag) {
            $this->db->bind(':wiki', $idWiki);
            $this->db->bind(':tag', $tag);
            $this->db->execute();
        }
          return true;
          } else {
            return false;
          }

        // Récupérer l'ID du wiki inséré
       
    }

    public function displayWiki(){
        $this->db->query('SELECT * FROM wikis INNER JOIN users ON wikis.user_id = users.id_user 
        INNER JOIN categories ON wikis.categorie_id = categories.id_categorie ORDER BY wikis.dateCreation DESC');
        $this->db->execute();

        $resultat= $this->db->resultSet();
 
        return $resultat;
    }

    public function displayWikiTag($id){
        $this->db->query('SELECT * FROM wikis INNER JOIN wikis_tags ON wikis.id_wiki = wikis_tags.wiki_id 
        INNER JOIN tags ON wikis_tags.tag_id = tags.id_tag WHERE wikis.id_wiki = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        $resultat= $this->db->resultSet();
 
        return $resultat;
    }

    public function displayWikiById($id){
        $this->db->query('SELECT * FROM wikis 
            INNER JOIN users ON wikis.user_id = users.id_user 
            INNER JOIN categories ON wikis.categorie_id = categories.id_categorie 
            WHERE wikis.id_wiki = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    
        $resultat = $this->db->single();
    
        return $resultat;
    }
    
    







}

?>