# 🩺 Medical E-Commerce System

A simple Laravel-based medical e-commerce platform built as part of the NG Full Stack Developer Assessment.

---

## 🚀 Tech Stack

-   Laravel 11
-   Blade Templates
-   TailwindCSS
-   MySQL
-   Laravel Breeze (for Admin Auth)
-   jQuery + Toastr for UX

---

## 📦 Features

### 🛒 Customer Side

-   Product listing with “Add to Cart”
-   Cart page with quantity control & total
-   Guest checkout (no login required)
-   Order confirmation page

### 🛠 Admin Panel

-   Auth via Laravel Breeze
-   Product management (CRUD)
-   Order management
-   Product change logging via `product_logs` table

---

## 🛠 Setup Instructions

```bash
# Clone the repository
git clone https://github.com/your-username/medical-ecommerce.git
cd medical-ecommerce

# Install dependencies
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Configure DB in .env then:
php artisan migrate --seed
```
