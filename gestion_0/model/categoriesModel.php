<?php

require_once 'db.php'; // Inclure le fichier de connexion à la base de données

class CategoriesModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Méthode pour obtenir toutes les catégories
    public function getCategories() {
        $stmt = $this->db->query("SELECT * FROM categories");
        return $stmt->fetchAll();
    }

    // Méthode pour ajouter une catégorie
    public function addCategory($libelle) {
        $stmt = $this->db->prepare("INSERT INTO categories (libelle) VALUES (?)");
        $stmt->execute([$libelle]);
    }

    // Méthode pour modifier une catégorie
    public function editCategory($id, $libelle) {
        $stmt = $this->db->prepare("UPDATE categories SET libelle = ? WHERE id = ?");
        $stmt->execute([$libelle, $id]);
    }

    // Méthode pour supprimer une catégorie
    public function deleteCategory($id) {
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
    }
}

?>
