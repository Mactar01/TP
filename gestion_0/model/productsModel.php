<?php

require_once 'db.php';

class ProductsModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Méthode pour obtenir tous les produits
    public function getProducts() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }

    // Méthode pour ajouter un produit
    public function addProduct($nom, $description, $prix, $quantite, $categorie_id) {
        $stmt = $this->db->prepare("INSERT INTO products (nom, description, prix, quantite, id_categorie) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $description, $prix, $quantite, $categorie_id]);
    }

    // Méthode pour modifier un produit
    public function editProduct($id, $nom, $description, $prix, $quantite, $categorie_id) {
        $stmt = $this->db->prepare("UPDATE products SET nom = ?, description = ?, prix = ?, quantite = ?, id_categorie = ? WHERE id = ?");
        $stmt->execute([$nom, $description, $prix, $quantite, $categorie_id, $id]);
    }

    // Méthode pour supprimer un produit
    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}

?>
