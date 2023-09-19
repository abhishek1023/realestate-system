Certainly! Below is the revised `README.md` file without mentioning Vue.js but indicating that you could add it in the future given more time.

---

# Property Management System

A Laravel-based web application for managing properties. This project uses Laravel for the back-end and Blade for the front-end. It allows users to view, add, edit, and delete properties, as well as search properties by various parameters.

## Technologies Used

- PHP
- Laravel
- MySQL

## Requirements

- PHP >= 7.4
- Composer
- MySQL

## Setup Instructions

1. Clone the repository:

   ```
   git clone https://github.com/your-github/property-management-system.git
   ```

2. Navigate into the project directory:

   ```
   cd property-management-system
   ```

3. Install PHP dependencies:

   ```
   composer install
   ```

4. Create an `.env` file and configure your database:

   ```
   cp .env.example .env
   ```

   Edit the `.env` file and set your database credentials.

5. Run database migrations:

   ```
   php artisan migrate
   ```

6. Run the Laravel development server:

   ```
   php artisan serve
   ```

## Features

### Backend

- API to fetch properties from a remote source
- Bulk insertion and updating of properties into the MySQL database
- Relationships between properties and property details

### Frontend

- Listing of all properties via Blade templates
- Search properties by:
  - Name
  - Number of Bedrooms
  - Price
  - Property Type
  - For Sale / For Rent

### Commands

Sync properties from remote API to local database:

```
php artisan SyncProperties
```

## Routes

- `GET /properties`: List and search properties.
- `GET /properties/create`: Form for adding a new property.
- `POST /properties`: Add a new property.
- `GET /properties/{uuid}`: View single property details.
- `GET /properties/{uuid}/edit`: Edit a property.
- `PUT /properties/{uuid}`: Update a property.
- `DELETE /properties/{uuid}`: Delete a property.

## Future Improvements

If given more time, I would implement Vue.js for a more interactive front-end and would also work on completing extra credit tasks.

---

