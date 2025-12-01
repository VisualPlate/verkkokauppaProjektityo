<?php
session_start();
require_once '../backend/config/db_connect.php'; // Yhteys tietokantaan
require_once '../backend/helpers/auth.php';      // Tunnistautumisen apufunktiot
require_once '../backend/helpers/validation.php'; // Validointifunktiot
require_once '../backend/helpers/password_helper.php'; // Salasanan apufunktiot
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuotteet</title>
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/items.css">
</head>
<body>
    <?php
    
    include "header_footer/header.php";  // Include header
    ?>
    <div class="container">
        <div class="header">
            <h2 class="top-margin">Tuotteet</h2>
        </div>
        <div class="col">
            <?php
            // Fetch from API
            $url = "http://localhost/verkkokauppaProjektityo/backend/api/products/get_products.php";

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
                <div class="row space-between nav-align">
                    <h1 class="top-margin"><?=$category["categoryName"]?></h1>
                    <a href="categories.php?category=<?=$category["categoryName"]?>" class="check-btn" style="width:120px">Enemmän</a>
                </div>
                
                <div class="categoryRow row top-margin">
                <?php
                foreach ($category['products'] as $product):?>

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
                                <form method="post">
                                    <button type="button" class="check-btn">Lisää ostoskoriin</button>
                                </form>
                            </div>
                        </div>
                        </a>
                    <?php endforeach?>
                    </div>
                <?php endforeach?>
            </div>
        </div>
    </div>
</body>
</html>