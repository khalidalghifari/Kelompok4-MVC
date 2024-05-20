# PHP MVC Projects Repository

This repository contains two PHP projects that have been refactored to implement the MVC (Model-View-Controller) design pattern. The original projects are from [PHPGurukul](https://phpgurukul.com/) and are:

1. [Client Management System](https://phpgurukul.com/client-management-system-using-php-mysql/)
2. [Gym Management System](https://phpgurukul.com/gym-management-system-using-php-and-mysql/)

## Project Descriptions

### Client Management System

A web application for managing client information, tracking details, and managing interactions. The original project was built using native PHP and MySQL.

### Gym Management System

A web-based application designed to manage gym memberships, trainers, and member activities. Originally created with native PHP and MySQL.

## Features

### Client Management System

- Add, edit, delete, and view client information.
- Manage client interactions and details.
- Simple and intuitive user interface.

### Gym Management System

- Manage gym memberships and member details.
- Track trainers and their schedules.
- Oversee member activities and gym usage.

## Refactoring to MVC

Both projects have been refactored to follow the MVC design pattern. The refactored structure separates the code into:

- Models: Handling data and database interactions.
- Views: Managing the presentation layer.
- Controllers: Handling the application logic and user input.

## Getting Started

### Prerequisites

- XAMPP or any compatible local server environment.
- Web browser.
- Basic knowledge of PHP and MySQL.

### Installation

1. **Download and Install XAMPP:**

   - Download XAMPP from the [official website](https://www.apachefriends.org/index.html).
   - Install XAMPP and start the Apache and MySQL modules from the XAMPP Control Panel.

2. **Clone the Repository:**

   - Clone this repository to your local machine or download the ZIP file and extract it.

     ```bash
     git clone git@github.com:khalidalghifari/MVC-Native-PHP-Kelompok4.git
     ```

3. **Import the Database:**

   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin/`.
   - Create new databases named `clientmsdb` and `gymdb`.
   - Import the SQL files provided in the respective project directories (`clientmsdb.sql` and `gymdb.sql`).

4. **Install Composer**
   - `https://getcomposer.org/download/`

### Running the Projects

1. **Open terminal and run this following command:**

   ```bash
   composer install
   ```

   ```bash
   composer update
   ```

   If you want to open client-management-system project:
   ```bash
   cd Kelompok4-MVC\mvc-client-management-system\public
   ```
   If you want to open gym-management-system project:
   ```bash
   cd Kelompok4-MVC\mvc-gym-management-system\public
   ```

   ```bash
   php -S localhost:8000
   ```

2. **Open http://localhost:8000 on your browser:**

## Project Structure

### MVC Structure

Each project follows the MVC pattern with the following directory structure:

- `models/`: Contains all the model classes for database interaction.
- `views/`: Contains all the view files for rendering the user interface.
- `controllers/`: Contains all the controller classes for handling the logic and user input.
- `config/`: Contains configuration files, including database configuration.
- `public/`: Contains publicly accessible files such as index.php and assets (CSS, JS, images).

## Contributors

1. Muhammad Raza Adzani (2208107010066)
2. Nuri masyithah (2208107010006)
3. Fazhira rizky harmayani (2208107010012)
4. Muhammad Khalid Al Ghifari (2208107010044)
5. Maulana Fikri (2208107010042)
6. Muhammad Aufa Zaikra (2208107010070)

## License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

## Acknowledgements

- Original projects by [PHPGurukul](https://phpgurukul.com/)
- MVC implementation inspired by various online PHP MVC tutorials and resources.
