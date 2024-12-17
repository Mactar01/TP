<?php

require_once 'model/productsModel.php';

class ProductsController {
    private $productsModel;

    public function __construct() {
        $this->productsModel = new ProductsModel();
    }

    // Afficher la liste des produits
    public function listProducts() {
        return $this->productsModel->getProducts();
    }

    // Ajouter un produit
    public function addProduct($nom, $description, $prix, $quantite, $categorie_id) {
        $this->productsModel->addProduct($nom, $description, $prix, $quantite, $categorie_id);
    }

    // Modifier un produit
    public function editProduct($id, $nom, $description, $prix, $quantite, $categorie_id) {
        $this->productsModel->editProduct($id, $nom, $description, $prix, $quantite, $categorie_id);
    }

    // Supprimer un produit
    public function deleteProduct($id) {
        $this->productsModel->deleteProduct($id);
    }
}

?>
