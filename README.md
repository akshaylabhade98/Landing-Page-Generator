# 🛠️ Landing Page Generator (PHP + SweetAlert2)

This project is a **PHP-based Landing Page Generator** that allows users to upload assets, logos, and generate HTML-based campaign pages dynamically. It features:

- ✅ File upload with validation
- ✅ SweetAlert2 integration for beautiful alerts
- ✅ Directory listing of campaigns
- ✅ Auto-generated HTML file storage
- ✅ Fully responsive Bootstrap UI

---

## 🚀 Features

- Upload and manage:
  - Campaign HTML files
  - Logo (SVG, PNG)
  - Asset files (images, scripts, etc.)
- List all uploaded campaigns with timestamp
- Open generated campaigns in a new tab
- Alerts for all actions (success/fail/multiple errors) using [SweetAlert2](https://sweetalert2.github.io/)
- Bootstrap-powered layout for modern UI/UX

---

## 🧠 Tech Stack

- PHP (Core, no frameworks)
- HTML5, Bootstrap 4
- SweetAlert2 for alerts
- JS + jQuery (optional)
- No DB required (file-based structure)

---

## 📂 Folder Structure

```bash
Landing-page-generator/
│
├── assets/              # Uploaded assets (images, CSS, JS)
├── campaigns/           # Generated campaign HTML files
├── logo/                # Uploaded logo files
├── screenshots/         # Screenshots for demo/README
├── index.php            # Main landing generator script
├── upload_logo.php      # Handles logo upload
├── upload_asset.php     # Handles asset upload
├── create_campaign.php  # Handles campaign HTML creation
├── style.css            # Custom styling
├── README.md
```


---

## 🔐 Configuration – `important.php`

The `important.php` file allows you to customize application behavior without editing the core logic.

```php
<?php
$users = [
    "akshay" => "Aksh@y9850",
    "admin" => "Aksh@y9850"
];

$base_url = "http://localhost/IMP/Page_Generator";

$Privacy_Policy_link = "#";
$Unsubscribe_link = "#";
$Company_name = "Company name";
?>
```

---

Variable	Purpose

$users	Associative array of usernames and passwords

$base_url	Root path of the app used for redirects and links

$Privacy_Policy_link	Default link in generated email templates

$Unsubscribe_link	Optional unsubscribe link (used in email footers)

$Company_name	Default company name used in templates

🛡️ Note: Never upload this file to a public repository with real credentials.

---

🚀 How to Run Locally

Clone or download the repo

Place it in your htdocs if using XAMPP/WAMP

Navigate to http://localhost/IMP/Page_Generator/login.php

Login with credentials from important.php

Start uploading logos, assets, and generate campaigns

---

📥 File Upload Rules
Allowed formats: PNG, SVG

Max file size: 2MB

Duplicate filenames will trigger an alert

---

💡 Future Enhancements

Drag & Drop upload

Campaign preview editor with templates

---

📜 License

This project is open for educational and private use only. For commercial use, please contact the author.

---

🧑‍💻 Author

Akshay Labhade

📧 akshaylabhade98@gmail.com
