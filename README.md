
# Inventory Manager

Inventory Manager is a Laravel-based inventory management system that includes two distinct interfaces:

* Admin Interface
* Customer Interface

---

## 1. Admin Interface

The admin dashboard provides complete control over the system with the following features:

* Create, edit, and delete products
* Manage categories
* View all customer orders
* View customer information and order history
* Upload product images
* Search for products by name
* View product inventory (quantity and stock levels)
* Assign products to categories

---

## 2. Customer Interface

The customer side of the system allows for simple and user-friendly interaction:

* Browse available products with images, prices, and descriptions
* Place new orders
* View order history

---

## Database Structure

### `users` table

* Stores system users (admins or regular users)
* Fields: `id`, `name`, `email`, `password`, `role`, timestamps

### `products` table

* Stores product information
* Fields: `id`, `name`, `description`, `price`, `quantity`, `image`, `category_id`, timestamps
* Relationships:

  * Belongs to a category
  * Belongs to many orders via a pivot table

### `categories` table

* Stores product categories
* Fields: `id`, `name`, timestamps
* Relationships:

  * Has many products

### `customers` table

* Stores customer information
* Fields: `id`, `name`, `email`, `phone`, `address`, timestamps
* Relationships:

  * Has many orders

### `orders` table

* Stores order records
* Fields: `id`, `customer_id`, timestamps
* Relationships:

  * Belongs to one customer
  * Has many products via the `order_product` table

### `order_product` table (pivot table)

* Connects orders and products
* Fields: `id`, `order_id`, `product_id`, `quantity`, `price`, timestamps

---

## Relationship Summary

| From     | Type         | To      |
| -------- | ------------ | ------- |
| Category | One to Many  | Product |
| Customer | One to Many  | Order   |
| Order    | Many to Many | Product |
| Product  | Many to Many | Order   |

---

[admin@example.com] password:password
