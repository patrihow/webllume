<?php 

class Projet extends CRUD {
    public function getAllProjects() {
        $sql = "SELECT p.*, c.nom_categorie 
                FROM projet p 
                JOIN categorie c ON p.categorie_id = c.id";
        return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectById($id) {
        return $this->selectId('projet', $id);
    }

    public function createProject($data) {
        return $this->insert('projet', $data);
    }

    public function updateProject($data, $id) {
        return $this->update('projet', $data, 'id');
    }

    public function deleteProject($id) {
        return $this->delete('projet', $id);
    }
}

?>