<?php

require_once 'controller/productsController.php';
require_once 'controller/categoriesController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $productsController = new ProductsController();
    $products = $productsController->listProducts();
    $productToEdit = null;

    foreach ($products as $product) {
        if ($product['id'] == $id) {
            $productToEdit = $product;
            break;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        $categorie_id = $_POST['categorie_id'];

        $productsController->editProduct($id, $nom, $description, $prix, $quantite, $categorie_id);

        header('Location: index_products.php');
    }
} else {
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
    <title>Modifier un produit</title>
</head>
<body>
    <h1>Modifier le produit</h1>
    <?php if ($productToEdit): ?>
        <form method="POST">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="<?= $productToEdit['nom'] ?>" required><br>

            <label for="description">Description:</label>
            <input type="text" name="description" value="<?= $productToEdit['description'] ?>" required><br>

            <label for="prix">Prix:</label>
            <input type="number" name="prix" value="<?= $productToEdit['prix'] ?>" step="0.01" required><br>

            <label for="quantite">Quantité:</label>
            <input type="number" name="quantite" value="<?= $productToEdit['quantite'] ?>" required><br>

            <label for="categorie_id">Catégorie:</label>
            <select name="categorie_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $productToEdit['id_categorie'] ? 'selected' : '' ?>><?= $category['libelle'] ?></option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>Le produit n'existe pas.</p>
    <?php endif; ?>
</body>
</html>
