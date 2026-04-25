# 🏋️ E's GYM — Website Projekti

Faqe web për menaxhimin e palestrës **E's GYM**, ndërtuar me PHP, HTML, CSS dhe JavaScript si projekt.

## 🛠️ Teknologjitë

- **PHP** — logjika e backend-it, OOP, Sessions, Cookies
- **HTML5 / CSS3** — struktura dhe dizajni
- **JavaScript** — interaktiviteti (cart, animacionet)
- **SweetAlert2** — njoftimet vizuale
- **XAMPP** — server lokal (Apache + PHP)

---

## 📁 Struktura e Projektit

```
GYMWEBSITE-Ueb26_GR23/
│
├── index.php                  # Ridrejton te faqja kryesore
├── login.php                  # Forma e kyçjes
├── logout.php                 # Dalja nga llogaria
│
├── classes/
│   ├── User.php               # Klasa User (OOP, autentifikim)
│   └── gymclass.php           # Klasat GymClass & PremiumClass (trashëgimi)
│
├── pages/
│   ├── kreu.php               # Faqja kryesore (Home)
│   ├── dashboard.php          # Paneli i anëtarit/admin
│   ├── pakot.php              # Lista e pakove
│   ├── 1vitantarsim.php       # Pako 1 vit anëtarësim
│   ├── pakodiaspora.php       # Pako për diasporën
│   ├── oferta3n1.php          # Oferta 3 në 1
│   ├── allacsses.php          # Të gjitha klasat
│   ├── diet.php               # Planet e dietës
│   └── kontakti.php           # Forma e kontaktit
│
├── headeri/
│   ├── header.php             # Header global (nav, meta)
│   └── footeri.php            # Footer global
│
├── assets/
│   └── fotot/                 # Imazhet e faqes
│
├── pjesa_css/                 # Stilet CSS për çdo faqe
│
└── Pjesa_JS/                  # Skriptet JavaScript
```

---

## ⚙️ Instalimi

### Hapat

1. **Klono projektin** te folderi `htdocs` i XAMPP:

```bash
cd C:\xampp\htdocs
git clone https://github.com/ervinni7/GYMWEBSITE-Ueb26_GR23.git
```

2. **Nis XAMPP** — aktivizo **Apache**

3. **Hap në browser:**

```
http://localhost/GYMWEBSITE-Ueb26_GR23/pages/kreu.php
```

> **Shënim:** Projekti nuk kërkon databazë — të dhënat janë hardcoded në klasa PHP.

---

## 🔑 Kredencialet Demo

| Roli | Emri | Fjalëkalimi |
|------|------|-------------|
| 👑 Admin | `admin` | `admin123` |
| 🏋️ Anëtar | `member` | `member123` |

---

## 📄 Faqet

| Faqja | URL | Përshkrimi |
|-------|-----|------------|
| Kreu | `/pages/kreu.php` | Faqja kryesore me info për palestrën |
| Login | `/login.php` | Kyçja në sistem |
| Dashboard | `/pages/dashboard.php` | Panel personal (kërkon kyçje) |
| Pakot | `/pages/pakot.php` | Të gjitha pakot e disponueshme |
| Dietat | `/pages/diet.php` | 6 plane dietike të strukturuara |
| Kontakti | `/pages/kontakti.php` | Forma e kontaktit |

---


## 👥 Antarët e Grupit
Ervin Nimani

Euron Ademaj

Erjon Ismajli

Erion Meshi
