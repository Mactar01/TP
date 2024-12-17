<?php

require_once 'controller/productsController.php';
require_once 'controller/categoriesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $categorie_id = $_POST['categorie_id'];

    $productsController = new ProductsController();
    $productsController->addProduct($nom, $description, $prix, $quantite, $categorie_id);

    header('Location: index_products.php');
}

$categoriesController = new CategoriesController();
$categories = $categoriesController->listCategories();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form method="POST">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br>

        <label for="description">Description:</label>
        <input type="text" name="description" required><br>

        <label for="prix">Prix:</label>
        <input type="number" name="prix" step="0.01" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" name="quantite" required><br>

        <label for="categorie_id">Catégorie:</label>
        <select name="categorie_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['libelle'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
