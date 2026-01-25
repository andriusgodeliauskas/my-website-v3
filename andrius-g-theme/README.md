# Andrius G. - Portfolio Theme Documentation

Ši tema yra sukurta specialiai Andriaus G. portfolio svetainei, naudojant modernią "Clean UI" estetiką, Tailwind CSS principus ir optimizuotą WooCommerce integraciją.

---

## 1. Atlikti Darbai

### Dizainas (Design System v3.0)
*   **Hero Sekcija:** "Full-width" (per visą plotį) nuotrauka su švariu, centruotu tekstu ir aiškiu raginimu veikti ("View My Work").
*   **Navigacija:** Dinaminis headeris – viršuje visiškai skaidrus, slenkant žemyn tampa baltas su "blur" efektu.
*   **Projektai (Showcase):** Produktų tinklelis pakeistas į dideles, vizualias korteles (2 stulpeliai), kurios pristato projektus kaip meno kūrinius.
*   **Vidiniai Puslapiai:**
    *   **About:** Švarus išdėstymas be rėmelių, didelė nuotrauka.
    *   **Contact:** Minimalistinis stilius su dideliais šriftais.
    *   **Project Detail:** Pritaikytas WooCommerce produkto puslapis, atrodantis kaip "Case Study".
*   **Mobilioji Versija:** Visi elementai optimizuoti mažiems ekranams (stack layout, dideli mygtukai).

### Techninis Išpildymas
*   Sukurta atskira WordPress tema **`andrius-g-theme`**, kad atnaujinimai nepaliestų originalios temos.
*   Panaudotas "agresyvus" CSS, priskirtas `#work` ID `page-landing.php` faile, kad perrašytų standartinius WooCommerce stilius ir sukurtų portfolio tinklelį.
*   Integracija su `do_shortcode` funkcijomis lankstčiam turinio valdymui.

---

## 2. Failų Struktūra

Visi failai yra aplanke `andrius-g-theme/`:

*   **`style.css`**: Pagrindinė temos informacija.
*   **`functions.php`**: Temos nustatymai, WooCommerce palaikymas.
*   **`header.php`**: Dinaminė navigacija su JavaScript slinkimo efektu.
*   **`footer.php`**: Minimalistinė puslapio apačia.
*   **`page-landing.php`**: Pagrindinis (Home) puslapio šablonas su visais blokais.
*   **`page.php`**: Šablonas vidiniams puslapiams (About, Contact).
*   **`index.php`**: Standartinis WordPress failas (privalomas).
*   **`images/`**: Aplankas su `hero-bg-dark.png` nuotrauka.
*   **`woocommerce/`**:
    *   `content-single-product.php`: Produkto detalus vaizdas.
    *   `cart/cart.php`: Krepšelio dizainas.
    *   `cart/cart-totals.php`: Krepšelio sumos dizainas.

---

## 3. Diegimo Instrukcija

1.  **Paruošimas:**
    *   Supakuokite aplanką `andrius-g-theme` į ZIP failą (`andrius-g-theme.zip`).

2.  **Įkėlimas:**
    *   Eikite į WordPress Admin -> **Appearance** -> **Themes**.
    *   Spauskite **Add New** -> **Upload Theme**.
    *   Pasirinkite ZIP failą ir įdiekite.
    *   Spauskite **Activate**.

3.  **Konfigūracija:**
    *   Eikite į **Pages** -> Susiraskite savo pagrindinį puslapį (pvz., "Home").
    *   Dešinėje pusėje, skiltyje **Page Attributes** -> **Template**, pasirinkite: **Landing Page (Full Width Light v3 - Final)**.
    *   Išsaugokite.

4.  **Meniu:**
    *   Eikite į **Appearance** -> **Menus**.
    *   Užtikrinkite, kad meniu punktai yra: Home, Projects (nuoroda į Shop), About, Contact.
    *   Priskirkite meniu lokacijai "Primary Menu".

---

## 4. Ateities Planas (Rekomendacijos)

*   **Kontaktų Forma:** Įdiegti "Contact Form 7" arba "WPForms" ir integruoti trumpąjį kodą į `page-landing.php` kontaktų sekciją, kad forma veiktų realiai.
*   **SEO Optimizacija:** Įdiegti "Yoast SEO" ir užpildyti meta aprašymus kiekvienam projektui.
*   **Greitaveika:** Įdiegti spartinimo (caching) įskiepį (pvz., WP Rocket), kad didelės nuotraukos krautųsi greičiau.

---
*Dokumentacija sukurta: 2026-01-25*
