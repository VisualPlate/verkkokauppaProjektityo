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
                        <button type="submit">Hae</button>
                    </div>
                </div>
            </form>
            <div class="output-div">
                <div class="output-headers">
                    <div>
                        <p>
                            id
                        </p>
                    </div>
                    <div>
                        <p>
                        etunimi
                        </p>
                    </div>
                    <div>
                        <p>
                        Sukunimi
                        </p>
                    </div>
                    <div>
                        <p>
                        Email
                        </p>
                    </div>
                    <div>
                        <p>
                        PuhNro
                        </p>
                    </div>
                    <div>
                        <p>
                        Tyyppi
                        </p>
                    </div>
                    <div>
                        <p>
                        liittymisPvm
                        </p>
                    </div>
                    <div>
                        <p>
                        tiedot
                        </p>
                    </div>
                </div>
                <div class="output-row">
                    <div>
                        <p>
                        1
                        </p>
                    </div>
                    <div>
                        <p>
                        nimi
                        </p>
                    </div>
                    <div>
                        <p>
                        sukunen
                        </p>
                    </div>
                    <div>
                        <p>
                        at@at.at
                        </p>
                    </div>
                    <div>
                        <p>
                        990908908
                        </p>
                    </div>
                    <div>
                        <p>
                        aktiivinen
                        </p>
                    </div>
                    <div>
                        <p>
                        20-11-2025
                        </p>
                    </div>
                    <div>
                        <p>
                        tiedot
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>