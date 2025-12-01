<!-- Hae kaikki tuotteet TODO: tee sama muille -->
<?php
require_once "../../config/db_connect.php";

<<<<<<< Updated upstream
$stmt = $pdo->query("SELECT * FROM products");
echo json_encode($stmt->fetchAll());
=======

$query = "
SELECT 
    p.*,
    pi.imagePath
    c.
FROM products p
LEFT JOIN product_images pi
    ON pi.productID = p.productID
LEFT JOIN category c
    ON p.categoryID = c.categoryID
GROUP BY p.productID;
";
// Yhteys ja kyselyn suoritus
try {
    $conn = getDBConnection();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    // Hae kaikki tulokset
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Näytä virhe tai tilaukset
    if (empty($orders)) {
        echo json_encode(["message" => "No orders found"]);
    } else {
        // Palauta tilaukset JSON-muodossa
        echo json_encode($orders);
    }
} catch (PDOException $e) {
    // Virhenkäsittely
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
>>>>>>> Stashed changes
?>