# Inventory Manager

A full-featured inventory management system built with **Laravel 12** and **Bootstrap 5**, designed to handle product, category, and order management for both administrators and customers.

## Overview

This system provides two separate interfaces with tailored functionalities:
- **Admin Interface** for managing the inventory.
- **Customer Interface** for browsing and placing orders.

---

## 1. Admin Interface

Admins have access to full control of the system. Key features include:

- Create, edit, and delete **products**.
- Upload and display product **images**.
- Create and manage **categories**.
- Assign products to specific **categories**.
- View and manage all **orders**.
- View **customer details**.
- Search products by **name**.
- View product **inventory**, including quantity in stock.

---

## 2. Customer Interface

Customers can interact with the system in a simplified manner. Features include:

- Browse a list of **available products**, with image, description, and price.
- Add products to a **shopping cart** (optional for future development).
- Place **orders** through a checkout system.
- View their **order history** from their profile page.

---

## Database Structure

### `users` table
- Stores admin and customer login data.
- Fields: `id`, `name`, `email`, `password`, `role`, `timestamps`.

### `products` table
- Product catalog data.
- Fields: `id`, `name`, `description`, `price`, `quantity`, `image`, `category_id`, `timestamps`.

### `categories` table
- Product category list.
- Fields: `id`, `name`, `timestamps`.

### `customers` table
- Stores customer-specific details.
- Fields: `id`, `name`, `email`, `phone`, `address`, `timestamps`.

### `orders` table
- Tracks each customer’s orders.
- Fields: `id`, `customer_id`, `timestamps`.

### `order_product` table (pivot)
- Links orders with products.
- Fields: `id`, `order_id`, `product_id`, `quantity`, `price`, `timestamps`.

---

## Relationships

| From       | Type          | To              |
|------------|---------------|-----------------|
| Category   | 1 to many     | Product          |
| Customer   | 1 to many     | Order            |
| Order      | many to many  | Product (via pivot) |
| Product    | many to many  | Order (via pivot)  |

---

## Technologies Used

- **Laravel 12 (PHP 8.3)**
- **Bootstrap 5**
- **MySQL** (via XAMPP)
- **Composer**
- **Git & GitHub**
- **Blade** templating engine

---

## Notes

- Admin and Customer roles are enforced via conditional rendering and middleware.
- Product images are stored in the `/public/images` directory.
- Full responsive UI built using Tailwind CSS and Bootstrap classes.

---

## How to Run

1. Clone the repository
2. Run `composer install`
3. Set up `.env` and configure DB
4. Run `php artisan migrate --seed`
5. Launch the server with `php artisan serve`
6. Log in using a seeded admin account or register a customer

---

For any issues or suggestions, feel free to open an issue or contribute to the repository.
