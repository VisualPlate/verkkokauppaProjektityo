/verkkokauppaProjektityo/
|
|-- /backend/                 # Tai /includes/, /lib/, /src/
|   |-- db_connection.php     # Tietokantayhteys
|   |-- functions.php         # Yleiset funktiot (esim. ostoskori)
|   |-- process_order.php     # Tilausten käsittelylogiikka
|
|-- /frontend/
|   |-- /assets/              # Tai /public/
|   |   |-- /css/
|   |   |   `-- style.css
|   |   |-- /js/
|   |   |   `-- main.js
|   |   `-- /images/
|   |       |-- logo.png
|   |       `-- /products/
|   |           `-- lihatuote1.jpg
|   |
|   |-- /header_footer/
|   |   |-- header.php
|   |   `-- footer.php
|   |
|   |-- index.php             # Etusivu
|   |-- products.php          # Tuotesivu
|   `-- cart.php              # Ostoskori
|
`-- config.php                # Konfiguraatiotiedosto (esim. tietokannan tunnukset)
