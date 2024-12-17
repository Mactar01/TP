<?php

require_once 'db.php'; // Inclure le fichier de connexion à la base de données

class UsersModel {
    private $db;

    // Constructeur pour initialiser la connexion à la base de données
    public function __construct() {
        $database = new Database(); // Créer une instance de la classe Database
        $this->db = $database->getConnection(); // Récupérer la connexion
    }

    // Méthode pour obtenir tous les utilisateurs
    public function getUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }

    // Méthode pour ajouter un utilisateur
    public function addUser($nom, $prenom, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    // Méthode pour modifier un utilisateur
    public function editUser($id, $nom, $prenom, $email, $password) {
        $stmt = $this->db->prepare("UPDATE users SET nom = ?, prenom = ?, email = ?, mot_de_passe = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT), $id]);
    }

    // Méthode pour supprimer un utilisateur
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}

?>
