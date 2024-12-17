<?php

require_once 'model/usersModel.php'; // Inclure le modèle des utilisateurs

class UsersController {
    private $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel(); // Créer une instance du modèle
    }

    // Afficher la liste des utilisateurs
    public function listUsers() {
        return $this->usersModel->getUsers();
    }

    // Ajouter un utilisateur
    public function addUser($nom, $prenom, $email, $password) {
        $this->usersModel->addUser($nom, $prenom, $email, $password);
    }

    // Modifier un utilisateur
    public function editUser($id, $nom, $prenom, $email, $password) {
        $this->usersModel->editUser($id, $nom, $prenom, $email, $password);
    }

    // Supprimer un utilisateur
    public function deleteUser($id) {
        $this->usersModel->deleteUser($id);
    }
}

?>
