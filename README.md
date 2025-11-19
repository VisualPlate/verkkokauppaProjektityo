# 🥕 Lähiruoan Verkkokauppa – FreshLocal Market

Lähiruoan verkkokauppa on projekti, jonka tarkoituksena on tuoda **lähitilojen tuore ja jäljitettävä ruoka helposti kuluttajien saataville**.  
Sivustolla käyttäjä näkee lähialueen tuottajien valikoiman, tuotteen alkuperän sekä voi tilata ruoan kotiovelleen **kylmäpakattuna ja tuoreena**.

---

## 📌 Projektin tavoite

Projektin päätavoitteena on luoda moderni ja käyttäjäystävällinen verkkopalvelu, joka:

- näyttää käyttäjälle **lähitilojen tuotteet**, niiden **saatavuuden** ja **alkuperän**
- tarjoaa läpinäkyvän tuotetiedon (tuottaja, sijainti, tuotantotapa, tuoreus)
- mahdollistaa **kertatilaukset** sekä **viikottaiset tilauskset** (esim. "viikottainen ruokakassi")
- toimittaa tuotteet **kotiin kylmäpakattuina**
- tukee paikallista ruoantuotantoa ja vähentää ruokaketjun välikäsiä

---

## 🛠 Käytetyt teknologiat

| Teknologia | Käyttötarkoitus |
|------------|-----------------|
| **HTML** | Sivuston rakenne |
| **CSS** | Ulkoasu ja responsiivinen muotoilu |
| **JavaScript** | Dynaaminen sisältö, toiminnot, tilausten käsittely logiikka |
| **MySQL** | Tuotteiden, käyttäjien ja tilausten tietokanta |

---

## 📦 Keskeiset ominaisuudet

### 🥬 **Tuotteen näkyvyys ja alkuperä**
- Jokaisella tuotteella näkyy:
  - tuottajan nimi  
  - tila / maatila  
  - tuoreus ja saatavuus  
  - tuotteen alkuperätiedot  
  - arvioitu toimitusaika  

### 📦 **Kylmäpakattu kotiinkuljetus**
- Automatisoitu tilaussysteemi, jossa käyttäjä voi valita toimituspäivän  
- Tuotteet toimitetaan tuoreina ja kylmäketjun mukaisesti

### 🗓 **Viikottaiset tilaukset**
- Käyttäjä voi luoda toistuvan tilauksen (esim. viikoittainen ruokakassi)  
- Tilaus voidaan peruuttaa tai muokata helposti omilta sivuilta  

### 🧺 **Ostoskorijärjestelmä**
- Lisää tuotteita ostoskoriin  
- Muokkaa määriä  
- Näkee hinnan ja toimituskulut reaaliajassa  

### 👤 **Käyttäjätili**
- Rekisteröityminen ja sisäänkirjautuminen  
- Omat tiedot & toimitusosoitteet  
- Omat tilaukset & historia  

---

## 🗄 Tietokantarakenne (MySQL)

Tietokanta koostuu esimerkiksi seuraavista tauluista:

- **users** – käyttäjät, tunnukset ja osoitteet  
- **products** – lähituotteet, alkuperä ja tuotetiedot  
- **orders** – yksittäiset tilaukset  
- **order_items** – mitä tuotteita kukin tilaus sisältää  
- **farms** – tuottajat ja maatilat  

> Tietokantarakenne kasvaa projektin edetessä.

---

## 📈 Projektin tila

Tämä projekti on kehityksessä.
Uusia ominaisuuksia lisätään jatkuvasti.

## 💡 Tulevia ominaisuuksia

Tavaroiden varastosaldo reaaliajassa

Arvostelut ja suositukset

---

## 🚀 Asennus & Käyttöönotto

1. **Kloonaa repositorio**
   ```bash
   git clone https://github.com/kayttaja/projekti.git
