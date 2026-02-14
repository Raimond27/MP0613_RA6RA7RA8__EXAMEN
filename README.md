# Eloquent Pizzeria (Laravel)

A simple pizza ordering system demo built with Laravel and Eloquent ORM. It includes user/admin flows, pizza management, order processing, and role-based access control with admin dashboard.



## Overview
- User authentication and profile management
- Client and admin role-based access control
- Browse and view pizza catalog with descriptions and pricing
- Create and manage pizza orders with customizable options
- Admin dashboard with statistics and management tools
- Admin pizza management (create, read, update, delete)
- Admin order management and order tracking

## Tech Stack
- Laravel (PHP)
- MySQL (via XAMPP)
- Composer
- Bootstrap (views)

## Prerequisites
- PHP 7.3+ (XAMPP recommended)
- MySQL running (XAMPP)
- Composer installed
- enabled extension=gd configured php.ini

## Setup
1. Clone the repository:

```bash
   git clone https://github.com/Stucom-Pelai/MP0613_RA6RA7RA8_Eloquent-Pizzeria.git
```

2. Install Composer dependencies:

```bash
composer install
```

3. Copy the example enviroment file:

```bash
cp .env.example .env
```

4. Generate an application key

```bash
php artisan key:generate
```

5. Create a symbolic link from 'public/storage' to 'storage/app/public'

```bash
php artisan storage:link
```

6. Clear compiled view files

```bash
php artisan view:clear
```

7. Create mp0613_pizzeria database


8. Run migrations and seed the database

```bash
php artisan migrate:fresh --seed
```

9. Start the Laravel development server 

```bash
php artisan serve
```

10. You are all set


## User Flows
### Client Flow
1. Login as a client user
2. Redirected to home page with pizza catalog
3. Click on pizza to view details (name, type, base, description, price, toppings)
4. Navigate to "Orders" to create new order
5. Select pizza from catalog and submit order
6. View your order history with created date and order details

### Admin Flow
1. Login as admin user
2. Redirected to admin dashboard
3. View dashboard statistics (total pizzas, orders, clients, total sales)
4. Manage Pizzas: Create, read, edit, delete pizzas with image selection and topping management
5. Manage Orders: View all orders from all clients, see order details, delete orders


