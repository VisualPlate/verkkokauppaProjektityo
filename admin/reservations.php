<?php
$is_getId = false;
$order = null;
$json = null; 
$apiPath = null; 


if (isset($_GET["type"]) && $_GET["type"] === "id" && isset($_GET["text"]) && is_numeric($_GET["text"])) {
    

    $apiPath = "../../backend/api/get_orders.php?id=" . intval($_GET["text"]); 
    $json = @file_get_contents($apiPath);
    if ($json !== false) {
        $order = json_decode($json, true);
        if ($order) {
            $is_getId = true;
        }
    }
}
if ($json === false || $json === null) {
    echo "<!-- API error: Could not fetch data from $apiPath -->";
} else {
    echo "<!-- API response: $json -->";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/root.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="stylesheet" href="../admin/assets/css/admin.css">
    <title>Admin</title>
</head>
<body>
    <?php
    echo "<pre>";
print_r($order);
echo "</pre>";
?>
    <div class="max-1200">
        <?php
        require_once("includes/admin_nav.php");
        ?>
        <div class="main-content">
            <h1>Hallintapaneeli / Tilaukset</h1>
            <form method="get">
                <div class="search-nav">
                    <div class="search">
                        <select name="type" class="select-type">
                            <option value="id">ID</option>
                        </select>
                        <input type="text" name="text" class="textInput" required>
                    </div>
                    <div class="btn-search">
                        <button type="submit">Hae</button>
                    </div>
                </div>
            </form>
            <div class="output-div">
                <div class="output-headers">
                    <div>
                        <p>
                            TilausID
                        </p>
                    </div>
                    <div>
                        <p>
                            TilausPVM
                        </p>
                    </div>
                    <div>
                        <p>
                            Kokonaishinta
                        </p>
                    </div>
                    <div>
                        <p>
                            Tilauksen tila
                        </p>
                    </div>
                    <div>
                        <p>
                            Maksun tila
                        </p>
                    </div>
                </div>
                <?php
               if ($is_getId):
    if (isset($order[0])) {
        $orderRow = $order[0];
    } else {
        $orderRow = $order;
    }
?>
                    <div class="output-row rowJS" style="padding-inline:5px" id="r1">
                        <div>
                            <p id="r1-reservationID">
                         <?=htmlspecialchars($order["orderID"])?>
                            </p>
                        </div>
                        <div>
                            <p id="r1-reservationDate">
                          <?=htmlspecialchars($order["orderDate"])?>
                            </p>
                        </div>
                        <div>
                            <p id="r1-subtotal">
                           <?=htmlspecialchars($order["totalPrice"])?>
                            </p>
                        </div>
                        <div>
                            <p id="r1-reservationState">
                           <?=htmlspecialchars($order["orderStatus"])?>
                            </p>
                        </div>
                        <div>
                            <p id="r1-paymentState">
                           <?=htmlspecialchars($order["paymentStatus"])?>
                            </p>
                        </div>
                    </div>
                    <?php
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-div" id="popupBg" style="display:none;">
        <div class="middle-popup" id="popup">
            <div class="row space-between" style="background-color:#2b2b2b">
                <h1 id="popupHeader">Tilaus 1</h1>
                <button id="btnClose" class="btn-exit">X</button>
            </div>
            <div class="col" id="popupContent">
            </div>
        </div>
    </div>

    <script>

        const btnClose = document.getElementById("btnClose");
        const popup = document.getElementById("popup");
        const popupBg = document.getElementById("popupBg");

        const popupHeader = document.getElementById("popupHeader");
        //close function
        btnClose.addEventListener("click", function() {
            popupBg.style.display = "none";
        });
       
        document.querySelectorAll('.rowJS').forEach(row => {
            row.addEventListener('click', () => {

                const rowId = row.id;
                const reservationRowId = rowId + "-reservationID";
                const reservationElement =document.getElementById(reservationRowId);
                
                fetchOrdersPopup(reservationElement.textContent);

                popupHeader.textContent = "Tiedot riviltä: " + reservationElement.textContent;
                popupBg.style.display = "block";

            });
        });
    </script>
    <script src="assets/js/fetchOrdersPopup.js"></script>
</body>
</html>