<?php
header("Content-Type: application/json");

require_once "../../config/db_connect.php";

$pdo = getDBConnection();

if (isset($_GET["productId"])) {


// Haetaan kategoriat + tuotteet yhdellä kyselyllä
$stmt = $pdo->prepare("
    SELECT 
        c.categoryID,
        c.categoryName,
        p.productID,
        p.name AS productName,
        p.price,
        pi.imagePath,
        p.stock,
        p.descr
    FROM categories c
    LEFT JOIN products p ON p.categoryID = c.categoryID
    LEFT JOIN product_images pi ON p.productID = pi.productID
    WHERE p.productID = :id
    ORDER BY c.categoryName, p.name;
");
$stmt->bindValue(":id", $_GET["productId"], PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories = [];

// Hakee kaikkki tuotteet ja niiden tiedot tietokannasta
foreach ($rows as $row) {

    $catId = $row['categoryID'];

    if (!isset($categories[$catId])) {
        $categories[$catId] = [
            'categoryID' => $row['categoryID'],
            'categoryName' => $row['categoryName'],
            'products' => []
        ];
    }

    if ($row['productID']) {
        $categories[$catId]['products'][] = [
            'productID' => $row['productID'],
            'name' => $row['productName'],
            'price' => $row['price'],
            'stock' => $row['stock'],
            'imagePath' => $row['imagePath'],
            'descr' => $row['descr']
        ];
    }
}

// Lähettää vastauksen json muodossa
echo json_encode([
    "success" => true,
    "categories" => array_values($categories)
]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Invalid input"
    ]);
}