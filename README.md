# ☕ Coffee Shop Website

A PHP-based Coffee Shop Website project with user and admin functionality.  
This project allows customers to view products, add them to the cart, and place orders.  
Admins can manage products and monitor customer activities.

---

## 🚀 Features

### 👤 User
- Browse coffee products
- Add items to cart
- View cart and checkout
- Simple login/logout system

### 🛠️ Admin
- Add new products
- View available products
- Manage store inventory

---

## 🗂️ Project Structure
```
coffee/
│── admin/           # Admin pages (add product, view product, admin home)
│── user/            # User pages (cart, home, view cart)
│── css/             # Stylesheets
│── images/          # Product images
│── Documentation/   # Project documentation & diagrams
│── connection.php   # Database connection file
│── login.php        # Login page
│── logout.php       # Logout page
│── coffee_shop.sql  # Database file
│── .gitignore
```

---

## 💾 Database Setup
1. Open **phpMyAdmin** in XAMPP.
2. Create a new database named `coffee_shop`.
3. Import the `coffee_shop.sql` file into the database.
4. Update `connection.php` with your database username/password if needed.

---

## ⚙️ Requirements
- PHP 7.x or higher  
- MySQL (via XAMPP or WAMP)  
- Web browser (Chrome/Edge/Firefox)

---

## ▶️ How to Run
1. Download or clone this repo:
   ```bash
   git clone https://github.com/Ratneshh02/Coffee-Project.git
   ```
2. Move the folder to:
   ```
   C:/xampp/htdocs/coffee/
   ```
3. Start Apache and MySQL in XAMPP.
4. Open browser and visit:
   ```
   http://localhost/coffee/login.php
   ```

---

## 📷 Screenshots
(Add screenshots of your project here if you want!)

---

## 👨‍💻 Author
**Ratnesh Kotiya**  
[GitHub Profile](https://github.com/Ratneshh02)
