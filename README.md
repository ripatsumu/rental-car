# Car Rental Website Project

## Overview

This is a car rental website project developed as part of the third-year MGSI program. The project allows users to browse available cars, make reservations, and manage their bookings. The website is built using HTML, CSS, JavaScript, PHP, and MySQL.

## Features

- **User Authentication:** Users can register, log in, and log out.
- **Car Listings:** Users can browse a list of available cars.
- **Reservations:** Users can make reservations by selecting a car, pickup location, and return location.
- **User Dashboard:** Users can view and manage their reservations.
- **Responsive Design:** The website is responsive and works well on different devices.

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL
- Bootstrap

## Installation

### Prerequisites

- XAMPP or any other local server environment.
- A web browser.

### Steps

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/car-rental-website.git
    ```

2. **Move the project to your server directory:**
    - For XAMPP, move the project folder to `C:\xampp\htdocs\`.

3. **Create a database:**
    - Open PHPMyAdmin.
    - Create a new database named `car_rental`.

4. **Import the database:**
    - Import the `car_rental.sql` file from the project directory into the `car_rental` database.

5. **Update the database configuration:**
    - Open `connection.php` file in the project directory.
    - Update the database credentials to match your local server setup.

    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";
    ```

6. **Start the server:**
    - Open XAMPP Control Panel.
    - Start the Apache and MySQL modules.

7. **Access the website:**
    - Open a web browser.
    - Navigate to `http://localhost/car-rental-website`.

## Usage

- **Register:** Create a new account.
- **Log in:** Access your account using your credentials.
- **Browse Cars:** View available cars for rent.
- **Make a Reservation:** Select a car and provide the required details to make a reservation.
- **Manage Reservations:** View and manage your reservations from your dashboard.

## Live Demo

Check out the live demo of the project: [Car Rental Website](https://carrental-pfa.000webhostapp.com/)

## Contributing

Contributions are welcome! Please fork the repository and create a pull request with your changes.

---
