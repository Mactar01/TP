<?php

require_once 'controller/usersController.php'; // Inclure le contrôleur des utilisateurs

// Vérifier si un ID a été fourni pour l'utilisateur à modifier
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Créer une instance du contrôleur et récupérer les informations de l'utilisateur
    $usersController = new UsersController();
    $users = $usersController->listUsers();
    $userToEdit = null;

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            $userToEdit = $user;
            break;
        }
    }

    // Si le formulaire est soumis, mettre à jour les informations de l'utilisateur
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usersController->editUser($id, $nom, $prenom, $email, $password);

        header('Location: index.php'); // Rediriger vers la liste des utilisateurs
    }
} else {
    header('Location: index.php'); // Si aucun ID n'est fourni, rediriger vers la liste
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <h1>Modifier l'utilisateur</h1>
    <?php if ($userToEdit): ?>
        <form method="POST">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="<?= $userToEdit['nom'] ?>" required><br>

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" value="<?= $userToEdit['prenom'] ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $userToEdit['email'] ?>" required><br>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>L'utilisateur n'existe pas.</p>
    <?php endif; ?>
</body>
</html>
