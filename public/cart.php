<?php
session_start();
require_once '../backend/config/db_connect.php'; // Yhteys tietokantaan
require_once '../backend/helpers/auth.php';      // Tunnistautumisen apufunktiot
require_once '../backend/helpers/validation.php'; // Validointifunktiot
require_once '../backend/helpers/password_helper.php'; // Salasanan apufunktiot
include "header_footer/header.php";  // Include header
?>

<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ostoskori</title>
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Ostoskori</h1>
        </div>
        <div class="cart-box">
            <div id="cart-items">

            <!--cart items here-->
            </div>

            <div class="summary">
                <div class="summary-row">
                    <span>Välisumma</span>
                </div>
                <div class="summary-row">
                    <span>Toimitus samana päivänä</span>
                </div>
                <div class="summary-row total">
                    <span>Yhteensä</span>
                </div>
            </div>
            <button class="checkout-btn">Maksa</button>
        </div>
    </div>
</body>
</html>