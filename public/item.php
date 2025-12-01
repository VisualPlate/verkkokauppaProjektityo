<?php
session_start();
require_once '../backend/config/db_connect.php'; // Yhteys tietokantaan
require_once '../backend/helpers/auth.php';      // Tunnistautumisen apufunktiot
require_once '../backend/helpers/validation.php'; // Validointifunktiot
require_once '../backend/helpers/password_helper.php'; // Salasanan apufunktio

if (isset($_GET["productId"]) && is_numeric($_GET["productId"])) {
    $id = $_GET["productId"];
} else {
    header("location: items.php");
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuote</title>
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/item.css">
</head>
<body>
    <?php
    include "header_footer/header.php";  // Include header
    
    // Fetch from API
    $url = "http://localhost/verkkokauppaProjektityo/backend/api/products/get_product.php?productId=$id";

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
    }
    // Loops each item and show them to user
    foreach ($data["categories"] as $category):
    ?>
        <?php
        foreach ($category['products'] as $product):?>

            <div class="container">
                <div class="cart-box"> 
                <div class="left-section">
                    <h1><?=$product["name"]?></h1>
                    <div class="price"><?=$product["price"]?>€</div>
                    
                    <p class="description">
                        <?=$product["descr"]?>
                    </p>
                    
                    <div class="features">
                        Varastossa <?=$product["stock"]?>
                    </div>

                    <form method="post">
                        <div class="quantity-section">
                            <div class="quantity-control">
                                    <button class="quantity-btn">−</button>
                                    <div class="quantity-display" name="amount">1</div>
                                    <button class="quantity-btn">+</button>
                            </div>
                            <button class="add-to-cart-btn">Lisää ostoskoriin</button>
                        </div>  
                    </form>

                    <div class="delivery-info">
                        Toimitus samana päivänä 
                    </div>
                </div>

                <div class="right-section">
                    <div class="breadcrumb">
                        <a href="items.php">Tuotteet</a> / <a href="categories.php?category=<?=$category["categoryName"]?>"><?=$category["categoryName"]?></a> / <?=$product["name"]?>
                    </div>
                    <a href="items.php" class="back-btn">Takaisin</a>
                    <img src="assets/<?=$product["imagePath"]?>" alt="">
                </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
    <?php endforeach?>
    
    
</body>
</html>