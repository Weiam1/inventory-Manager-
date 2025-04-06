# 🛒 Inventory Manager

A simple inventory management system built with **Laravel 12** and **Bootstrap 5**.

## 📋 Features

- Admin can:
  - Manage Products (CRUD)
  - Upload product images
  - Assign categories to products
  - Manage orders
- Customers can:
  - Browse products
  - Place orders (coming soon)
  - View order history (future)

## 🗃️ Database Structure

- **Users**: Admins and Customers (via roles or separate tables)
- **Products**: name, description, price, quantity, image, category
- **Categories**: related to products (1-to-many)
- **Orders**: related to customers (many-to-one)
- **Order_Product**: pivot table (many-to-many between orders and products)

## 🛠️ Technologies

- Laravel 12 (PHP 8.3)
- Bootstrap 5
- MySQL (via XAMPP)
- Composer
- Git & GitHub


