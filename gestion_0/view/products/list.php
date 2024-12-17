<?php

require_once 'controller/productsController.php';

$productsController = new ProductsController();
$products = $productsController->listProducts();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Liste des produits</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= $product['nom'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['prix'] ?></td>
                <td><?= $product['quantite'] ?></td>
                <td><?= $product['id_categorie'] ?></td>
                <td>
                    <a href="edit_product.php?id=<?= $product['id'] ?>">Modifier</a> | 
                    <a href="delete_product.php?id=<?= $product['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="add_product.php">Ajouter un produit</a>
</body>
</html>
