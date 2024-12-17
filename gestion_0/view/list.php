<?php
require_once 'controller/usersController.php';

$usersController = new usersController();
$users = $usersController->listUsers();  // Récupère la liste des utilisateurs depuis le contrôleur

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if (isset($users) && is_array($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nom'] ?></td>
                    <td><?= $user['prenom'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $user['id'] ?>">Modifier</a> |
                        <a href="delete_user.php?id=<?= $user['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun utilisateur trouvé</td>
            </tr>
        <?php endif; ?>
    </table>

    <br>
    <a href="add_user.php">Ajouter un utilisateur</a>
</body>
</html>
