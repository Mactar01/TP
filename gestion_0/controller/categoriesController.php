<?php

require_once 'model/categoriesModel.php';

class CategoriesController {
    private $categoriesModel;

    public function __construct() {
        $this->categoriesModel = new CategoriesModel();
    }

    // Afficher la liste des catégories
    public function listCategories() {
        return $this->categoriesModel->getCategories();
    }

    // Ajouter une catégorie
    public function addCategory($libelle) {
        $this->categoriesModel->addCategory($libelle);
    }

    // Modifier une catégorie
    public function editCategory($id, $libelle) {
        $this->categoriesModel->editCategory($id, $libelle);
    }

    // Supprimer une catégorie
    public function deleteCategory($id) {
        $this->categoriesModel->deleteCategory($id);
    }
}

?>
