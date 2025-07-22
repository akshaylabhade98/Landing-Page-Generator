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

⚙️ Setup Instructions
Clone or Download the Repo
```bash
git clone https://github.com/yourusername/landing-page-generator.git
```
Place It on a PHP Server
Upload to Apache/Nginx web root or run using PHP's built-in server:
```bash
php -S localhost:8000
```
Make Directories Writable
```bash
chmod -R 755 assets/ campaigns/ logo/
```

Access via Browser

http://localhost:8000/


💡 Future Enhancements

Drag & Drop upload

Campaign preview editor with templates


🧑‍💻 Author

Akshay Labhade

📧 akshaylabhade98@gmail.com
