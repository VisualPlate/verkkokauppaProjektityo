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
    <div class="max-1200">
        <div class="side-nav">
            <div class="side-nav-top">
                <div class="side-nav-content">
                    Tilaukset
                </div>
                <div class="side-nav-content">
                    Tuotteet
                </div>
                <div class="side-nav-content">
                    Käyttäjät
                </div>
            </div>
            <div class="side-nav-bot">
                <div class="side-nav-content">
                    Username
                </div>
            </div>
        </div>
        <div class="main-content">
            <h1>Hallintapaneeli / Aloitus</h1>
            <form method="get">
                <div class="search-nav">
                    <div class="search">
                        <select name="type" class="select-type">
                            <option value="val1">Tyyppi</option>
                        </select>
                        <input type="text" name="text" class="textInput" required>
                    </div>
                    <div class="btn-search">
                        Hae
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>