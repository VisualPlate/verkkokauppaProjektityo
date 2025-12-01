<?php
session_start();
require_once '../backend/config/db_connect.php'; // Yhteys tietokantaan
require_once '../backend/helpers/auth.php';      // Tunnistautumisen apufunktiot
require_once '../backend/helpers/validation.php'; // Validointifunktiot
require_once '../backend/helpers/password_helper.php'; // Salasanan apufunktiot

if (isset($_GET["category"])) {
    $category = $_GET["category"];
} else {
    header("location: items.php");
}
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuotteet</title>
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/categories.css">
</head>
<body>
    <?php
    include "header_footer/header.php";  // Include header
    // Fetch from API
    $url = "http://localhost/verkkokauppaProjektityo/backend/api/products/get_products_by_category.php?category=$category";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);
    curl_close($ch);

    // Decode JSON to associative array
    $data = json_decode($result, true);

    // Check if decoding worked
    if (!$data) {
        echo "Invalid JSON or empty response";
        exit;
    }?>

    <div class="container">
        <div class="header">
            <h2 class="top-margin">Tuotteet / <?=$category?></h2>
        </div>
        <div class="col">
            <div class="row space-between nav-align">
                <h1 class="top-margin"><?=$category?></h1>
                <a href="items.php" class="check-btn" style="width:120px">Takaisin</a>
            </div>
            <div class="categoryRow top-margin">
    <?php
    // Loops each item and show them to user
    foreach ($data["categories"] as $category):
    ?>
                <?php
                foreach ($category["products"] as $product):
                ?>
                    <a href="item.php?productId=<?=$product["productID"]?>" style="all:unset;cursor:pointer">
                        <div class="col space-between box">
                            <div id="row-items">
                                <img src="assets/<?=$product["imagePath"]?>" alt="Kuva" class="product-img">
                                <div class="row space-between nav-align">
                                    <h2><?=$product["name"]?></h2>
                                    <h4><?=$product["price"]?></h4>
                                </div>
                            </div>
                            <div class="row space-between">
                                <button class="check-btn">Lisää ostoskoriin</button>
                            </div>
                        </div>
                            </a>
                <?php
                endforeach
                ?>
        <?php endforeach?>
        </div>
    </div>
</body>
</html>