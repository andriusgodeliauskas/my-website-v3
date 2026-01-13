# Projekto "App-Website" Dizaino Atnaujinimo Darbai

Šiame dokumente aprašomi atlikti darbai siekiant atnaujinti `godeliauskas.com` (tema: `99fy`) svetainės dizainą.

## Atlikti Darbai

### 1. Pradinis CSS Dizaino Atnaujinimas (`style.css` papildymas)
*   **Produktų tinklelis:** Sutvarkytas produktų vaizdavimas naudojant `object-fit: cover`, kad nuotraukos būtų vienodo dydžio (250px aukščio) ir neišsikraipytų.
*   **Kortelių stilius:** Pridėti šešėliai, užapvalinti kampai ir „pakėlimo“ efektas užvedus pelytę.
*   **Tipografija:** Atnaujinti šriftai ir tarpai produktų pavadinimuose.

### 2. "Hero" Sekcijos (Pagrindinio Banerio) Kūrimas
*   **Struktūra:** Modifikuotas `header.php` failas, įterpiant naują HTML bloką, kuris rodomas **tik** pagrindiniame puslapyje (`is_front_page()`).
*   **Technologija:** Panaudota **Bootstrap 5** biblioteka (CDN) lankstaus tinklelio ir stiliaus užtikrinimui.
*   **Vaizdas:**
    *   Pradžioje bandyta daryti tekstą šalia nuotraukos.
    *   Vėliau pereita prie „overlay“ stiliaus: nuotrauka kaip fonas (per visą plotį), tekstas uždėtas ant viršaus.
    *   Pritaikytas tamsinimo filtras (`brightness(0.6)`), kad baltas tekstas būtų gerai įskaitomas.
    *   Nuotrauka (`hero-bg-dark.png`) rodoma natūraliu dydžiu (nesuspausta), atsisakyta `vh-100` apribojimo, kuris iškraipė vaizdą.

### 3. Headerio (Meniu) Modifikacijos
*   **Permatomumas:** Pagrindiniame puslapyje headeris padarytas visiškai permatomas (`background: transparent`) ir užkeltas ant „Hero“ nuotraukos (`position: absolute`).
*   **Teksto spalvos:**
    *   Meniu punktai ir logotipas priverstinai nustatyti balti (`#ffffff`) su „šešėliu“ geresniam skaitomumui.
    *   Užvedus pelytę („hover“), spalva keičiasi į žalią (`#96bf48`).
*   **Dropdown (Išskleidžiamas meniu):**
    *   Sutvarkyta problema, kai tekstas buvo baltas ant balto fono.
    *   Nustatyta tamsi teksto spalva (`#333333`) išskleidžiamam meniu.
    *   Pridėtas pilkas fonas ir žalia teksto spalva užvedus pelytę.

### 4. Logotipo Korekcijos
*   Pakeistas šrifto dydis į **24px**.
*   Nuimtas paryškinimas (`font-weight: normal`).

### 5. Turinio Atnaujinimas
*   **Tekstai:**
    *   Antraštė: "Hi, I'm Andrius."
    *   Aprašymas: "Tech enthusiast creating IT solutions for children's education and development."
    *   Pašalintas perteklinis užrašas "ANDRIUS G".
*   **Mygtukas:**
    *   Tekstas: "VIEW MY WORK".
    *   Nuoroda nukreipta į: `https://godeliauskas.com/product-category/web-desing/`.
    *   Pridėtas stilius, kad užvedus pelytę mygtukas taptų baltas su juodu tekstu.

## Failų Pakeitimai
Visi pakeitimai atlikti šiuose failuose (esančiuose `99fy` aplanke):
1.  **`header.php`**: Pagrindinė struktūra, Bootstrap CDN, Hero sekcijos HTML/CSS logika.
2.  **`style.css`**: (Papildomas) Bendriniai stiliaus pataisymai produktams ir meniu.
3.  **`images/hero-bg-dark.png`**: Naujas pagrindinis fono paveikslėlis.

---
*Dokumentas sukurtas: 2026-01-13*
