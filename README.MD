# 📬 Contact Form – PHP + TailwindCSS

A responsive and minimal contact form created using **PHP** (for backend + database), **TailwindCSS** (for styling), and optionally **JavaScript** (for validation).  
It allows users to send messages via email and save them into a MySQL database.

<br>

## 🚀 Features

- ✅ Form validation in PHP and JS  
- ✅ Email sending via PHP `mail()` function  
- ✅ Saving data into MySQL database  
- ✅ Responsive Tailwind CSS design  
- ✅ Minimalistic UI

<br>

## 🛠 Technologies Used

- **HTML5**, **CSS3**, **TailwindCSS**
- **PHP 8+**
- **MySQL / MariaDB**
- **JavaScript (optional validation)**
- Works on [CT8.pl](https://ct8.pl) free hosting

<br>

## 📂 File Structure

```

.
├── dist/
│   └── output.css            # Tailwind compiled CSS
├── src/
│   └── input.css             # Tailwind input file
├── index.php                 # Main contact form + PHP logic
├── database.php              # MySQL connection file
├── save\_data.php             # (Optional) separate POST handler
├── app.js                    # JS form validation (optional)
├── package.json              # Tailwind / NPM config
└── README.md                 # This file

````

<br>

## 📦 Installation

```bash
git clone https://github.com/yourusername/contact-form.git
cd contact-form
npm install
npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch
````

> 💡 Make sure Tailwind is building to `dist/output.css` and linked in `<head>`.

<br>

## 🔌 Database Setup

Create a table `data` in your MySQL database:

```sql
CREATE TABLE data (
  id INT PRIMARY KEY AUTO_INCREMENT,
  Name VARCHAR(100),
  Surname VARCHAR(100),
  Email VARCHAR(100),
  Message TEXT
);
```

Update `database.php` with your credentials:

```php
define('HOST', 'localhost');
define('USER_NAME', 'your_db_user');
define('USER_PASS', 'your_db_pass');
define('DB_NAME', 'your_db_name');
```

<br>

## 📤 Email Setup

Make sure the `mail()` function is enabled on your server.
Alternatively, replace it with **PHPMailer** for SMTP support (e.g., Gmail).


<br>

## 📧 Demo

**Live preview:** *[contact-form.ct8.pl](http://contact-form.ct8.pl)*
You can test sending a message, and it will be saved + optionally sent to your email.

<br>

## 🧑‍💻 Author

Konrad Malinowski
[http://konradmalinowski.ct8.pl](http://konradmalinowski.ct8.pl) • [GitHub](https://github.com/konradxmalinowski)
